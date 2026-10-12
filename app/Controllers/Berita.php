<?php

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Berita extends BaseController
{
    public function index()
    {
        $posts = (new PostModel())
            ->where('status', 'published')
            ->orderBy('published_at', 'DESC')
            ->findAll();

        return view('berita/index', ['posts' => $posts]);
    }

    public function detail(string $slug)
    {
        $post = (new PostModel())
            ->where('slug', $slug)
            ->where('status', 'published')
            ->first();

        if (! $post) {
            throw PageNotFoundException::forPageNotFound('Berita tidak ditemukan.');
        }

        return view('berita/detail', ['post' => $post]);
    }
}
