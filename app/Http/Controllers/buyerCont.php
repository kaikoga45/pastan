<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cart;
use Auth;
use App\item;

class buyerCont extends Controller
{
    public function addToCart(Request $req){
        $user = Auth::user();
        $cart_buyer = cart::where([
            ['id_buyer','=', $user->id], 
            ['id_item', '=',$req->id_item_buy],
            ])->first();
            
        if(count($cart_buyer)>=1){
            $current_amount_item = $cart_buyer->quantity_item;
            $cart_buyer->quantity_item = $current_amount_item + $req->demo3_22;

            $price_item =  item::select('item_price')->where('item_id', $req->id_item_buy)->first();
            
            $amount_buy = $req->demo3_22;

            $calculate_sub_total_price = $amount_buy * $price_item->item_price;
            
            $current_sub_total_price = $cart_buyer->sub_total_price;
            
            $update_total_price = $current_sub_total_price + $calculate_sub_total_price;

            $cart_buyer->sub_total_price = $update_total_price;

            $cart_buyer->save();

            return redirect()->back();
        }else{
            $add_cart_data = new cart;
        
            $add_cart_data->id_buyer = $user->id;
            $add_cart_data->id_item = $req->id_item_buy;
            $add_cart_data->quantity_item = $req->demo3_22;
            $add_cart_data->item_name = $req->name_item_buy;
            
            $amount_buy = $req->demo3_22;
            $price_item =  item::select('item_price')->where('item_id', $req->id_item_buy)->first();
            $calculate_sub_total_price = $amount_buy * $price_item->item_price;
            $add_cart_data->sub_total_price = $calculate_sub_total_price;

            $add_cart_data->save();

            return redirect()->back();
        }        
    }

    public function deleteSpecificItemCart($id_item){
        $user = Auth::user();
        $cart_buyer = cart::where([
            ['id_buyer','=', $user->id], 
            ['id_item', '=',$id_item],
            ])->delete();
        return redirect()->back();
    }

    public function deleteAllCartUser(){
        $user = Auth::user();
        $cart_buyer = cart::where('id_buyer','=', $user->id)->delete();
        return redirect()->back();
    }
}
