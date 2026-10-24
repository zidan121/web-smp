<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('program', 'Program::index');
$routes->get('program/(:segment)', 'Program::detail/$1');
$routes->get('pps', static function () {
    return view('pps/index');
});
$routes->get('profil', static function () {
    return redirect()->to(site_url('/#profil'));
});
$routes->get('berita', 'Berita::index');
$routes->get('berita/(:segment)', 'Berita::detail/$1');
$routes->get('galeri', 'Galeri::index');
$routes->get('galeri/(:num)', 'Galeri::detail/$1');
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
$routes->post('admin/logout', 'Admin::logout');
$routes->get('admin/profil', 'AdminProfile::index');
$routes->post('admin/profil/simpan', 'AdminProfile::save');
$routes->get('admin/programs', 'AdminPrograms::index');
$routes->post('admin/programs/simpan', 'AdminPrograms::save');
$routes->post('admin/programs/hapus/(:num)', 'AdminPrograms::delete/$1');
$routes->get('admin/program-icons', 'AdminProgramIcons::index');
$routes->post('admin/program-icons/simpan', 'AdminProgramIcons::save');
$routes->post('admin/program-icons/hapus/(:num)', 'AdminProgramIcons::delete/$1');
$routes->get('prestasi', 'Prestasi::index');
$routes->get('admin/achievements', 'AdminAchievements::index');
$routes->post('admin/achievements/simpan', 'AdminAchievements::save');
$routes->post('admin/achievements/hapus/(:num)', 'AdminAchievements::delete/$1');
$routes->get('admin/galleries', 'AdminGalleries::index');
$routes->post('admin/galleries/simpan', 'AdminGalleries::save');
$routes->post('admin/galleries/hapus/(:num)', 'AdminGalleries::delete/$1');
