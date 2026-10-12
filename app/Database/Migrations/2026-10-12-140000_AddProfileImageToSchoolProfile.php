<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProfileImageToSchoolProfile extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('school_profile') && ! $this->db->fieldExists('profile_image', 'school_profile')) {
            $this->forge->addColumn('school_profile', [
                'profile_image' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true,
                    'after' => 'logo',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->tableExists('school_profile') && $this->db->fieldExists('profile_image', 'school_profile')) {
            $this->forge->dropColumn('school_profile', 'profile_image');
        }
    }
}
