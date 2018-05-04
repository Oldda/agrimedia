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
//公共方法
Route::group(['prefix'=>'comm','namespace'=>'Comm'],function (){
    Route::post('sms','BaseFuncController@sendSms')->name('sms');
});
//auth认证路由
Auth::routes();
Route::get('/home', function () {
    return view('home');
});
Route::group(['namespace'=>'Admin','middleware'=>['auth','is_admin_actived']],function (){
    //后台首页
    Route::get('/', 'IndexController@index')->name('home');
    Route::resource('admin','AdminController');
    Route::resource('site','SiteController');
});
//发送在公众号端的功能--需要授权的页面访问需要使用wechat.oauth中间件。
Route::group(['prefix'=>'wechat','middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/user', function () {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料
        dd($user);
    });
});
Route::get('wechat/siter/register','Admin\SiterController@create')->name('siter.register');
Route::get('/test_list',function (){
    dd(request()->area);
})->middleware('area_filter');
