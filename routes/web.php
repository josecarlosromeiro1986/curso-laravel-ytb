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

Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit')->name('products.edit');
Route::get('products/create', 'ProductController@create')->name('products.create')->name('products.create');
Route::get('products/{id}', 'ProductController@show')->name('products.show');
Route::get('products', 'ProductController@index')->name('products.index');
Route::post('products', 'ProductController@store')->name('products.store');
Route::put('products/{id}', 'ProductController@update')->name('products.update');
Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');

/** 
 * Aula Routes Abaixo
*/

Route::get('/login', function () {
    return 'Login';
})->name('login');

/* Route::middleware([])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::namespace('Admin')->group(function () {

            Route::name('admin.')->group(function () {

                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

                Route::get('/produtos', 'TesteController@teste')->name('produtos');

                Route::get('/', 'TesteController@teste')->name('home');
            });
        });
    });
}); */

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'name' => 'admin.'
], function () {
    Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

    Route::get('/produtos', 'TesteController@teste')->name('produtos');

    Route::get('/', 'TesteController@teste')->name('home');
});

Route::get('/redirect3', function () {
    return redirect()->route('url.name');
});

Route::get('/name-url', function () {
    return 'Hey Hey Hey';
})->name('url.name');

Route::view('/view', 'welcome');

/* Route::get('/view', function () {
    return view('welcome');
}); */

Route::get('/redirect1', function () {
    return redirect('/redirect2');
});

Route::get('/redirect2', function () {
    return 'Redirect 02';
});

Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produtos(s) {$idProduct}";
});

Route::get('/categorias/{flag}/posts', function ($flag) {
    return "Pots da categoria: {$flag}";
});

Route::get('/categorias/{flag}', function ($flag) {
    return "Produtos da categoria: {$flag}";
});

Route::match(['get', 'post'], '/match', function () {
    return 'match';
});

Route::any('/any', function () {
    return 'Any';
});

Route::post('/register', function () {
    return '';
});

Route::get('contato', function () {
    return view('site.contact');
});

Route::get('/teste', function () {
    return "bla";
});
