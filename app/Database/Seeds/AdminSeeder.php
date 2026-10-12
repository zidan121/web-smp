<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $username = 'admin';

        // Jangan membuat akun duplikat.
        $existing = $this->db->table('admins')
            ->where('username', $username)
            ->get()
            ->getRowArray();

        if ($existing) {
            echo "Akun admin sudah tersedia.\n";
            return;
        }

        // Ganti password sementara ini sebelum menjalankan seeder.
        $password = 'adminnn2026';

        $this->db->table('admins')->insert([
            'username'   => $username,
            'password'   => password_hash($password, PASSWORD_DEFAULT),
            'full_name'  => 'Administrator SMPIT Al Firdaus',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        echo "Akun admin berhasil dibuat.\n";
        echo "Username: admin\n";
        echo "Gunakan password yang kamu atur di file AdminSeeder.php.\n";
    }
}