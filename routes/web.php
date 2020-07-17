<?php
use App\item;
use App\cart;
use Illuminate\Support\Facades\Auth;
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


/*              Route for Auth                */
Route::get('/login', 'authCont@viewLogin')->name('login');

Route::get('/register', 'authCont@register');

Route::post('/postRegister', 'authCont@postRegister');

Route::post('postLogin', 'authCont@login');

Route::get('/logout', 'authCont@logout');

Route::get('/', function () {
    return view('buyer.main');
});

Route::post('/addToCart', 'buyerCont@addToCart');

Route::group(['middleware' => ['auth']], function () {
    /*              Route for buyer             */
    Route::post('/addToCart', 'buyerCont@addToCart');

    Route::get('/deleteSpecificCart/{id}', 'buyerCont@deleteSpecificItemCart');
    
    Route::get('/deleteAllCartUser', 'buyerCont@deleteAllCartUser');
    
});

/*              Retrieving neccessary data for Layout                   */
View::composer(['buyer.layout', 'buyer.main'], function($view){
    $item_data = item::all();

    $user = Auth::user();

    if(Auth::check()){
        $cart_data = cart::where('id_buyer','=', $user->id)->get();
        $total_price_cart = cart::where('id_buyer','=', $user->id)->sum('sub_total_price');
        $view->with(['item_data'=>$item_data, 'cart_data'=>$cart_data, 'total_price_cart'=>$total_price_cart]);
    }else{
        $view->with('item_data',$item_data);
    }
});