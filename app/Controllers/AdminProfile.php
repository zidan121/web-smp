<?php

namespace App\Controllers;

use App\Models\SchoolProfileModel;

class AdminProfile extends BaseController
{
    private function checkAdmin()
    {
        if (! session()->get('isAdminLoggedIn')) {
            return redirect()->to(site_url('admin/login'))
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        return null;
    }

    public function index()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $model = new SchoolProfileModel();

        return view('admin/profile', [
            'profile' => $model->first(),
        ]);
    }

    public function save()
    {
        if (! session()->get('isAdminLoggedIn')) {
            return redirect()->to(site_url('admin/login'))
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $rules = [
            'school_name' => 'required|max_length[200]',
            'tagline'     => 'permit_empty|max_length[255]',
            'email'       => 'permit_empty|valid_email|max_length[150]',
            'profile_video_url' => 'permit_empty|max_length[500]',
            'phone'       => 'permit_empty|max_length[30]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode(' ', $this->validator->getErrors()));
        }

        $model = new SchoolProfileModel();
        $profile = $model->first();

        $data = [
            'school_name' => trim((string) $this->request->getPost('school_name')),
            'tagline'     => trim((string) $this->request->getPost('tagline')),
            'about'       => trim((string) $this->request->getPost('about')),
            'vision'      => trim((string) $this->request->getPost('vision')),
            'mission'     => trim((string) $this->request->getPost('mission')),
            'address'     => trim((string) $this->request->getPost('address')),
            'phone'       => trim((string) $this->request->getPost('phone')),
            'email'       => trim((string) $this->request->getPost('email')),
            'profile_video_url' => trim((string) $this->request->getPost('profile_video_url')),
        ];

        $image = $this->request->getFile('profile_image');
        if ($image && $image->isValid() && ! $image->hasMoved()) {
            if (! in_array($image->getMimeType(), ['image/jpeg', 'image/png', 'image/webp'], true) || $image->getSizeByUnit('mb') > 3) {
                return redirect()->back()->withInput()->with('error', 'Foto harus JPG, PNG, atau WebP maksimal 3 MB.');
            }
            $uploadPath = FCPATH . 'assets/images/';
            if (! is_dir($uploadPath)) mkdir($uploadPath, 0755, true);
            $newName = $image->getRandomName();
            if (! $image->move($uploadPath, $newName)) return redirect()->back()->withInput()->with('error', 'Foto gagal diunggah.');
            $data['profile_image'] = $newName;
        }

        if ($profile) {
            $model->update($profile['id'], $data);
        } else {
            $model->insert($data);
        }

        return redirect()->to(site_url('admin/profil'))
            ->with('success', 'Profil sekolah berhasil disimpan.');
    }
}