<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// ================================================================
// PUBLIC ROUTES (Landing Page & Profil Desa - Tanpa Auth)
// ================================================================
$routes->get('/', 'Beranda::index');
$routes->get('profil', 'Beranda::profil');
$routes->get('kependudukan', 'Beranda::kependudukan');
$routes->get('pendidikan', 'Beranda::pendidikan');
$routes->get('kesehatan', 'Beranda::kesehatan');
$routes->get('pertanian', 'Beranda::pertanian');

// ================================================================
// PUBLIC ROUTES (Auth)
// ================================================================
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::doLogin');
$routes->get('logout', 'Auth::logout');

// ================================================================
// PROTECTED ROUTES (Harus Login)
// ================================================================
$routes->group('', ['filter' => 'auth'], function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'Dashboard::index');

    // ---- Penerima Bantuan ----
    $routes->get('penerima', 'PenerimaBantuan::index');
    $routes->get('penerima/create', 'PenerimaBantuan::create');
    $routes->post('penerima/store', 'PenerimaBantuan::store');
    $routes->get('penerima/show/(:num)', 'PenerimaBantuan::show/$1');
    $routes->get('penerima/edit/(:num)', 'PenerimaBantuan::edit/$1');
    $routes->post('penerima/update/(:num)', 'PenerimaBantuan::update/$1');
    $routes->get('penerima/delete/(:num)', 'PenerimaBantuan::delete/$1');

    // ---- Jenis Bantuan (admin only) ----
    $routes->group('jenis-bantuan', ['filter' => 'auth:admin'], function ($routes) {
        $routes->get('/', 'JenisBantuan::index');
        $routes->get('create', 'JenisBantuan::create');
        $routes->post('store', 'JenisBantuan::store');
        $routes->get('edit/(:num)', 'JenisBantuan::edit/$1');
        $routes->post('update/(:num)', 'JenisBantuan::update/$1');
        $routes->get('delete/(:num)', 'JenisBantuan::delete/$1');
    });

    // ---- Pengajuan Bantuan ----
    $routes->get('pengajuan', 'PengajuanBantuan::index');
    $routes->get('pengajuan/create', 'PengajuanBantuan::create');
    $routes->post('pengajuan/store', 'PengajuanBantuan::store');
    $routes->get('pengajuan/show/(:num)', 'PengajuanBantuan::show/$1');
    $routes->get('pengajuan/edit/(:num)', 'PengajuanBantuan::edit/$1');
    $routes->post('pengajuan/update/(:num)', 'PengajuanBantuan::update/$1');
    $routes->get('pengajuan/delete/(:num)', 'PengajuanBantuan::delete/$1');

    // Verifikasi: hanya admin & lurah
    $routes->group('pengajuan', ['filter' => 'auth:admin,lurah'], function ($routes) {
        $routes->get('verifikasi/(:num)', 'PengajuanBantuan::verifikasi/$1');
        $routes->post('proses-verifikasi/(:num)', 'PengajuanBantuan::prosesVerifikasi/$1');
    });

    // ---- Penyaluran Bantuan ----
    $routes->get('penyaluran', 'PenyaluranBantuan::index');
    $routes->get('penyaluran/create', 'PenyaluranBantuan::create');
    $routes->post('penyaluran/store', 'PenyaluranBantuan::store');
    $routes->get('penyaluran/show/(:num)', 'PenyaluranBantuan::show/$1');
    $routes->get('penyaluran/delete/(:num)', 'PenyaluranBantuan::delete/$1');

    // ---- Laporan ----
    $routes->get('laporan', 'Laporan::index');
    $routes->get('laporan/cetak', 'Laporan::cetak');
    $routes->get('laporan/export-excel', 'Laporan::exportExcel');
    $routes->get('laporan/per-penerima', 'Laporan::perPenerima');

    // ---- Manajemen Pengguna (admin only) ----
    $routes->group('pengguna', ['filter' => 'auth:admin'], function ($routes) {
        $routes->get('/', 'Pengguna::index');
        $routes->get('create', 'Pengguna::create');
        $routes->post('store', 'Pengguna::store');
        $routes->get('edit/(:num)', 'Pengguna::edit/$1');
        $routes->post('update/(:num)', 'Pengguna::update/$1');
        $routes->get('delete/(:num)', 'Pengguna::delete/$1');
    });
});
