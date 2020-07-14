<?php
use App\item;
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


/* Route for buyer */
Route::get('/', function () {
    return view('buyer.main');
});

Route::post('/test', 'buyerCont@searchItem');

/**/
View::composer(['buyer.layout', 'buyer.main'], function($view){
    $item_data = item::all();
    $view->with('item_data', $item_data);
});