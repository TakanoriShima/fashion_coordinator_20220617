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

// 一般ユーザー
Route::group(['middleware' => ['guest']], function () {
    
    // プレビューした瞬間の設定
    Route::get('/', 'ToppagesController@index');
    // ログイン認証系
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('login.post');
    // ユーザ登録系
    Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
    Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

});

// ユーザー認証必要
Route::group(['middleware' => ['auth']], function () {
    
    // 
    // Route::get('top', function () {
    //      return view('top');
    // });
    
    // ログイン後のリダイレクト先
    Route::get('top', 'ToppagesController@top')->name('login.top');
    
    // ログアウト
    Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
    // 画像投稿関係
    Route::resource('posts', 'PostsController');

     // ログインしている人の投稿一覧を表示
    Route::get('myposts', 'PostsController@myposts')->name('my.posts');
    
    // プロフィール関係
    Route::resource('profiles', 'ProfilesController');
    
    // キーワード検索
    Route::get('search', 'PostsController@search')->name('posts.search');
    
    // ルーム関係
    Route::resource('rooms', 'RoomsController');
    // ネスト
    Route::group(['prefix' => 'rooms/{id}'], function () {
        // ルームに対するチャット
        Route::resource('chats', 'ChatsController');;
    });
});




