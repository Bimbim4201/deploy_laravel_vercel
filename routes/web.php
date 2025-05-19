<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BalikModalController;
use App\Http\Controllers\LabaMaksimumController;

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
Route::get('/home', function () {
    return view('home',[
        'title' => 'Home',
    ]);
});

Route::get('/about', function () {
    return view('about',[
        'title' => 'About',
        "nama" => "Bimantara Prakasa Jatnika",
        "email" => "bimantara.nelitas@gmail.com",
        "gambar" => "Sigma.png",
    ]);
});

// Route::get('/blog', function () {
//     $akun_post = [
//     [
//         'username' => 'Bimantara Prakasa Jatnika',
//         'slug' => 'bimantara-prakasa-jatnika',
//         'password' => 'administrator',
//         'email' => 'bimantara.nelitas@gmail.com'
//     ],
//     [
//         'username' => 'Aditya Ihsan Maulana',
//         'slug'=> 'aditya-ihsan-maulana',
//         'password' => 'user',
//         'email' => 'adit.cigalontang@gmail.com'
//     ]
   
// ];
//     return view('posts', [
        
//         'title' => 'Posts',
//         'posts' => $akun_post
        
//     ]);
// });
Route::get('/posts', [PostController::class, 'index']);

Route::get('posts/{slug}', [PostController::class, 'show']);


########################################################################################
Route::get('/Index', function () {
    return view('Index',[
        'Home' => '/',
        'title' => 'Home',
        'Informasi' => '/Informasi',
        'Kalkulator' => '/Kalkulator',
        'daftar' => '/LoginPage',
        'Logo' => 'Logo.png'
    ]);
});
Route::get('/Informasi', function () {
    return view('Informasi',[
        'Home' => '/',
        'title' => 'Informasi',
        'Informasi' => '/Informasi',
        'Kalkulator' => '/Kalkulator',
        "Logo" => 'Logo.png',
        'Nabila'=> 'Bila.png',
        'Zaki'=> 'Nadiaz.png',
        'Hans'=> 'Alpha.png',
        'Bima'=> 'Sigma.png',
        'Adit'=> 'Adit.png'
        
    ]);
});
Route::get ('/Belajar', function () {
    return view('Belajar',[
        'Home' => '/',
        'title' => 'Belajar',
        
        'Informasi' => '/Informasi',
        'Kalkulator' => '/Kalkulator',
        'BalikModal'=> '/HitungBalikModal',
        'LabaM'=> '/LabaMaksimum',
        'TargetLaba'=> '/TargetLaba',
        "Logo" => 'Logo.png'
    ]);
});
Route::get('/Kalkulator', function () {
    return view('Kalkulator',[
        'Home' => '/',
        'title' => 'Kalkulator',
        'Informasi' => '/Informasi',
        'Kalkulator' => '/Kalkulator',
        'BalikModal'=> '/HitungBalikModal',
        'LabaM'=> '/LabaMaksimum',
        'TargetLaba'=> '/TargetLaba',
        "Logo" => 'Logo.png'
    ]);
});
Route::get('/HitungBalikModal', function () {
    return view('HitungBalikModal',[
        'Home' => '/',
        'title' => 'Hitung Balik Modal',
        'Informasi' => '/Informasi',
        'Kalkulator' => '/Kalkulator',
        'BalikModal'=> '/HitungBalikModal',
        'LabaM'=> '/LabaMaksimum',
        'TargetLaba'=> '/TargetLaba',
        "Logo" => 'Logo.png'
    ]);
});
Route::get('/LabaMaksimum', function () {
    return view('LabaMaksimum',[
        'Home' => '/',
        'title' => 'Laba Maksimum',
        'Informasi' => '/Informasi',
        'Kalkulator' => '/Kalkulator',
        'BalikModal'=> '/HitungBalikModal',
        'LabaM'=> '/LabaMaksimum',
        'TargetLaba'=> '/TargetLaba',
        "Logo" => 'Logo.png'
    ]);
});
Route::get('/TargetLaba', function () {
    return view('TargetLaba',[
        'Home' => '/',
        'title' => 'Target Laba',
        'Informasi' => '/Informasi',
        'Kalkulator' => '/Kalkulator',
        'BalikModal'=> '/HitungBalikModal',
        'LabaM'=> '/LabaMaksimum',
        'TargetLaba'=> '/TargetLaba',
        "Logo" => 'Logo.png'
    ]);
});
// Route::get('/', function () {
//     return view('LoginPage',[
//         'title' => 'Login',
//     ]
// );
// });


Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/Riwayat', [RiwayatController::class, 'index'])->name('Riwayat.index');
Route::post('/Riwayat', [RiwayatController::class, 'store'])->name('Riwayat.store');

Route::get('/Dashboard', [DashboardController::class, 'index']);
Route::post('/simpanLabaMaksimum', [LabaMaksimumController::class, 'simpan']);
Route::post('/Labamaksimum', [LabaMaksimumController::class, 'store'])->name('LabaMaksimum.store');

Route::post('/balikmodal/store', [BalikModalController::class, 'store'])->name('balikmodal.store');
// function () {
//     return view('Dashboard',[
//         'title' => 'Dashboard',
//         'Informasi' => '/Informasi',
//         'Kalkulator' => '/Kalkulator',
//         'BalikModal'=> '/HitungBalikModal',
//         'LabaM'=> '/LabaMaksimum',
//         'TargetLaba'=> '/TargetLaba',
//         "Logo" => 'Logo.png'
//     ]);
// })->middleware('auth');
// Route::get('/Logout', function () {
//     return view('LoginPage',[
//         'title' => 'Login',
//     ]);
// })->middleware('auth');
