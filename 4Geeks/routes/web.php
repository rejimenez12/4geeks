<?php


Route::get('/', [

	'as'   => 'getLogin',
	'uses' => 'HomeController@getLogin'
 
]);

Route::post('/login', [

	'as'   => 'postLogin',
	'uses' => 'HomeController@postLogin'
 
]);

Route::get('/logout',[

	'as'   => 'getLogout',
	'uses' => 'HomeController@getLogout'
]);

Route::get('/register', [

	'as'   => 'getRegister',
	'uses' => 'HomeController@getRegister'

]);

Route::post('/register', [

	'as'   => 'postRegister',
	'uses' => 'HomeController@postRegister'

]);


Route::group(['prefix' => 'normal', 'middleware' => ['auth']], function(){

	Route::get('/home',[

		'as'   => 'normalHome',
		'uses' => 'HomeController@home'

	]);

	Route::get('/index/category',[

		'as'   => 'indexCategory',
		'uses' => 'NormalController@indexCategory'

	]);

	Route::get('/list/category',[

		'as'   => 'listCategory',
		'uses' => 'NormalController@listCategory'

	]);

	Route::post('/create/category',[

		'as'   => 'createCategory',
		'uses' => 'NormalController@createCategory'

	]);
    
    Route::get('/edit/category/{id}',[
        
        'as'   => 'normalEditCategory',
        'uses' => 'NormalController@editCategory'
        
    ]);
    
    Route::get('/delete/category/{id}',[
        
        'as'   => 'normalDeleteCategory',
        'uses' => 'NormalController@destroyCategory'
        
    ]);
    
    Route::post('/update/category',[

		'as'   => 'updateCategory',
		'uses' => 'NormalController@updateCategory'

	]);
    
    
    Route::get('/index/note',[
        
        'as'   => 'indexNote',
        'uses' => 'NormalController@indexNote'
        
    ]);
    
    Route::get('/list/note',[
        
        'as'   => 'listNote',
        'uses' => 'NormalController@listNote'
        
    ]);



});


