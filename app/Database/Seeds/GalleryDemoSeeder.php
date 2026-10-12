<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GalleryDemoSeeder extends Seeder
{
    public function run()
    {
        $table = $this->db->table('galleries');

        // Jangan menggandakan data jika seeder dijalankan lagi.
        if ($table->countAllResults() > 0) {
            return;
        }

        $now = date('Y-m-d H:i:s');
        $table->insertBatch([
            [
                'title' => 'Kegiatan Belajar dan Pembinaan Karakter',
                'description' => 'Contoh dokumentasi kegiatan belajar siswa dalam suasana yang aktif, tertib, dan menyenangkan.',
                'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Pembelajaran',
                'sort_order' => 1,
                'is_active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Kolaborasi dan Kerja Kelompok',
                'description' => 'Contoh foto kegiatan kolaborasi untuk melatih komunikasi, kreativitas, dan kerja sama antarsiswa.',
                'image' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Kegiatan Siswa',
                'sort_order' => 2,
                'is_active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Eksplorasi Teknologi dan Sains',
                'description' => 'Contoh konten untuk dokumentasi praktik, eksperimen, dan pengembangan keterampilan ICT.',
                'image' => 'https://images.unsplash.com/photo-1581092921461-eab62e97a780?auto=format&fit=crop&w=1200&q=80',
                'category' => 'ICT & Sains',
                'sort_order' => 3,
                'is_active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Kegiatan Olahraga dan Kebersamaan',
                'description' => 'Contoh dokumentasi aktivitas bersama untuk membangun kebugaran, kedisiplinan, dan sportivitas.',
                'image' => 'https://images.unsplash.com/photo-1529390079861-591de354faf5?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Olahraga',
                'sort_order' => 4,
                'is_active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Momen Prestasi dan Apresiasi',
                'description' => 'Contoh konten untuk menampilkan pencapaian siswa dan apresiasi atas usaha mereka.',
                'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Prestasi',
                'sort_order' => 5,
                'is_active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Lingkungan Sekolah yang Mendukung',
                'description' => 'Contoh dokumentasi suasana sekolah yang nyaman sebagai tempat tumbuh, belajar, dan berkolaborasi.',
                'image' => 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Lingkungan Sekolah',
                'sort_order' => 6,
                'is_active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
