<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertStudentAchievements extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('achievements')) { return; }
        $rows = [
            ['title'=>'Juara 2 Lomba Panahan — Barebow SMP 15 Meter Putra','student_name'=>'Rafandra Filbert dan Kenzie Alif Vio','competition'=>'Islamic Youth Festival JSIT — Panahan Barebow SMP 15 Meter Putra','level'=>'JSIT','achievement_date'=>null,'description'=>'Selamat kepada Rafandra Filbert dan Kenzie Alif Vio, siswa kelas VIII B SMPIT Al Firdaus Purwodadi, atas raihan Juara 2 Lomba Panahan dalam Islamic Youth Festival JSIT kategori Barebow SMP 15 meter putra. Semoga prestasi ini menjadi penyemangat untuk terus berlatih dan menjaga sportivitas.','image'=>null,'is_active'=>1],
            ['title'=>'Juara 3 Lomba Panahan — SMP Standar Nasional 15 Meter Putra','student_name'=>'Ramadhan Yusuf Alghazali','competition'=>'Islamic Youth Festival JSIT — Panahan SMP Standar Nasional 15 Meter Putra','level'=>'JSIT','achievement_date'=>null,'description'=>'Selamat kepada Ramadhan Yusuf Alghazali, siswa kelas VII B SMPIT Al Firdaus Purwodadi, yang meraih Juara 3 Lomba Panahan dalam Islamic Youth Festival JSIT kategori SMP Standar Nasional 15 meter putra. Semoga menjadi awal dari pencapaian berikutnya.','image'=>null,'is_active'=>1],
            ['title'=>'Juara 3 Lomba Kaligrafi Tingkat Kabupaten — Kategori Putra','student_name'=>'Bima Sakti Arya Wibowo','competition'=>'Lomba Kaligrafi Tingkat Kabupaten, Kategori Putra','level'=>'Kabupaten','achievement_date'=>null,'description'=>'Barakallah kepada Bima Sakti Arya Wibowo, siswa kelas VIII B SMPIT Al Firdaus Purwodadi, atas prestasi Juara 3 Lomba Kaligrafi tingkat kabupaten kategori putra. Semoga prestasi ini menambah iman dan ketekunan serta menjadi motivasi untuk terus berkarya.','image'=>null,'is_active'=>1],
            ['title'=>'Medali Perunggu Babak Final Olimpiade Matematika Nasional (OMN) Season 2','student_name'=>'Muhammad Alfin Muhsinin','competition'=>'Babak Final OMN Season 2 — PT Mentari Competition Indonesia','level'=>'Nasional','achievement_date'=>null,'description'=>'Selamat kepada Muhammad Alfin Muhsinin yang meraih medali perunggu dalam Babak Final OMN (Olimpiade Matematika Nasional) Season 2 yang diselenggarakan oleh PT Mentari Competition Indonesia. Semoga menjadi pemicu semangat untuk terus belajar dan menebar kebaikan.','image'=>null,'is_active'=>1],
            ['title'=>'Juara 2 Lomba Kaligrafi MAPSI Sub Rayon 03 Tahun 2026 — Kategori Putra','student_name'=>'Bima Sakti Arya Wibowo','competition'=>'MAPSI Sub Rayon 03 Tahun 2026 — Lomba Kaligrafi Kategori Putra','level'=>'Sub Rayon','achievement_date'=>null,'description'=>'Barakallah kepada Bima Sakti Arya Wibowo, siswa kelas VIII B SMPIT Al Firdaus Purwodadi, atas raihan Juara 2 Lomba Kaligrafi kategori putra pada MAPSI Sub Rayon 03 Tahun 2026. Semoga menjadi motivasi untuk terus meningkatkan kemampuan.','image'=>null,'is_active'=>1],
        ];
        $now = date('Y-m-d H:i:s');
        foreach ($rows as $row) {
            if ($this->db->table('achievements')->where('title', $row['title'])->countAllResults() > 0) { continue; }
            $row['created_at'] = $now; $row['updated_at'] = $now;
            $this->db->table('achievements')->insert($row);
        }
    }
    public function down() {}
}
