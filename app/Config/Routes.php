<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/','HomeController::index');

$routes->group('dev',  function ($routes) {
	$routes->group('api', ['namespace' => 'App\Controllers\Api'], function ($routes) {
		$routes->get('/','HomeController::index');
		
		
		$routes->get('posts/(:any)','PostController::getPost');
		$routes->get('posts/(:any)','PostController::index');

		$routes->get('posts/mostViews/(:any)','PostController::getMostViews/$1');
		$routes->get('posts/mostRecents/(:any)','PostController::getMostRecent/$1');
		$routes->get('posts/random','PostController::getRandom');

		// $routes->get('posts','PostController::index');
		// $routes->get('posts','PostController::index');
		// $routes->get('posts','PostController::index');
	});

	$routes->group('auth', ['namespace' => 'App\Controllers\Auth'], function ($routes) {
	});

});

// Route::get('posts/mostViews/{amount}', [
//     'as' => 'posts.mostviews',
//     'uses' => 'PostsController@showMostViews'
// ]);

// Route::get('posts/mostRecents/{amount}', [
//     'as' => 'posts.mostrecents',
//     'uses' => 'PostsController@showMostRecents'
// ]);

// Route::get('posts/random', [
//     'as' => 'posts.random',
//     'uses' => 'PostsController@getRandomPost'
// ]);

// Route::get('posts/{post_id}', [
//     'as' => 'posts.show',
//     'uses' => 'PostsController@show'
// ]);

// Route::post('posts', [
//     'as' => 'posts.store',
//     'uses' => 'PostsController@store'
// ])->middleware('jwt');

// Route::put('posts/{post_id}', [
//     'as' => 'posts.update',
//     'uses' => 'PostsController@update'
// ])->middleware('jwt');

// Route::delete('posts/{post_id}', [
//     'as' => 'posts.delete',
//     'uses' => 'PostsController@destroy'
// ])->middleware('jwt');

// Route::put('posts/tradeInfo/{post_id}', [
//     'as' => 'posts.tradeInfo.update',
//     'uses' => 'PostsController@updateTradeInfo'
// ])->middleware('jwt');




// //comments routers
// Route::post('comments', [
//     'as' => 'posts.comments.store',
//     'uses' => 'CommentsController@store'
// ])->middleware('jwt');

// Route::put('comments/{comment_id}', [
//     'as' => 'posts.comments.update',
//     'uses' => 'CommentsController@update'
// ])->middleware('jwt');

// Route::delete('comments/{comment_id}', [
//     'as' => 'posts.comments.delete',
//     'uses' => 'CommentsController@destroy'
// ])->middleware('jwt');


// Route::post('images', [
//     'as' => 'posts.image.upload',
//     'uses' => 'ImagesController@uploadImages'
// ])->middleware('jwt');

// Route::get('imagesget', [
//     'as' => 'posts.image.upload',
//     'uses' => 'ImagesController@get'
// ]);

// Route::delete('images/{image_id}', [
//     'as' => 'posts.image.delete',
//     'uses' => 'ImagesController@deleteImages'
// ])->middleware('jwt');



/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
