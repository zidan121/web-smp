<?php

namespace App\Controllers;

use App\Models\AchievementModel;

class Prestasi extends BaseController
{
    private function publicSettings(): array
    {
        $settings = [];
        foreach ((new \\App\\Models\\SiteSettingModel())->findAll() as $setting) {
            $settings[$setting['setting_key']] = $setting['setting_value'] ?? '';
        }
        return $settings;
    }

    public function index(): string
    {
        $model = new AchievementModel();

        $achievements = $model
            ->where('is_active', 1)
            ->orderBy('achievement_date', 'DESC')
            ->findAll();

        return view('prestasi/index', [
            'achievements' => $achievements,
            'settings' => $this->publicSettings(),
        ]);
    }
}
