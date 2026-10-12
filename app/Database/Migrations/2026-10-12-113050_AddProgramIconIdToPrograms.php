<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProgramIconIdToPrograms extends Migration
{
    public function up()
    {
        if (! $this->db->fieldExists('program_icon_id', 'programs')) {
            $this->forge->addColumn('programs', [
                'program_icon_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => true,
                    'default' => null,
                    'after' => 'icon',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('program_icon_id', 'programs')) {
            $this->forge->dropColumn('programs', 'program_icon_id');
        }
    }
}