<?php

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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
/*Route::get('/exportar/{id}', function($id)
{
    return redirect()->action('ExportarController@index{id}')->name('exportar');
});*/
Route::get('/exportar', 'ExportarController@index')->name('exportar');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('usuarios','UsuarioController');
    Route::resource('empresas','EmpresaController');
    Route::resource('enderecos','EnderecoController');
});
