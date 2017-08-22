@extends('layouts.frontEnd')
@section('content')
  <div class="body_content">
    <section class="category-sec">
      <div class="container">
       <div class="row">
         <div class="col-lg-3 col-md-3 col-sm-12">
         <div class="category-list">
           <h3>Categories</h3>
          <ul>
          @foreach($categories as $category)
            @if($category->id == $catID)
              <li><a class="active" href="/category/{{urlencode(str_replace('/', '&#47;',$category->cat_name))}}/{{Crypt::encrypt($category->id)}}"><i class="fa fa-chevron-right" aria-hidden="true"></i> {{$category->cat_name}}</a></li>
            @else
              <li><a href="/category/{{urlencode(str_replace('/', '&#47;',$category->cat_name))}}/{{Crypt::encrypt($category->id)}}"><i class="fa fa-chevron-right" aria-hidden="true"></i> {{$category->cat_name}}</a></li>
            @endif
          @endforeach
          </ul>
          </div>
         </div>
         
         <div class="col-lg-9 col-md-9 col-sm-12">
         <div class="product-list-sec">
           <h1>Products</h1>
          <div class="product-list">
            <div class="row">
              @foreach($products as $product)
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="product-list-border">
                  <figure> 
                  {!!HTML::image(config('global.productPath').$product->defaultImage->image, 'Loading...')!!}
                  {{-- <img src="images/product-list-1.jpg" alt="" class=""/>  --}}
                  </figure>
                  <div class="product-list-text">
                    <h3>{{$product->name}}</h3>
                     <p>{{$product->description}}</p>
                     <h2>Price <span> KD {{$product->original_price}} </span> </h2>
                     <h2>Discount Price <span> KD {{$product->saling_price}} </span> </h2>
                     <div class="mid-deals">
                     <h2>Deals sold <span> 1 </span> </h2>
                     <span> Expiry Date {{date('d.m.Y',strtotime($product->expire_on))}} </span>
                     </div>
                     <div class="loc-cart">
                        <div class="map-loc"> 
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney </span>
                        </div>
                        <div class="cart-icon">
                         <span class="btn-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              @endforeach

              {{-- <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="product-list-border">
                  <figure> <img src="images/product-list-2.jpg" alt="" class=""/> </figure>
                  <div class="product-list-text">
                    <h3>Lorem Ipsum</h3>
                     <p>Has been the industry's standard dummy text ever.</p>
                     <h2>Price <span> $ 220.00 </span> </h2>
                     <h2>Discount Price <span> $ 200.00 </span> </h2>
                     <div class="mid-deals">
                     <h2>Deals sold <span> 1 </span> </h2>
                     <span> Expiry Date 14.10.2017 </span>
                     </div>
                     <div class="loc-cart">
                        <div class="map-loc"> 
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney </span>
                        </div>
                        <div class="cart-icon">
                         <span class="btn-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="product-list-border">
                  <figure> <img src="images/product-list-3.jpg" alt="" class=""/> </figure>
                  <div class="product-list-text">
                    <h3>Lorem Ipsum</h3>
                     <p>Has been the industry's standard dummy text ever.</p>
                     <h2>Price <span> $ 220.00 </span> </h2>
                     <h2>Discount Price <span> $ 200.00 </span> </h2>
                     <div class="mid-deals">
                     <h2>Deals sold <span> 1 </span> </h2>
                     <span> Expiry Date 14.10.2017 </span>
                     </div>
                     <div class="loc-cart">
                        <div class="map-loc"> 
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney </span>
                        </div>
                        <div class="cart-icon">
                         <span class="btn-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="product-list-border">
                  <figure> <img src="images/product-list-4.jpg" alt="" class=""/> </figure>
                  <div class="product-list-text">
                    <h3>Lorem Ipsum</h3>
                     <p>Has been the industry's standard dummy text ever.</p>
                     <h2>Price <span> $ 220.00 </span> </h2>
                     <h2>Discount Price <span> $ 200.00 </span> </h2>
                     <div class="mid-deals">
                     <h2>Deals sold <span> 1 </span> </h2>
                     <span> Expiry Date 14.10.2017 </span>
                     </div>
                     <div class="loc-cart">
                        <div class="map-loc"> 
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney </span>
                        </div>
                        <div class="cart-icon">
                         <span class="btn-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="product-list-border">
                  <figure> <img src="images/product-list-5.jpg" alt="" class=""/> </figure>
                  <div class="product-list-text">
                    <h3>Lorem Ipsum</h3>
                     <p>Has been the industry's standard dummy text ever.</p>
                     <h2>Price <span> $ 220.00 </span> </h2>
                     <h2>Discount Price <span> $ 200.00 </span> </h2>
                     <div class="mid-deals">
                     <h2>Deals sold <span> 1 </span> </h2>
                     <span> Expiry Date 14.10.2017 </span>
                     </div>
                     <div class="loc-cart">
                        <div class="map-loc"> 
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney </span>
                        </div>
                        <div class="cart-icon">
                         <span class="btn-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="product-list-border">
                  <figure> <img src="images/product-list-6.jpg" alt="" class=""/> </figure>
                  <div class="product-list-text">
                    <h3>Lorem Ipsum</h3>
                     <p>Has been the industry's standard dummy text ever.</p>
                     <h2>Price <span> $ 220.00 </span> </h2>
                     <h2>Discount Price <span> $ 200.00 </span> </h2>
                     <div class="mid-deals">
                     <h2>Deals sold <span> 1 </span> </h2>
                     <span> Expiry Date 14.10.2017 </span>
                     </div>
                     <div class="loc-cart">
                        <div class="map-loc"> 
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney </span>
                        </div>
                        <div class="cart-icon">
                         <span class="btn-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="product-list-border">
                  <figure> <img src="images/product-list-7.jpg" alt="" class=""/> </figure>
                  <div class="product-list-text">
                    <h3>Lorem Ipsum</h3>
                     <p>Has been the industry's standard dummy text ever.</p>
                     <h2>Price <span> $ 220.00 </span> </h2>
                     <h2>Discount Price <span> $ 200.00 </span> </h2>
                     <div class="mid-deals">
                     <h2>Deals sold <span> 1 </span> </h2>
                     <span> Expiry Date 14.10.2017 </span>
                     </div>
                     <div class="loc-cart">
                        <div class="map-loc"> 
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney </span>
                        </div>
                        <div class="cart-icon">
                         <span class="btn-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="product-list-border">
                  <figure> <img src="images/product-list-8.jpg" alt="" class=""/> </figure>
                  <div class="product-list-text">
                    <h3>Lorem Ipsum</h3>
                     <p>Has been the industry's standard dummy text ever.</p>
                     <h2>Price <span> $ 220.00 </span> </h2>
                     <h2>Discount Price <span> $ 200.00 </span> </h2>
                     <div class="mid-deals">
                     <h2>Deals sold <span> 1 </span> </h2>
                     <span> Expiry Date 14.10.2017 </span>
                     </div>
                     <div class="loc-cart">
                        <div class="map-loc"> 
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney </span>
                        </div>
                        <div class="cart-icon">
                         <span class="btn-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="product-list-border">
                  <figure> <img src="images/product-list-9.jpg" alt="" class=""/> </figure>
                  <div class="product-list-text">
                    <h3>Lorem Ipsum</h3>
                     <p>Has been the industry's standard dummy text ever.</p>
                     <h2>Price <span> $ 220.00 </span> </h2>
                     <h2>Discount Price <span> $ 200.00 </span> </h2>
                     <div class="mid-deals">
                     <h2>Deals sold <span> 1 </span> </h2>
                     <span> Expiry Date 14.10.2017 </span>
                     </div>
                     <div class="loc-cart">
                        <div class="map-loc"> 
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney </span>
                        </div>
                        <div class="cart-icon">
                         <span class="btn-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                        </div>
                      </div>
                  </div>
                </div>
              </div> --}}
        
            </div>
          </div>
          </div>
         </div>
       </div>
      </div>
    </section>
    
    @if(!\Auth::check())
     {{-- <section class="newslatter-sec">
      <div class="container">
      <div class="row">
       <div class="col-lg-5">
        <h1>NEWSLETTER SIGNUP</h1>
       </div>
       <div class="col-lg-7 no-padding">
         <div class="newslatter-name">
          <input class="form-control" type="text" placeholder="Name"/>
          <input class="form-control" type="text" placeholder="Email"/>
          <button class="defaultbtn btn-green">Subscribe!</button>
         </div>
       </div>
       </div>
      </div>
     </section> --}}
     @endif

    
  </div>
@endsection

