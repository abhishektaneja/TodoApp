<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	$data = ['name' => 'Abhishek' , 'email' => 'abhishek.taneja@live.com', 'add_data' => ['key' => 'value', 'key_2' => 'value_2', 'key_3' => '<script>alert("I am Cool");</script>' ]];
// 	return View::make('hello') -> with($data);
// 	// return View::make('hello');
// 	// return View::make('hello', array('name' => 'Abhishek', "lname" => "Taneja"));
// 	// return View::make('hello') -> with('name', 'Abhishek') -> with('lname', 'Taneja');
// 	// return View::make('hello') -> withName('Abhishek') -> withLname('Taneja');
// });

// Route::get('/', function(){
// 	return View::make('todos/index');
// });

// Route::get('/todos', function(){
// 	return View::make('todos/index');
// });

// Route::get('/todos/{id}', function($id){
// 	return View::make('todos.show') -> withId($id);
// });

// Route::get('/', 'TodoListController@index');
// Route::get('/todos', 'TodoListController@index');
// Route::get('/todos/{id}', 'TodoListController@show');


/* To create all restfull arch */
Route::get('/', 'TodoListController@index');
Route::resource('todos', 'TodoListController');


Route::get('/db', function(){
	// return DB::select('show tables;');
	// return DB::table('todo_lists') -> get();
	DB::table('todo_lists') -> insert(
		array(
			'name' => 'my-list'
			)
		);
	return DB::table('todo_lists') -> get();
});
