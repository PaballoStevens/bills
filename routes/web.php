<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ADMIN

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth', 'admin');

Route::get('/admin/records/management-bills-list', [AdminController::class, 'billlist'])->middleware('auth', 'admin');

Route::get('/admin/records/create', [AdminController::class, 'createview'])->middleware('auth', 'admin');

Route::post('/admin/records/create', [AdminController::class, 'create'])->middleware('auth', 'admin');

Route::get('/admin/users/user-management-list', [AdminController::class, 'users'])->middleware('auth', 'admin');

Route::get('/admin/users/user-management-list/{id}', [AdminController::class, 'deleteuser'])->middleware('auth', 'admin');

Route::get('/admin/users/user-management-add-user', [AdminController::class, 'adduser'])->middleware('auth', 'admin');

Route::post('/admin/users/user-management-add-user', [AdminController::class, 'storeuser'])->middleware('auth', 'admin');

Route::get('/admin/users/user-management-edit-user/{id}', [AdminController::class, 'edituser'])->middleware('auth', 'admin');

Route::post('/admin/groups/user-management-groups-list', [AdminController::class, 'storegroups'])->middleware('auth', 'admin');

Route::get('/admin/groups/user-management-groups-list', [AdminController::class, 'groups'])->middleware('auth', 'admin');

Route::get('/admin/groups/user-management-groups-list/{id}', [AdminController::class, 'delete'])->middleware('auth', 'admin');

Route::get('/account/profile', [AdminController::class, 'profile'])->middleware('auth');

Route::get('/account/security', [AdminController::class, 'security'])->middleware('auth');

Route::get('/account/notifications', [AdminController::class, 'notifications'])->middleware('auth');

Route::get('/admin/alerts/management-alerts-list', [AdminController::class, 'alertlist'])->middleware('auth', 'admin');

Route::get('/admin/alerts/create', [AdminController::class, 'alert'])->middleware('auth', 'admin');

Route::post('/admin/alerts/create', [AdminController::class, 'alertcreate'])->middleware('auth', 'admin');

Route::get('/admin/alerts/management-alerts-list/{id}', [AdminController::class, 'deletealert'])->middleware('auth', 'admin');

Route::get('/admin/ProgressTracker/create', [AdminController::class, 'progress'])->middleware('auth', 'admin');
Route::post('/admin/ProgressTracker/create', [AdminController::class, 'progresscreate'])->middleware('auth', 'admin');
Route::get('/admin/{id}', [AdminController::class, 'deleteprogress'])->middleware('auth', 'admin');
Route::get('/admin/ProgressTracker/taskcenter', [AdminController::class, 'taskcenter'])->middleware('auth', 'admin');
//CUSTOMER

Route::get('/customer', [CustomerController::class, 'index'])->middleware('auth', 'customer');

Route::post('/account/profile', [CustomerController::class, 'profileupdate'])->middleware('auth');

Route::get('/account/profile', [CustomerController::class, 'profile'])->middleware('auth');

Route::get('/account/profile/{id}', [CustomerController::class, 'profileid'])->middleware('auth');

Route::get('/account/billing/=&HJSNDVNRKTLKC5784{id}JIJOJK', [CustomerController::class, 'billing'])->middleware('auth', 'customer');

Route::post('/account/stripe', [CustomerController::class, 'handlePost'])->middleware('auth', 'customer');

Route::get('/account/stripe/{id}', [CustomerController::class, 'stripe'])->middleware('auth', 'customer');

Route::get('/customer/invoice/=&HJSNDVNRKTLKC5784{id}JIJOJK', [CustomerController::class, 'invoice'])->middleware('auth', 'customer');

Route::get('/account/security', [CustomerController::class, 'security'])->middleware('auth');

Route::get('/account/notifications', [CustomerController::class, 'notifications'])->middleware('auth');

Route::get('/layouts/customer', [CustomerController::class, 'alert'])->middleware('auth');

Route::get('/account/add_cards', [CustomerController::class, 'addcard'])->middleware('auth');

Route::post('/account/add_cards', [CustomerController::class, 'createcard'])->middleware('auth');