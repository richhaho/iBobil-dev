<?php

// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
// header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Auth-Token');

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'Api',

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('test', 'AuthController@test');

    Route::get('viewOne/{id}', 'ProductController@viewOne');
    Route::get('viewOne2/{id}', 'ProductController@viewOne2');
    Route::get('deactivated/{id}', 'ProductController@deactivated');
    Route::get('activated/{id}', 'ProductController@activated');
    Route::get('getCaravan', 'ProductController@getCaravan');
    Route::get('getRV', 'ProductController@getRV');
    Route::get('getAll', 'ProductController@getAll');

    Route::post('update_profile', 'UserController@update_profile');
    Route::post('update_product/{id}', 'ProductController@update_product');
    Route::post('update_images/{id}', 'ProductController@update_images');
    Route::post('remove_image/{id}', 'ProductController@remove_image');  

    Route::get('getAllBrand', 'BrandController@index');
    Route::post('update_brands', 'BrandController@update_brands');
    Route::get('brandOne/{id}', 'BrandController@brandOne');

    Route::post('update_home', 'HomeController@update');
    Route::post('update_finance', 'FinanceController@update_finance');
    Route::post('update_rv', 'RvController@update_rv');
    Route::post('update_caravan', 'CaravanController@update_caravan');
    Route::post('get_home', 'HomeController@index');

    Route::post('update_about', 'AboutController@update');
    Route::post('update_footer', 'FooterController@update');
    Route::post('update_top', 'FooterController@update_top');

    Route::get('viewOneMoreInfo/{id}', 'ProductController@viewOneMoreInfo'); 

    Route::post('finance', 'ProductController@finance'); 
    Route::post('loan', 'LoanController@index'); 


});
