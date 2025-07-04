<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// startup






$routes->get('/', 'Home::index');

$routes->get('about', 'Home::about');
$routes->get('contactus', 'Home::contactus');
$routes->get('dashboard-customer', 'Home::dashboard');
$routes->get('shop', 'Home::shop'); 
$routes->get('detail', 'Home::detail'); 

$routes->get('cart', 'CartController::index');
$routes->post('cart/add_to_cart', 'CartController::add_cart');
$routes->post('cart/checkout', 'CartController::checkout');
$routes->get('cart/getCartCount', 'CartController::getCartCount');
$routes->post('cart/hapusCart/(:num)', 'CartController::hapus/$1');
$routes->get('cart/getCartItems', 'CartController::getCartItems');
$routes->post('cart/updateQuantity', 'CartController::updateQuantity');


$routes->get('shoptest', 'Home::shoptest'); 
$routes->get('blog', 'Home::blog'); 
$routes->get('mitra', 'Home::mitra'); 
$routes->get('testimonial', 'Home::testimonial');

$routes->get('register', 'Auth::register');
$routes->post('auth/register', 'Auth::add_register');
$routes->post('/get-content', 'Auth::getContent');

$routes->get('login', 'Auth::index');
$routes->post('auth/login', 'Auth::login'); // Proses login
$routes->get('auth/logout', 'Auth::logout'); // Proses logout

// $routes->get('admin/dashboard', 'Admin::dashboard'); // Halaman dashboard untuk admin
// $routes->get('superadmin/dashboard', 'SuperAdmin::dashboard'); // Halaman dashboard untuk superadmin


$routes->group('deposit', function($routes) {
    $routes->get('/', 'CustomerDepositController::index');
    $routes->get('create', 'CustomerDepositController::create');
    $routes->post('store', 'CustomerDepositController::store');
});


$routes->group('profile', function($routes) {
    $routes->get('/', 'CustomerProfileController::index');
    $routes->post('update', 'CustomerProfileController::update');
});


$routes->get('dashboard', 'DashboardController::dashboard');
$routes->get('profile-admin', 'MyProfileController::index');
$routes->post('update-profile-admin', 'MyProfileController::update');


// MANAGE SISWA
    $routes->get('manage-siswa/', 'ManageSiswaController::index');
    $routes->get('manage-siswa/create', 'ManageSiswaController::create');
    $routes->post('manage-siswa/store', 'ManageSiswaController::store');
    $routes->get('manage-siswa/edit/(:num)', 'ManageSiswaController::edit/$1');
    $routes->post('manage-siswa/update/(:num)', 'ManageSiswaController::update/$1');
    $routes->post('manage-siswa/delete/(:num)', 'ManageSiswaController::delete/$1');
    $routes->get('manage-siswa/delete/(:num)', 'ManageSiswaController::delete/$1');

        // MANAGE INDUSTRI - Perusahaan
    $routes->get('manage-admin/', 'ManageAdminController::index');
    $routes->get('manage-admin/create', 'ManageAdminController::create');
    $routes->post('manage-admin/store', 'ManageAdminController::store');
    $routes->get('manage-admin/edit/(:num)', 'ManageAdminController::edit/$1');
    $routes->post('manage-admin/update/(:num)', 'ManageAdminController::update/$1');
    $routes->post('manage-admin/delete/(:num)', 'ManageAdminController::delete/$1');
    $routes->get('manage-admin/delete/(:num)', 'ManageAdminController::delete/$1');

