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
<!-- plugin css links -->

<!-- website custom css -->
   
    {!!HTML::style('kuwpons/source/jquery.fancybox.css')!!}
    {!!HTML::style('kuwpons/css/cloud-zoom.css')!!}
    {!!HTML::style('kuwpons/css/slick.css')!!}
    {!!HTML::style('admintheme/vendor/sweetalert/lib/sweet-alert.css')!!}
    {!!HTML::style('admintheme/vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css')!!}
    
<!-- website custom css -->
    @stack('css')
    {!!HTML::style('kuwpons/css/bootstrap.css')!!}
    {!!HTML::style('kuwpons/css/style.css')!!}
    {!!HTML::style('kuwpons/css/responsive.css')!!}

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
              @if(!\Auth::check())
                <li>
                  <a href="#login" class="fancybox"><i class="fa fa-user" aria-hidden="true"></i>Login</a> 
                    or 
                  <a href="#register" class="fancybox">Register</a>
                </li>
              @else
              <li><a href="/login"><i class="fa fa-user" aria-hidden="true"></i>My Account</a>

              <ul>
                
                <li><a href="#">My Profile</a></li>
                <li><a href="#">Order History</a></li>
                <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <i class="pe-7s-upload pe-rotate-90"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
              </ul>
              </li>

              @endif
              <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span id="cart-count" class="cart_visible" data-count-unseen="0">0</span></a></li>

              
               <li>
                  <div class="search-sec">
                  {{Form::open(array('id'=>'formdata','action' => 'HomeController@searchProduct', 'method'=>'POST', 'enctype'=>"multipart/form-data"))}}
                    <input class="search-cont" type="text" name="searchItem" value="" placeholder="Search..."> 
                    <a class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></a>
                  {{Form::close()}}
                  </div>
                  
                </li>


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
                <?php
                  $categories = DB::table('categories')->where('parent_cat_id','=','0')->where('id','!=','1')->get();


                ?>
                @foreach($categories as $cat)
                  <li><a href="/category/{{urlencode(str_replace('/', '&#47;',$cat->cat_name))}}/{{Crypt::encrypt($cat->id)}}">{{$cat->cat_name}}</a></li>
                @endforeach
               
              </ul>
            </nav>
          </header-menu>
          <div class="banner-text">
            <h4>KUW PONS is the best of the best.</h4>
            <h1>#1 Coupon Deal Site In Kuwait</h1>
            @if(!\Auth::check())
            <div class="sign-button"> <a class="defaultbtn btn-green" href="">SIGN UP</a> </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>

  @yield('content')

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



<!--register-->    
  <div id="register" class="login-inner">
           
           <h2>Sign up <span>EASILY USING</span></h2>
           
           <div class="login-media">
                <ul>
                    <li><a href="#"><icon>{!!HTML::image('kuwpons/images/fb-icon.png', 'Loading...')!!}</icon><small>Facebook</small></a></li>
                    <li><a href="#"><icon>{!!HTML::image('kuwpons/images/gplus-icon.png', 'Loading...')!!}</icon><small>Google Plus</small></a></li>
                </ul>
           </div>
           
           <h3>- OR USING EMAIL -</h3>
           
           <div class="login-form">
                {{Form::open(array('id'=>'formdata','action' => 'ConsumerController@userRegister', 'method'=>'POST', 'enctype'=>"multipart/form-data"))}}
                    <div class="log-field-wrap">
                        <div class="field-row"><input type="text" name="name" placeholder="Mack John"></div>
                        <div class="field-row"><input type="email" name="email" placeholder="Your Email Address"></div>
                        <div class="field-row"><input type="password" name="password" id="password" placeholder="Enter Password"></div>
                        <div class="field-row"><input type="password" name="re_password" placeholder="Re-Enter Password"></div>
                        <div class="field-row"><input type="text" name="phone" placeholder="Mobile Number"></div>
                        <div class="field-row input-group date">
                            <input type="text" name="dob" class="form-control" placeholder="Date of Birth"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                        {{-- <div class="field-row"><input type="text" name="dob" placeholder="Date of Birth"></div> --}}
                        <div class="field-row">
                            <div class="gend">
                                <span>I am a </span>
                                <input name="gender" type="radio" value="M" checked>
                                <label for="test">Male</label>
                                <input name="gender" type="radio" value="F">
                                <label for="test1">Female</label>
                            </div>
                        </div>
                    </div>
                    
                    <input type="submit" name="" value="Register">
                    
                    <div class="log-btm clears">
                        
                        <div class="log-btm-right center">
                            <span>Already have an account?</span>
                            <a href="#login" class="fancybox">Login!</a>
                            
                                               
                        </div>
                        
                    </div>
               {{Form::close()}}
           </div>
       </div> 
