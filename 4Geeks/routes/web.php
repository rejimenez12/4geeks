<?php

//RUTAS INICIALES DE LOGIN Y REGISTER

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

    //RUTAS DE CATEGORIAS
    
	Route::get('/index/category',[

		'as'   => 'indexCategory',
		'uses' => 'NormalController@indexCategory'

	]);

	Route::get('/list/category',[

		'as'   => 'listCategory',
		'uses' => 'NormalController@listCategory'

	]);
    
    Route::get('/view/category',[
        
        'as'   => 'viewCategory',
        'uses' => 'NormalController@viewCategory'
        
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
    
    Route::post('filter/category',[
        
        'as'   => 'filterCategory',
		'uses' => 'NormalController@filterCategory'
        
    ]);
    
    Route::post('order/category',[
        
        'as'   => 'orderCategory',
		'uses' => 'NormalController@orderCategory'
        
    ]);
    
    
    //RUTAS DE NOTAS
    
    Route::get('/index/note',[
        
        'as'   => 'indexNote',
        'uses' => 'NormalController@indexNote'
        
    ]);
    
    Route::get('/list/note',[
        
        'as'   => 'listNote',
        'uses' => 'NormalController@listNote'
        
    ]);
    
    Route::get('/view/note',[
        
        'as'   => 'viewNote',
        'uses' => 'NormalController@viewNote'
        
    ]);
    
    
    Route::post('/create/note',[

		'as'   => 'createNote',
		'uses' => 'NormalController@createNote'

	]);
    
    Route::get('/edit/note/{id}',[
        
        'as'   => 'normalEditNote',
        'uses' => 'NormalController@editNote'
        
    ]);
    
    Route::get('/delete/note/{id}',[
        
        'as'   => 'normalDeleteNote',
        'uses' => 'NormalController@destroyNote'
        
    ]);
    
    Route::post('/update/note',[

		'as'   => 'updateNote',
		'uses' => 'NormalController@updateNote'

	]);

    
    Route::post('filter/note',[
        
        'as'   => 'filterNote',
		'uses' => 'NormalController@filterNote'
        
    ]);
    
    Route::post('order/note',[
        
        'as'   => 'orderCategory',
		'uses' => 'NormalController@orderNote'
        
    ]);
    
    Route::post('marcar/note',[
        
        'as'   => 'marcarNote',
		'uses' => 'NormalController@marcarNote'
        
    ]);

});


