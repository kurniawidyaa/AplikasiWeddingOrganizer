<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServicePortfolioController;
use App\Http\Controllers\DashboardServiceController;
use App\Http\Controllers\DashboardServicePromoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ShippingAddressController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Layanan
Route::get('service', [ServiceController::class, 'index'])->name('service');

// Portfolio
Route::get('port', [ServicePortfolioController::class, 'show'])->name('portfolio');

// blog
Route::get('blog', [PostController::class, 'index'])->name('post');
Route::get('post/{post:slug}', [PostController::class, 'show'])->name('singlePost');

// Auth::routes();

Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'user.login')->name('login');
        Route::view('/register', 'user.register')->name('register');
        Route::post('/regist', [UserController::class, 'store'])->name('regist');
        Route::post('/check', [UserController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'home')->name('home'); //
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');

        // order
        Route::post('order/{identifier}', [OrderController::class, 'order'])->name('order');
        Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout');
        Route::delete('delete/{id}', [OrderController::class, 'delete'])->name('cart.del');
        Route::delete('deleteall/{id}', [OrderController::class, 'deleteall'])->name('deleteall');

        // cart
        Route::resource('cart', CartController::class);
        Route::get('cartCO', [CartController::class, 'co'])->name('cart.co');
        Route::resource('cartdetail', CartDetailController::class);
        Route::resource('order', OrderController::class);

        // alamat pengiriman
        Route::resource('shippingaddress', ShippingAddressController::class);

        Route::get('generate-pdf', [OrderController::class, 'generatePDF'])->name('generatepdf');
    });
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'layouts.admin.login')->name('login');
        Route::post('/check', AdminController::class, 'check')->name('check');
    });
    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        Route::get('/home', [AdminController::class, 'index'])->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        // Kategori Layanan
        Route::get('servcat', [ServiceCategoryController::class, 'index'])->name('servcat.index');
        Route::post('servcat/store', [ServiceCategoryController::class, 'store'])->name('servcat.store');
        Route::get('servcat/{identifier}/edit', [ServiceCategoryController::class, 'edit'])->name('servcat.edit');
        Route::put('servcat/{identifier}', [ServiceCategoryController::class, 'update'])->name('servcat.update');
        Route::delete('servcat_delete/{identifier}', [ServiceCategoryController::class, 'destroy'])->name('servcat.delete');

        // Dashboard Layanan
        Route::get('services', [DashboardServiceController::class, 'index'])->name('serv.index');
        Route::get('service/create', [DashboardServiceController::class, 'create'])->name('serv.create');
        Route::post('service/store', [DashboardServiceController::class, 'store'])->name('serv.store');
        Route::get('service/{identifier}/edit', [DashboardServiceController::class, 'edit'])->name('serv.edit');
        Route::patch('service/{identifier}', [DashboardServiceController::class, 'update'])->name('serv.update');
        Route::delete('service_delete/{identifier}', [DashboardServiceController::class, 'destroy'])->name('serv.delete');

        // Dashboard Portfolio Layanan 
        Route::get('portfolio', [ServicePortfolioController::class, 'index'])->name('port.index');
        Route::get('portfolio/create', [ServicePortfolioController::class, 'create'])->name('port.create');
        Route::post('portfolio/store', [ServicePortfolioController::class, 'store'])->name('port.store');
        Route::get('portfolio/{id}/edit', [ServicePortfolioController::class, 'edit'])->name('port.edit');
        Route::put('portfolio/{id}', [ServicePortfolioController::class, 'update'])->name('port.update');
        Route::delete('portfolio_delete/{id}', [ServicePortfolioController::class, 'destroy'])->name('port.delete');

        // Kategori Post
        Route::get('postcat', [PostCategoryController::class, 'index'])->name('postcat.index');
        Route::post('postcat/store', [PostCategoryController::class, 'store'])->name('postcat.store');
        Route::get('postcat/{slug}/edit', [PostCategoryController::class, 'edit'])->name('postcat.edit');
        Route::put('postcat/{slug}', [PostCategoryController::class, 'update'])->name('postcat.update');
        Route::delete('postcat_delete/{slug}', [PostCategoryController::class, 'destroy'])->name('postcat.delete');

        // Post
        Route::get('dbpost', [DashboardPostController::class, 'index'])->name('dbpost.index');
        Route::get('dbpost/create', [DashboardPostController::class, 'create'])->name('dbpost.create');
        Route::post('dbpost/store', [DashboardPostController::class, 'store'])->name('dbpost.store');
        Route::get('dbpost/{slug}/edit', [DashboardPostController::class, 'edit'])->name('dbpost.edit');
        Route::put('dbpost/{slug}', [DashboardPostController::class, 'update'])->name('dbpost.update');
        Route::delete('dbpost_delete/{slug}', [DashboardPostController::class, 'destroy'])->name('dbpost.delete');
    });
});

