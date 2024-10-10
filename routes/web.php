<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/",[HomeController::class,"index"]);

Route::get("/redirects",[HomeController::class,"redirects"]);

Route::get("/users",[AdminController::class,"users"]);
Route::get("/delete_user/{id}",[AdminController::class,"delete_user"]);
Route::get("/food_menu",[AdminController::class,"food_menu"]);
Route::post("/upload_food",[AdminController::class,"upload_food"]);
Route::get("/delete_menu/{id}",[AdminController::class,"delete_menu"]);
Route::get("/update_view/{id}",[AdminController::class,"update_view"]);
Route::post("/update/{id}",[AdminController::class,"update"]);

Route::post("/reservation",[HomeController::class,"reservation"]);

Route::get("/view_reservation",[AdminController::class,"view_reservation"]);
Route::get("/view_chef",[AdminController::class,"view_chef"]);
Route::post("/upload_chef",[AdminController::class,"upload_chef"]);
Route::get("/update_chef/{id}",[AdminController::class,"update_chef"]);
Route::post("/update_foodchef/{id}",[AdminController::class,"update_foodchef"]);
Route::get("/delete_chef/{id}",[AdminController::class,"delete_chef"]);

Route::post("/add_cart/{id}",[HomeController::class,"add_cart"]);
Route::get("/show_cart/{id}",[HomeController::class,"show_cart"]);
Route::get("/remove/{id}",[HomeController::class,"remove"]);
Route::post("/order_confirm",[HomeController::class,"order_confirm"]);

Route::get("/orders",[AdminController::class,"orders"]);
Route::get("/search",[AdminController::class,"search"]);









Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
