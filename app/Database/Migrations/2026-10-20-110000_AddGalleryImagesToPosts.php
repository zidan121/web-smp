<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGalleryImagesToPosts extends Migration
{
    public function up()
    {
        if (! $this->db->fieldExists('gallery_images', 'posts')) {
            $this->forge->addColumn('posts', [
                'gallery_images' => [
                    'type' => 'TEXT',
                    'null' => true,
                    'after' => 'image',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('gallery_images', 'posts')) {
            $this->forge->dropColumn('posts', 'gallery_images');
        }
    }
}
