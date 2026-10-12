<?php

namespace App\Controllers;

use App\Models\ProgramIconModel;

class AdminProgramIcons extends BaseController
{
    private function checkAdmin()
    {
        if (!session()->get('isAdminLoggedIn')) {
            return redirect()->to('/admin/login');
        }

        return null;
    }

    public function index()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $model = new ProgramIconModel();

        return view('admin/program_icons', [
            'icons' => $model->orderBy('name', 'ASC')->findAll(),
        ]);
    }

    public function save()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $name = trim((string) $this->request->getPost('name'));
        $type = $this->request->getPost('icon_type');
        $value = trim((string) $this->request->getPost('icon_value'));

        if ($name === '' || !in_array($type, ['builtin', 'image'], true)) {
            return redirect()->back()->with('error', 'Nama dan jenis ikon wajib diisi.');
        }

        $model = new ProgramIconModel();

        if ($type === 'builtin') {
            $allowedIcons = [
                'book-open',
                'globe',
                'laptop',
                'graduation-cap',
                'microscope',
                'code',
                'heart',
                'star',
            ];

            if (!in_array($value, $allowedIcons, true)) {
                return redirect()->back()->with('error', 'Pilihan ikon tidak valid.');
            }
        } else {
            $file = $this->request->getFile('icon_image');

            if (!$file || !$file->isValid() || $file->hasMoved()) {
                return redirect()->back()->with('error', 'Pilih gambar ikon yang valid.');
            }

            if (!in_array($file->getMimeType(), [
                'image/jpeg',
                'image/png',
                'image/webp',
            ], true) || $file->getSizeByUnit('mb') > 2) {
                return redirect()->back()->with('error', 'Gunakan JPG, PNG, atau WebP maksimal 2 MB.');
            }

            $directory = FCPATH . 'assets/images/program-icons/';

            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $filename = $file->getRandomName();

            if (!$file->move($directory, $filename)) {
                return redirect()->back()->with('error', 'Gagal menyimpan gambar ikon.');
            }

            $value = $filename;
        }

        $slug = url_title($name, '-', true);

        if ($slug === '') {
            return redirect()->back()->with('error', 'Nama ikon tidak valid.');
        }

        $originalSlug = $slug;
        $counter = 2;

        while ($model->where('slug', $slug)->first()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $model->insert([
            'name'       => $name,
            'slug'       => $slug,
            'icon_type'  => $type,
            'icon_value' => $value,
        ]);

        return redirect()->to('/admin/program-icons')
            ->with('success', 'Ikon berhasil ditambahkan.');
    }

    public function delete($id)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $model = new ProgramIconModel();
        $icon = $model->find($id);

        if (!$icon) {
            return redirect()->back()->with('error', 'Ikon tidak ditemukan.');
        }

        if ($icon['icon_type'] === 'image') {
            $path = FCPATH . 'assets/images/program-icons/' . $icon['icon_value'];

            if (is_file($path)) {
                unlink($path);
            }
        }

        $model->delete($id);

        return redirect()->to('/admin/program-icons')
            ->with('success', 'Ikon berhasil dihapus.');
    }
}