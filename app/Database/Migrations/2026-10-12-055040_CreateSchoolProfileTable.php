<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSchoolProfileTable extends Migration
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
            'school_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
            ],
            'tagline' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'about' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'vision' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'mission' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => true,
            ],
            'logo' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
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
        $this->forge->createTable('school_profile');
    }

    public function down()
    {
        $this->forge->dropTable('school_profile', true);
    }
}