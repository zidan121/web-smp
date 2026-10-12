<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    public function login()
    {
        if (session()->get('isAdminLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }

        return view('admin/login');
    }

    public function authenticate()
    {
        $rules = [
            'username' => 'required|max_length[100]',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username dan password wajib diisi.');
        }

        $adminModel = new AdminModel();

        $admin = $adminModel
            ->where('username', trim((string) $this->request->getPost('username')))
            ->first();

        $password = (string) $this->request->getPost('password');

        if (! $admin || ! password_verify($password, $admin['password'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username atau password salah.');
        }

        session()->regenerate();

        session()->set([
            'admin_id'          => $admin['id'],
            'admin_username'    => $admin['username'],
            'admin_full_name'   => $admin['full_name'],
            'isAdminLoggedIn'   => true,
        ]);

        return redirect()->to('/admin/dashboard');
    }

    public function dashboard()
    {
        if (! session()->get('isAdminLoggedIn')) {
            return redirect()->to('/admin/login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('admin/dashboard');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/admin/login')
            ->with('success', 'Kamu sudah logout.');
    }
}