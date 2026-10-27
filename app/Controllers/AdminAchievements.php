<?php

namespace App\Controllers;

use App\Models\AchievementModel;

class AdminAchievements extends BaseController
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

        return view('admin/achievements', [
            'achievements' => (new AchievementModel())
                ->orderBy('achievement_date', 'DESC')
                ->orderBy('id', 'DESC')
                ->findAll(),
        ]);
    }

    public function save()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $id = (int) $this->request->getPost('id');
        $model = new AchievementModel();
        $existing = $id > 0 ? $model->find($id) : null;

        if ($id > 0 && ! $existing) {
            return redirect()->to(site_url('admin/achievements'))
                ->with('error', 'Data prestasi tidak ditemukan.');
        }

        $rules = [
            'title' => 'required|max_length[200]',
            'student_name' => 'permit_empty|max_length[200]',
            'competition' => 'permit_empty|max_length[200]',
            'level' => 'permit_empty|max_length[100]',
            'achievement_date' => 'permit_empty|valid_date[Y-m-d]',
            'description' => 'permit_empty|max_length[10000]',
            'is_active' => 'required|in_list[0,1]',
        ];

        $file = $this->request->getFile('image');
        $hasNewImage = $file && $file->getError() !== UPLOAD_ERR_NO_FILE;
        if ($hasNewImage) {
            $rules['image'] = 'uploaded[image]|is_image[image]|mime_in[image,image/jpeg,image/png,image/webp]|max_size[image,4096]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('error', implode(' ', $this->validator->getErrors()));
        }

        $data = [
            'title' => trim((string) $this->request->getPost('title')),
            'student_name' => trim((string) $this->request->getPost('student_name')),
            'competition' => trim((string) $this->request->getPost('competition')),
            'level' => trim((string) $this->request->getPost('level')),
            'achievement_date' => trim((string) $this->request->getPost('achievement_date')) ?: null,
            'description' => trim((string) $this->request->getPost('description')),
            'is_active' => (int) $this->request->getPost('is_active'),
        ];

        $directory = FCPATH . 'assets/images/achievements/';
        $newFileName = null;

        if ($hasNewImage) {
            if (! $file->isValid()) {
                return redirect()->back()->withInput()->with('error', 'File gambar tidak valid.');
            }

            if (! is_dir($directory) && ! mkdir($directory, 0755, true) && ! is_dir($directory)) {
                return redirect()->back()->withInput()->with('error', 'Folder gambar prestasi gagal dibuat.');
            }

            $newFileName = $file->getRandomName();
            if (! $file->move($directory, $newFileName)) {
                return redirect()->back()->withInput()->with('error', 'Gambar prestasi gagal diunggah.');
            }
            $data['image'] = $newFileName;
        }

        try {
            $saved = $id > 0 ? $model->update($id, $data) : $model->insert($data);
            if ($saved === false) {
                throw new \RuntimeException('Model save returned false.');
            }
        } catch (\Throwable $e) {
            if ($newFileName && is_file($directory . $newFileName)) {
                unlink($directory . $newFileName);
            }
            log_message('error', 'Gagal menyimpan prestasi: {message}', ['message' => $e->getMessage()]);
            return redirect()->back()->withInput()
                ->with('error', 'Prestasi gagal disimpan. Periksa log aplikasi.');
        }

        if ($id > 0 && $newFileName && ! empty($existing['image'])) {
            $oldPath = $directory . basename($existing['image']);
            if (is_file($oldPath)) {
                unlink($oldPath);
            }
        }

        return redirect()->to(site_url('admin/achievements'))
            ->with('success', $id > 0 ? 'Prestasi berhasil diperbarui.' : 'Prestasi berhasil ditambahkan.');
    }

    public function delete($id)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $model = new AchievementModel();
        $achievement = $model->find((int) $id);

        if (! $achievement) {
            return redirect()->to(site_url('admin/achievements'))
                ->with('error', 'Data prestasi tidak ditemukan.');
        }

        if (! $model->delete((int) $id)) {
            return redirect()->to(site_url('admin/achievements'))
                ->with('error', 'Data prestasi gagal dihapus.');
        }

        $path = FCPATH . 'assets/images/achievements/' . basename((string) ($achievement['image'] ?? ''));
        if (! empty($achievement['image']) && is_file($path)) {
            unlink($path);
        }

        return redirect()->to(site_url('admin/achievements'))
            ->with('success', 'Prestasi berhasil dihapus.');
    }
}
