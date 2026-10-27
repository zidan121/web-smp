<?php

namespace App\Controllers;

use App\Models\GalleryModel;

class AdminGalleries extends BaseController
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

        $model = new GalleryModel();

        return view('admin/galleries', [
            'galleries' => $model->orderBy('sort_order', 'ASC')
                ->orderBy('created_at', 'DESC')->findAll(),
        ]);
    }

    public function save()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $id = (int) $this->request->getPost('id');
        $model = new GalleryModel();
        $existing = $id > 0 ? $model->find($id) : null;

        if ($id > 0 && ! $existing) {
            return redirect()->to(site_url('admin/galleries'))
                ->with('error', 'Data galeri tidak ditemukan.');
        }

        $rules = [
            'title' => 'required|max_length[200]',
            'description' => 'permit_empty|max_length[5000]',
            'category' => 'permit_empty|max_length[100]',
            'sort_order' => 'required|integer|greater_than_equal_to[0]',
            'is_active' => 'required|in_list[0,1]',
            'video' => 'permit_empty',
        ];

        $file = $this->request->getFile('image');
        $hasNewImage = $file && $file->getError() !== UPLOAD_ERR_NO_FILE;

         $videoFile = $this->request->getFile('video');
        $hasNewVideo = $videoFile && $videoFile->getError() !== UPLOAD_ERR_NO_FILE;
        if (! $existing && ! $hasNewImage && ! $hasNewVideo) {
            $rules['image'] = 'uploaded[image]';
        }

        if ($hasNewVideo) {
            $rules['video'] = 'uploaded[video]|ext_in[video,mp4,webm,ogg]|mime_in[video,video/mp4,video/webm,video/ogg]|max_size[video,51200]';
        }

        if ($hasNewImage) {
            $rules['image'] = 'uploaded[image]|is_image[image]|mime_in[image,image/jpeg,image/png,image/webp]|max_size[image,4096]';
        }


        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('error', implode(' ', $this->validator->getErrors()));
        }


        $data = [
            'title' => trim((string) $this->request->getPost('title')),
            'description' => trim((string) $this->request->getPost('description')),
            'category' => trim((string) $this->request->getPost('category')),
            'sort_order' => (int) $this->request->getPost('sort_order'),
            'is_active' => (int) $this->request->getPost('is_active'),
        ];
        $directory = FCPATH . 'assets/images/galleries/';
        $newFileName = null;

        if ($hasNewImage) {
            if (! $file->isValid()) {
                return redirect()->back()->withInput()
                    ->with('error', 'File gambar tidak valid.');
            }

            if (! is_dir($directory) && ! mkdir($directory, 0755, true) && ! is_dir($directory)) {
                return redirect()->back()->withInput()
                    ->with('error', 'Folder penyimpanan galeri gagal dibuat.');
            }

            $newFileName = $file->getRandomName();

            if (! $file->move($directory, $newFileName)) {
                return redirect()->back()->withInput()
                    ->with('error', 'Gambar gagal diunggah.');
            }

            $data['image'] = $newFileName;
        }

        $videoDirectory = FCPATH . 'assets/videos/galleries/';
        $newVideoName = null;
        if ($hasNewVideo) {
            if (! $videoFile->isValid()) {
                return redirect()->back()->withInput()->with('error', 'File video tidak valid.');
            }
            if (! is_dir($videoDirectory) && ! mkdir($videoDirectory, 0755, true) && ! is_dir($videoDirectory)) {
                return redirect()->back()->withInput()->with('error', 'Folder penyimpanan video gagal dibuat.');
            }
            $newVideoName = $videoFile->getRandomName();
            if (! $videoFile->move($videoDirectory, $newVideoName)) {
                return redirect()->back()->withInput()->with('error', 'Video gagal diunggah.');
            }
            $data['video_url'] = $newVideoName;
        }

        try {
            $saved = $id > 0 ? $model->update($id, $data) : $model->insert($data);
        } catch (\Throwable $e) {
            if ($newFileName && is_file($directory . $newFileName)) {
                unlink($directory . $newFileName);
            }
            if ($newVideoName && is_file($videoDirectory . $newVideoName)) {
                unlink($videoDirectory . $newVideoName);
            }
            log_message('error', 'Gagal menyimpan galeri: {message}', ['message' => $e->getMessage()]);
            return redirect()->back()->withInput()
                ->with('error', 'Galeri gagal disimpan. Periksa log aplikasi.');
        }

        if ($saved === false) {
            if ($newFileName && is_file($directory . $newFileName)) {
                unlink($directory . $newFileName);
            }
            if ($newVideoName && is_file($videoDirectory . $newVideoName)) {
                unlink($videoDirectory . $newVideoName);
            }
            return redirect()->back()->withInput()->with('error', 'Galeri gagal disimpan.');
        }

        if ($id > 0 && $newVideoName && ! empty($existing['video_url'])) {
            $oldVideoPath = $videoDirectory . basename((string) $existing['video_url']);
            if (is_file($oldVideoPath)) {
                unlink($oldVideoPath);
            }
        }

        if ($id > 0 && $newFileName && ! empty($existing['image'])) {
            $oldPath = $directory . basename($existing['image']);
            if (is_file($oldPath)) {
                unlink($oldPath);
            }
        }

        return redirect()->to(site_url('admin/galleries'))
            ->with('success', $id > 0 ? 'Galeri berhasil diperbarui.' : 'Galeri berhasil ditambahkan.');
    }

    public function delete($id)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $model = new GalleryModel();
        $gallery = $model->find((int) $id);

        if (! $gallery) {
            return redirect()->to(site_url('admin/galleries'))->with('error', 'Data galeri tidak ditemukan.');
        }

        if (! $model->delete((int) $id)) {
            return redirect()->to(site_url('admin/galleries'))->with('error', 'Data galeri gagal dihapus.');
        }

        $videoPath = FCPATH . 'assets/videos/galleries/' . basename((string) ($gallery['video_url'] ?? ''));
        if (! empty($gallery['video_url']) && is_file($videoPath)) {
            unlink($videoPath);
        }

        $path = FCPATH . 'assets/images/galleries/' . basename((string) $gallery['image']);
        if (is_file($path)) {
            unlink($path);
        }

        return redirect()->to(site_url('admin/galleries'))->with('success', 'Galeri berhasil dihapus.');
    }
}
