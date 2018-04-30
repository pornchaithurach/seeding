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

use App\User;


Route::get('/', function () {
    return redirect('login');
});
Auth::routes();

Route::get("/logout", function () {
    Auth::logout();
    return redirect('login');
});


Route::get('/home', function () {
    return redirect('/seed/index');
});

Route::get('/seed/index', 'AuthorizeController@index')->middleware(['auth']);

Route::get('/invest', 'InvestController@invest')->middleware(['auth']);

Route::get('/operation', 'OperationController@operation')->middleware(['auth']);

/*
 * การกำหนด route ของกลุ่มการผลิตพันธุ์พืข
 * route produce group
 */
Route::group(['prefix' => 'produce', 'middleware' => 'auth'], function () {
    Route::get('indexPlan', 'PlanController@indexPlan')->name('produce/indexPlan');
    Route::post('storePlan', 'PlanController@storePlan');
    Route::get('editPlan', 'PlanController@editPlan')->name('produce/editPlan');
    Route::get('destroyPlan', 'PlanController@destroyPlan')->name('produce/destroyPlan');
    Route::get('action', function () {
        return view('/manufacture/action');
    });
});


Route::get('/selling', function () {
    return view('/distribute/sell');
})->middleware(['auth']);

Route::get('/inventory', function () {
    return view('/distribute/inventory');
})->middleware(['auth']);

Route::get('/training', function () {
    return view('/education/train');
})->middleware(['auth']);

Route::get('/developing', function () {
    return view('/education/develop');
})->middleware(['auth']);

