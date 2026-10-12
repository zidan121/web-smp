<?php

namespace App\Controllers;

use App\Models\GalleryModel;

class Galeri extends BaseController
{
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
        ]);
    }
}
