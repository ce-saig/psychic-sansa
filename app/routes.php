<?php

// Route::get('/', function() { return Redirect::to('home/index'); });

//Route::controller('library', 'LibraryController');
//Route::controller('/', 'LibraryController');


/*Route::get('/',array('before' => 'auth',function(){
	return "HELLO";
}));*/

Route::get('/','HomeController@index');
//move to route group
//Route::get('book/{bid}','BookController@getBook');

Route::get('add','BookController@newBook');
//Route::post('add','BookController@postBook');
Route::post('add',function(){
	return 'hello';
});


Route::post('loginUser','HomeController@doLogin');
Route::get('logout','HomeController@doLogout');

Route::group(array('prefix' => 'book/{bid}'), function($bid){
  Route::get('/', 'BookController@getBook');
  Route::post('braille/add', 'BookController@addBraille');	
  Route::post('cassette/add', 'BookController@addCassette');
  Route::post('cd/add', 'BookController@addCD');
  Route::post('dvd/add', 'BookController@addDVD');
  Route::get('daisy/add', 'BookController@addDaisy');

});
