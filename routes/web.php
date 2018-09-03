<?php
use Psr\Http\Message\ServerRequestInterface;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
Route::get('/addDataGroup', function () {
    return view('add_data_group');
});
*/
// Devices routes
Route::get('/devices', 'Devices\DevicesController@show')->name('devices_show');
Route::get('/devices_add', 'Devices\DevicesController@add')->name('devices_add');
Route::get('/devices_connect', 'Devices\DevicesController@connect')->name('devices_connect');
Route::get('/devices_data', 'Devices\DevicesController@data');
Route::get('/devices_showdata/{id}', 'Devices\DevicesController@showData');
Route::get('/devices_showdatas', 'Devices\DevicesController@showDatas')->name('chart');
Route::get('/noDataFound', 'Devices\DevicesController@EmptyPage')->name('nodata');
Route::get('/sharethis', 'Devices\DevicesController@shareThis')->name('sharethis');

Route::get('/predict/{id}', 'Devices\DevicesController@predict')->name('predict');


Route::get('/addpred', 'Devices\DevicesController@addPrediction');



//Template routes
Route::get('/createtemp','Devices\TemplatesController@create')->name('createtemp');
Route::post('/storetemp','Devices\TemplatesController@store')->name('storethis');
Route::get('/templates','Devices\TemplatesController@index')->name('templates');


//Data Group routes
Route::get('/dataGroup','Devices\DataGroupController@allDataGroup');
Route::get('/addDataGroup','Devices\DataGroupController@showAddDataGroup');
Route::post('/dataGroupForm','Devices\DataGroupController@addDataGroup');
Route::get('/addddttodg','Devices\DataGroupController@index');

//Data Type
Route::get('/insertdatatype','Devices\DatatypeController@insert');
Route::get('/createdatatype','Devices\DatatypeController@ajouterdatatype');
Route::get('/showdatatype','Devices\DatatypeController@show');
Route::get('/delete/{id}','Devices\DatatypeController@delete');
Route::get('/editdatatype','Devices\DatatypeController@edit');
Route::get('/updatedatatype/{id}','Devices\DatatypeController@update');

Route::get('/getdata','Devices\DeviceDataController@getData');

// Application
Route::get('/addtrigger', 'Devices\DevicesController@addTrgigger');


Route::get('/getdata1', function (ServerRequestInterface $request) {
    $name = $request->input("val");
    echo $name;
});

//TRIGGERS
Route::get('/createtriggers','Triggers\TriggerController@ajoutertrigger');
Route::get('/inserttrigger','Triggers\TriggerController@insert');
Route::get('/showtriggers','Triggers\TriggerController@show')->name('triggers');