Route::prefix('owner')->name('owner.')->group(function () {
    Route::middleware(['guest:owner', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'owner.layouts.login')->name('login');
        Route::post('/check', OwnerController::class)->name('check');
    });
    Route::middleware(['auth:owner'])->group(function () {
        Route::get('/home', [OwnerController::class, 'index'])->name('home');
        Route::post('/logout', [OwnerController::class, 'logout'])->name('logout');

        // Data Admin
        Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
        Route::delete('admin_delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');

        // Data Customer(user)
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::delete('user_delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

        // Kategori Layanan
        Route::get('servcat', [ServiceCategoryController::class, 'index'])->name('servcat.index');
        Route::post('servcat/store', [ServiceCategoryController::class, 'store'])->name('servcat.store');
        Route::get('servcat/{identifier}/edit', [ServiceCategoryController::class, 'edit'])->name('servcat.edit');
        Route::put('servcat/{identifier}', [ServiceCategoryController::class, 'update'])->name('servcat.update');
        Route::delete('servcat_delete/{identifier}', [ServiceCategoryController::class, 'destroy'])->name('servcat.delete');

        // Dashboard Layanan
        Route::get('services', [DashboardServiceController::class, 'index'])->name('serv.index');
        Route::get('service/create', [DashboardServiceController::class, 'create'])->name('serv.create');
        Route::post('service/store', [DashboardServiceController::class, 'store'])->name('serv.store');
        Route::get('service/{identifier}/edit', [DashboardServiceController::class, 'edit'])->name('serv.edit');
        Route::patch('service/{identifier}', [DashboardServiceController::class, 'update'])->name('serv.update');
        Route::delete('service_delete/{identifier}', [DashboardServiceController::class, 'destroy'])->name('serv.delete');
        Route::get('service/show/{identifier}', [DashboardServiceController::class, 'show'])->name('serv.show');

        // Dashboard Portfolio Layanan 
        Route::get('portfolio', [ServicePortfolioController::class, 'index'])->name('port.index');
        Route::get('portfolio/create', [ServicePortfolioController::class, 'create'])->name('port.create');
        Route::post('portfolio/store', [ServicePortfolioController::class, 'store'])->name('port.store');
        Route::get('portfolio/{id}/edit', [ServicePortfolioController::class, 'edit'])->name('port.edit');
        Route::put('portfolio/{id}', [ServicePortfolioController::class, 'update'])->name('port.update');
        Route::delete('portfolio_delete/{id}', [ServicePortfolioController::class, 'destroy'])->name('port.delete');

        // Kategori Post
        Route::get('postcat', [PostCategoryController::class, 'index'])->name('postcat.index');
        Route::post('postcat/store', [PostCategoryController::class, 'store'])->name('postcat.store');
        Route::get('postcat/{slug}/edit', [PostCategoryController::class, 'edit'])->name('postcat.edit');
        Route::put('postcat/{slug}', [PostCategoryController::class, 'update'])->name('postcat.update');
        Route::delete('postcat_delete/{slug}', [PostCategoryController::class, 'destroy'])->name('postcat.delete');

        // Post
        Route::get('dbpost', [DashboardPostController::class, 'index'])->name('dbpost.index');
        Route::get('dbpost/create', [DashboardPostController::class, 'create'])->name('dbpost.create');
        Route::post('dbpost/store', [DashboardPostController::class, 'store'])->name('dbpost.store');
        Route::get('dbpost/{slug}/edit', [DashboardPostController::class, 'edit'])->name('dbpost.edit');
        Route::patch('dbpost/{slug}', [DashboardPostController::class, 'update'])->name('dbpost.update');
        Route::delete('dbpost_delete/{slug}', [DashboardPostController::class, 'destroy'])->name('dbpost.delete');
        // Route::resource('dbpost', DashboardPostController::class);

        // promo
        Route::resource('promo', DashboardServicePromoController::class);
        Route::get('loadasync', [DashboardServicePromoController::class, 'loadasync']);

        // laporan 
        // Route::get('report', [ReportController::class, 'index'])->name('report');
        Route::get('reportprocess', [ReportController::class, 'proses'])->name('process');
        Route::get('generatePDFReport', [ReportController::class, 'generatePDFReport'])->name('pdf.report');
    });
});

// Dashboard
Route::get('/dashboard', DashboardController::class)->name('dashboard');

// order
Route::get('service', [ServiceController::class, 'index'])->name('service');
Route::get('service/{identifier}', [ServiceController::class, 'detail'])->name('serviceDetail');
// Portfolio
Route::get('port', [ServicePortfolioController::class, 'show'])->name('portfolio');

// blog
Route::get('blog', [PostController::class, 'index'])->name('post');
Route::get('post/{post:slug}', [PostController::class, 'show'])->name('singlePost');
