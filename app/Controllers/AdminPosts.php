<?php

namespace App\Controllers;

use App\Models\PostModel;

class AdminPosts extends BaseController
{
    private function checkAdmin()
    {
        if (! session()->get('isAdminLoggedIn')) {
            return redirect()->to(site_url('admin/login'));
        }

        return null;
    }

    public function index()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $model = new PostModel();

        return view('admin/posts', [
            'posts' => $model->orderBy('created_at', 'DESC')->findAll(),
        ]);
    }

    public function save()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $rules = [
            'title' => 'required|max_length[200]',
            'category' => 'required|in_list[berita,pengumuman,kegiatan]',
            'excerpt' => 'permit_empty|max_length[5000]',
            'content' => 'required',
            'author' => 'permit_empty|max_length[100]',
            'status' => 'required|in_list[draft,published]',
        ];

        $files = array_values(array_filter(
            $this->request->getFileMultiple('gallery_images') ?? [],
            static fn ($file) => $file && $file->getError() !== UPLOAD_ERR_NO_FILE
        ));
        if (count($files) > 5) {
            return redirect()->back()->withInput()->with('error', 'Maksimal 5 foto untuk satu artikel.');
        }
        foreach ($files as $index => $file) {
            $rules['gallery_images.' . $index] = 'uploaded[gallery_images.' . $index . ']|is_image[gallery_images.' . $index . ']|mime_in[gallery_images.' . $index . ',image/jpeg,image/png,image/webp]|max_size[gallery_images.' . $index . ',3072]';
        }
        // Tetap mendukung gambar utama lama untuk kompatibilitas artikel sebelumnya.
        $file = $this->request->getFile('image');
        $hasNewImage = $file && $file->getError() !== UPLOAD_ERR_NO_FILE;
        if ($hasNewImage) {
            $rules['image'] = 'uploaded[image]|is_image[image]|mime_in[image,image/jpeg,image/png,image/webp]|max_size[image,3072]';
        }
        $hasNewGallery = count($files) > 0;

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('error', implode(' ', $this->validator->getErrors()));
        }

        $model = new PostModel();
        $id = (int) $this->request->getPost('id');
        $existing = $id > 0 ? $model->find($id) : null;
        if ($id > 0 && ! $existing) {
            return redirect()->to(site_url('admin/posts'))->with('error', 'Artikel tidak ditemukan.');
        }

        $title = trim((string) $this->request->getPost('title'));
        $baseSlug = url_title($title, '-', true);
        if ($baseSlug === '') {
            return redirect()->back()->withInput()->with('error', 'Judul artikel tidak valid.');
        }
        $slug = $baseSlug;
        $suffix = 2;
        while (true) {
            $query = $model->where('slug', $slug);
            if ($id > 0) {
                $query->where('id !=', $id);
            }
            if (! $query->first()) {
                break;
            }
            $slug = $baseSlug . '-' . $suffix++;
        }

        $status = (string) $this->request->getPost('status');
        $data = [
            'title' => $title,
            'slug' => $slug,
            'category' => (string) $this->request->getPost('category'),
            'excerpt' => trim((string) $this->request->getPost('excerpt')),
            'content' => trim((string) $this->request->getPost('content')),
            'author' => trim((string) $this->request->getPost('author')) ?: (string) session()->get('admin_full_name'),
            'status' => $status,
            'published_at' => $status === 'published'
                ? (($existing['published_at'] ?? null) ?: date('Y-m-d H:i:s'))
                : null,
        ];

        $uploadDirectory = FCPATH . 'assets/images/posts/';
        $newGalleryFiles = [];
        if ($hasNewImage || $hasNewGallery) {
            if (! is_dir($uploadDirectory) && ! mkdir($uploadDirectory, 0755, true) && ! is_dir($uploadDirectory)) {
                return redirect()->back()->withInput()->with('error', 'Folder gambar gagal dibuat.');
            }
        }

        if ($hasNewGallery) {
            foreach ($files as $galleryFile) {
                if (! $galleryFile->isValid()) {
                    return redirect()->back()->withInput()->with('error', 'Salah satu foto tidak valid.');
                }
                $newFileName = $galleryFile->getRandomName();
                if (! $galleryFile->move($uploadDirectory, $newFileName)) {
                    foreach ($newGalleryFiles as $uploadedName) {
                        if (is_file($uploadDirectory . $uploadedName)) { unlink($uploadDirectory . $uploadedName); }
                    }
                    return redirect()->back()->withInput()->with('error', 'Salah satu foto gagal diunggah.');
                }
                $newGalleryFiles[] = $newFileName;
            }
            // Upload foto baru menggantikan galeri sebelumnya, maksimal lima foto.
            $data['gallery_images'] = json_encode(array_slice($newGalleryFiles, 0, 5), JSON_UNESCAPED_SLASHES);
            $data['image'] = $newGalleryFiles[0] ?? null;
        } elseif ($hasNewImage) {
            if (! $file->isValid()) {
                return redirect()->back()->withInput()->with('error', 'Gambar tidak valid.');
            }
            $newFileName = $file->getRandomName();
            if (! $file->move($uploadDirectory, $newFileName)) {
                return redirect()->back()->withInput()->with('error', 'Gambar gagal diunggah.');
            }
            $data['image'] = $newFileName;
            $data['gallery_images'] = json_encode([$newFileName], JSON_UNESCAPED_SLASHES);
            $newGalleryFiles[] = $newFileName;
        }

        try {
            $saved = $id > 0 ? $model->update($id, $data) : $model->insert($data);
            if ($saved === false) {
                throw new \RuntimeException('Model save returned false.');
            }
        } catch (\Throwable $e) {
            if ($hasNewImage && isset($newFileName) && is_file($uploadDirectory . $newFileName)) {
                unlink($uploadDirectory . $newFileName);
            }
            log_message('error', 'Gagal menyimpan artikel: {message}', ['message' => $e->getMessage()]);
            return redirect()->back()->withInput()->with('error', 'Artikel gagal disimpan. Periksa log aplikasi.');
        }

        if ($id > 0 && ($hasNewImage || $hasNewGallery)) {
            $oldNames = [];
            if (! empty($existing['gallery_images'])) {
                $decoded = json_decode((string) $existing['gallery_images'], true);
                if (is_array($decoded)) { $oldNames = array_merge($oldNames, $decoded); }
            }
            if (! empty($existing['image'])) { $oldNames[] = $existing['image']; }
            foreach (array_unique($oldNames) as $oldName) {
                if (! is_string($oldName) || $oldName === '' || in_array($oldName, $newGalleryFiles, true)) { continue; }
                $oldPath = $uploadDirectory . basename($oldName);
                if (is_file($oldPath)) { unlink($oldPath); }
            }
        }

        return redirect()->to(site_url('admin/posts'))->with('success', 'Artikel berhasil disimpan.');
    }

    public function delete($id)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $model = new PostModel();
        $post = $model->find((int) $id);
        if (! $post) {
            return redirect()->to(site_url('admin/posts'))->with('error', 'Artikel tidak ditemukan.');
        }
        if (! $model->delete((int) $id)) {
            return redirect()->to(site_url('admin/posts'))->with('error', 'Artikel gagal dihapus.');
        }

        $imageNames = [];
        if (! empty($post['gallery_images'])) {
            $decoded = json_decode((string) $post['gallery_images'], true);
            if (is_array($decoded)) { $imageNames = array_merge($imageNames, $decoded); }
        }
        if (! empty($post['image'])) { $imageNames[] = $post['image']; }
        foreach (array_unique($imageNames) as $imageName) {
            if (! is_string($imageName) || $imageName === '') { continue; }
            $path = FCPATH . 'assets/images/posts/' . basename($imageName);
            if (is_file($path)) { unlink($path); }
        }

        return redirect()->to(site_url('admin/posts'))->with('success', 'Artikel berhasil dihapus.');
    }
}
