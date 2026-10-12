<?php

namespace App\Controllers;

use App\Models\AchievementModel;

class Prestasi extends BaseController
{
    public function index(): string
    {
        $model = new AchievementModel();

        $achievements = $model
            ->where('is_active', 1)
            ->orderBy('achievement_date', 'DESC')
            ->findAll();

        return view('prestasi/index', [
            'achievements' => $achievements,
        ]);
    }
}
