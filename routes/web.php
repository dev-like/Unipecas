<?php

Route::get('/', 'WebSiteController@home')->name('home');
Route::get('noticia', 'WebSiteController@noticia')->name('noticias');
Route::get('noticia/{slug}', ['as' => 'noticia.item', 'uses' => 'WebSiteController@getSingleNoticia'])->where('slug', '[\w\d\-\_]+');

Route::get('pedido_online', 'WebSiteController@index');
Route::get('live_search/action', 'WebSiteController@action')->name('live_search.action');

route::get('mail', 'mailController@index');
route::post('postMail', 'mailController@post');

Route::get('pagenotfound', ['as' => 'notfound','uses' => 'WebSiteController@pagenotfound']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {
    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::resource('empresa', 'EmpresaController');
    Route::resource('parceiros', 'ParceiroController');
    Route::resource('clientes', 'ClienteController');
    Route::resource('noticias', 'NoticiaController');
    Route::resource('historico', 'HistoricoController');
    Route::resource('banners', 'BannerController');
    Route::post('banners/order', 'BannerController@BannerOrdem');

    Route::resource('usuario', 'UserController');
    Route::get('usuario/{usuario}/editar_senha', 'UserController@editPassword')->name('usuario.editar_senha');
    Route::post('usuario/atualizar_senha/{usuario}', 'UserController@updatePassword')->name('usuario.atualizar_senha');
});

Auth::routes();
