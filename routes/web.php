<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Models\Asset;
use Illuminate\Support\Facades\Route;

// Route::method(path, handler);

// method = get|post|put|patch|delete
// path = string (/, /about, /contact)
// handler = Closure (callback), Class, [Controller::class, 'method']

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/asset');
    }
    return view('welcome');
});

Route::get('/home', function () {
    return redirect('/asset');
})->name('home')->middleware('auth');

// Route::resource('asset', AssetController::class);
// Route::resource('location', LocationController::class);
// Route::resource('category', CategoryController::class);

Route::middleware('auth')->group(function () {
    Route::resources([
        'asset' => AssetController::class,
        'location' => LocationController::class,
        'category' => CategoryController::class
    ]);

    Route::delete('asset/{asset}/force', [AssetController::class, 'forceDestroy'])->withTrashed();
    Route::post('asset/{asset}/restore', [AssetController::class, 'restore'])->withTrashed();
});

Route::get('test', function () {
    // return 'Test route';
    // return ['message' => 'Test route'];
    // return response()->json(['message' => 'Test route']);
    return Asset::all();
});
