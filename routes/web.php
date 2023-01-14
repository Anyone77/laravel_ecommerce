<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Auth\Events\Verified;
use Laravel\Jetstream\Rules\Role;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware(['auth:sanctum','verified'])->get('/dashboard',function(){
    return view('dashboard');
})->name('dashboard');

Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth');

Route::get('logout',[LogoutController::class,'logout']);

//Admin Route 

Route::resource('category',CategoryController::class);
Route::resource('product',ProductController::class);
Route::resource('order',OrderController::class);

Route::get('/delivered/{id}',[OrderController::class,'delivered_order']);


Route::get('/print_pdf/{id}',[OrderController::class,'print_pdf']);



Route::get('/send_email/{id}',[OrderController::class,'send_email']);


Route::post('/send_user_email/{id}',[OrderController::class,'send_user_email']);

Route::get('/search',[OrderController::class,'search']);







//Home Page Route 
Route::get('/product_detail/{id}',[HomeController::class,'product_detail']);


Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);


Route::get('/show_cart',[HomeController::class,'show_cart']);


Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

Route::get('/cash_order',[HomeController::class,'cash_order']);

Route::get('stripe/{totalprice}', [HomeController::class, 'stripe']);

Route::post('stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');


Route::get('/show_order',[HomeController::class,'show_order']);


Route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);




Route::post('/add_comment',[HomeController::class,'add_comment']);


Route::post('/add_reply',[HomeController::class,'add_reply']);


Route::get('/product_search',[HomeController::class,'product_search']);



Route::get('/all_product',[HomeController::class,'all_product']);


Route::get('/all_product_search',[HomeController::class,'all_product_search']);

Route::get('my-notification/{type}', 'HomeController@myNotification');



