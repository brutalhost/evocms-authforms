<?php

use EvolutionCMS\Authforms\Controllers\Controller;
use Illuminate\Support\Facades\Route;

$urlPrefix = config('authforms.url_prefix');

Route::prefix($urlPrefix)->name('authforms.')->middleware(['EvolutionCMS\Authforms\Middleware\CheckAuthentication'])->group(function () {
    Route::name('pages.')->group(function () {
        $friendlySuffix = config('authforms.friendly_url_suffix');
        Route::get('login' . $friendlySuffix, [Controller::class, 'login'])->name('login');
        Route::get('register' . $friendlySuffix, [Controller::class, 'register'])->name('register');
        Route::get('reset_password' . $friendlySuffix, [Controller::class, 'resetPassword'])->name('reset_password');
    });
});
