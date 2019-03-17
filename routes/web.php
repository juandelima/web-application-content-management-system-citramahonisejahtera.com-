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

//FRONT-END
Route::get('/', 'Frontend\FrontEndController@index')->name('index');

//news
Route::group(['prefix' => 'news'], function() {
	Route::get('/','Frontend\FrontEndController@news')->name('news');
	Route::get('/{slug}', ['as' => 'news.single', 'uses' => 'Frontend\FrontEndController@news_detail'])->where('slug', '[\w\d\-\_]+');
	Route::get('/month/{int_month}', ['as'=>'news.filter', 'uses' => 'Frontend\FrontEndController@filter_news']);
});

//events
Route::group(['prefix' => 'event'], function() {
	Route::get('/{slug}', ['as' => 'event.single', 'uses' => 'Frontend\FrontEndController@event_detail'])->where('slug', '[\w\d\-\_]+');
});

//produk
Route::group(['prefix' => 'products'], function() {
	Route::get('/','Frontend\FrontEndController@products')->name('products');
	Route::get('/{slug}', ['as' => 'products.single', 'uses' => 'Frontend\FrontEndController@detail_product'])->where('slug', '[\w\d\-\_]+');
	Route::get('/filter/{url}', ['as' => 'product.filter', 'uses' => 'Frontend\FrontEndController@filter_product'])->where('url', '[\w\d\-\_]+');
});

//project
Route::group(['prefix' => 'project'], function() {
	Route::get('/','Frontend\FrontEndController@project')->name('project');
	Route::get('/{slug}', ['as' => 'projects.list', 'uses' => 'Frontend\FrontEndController@filter_project'])->where('slug', '[\w\d\-\_]+');
	Route::get('/detail/{url}', ['as' => 'projects.single', 'uses' => 'Frontend\FrontEndController@project_details'])->where('url', '[\w\d\-\_]+');
});

Route::get('/about-us','Frontend\FrontEndController@about')->name('about');
Route::get('/product/detail_product','Frontend\FrontEndController@detail_product')->name('detail_product');
Route::get('/news/title','Frontend\FrontEndController@news_detail')->name('news_detail');

// ---------------------------------------------------------------------------------------------//

//BACK-END
Auth::routes();
Route::get('4dm1n', 'HomeController@index')->name('back-end.index');
Route::group(['middleware' => ['web','auth']], function() {
	Route::group(['prefix'=>'4dm1n'], function() {
		//Pos
		Route::group(['prefix'=>'pos'], function() {
			Route::get('/','Backend\Post\PostController@index')->name('posts');
			Route::get('/create','Backend\Post\PostController@create')->name('create_post');
			Route::post('/save','Backend\Post\PostController@save')->name('save_post');
			Route::get('/edit/{id}','Backend\Post\PostController@edit')->name('edit_post');
			Route::post('/update/{id}','Backend\Post\PostController@update')->name('update_post');
			Route::post('/delete/{id}','Backend\Post\PostController@delete')->name('delete_post');
		});

		//Event
		Route::group(['prefix'=>'event'], function() {
			Route::get('/','Backend\Event\EventController@index')->name('events');
			Route::get('/create','Backend\Event\EventController@create')->name('create_event');
			Route::post('/save','Backend\Event\EventController@save')->name('save_event');
			Route::get('/edit/{id}','Backend\Event\EventController@edit')->name('edit_event');
			Route::post('/update/{id}','Backend\Event\EventController@update')->name('update_event');
			Route::post('/delete/{id}','Backend\Event\EventController@delete')->name('delete_event');
		});

		//Kategori Produk
		Route::group(['prefix' => 'produk'], function() {
			Route::group(['prefix' => 'kategori'], function() {
				Route::get('/', 'Backend\KategoriProduk\KategoriProdukController@index')->name('kategori_produk');
				Route::get('/create', 'Backend\KategoriProduk\KategoriProdukController@create')->name('create_produk');
				Route::post('/save', 'Backend\KategoriProduk\KategoriProdukController@save')->name('save_produk');
				Route::get('/edit/{id}','Backend\KategoriProduk\KategoriProdukController@edit')->name('edit_produk');
				Route::post('/update/{id}', 'Backend\KategoriProduk\KategoriProdukController@update')->name('update_produk');
				Route::post('/delete/{id}', 'Backend\KategoriProduk\KategoriProdukController@delete')->name('delete_produk');
			});
			Route::get('/', 'Backend\Produk\ProdukController@index')->name('index_produk');
			Route::get('/create', 'Backend\Produk\ProdukController@create')->name('new_product');
			Route::post('/save', 'Backend\Produk\ProdukController@save')->name('save_a_product');
			Route::get('/edit/{id}','Backend\Produk\ProdukController@edit')->name('edit_a_product');
			Route::post('/update/{id}', 'Backend\Produk\ProdukController@update')->name('update_a_product');
			Route::post('/delete/{id}', 'Backend\Produk\ProdukController@delete')->name('delete_a_product');
		});

		//Kategori Proyek
		Route::group(['prefix' => 'project'], function() {
			Route::group(['prefix' => 'kategori'], function() {
				Route::get('/', 'Backend\KategoriProyek\KategoriProyekController@index')->name('kategori_proyek');
				Route::get('/create', 'Backend\KategoriProyek\KategoriProyekController@create')->name('create_proyek');
				Route::post('/save', 'Backend\KategoriProyek\KategoriProyekController@save')->name('save_proyek');
				Route::get('/edit/{id}','Backend\KategoriProyek\KategoriProyekController@edit')->name('edit_kproyek');
				Route::post('/update/{id}', 'Backend\KategoriProyek\KategoriProyekController@update')->name('update_proyek');
				Route::post('/delete/{id}', 'Backend\KategoriProyek\KategoriProyekController@delete')->name('delete_proyek');
			});
			Route::get('/', 'Backend\Proyek\ProyekController@index')->name('index_proyek');
			Route::get('/create', 'Backend\Proyek\ProyekController@create')->name('new_proyek');
			Route::post('/save', 'Backend\Proyek\ProyekController@save')->name('save_a_proyek');
			Route::get('/edit/{id}','Backend\Proyek\ProyekController@edit')->name('edit_proyek');
			Route::post('/update/{id}', 'Backend\Proyek\ProyekController@update')->name('update_a_proyek');
			Route::post('/delete/{id}', 'Backend\Proyek\ProyekController@delete')->name('delete_a_proyek');
		});

		//clients
		Route::group(['prefix' => 'client'], function() {
			Route::get('/', 'Backend\Klien\KlienController@index')->name('index_client');
			Route::get('/create', 'Backend\Klien\KlienController@create')->name('create_client');
			Route::post('/save', 'Backend\Klien\KlienController@save')->name('save_client');
			Route::get('/edit/{id}', 'Backend\Klien\KlienController@edit')->name('edit_client');
			Route::post('/update/{id}', 'Backend\Klien\KlienController@update')->name('update_client');
			Route::post('/delete/{id}', 'Backend\Klien\KlienController@delete')->name('delete_client');
		});
	});
});