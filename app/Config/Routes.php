<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter'  => 'LoginFilter']);
$routes->get('coba', 'Farmasi::Coba', ['filter'  => 'LoginFilter']);
$routes->get('error', 'Home::error', ['filter'  => 'LoginFilter']);
$routes->get('getJson', 'Home::Json');
$routes->get('login', 'Akses::index', ['filter'  => 'DashboardFilter']);
$routes->post('akses', 'Akses::login');
$routes->get('logout', 'Akses::logout');
$routes->get('interface', 'Home::Interface');
$routes->get('antrianA', 'Home::antrianA');
$routes->get('antrianB', 'Home::antrianB');
$routes->get('antrian', 'Home::antrian');
$routes->get('truncate', 'Home::delete');

// route untuk user
$routes->group('user', static function ($routes) {
    $routes->get('view', 'Users::user', ['filter'  => 'LoginFilter', 'filter'   => 'HakAkses']);
    $routes->get('json', 'Users::Json');
    $routes->get('tambah-user', 'Users::tambah_user', ['filter'  => 'LoginFilter', 'filter'   => 'HakAkses']);
    $routes->post('add-user', 'Users::add_user');
    $routes->get('edit-user/(:any)', 'Users::edit_user/$1', ['filter'  => 'LoginFilter', 'filter'   => 'HakAkses']);
    $routes->post('edit-user/(:any)', 'Users::update_user/$1');
    $routes->delete('delete-user/(:any)', 'Users::delete_user/$1', ['filter'  => 'LoginFilter', 'filter'   => 'HakAkses']);
});
// route untuk level
$routes->group('level', static function ($routes) {
    $routes->get('view', 'Users::level', ['filter'  => 'LoginFilter', 'filter'   => 'HakAkses']);
    $routes->get('tambah-level', 'Users::tambah_level', ['filter'  => 'LoginFilter', 'filter'   => 'HakAkses']);
    $routes->post('add-level', 'Users::add_level');
    $routes->get('edit-level/(:any)', 'Users::edit_level/$1', ['filter'  => 'LoginFilter', 'filter'   => 'HakAkses']);
    $routes->post('edit-level/(:any)', 'Users::update_level/$1');
    $routes->delete('delete-level/(:any)', 'Users::delete_level/$1');
});
// route untuk Farmasi pemanggilan
$routes->group('farmasi', static function ($routes) {
    $routes->get('view', 'Farmasi::index', ['filter'  => 'LoginFilter']);
    $routes->post('Tambah', 'Farmasi::tambah');
    $routes->post('editA/(:any)', 'Farmasi::editA/$1', ['filter'  => 'LoginFilter']);
    $routes->post('editB/(:any)', 'Farmasi::editB/$1', ['filter'  => 'LoginFilter']);
    $routes->get('Print/(:any)', 'Farmasi::Print/$1', ['filter'  => 'LoginFilter']);
});
