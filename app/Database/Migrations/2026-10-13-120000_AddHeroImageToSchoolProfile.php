<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddHeroImageToSchoolProfile extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('school_profile') && ! $this->db->fieldExists('hero_image', 'school_profile')) {
            $this->forge->addColumn('school_profile', [
                'hero_image' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true,
                    'after' => 'profile_image',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->tableExists('school_profile') && $this->db->fieldExists('hero_image', 'school_profile')) {
            $this->forge->dropColumn('school_profile', 'hero_image');
        }
    }
}
