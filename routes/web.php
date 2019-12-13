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
Route::get('/home', 'HomeController@index')->name('admin');

Auth::routes();

//admin
    Route::get('/admin', 'HomeController@index')->name('admin');
    Route::resource('/adminLog', 'admin\adminLogController@index');
    Route::get('/update-Admin/{id}', 'admin\adminLogController@update')->name('updateAdmin');
    Route::POST('/edit-Admin', 'admin\adminLogController@updateadmin')->name('editAdmin');
    Route::get('/delete-Admin/{id}', 'admin\adminLogController@destroy')->name('deleteAdmin');
    Route::POST('/add-admin', 'admin\adminLogController@store')->name('addAdmin');

    //Buying Center
    Route::get('/center', 'admin\centerController@index')->name('center');
    Route::get('/update-Center/{id}', 'admin\centerController@update')->name('updateCenter');
    Route::POST('/edit-Center', 'admin\centerController@updatecenter')->name('editCenter');
    Route::get('/delete-Center/{id}', 'admin\centerController@destroy')->name('deleteCenter');
    Route::POST('/add-center', 'admin\centerController@store')->name('addCenter');

    //Users
    Route::resource('/userLog', 'admin\userLogController@index');
    Route::get('/view-User/{id}', 'admin\userLogController@show')->name('viewUser');
    Route::get('/edit-User/{id}', 'admin\userLogController@update')->name('updateUser');
    Route::get('/delete-User/{id}', 'admin\userLogController@destroy')->name('deleteUser');
    

    //role
    Route::get('/role', 'admin\roleController@index')->name('role');
    Route::get('/edit-Role', 'admin\roleController@edit')->name('adminRole');   
    Route::get('/update-Role/{id}', 'admin\roleController@update')->name('updateRole');
    Route::get('/delete-Role/{id}', 'admin\roleController@destroy')->name('deleteRole');    

    //General
    Route::get('/general-settings', 'admin\roleController@generalset')->name('general');    
    Route::POST('/gold-value', 'admin\roleController@goldstore')->name('goldvalue');

//operator
Route::get('/operator', 'buyer\buyerController@index')->name('buyer');

    //New Transaction
    Route::get('/transaction', 'buyer\transactionController@index')->name('transaction');
    Route::get('/update-transaction/{id}', 'buyer\transactionController@update')->name('updateTrans');
    Route::get('/edit-transaction/{id}', 'buyer\transactionController@edit')->name('editTrans');
    Route::POST('/add-xrf', 'buyer\transactionController@updatexrf')->name('addXrf');
    Route::get('/delete-transaction/{id}', 'buyer\transactionController@destroy')->name('deleteTrans');
    Route::POST('/add-transaction', 'buyer\transactionController@store')->name('addtransaction');
    Route::get('/invoice/{id}', 'buyer\transactionController@showinvoice')->name('invoice');
    Route::get('/printInvoice/{id}', 'buyer\transactionController@printInvoice')->name('printInvoice');
    Route::get('/userApproved/{id}', 'buyer\transactionController@userApproved')->name('userApproved');
    

    //New box
    Route::get('/box', 'buyer\boxController@index')->name('box');
    Route::get('/update-box/{id}', 'buyer\boxController@update')->name('updateBox');
    Route::get('/print-box/{id}', 'buyer\boxController@print')->name('printBox');
    Route::POST('/edit-box', 'buyer\boxController@updatebox')->name('editBox');
    Route::get('/delete-box/{id}', 'buyer\boxController@destroy')->name('deleteBox');
    Route::POST('/add-box', 'buyer\boxController@store')->name('addbox');

//Payer
Route::get('/payer', 'payer\PayerController@index')->name('payer');

//Vault
Route::get('/vault', 'vault\VaultController@index')->name('vault');

//Logistics
Route::get('/logistics', 'logistics\LogisticsController@index')->name('logistics');

//Processing
Route::get('/process', 'process\ProcessController@index')->name('process');

//Equipments
Route::get('/equip', 'equip\EquipmentController@index')->name('equip');


Route::group(['middleware' => 'auth'], function() {

    Route::get('/userLog', 'admin\userLogController@index')->name('userLog');
    Route::get('/adminLog', 'admin\adminLogController@index')->name('adminLog');
});
