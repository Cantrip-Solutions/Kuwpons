<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use Crypt;
use Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newCoupons = Product::orderBy('created_at')->limit(6)->get();
        return view('home.index', compact('newCoupons'));
    }

    public function searchCategory($name, $id)
    {
        $catID = Crypt::decrypt($id);
        $categories = Category::where('id','!=','1')->get();
        $products = Product::where('cat_id_fk','=',$catID)->where('isdelete','=','0')->get();
        return view('home.searchCategory',compact('name','catID','categories','products'));
    }
    public function couponDetails($name, $id)
    {
        $pdID = Crypt::decrypt($id);
        $productDetails = Product::find($pdID);
        return view('home.couponDetails',compact('productDetails'));
    }
    public function searchProduct(Request $req)
    {
        $reqSearch = $req->searchItem;
        $searchedProducts = Product::where('name', 'like', '%' . $reqSearch . '%')
                ->orWhere('tag', 'like', '%' . $reqSearch . '%')
                ->get();
        $categories = Category::where('id','!=','1')->get();
        return view('home.searchProduct', compact('categories','reqSearch','searchedProducts'));
        
    }
}
