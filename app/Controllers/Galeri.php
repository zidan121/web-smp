<?php

namespace App\Controllers;

use App\Models\GalleryModel;

class Galeri extends BaseController
{
    private function publicSettings(): array
    {
        $settings = [];
        foreach ((new \App\Models\SiteSettingModel())->findAll() as $setting) {
            $settings[$setting['setting_key']] = $setting['setting_value'] ?? '';
        }
        return $settings;
    }

    public function detail(int $id)
    {
        $model = new GalleryModel();
        $gallery = $model->where('is_active', 1)->find($id);

        if (! $gallery) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Dokumentasi galeri tidak ditemukan.');
        }

        return view('galeri/detail', [
            'gallery' => $gallery,
            'settings' => $this->publicSettings(),
        ]);
    }

    public function index(): string
    {
        $model = new GalleryModel();

        $galleries = $model
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('galeri/index', [
            'galleries' => $galleries,
            'settings' => $this->publicSettings(),
        ]);
    }
}
