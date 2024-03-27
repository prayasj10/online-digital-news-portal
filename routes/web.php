<?php

use Illuminate\Support\Facades\Route;
use App\Link;
use Illuminate\Http\Request;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/home', 'DashboardController@index')->name('dashboard');

//user controller
Route::get('/user', 'UserController@index')->name('user.index');
Route::get('/user/create', 'UserController@create')->name('user.create');
Route::post('/user', 'UserController@store')->name('user.store');
Route::get('/user/{user}', 'UserController@show')->name('user.show');
Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');
Route::patch('/user/{user}', 'UserController@update')->name('user.update');
Route::delete('/user/{user}', 'UserController@destroy')->name('user.destroy');
//change status of user
Route::get('/changeStatus', 'UserController@changeStatus');


//Route::get('/slug','SlugController@index');
//Route::get('/slug/create', 'SlugController@create');
//Route::post('/slug', 'SlugController@store')->name('slug.store');
//Route::get('/slug/{slug}/edit', 'SlugController@edit');
//Route::patch('/slug/{slug}', 'SlugController@update');
//Route::delete('/slug/{slug}', 'SlugController@destroy');


Route::get('/category','CategoryController@index')->name('category.index');
Route::get('/category/create', 'CategoryController@create')->name('category.create');
Route::post('/category', 'CategoryController@store')->name('category.store');
//Route::get('/category/{category}', 'CategoryController@show')->name('category.show');
Route::get('/category/{category}/edit', 'CategoryController@edit')->name('category.edit');
Route::patch('/category/{category}', 'CategoryController@update')->name('category.update');
Route::delete('/category/{category}', 'CategoryController@destroy')->name('category.destroy');
//change Published of category
Route::get('/changeCategoryPublished', 'CategoryController@changeCategoryPublished');


Route::get('/author','AuthorController@index')->name('author.index');
Route::get('/author/create', 'AuthorController@create')->name('author.create');
Route::post('/author', 'AuthorController@store')->name('author.store');
Route::get('/author/{author}/edit', 'AuthorController@edit')->name('author.edit');
Route::patch('/author/{author}', 'AuthorController@update')->name('author.update');
Route::delete('/author/{author}', 'AuthorController@destroy')->name('author.destroy');
Route::post('/author/sortable','AuthorController@updatePosition');

Route::get('/changeAuthorPublished', 'AuthorController@changeAuthorPublished');

Route::get('/city/{id}','AuthorController@city');


Route::get('/post','PostController@index')->name('post.index');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post', 'PostController@store')->name('post.store');
//Route::get('/post/{post}', 'PostController@show')->name('post.show');
Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');
Route::patch('/post/{post}', 'PostController@update')->name('post.update');
Route::delete('/post/{post}', 'PostController@destroy')->name('post.destroy');

Route::get('/awardcategory/{id}','PostController@awardcategory');

Route::post('/deleteImage', 'PostController@deleteImage');
Route::get('/changePostPublished', 'PostController@changePostPublished');


Route::get('/advertisement','AdvertisementController@index')->name('advertisement.index');
Route::get('/advertisement/create', 'AdvertisementController@create')->name('advertisement.create');
Route::post('/advertisement', 'AdvertisementController@store')->name('advertisement.store');
Route::get('/advertisement/{advertisement}', 'AdvertisementController@show')->name('advertisement.show');
Route::get('/advertisement/{advertisement}/edit', 'AdvertisementController@edit')->name('advertisement.edit');
Route::patch('/advertisement/{advertisement}', 'AdvertisementController@update')->name('advertisement.update');
Route::delete('/advertisement/{advertisement}', 'AdvertisementController@destroy')->name('advertisement.destroy');




Route::get('/tag','TagController@index')->name('tag.index');
Route::get('/tag/create', 'TagController@create')->name('tag.create');
Route::post('/tag', 'TagController@store')->name('tag.store');
Route::get('/tag/{tag}', 'TagController@show')->name('tag.show');
Route::get('/tag/{tag}/edit', 'TagController@edit')->name('tag.edit');
Route::patch('/tag/{tag}', 'TagController@update')->name('tag.update');
Route::delete('/tag/{tag}', 'TagController@destroy')->name('tag.destroy');


