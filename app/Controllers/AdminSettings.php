<?php

namespace App\Controllers;

use App\Models\SiteSettingModel;
use App\Models\SchoolProfileModel;

class AdminSettings extends BaseController
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

        $model = new SiteSettingModel();
        $rows = $model->findAll();
        $settings = [];

        foreach ($rows as $row) {
            $settings[$row['setting_key']] = $row['setting_value'] ?? '';
        }

        $profile = (new SchoolProfileModel())->first() ?? [];

        return view('admin/settings', ['settings' => $settings, 'profile' => $profile]);
    }

    public function save()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $rules = [
            'email' => 'permit_empty|valid_email|max_length[150]',
            'phone' => 'permit_empty|max_length[50]',
            'whatsapp' => 'permit_empty|max_length[50]',
            'address' => 'permit_empty|max_length[1000]',
            'instagram' => 'permit_empty|max_length[255]',
            'facebook' => 'permit_empty|max_length[255]',
            'youtube' => 'permit_empty|max_length[255]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode(' ', $this->validator->getErrors()));
        }

        $keys = array_keys($rules);
        $model = new SiteSettingModel();
        $db = $model->db;
        $db->transBegin();

        try {
            foreach ($keys as $key) {
                $value = trim((string) $this->request->getPost($key));
                $existing = $model->where('setting_key', $key)->first();

                if ($existing) {
                    $model->update($existing['id'], ['setting_value' => $value]);
                } else {
                    $model->insert([
                        'setting_key' => $key,
                        'setting_value' => $value,
                    ]);
                }
            }

            $profileModel = new SchoolProfileModel();
            $profile = $profileModel->first();
            $profileData = [
                'address' => trim((string) $this->request->getPost('address')),
                'phone' => trim((string) $this->request->getPost('phone')),
                'email' => trim((string) $this->request->getPost('email')),
            ];
            $logoFile = $this->request->getFile('site_logo');
            if ($logoFile && $logoFile->isValid() && ! $logoFile->hasMoved()) {
                if (! in_array($logoFile->getMimeType(), ['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'], true) || $logoFile->getSizeByUnit('mb') > 3) {
                    throw new \RuntimeException('Logo harus JPG, PNG, WebP, atau SVG maksimal 3 MB.');
                }
                $uploadPath = FCPATH . 'assets/images/';
                if (! is_dir($uploadPath) && ! mkdir($uploadPath, 0755, true) && ! is_dir($uploadPath)) {
                    throw new \RuntimeException('Folder gambar tidak dapat dibuat.');
                }
                $newName = 'logo-' . $logoFile->getRandomName();
                if (! $logoFile->move($uploadPath, $newName)) {
                    throw new \RuntimeException('Logo gagal diunggah.');
                }
                $logoSetting = $model->where('setting_key', 'site_logo')->first();
                if ($logoSetting) {
                    $model->update($logoSetting['id'], ['setting_value' => $newName]);
                } else {
                    $model->insert(['setting_key' => 'site_logo', 'setting_value' => $newName]);
                }
            }

            $prestasiHeroImage = $this->request->getFile('prestasi_hero_image');
            if ($prestasiHeroImage && $prestasiHeroImage->isValid() && ! $prestasiHeroImage->hasMoved()) {
                if (! in_array($prestasiHeroImage->getMimeType(), ['image/jpeg', 'image/png', 'image/webp'], true) || $prestasiHeroImage->getSizeByUnit('mb') > 5) {
                    throw new \RuntimeException('Gambar banner Prestasi harus JPG, PNG, atau WebP maksimal 5 MB.');
                }
                $uploadPath = FCPATH . 'assets/images/';
                if (! is_dir($uploadPath) && ! mkdir($uploadPath, 0755, true) && ! is_dir($uploadPath)) {
                    throw new \RuntimeException('Folder gambar tidak dapat dibuat.');
                }
                $newName = 'prestasi-hero-' . $prestasiHeroImage->getRandomName();
                if (! $prestasiHeroImage->move($uploadPath, $newName)) {
                    throw new \RuntimeException('Gambar banner Prestasi gagal diunggah.');
                }
                $heroSetting = $model->where('setting_key', 'prestasi_hero_image')->first();
                if ($heroSetting) {
                    $model->update($heroSetting['id'], ['setting_value' => $newName]);
                } else {
                    $model->insert(['setting_key' => 'prestasi_hero_image', 'setting_value' => $newName]);
                }
            }

            $heroImage = $this->request->getFile('hero_image');
            if ($heroImage && $heroImage->isValid() && ! $heroImage->hasMoved()) {
                if (! in_array($heroImage->getMimeType(), ['image/jpeg', 'image/png', 'image/webp'], true) || $heroImage->getSizeByUnit('mb') > 5) {
                    throw new \RuntimeException('Gambar utama harus JPG, PNG, atau WebP maksimal 5 MB.');
                }
                $uploadPath = FCPATH . 'assets/images/';
                if (! is_dir($uploadPath) && ! mkdir($uploadPath, 0755, true) && ! is_dir($uploadPath)) {
                    throw new \RuntimeException('Folder gambar tidak dapat dibuat.');
                }
                $newName = $heroImage->getRandomName();
                if (! $heroImage->move($uploadPath, $newName)) {
                    throw new \RuntimeException('Gambar utama gagal diunggah.');
                }
                $profileData['hero_image'] = $newName;
            }
            if ($profile) {
                $profileModel->update($profile['id'], $profileData);
            } else {
                $profileModel->insert($profileData);
            }

            if ($db->transStatus() === false) {
                throw new \RuntimeException('Database transaction failed.');
            }

            $db->transCommit();
        } catch (\Throwable $e) {
            $db->transRollback();
            log_message('error', 'Gagal menyimpan pengaturan website: {message}', [
                'message' => $e->getMessage(),
            ]);

            // Tampilkan pesan validasi yang aman untuk admin agar penyebab kegagalan lebih mudah diketahui.
            $safeMessage = $e->getMessage();
            if (stripos($safeMessage, 'database') !== false || stripos($safeMessage, 'SQL') !== false || stripos($safeMessage, 'constraint') !== false) {
                $safeMessage = 'Penyimpanan database gagal. Periksa kolom dan struktur tabel site_settings serta school_profile.';
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Pengaturan gagal disimpan: ' . $safeMessage);
        }

        return redirect()->to(site_url('admin/settings'))
            ->with('success', 'Pengaturan website berhasil disimpan.');
    }
}
