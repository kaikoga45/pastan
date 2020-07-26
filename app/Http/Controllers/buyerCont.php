<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cart;
use App\item;
use App\buyerOrder;
use App\User;

use Storage;
use Validator;
use Crypt;
use Auth;

class buyerCont extends Controller
{
    public function addToCart(Request $req){
        $user = Auth::user();
        
        if($user->address != null || $user->phone_number != null){
            $cart_buyer = cart::where([
                ['id_buyer','=', $user->id], 
                ['id_item', '=',$req->id_item_buy],
                ])->first();
            $data_item = item::where('item_id', '=',$req->id_item_buy)->first();
            $amount_buyer_buy = $req->demo3_22;
            $check_order = buyerOrder::where('id_buyer', '=', $user->id)->get();
            if(count($check_order) == 0){
                if(count($cart_buyer)>=1){
                    $total_amount_buyer_buy = $amount_buyer_buy + $cart_buyer->quantity_item;
    
                    if($amount_buyer_buy > $data_item->item_stock){
                        return redirect()->back()->with('addError', 'Maaf, jumlah item yang anda pesan telah melebihi stock item tersebut.'); 
                    }elseif($total_amount_buyer_buy < $data_item->item_minimum){
                        return redirect()->back()->with('addError', 'Maaf, jumlah item yang anda pesan kurang dari minimal pembelian'); 
                    }else{
                        $current_amount_item = $cart_buyer->quantity_item;
                        $cart_buyer->quantity_item = $current_amount_item + $req->demo3_22;
            
                        $price_item =  item::select('item_price')->where('item_id', $req->id_item_buy)->first();
                        
                        $amount_buy = $req->demo3_22;
            
                        $calculate_sub_total_price = $amount_buy * $price_item->item_price;
                        
                        $current_sub_total_price = $cart_buyer->sub_total_price;
                        
                        $update_total_price = $current_sub_total_price + $calculate_sub_total_price;
            
                        $cart_buyer->sub_total_price = $update_total_price;
            
                        $cart_buyer->save();
            
                        return redirect()->back()->with('addComplete', 'Jumlah item telah berhasil ditambahkan ke keranjang anda!');
                    }
                }else{
                    $data_item = item::where('item_id', '=',$req->id_item_buy)->first();
                    $amount_buyer_buy = $req->demo3_22;
    
                    if($amount_buyer_buy > $data_item->item_stock){
                        return redirect()->back()->with('addError', 'Maaf, jumlah item yang anda pesan telah melebihi stock item tersebut.'); 
                    }elseif($amount_buyer_buy < $data_item->item_minimum){
                        return redirect()->back()->with('addError', 'Maaf, jumlah item yang anda pesan kurang dari minimal pembelian'); 
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
                        $add_cart_data->id_seller= $data_item->item_id_seller;
            
                        $add_cart_data->save();
    
                        return redirect()->back()->with('addComplete', 'Jumlah item telah berhasil ditambahkan ke keranjang anda!');
            
                        return redirect()->back();
                    }
                } 
            }else{
                return redirect()->back()->with('addError', 'Saat ini anda tidak diperbolehkan untuk berbelanja. Anda harus menunggu sampai pesanan anda sebelumnnya telah berhasil dikonfirmasi telah sampai ke anda!');
            }
        }else{
            return redirect ('/profile')->with('noProfileData', 'Anda harus mengisi data nomor telepon beserta alamat tempat tinggal untuk keperluan mengantar pesanan anda ke lokasi yang ditujukan');
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

    public function incrementItem($id_item){
        $user = Auth::user();
        $data_cart = cart::where([
            ['id_buyer','=', $user->id], 
            ['id_item', '=',$id_item],
            ])->first();
        $data_item = item::where('item_id', '=',$id_item)->first();
        
        $quantity_cart_after = $data_cart->quantity_item + 1;
        
        if($data_cart->quantity_item > $data_item->item_stock){
            $differentQty = $data_cart->quantity_item - $data_item->item_stock;
            $newQty = $data_cart->quantity_item - $differentQty;
            $newPrice = $newQty * $data_item->item_price;

            $data_cart->quantity_item = $newQty;
            $data_cart->sub_total_price = $newPrice;
            $data_cart->save();
            return redirect()->back()->with('addError', 'Maaf, jumlah item yang anda pesan telah melebihi stock item tersebut sehingga dikurangi agar sesuai dengan jumlah stock item yang ada!'); 
        }elseif($quantity_cart_after == $data_item->item_stock){
            $newQty = $data_cart->quantity_item + 1;
            $newPrice = $newQty * $data_item->item_price;
            cart::where([
                ['id_buyer','=', $user->id], 
                ['id_item', '=',$id_item],
                ])->increment('quantity_item');
            $data_cart->sub_total_price = $newPrice; 
            $data_cart->save();
            return redirect()->back()->with('addComplete', 'Telah berhasil menambahkan ke keranjang');
        }elseif($quantity_cart_after < $data_item->item_stock){
            $newQty = $data_cart->quantity_item + 1;
            $newPrice = $newQty * $data_item->item_price;
            cart::where([
                ['id_buyer','=', $user->id], 
                ['id_item', '=',$id_item],
                ])->increment('quantity_item');
            $data_cart->sub_total_price = $newPrice; 
            $data_cart->save();
            return redirect()->back()->with('addComplete', 'Telah berhasil menambahkan ke keranjang'); 
        }elseif($quantity_cart_after > $data_item->item_stock){
            return redirect()->back()->with('addError', 'Maaf, Jumlah item yang anda pesan telah mencapai batas stock dari item tersebut!'); 
        }
        
    }

    public function decrementItem($id_item){
        $user = Auth::user();
        $data_cart = cart::where([
            ['id_buyer','=', $user->id], 
            ['id_item', '=',$id_item],
            ])->first(); 
        
        $data_item = item::where('item_id', '=',$id_item)->first();
        
        $quantity_cart_after = $data_cart->quantity_item - 1;
        
        if($data_cart->quantity_item > $data_item->item_stock){
            $differentQty = $data_cart->quantity_item - $data_item->item_stock;
            $newQty = $data_cart->quantity_item - $differentQty;
            $newPrice = $newQty * $data_item->item_price;
            
            $data_cart->quantity_item = $newQty;
            $data_cart->sub_total_price = $newPrice;
            $data_cart->save();
            
            return redirect()->back()->with('addError', 'Maaf, jumlah item yang anda pesan telah melebihi stock item tersebut sehingga telah dikurangi agar sesuai dengan jumlah stock item yang ada!'); 
        }elseif($quantity_cart_after < $data_item->item_minimum){
            
            return redirect()->back()->with('addError', 'Maaf, Jumlah item yang anda ingin kurangi telah mencapai batas minimum jumlah item bisa dibeli!'); 
        
        }elseif($quantity_cart_after == $data_item->item_stock){
            $newQty = $data_cart->quantity_item - 1;
            $newPrice = $newQty * $data_item->item_price;
            cart::where([
                ['id_buyer','=', $user->id], 
                ['id_item', '=',$id_item],
                ])->decrement('quantity_item');
            $data_cart->sub_total_price = $newPrice; 
            $data_cart->save();
            
            return redirect()->back()->with('addComplete', 'Telah berhasil mengurangi jumlah item di keranjang anda!');
        }elseif($quantity_cart_after < $data_item->item_stock){
            $newQty = $data_cart->quantity_item - 1;
            $newPrice = $newQty * $data_item->item_price;

            cart::where([
                ['id_buyer','=', $user->id], 
                ['id_item', '=',$id_item],
                ])->decrement('quantity_item');
            
            $data_cart->sub_total_price = $newPrice;
            
            $data_cart->save();
            
            return redirect()->back()->with('addComplete', 'Telah berhasil mengurangi jumlah item di keranjang anda!'); 
        }
        
    }

    public function showViewProfile(){
        $data_user = Auth::user();
        return view('buyer.profile', ['data_user'=>$data_user]);
    }

    public function updateProfile(Request $req){
        $user = Auth::user();

        $data_user = User::where('id','=', $user->id)->first();

        $data_user->name = $req->name;
        $data_user->phone_number = Crypt::encrypt($req->phone_number);
        $data_user->address = Crypt::encrypt($req->address);

        if($req->hasFile('image')){
            $imageStore = $req->file('image');
            $fileArray = array('image' => $imageStore);
            $rules = array(
            'image' => 'mimes:jpeg,jpg,png|required'
            );

            $validator = Validator::make($fileArray, $rules);

            if ($validator->fails()){
                $data_user->save();
                return redirect()->back()->with('notImage', 'Gambar gagal diupload! Pastikan gambar anda bertipe .jpeg / .jpg / .png');
            }else{
                if($data_user->image_path != null){
                    Storage::delete($data_user->image_path);
                    $image = $req->file('image')->store('profile');  
                    $data_user->image_path = $image;
                    $data_user->save();
                }
            }
        }else{
            $data_user->save();
        }
        
        return redirect ()->back()->with('processComplete', 'Telah berhasil melakukan perbarui data pribadi anda!');
    }

    public function addOrder(){
        $user = Auth::user();
        $check_go = 'true';

        $data_cart = cart::where('id_buyer','=', $user->id)->get();
        
        foreach($data_cart as $dtc){
            $data_item = item::where('item_id', '=',$dtc->id_item)->first();
            if($dtc->quantity_item > $data_item->item_stock){
                $item_name = $dtc->item_name;
                $message =  'yang anda pesan, jumlahnya telah melebih stocknya. Silahkan periksa kembali!';
                $combine = $item_name." ".$message;
                $check_go = 'false';
                return redirect()->back()->with('addError', $combine);
            }elseif($data_item->item_status == 'tidak tersedia'){
                $item_name = $dtc->item_name;
                $message =  'yang anda pesan, saat ini tidak tidak tersedia sehingga tidak bisa dibeli!';
                $combine = $item_name." ".$message;
                $check_go = 'false';
                return redirect()->back()->with('addError', $combine);
            }
        }

        if($check_go == 'true'){
            $who_send = cart::distinct()->select('id_seller')->where('id_buyer','=', $user->id)->inRandomOrder()->limit(1)->first();

            foreach($data_cart as $dtc){
                $data_item = item::where('item_id', '=',$dtc->id_item)->first();
                $add_buyerOrder_data = new buyerOrder;
                $buyer_info = Auth::user();
                
                $add_buyerOrder_data->id_buyer = $dtc->id_buyer;
                $add_buyerOrder_data->id_seller = $data_item->item_id_seller;
                $add_buyerOrder_data->id_item = $data_item->item_id;
                $add_buyerOrder_data->item_name = $dtc->item_name;
                $add_buyerOrder_data->item_quantity = $dtc->quantity_item;
                $add_buyerOrder_data->item_type_sell = $data_item->item_type_sell;
                $add_buyerOrder_data->buyer_name = $buyer_info->name;
                $add_buyerOrder_data->buyer_address = $buyer_info->address;
                $add_buyerOrder_data->buyer_phone_number = $buyer_info->phone_number;
                $add_buyerOrder_data->order_date = date("Y-m-d");
                $add_buyerOrder_data->total_price = $dtc->sub_total_price;
                $add_buyerOrder_data->sender = $who_send->id_seller;
                $name_sender = item::where('item_id_seller', '=',$who_send->id_seller)->first();
                $add_buyerOrder_data->sender_name = $name_sender->item_name_seller;           
                $add_buyerOrder_data->save();

                $current_qty = $data_item->item_stock;
                $new_qty = $current_qty - $dtc->quantity_item;
                item::where('item_id', '=',$dtc->id_item)->update(['item_stock'=>$new_qty]);

            }

            buyerOrder::where('id_buyer', '=',$user->id)->update(['status_order'=>'Menunggu konfirmasi penjual']);
            cart::where('id_buyer','=', $user->id)->delete();
            return redirect('/orderBuyer')->with('addComplete', 'Berhasil diproses! Anda bisa melihat status pesanan di lewat menu status pesanan. Tolong perbarui halamannya untuk mendapatkan data terbaru!');
        }
        
    }
    
    public function showOrderBuyer(){
        $user = Auth::user();
        $data_order = buyerOrder::where('id_buyer', '=', $user->id)->get();

        return view('buyer.statusOrder', ['data_order'=>$data_order]);
    }

    public function receiveOrder(){
        $user = Auth::user();
        $data_order = buyerOrder::where('id_buyer', '=', $user->id)->delete();
        return redirect()->back()->with('notifyReceiveSuccess', 'Terima kasih telah belanja di pastan. Apabila ada kekurangan dalam sistemnya, silahkan beritahukan kepada developer Pastan!');
    }

}
