<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Plans
Route::get('plans', 'PlanController@index');

// State
Route::get('states', 'StateController@index');

// City
Route::get('cities', 'CityController@index');

// Customers
Route::get('customers', 'CustomerController@index')->name('customers.index');
Route::get('customers/{id}', 'CustomerController@show')->name('customers.show');
Route::post('customers', 'CustomerController@store')->name('customers.store');
Route::put('customers/{id}', 'CustomerController@update')->name('customers.update');
Route::delete('customers/{id}', 'CustomerController@destroy')->name('customers.destroy');

//
//
// Se nenhuma rota for encontrada, executa esta rota fallback
Route::fallback(function () {
    return response()->json([
        'message' => 'Recurso não encontrado. Entre em contato com o suporte através do email: suporte@email.com.br'
    ], 404);
});