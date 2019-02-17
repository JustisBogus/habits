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



// when filled welcome.blade.php <form action="{{ route('signup') }}" method="post"> 
// uses UserController method post sign up
// named signup
Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home'); 
   
    Route::post('/signup', [
        'uses' => 'UserController@postSignUp',
        'as' => 'signup' 
    ]);
    
    Route::post('/signin', [
        'uses' => 'UserController@postSignIn',
        'as' => 'signin' 
    ]);

    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);


    // redirected from UserController postSignUp
    Route::get('/habits', [
        'uses'=> 'PostController@getHabits' ,
        'as' => 'habits',
        'middleware' => 'auth'
    ]);

    Route::get('/calendar', [
        'uses'=> 'PostController@getCalendar' ,
        'as' => 'calendar',
        'middleware' => 'auth'
    ]);

    Route::post('/newhabit', [
        'uses' => 'PostController@postNewHabit',
        'as' => 'newhabit',
        'middleware' => 'auth'
    ]);

    Route::get('/delete/{habit_id}', [
        'uses' => 'PostController@getDeletePost',
        'as' => 'delete',
        'middleware' => 'auth'
    ]);

    Route::get('/complete/{habit_id}', [
        'uses' => 'PostController@getCompleteHabit',
        'as' => 'complete',
        'middleware' => 'auth'
    ]);


});