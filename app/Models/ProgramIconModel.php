<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramIconModel extends Model
{
    protected $table            = 'program_icons';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $allowedFields = [
        'name',
        'slug',
        'icon_type',
        'icon_value',
    ];
}