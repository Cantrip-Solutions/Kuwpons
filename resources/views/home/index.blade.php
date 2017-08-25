@extends('layouts.frontEnd')
@section('content')
  <div class="body_content">
    <section class="new-coupons-sec">
      <div class="container">
        <h1>NEW COUPONS</h1>
        <div class="coupons-box">
          <div class="row">
          @if (Cookie::get('bucket') !== false) {
             <div class="alert alert-info"><i class="pe-7s-gleam"></i>{{Cookie::get('bucket')}}</div>
          @endif
          {{-- {{$newCoupons}} --}}
            @foreach($newCoupons as $newCoupon)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="coupons-box-border">
                  <div class="discount-product">
                   <figure>
                    <a href="/coupon/{{urlencode($newCoupon->name)}}/{{Crypt::encrypt($newCoupon->id)}}">
                      {!!HTML::image(config('global.productPath').$newCoupon->defaultImage->image, 'Loading...')!!}
                    </a>
                   </figure>
                   <span>20% OFF</span>
                  </div>
                  <div class="coupons-box-text">
                    <p>{{$newCoupon->shortDescription}}</p>
                    <div class="row">
                    <div class="col-lg-8 col-md-8 col-xs-10">
                        <div class="defaultbtn btn-green coupons-price-btn"> <span class="old-price">KD {{$newCoupon->original_price}}</span> <span class="new-price">KD {{$newCoupon->saling_price}}</span> </div>
                      </div>
                    <div class="col-lg-4 col-md-4 col-xs-2">
                        <div class="coupons-cart btn-green" proID="{{Crypt::encrypt($newCoupon->id)}}" style="cursor: pointer;"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    <section class="discounts-sec">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="discount_img">
              <figure>

                  {!!HTML::image('kuwpons/images/coupons-img-1.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
              <div class="discount_contant">
                <div class="discount-text">
                  <h1>20%</h1>
                  <span>Beauty / health</span>
                  <h3>Discounts</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="discount-right">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-3">
                  <div class="discount-right-img">
                  <figure>

                  {!!HTML::image('kuwpons/images/discount-icon-1.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                    <!-- <figure> <img src="images/discount-icon-1.jpg" alt="" class=""/> </figure> -->
                  </div>
                </div>
                <div class="discount-right-text">
                  <div class="col-lg-7 col-md-7 col-xs-7">
                    <p>It has roots in a piece of classical Latin literature making it over 2000 years old.</p>
                  </div>
                  <div class="col-lg-2 col-md-2 col-xs-2"> <span class="price-old">$150</span> <span class="price-new">$100</span> </div>
                </div>
              </div>
            </div>
            <div class="discount-right">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-3">
                  <div class="discount-right-img">
                    <figure>

                  {!!HTML::image('kuwpons/images/discount-icon-2.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                    <!-- <figure> <img src="images/discount-icon-2.jpg" alt="" class=""/> </figure> -->
                  </div>
                </div>
                <div class="discount-right-text">
                  <div class="col-lg-7 col-md-7 col-xs-7">
                    <p>It has roots in a piece of classical Latin literature making it over 2000 years old.</p>
                  </div>
                  <div class="col-lg-2 col-md-2 col-xs-2"> <span class="price-old">$150</span> <span class="price-new">$100</span> </div>
                </div>
              </div>
            </div>
            <div class="discount-right">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-3">
                  <div class="discount-right-img">
                    <figure>

                  {!!HTML::image('kuwpons/images/discount-icon-3.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                    <!-- <figure> <img src="images/discount-icon-3.jpg" alt="" class=""/> </figure> -->
                  </div>
                </div>
                <div class="discount-right-text">
                  <div class="col-lg-7 col-md-7 col-xs-7">
                    <p>It has roots in a piece of classical Latin literature making it over 2000 years old.</p>
                  </div>
                  <div class="col-lg-2 col-md-2 col-xs-2"> <span class="price-old">$150</span> <span class="price-new">$100</span> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="popular-coupons-sec">
      <div class="container">
        <h1>POPULAR COUPONS</h1>
        <div class="coupons-box">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="coupons-box-border">
                <figure>

                  {!!HTML::image('kuwpons/images/coupons-img-1.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                <!-- <figure> <img src="images/coupons-img-1.jpg" alt="" class=""/> </figure> -->
                <div class="coupons-box-text">
                  <p>Lorem Ipsum has been the industry's standard dummy text ever sincunknown printer scrambled a type specimen book.</p>
                  <div class="row">
                    <div class="col-lg-8 col-md-8 col-xs-10">
                      <div class="defaultbtn btn-green coupons-price-btn"> <span class="old-price">$250.00</span> <span class="new-price">$200.00</span> </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-2">
                      <div class="coupons-cart btn-green"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="coupons-box-border">
                <figure>

                  {!!HTML::image('kuwpons/images/coupons-img-2.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                <!-- <figure> <img src="images/coupons-img-2.jpg" alt="" class=""/> </figure> -->
                <div class="coupons-box-text">
                  <p>Lorem Ipsum has been the industry's standard dummy text ever sincunknown printer scrambled a type specimen book.</p>
                  <div class="row">
                    <div class="col-lg-8 col-md-8 col-xs-10">
                      <div class="defaultbtn btn-green coupons-price-btn"> <span class="old-price">$250.00</span> <span class="new-price">$200.00</span> </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-2">
                      <div class="coupons-cart btn-green"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="coupons-box-border">
                <figure>

                  {!!HTML::image('kuwpons/images/coupons-img-3.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                <!-- <figure> <img src="images/coupons-img-3.jpg" alt="" class=""/> </figure> -->
                <div class="coupons-box-text">
                  <p>Lorem Ipsum has been the industry's standard dummy text ever sincunknown printer scrambled a type specimen book.</p>
                  <div class="row">
                    <div class="col-lg-8 col-md-8 col-xs-10">
                      <div class="defaultbtn btn-green coupons-price-btn"> <span class="old-price">$250.00</span> <span class="new-price">$200.00</span> </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-2">
                      <div class="coupons-cart btn-green"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </div>
                    </div>
                  </div>
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
@push('scripts')
<script type="text/javascript">

</script>
@endpush
@endsection

