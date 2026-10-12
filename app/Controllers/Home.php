<?php

namespace App\Controllers;

use App\Models\ProgramModel;

class Home extends BaseController
{
    public function index(): string
    {
        $programModel = new \App\Models\ProgramModel();
        $programIconModel = new \App\Models\ProgramIconModel();

        $programs = $programModel
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        $programIcons = $programIconModel->findAll();

        $iconsById = [];

        foreach ($programIcons as $programIcon) {
            $iconsById[$programIcon['id']] = $programIcon;
        }

        $profile = (new \App\Models\SchoolProfileModel())->first() ?? [];

        return view('home', [
            'programs' => $programs,
            'profile' => $profile,
            'programIconsById' => $iconsById,
        ]);
    }
}