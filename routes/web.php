<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/work_view', [App\Http\Controllers\viewController::class, 'index'])->name('work_view');


Route::get('/home', [App\Http\Controllers\MyPlaceController::class, 'index']);


Route::get('/post', [App\Http\Controllers\PostController::class, 'index']);
Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create']);
Route::get('/post/update', [App\Http\Controllers\PostController::class, 'update']);
Route::get('/post/delete', [App\Http\Controllers\PostController::class, 'delete']);
Route::get('/post/backToBD', [App\Http\Controllers\PostController::class, 'backToBD']);

Route::get('/post/fist_Or_Create', [App\Http\Controllers\PostController::class, 'fistOrCreate']);
Route::get('/post/update_Or_Create', [App\Http\Controllers\PostController::class, 'updateOrCreate']);


Route::get('/use', [App\Http\Controllers\MyPlaceUseController::class, 'indexScnd']);

Route::get('/storage', function () {
    return 'this is storage page';
});

Route::get('/about', function () {
    return 'this is about page';
});

Route::get('/main', function () {
    return 'this is main page';
});

Route::get('/data', function () {
    return 'this is data page';
});

Route::get('/tracker', function () {
    return 'this is tracker';
});

Route::get('/another', function () {
    return 'this is another page';
});


