<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoPostsSeeder extends Seeder
{
    public function run()
    {
        $table = $this->db->table('posts');
        $now = date('Y-m-d H:i:s');

        $posts = [
            [
                'title' => 'SMPIT Al Firdaus Purwodadi: Membangun Generasi Berakhlak dan Berprestasi',
                'slug' => 'smpit-al-firdaus-generasi-berakhlak-berprestasi',
                'category' => 'berita',
                'excerpt' => 'Pendidikan Islam terpadu menggabungkan pembinaan karakter, pembelajaran akademik, dan pengembangan potensi siswa.',
                'content' => "SMPIT Al Firdaus Purwodadi berkomitmen mendampingi siswa agar tumbuh menjadi generasi yang berakhlak baik, berilmu, mandiri, dan berprestasi.\n\nMelalui kegiatan pembelajaran dan pembiasaan positif di sekolah, siswa didorong untuk mengembangkan kemampuan akademik, karakter Islami, serta keterampilan yang bermanfaat bagi masa depan.\n\nCatatan: Ini adalah konten contoh sementara untuk pratinjau website. Silakan ganti dengan berita resmi sekolah.",
                'image' => null,
                'author' => 'Admin Website',
                'status' => 'published',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Mengenal Program Unggulan TCP, ICP, dan ICT',
                'slug' => 'mengenal-program-tcp-icp-ict',
                'category' => 'kegiatan',
                'excerpt' => 'Program unggulan dirancang untuk mendukung tahfiz, wawasan internasional, serta kecakapan teknologi informasi.',
                'content' => "SMPIT Al Firdaus memiliki program unggulan yang mendukung pengembangan potensi siswa. TCP berfokus pada pembinaan tahfiz, ICP mendukung pembelajaran dengan wawasan internasional, sedangkan ICT memperkenalkan keterampilan teknologi informasi.\n\nRincian kegiatan, jadwal, dan capaian setiap program dapat ditambahkan oleh pengelola sekolah.\n\nCatatan: Ini adalah konten contoh sementara, bukan pengumuman jadwal atau kegiatan yang sudah berlangsung.",
                'image' => null,
                'author' => 'Admin Website',
                'status' => 'published',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Informasi Penerimaan Peserta Didik Tahun Ajaran 2027/2028',
                'slug' => 'informasi-ppdb-2027-2028',
                'category' => 'pengumuman',
                'excerpt' => 'Informasi awal bagi orang tua yang ingin mengenal proses pendataan peminat dan penerimaan siswa baru.',
                'content' => "Selamat datang di halaman informasi penerimaan peserta didik SMPIT Al Firdaus Purwodadi. Halaman ini disiapkan untuk membantu orang tua memperoleh informasi awal mengenai proses penerimaan siswa baru.\n\nTanggal pendaftaran, persyaratan, biaya, kuota, dan alur resmi harus diisi serta diverifikasi oleh pihak sekolah sebelum diumumkan kepada masyarakat.\n\nCatatan: Ini hanya contoh sementara untuk melihat tampilan halaman berita. Jangan jadikan teks ini sebagai pengumuman resmi.",
                'image' => null,
                'author' => 'Admin Website',
                'status' => 'published',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($posts as $post) {
            $exists = $this->db->table('posts')
                ->where('slug', $post['slug'])
                ->countAllResults();

            if ($exists === 0) {
                $table->insert($post);
            }
        }
    }
}
