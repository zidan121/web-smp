<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageAndIconToPrograms extends Migration
{
    public function up()
    {
        if (!$this->db->fieldExists('image', 'programs')) {
            $this->forge->addColumn('programs', [
                'image' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
            ]);
        }

        if (!$this->db->fieldExists('icon', 'programs')) {
            $this->forge->addColumn('programs', [
                'icon' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 50,
                    'default'    => 'graduation-cap',
                    'null'       => false,
                ],
            ]);
        }
    }

    public function down()
    {
        // Tidak menghapus kolom agar data yang sudah ada tetap aman.
    }
}