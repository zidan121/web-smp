<?php

namespace App\Controllers;

use App\Models\SiteSettingModel;

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

        return view('admin/settings', ['settings' => $settings]);
    }

    public function save()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $rules = [
            'site_name' => 'required|max_length[150]',
            'tagline' => 'permit_empty|max_length[255]',
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

            if ($db->transStatus() === false) {
                throw new \RuntimeException('Database transaction failed.');
            }

            $db->transCommit();
        } catch (\Throwable $e) {
            $db->transRollback();
            log_message('error', 'Gagal menyimpan pengaturan website: {message}', [
                'message' => $e->getMessage(),
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Pengaturan gagal disimpan. Periksa log aplikasi.');
        }

        return redirect()->to(site_url('admin/settings'))
            ->with('success', 'Pengaturan website berhasil disimpan.');
    }
}
