<?php

use App\Http\Controllers\ProgrammingLanguagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix("site")->group(function () {
	Route::get("/{lang}", function(Request $request, string $lang) {
		return ProgrammingLanguagesController::get($lang);
	});

	Route::get("/", function (Request $request) {
		return "TEST";
	});
});

Route::prefix("images")->group(function () {
	Route::prefix("icons")->group(function () {
		Route::get("/{path}/{file}", function(Request $request, string $path, string $file) {

		});
	});

	Route::get("/{path}/{file}", function (Request $request, string $path, string $file) {
	});
});
