@extends('layouts.frontEnd')
@section('content')
  <div class="body_content">
    {{-- <section class="new-coupons-sec">
      <div class="container">
        <h1>NEW COUPONS</h1>
        <div class="coupons-box">
          <div class="row">
            <div class="col-md-4">
              <div class="coupons-box-border">
                <figure>

                  {!!HTML::image('kuwpons/images/coupons-img-1.jpg', 'Loading...')!!}
                 <!-- <img src="images/coupons-img-1.jpg" alt="" class=""/> -->
                </figure>
                <div class="coupons-box-text">
                  <p>Lorem Ipsum has been the industry's standard dummy text ever sincunknown printer scrambled a type specimen book.</p>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="defaultbtn btn-green coupons-price-btn"> <span class="old-price">$250.00</span> <span class="new-price">$200.00</span> </div>
                    </div>
                    <div class="col-md-4">
                      <div class="coupons-cart btn-green"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="coupons-box-border">
                <figure>

                  {!!HTML::image('kuwpons/images/coupons-img-2.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                <div class="coupons-box-text">
                  <p>Lorem Ipsum has been the industry's standard dummy text ever sincunknown printer scrambled a type specimen book.</p>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="defaultbtn btn-green coupons-price-btn"> <span class="old-price">$250.00</span> <span class="new-price">$200.00</span> </div>
                    </div>
                    <div class="col-md-4">
                      <div class="coupons-cart btn-green"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="coupons-box-border">
                <figure>

                  {!!HTML::image('kuwpons/images/coupons-img-3.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                <div class="coupons-box-text">
                  <p>Lorem Ipsum has been the industry's standard dummy text ever sincunknown printer scrambled a type specimen book.</p>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="defaultbtn btn-green coupons-price-btn"> <span class="old-price">$250.00</span> <span class="new-price">$200.00</span> </div>
                    </div>
                    <div class="col-md-4">
                      <div class="coupons-cart btn-green"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="coupons-box-border">
                <figure>

                  {!!HTML::image('kuwpons/images/coupons-img-1.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                <div class="coupons-box-text">
                  <p>Lorem Ipsum has been the industry's standard dummy text ever sincunknown printer scrambled a type specimen book.</p>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="defaultbtn btn-green coupons-price-btn"> <span class="old-price">$250.00</span> <span class="new-price">$200.00</span> </div>
                    </div>
                    <div class="col-md-4">
                      <div class="coupons-cart btn-green"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="coupons-box-border">
                <figure>

                  {!!HTML::image('kuwpons/images/coupons-img-2.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                <div class="coupons-box-text">
                  <p>Lorem Ipsum has been the industry's standard dummy text ever sincunknown printer scrambled a type specimen book.</p>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="defaultbtn btn-green coupons-price-btn"> <span class="old-price">$250.00</span> <span class="new-price">$200.00</span> </div>
                    </div>
                    <div class="col-md-4">
                      <div class="coupons-cart btn-green"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="coupons-box-border">
                <figure>

                  {!!HTML::image('kuwpons/images/coupons-img-3.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                <div class="coupons-box-text">
                  <p>Lorem Ipsum has been the industry's standard dummy text ever sincunknown printer scrambled a type specimen book.</p>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="defaultbtn btn-green coupons-price-btn"> <span class="old-price">$250.00</span> <span class="new-price">$200.00</span> </div>
                    </div>
                    <div class="col-md-4">
                      <div class="coupons-cart btn-green"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    
    @if(!\Auth::check())
     <section class="newslatter-sec">
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
     </section>
     @endif

    
  </div>
@endsection

