<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProgramIcons extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 120,
            ],
            'icon_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'builtin',
            ],
            'icon_value' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('slug');
        $this->forge->createTable('program_icons', true);
    }

    public function down()
    {
        $this->forge->dropTable('program_icons', true);
    }
}