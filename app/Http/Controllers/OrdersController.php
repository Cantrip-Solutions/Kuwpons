<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Model\Orders;
use \App\Model\Transactions;
use \App\Model\Bucket;
use \App\Model\Product;
use Crypt;
use Session;
use Auth;
use Cookie;

class OrdersController extends Controller
{
    //
    public function chartOrders()
    {
    	$live  = array('menu'=>'41','parent'=>'5');
    	$orders = Orders::all();
    	return view('admin.chartOrders', compact('live','orders'));
    	
    }

    public function chartTransactions()
    {
    	$live  = array('menu'=>'42','parent'=>'5');
    	$transactions = Transactions::all();
    	return view('admin.chartTransactions', compact('live','transactions'));
    }

    public function addToCart($id, $quantity='1')
    {
        $proID = Crypt::decrypt($id);
        $productDetails = Product::find($proID);

        if (Auth::check()) {
            $uID = Auth::id();
            $checkBucket = Bucket::where('u_id_fk','=',$uID)->where('pro_id_fk','=',$proID)->get();
            if (count($checkBucket) == 0) {
                $addBucket               = new Bucket;
                $addBucket->pro_id_fk    = $proID;
                $addBucket->u_id_fk      = Auth::id();
                $addBucket->quantity     = $quantity;
                $addBucket->buying_price = $productDetails->saling_price;
                $addBucket->save();

                $message = json_encode(array('type'=>'success','message'=>'Added to Cart'));
            }
            else{
                $message = json_encode(array('type'=>'error','message'=>'Already in Cart'));
            }
            
        } else{
            $bag = array();
            if (Cookie::get('bucket') !== null) {
                $cookieBag = json_decode(Cookie::get('bucket'));
                $bag = (array)$cookieBag;
                
            }
            if(!in_array($proID, array_keys($bag))){
                $bag[$proID] = $quantity;
                $bag = json_encode($bag);
                Cookie::queue('bucket', $bag, 1440);
                $message = json_encode(array('type'=>'success','message'=>'Added to Cart'));

            } else{
                $message = json_encode(array('type'=>'error','message'=>'Already in Cart'));
            }
        }
        return $message;
    }

    public function cartValue()
    {
        if (Auth::check()) {
            $uId = Auth::id();
            $checkBucket = Bucket::where('u_id_fk','=',$uId)->get();
            $countBucket = count($checkBucket);

        } else{
            if (Cookie::get('bucket') !== null) {
                $cookieBag = json_decode(Cookie::get('bucket'),true);
                $countBucket = count($cookieBag);
            } else{
                $countBucket = 0;
            }

        }
        return $countBucket;
    }
    public function cartSync()
    {
        if (Cookie::get('bucket') !== null) {
            $cookieBag = json_decode(Cookie::get('bucket'), true);
            $uID = Auth::id();
            foreach ($cookieBag as $key => $item) {
                $checkBucket = Bucket::where('u_id_fk','=',$uID)->where('pro_id_fk','=',$key)->get();
                if (count($checkBucket) == 0) {
                    $productDetails = Product::find($key);
                    $addBucket               = new Bucket;
                    $addBucket->pro_id_fk    = $key;
                    $addBucket->u_id_fk      = Auth::id();
                    $addBucket->quantity     = $item;
                    $addBucket->buying_price = $productDetails->saling_price;
                    $addBucket->save();
                }
            }
            Cookie::queue('bucket', null, 1440);
        }
    }
    public function myCart()
    {
        if (Auth::check()) {
            $uId = Auth::id();
            $bucketItems = Bucket::where('u_id_fk','=',$uId)->get();
            if (count($bucketItems) != 0) {
                foreach ($bucketItems as $key => $value) {
                   $bucketProducts[$value->pro_id_fk]=$value->quantity;
                }
               /* $bucketProducts = $bucketItems->pluck('pro_id_fk')->toArray();*/

                $productDetails = Product::whereIn('products.id',array_keys($bucketProducts))->join('buckets','products.id','=','buckets.pro_id_fk')->select('products.*','buckets.quantity as cartQuantity','buckets.id as bucketID')->get();
            } else{
                $bucketProducts = [];
                $bucketProducts=(array)$bucketProducts;
                $productDetails = Product::whereIn('id',$bucketProducts)->get();
            }
            
        } else{
            if (Cookie::get('bucket') !== null) {
                $bucketProducts = (array)json_decode(Cookie::get('bucket'), true);
                $productDetails = Product::whereIn('id',array_keys($bucketProducts))->get();


            } else{
                $bucketProducts = [];
                $bucketProducts=(array)$bucketProducts;
                $productDetails = Product::whereIn('id',$bucketProducts)->get();

            }
        }


        // echo "<pre>";
        // print_r($bucketProducts);
        // exit;
        return view('home.myCart', compact('productDetails','bucketProducts'));
    }

    public function updateCartQuantity(Request $req)
    {
        $qty = $req->quantity;
        $pdID = $req->proID;

        if (Auth::check()) {
            $uID = Auth::id();
            $updateBucket = Bucket::where('pro_id_fk','=',$pdID)->where('u_id_fk','=',$uID)->update([
                'quantity' => $qty
                ]);
            echo "ok";
            
        } else{
            $cookieBag = json_decode(Cookie::get('bucket'),true);
            $bucketProducts=(array)$cookieBag;
            $bucketProducts[$pdID] = $qty;
            $bucketProducts = json_encode($bucketProducts);
            Cookie::queue('bucket', $bucketProducts, 1440);
            echo "ok";
        }
    }

    public function deleteProductFromCart(Request $req)
    {
        $pdID = Crypt::decrypt($req->proID);
        if (Auth::check()) {
            $uID = Auth::id();
            $updateBucket = Bucket::where('pro_id_fk','=',$pdID)->where('u_id_fk','=',$uID)->delete();
            echo "ok";
        } else{
            $cookieBag = json_decode(Cookie::get('bucket'),true);
            $bucketProducts=(array)$cookieBag;
            // print_r($bucketProducts);
            // exit;
            unset($bucketProducts[$pdID]);
            $bucketProducts = json_encode($bucketProducts);
            Cookie::queue('bucket', $bucketProducts, 1440);
            echo "ok";
        }

    }

    public function myOrder()
    {
        return view('home.myOrder');
        # code...
    }
}
