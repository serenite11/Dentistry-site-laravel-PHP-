<?php

use App\Http\Controllers\StaticPageController;
use Database\Seeders\StaticPageSeeder;
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
});
Route::get('/s/{pageid}', [StaticPageController::class,'show'])->name('static_page');

Route::redirect('/','/s/Main');

require_once(__DIR__.'/auth.php');

