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

Route::get('/',function(){
   
return view('welcome',[
    'current'=>'home'
]);
});

Auth::routes();

Route::get('/email',function(){

    return new \App\Mail\NewUserWelcomeMail();
});
Route::post('/follow/{user}','FollowsController@store');
Route::post('/comment','CommentController@store');
Route::post('/comment-edit','CommentController@update');
Route::post('/comment-delete','CommentController@delete');
Route::post('/p', 'RecipesController@store');

Route::get('/','HomeController@index')->name('home.index');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit','ProfilesController@edit')->name('profile.edit');
Route::patch('/profedit/{user}', 'ProfilesController@update')->name('profile.update');
Route::get('/p/create',[
    'as'        =>'create-recipe',
    'uses'      =>'RecipesController@create'
    ]);
Route::get('p/display/recipe/{user}/{recipe}','RecipesController@display');


//Anything else
Route::any('{query}', 
  function() { return redirect('/'); })
  ->where('query', '.*');
