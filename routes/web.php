<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->resource('pages-company', \App\Http\Controllers\PagesController\CompanyController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('services', \App\Http\Controllers\ServicesController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('blogs/categories', \App\Http\Controllers\BlogCategoryController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('blogs', \App\Http\Controllers\BlogsController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('case-studies', \App\Http\Controllers\CaseStudiesController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('admin-management', \App\Http\Controllers\AdminManagementController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('team-members', \App\Http\Controllers\TeamMembersController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('others', \App\Http\Controllers\OthersController::class);
