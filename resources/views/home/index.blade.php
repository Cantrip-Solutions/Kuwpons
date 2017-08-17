<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
<title>{{config('global.siteTitle')}}</title>

<!-- external font link -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,300italic,400italic,600italic' rel='stylesheet' type='text/css'>
<!-- external font link -->

<!-- plugin css links -->
    {!!HTML::style('kuwpons/css/font-awesome.css')!!}
<!-- <link rel="stylesheet" href="kuwpons/css/font-awesome.css"> -->
<!-- plugin css links -->

<!-- website custom css -->
    {!!HTML::style('kuwpons/css/bootstrap.css')!!}
    {!!HTML::style('kuwpons/css/style.css')!!}
    {!!HTML::style('kuwpons/css/responsive.css')!!}
<!-- <link rel="stylesheet" href="kuwpons/css/bootstrap.css"> -->
<!-- <link rel="stylesheet" href="kuwpons/css/style.css"> -->
<!-- <link rel="stylesheet" href="kuwpons/css/responsive.css"> -->
<!-- website custom css -->

</head>
<body>
<div class="wrapper">
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="navbar-header"> <a class="logo" href="/">{!!HTML::image('kuwpons/images/logo.jpg', 'Loading...')!!}</a> </div>
        </div>
        <div class="col-md-8">
          <div class="main-header-top-right">
            <ul>
              <li><a href="/login"><i class="fa fa-user" aria-hidden="true"></i>Login or Register</a></li>
              <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span id="cart-count" class="cart_visible" data-count-unseen="0">0</span></a></li>
              <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
              <li><span class="header-right-toggle"><i class="fa fa-bars" aria-hidden="true"></i></span></li>  
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section class="banner-sec">
    <div class="banner-pic">
      <figure>
        {!!HTML::image('kuwpons/images/banner-2.jpg', 'Loading...')!!}
         <!-- <img src="images/banner-2.jpg" alt=""/>  -->
      </figure>
      <div class="banner-contain">
        <div class="container">
          <header-menu>
            <nav class="header-right-tog-content">
              <ul>
                <li class="active"><a href="#">EVENT/SHOWS</a></li>
                <li><a href="#">FOOD</a></li>
                <li><a href="#">BEAUTY/HEALTH</a></li>
                <li><a href="#">SHOPPING</a></li>
                <li><a href="#">TRAVEL/ACTIVITIES</a></li>
                <li><a href="#">LOCAL DEALS</a></li>
                <li><a href="#">VOUCHER</a></li>
                <li><a href="#">CONTACT US</a></li>
              </ul>
            </nav>
          </header-menu>
          <div class="banner-text">
            <h4>KUW PONS is the best of the best.</h4>
            <h1>#1 Coupon Deal Site In Kuwait</h1>
            <div class="sign-button"> <a class="defaultbtn btn-green" href="">SIGN UP</a> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="body_content">
    <section class="new-coupons-sec">
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
    </section>
    <section class="discounts-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
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
          <div class="col-md-6">
            <div class="discount-right">
              <div class="row">
                <div class="col-md-3">
                  <div class="discount-right-img">
                  <figure>

                  {!!HTML::image('kuwpons/images/discount-icon-1.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                    <!-- <figure> <img src="images/discount-icon-1.jpg" alt="" class=""/> </figure> -->
                  </div>
                </div>
                <div class="discount-right-text">
                  <div class="col-md-7">
                    <p>It has roots in a piece of classical Latin literature making it over 2000 years old.</p>
                  </div>
                  <div class="col-md-2"> <span class="price-old">$150</span> <span class="price-new">$100</span> </div>
                </div>
              </div>
            </div>
            <div class="discount-right">
              <div class="row">
                <div class="col-md-3">
                  <div class="discount-right-img">
                    <figure>

                  {!!HTML::image('kuwpons/images/discount-icon-2.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                    <!-- <figure> <img src="images/discount-icon-2.jpg" alt="" class=""/> </figure> -->
                  </div>
                </div>
                <div class="discount-right-text">
                  <div class="col-md-7">
                    <p>It has roots in a piece of classical Latin literature making it over 2000 years old.</p>
                  </div>
                  <div class="col-md-2"> <span class="price-old">$150</span> <span class="price-new">$100</span> </div>
                </div>
              </div>
            </div>
            <div class="discount-right">
              <div class="row">
                <div class="col-md-3">
                  <div class="discount-right-img">
                    <figure>

                  {!!HTML::image('kuwpons/images/discount-icon-3.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                    <!-- <figure> <img src="images/discount-icon-3.jpg" alt="" class=""/> </figure> -->
                  </div>
                </div>
                <div class="discount-right-text">
                  <div class="col-md-7">
                    <p>It has roots in a piece of classical Latin literature making it over 2000 years old.</p>
                  </div>
                  <div class="col-md-2"> <span class="price-old">$150</span> <span class="price-new">$100</span> </div>
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
            <div class="col-md-4">
              <div class="coupons-box-border">
                <figure>

                  {!!HTML::image('kuwpons/images/coupons-img-1.jpg', 'Loading...')!!}
                <!-- <img src="images/coupons-img-2.jpg" alt="" class=""/>  -->
                </figure>
                <!-- <figure> <img src="images/coupons-img-1.jpg" alt="" class=""/> </figure> -->
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
                <!-- <figure> <img src="images/coupons-img-2.jpg" alt="" class=""/> </figure> -->
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
                <!-- <figure> <img src="images/coupons-img-3.jpg" alt="" class=""/> </figure> -->
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
    </section>
    
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

    
  </div>
  <footer class="footer-wrap">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-3 col-sm-2">
            <div class="footer-top-block">
              <h2>About Us</h2>
              <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.</p> 
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-2">
            <div class="footer-top-block">
              <h2>Useful Links</h2>
              <ul>
                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> How it works?</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Terms & Conditions</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Stores</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Shortcodes</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-2 col-sm-3">
            <div class="footer-top-block">
              <h2>Coupop Categories</h2>
              <ul>
                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Salon Deals</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Cafe Deals</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Gym Deals</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-4">
            <div class="footer-top-block">
              <h2>Follow Us</h2>
              <ul>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="footer-copyright clears">
      <div class="container"> 
       <span>Copyrights © 2017 Kuwpons. All Rights Reserved</span>
      </div>
    </div>
</div>
{!!HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js')!!}
{!!HTML::script('kuwpons/js/bootstrap.js')!!}
{!!HTML::script('kuwpons/js/custom.js')!!}
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>  -->
<!-- <script src="js/bootstrap.js" type="text/javascript"></script>  -->
<!--<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>--> 
<!-- <script src="js/custom.js" type="text/javascript"></script> -->
</body>
</html>