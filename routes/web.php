<?php

use App\Http\Controllers\NewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;


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
Route::group(['middleware' => 'user'], function () {
    Route::get('user-home/{username}', 'NewController@userHome')->name('user.home');
    Route::get('user-logout', 'NewController@userLogout')->name('user.logout');
    Route::get('leave-portal/{leave}', 'LeaveController@UserLeaveList')->name('user.leave.list');
    Route::get('leave-form/{userid}', 'LeaveController@leaveForm')->name('leaveForm');
    Route::post('leave-form/{userid}', 'LeaveController@submitLeave')->name('submit.leave');
    Route::get('/change-password/{userid}', 'NewController@PasswordForm')->name('password.form');
    Route::post('/change-password', 'NewController@changePassword')->name('change.password');
    Route::get('/leave-details/{leaveId}', 'LeaveController@viewLeaveDetails')->name('leave.details');

});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/register', 'NewController@register')->name('register');
    Route::post('/save-user', 'NewController@saveuser')->name('save.user');
    Route::get('admin-home', 'NewController@adminHome')->name('admin.home');
    Route::get('admin-logout', 'NewController@adminLogout')->name('admin.logout');
    Route::get('user-list', 'NewController@userList')->name('user.list');
    Route::get('/change-status/{user}', 'NewController@changeUserStatus')->name('change.user.status');
    Route::get('/delete-user/{user}', 'NewController@deleteUser')->name('delete.user');
    Route::get('leave-list', 'LeaveController@leaveList')->name('leave.list');
    Route::get('/leave/approve/{leave}', 'LeaveController@approve')->name('leave.approve');
    Route::get('/leave/reject/{leave}', 'LeaveController@reject')->name('leave.reject');
    Route::get('/leave/delete/{leave}', 'LeaveController@delete')->name('leave.delete');
    Route::get('/leave-details-admin/{leaveId}', 'LeaveController@viewLeaveDetailsAdmin')->name('leave.details.admin');
    Route::get('leave-search', 'LeaveController@searchLeave')->name('search.leave');
});

Route::get('/', 'NewController@home')->name('home');
Route::get('/user-login', 'NewController@userLogin')->name('user.login');
Route::get('/admin-login', 'NewController@adminLogin')->name('admin.login');
Route::post('do-admin-login', 'NewController@doAdminLogin')->name('do.admin.login');
Route::post('do-user-login', 'NewController@doUserLogin')->name('do.user.login');

Route::get('forgot-password', 'NewController@forgotPassword')->name('forgot.password');
Route::post('do-forgot-password', 'NewController@doforgotPassword')->name('do.forgot.password');
Route::get('reset-password/{token}', 'NewController@resetPassword')->name('reset.password');
Route::post('do-reset-password', 'NewController@doresetPassword')->name('do.reset.password');






