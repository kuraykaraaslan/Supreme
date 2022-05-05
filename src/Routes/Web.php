<?php

use Illuminate\Support\Facades\Route;
use Kuraykaraaslan\Supreme\Controllers\FrontController;
use Kuraykaraaslan\Supreme\Controllers\SettingsController;
use Kuraykaraaslan\Supreme\Supreme;

Route::get('/reset', [SettingsController::class, 'reset']);
Route::get('/post_demo', function() {
    return view('supreme::front.pages.post');
});


Route::group(['prefix' => Supreme::settings('settings.path')], function () {

    Route::get('/', [SettingsController::class, 'homepage'])->name('settings.homepage');

    Route::get('/post', [SettingsController::class, 'post_index'])->name('settings.post.index');
    Route::get('/post/create', [SettingsController::class, 'post_create'])->name('settings.post.create');
    Route::get('/post/{post}', [SettingsController::class, 'post_show'])->name('settings.post.show');
    Route::get('/post/{post}/edit', [SettingsController::class, 'post_edit'])->name('settings.post.edit');
    Route::post('/post/{post}/update', [SettingsController::class, 'post_update'])->name('settings.post.update');
    Route::post('/post/{post}/delete', [SettingsController::class, 'post_delete'])->name('settings.post.delete');

});


Route::get('/', [FrontController::class, 'homepage'])->name('front.homepage');

Route::any('{catchall}', [FrontController::class, 'e404'])->where('catchall', '.*');
