<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Storage;
use Crypt;

use App\item;
use App\cart;
use App\buyerOrder;
use App\User;

use Session;
use Validator;

class sellerCont extends Controller
{
    public function showHomepage(){
        $seller = Auth::user();
        $data_item = item::where('item_id_seller','=', $seller->id);
        $check_stock = item::where([['item_stock','=', 0], ['item_id_seller','=', $seller->id]]);
        $check_order = buyerOrder::distinct()->select('id_seller')->where('id_seller','=', $seller->id)->get();
        $status_seller = $seller->seller_status;
        return view('seller.main', ['data_item'=>$data_item, 'zero_stock'=>$check_stock, 'check_order'=>$check_order, 'status_seller'=>$status_seller]);
    }

    public function showItempage(){
        $seller = Auth::user();
        $data_item = item::where('item_id_seller','=', $seller->id)->get();

        return view('seller.item', ['data_item'=>$data_item]);
    }

    public function statusSeller(){
        $seller = Auth::user();
        $aktif = 'Aktif';
        $nonaktif = 'Istrahat';

        if($seller->seller_status == $aktif){
            User::where('id', '=', $seller->id)->update(['seller_status'=>$nonaktif]);
            $checkNotAvailable = item::select('item_status')->where([['item_id_seller', '=', $seller->id],['item_status', '=', 'tidak tersedia']])->get();
            if(count($checkNotAvailable )!=0){
                $markNotReady = 'tidak tersedia-x';
                item::where([['item_id_seller', '=', $seller->id],['item_status', '=', 'tidak tersedia']])->update(['item_status'=>$markNotReady]);
                item::where([['item_id_seller', '=', $seller->id],['item_status', '=', 'tersedia']])->update(['item_status'=>'tidak tersedia']);
            }else{
                item::where([['item_id_seller', '=', $seller->id],['item_status', '=', 'tersedia']])->update(['item_status'=>'tidak tersedia']);
            }
        }elseif($seller->seller_status == $nonaktif){
            User::where('id', '=', $seller->id)->update(['seller_status'=>$aktif]);         
            $checkNotAvailable = item::select('item_status')->where([['item_id_seller', '=', $seller->id],['item_status', '=', 'tidak tersedia-x']])->get();
            if(count($checkNotAvailable)!=0){
                $markNotReady = 'tidak tersedia';
                item::where([['item_id_seller', '=', $seller->id],['item_status', '=', 'tidak tersedia']])->update(['item_status'=>'tersedia']);
                item::where([['item_id_seller', '=', $seller->id],['item_status', '=', 'tidak tersedia-x']])->update(['item_status'=>$markNotReady]);
            }else{
                item::where([['item_id_seller', '=', $seller->id],['item_status', '=', 'tidak tersedia']])->update(['item_status'=>'tersedia']);
            }
        }
        return redirect()->back();
    }

    public function changeStatus($id){
        $data_item = item::where('item_id','=', $id)->first();

        if($data_item->item_status == 'tidak tersedia' && $data_item->item_stock == 0){
            return redirect()->back()->with('changeStatusAbort', 'Stock barangnya sudah kosong sehingga tidak bisa diubah status ke tersedia. Silahkan tambah jumlah stocknya terlebih dahulu');
        }elseif($data_item->item_status == 'tersedia'){
            $data_item->item_status = 'tidak tersedia';
            $data_item->save();
            return redirect()->back()->with('processComplete', 'Status barang telah berhasil diubah');
        }elseif($data_item->item_status == 'tidak tersedia'){
            $data_item->item_status = 'tersedia';
            $data_item->save();
            return redirect()->back()->with('processComplete', 'Status barang telah berhasil diubah');
        }
    }

    public function editItem($id){
        $seller = Auth::user();
        $data_item = item::where('item_id','=', $id)->first();
        return view('seller.update', ['data_item'=>$data_item]);
    }

    public function updateItem(Request $req){
        $data_item = item::where('item_id', '=',$req->id_item)->first();
        $data_cart = cart::where('id_item','=', $req->id_item)->first();

        if(count($data_cart)>=1){
            $data_cart->item_name = $req->name;

            $amount_buy = $data_cart->quantity_item;
            $price_item =  $req->price;
            $calculate_sub_total_price = $amount_buy * $price_item;
            $data_cart->sub_total_price = $calculate_sub_total_price;

            $data_cart->save();
        }

        if($req->hasFile('image')){
            $imageStore = $req->file('image');
            $fileArray = array('image' => $imageStore);
            $rules = array(
            'image' => 'mimes:jpeg,jpg,png|required' // max 10000kb
            );

            $validator = Validator::make($fileArray, $rules);

            if ($validator->fails()){
                return redirect()->back()->with('notImage', 'Gambar gagal diupload! Pastikan gambar anda bertipe .jpeg / .jpg / .png');
            }else{
                if($data_item->item_image_path != null){
                    Storage::delete($data_item->item_image_path);
                    $image = $req->file('image')->store('item');  
                    $data_item->item_image_path = $image;
                }
            }
        }

        $data_item->item_name = $req->name;
        $data_item->item_stock = $req->stock;
        $data_item->item_category = $req->category;
        $data_item->item_price = $req->price;
        $data_item->item_quantity_get = $req->price_get;
        $data_item->item_minimum = $req->minimum_get;
        $data_item->item_type_sell= $req->type_sell;
        $data_item->item_status = $req->status;
        $data_item->save();

        return redirect('/item')->with('processComplete', 'Keterangan barang telah berhasil di perbarui');
    }

