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
            $addBucket               = new Bucket;
            $addBucket->pro_id_fk    = $proID;
            $addBucket->u_id_fk      = Auth::id();
            $addBucket->quantity     = $quantity;
            $addBucket->buying_price = $productDetails->saling_price;
            $addBucket->save();
        } else{
            // if (Cookie::get('bucket') !== false) {
            //     $bucket = Cookie::get('bucket');
            //     echo $bucket;
            //     echo "string";
            //     $addBucket               = array();
            //     $addBucket[$proID]['pro_id_fk']    = $proID;
            //     $addBucket[$proID]['quantity']    = $quantity;
            //     $addBucket[$proID]['buying_price'] = $productDetails->saling_price;

            //     // array_push($bucket, $addBucket);
            //     $bag = json_encode($addBucket);
            //     Cookie::queue('bucket', $bag, 120);
            // } else{
            //     $bucket = array();

            //     $addBucket               = array();
            //     $addBucket[$proID]['pro_id_fk']    = $proID;
            //     $addBucket[$proID]['quantity']    = $quantity;
            //     $addBucket[$proID]['buying_price'] = $productDetails->saling_price;

            //     // array_push($bucket, $addBucket);
            //     $bag = json_encode($addBucket);
            //     Cookie::queue('bucket',$bag, 120);

            // }

            if (Cookie::get('bucket') !== false) {
                $bucket = Cookie::get('bucket');
                $bag = json_decode($bucket);
                print_r($bag);
                echo "12";
            }else{
                $bag = array();
                echo "123";
            }
            $addBucket               = array();
            $addBucket[$proID]['pro_id_fk']    = $proID;
            $addBucket[$proID]['quantity']    = $quantity;
            $addBucket[$proID]['buying_price'] = $productDetails->saling_price;

            array_push($bag, $addBucket);
            $bag = json_decode($bag);

            // Session::flash('bucket',$addBucket);
            Cookie::queue('bucket', $bag, 120);
            // return redirect()->back();
        }
    }
}
