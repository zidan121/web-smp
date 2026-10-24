<?php

namespace App\Controllers;

use App\Models\AchievementModel;
use App\Models\GalleryModel;
use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

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

    /**
     * Gabungkan dokumentasi manual, foto berita terbit, dan foto prestasi aktif.
     * ID bertipe membuat item otomatis tidak perlu disimpan ulang di tabel galleries.
     */
    private function allGalleryItems(): array
    {
        $items = [];

        foreach ((new GalleryModel())->where('is_active', 1)->findAll() as $gallery) {
            $gallery['source_type'] = 'gallery';
            $gallery['source_id'] = (int) $gallery['id'];
            $gallery['media_id'] = 'gallery-' . (int) $gallery['id'];
            $gallery['image_path'] = 'assets/images/galleries/';
            $gallery['media_type'] = ! empty($gallery['video_url']) ? 'video' : 'image';
            $items[] = $gallery;
        }

        $posts = (new PostModel())
            ->where('status', 'published')
            ->orderBy('published_at', 'DESC')
            ->findAll();

        foreach ($posts as $post) {
            $images = [];
            if (! empty($post['gallery_images'])) {
                $decoded = json_decode((string) $post['gallery_images'], true);
                if (is_array($decoded)) {
                    $images = array_values(array_filter($decoded, 'is_string'));
                }
            }
            if (empty($images) && ! empty($post['image'])) {
                $images = [(string) $post['image']];
            }
            $images = array_values(array_unique(array_filter($images)));
            foreach ($images as $index => $image) {
                $items[] = [
                    'id' => 'post-' . (int) $post['id'] . '-' . $index,
                    'media_id' => 'post-' . (int) $post['id'] . '-' . $index,
                    'source_type' => 'post',
                    'source_id' => (int) $post['id'],
                    'title' => (string) $post['title'],
                    'description' => trim((string) ($post['excerpt'] ?? '')) ?: mb_substr(strip_tags((string) ($post['content'] ?? '')), 0, 220),
                    'image' => basename($image),
                    'image_path' => 'assets/images/posts/',
                    'category' => 'Berita',
                    'created_at' => $post['published_at'] ?? $post['created_at'] ?? null,
                    'sort_order' => 0,
                    'is_active' => 1,
                ];
            }

            if (! empty($post['video_url'])) {
                $items[] = [
                    'id' => 'post-video-' . (int) $post['id'],
                    'media_id' => 'post-video-' . (int) $post['id'],
                    'source_type' => 'post',
                    'source_id' => (int) $post['id'],
                    'title' => (string) $post['title'] . ' — Video',
                    'description' => trim((string) ($post['excerpt'] ?? '')) ?: mb_substr(strip_tags((string) ($post['content'] ?? '')), 0, 220),
                    'image' => '',
                    'image_path' => 'assets/images/posts/',
                    'video_url' => (string) $post['video_url'],
                    'media_type' => 'video',
                    'category' => 'Video Berita',
                    'created_at' => $post['published_at'] ?? $post['created_at'] ?? null,
                    'sort_order' => 0,
                    'is_active' => 1,
                ];
            }
        }

        $achievements = (new AchievementModel())
            ->where('is_active', 1)
            ->orderBy('achievement_date', 'DESC')
            ->findAll();

        foreach ($achievements as $achievement) {
            if (empty($achievement['image']) && empty($achievement['video_url'])) {
                continue;
            }
            $items[] = [
                'id' => 'achievement-' . (int) $achievement['id'],
                'media_id' => 'achievement-' . (int) $achievement['id'],
                'source_type' => 'achievement',
                'source_id' => (int) $achievement['id'],
                'title' => (string) $achievement['title'],
                'description' => trim((string) ($achievement['description'] ?? '')) ?: trim((string) ($achievement['competition'] ?? 'Dokumentasi prestasi siswa')),
                'image' => basename((string) ($achievement['image'] ?? '')),
                'image_path' => 'assets/images/achievements/',
                'video_url' => (string) ($achievement['video_url'] ?? ''),
                'media_type' => ! empty($achievement['video_url']) ? 'video' : 'image',
                'category' => 'Prestasi',
                'created_at' => $achievement['achievement_date'] ?? $achievement['created_at'] ?? null,
                'sort_order' => 0,
                'is_active' => 1,
            ];
        }

        usort($items, static function (array $a, array $b): int {
            $aDate = strtotime((string) ($a['created_at'] ?? '')) ?: 0;
            $bDate = strtotime((string) ($b['created_at'] ?? '')) ?: 0;
            return $bDate <=> $aDate;
        });

        return $items;
    }

    public function detail(string $id)
    {
        foreach ($this->allGalleryItems() as $item) {
            if ((string) ($item['media_id'] ?? '') === $id || (string) ($item['id'] ?? '') === $id) {
                return view('galeri/detail', [
                    'gallery' => $item,
                    'settings' => $this->publicSettings(),
                ]);
            }
        }

        throw PageNotFoundException::forPageNotFound('Dokumentasi galeri tidak ditemukan.');
    }

    public function index(): string
    {
        return view('galeri/index', [
            'galleries' => $this->allGalleryItems(),
            'settings' => $this->publicSettings(),
        ]);
    }
}