<!--register-->  
    
    
<!--login--> 
    <div id="login" class="login-inner">
           
           <h2>LOGIN <span>EASILY USING</span></h2>
           
           <div class="login-media">
                <ul>
                    <li><a href="#"><icon>{!!HTML::image('kuwpons/images/fb-icon.png', 'Loading...')!!}</icon><small>Facebook</small></a></li>
                    <li><a href="#"><icon>{!!HTML::image('kuwpons/images/gplus-icon.png', 'Loading...')!!}</icon><small>Google Plus</small></a></li>
                </ul>
           </div>
           
           <h3>- OR USING EMAIL -</h3>
           
           <div class="login-form">
                <form id="formdata" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                    <div class="log-field-wrap">
                        <div class="field-row"><input type="text" name="email" placeholder="Your Email Address"></div>
                        <div class="field-row"><input type="password" name="password" placeholder="Enter Password"></div>
                    </div>
                    
                    <input type="submit" name="" value="Log In">
                    
                    <div class="log-btm clears">
                        <a href="#" class="recover-pass">Recover password </a>
                        
                        <div class="log-btm-right">
                            <span>New to Kuwpons?</span>
                            <a href="#register" class="fancybox">Create</a>
                        </div>
                    </div>
               </form>
           </div>
       </div>
 
    
<!--login--> 
    






{!!HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js')!!}
{!!HTML::script('kuwpons/js/slick.js')!!}
{!!HTML::script('kuwpons/js/bootstrap.js')!!}
{!!HTML::script('kuwpons/source/jquery.fancybox.js')!!}



{!! HTML::script('admintheme/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') !!}
{!! HTML::script('admintheme/vendor/sweetalert/lib/sweet-alert.min.js') !!}
{!! HTML::script('plugins/jquery-validation-1.15.0/dist/jquery.validate.min.js') !!}

{!! HTML::script('plugins/jquery-validation-1.15.0/dist/additional-methods.min.js') !!}

{!!HTML::script('kuwpons/js/custom.js')!!}

@if (Session::has('message'))
  <script type="text/javascript">
  var message = '{{ Session::get('message') }}';
    $(document).ready(function(){
      swal("Error!", message, "error");
    });
  </script>
@endif

<script>
    jQuery.validator.setDefaults({ 
        debug: false 
        //success: "valid" 
    });
    $(document).ready(function(){
        $('.search-icon').click(function(){
            $('.search-sec input[type=text]').animate({width: "200px", height:"30px" }, 100).css('background','#fff');
        });
        
        $('.fancybox').fancybox();
        $('.input-group.date').datepicker({ 
            // setDate: new Date(),
            // startDate: new Date(),
        });
        $("#formdata").validate({
          rules: {
            'name': {
                required: true
            },
            'email': {
                required: true,
                email: true
            },
            'password': {
                required: true
            },
            're_password': {
                required: true,
                equalTo: '#password'
            },
            'phone': {
                required: true,
                number: true
            },
            'dob': {
                required: true
            },
            
          }
        });
    })
</script> 


@stack('scripts')

</body>
</html>