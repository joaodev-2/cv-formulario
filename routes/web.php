<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobApplicationController;

Route::get('/', fn()=>redirect()->route('applications.create'));
Route::resource('applications', JobApplicationController::class)->only(['create','store']);


Route::get('/', function () {
    return view('welcome');
});
