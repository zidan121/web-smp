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
}
