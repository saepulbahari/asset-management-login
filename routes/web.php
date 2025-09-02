<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Models\Asset;
use Illuminate\Support\Facades\Route;

// Route::method(path, handler);

// method = get|post|put|patch|delete
// path = string (/, /about, /contact)
// handler = Closure (callback), Class, [Controller::class, 'method']

Route::get('/', [HomeController::class, 'home']);

Route::get('/home', function () {
    return redirect('/asset');
})->name('home')->middleware('auth');

// Route::resource('asset', AssetController::class);
// Route::resource('location', LocationController::class);
// Route::resource('category', CategoryController::class);

Route::middleware('auth')->group(function () {

    Route::middleware('is_admin')->group(function () {
        Route::resources([
            'asset' => AssetController::class,
            'location' => LocationController::class,
            'category' => CategoryController::class,
        ]);
    });

    Route::middleware('role:admin,editor')->group(function () {
        Route::resource('post', PostController::class);
    });

    Route::delete('asset/{asset}/force', [AssetController::class, 'forceDestroy'])->withTrashed();
    Route::post('asset/{asset}/restore', [AssetController::class, 'restore'])->withTrashed();
});

