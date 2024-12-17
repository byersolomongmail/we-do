<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DonationController;


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

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Chat routes
    Route::get('/chat', [ChatController::class, 'chatRoom'])->name('chat.index');
    Route::get('/chat/room/{id}', [ChatController::class, 'chatRoom'])->name('chat.room');

    // Task routes
    Route::get('task/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('task/store', [TaskController::class, 'store'])->name('task.store');
    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::resource('blog', PostController::class)->names([
        'index' => 'posts.index',
        'create' => 'posts.create',
        'store' => 'posts.store',
        'show' => 'posts.show',
      ]);
    Route::resource('campaigns', CampaignController::class)->names([
        'index' => 'campaigns.index',
        'create' => 'campaigns.create',
        'store' => 'campaigns.store',
        'show' => 'campaigns.show',
    ]);
    Route::resource('donations', DonationController::class)->names([
        'index' => 'donations.index',
        'create' => 'donations.create',
        'show' => 'donations.show',
    ]);
});
Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');

// Static pages
Route::get('/policies', function () {
    return view('policies');
})->name('policies');

Route::get('/get-started', function () { 
    if (Auth::check()) {
        return redirect('task/create');
    }
    return view('get-started'); 
})->name('get-started');



require __DIR__.'/auth.php';


