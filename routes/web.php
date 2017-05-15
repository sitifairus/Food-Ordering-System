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
    return view('Customer.startingpage');
});
Route::get('/que', function () {
    return view('DisplayQue');
});

Route::name('startorder')->get('/startorder', 'customer@startorder');
Route::name('viewSet')->get('/viewSet', 'customer@viewSet');
Route::name('viewAlacarte')->get('/viewAlacarte', 'customer@viewAlacarte');
Route::name('selectitem')->post('/selectitem', 'customer@selectitem');
Route::name('deleteitem')->post('/deleteitem', 'customer@deleteitem');
Route::name('proceed')->get('/proceed', 'customer@proceed');
Route::name('pay')->get('/pay', 'customer@pay');
Route::name('signin')->post('/signin', 'AuthController@signin');
Route::name('Staff')->get('/Staff', 'AuthController@checksession');
Route::name('logout')->get('/logout', 'AuthController@logout');


Route::prefix('Customer')->group(function(){
	Route::name('Customer.viewSet')->post('/viewSet','customer@viewSet');
	Route::name('Customer.viewAlacarte')->post('/viewAlacarte','customer@viewAlacarte');
	Route::name('Customer.selectitem')->post('/selectitem','customer@selectitem');
    Route::name('Customer.deleteitem')->post('/deleteitem','customer@deleteitem');
    Route::name('Customer.PrintReceipt')->get('PrintReceipt/{order2}', 'customer@PrintReceipt');
});

Route::prefix('Manager')->group(function(){
    Route::name('Manager.home')->get('/home', 'ManagerController@home');
    Route::name('Manager.viewQueNum')->get('/viewQueNum', 'ManagerController@viewQueNum');
    Route::name('Manager.ManageMenuSet')->get('/ManageMenuSet', 'ManagerController@ManageMenuSet');
    Route::name('Manager.ManageMenuAlacarte')->get('/ManageMenuAlacarte', 'ManagerController@ManageMenuAlacarte');
    Route::name('Manager.DeleteMenuSet')->get('ManageMenuSet/{product}', 'ManagerController@DeleteMenu');
    Route::name('Manager.DeleteMenuAlacarte')->get('ManageMenuAlacarte/{product,}', 'ManagerController@DeleteMenu');
    Route::name('Manager.AddMenu')->get('/AddMenu', function () {
        return view('Manager.AddNewMenu');
    });
    Route::name('Manager.AddNewMenu')->post('/AddNewMenu', 'ManagerController@AddNewMenu');
    Route::name('Manager.EditMenu')->post('/EditMenu', 'ManagerController@ModifyMenu');
    Route::name('Manager.ModifyMenu')->post('/ModifyMenu', 'ManagerController@ModifyMenuDB');
    Route::name('Manager.user')->get('/user', 'ManagerController@getUser');
    Route::name('Manager.addUser')->get('/addUser', 'ManagerController@NewUserFrom');
    Route::name('Manager.AddNewUser')->post('/AddNewUser', 'ManagerController@AddNewUser');
    Route::name('Manager.DeleteUser')->get('DeleteUser/{user}', 'ManagerController@DeleteUser');
    Route::name('Manager.EditUser')->post('/EditUser', 'ManagerController@ModifyUser');
    Route::name('Manager.ModifyUser')->post('/ModifyUser', 'ManagerController@ModifyUserDB');
    Route::name('Manager.ChangeUserImage')->post('/ChangeUserImage', 'ManagerController@ChangeUserImage');
    

});
Route::prefix('CounterStaff')->group(function(){
    Route::name('CounterStaff.home')->get('/home', 'CounterStaffController@home');
    Route::name('CounterStaff.ViewOrder')->get('/ViewOrder', 'CounterStaffController@ViewOrder');
    Route::name('CounterStaff.ViewAlacarteMenu')->get('/ViewAlacarteMenu', 'CounterStaffController@ViewAlacarteMenu');
    Route::name('CounterStaff.ViewSetMenu')->get('/ViewSetMenu', 'CounterStaffController@ViewSetMenu');
    Route::name('CounterStaff.ChangeToNotAvailable')->post('/ChangeToNotAvailable', 'CounterStaffController@ChangeToNotAvailable');
    Route::name('CounterStaff.ChangeToAvailable')->post('/ChangeToAvailable', 'CounterStaffController@ChangeToAvailable');
    Route::name('CounterStaff.PrepareFood')->get('PrepareFood/{order}', 'CounterStaffController@PrepareFood');
    Route::name('CounterStaff.CallCustomer')->get('CallCustomer/{order}', 'CounterStaffController@CallCustomer');
    Route::name('CounterStaff.OrderDone')->get('OrderDone/{order}', 'CounterStaffController@OrderDone');
    Route::name('CounterStaff.DeleteOrder')->get('DeleteOrder/{order}', 'CounterStaffController@DeleteOrder');
});