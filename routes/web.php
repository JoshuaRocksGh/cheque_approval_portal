<?php

use App\Http\Controllers\ApprovedController;
use App\Http\Controllers\ApproveUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReturnsController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\RejectedController;
use Illuminate\Support\Facades\Auth;
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


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
// Route::get('/login', [LoginController::class, 'index'])->name('login');


Route::post('/post-login', [LoginController::class, 'post_login'])->name('post-login');

// LOGOUT
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/returns', [ReturnsController::class, 'index'])->name('returns');

Route::get('/search-returns', [ReturnsController::class, 'search_by_revision_id'])->name('search-returns');

Route::get('/upload-returns', [UploadController::class, 'index'])->name('upload-returns');

Route::get('/uploaded-returns', [UploadController::class, 'uploaded_returns'])->name('uploaded-returns');

Route::get('/pending-uploaded-returns', [UploadController::class, 'pending_uploaded_returns'])->name('pending-uploaded-returns');
Route::get('/approved-uploaded-returns', [UploadController::class, 'approved_uploaded_returns'])->name('approved-uploaded-returns');
Route::get('/rejected-uploaded-returns', [UploadController::class, 'rejected_uploaded_returns'])->name('rejected-uploaded-returns');

Route::get('/approve-uploaded-return/{revisionId}/{returnTypeId}/{clearData}/{upload_id}', [ApproveUploadController::class, 'approve_uploaded_return'])->name('approve-uploaded-return');

Route::get('/reject-uploaded-return/{returnTypeId}/{id}', [ApproveUploadController::class, 'reject_uploaded_return'])->name('reject-uploaded-return');



Route::get('/download-return/{filename}', [UploadController::class, 'download_return'])->name('download-return');

Route::post('/post-upload', [UploadController::class, 'post_upload'])->name('post-upload');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/add_user', [App\Http\Controllers\UserController::class, 'index'])->name('add_user');

Route::post('/post_user', [App\Http\Controllers\UserController::class, 'post_user'])->name('post_user');

Route::post('/update_user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update_user');

Route::post('/deleteuser/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('deleteuser');


Route::get('/view_users', [App\Http\Controllers\UserController::class, 'view_users'])->name('view_users');





Route::get('/approve-cheque/{cheque_id}', [ApprovedController::class, 'approved'])->name('approve-cheque');

Route::get('/approve-cheque-list', [ApprovedController::class, 'index'])->name('approve-cheque-list');

Route::get('/approve-cheque-list', [ApprovedController::class, 'index'])->name('approve-cheque-list');

Route::get('/approved-cheque', [ApprovedController::class, 'index'])->name('approved-cheque');


Route::get('/reject-cheque/{cheque_id}', [RejectedController::class, 'rejected'])->name('reject-cheque');

Route::get('/reject-cheque-list', [RejectedController::class, 'index'])->name('reject-cheque-list');