// MANAGE INDUSTRI - Perusahaan
    $routes->get('manage-indper/', 'ManageIndPerController::index');
    $routes->get('manage-indper/create', 'ManageIndPerController::create');
    $routes->post('manage-indper/store', 'ManageIndPerController::store');
    $routes->get('manage-indper/edit/(:num)', 'ManageIndPerController::edit/$1');
    $routes->post('manage-indper/update/(:num)', 'ManageIndPerController::update/$1');
    $routes->post('manage-indper/delete/(:num)', 'ManageIndPerController::delete/$1');
    $routes->get('manage-indper/delete/(:num)', 'ManageIndPerController::delete/$1');

    // MANAGE CUSTOMER
    $routes->get('manage-customer/', 'ManageCustomerController::index');
    $routes->get('manage-customer/create', 'ManageCustomerController::create');
    $routes->post('manage-customer/store', 'ManageCustomerController::store');
    $routes->get('manage-customer/edit/(:num)', 'ManageCustomerController::edit/$1');
    $routes->post('manage-customer/update/(:num)', 'ManageCustomerController::update/$1');
    $routes->post('manage-customer/delete/(:num)', 'ManageCustomerController::delete/$1');
    $routes->get('manage-customer/delete/(:num)', 'ManageCustomerController::delete/$1');
    
    // MANAGE KELAS
    $routes->get('manage-kelas/', 'ManageKelasController::index');
    $routes->get('manage-kelas/create', 'ManageKelasController::create');
    $routes->post('manage-kelas/store', 'ManageKelasController::store');
    $routes->get('manage-kelas/edit/(:num)', 'ManageKelasController::edit/$1');
    $routes->post('manage-kelas/update/(:num)', 'ManageKelasController::update/$1');
    $routes->post('manage-kelas/delete/(:num)', 'ManageKelasController::delete/$1');
    $routes->get('manage-kelas/delete/(:num)', 'ManageKelasController::delete/$1');

    // MANAGE KATEGORI PRODUK
    $routes->get('manage-kategori-product/', 'ManageKategoriProductController::index');
    $routes->get('manage-kategori-product/create', 'ManageKategoriProductController::create');
    $routes->post('manage-kategori-product/store', 'ManageKategoriProductController::store');
    $routes->get('manage-kategori-product/edit/(:num)', 'ManageKategoriProductController::edit/$1');
    $routes->post('manage-kategori-product/update/(:num)', 'ManageKategoriProductController::update/$1');
    $routes->post('manage-kategori-product/delete/(:num)', 'ManageKategoriProductController::delete/$1');
    $routes->get('manage-kategori-product/delete/(:num)', 'ManageKategoriProductController::delete/$1');

    // MANAGE PRODUCT SISWA
    $routes->group('manage-product-siswa', function ($routes) {
        $routes->get('/', 'ManageProductSiswaController::index'); // Menampilkan daftar produk
        $routes->get('create', 'ManageProductSiswaController::create'); // Menampilkan form tambah produk
        $routes->post('store', 'ManageProductSiswaController::store'); // Menyimpan data produk baru
        $routes->get('edit/(:num)', 'ManageProductSiswaController::edit/$1'); // Menampilkan form edit produk
        $routes->post('update/(:num)', 'ManageProductSiswaController::update/$1'); // Menyimpan perubahan data produk
        $routes->get('delete/(:num)', 'ManageProductSiswaController::delete/$1'); // Menghapus data produk
        $routes->get('delete-image/(:num)', 'ManageProductSiswaController::deleteImage/$1'); // Menghapus gambar produk
        $routes->get('detail/(:num)', 'ManageProductSiswaController::detail/$1'); // Menampilkan detail produk (opsional)
    });

    // MANAGE PAJAK
    $routes->group('manage-pajak', function ($routes) {
        $routes->get('/', 'PajakController::index');
        $routes->get('create', 'PajakController::create');
        $routes->post('store', 'PajakController::store');
        $routes->get('edit/(:num)', 'PajakController::edit/$1');
        $routes->post('update/(:num)', 'PajakController::update/$1');
        $routes->get('delete/(:num)', 'PajakController::delete/$1');
    });

    // MANAGE PRDER PRODUCT SISWA
    $routes->group('manage-order-product-siswa', function ($routes) {
        $routes->get('/', 'ManageOrderProductSiswaController::index'); // Menampilkan daftar produk
        $routes->get('create', 'ManageOrderProductSiswaController::create'); // Menampilkan form tambah produk
        $routes->post('store', 'ManageOrderProductSiswaController::store'); // Menyimpan data produk baru
        $routes->get('edit/(:num)', 'ManageOrderProductSiswaController::edit/$1'); // Menampilkan form edit produk
        $routes->post('update/(:num)', 'ManageOrderProductSiswaController::update/$1'); // Menyimpan perubahan data produk
        $routes->get('delete/(:num)', 'ManageOrderProductSiswaController::delete/$1'); // Menghapus data produk
        $routes->get('delete-image/(:num)', 'ManageOrderProductSiswaController::deleteImage/$1'); // Menghapus gambar produk
        $routes->get('detail/(:num)', 'ManageOrderProductSiswaController::detail/$1'); // Menampilkan detail produk (opsional)
    });

    $routes->group('manage-product-indper', function ($routes) {
        $routes->get('/', 'ManageProductIndperController::index');
        $routes->get('create', 'ManageProductIndperController::create');
        $routes->post('store', 'ManageProductIndperController::store');
        $routes->get('edit/(:num)', 'ManageProductIndperController::edit/$1');
        $routes->post('update/(:num)', 'ManageProductIndperController::update/$1');
        $routes->get('delete/(:num)', 'ManageProductIndperController::delete/$1');
        $routes->get('delete-image/(:num)', 'ManageProductIndperController::deleteImage/$1');
    });


    $routes->group('manage-order-product-indper', function ($routes) {
        $routes->get('/', 'ManageOrderProductIndperController::index');
        $routes->get('create', 'ManageOrderProductIndperController::create');
        $routes->post('store', 'ManageOrderProductIndperController::store');
        $routes->get('edit/(:num)', 'ManageOrderProductIndperController::edit/$1');
        $routes->post('update/(:num)', 'ManageOrderProductIndperController::update/$1');
        $routes->get('delete/(:num)', 'ManageOrderProductIndperController::delete/$1');
    });


$routes->group('superadmin',function($routes){

});

$routes->group('admin',function($routes){
    // $routes->get('dashboard', 'Admin::dashboard'); // Halaman dashboard untuk admin
});

$routes->group('siswa',function($routes){
    $routes->get('dashboard', 'Siswa::index'); // Halaman profil untuk siswa
});

$routes->group('customer',function($routes){
    $routes->get('dashboard', 'Customer::index'); // Halaman shop untuk customer
});

$routes->group('industri',function($routes){
    $routes->get('dashboard', 'Industri::index'); // Halaman shop untuk customer
});



$routes->group('manage-deposit', function($routes) {
    $routes->get('/', 'ManageDepositController::index');
    $routes->get('create', 'ManageDepositController::create');
    $routes->post('store', 'ManageDepositController::store');
    $routes->get('edit/(:num)', 'ManageDepositController::edit/$1');
    $routes->post('update/(:num)', 'ManageDepositController::update/$1');
    $routes->get('delete/(:num)', 'ManageDepositController::delete/$1');
    $routes->get('view/(:num)', 'ManageDepositController::view/$1');
    
    // API untuk get data customer (jika diperlukan)
    $routes->get('get-customer/(:num)', 'ManageDepositController::getCustomer/$1');
});

 $routes->group('admin/product', function($routes) {
    $routes->get('/', 'AdminProduct::index'); 
});