//Route::get('/customer', 'CustomerController@index');
//Route::post('/customer', 'CustomerController@store');
//Route::get('/customer/fetch', 'CustomerController@fetchCustomer');
//Route::get('/customer/edit/{id}', 'CustomerController@edit');
//Route::put('/customer/update/{id}', 'CustomerController@update');
//Route::delete('/customer/delete/{id}', 'CustomerController@destroy');
//
//Route::post('/customer/sortable','CustomerController@updatePosition');


Route::get('/image','ImageController@index')->name('image.index');
Route::post('/image','ImageController@store')->name('image.store');
Route::get('/image/fetch','ImageController@fetchImage')->name('image.fetch');
Route::get('/image/details','ImageController@details')->name('image.details');
//Route::get('/image/edit', 'ImageController@edit')->name('image.edit');
Route::post('/image/update', 'ImageController@update')->name('image.update');
Route::post('/image/delete', 'ImageController@delete')->name('image.delete');
Route::post('/deleteImg', 'ImageController@deleteImg');

Route::post('/image/sortable','ImageController@updatePosition');


Route::get('/role','RoleController@index')->name('role.index');
Route::get('/role/create', 'RoleController@create')->name('role.create');
Route::post('/role', 'RoleController@store')->name('role.store');
Route::get('/role/{role}', 'RoleController@show')->name('role.show');
Route::get('/role/{role}/edit', 'RoleController@edit')->name('role.edit');
Route::patch('/role/{role}', 'RoleController@update')->name('role.update');
Route::delete('/role/{role}', 'RoleController@destroy')->name('role.destroy');


Route::get('/opinion','OpinionController@index')->name('opinion.index');
Route::post('/opinion/insert','OpinionController@insert')->name('opinion.insert');
Route::get('/opinion/fetch','OpinionController@fetchopinion')->name('opinion.fetch');
Route::get('/opinion/edit/{id}', 'OpinionController@edit');
Route::put('/opinion/update/{id}', 'OpinionController@update');
Route::delete('/opinion/delete/{id}', 'OpinionController@destroy');

//Route::get('/secondopinion','SecondOpinionController@index')->name('secondopinion.index');
//Route::get('/secondopinion/create','SecondOpinionController@create')->name('secondopinion.create');
//Route::post('secondopinion/insert', 'SecondOpinionController@insert')->name('secondopinion.insert');
//Route::get('/secondopinion/fetch','SecondOpinionController@fetchopinion')->name('secondopinion.fetch');
//Route::get('/secondopinion/edit/{id}', 'SecondOpinionController@edit');
//Route::put('/secondopinion/update/{id}', 'SecondOpinionController@update');
//Route::delete('/secondopinion/delete/{id}', 'SecondOpinionController@destroy');

Route::get('/activitylog',function (){
    return \Spatie\Activitylog\Models\Activity::all();
});

//Route::get('/',function (){
//    return view('index');
//});

//Route::get('/index.html',function (){
//    return view('index');
//});

Route::get('/pages/404.html',function (){
    return view('pages.404');
});

Route::get('/pages/contact.html',function (){
    return view('pages.contact');
});

Route::get('/pages/single_page.html',function (){
    return view('pages.single_page');
});

Route::get('/','Frontend\HomePageController@index');
Route::get('/timer','Frontend\HomePageController@timer');

Route::get('/contact','Frontend\HomePageController@contact');

Route::get('/politics','Frontend\PoliticsController@index');
Route::get('/politics/{id}','Frontend\PoliticsController@show');

Route::get('/sports','Frontend\SportsController@index');
Route::get('/sports/{id}','Frontend\SportsController@show');

Route::get('/blog','Frontend\BlogsController@index');
Route::get('/blog/{id}','Frontend\BlogsController@show');

Route::get('/business','Frontend\BusinessController@index');
Route::get('/business/{id}','Frontend\BusinessController@show');

Route::get('/society','Frontend\SocietyController@index');
Route::get('/society/{id}','Frontend\SocietyController@show');

//Route::get('/{category}','Frontend\BlogsController@list');
//Route::get('/{category}/{id}','Frontend\BlogsController@categoryDetail');

Route::get('/authors/{id}','Frontend\AuthorPageController@index');


