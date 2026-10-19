<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AchievementDemoSeeder extends Seeder
{
    public function run()
    {
        $table = $this->db->table('achievements');
        $now = date('Y-m-d H:i:s');

        // Seed aman dijalankan berulang: tidak menggandakan judul demo yang sudah ada.
        $achievements = [
            [
                'title' => 'Juara Olimpiade Sains — Data Demo',
                'student_name' => 'Nama Siswa Contoh',
                'competition' => 'Olimpiade Sains Tingkat Kabupaten',
                'level' => 'Kabupaten',
                'achievement_date' => '2026-02-14',
                'description' => 'DATA DEMO: Contoh konten untuk pratinjau tampilan prestasi akademik. Ganti dengan capaian dan dokumentasi resmi sekolah sebelum dipublikasikan.',
                'image' => null,
                'is_active' => 1,
            ],
            [
                'title' => 'Juara Lomba Tahfiz Al-Qur’an — Data Demo',
                'student_name' => 'Nama Siswa Contoh',
                'competition' => 'Lomba Tahfiz Al-Qur’an',
                'level' => 'Kecamatan',
                'achievement_date' => '2026-03-08',
                'description' => 'DATA DEMO: Contoh entri prestasi bidang keislaman. Nama peserta, lomba, tanggal, dan hasil pada entri ini bukan catatan prestasi terverifikasi.',
                'image' => null,
                'is_active' => 1,
            ],
            [
                'title' => 'Finalis Kompetisi Teknologi dan ICT — Data Demo',
                'student_name' => 'Tim ICT Contoh',
                'competition' => 'Kompetisi Inovasi Teknologi Pelajar',
                'level' => 'Provinsi',
                'achievement_date' => '2026-04-21',
                'description' => 'DATA DEMO: Contoh untuk menampilkan prestasi bidang teknologi. Ganti dengan nama tim, kompetisi, dan hasil resmi.',
                'image' => null,
                'is_active' => 1,
            ],
            [
                'title' => 'Juara Lomba Olahraga Antarsekolah — Data Demo',
                'student_name' => 'Tim Olahraga Contoh',
                'competition' => 'Pertandingan Olahraga Pelajar',
                'level' => 'Kabupaten',
                'achievement_date' => '2026-05-17',
                'description' => 'DATA DEMO: Contoh entri prestasi nonakademik untuk menguji tampilan kartu, label tingkat, dan tanggal prestasi.',
                'image' => null,
                'is_active' => 1,
            ],
            [
                'title' => 'Penghargaan Karya Kreatif Siswa — Data Demo',
                'student_name' => 'Kelompok Siswa Contoh',
                'competition' => 'Pameran Karya dan Kreativitas Pelajar',
                'level' => 'Sekolah',
                'achievement_date' => '2026-06-02',
                'description' => 'DATA DEMO: Contoh penghargaan karya siswa. Entri ini hanya untuk sementara dan perlu diganti atau dihapus sebelum publikasi resmi.',
                'image' => null,
                'is_active' => 1,
            ],
        ];

        foreach ($achievements as $achievement) {
            $exists = $table->where('title', $achievement['title'])->countAllResults();
            if ($exists === 0) {
                $table->insert($achievement + [
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
