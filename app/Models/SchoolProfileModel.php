<?php

namespace App\Models;

use CodeIgniter\Model;

class SchoolProfileModel extends Model
{
    protected $table            = 'school_profile';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $allowedFields = [
        'school_name',
        'tagline',
        'about',
        'vision',
        'mission',
        'address',
        'phone',
        'email',
        'logo',
        'profile_image',
        'profile_video_url',
    ];
}