<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProfileVideoUrlToSchoolProfile extends Migration
{
    public function up()
    {
        $this->forge->addColumn('school_profile', [
            'profile_video_url' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => true,
                'after' => 'profile_image',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('school_profile', 'profile_video_url');
    }
}