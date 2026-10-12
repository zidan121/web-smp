<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('berita', 'Berita::index');
$routes->get('berita/(:segment)', 'Berita::detail/$1');
$routes->get('admin', static function () {
    return redirect()->to('/admin/dashboard');
});
$routes->get('admin/login', 'Admin::login');
$routes->post('admin/login', 'Admin::authenticate');
$routes->get('admin/dashboard', 'Admin::dashboard');
$routes->get('admin/settings', 'AdminSettings::index');
$routes->post('admin/settings/simpan', 'AdminSettings::save');
$routes->get('admin/posts', 'AdminPosts::index');
$routes->post('admin/posts/simpan', 'AdminPosts::save');
$routes->post('admin/posts/hapus/(:num)', 'AdminPosts::delete/$1');
$routes->get('admin/logout', 'Admin::logout');
$routes->get('admin/profil', 'AdminProfile::index');
$routes->post('admin/profil/simpan', 'AdminProfile::save');
$routes->get('admin/programs', 'AdminPrograms::index');
$routes->post('admin/programs/simpan', 'AdminPrograms::save');
$routes->post('admin/programs/hapus/(:num)', 'AdminPrograms::delete/$1');
$routes->get('admin/program-icons', 'AdminProgramIcons::index');
$routes->post('admin/program-icons/simpan', 'AdminProgramIcons::save');
$routes->post('admin/program-icons/hapus/(:num)', 'AdminProgramIcons::delete/$1');
$routes->get('prestasi', 'Prestasi::index');
