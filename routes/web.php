<?php

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

Route::get("/create_account", 'UserController@accountCreate');
Route::get("/articles", 'UserController@articles');
Route::get("/show_articles", 'UserController@showArticles');
// Route::post("/articles", 'UserController@accountStore');
Route::post("/register", 'UserController@accountStore');
Route::get("/ngo_register", 'clientController@index');
Route::post("/ngo_store", 'clientController@ngoAccountStore');
Route::get("/dashboard", 'UserController@dashboardShow');
Route::get("/verify_email/{verification_string}", 'UserController@emailVerify');
Route::get("/forgot_password", 'UserController@passwordForgot');
Route::post("/forgot_password_verify_email", 'UserController@sendVerificationEmail');
Route::get("/reset_password/{verification_string}", 'UserController@passwordReset');
Route::post("/passwordReset", 'UserController@passwordUpdate');
Route::get("/donationForm" , 'UserController@donationForm');
Route::post("/donationForm" , 'UserController@ngoDonation');
Route::get("/ngo_dashboard/{ngo_id}", 'clientController@ngoDashboard');
Route::get("/privacyPolicy" , 'clientController@privacy');
Route::post("/privacyPolicy" , 'clientController@privacyPolicy');
Route::get("/verify_ngo/{verification_string}" , 'clientController@ngoVerification');
Route::get("/dashboard" , 'UserController@read');
// Route::get("/userList" , 'UserController@userList');
// Route::get("/dashboard" , 'UserController@showDonor');
Route::get("/image_upload" , 'UserController@uploadImage');
Route::post("/saveImage" , 'UserController@saveImage');
Route::get("/picture_upload" , 'UserController@uploadPicture');
Route::post("/savePicture" , 'UserController@savePicture');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
