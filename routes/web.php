<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::controller(PostController::class)->group(function() {
    Route::get('/', 'index')->name('post.index');
    Route::get('/create', 'create')->name('post.create');
    Route::post('/create', 'store')->name('post.store');
    Route::get('/show/{id}', 'show')->name('post.show');
    Route::get('/edit/{id}', 'edit')->name('post.edit');
    Route::post('/edit/{id}', 'update')->name('post.update');
    Route::get('/destroy/{id}', 'destroy')->name('post.destroy');
    Route::post('/posts/comment/{id}', 'addComment')->name('post.comment');
});

Route::controller(RoleController::class)->group(function() {
    Route::get('/add-roles', 'addRole');
    Route::get('/add-user', 'addUser');
    Route::get('/get-roles', 'getRolesByUser');
    Route::get('/get-users', 'getUserByRoles');
});
