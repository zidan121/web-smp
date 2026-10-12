<?php

namespace App\Controllers;

use App\Models\ProgramModel;
use App\Models\ProgramIconModel;

class AdminPrograms extends BaseController
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

        $model = new ProgramModel();
        $programIconModel = new ProgramIconModel();

        return view('admin/programs', [
            'programs' => $model
                ->orderBy('sort_order', 'ASC')
                ->findAll(),

            'programIcons' => $programIconModel
                ->orderBy('name', 'ASC')
                ->findAll(),
        ]);
    }
    public function save()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $rules = [
            'name' => 'required|max_length[150]',
            'description' => 'permit_empty|max_length[5000]',
            'sort_order' => 'required|integer|greater_than_equal_to[0]',
            'is_active' => 'required|in_list[0,1]',
           'icon' => 'permit_empty|in_list[book-open,globe,laptop,graduation-cap,microscope,code,heart,star]',
            'program_icon_id' => 'permit_empty|integer',
        ];

        $file = $this->request->getFile('image');
        $hasNewImage = $file && $file->getError() !== UPLOAD_ERR_NO_FILE;

        if ($hasNewImage) {
            $rules['image'] =
                'uploaded[image]|is_image[image]|'
                . 'mime_in[image,image/jpeg,image/png,image/webp]|'
                . 'max_size[image,2048]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode(' ', $this->validator->getErrors()));
        }

        $model = new ProgramModel();
        $id = (int) $this->request->getPost('id');
        $name = trim((string) $this->request->getPost('name'));

        $program = null;

        if ($id > 0) {
            $program = $model->find($id);

            if (! $program) {
                return redirect()->to(site_url('admin/programs'))
                    ->with('error', 'Program tidak ditemukan.');
            }
        }

        $slug = url_title($name, '-', true);
        $baseSlug = $slug;
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

        $selectedIcon = trim((string) $this->request->getPost('icon'));
        $programIconId = $this->request->getPost('program_icon_id');

        $programIconId = ($programIconId !== null && $programIconId !== '')
            ? (int) $programIconId
            : null;

        if ($programIconId !== null) {
            $iconModel = new \App\Models\ProgramIconModel();
            $cmsIcon = $iconModel->find($programIconId);

            if (!$cmsIcon) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Ikon CMS yang dipilih tidak ditemukan.');
            }
        } elseif ($selectedIcon === '') {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Silakan pilih ikon program.');
        }

        $data = [
            'name'            => $name,
            'slug'            => $slug,
            'description'     => trim(
                (string) $this->request->getPost('description')
            ),
            'icon'            => $selectedIcon !== '' ? $selectedIcon : 'book-open',
            'program_icon_id' => $programIconId,
            'sort_order'      => (int) $this->request->getPost('sort_order'),
            'is_active'       => (int) $this->request->getPost('is_active'),
        ];

        $uploadDirectory = FCPATH . 'assets/images/programs/';

        if ($hasNewImage) {
            if (! $file->isValid()) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Foto tidak valid atau gagal diunggah.');
            }

            if (! is_dir($uploadDirectory)
                && ! mkdir($uploadDirectory, 0755, true)
                && ! is_dir($uploadDirectory)) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Folder penyimpanan foto gagal dibuat.');
            }

            $newFileName = $file->getRandomName();

            if (! $file->move($uploadDirectory, $newFileName)) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Foto gagal disimpan.');
            }

            $data['image'] = $newFileName;
        }

        try {
            if ($id > 0) {
                $saved = $model->update($id, $data);
            } else {
                $saved = $model->insert($data);
            }
        } catch (\Throwable $e) {
            if ($hasNewImage && isset($newFileName)) {
                $newPath = $uploadDirectory . $newFileName;

                if (is_file($newPath)) {
                    unlink($newPath);
                }
            }

            log_message('error', 'Gagal menyimpan program: {message}', [
                'message' => $e->getMessage(),
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Program gagal disimpan. Periksa log aplikasi.');
        }

        if ($saved === false) {
            if ($hasNewImage && isset($newFileName)) {
                $newPath = $uploadDirectory . $newFileName;

                if (is_file($newPath)) {
                    unlink($newPath);
                }
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Program gagal disimpan.');
        }

        // Hapus foto lama hanya setelah data berhasil diperbarui.
        if (
            $id > 0
            && $hasNewImage
            && ! empty($program['image'])
        ) {
            $oldPath = $uploadDirectory . basename($program['image']);

            if (is_file($oldPath)) {
                unlink($oldPath);
            }
        }

        return redirect()->to(site_url('admin/programs'))
            ->with('success', 'Program berhasil disimpan.');
    }

    public function delete($id)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $model = new ProgramModel();
        $program = $model->find((int) $id);

        if (! $program) {
            return redirect()->to(site_url('admin/programs'))
                ->with('error', 'Program tidak ditemukan.');
        }

        if (! $model->delete((int) $id)) {
            return redirect()->to(site_url('admin/programs'))
                ->with('error', 'Program gagal dihapus.');
        }

        return redirect()->to(site_url('admin/programs'))
            ->with('success', 'Program berhasil dihapus.');
    }
}