<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Model\UserInfo;
use \App\Model\Orders;
use \App\Model\Transactions;
use \App\Model\Bucket;
use \App\Model\Product;
use \App\Model\Redeems;
use Crypt;
use Session;
use Auth;
use Cookie;
use Mail;
use DB;
use Hash;
use Helper;
use Validator;

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
            $checkBucket = Bucket::where('u_id_fk','=',$uID)->where('pro_id_fk','=',$proID)->first();
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
                $updateBucket = Bucket::where('pro_id_fk','=',$proID)->where('u_id_fk','=',$uID)->update([
                'quantity' => $checkBucket->quantity + 1
                ]);
                $message = json_encode(array('type'=>'success','message'=>'Quantity upgraded to cart'));
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
                $cookieBag = json_decode(Cookie::get('bucket'),true);
                $bucketProducts=(array)$cookieBag;
                $bucketProducts[$proID] = $bucketProducts[$proID] + 1;
                $bucketProducts = json_encode($bucketProducts);
                Cookie::queue('bucket', $bucketProducts, 1440);
                $message = json_encode(array('type'=>'success','message'=>'Quantity upgraded to cart'));
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
                echo $key;
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

            echo "string";
        }
    }
    public function myCart()
    {
        // if (Auth::check()) {
        //     $uId = Auth::id();
        //     $bucketItems = Bucket::where('u_id_fk','=',$uId)->get();
        //     if (count($bucketItems) != 0) {
        //         foreach ($bucketItems as $key => $value) {
        //            $bucketProducts[$value->pro_id_fk]=$value->quantity;
        //         }
        //        /* $bucketProducts = $bucketItems->pluck('pro_id_fk')->toArray();*/

        //         $productDetails = Product::whereIn('products.id',array_keys($bucketProducts))->join('buckets','products.id','=','buckets.pro_id_fk')->select('products.*','buckets.quantity as cartQuantity','buckets.id as bucketID')->get();
        //     } else{
        //         $bucketProducts = [];
        //         $bucketProducts=(array)$bucketProducts;
        //         $productDetails = Product::whereIn('id',$bucketProducts)->get();
        //     }
            
        // } else{
        //     if (Cookie::get('bucket') !== null) {
        //         $bucketProducts = (array)json_decode(Cookie::get('bucket'), true);
        //         $productDetails = Product::whereIn('id',array_keys($bucketProducts))->get();


        //     } else{
        //         $bucketProducts = [];
        //         $bucketProducts=(array)$bucketProducts;
        //         $productDetails = Product::whereIn('id',$bucketProducts)->get();

        //     }
        // }

        $cartInformations = self::cartInformation();
        $bucketProducts = $cartInformations['bucketProducts'];
        $productDetails = $cartInformations['productDetails'];

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

    public function checkout()
    {
        if (Auth::check()) {
            $cartSync = self::cartSync();
            # code...
        }
        $cartInformations = self::cartInformation();
        $bucketProducts = $cartInformations['bucketProducts'];
        $productDetails = $cartInformations['productDetails'];
        
        $totalPrice = 0;
        foreach ($productDetails as $product) {
            $totalPrice += $product->saling_price * $bucketProducts[$product->id];
        } 

        $countries = DB::table('countries')->get();

        return view('home.checkout', compact('productDetails','bucketProducts','totalPrice','countries'));
        
    }

    public function cartInformation()
    {
        if (Auth::check()) {
            $uId = Auth::id();
            $bucketItems = Bucket::where('u_id_fk','=',$uId)->get();
            // echo count($bucketItems);
            // exit;
            if (count($bucketItems) != 0) {
                foreach ($bucketItems as $key => $value) {
                   $bucketProducts[$value->pro_id_fk]=$value->quantity;
                }

                // print_r($bucketProducts);
                // exit;
               /* $bucketProducts = $bucketItems->pluck('pro_id_fk')->toArray();*/

                $productDetails = Product::whereIn('products.id',array_keys($bucketProducts))->join('buckets','products.id','=','buckets.pro_id_fk')->select('products.*','buckets.quantity as cartQuantity','buckets.id as bucketID')->where('buckets.u_id_fk','=',$uId)->get();
                // echo $productDetails;
                // print_r($productDetails);
                // exit;
            } else{
                $bucketProducts = [];
                $bucketProducts=(array)$bucketProducts;
                $productDetails = Product::whereIn('id',$bucketProducts)->get();
            }
            
        } else if (Cookie::get('bucket') !== null) {
                $bucketProducts = (array)json_decode(Cookie::get('bucket'), true);
                $productDetails = Product::whereIn('id',array_keys($bucketProducts))->get();


        } else {
                $bucketProducts = [];
                $bucketProducts=(array)$bucketProducts;
                $productDetails = Product::whereIn('id',$bucketProducts)->get();

        }

        $cartValues = ['productDetails'=> $productDetails, 'bucketProducts'=>$bucketProducts];

        return $cartValues;
    }

    public function placeOrder(Request $req)
    {
        # code...
        $email       = $req->email;
        $name        = $req->name;
        $address1    = $req->address1;
        $address2    = $req->address2;
        $country     = $req->country;
        $city        = $req->city;
        $countryCode = $req->countryCode;
        $phone       = $req->phone;
        $postal_code = $req->postal_code;
        $cardNumber      = $req->cardNumber;
        $expire_on_month = $req->expire_on_month;
        $expire_on_year  = $req->expire_on_year;
        $cardName        = $req->cardName;
        $cvv             = $req->cvv;

        $rules = array(
            'name'        => 'required',
            'phone'       => 'required',
            'email'       => 'required',
            'address1'    => 'required',
            'country'     => 'required',
            'city'       => 'required',
            'countryCode' => 'required',
            'postal_code' => 'required',
            'cardNumber' => 'required',
            'expire_on_month' => 'required',
            'expire_on_year' => 'required',
            'cardName' => 'required',
            'cvv' => 'required',
        );
        $validator = Validator::make(array(
            'name'        => $name,
            'email'       => $email,
            'phone'       => $phone,
            'address1'    => $address1,
            'country'     => $country,
            'city'       => $city,
            'countryCode' => $countryCode,
            'postal_code' => $postal_code,
            'cardNumber' => $cardNumber,
            'expire_on_month' => $expire_on_month,
            'expire_on_year' => $expire_on_year,
            'cardName' => $cardName,
            'cvv' => $cvv,
            ), $rules);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else{

            if (!Auth::check()) {
                

                $users = User::where('email','=',$email)->get();
                if (count($users) != 0) {
                    Session::flash('message', 'Email already exists. Please try another email ID');
                    return redirect()->back();
                    exit;

                } else{
                    $password = rand(100000, 999999);
                    $user               = new User;
                    $user->name         = $name;
                    $user->email        = $email;
                    $user->u_role       = 'U';
                    $user->password     = Hash::make($password);
                    $user->showPassword = $password;
                    $user->save();

                    $last_insert_id                 = $user->id;
                    $userInfo                       = new UserInfo;
                    $userInfo->u_id_fk              = $last_insert_id;
                    $userInfo->email                = $email;
                    $userInfo->name                 = $name;
                    $userInfo->phone                = $phone;
                    $userInfo->address1             = $address1;
                    $userInfo->address2             = $address2;
                    $userInfo->postal_code          = $postal_code;
                    $userInfo->city                 = $city;
                    $userInfo->country              = $country;
                    $userInfo->default_address_flag = 1;
                    $userInfo->save();

                    if (Auth::attempt(['email' => $email, 'password' => $password])) {

                    } else{
                        // echo "wrong";
                        return redirect()->back();
                    }
                }
            } else{
                $user = User::find(Auth::id());
                // $address1 = $user->address1;
                // $address2 = $user->address2;
                // $city = $user->city;
                // $countryCode = $user->countryCode;
                // $country = $user->country;
                // $postal_code = $user->postal_code;
                // $phone = $req->phone;
            }


            $uId              = Auth::id();
            $uBillingAddress  = $address1.', '.$address2.', '.$city.', '.$country.', '.$postal_code;
            $uShippingAddress = $address1.', '.$address2.', '.$city.', '.$country.', '.$postal_code;

            $cartSync = self::cartSync();

            // exit;
            
            $cartInformations = self::cartInformation();
            $bucketProducts   = $cartInformations['bucketProducts'];
            $productDetails   = $cartInformations['productDetails'];
            
            $totalPrice       = 0;
            foreach ($productDetails as $product) {
                $totalPrice += $product->saling_price * $bucketProducts[$product->id];
            } 

            $transactionCode                   = 'TRA'.rand(100000,999999);
            
            // Transaction generate
            $newTransactions                   = new Transactions;
            $newTransactions->trans_code       = $transactionCode;
            $newTransactions->u_id_fk          = $uId;
            $newTransactions->amount           = $totalPrice;
            $newTransactions->coupon_code      = '00000';
            $newTransactions->delivery_charges = 0;
            $newTransactions->method           = 'COD';
            $newTransactions->status           = 'COMPLETE';
            $newTransactions->save();
            
            $transactionsID                    = $newTransactions->id;

            $couponArray = array();

            if (Transactions::where('trans_code', '=', $transactionCode)->exists()) {
                foreach ($productDetails as $product) {
                    // $totalPrice += $product->saling_price * $bucketProducts[$product->id];
                    $invoicePath                 = rand(100000,999999).'.pdf';

                    // New Order Generate
                    $newOreder                   = new Orders;
                    $newOreder->pro_id_fk        = $product->id;
                    $newOreder->u_id_fk          = $uId;
                    $newOreder->trans_id_fk      = $transactionsID;
                    $newOreder->billing_address  = $uBillingAddress;
                    $newOreder->shipping_address = $uShippingAddress;
                    $newOreder->amount           = $product->saling_price;
                    $newOreder->quantity         = $bucketProducts[$product->id];
                    $newOreder->total_price      = $product->saling_price * $bucketProducts[$product->id];
                    $newOreder->invoice_path     = $invoicePath;
                    $newOreder->status           = 1; 
                    $newOreder->save();

                    $orderID = $newOreder->id;
                    if (Orders::where('id', '=', $orderID)->exists()) {
                        for ($i=0; $i < $bucketProducts[$product->id]; $i++) { 
                            $newCouponCode = 'COP'.rand(1000,9999).time();

                            // Coupon Record Generate
                            $newRedeem = new Redeems;
                            $newRedeem->pro_id_fk = $product->id;
                            $newRedeem->o_id_fk = $orderID;
                            $newRedeem->u_id_fk = $uId;
                            $newRedeem->coupon_code = $newCouponCode;
                            $newRedeem->save();

                            array_push($couponArray, $newCouponCode);
                        }

                        // Delete Record from Bucket
                        $updateBucket = Bucket::where('pro_id_fk','=',$product->id)->where('u_id_fk','=',$uId)->delete();

                        $productInfo = Product::find($product->id);

                        $updateProduct = Product::where('id','=',$product->id)->update([
                            'quantity' => $productInfo->quantity - $bucketProducts[$product->id],
                            ]);

                        
                    }

                }

                // Mail send to user of coupon code
                $data = [
                 'name'     => Auth::user()->name,
                 'view'     => 'emails.generateCouponMailToUser',
                 'to'       => Auth::user()->email,
                 'subject'  => 'Your New Purchased Coupon Code',
                 'couponArray' => $couponArray,
                ];

                Mail::send($data['view'], $data, function($message) use ($data){
                    $message->to($data['to'], $data['name'])->subject($data['subject']);
                });

                

                // check for failures
                // if (Mail::failures()) {
                    // return response showing failed emails
                // } else{
                $orderupdate = Orders::where('trans_id_fk','=',$transactionsID)->update(['status'=>'1']);
                // }
                if ($req->sms_service == 'sms') {
                    # code...
                    $couponsSMS = implode(',', $couponArray);
                    $phoneSMS = $countryCode.$phone;
                    $sendSMS = Helper::sendSMS($phoneSMS, $couponsSMS);
                }
                return redirect('orderHistory');
            } else{
                // $message = json_encode(array('type'=>'success','message'=>'Quantity upgraded to cart'));
                return redirect()->back();
            }
        }
    }

    public function orderHistory()
    {
        $uId=Auth::user()->id;
        $orderHistory=Orders::join('transactions','transactions.id','=','orders.trans_id_fk')
                            ->select('orders.*','transactions.trans_code as transactionscode')
                            ->with('getProductsInfo','getCoupons','getRedeemedCoupons','getNotRedeemedCoupons')
                            ->where('orders.u_id_fk' , '=',$uId)
                            ->where('orders.status','=','1')
                            ->get();

       /* echo "<pre>";print_r($orderHistory);echo "</pre>";*/
        return view('home.orderHistory', compact('orderHistory'));
    }

    
}
