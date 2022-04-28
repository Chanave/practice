<?php
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Controller;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//line
Route::get('line','LineController@line');
Route::get('deleteLine/{id}','LineController@deleteLine');
Route::post('/linemessage', 'LineController@linemessage');
Route::post('/saveLine', 'LineController@saveLine');
Route::get('editLine/{id}','LineController@editLine');
Route::get('getLine/{id}','LineController@getLine');

//index
Route::get('users','CheckboxController@index');

//menu checkbox
Route::get('checkbox','CheckboxController@checkbox');

//admenu
Route::get('admenu','AdmenuController@admenu');
Route::post('/saveMenu', 'AdmenuController@saveMenu');
Route::get('editMenu/{id}','AdmenuController@editMenu');
Route::get('deleteMenu/{id}','AdmenuController@deleteMenu');


//Division Route
Route::get('division','DivisionController@division');
Route::post('/saveDivision', 'DivisionController@saveDivision');
Route::get('editDivision/{id}','DivisionController@editDivision');
Route::get('deleteDivision/{id}','DivisionController@deleteDivision');




//Employee Route
Route::get('employee','EmployeeController@employee');
Route::post('/saveEmployee', 'EmployeeController@saveEmployee');
Route::get('getEmployee/{id}','EmployeeController@getEmployee');
Route::get('editEmployee/{id}','EmployeeController@editEmployee');
Route::get('deleteEmployee/{id}','EmployeeController@deleteEmployee');
Route::post('divisionById','EmployeeController@divisionById');

//Department Route
Route::get('department', 'DepartmentController@department');
Route::post('/saveDepartment', 'DepartmentController@saveDepartment');
Route::get('editDepartment/{id}','DepartmentController@editDepartment');
Route::get('deleteDepartment/{id}','DepartmentController@deleteDepartment');