    public function deleteItem($id){
        $data_item = item::where('item_id','=', $id)->first();
        
        $data_cart = cart::where('id_item','=', $id)->first();

        if(count($data_cart)>=1){
            if($data_item->item_image_path != null){
                Storage::delete($data_item->item_image_path);
            }
            $data_item->delete();
            $data_cart->delete();
        }else{
            if($data_item->item_image_path != null){
                Storage::delete($data_item->item_image_path);
            }
            $data_item->delete();
        }
         
        return redirect('/item')->with('processComplete', 'Data barang telah berhasil dihapuskan');
    }

    public function viewAddItem(){
        return view('seller.addItem');
    }

    public function addItem(Request $req){
        $data_item = new item;
        $seller = Auth::user();

        $imageStore = $req->file('image');
        $fileArray = array('image' => $imageStore);
        $rules = array(
        'image' => 'mimes:jpeg,jpg,png|required' // max 10000kb
        );

        $validator = Validator::make($fileArray, $rules);

        if ($validator->fails()){
            return redirect()->back()->with('notImage', 'Gambar gagal diupload! Pastikan gambar anda bertipe .jpeg / .jpg / .png');
        }else{
            $image = $req->file('image')->store('item');
        }
        
        $data_item->item_image_path = $image;
        $data_item->item_name = $req->name;
        $data_item->item_id_seller = $seller->id;
        $data_item->item_name_seller = $seller->name;
        $data_item->item_stock = $req->stock;
        $data_item->item_category = $req->category;
        $data_item->item_price = $req->price;
        $data_item->item_quantity_get = $req->price_get;
        $data_item->item_minimum = $req->minimum_get;
        $data_item->item_type_sell= $req->type_sell;
        $data_item->item_status = $req->status;
        $data_item->save();

        return redirect('/item')->with('processComplete', 'Data barang telah berhasil ditambahkan');;
    }

    public function showOrder(){
        return view('seller.order');
    }

    public function showDetailOrder($id){
        $seller = Auth::user();
        $data_order = buyerOrder::where([
            ['id_buyer','=', $id], 
            ['id_seller', '=',$seller->id],
            ])->get();
        return view('seller.orderDetail', ['data_order'=>$data_order]);
    }

    public function confirmOrder($id){
        $seller = Auth::user();
        $data_order = buyerOrder::where('id_buyer','=', $id)->get();

        $alone_sender = 'true';

        $distinct_seller_info = buyerOrder::distinct()->select('id_seller')->where('id_buyer','=', $id)->get();

        foreach($data_order as $dto){
            if($dto->id_seller != $seller->id){
                $alone_sender = 'false';
            }
        }
        
        if($alone_sender == 'true'){
            buyerOrder::where('id_buyer', '=',$id)->update(['status_order'=>'Telah dikonfirmasi. Silahkan ditunggu!', 'status_alone'=>'true']);
            return redirect()->back()->with('processComplete', 'Berhasil dikonfirmasi. Segere persiapkan pesannnya serta panggil tukang ojek untuk mengantar barang ke lokasi pemesan!');
        }else{
            foreach ($distinct_seller_info as $dsi) {
                if($dsi->id_seller != $seller->id){
                    $data_to_send = [$dsi->id_seller];
                } 
            }
            buyerOrder::where('id_buyer', '=',$id)->update(['status_order'=>'Telah dikonfirmasi. Silahkan ditunggu!']);
            $id_user = $id;
            Session::put('infoWhereToSendIt', 'Anda telah dipilih untuk memanggil tukang ojek. Sekarang anda persiapkan pesanannya, kemudian bilang kepada tukang ojek untuk mengunjungi ke beberapa orang untuk mengambil pesananya juga agar bisa diantarkan sekalian. Berikut ini daftar nama orang yang harus tukang ojek kunjungi: ');
            return view('seller.order', ['data_to_send'=>$data_to_send, 'id_user'=>$id_user]);
        }
        
    }

    public function showViewProfile(){
        $data_user = Auth::user();
        return view('seller.profileSeller', ['data_user'=>$data_user]);
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
            'image' => 'mimes:jpeg,jpg,png|required' // max 10000kb
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
        return redirect ()->back()->with('processComplete', 'Telah berhasil melakukan update data pribadi anda!');
    }
    
}
