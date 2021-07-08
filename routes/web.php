<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sharkController;
use App\Models\Shark;
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
Route::resource('sharks', sharkController::class);
Route::get('/search/', [sharkController::class,"search"]);
Route::get('/', function () {
    $sharks = shark::all();

    // load the view and pass the sharks
    return View::make('sharks.index')
        ->with('sharks', $sharks);
    //return view('sharks.index');
});
