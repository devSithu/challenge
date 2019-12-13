<?php
use App\Website_info;
use App\Product;
use App\Category;
use App\ProductPhoto;
//register & login/logout
Route::get('/user/register','Auth\RegisterController@show');
Route::post('/user/register','Auth\RegisterController@register');
Route::get('/user/logout','Auth\LoginController@logout');
Route::get('/','Auth\LoginController@show');
Route::post('/','Auth\LoginController@login');

//setting
Route::get('/setting',function(){return view('setting');});
Route::get('/setting/contact','Controller@get_all_contact');
Route::post('/setting/update_contact/{id}','Controller@update_contact');
Route::get('/setting/loadAccount','Controller@getAccount');
Route::post('/setting/updateAccount/{id}','Controller@updateAccount');

//category
Route::get('/category','CategoryController@index');
Route::post('/category','CategoryController@store');
Route::post('/add_category','CategoryController@storeCategory');
Route::get('/add_category','CategoryController@getCategory');
Route::get('/deleteCategory/{id}','CategoryController@destroy');
Route::get('/updateCategory/{id}','CategoryController@update');

//product
Route::get('/getProduct','ProductController@getAll');
Route::post('/createProduct','ProductController@store');
Route::get('/deleteProduct/{id}','ProductController@destroy');
Route::get('/getProduct/{id}','ProductController@getOne');
Route::post('/updateProduct/{id}','ProductController@update');
Route::get('/product',function(){$category=Category::all();
    return view('product',compact('category'));
});

//productPhoto
Route::get('/productPhoto','ProductPhotoController@index');
Route::post('/productPhoto','ProductPhotoController@store');
Route::get('/getProductPhoto','ProductPhotoController@getAllProductPhoto');

//order
Route::get('/home', 'OrderController@index');
Route::post('/insertOrder','OrderController@store');
Route::get('/getOrder','OrderController@getOrder');
Route::get('/deleteOrder/{id}','OrderController@destroy');
Route::get('/getOne/{id}','OrderController@getOne');
Route::post('/updateOrder/{id}','OrderController@update');

//webiste
Route::get('/goWebsite',function(){
    return view('website.home');
});


//customer_order
Route::get('/customerOrder','CustomerOrderController@index');











