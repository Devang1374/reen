<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\heroController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\heroBanner;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [homeController::class, 'index']);
Route::get('/contact',[homeController::class, 'contact']);

Route::view('/test','emails.contact');

Route::post('sendFeedBack',[homeController::class, 'sendFeedBack'])->name('sendFeedBack');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/heroBanner', [heroController::class,'heroBanner'])->name('heroBanner');
    Route::get('/features',[heroController::class,'features'])->name('features');
    Route::get('/portfolio',[heroController::class,'portfolio'])->name('portfolio');
    Route::get('/pages',[heroController::class,'pages'])->name('pages');
    Route::get('/heroData',[heroController::class,'heroData'])->name('heroData');
});





    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/logout/adf');

// Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/auth.php';
