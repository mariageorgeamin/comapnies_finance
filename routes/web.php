<?php

use App\Livewire\CompanyProfile;
use App\Livewire\CompanyForm;
use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomePage::class)
        ->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('company/create', CompanyForm::class)
    ->middleware(['auth'])
    ->name('createCompany');

Route::get('company/{symbol}', CompanyProfile::class)->name('company-details');



require __DIR__.'/auth.php';
