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

// Route Models
Route::model('mapId', 'Map');
Route::model('nadeId', 'Nade');
// Home
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));
Route::get('features', array('as' => 'get.features', 'uses' => 'HomeController@showFeatures'));
Route::get('donations', array('as' => 'get.donations', 'uses' => 'HomeController@showDonations'));

// Route::get('env', function(){
//     return App::environment();
// });

// Maps
// Route::model('mapSlug', 'Map');

// Route::get('maps/{map}/{pop}', 'NadesController@showNadesInMapAtSpot');
Route::get('maps/{map}', array('as' => 'get.maps.nades', 'uses' => 'NadesController@showNadesInMap'));
Route::get('maps', array('as' => 'get.maps.all', 'uses' => 'MapsController@showAllMaps'));

// Nades
// Route::get('nades', 'NadesController@showSomeNades');

// Users
Route::get('login', array('as' => 'get.users.login', 'uses' => 'UsersController@showLoginForm'));
Route::post('login', array('as' => 'post.users.login', 'before' => 'csrf', 'uses' => 'UsersController@attemptLogin'));
Route::get('logout', array('as' => 'get.users.logout', 'uses' => 'UsersController@logout'));
Route::get('register', array('as' => 'get.users.register', 'uses' => 'UsersController@showAddUserForm'));
Route::post('register', array('as' => 'post.users.register', 'before' => 'csrf', 'uses' => 'UsersController@addUser'));
Route::get('users/confirm/{code}', array('as' => 'get.users.confirm', 'uses' => 'UsersController@confirmUser'));

// Users must be logged in to access these routes
Route::group(array('before' => 'auth'), function () {
    // Nades
    Route::get('nades/add', array('as' => 'get.nades.add', 'uses' => 'NadesController@showNadeForm'));
    Route::post('nades/add', array('as' => 'post.nades.add', 'before' => 'csrf', 'uses' => 'NadesController@saveNade'));
    
    // Users
    // Route::get('profile', array('as' => 'get.users.profile', 'uses' => 'UsersController@showProfile'));




    // Users must be admin to access these routes
    // Route::group(array('before' => 'auth.admin'), function() {
        // Maps
        Route::get('maps/add', 'MapsController@showMapForm');
    //     Route::post('maps/add', 'MapsController@saveMap');
    //     Route::get('maps/edit/{mapId}', 'MapsController@showMapForm');
    //     Route::post('maps/edit/{mapId}', 'MapsController@saveMap');
    // });

    // Users must be a mod to access these routes
    Route::group(array('before' => 'auth.mod'), function () {
        // Nades
        Route::get('nades/edit/{nade}', array('as' => 'get.nades.edit', 'uses' => 'NadesController@showNadeForm'));
        Route::post('nades/edit/{nade}', array('as' => 'post.nades.edit', 'uses' => 'NadesController@saveNade'));
        Route::get('nades/unapproved', array('as' => 'get.nades.unapproved', 'uses' => 'NadesController@showUnapprovedNades'));
    });
});
