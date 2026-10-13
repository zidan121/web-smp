<?php

namespace App\Controllers;

use App\Models\ProgramModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Program extends BaseController
{
    public function index()
    {
        $programs = (new ProgramModel())
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        return view('program/index', ['programs' => $programs]);
    }

    public function detail(string $slug)
    {
        $program = (new ProgramModel())
            ->where('slug', $slug)
            ->where('is_active', 1)
            ->first();

        if (! $program) {
            throw PageNotFoundException::forPageNotFound('Program tidak ditemukan.');
        }

        return view('program/detail', ['program' => $program]);
    }
}