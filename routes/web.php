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


/*                  Route for Auth               */
Route::get('/login', 'authCont@viewLogin')->name('login');

Route::get('/register', 'authCont@register');

Route::post('/postRegister', 'authCont@postRegister');

Route::post('/postLogin', 'authCont@login');

Route::get('/logout', 'authCont@logout');


/*                  Non Protected Route for Forget                  */
Route::post('/postForgetCheckEmail', 'authCont@checkForgetEmailOne');

Route::get('/viewForgetStepTwo', function () {
    return view('authentication.forget-step-two');
});

Route::get('/forgetPassword', function () {
    return view('authentication.forget-step-one');
});

Route::post('/postCodeForget', 'authCont@checkCodeForgetTwo');

Route::get('/viewForgetStepThree', function(){
    return view('authentication.forget-step-three');
});

Route::post('/postForgetNewPass', 'authCont@resetNewPass');



/*                  Route for Index             */
Route::get('/', function () {
    return view('buyer.main');
});

Route::group(['middleware' => ['auth']], function () {
    /*              Route for Auth              */
    Route::get('/verified', 'authCont@verifiedEmail');

    Route::post('/postVerified', 'authCont@checkCodeVerified');

    Route::post('/addToCart', 'buyerCont@addToCart');

    /*              Route for buyer             */
    Route::post('/addToCart', 'buyerCont@addToCart');

    Route::get('/deleteSpecificCart/{id}', 'buyerCont@deleteSpecificItemCart');
    
    Route::get('/deleteAllCartUser', 'buyerCont@deleteAllCartUser');

    Route::get('/incrementItem/{id}', 'buyerCont@incrementItem');

    Route::get('/decrementItem/{id}', 'buyerCont@decrementItem');

    Route::get('/profile', 'buyerCont@showViewProfile');

    Route::post('/postUpdateProfileBuyer', 'buyerCont@updateProfile');

    Route::get('/orderUp', 'buyerCont@addOrder');

    Route::get('/orderBuyer', 'buyerCont@showOrderBuyer');

    Route::get('/receiveOrder', 'buyerCont@receiveOrder');

    /*              Route for Seller            */
    Route::get('/profileSeller', 'sellerCont@showViewProfile');

    Route::get('/seller', 'sellerCont@showHomepage');

    Route::get('/item', 'sellerCont@showItempage');

    Route::get('/changeStatus/{id}', 'sellerCont@changeStatus');

    Route::get('/edit/{id}', 'sellerCont@editItem');

    Route::post('/postUpdate', 'sellerCont@updateItem');

    Route::get('/delete/{id}','sellerCont@deleteItem');

    Route::get('/addItem', 'sellerCont@viewAddItem');

    Route::post('/postAddItem', 'sellerCont@addItem');

    Route::get('/transaction', 'sellerCont@showOrder')->name('trans');;

    Route::get('/showDetailOrder/{id}', 'sellerCont@showDetailOrder');

    Route::get('/confirmOrder/{id}', 'sellerCont@confirmOrder');

    Route::post('/postUpdateProfileSeller', 'sellerCont@updateProfile');
    
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