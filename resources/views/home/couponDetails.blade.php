@extends('layouts.frontEnd')
@section('content')

<div class="body_content">
  	<section class="product-dt-holder">
	    <div class="container">
	        <div class="prod-top-dt">
	        	<h1>Products Details</h1>
		        <div class="row">
		            <div class="col-lg-6 col-md-6 col-sm-12">
			            <div class="prod-top-dt-left">
			              <div class="zoom-wrap">
                        <div class="zoom-small-image">
                          <a href='{{URL('/').'/'.config('global.productPath').$productDetails->defaultImage->image}}' class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4">
                            {!!HTML::image(config('global.productPath').$productDetails->defaultImage->image)!!}
                          </a>
                        </div>
                        <div class="zoom-desc">
                             <ul class="responsive-zoom slider">
                              <li class="thumbAc sdasdsdsad">
                                <a href='{{URL('/').'/'.config('global.productPath').$productDetails->defaultImage->image}}' class='cloud-zoom-gallery' title='Red' rel="useZoom: 'zoom1', smallImage: '{{URL('/').'/'.config('global.productPath').$productDetails->defaultImage->image}}' ">
                                  {!!HTML::image(config('global.productPath').$productDetails->defaultImage->image, '', array('class'=>"zoom-tiny-image",'width'=>"", 'height'=>"" ))!!}
                                  {{-- <img class="zoom-tiny-image" src="images/Product-dtl-zoom.jpg" width="" height="" alt = "Thumbnail 1"/> --}}
                                </a>
                              </li>
                              @foreach($productDetails->getImages as $productImage)
                                <li class="thumbAc">
                                <a href='{{URL('/').'/'.config('global.productPath').$productImage->image}}' class='cloud-zoom-gallery' title='Red' rel="useZoom: 'zoom1', smallImage: '{{URL('/').'/'.config('global.productPath').$productImage->image}}' ">
                                  {!!HTML::image(config('global.productPath').$productImage->image, '', array('class'=>"zoom-tiny-image",'width'=>"", 'height'=>"" ))!!}
                                  {{-- <img class="zoom-tiny-image" src="images/Product-dtl-zoom.jpg" width="" height="" alt = "Thumbnail 1"/> --}}
                                </a> </li>
                              @endforeach
                            </ul>
                        </div>
                      </div>
			            </div>
		            </div>
		            
		            <div class="col-lg-6 col-md-6 col-sm-12">
			            <div class="prod-top-dt-right">
			                <h3>{{ $productDetails->name }}</h3>
			                <p>{{ $productDetails->shortDescription }} <a href="#description_tab" style="color:red;">more...</a></p>   
			                <div class="p-details-price">
                      
			                   <h2>Price <span class="old-price"> KD {{ $productDetails->original_price }} </span> <span > KD {{ $productDetails->saling_price }} </span>  </h2>
			                   {{-- <h2>Discount Price <span> $ 200.00 </span> </h2> --}}
			                   <h3>Category | Product | Food</h3>
			                </div>
			                <div class="qty-wrap">
			                  <h3>Quantity</h3>
			                  <div class="qty-sec">
			                    <button id="minus"><i class="fa fa-chevron-down" aria-hidden="true"></i> </button>
			                    <input id="num" type="text" value="0">
			                    <button id="plus"><i class="fa fa-chevron-up" aria-hidden="true"></i> </button>
			                  </div>
			                  <a href="#" class="addcard">Add To Cart</a> </div>
			            </div>
		            </div>
		        </div>
	          
	          	<div class="tab-wrap" id="description_tab">
		            <div class="tab-main">
		                <ul class="tabs">
		                  <li class="tablinks tab col s2" onclick="registrationtab(event, 'Description')" id="defaultOpen">Description</li>  |
		                  <li class="tablinks tab col s2" onclick="registrationtab(event, 'Enquiry')">Enquiry Now</li>
		                </ul>
		            </div>
		            <div class="tab-content-wrap">
		                <div id="Description" class="tabcontent">
		                  <p>{{ $productDetails->description }}</p>
		                </div>
		                <div id="Enquiry" class="tabcontent">
  		                  <div class="row">
                            <div class="col-offset-4 col-lg-8 col-md-8 col-sm-8 no-padding">

                              <div class="newslatter-name enquiry-tab">

                                <div class="row">
                                  <div class="col-lg-6">
                                  <input class="form-control" type="text" placeholder="Name"/>
                                  </div>
                                  <div class="col-lg-6">
                                  <input class="form-control" type="text" placeholder="Email"/>
                                  </div>
                                  </div>


                                  <div class="row">  
                                  <div class="col-lg-12">
                                  <textarea class="form-control" ></textarea> 
                                  </div>
                                  </div>

                                   <enq-btn> 
                                  <button class="defaultbtn btn-green">Subscribe!</button>
                                  </enq-btn>
                              </div>



                            </div>
                        </div>
		                </div>
		            </div>
	          	</div>
	        </div>
	    </div>
    </section>

    <section class="related-product-sec">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="product-list-sec">
              <h1>Related Products</h1>
              <div class="product-list">
                <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="product-list-border">
                      <figure> <img src="images/product-list-1.jpg" alt="" class=""/> </figure>
                      <div class="product-list-text">
                        <h3>Lorem Ipsum</h3>
                        <p>Has been the industry's standard dummy text ever.</p>
                        <h2>Price <span> $ 220.00 </span> </h2>
                        <h2>Discount Price <span> $ 200.00 </span> </h2>
                        <div class="mid-deals">
                          <h2>Deals sold <span> 1 </span> </h2>
                          <span> Expiry Date 14.10.2017 </span> </div>
                        <div class="loc-cart">
                          <div class="map-loc"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney </span> </div>
                          <div class="cart-icon"> <span class="btn-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="product-list-border">
                      <figure> <img src="images/product-list-7.jpg" alt="" class=""/> </figure>
                      <div class="product-list-text">
                        <h3>Lorem Ipsum</h3>
                        <p>Has been the industry's standard dummy text ever.</p>
                        <h2>Price <span> $ 220.00 </span> </h2>
                        <h2>Discount Price <span> $ 200.00 </span> </h2>
                        <div class="mid-deals">
                          <h2>Deals sold <span> 1 </span> </h2>
                          <span> Expiry Date 14.10.2017 </span> </div>
                        <div class="loc-cart">
                          <div class="map-loc"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney </span> </div>
                          <div class="cart-icon"> <span class="btn-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="product-list-border">
                      <figure> <img src="images/product-list-8.jpg" alt="" class=""/> </figure>
                      <div class="product-list-text">
                        <h3>Lorem Ipsum</h3>
                        <p>Has been the industry's standard dummy text ever.</p>
                        <h2>Price <span> $ 220.00 </span> </h2>
                        <h2>Discount Price <span> $ 200.00 </span> </h2>
                        <div class="mid-deals">
                          <h2>Deals sold <span> 1 </span> </h2>
                          <span> Expiry Date 14.10.2017 </span> </div>
                        <div class="loc-cart">
                          <div class="map-loc"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney </span> </div>
                          <div class="cart-icon"> <span class="btn-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="product-list-border">
                      <figure> <img src="images/product-list-9.jpg" alt="" class=""/> </figure>
                      <div class="product-list-text">
                        <h3>Lorem Ipsum</h3>
                        <p>Has been the industry's standard dummy text ever.</p>
                        <h2>Price <span> $ 220.00 </span> </h2>
                        <h2>Discount Price <span> $ 200.00 </span> </h2>
                        <div class="mid-deals">
                          <h2>Deals sold <span> 1 </span> </h2>
                          <span> Expiry Date 14.10.2017 </span> </div>
                        <div class="loc-cart">
                          <div class="map-loc"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney </span> </div>
                          <div class="cart-icon"> <span class="btn-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span> </div>
                        </div>
                      </div>
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
@push('css')

@endpush
@push('scripts')
{!!HTML::script('kuwpons/js/cloud-zoom.js')!!}

<script>
function registrationtab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

$(document).ready(function(){
 $('.responsive-zoom').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }); 
});    
</script>
@endpush
@endsection