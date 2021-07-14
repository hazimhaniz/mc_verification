<?php

use App\Http\Controllers\doctorController;
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




Route::get('update_account_doc/{loginid}', 'doctorController@update_acc_view')->name('update_doc_view');

Route::get('view_account_doc/{loginid}', 'doctorController@view_account_doc');
Route::post('update_doc/{loginid}', 'doctorController@update_acc');


Route::get('issue_mc/{loginid}', function ($loginid) {
    return view('mc', compact('loginid'));
});

Route::post('regmc', 'doctorController@regmc');
Route::get('checkmc', 'doctorController@checkmc');

Route::get('mcqr/{id}', 'doctorController@mcqr');



Route::get('admin_login', 'adminLoginController@adminLogin')->name('adminLogin');
Route::get('admin_login_check', 'adminLoginController@checkLogin')->name('adminLoginCheck');
Route::get('admin_dashboard', 'adminLoginController@adminDashboard')->name('adminDashboard');

Route::get('admin_login_check', 'adminLoginController@checkLogin')->name('adminLoginCheck');

Route::get('doctor_login',function () {
    return view('doctorlogin');
});

Route::get('doctorLoginCheck', 'doctorController@checklogin');

Route::get('getdoc/{id}', 'adminLoginController@getdoc');
Route::post('savedoc/{id}', 'adminLoginController@savedoc');

Route::get('doctor_dashboard/{loginid}', 'doctorController@showDashboard');


Route::post('register_doctor', 'adminLoginController@regdoc')->name('regdoc');
Route::delete('delete_doctor/{id}', 'adminLoginController@delete_doctor');

Route::post('update_admin/{id}', 'adminLoginController@update_admin_save');
// Route::get('getadmin/{email}', 'adminLoginController@getadmin');

Route::prefix('admin_dashboard')->group(function () {
    Route::get('update_doctor', 'adminLoginController@update_doctor')->name('update_doctor');
    Route::get('view_doctor/', 'adminLoginController@view_doctor')->name('view_doctor');
    Route::get('delete_doctor', 'adminLoginController@view_delete_doctor')->name('delete_doctor');
    Route::get('view_admin/', 'adminLoginController@view_admin')->name('view_admin');
    Route::get('update_admin_view', 'adminLoginController@update_admin')->name('update_admin');

});

// Route::get('register_doctor',  function () {
//     return view('regdoc');
// });