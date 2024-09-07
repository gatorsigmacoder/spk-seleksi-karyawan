<?php

use App\Models\User;
use App\Models\RekrutmenModel;
use App\Http\Controllers\HitungWP;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ListPelamar;
use App\Http\Controllers\UserProfile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoRekrutmen;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HitungKriteria;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrioritasPelamar;
use App\Http\Controllers\HitungSubkriteria;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemberkasanController;
use App\Http\Controllers\SubkriteriaController;
use App\Http\Controllers\ListPembobotanController;
use App\Http\Controllers\RekrutmenModelController;
use App\Http\Controllers\DaftarRekrutmenController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\SubkriteriaCompareListController;

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

// Start

// End

// Route::get('/', function () {
//     return view('home', [
//         'title' => 'Home'
//     ]);
// });

// Route::get('/', [InfoRekrutmen::class, 'index'])->name('info');

// Route::get('/info', function () {
//     return view('info', [
//         'title' => 'Info'
//     ]);
// });

Route::get('/', [InfoRekrutmen::class, 'index'])->name('info');
Route::resource('/info', InfoRekrutmen::class)->middleware('guest');

// Start Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authentication']);
Route::post('/logout', [LoginController::class, 'logout']);
// End Authentication

// Start Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/dashboard-admin', [Dashboard::class, 'admin'])->middleware(['auth', 'verified']);
Route::get('/dashboard-pelamar', [Dashboard::class, 'pelamar'])->middleware(['auth', 'verified']);
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard-pelamar');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    auth()->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// End Register

//Start password reset
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'sendToEmail'])->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('guest')->name('password.update');
//End password reset

//Start user profile
Route::resource('/user-profile', UserProfile::class)->middleware(['auth', 'verified']);
//End user profile

// Start Pelamar Controller
Route::resource('/pelamar', PelamarController::class)->middleware(['auth', 'verified']);
// End Pelamar Controller

// Start Rekrutmen Controller
Route::resource('/rekrutmen', RekrutmenModelController::class)->middleware(['auth', 'verified']);
// End Rekrutmen Controller

// Start Kriteria Controller
Route::resource('/kriteria', KriteriaController::class)->middleware(['auth', 'verified']);
// End Kriteria Controller

// Start Prioritas Controller
Route::post('/prioritas/store/{hitung_kriterium:id}', [HitungKriteria::class, 'store'])->middleware(['auth', 'verified']);
// Route::resource('/prioritas', HitungKriteria::class)->middleware('auth');
// End Prioritas Controller


// Start Hitung Kriteria Controller
Route::post('/hitung-kriteria/adjustment/simpan/{hitung_kriterium:id}', [ListPembobotanController::class, 'simpan'])->middleware(['auth', 'verified']);
Route::get('/hitung-kriteria/adjustment/{hitung_kriterium:id}', [ListPembobotanController::class, 'penyesuaian'])->middleware(['auth', 'verified']);
Route::get('/hitung-kriteria/analisa/{hitung_kriterium:id}', [ListPembobotanController::class, 'analisa'])->middleware(['auth', 'verified']);
Route::resource('/hitung-kriteria', ListPembobotanController::class, ['as'=>'hitung-kriteria'])->middleware(['auth', 'verified']);
// End Hitung Kriteria Controller

// Start Subkriteria Controller
Route::resource('/subkriteria', SubkriteriaController::class)->middleware(['auth', 'verified']);
// End Subkriteria Controller

// Start Hitung Subkriteria Controller
Route::post('/hitung-subkriteria/analisa/hitung/{subctr_c_list:id}', [HitungSubkriteria::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/hitung-subkriteria/analisa/{kriteria:id}', [SubkriteriaCompareListController::class, 'analisa'])->middleware(['auth', 'verified']);
Route::resource('/hitung-subkriteria', SubkriteriaCompareListController::class)->middleware(['auth', 'verified']);
// End Hitung Subkriteria Controller

// Start Pemberkasan
Route::get('/daftar-rekrutmen/pemberkasan/upload/{pemberkasan:id}', [PemberkasanController::class, 'create'])->middleware(['auth', 'verified']);
Route::get('/daftar-rekrutmen/pemberkasan/edit/{pemberkasan:id}', [PemberkasanController::class, 'edit'])->middleware(['auth', 'verified']);
Route::get('/daftar-rekrutmen/pemberkasan/{rekrutmen:id}', [PemberkasanController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/daftar-rekrutmen/pemberkasan/open-file/{file:id}', [PemberkasanController::class, 'openFile'])->middleware(['auth', 'verified']);
Route::post('/pemberkasan/store/{pemberkasan:id}',[PemberkasanController::class, 'store'])->middleware(['auth', 'verified']);
Route::post('/pemberkasan/update/{pemberkasan:id}',[PemberkasanController::class, 'update'])->middleware(['auth', 'verified']);
// End Pemberkasan

// Start Daftar Rekrutmen
Route::resource('/daftar-rekrutmen', DaftarRekrutmenController::class)->middleware(['auth', 'verified']);
// End Daftar Rekrutmen


// Start Penliaian WP
Route::get('/prioritas-pelamar/download/{berkas:id}', [PrioritasPelamar::class, 'download'])->middleware(['auth', 'verified']);
Route::get('/prioritas-pelamar/file/{berkas:id}', [PrioritasPelamar::class, 'showFile'])->middleware(['auth', 'verified']);
Route::post('/prioritas-pelamar/cancel-announce/{rekrutmen:id}', [HitungWP::class, 'cancelAnnounce'])->middleware(['auth', 'verified']);
Route::post('/prioritas-pelamar/announce/{rekrutmen:id}', [HitungWP::class, 'announce'])->middleware(['auth', 'verified']);
Route::post('/prioritas-pelamar/reset-hitung/{rekrutmen:id}', [HitungWP::class, 'resetPenilaian'])->middleware(['auth', 'verified']);
Route::post('/prioritas-pelamar/hitung/{rekrutmen:id}', [HitungWP::class, 'hitung_wp'])->middleware(['auth', 'verified']);
Route::get('/prioritas-pelamar/hasil/{rekrutmen:id}', [HitungWP::class, 'show_rank'])->middleware(['auth', 'verified']);
Route::get('/prioritas-pelamar/hasil/rincian/{pendaftar:id}', [HitungWP::class, 'rincian_nilai'])->middleware(['auth', 'verified']);
Route::resource('/prioritas-pelamar', PrioritasPelamar::class)->middleware(['auth', 'verified']);
// End Penliaian WP

//Start daftar(list) Pelamar
Route::resource('/list-pelamar', ListPelamar::class)->middleware(['auth', 'verified']);
//End daftar(list) Pelamar


// Route::resource('/hitung-kriteria/prioritas', HitungKriteria::class)->middleware('auth');


// Route::get('/kriteria/{kriterium:id}', function(RekrutmenModel $kriterium){
//     return view('kriteria.index', [
//         'kriteria' => $kriterium->kriteria,
//         'id' =>$kriterium->id
//     ]);
// })->middleware('auth');

// Route::get('/kriteria/create/{kriterium:id}', function($kriterium){
//     return view('kriteria.opsi.create', [
//         'rek_id' => $kriterium
//     ]);
// })->middleware('auth');
// Route::get('/kriteria/{kriteria:rekrutmen_id}', [KriteriaController::class, 'show'])->middleware('auth');