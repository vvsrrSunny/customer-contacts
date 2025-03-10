<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;


Route::resource('customers', CustomerController::class);
Route::resource('customers.contacts', ContactController::class);
