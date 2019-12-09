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
Route::namespace ('User')->group(function () {
	// 注册
	Route::get('user/register', 'UserController@register');
	Route::post('user/register', 'UserController@register');

	// 登陆页面
	Route::get('user/login', function () {
		return view('user.login');
	});
	Route::post('user/login', 'UserController@login');
	// 退出登陆
	Route::get('user/loginout', 'UserController@loginOut');

	// 获取登陆用户信息
	Route::get('user/profile', 'UserController@userInfo')->middleware('checkauth');

});