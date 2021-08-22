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
    //طريقة 1 لنباسي الداتا بالفيو ولكن طويلة لو اكتر من سطر
  // return view('welcome')->with(['string' =>'amal mohammed', 'age' => 22] );
//طرقة 2 لنباسي الداتا 

$data=[];
$data['id']= 22;
$data['name']='amal mohammed';
return view('welcome');
});

// استكمال الفيو بعد شطر 121
Route::get('index', 'Front\UesrController@getIndex' )
;
Route::get('/test1', function () {
    return 'welcome';
});
//route parameters

Route::get('/test2/{id}', function ($id) {
    return $id;


});


Route::get('/test3/{id?}', function () {
    return 'welcome';

});

//route name
/*
Route::get('/show-number/{id}', function ($id) {
    return $id;
}) ->name('a') ;


Route::get('/show-string/{id?}', function () {
    return 'welcome';
}) ->name('b') ;

//rot name
// namespace
route::namespace('Front')->group(function(){
    // all route only access controller or methods in folder name Front
Route::get('users','UesrController@showUserName') ;

});
/*
//prefix
route::prefix('user')->group(function(){
    Route::get('show','UesrController@showUserName') ;
    Route::delete('delete','UesrController@showUserName') ;
    Route::get('edit','UesrController@showUserName') ;
    Route::put('update','UesrController@showUserName') ;

});
*/
// Route::group(['prefix' => 'users','middleware' => 'auth'],function(){
 /*  Route::group(['prefix' => 'users',],function(){

    //set all route
    Route::get('/',function(){
        return 'work';
    });
    Route::get('show','UesrController@showUserName') ;
    Route::delete('delete','UesrController@showUserName') ;
    Route::get('edit','UesrController@showUserName') ;
    Route::put('update','UesrController@showUserName') ;

});
// طريقتين لكتابة الميديل اما داخل جروب او ب ->
// Route::group(['prefix' => 'users','middleware' => 'auth'],function(){

route::get('check',function(){
    return 'middleware' ;
}) ->middleware('auth');
/*
    Route::get('offers/show','UesrController@showUserName') ;
    Route::delete('offers/delete','UesrController@showUserName') ;
    Route::get('offers/edit','UesrController@showUserName') ;
    Route::put('offers/update','UesrController@showUserName') ;

*/
//طريقة 1 لشكل namespace
//Route::get('second','Admin\SecondController@showString') ;
// طؤيقة اخرى بالجروب
/*Route::group(['namespace' => 'Admin'], function (){
    
    Route::get('second0' , 'SecondController@showString0') ->middleware('auth') ;
    Route::get('second1' , 'SecondController@showString1') ;
    Route::get('second2' , 'SecondController@showString2') ;

});

Route::get('login',function (){
    return 'Must Be Login To Acccses This Rote' ;
}) ->name('login');
/*
//Route::get('users','UesrController@showUserName')->middleware('auth') ;
*/


// وفرتلي الجمل اللي تحت بالميثود تبعتها اللي بالكونترولار نيو
//كونترولار ريسورس
//php artisan make:controller NewsController --resource
/////Route::resource('news' , 'NewsController');
/*
Route::get('news' , 'NewsController@index') ;
Route::post('news' , 'NewsController@store') ;
Route::get('news/create' , 'NewsController@create') ;
Route::get('news/{id}/edit' , 'NewsController@edit') ;
Route::post('update/{id}' , 'NewsController@update') ;
Route::delete('news/{id}' , 'NewsController@delete') ;

*/

//رجوع لسطر 13 لاستكمال شرح الفيو ^_^

//فيديو 23

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/about', function () {
    return view('about');
}); 
Auth::routes(['verify'=> true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/dashboard', function () {
    return 'dashboard';
}); 
Route::get('/', function () {
    return 'Home';
}); 
Route::get('/redirect/(service)','socialiteControlare@redirect'); 
Route::get('/callback/(service)','socialiteControlare@callback'); 
Route::get('fillable', 'CrudController@getOffers');

// Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

//     Route::group(['prefix' => 'offers'], function () {
// //        Route::get('store', 'CrudController@store');
     
// Route::get('create', 'CrudController@create');
// Route::post('store', 'CrudController@store')->name('offers.store');

//     });

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::group(['prefix' => 'offers'], function () {
        //   Route::get('store', 'CrudController@store');
        Route::get('create', 'CrudController@create');
        Route::post('store', 'CrudController@store')->name('offers.store');


    });    });