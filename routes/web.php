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

Route::get('/', function () {
    return view('app');
});

Route::get('/test-css', function () {
    return view('test1.test-css');
});

Route::get('/jquery', function () {
    return view('test1.jquery');
});

Route::get('/fibo', function () {
    return view('test3.logictest');
});

Route::post('/calcFibo', 'FibonaccyController@sumFibo');
Route::get('/teacher/getdata', 'TeacherController@getdata');

Route::resource('teacher', 'TeacherController');
// Route::resource('transaction', 'TransactionController');

// Route::post('/test-aja', 'TestController@store')->name('test');

// Route::get('/jquery-test', function () {
//     return view('test1.jquery-test');
// });


Route::get('/trans/add', function () {
    return view('test2.transaction.add');
});

Route::post('/trans/store', 'TransactionController@store')->name('trans-store');
Route::get('/trans/view', 'TransactionController@index')->name('trans-view');
Route::get('/trans/list', 'TransactionController@list')->name('trans-list');
Route::get('/trans/recap', 'TransactionController@recap')->name('trans-recap');
Route::delete('/trans/delete/{id}', 'TransactionController@destroy')->name('trans-delete');
Route::get('/trans/edit/{id}', 'TransactionController@edit')->name('trans-edit');
Route::patch('/trans/update/{id}', 'TransactionController@update')->name('trans-update');