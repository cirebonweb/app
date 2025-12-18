<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', ['filter' => 'session']);
$routes->get('whmtes', 'Home::whm');
$routes->get('grup', 'Home::grup');
// $routes->get('admin', 'Admin\Dashboard::index', ['filter' => 'group:admin']);
// $routes->get('admin/produk', 'Admin\Produk\Produk::index', ['filter' => 'group:admin']);
// $routes->get('admin/produk/kategori', 'Admin\Produk\ProdukKategori::index', ['filter' => 'group:admin']);
// $routes->get('admin/invoice', 'Admin\Invoice\Invoice::index', ['filter' => 'group:admin']);
// $routes->get('admin/invoice/pembayaran', 'Admin\Invoice\InvoicePembayaran::index', ['filter' => 'group:admin']);

$routes->group('admin', ['filter' => 'group:admin'], function($routes) {
    $routes->get('', 'Admin\Dashboard::index');

    $routes->group('api', ['namespace' => 'App\Controllers\Admin\Api'], function ($routes) {
        $routes->get('server', 'ApiServer::index');
        $routes->post('server/tabel', 'ApiServer::tabel');
        $routes->post('server/tesapi', 'ApiServer::tesApi');
        $routes->post('server/simpan', 'ApiServer::simpan');
    });

    $routes->get('produk', 'Admin\Produk::index');
    $routes->post('produk/simpan', 'Admin\Produk::simpan');
    $routes->post('produk/update', 'Admin\Produk::update');
    $routes->get('produk/edit/(:num)', 'Admin\Produk::edit/$1');
    $routes->post('produk/update/(:num)', 'Admin\Produk::update/$1');
    $routes->get('produk/hapus/(:num)', 'Admin\Produk::delete/$1');

    $routes->get('layanan', 'Admin\Layanan::index');
    $routes->get('layanan/tambah', 'Admin\Layanan::create');
    $routes->post('layanan/simpan', 'Admin\Layanan::store');

    $routes->get('invoice', 'Admin\Invoice::index');
});

// # Produk
// /admin/produk               -> list semua produk
// /admin/produk/tambah        -> tambah produk
// /admin/produk/edit/{id}     -> ubah produk
// /admin/produk/hapus/{id}    -> hapus produk
// /admin/produk/detail/{id}   -> detail produk

// # Layanan
// /admin/layanan              -> list semua layanan aktif
// /admin/layanan/tambah       -> tambah layanan baru (pilih user + produk)
// /admin/layanan/edit/{id}    -> ubah detail layanan
// /admin/layanan/hapus/{id}   -> hapus layanan
// /admin/layanan/detail/{id}  -> lihat info layanan (termasuk masa aktif)

// # Invoice
// /admin/invoice              -> daftar invoice
// /admin/invoice/detail/{id}  -> detail invoice
// /admin/invoice/cetak/{id}   -> generate PDF invoice
// /admin/invoice/status/{id}  -> ubah status bayar/unpaid

// # Notifikasi (nanti)
// /admin/notifikasi           -> daftar log notifikasi terkirim
// /admin/notifikasi/kirim/{id} -> trigger ulang notifikasi manual


service('cirebonweb')->profil()->routes($routes, ['filter' => 'session']);
service('cirebonweb')->userList()->routes($routes, ['filter' => 'group:admin']);
service('cirebonweb')->userLogin()->routes($routes, ['filter' => 'group:admin']);
service('cirebonweb')->statistik()->routes($routes, ['filter' => 'group:admin']);
service('cirebonweb')->settingUmum()->routes($routes, ['filter' => 'group:admin']);
service('cirebonweb')->settingCache()->routes($routes, ['filter' => 'group:admin']);
service('cirebonweb')->settingOptimasi()->routes($routes, ['filter' => 'group:admin']);
service('cirebonweb')->log()->routes($routes, ['filter' => 'group:admin']);

service('auth')->routes($routes, ['except' => ['login', 'magic-link']]);
service('cirebonweb')->auth()->routes($routes);