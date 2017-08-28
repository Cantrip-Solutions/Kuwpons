@extends('layouts.frontEnd')
@section('content')
  <div class="body_content">
    <section class="checkout-details-sec">
      <div class="container">
        <div class="checkout-main">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 shipping-respon">
              @if(!Auth::check())
              <div class="payment-info">
                {{-- <h1>Payment Information</h1> --}}
                  <h2>To complete checkout please <a href="#login" class="fancybox"><i class="fa fa-user" aria-hidden="true"></i> Login</a> or <a href="#register" class="fancybox">Register</a></h2>
                   

              </div>
              @else
              <div class="payment-options">
                <h1>Choose Payment Mode</h1>
                <div id="parentVerticalTab" class="payment-mode-main">
                  <div class="payment-type clears">
                    <ul class="resp-tabs-list">
                      <li class="active"> CREDIT / DEBIT CARD </li>
                      <li>PAYPAL</li>
                    </ul>
                  </div>
                    <div class="resp-tabs-container payment-form">
                    <div>
                    	{{Form::open(array('class'=>'clears','action' => 'OrdersController@placeOrder', 'method'=>'POST', 'enctype'=>"multipart/form-data"))}}
                  		{{-- <form action="" method="post" enctype="multipart/form-data" class="clears"> --}}

	                        <div class="form-group">
	                          <label for="">Card Number</label>
	                          <input class="form-control" type="text" placeholder="" >
	                        </div>
	                        <div class="form-group">
	                          <label>Expires1</label>
	                          <select class="form-control">
	                            <option selected value='0'>Month</option>
	                            <option value='1'>Janaury</option>
	                            <option value='2'>February</option>
	                            <option value='3'>March</option>
	                            <option value='4'>April</option>
	                            <option value='5'>May</option>
	                            <option value='6'>June</option>
	                            <option value='7'>July</option>
	                            <option value='8'>August</option>
	                            <option value='9'>September</option>
	                            <option value='10'>October</option>
	                            <option value='11'>November</option>
	                            <option value='12'>December</option>
	                          </select>
	                          <select class="form-control">
	                            <option selected value="0">Year</option>
	                            <option value="1">2017</option>
	                            <option value="2">2018</option>
	                            <option value="3">2019</option>
	                            <option value="4">2020</option>
	                            <option value="5">2021</option>
	                            <option value="6">2022</option>
	                            <option value="7">2023</option>
	                            <option value="8">2024</option>
	                            <option value="9">2025</option>
	                          </select>
	                        </div>
	                        <div class="form-group">{!!HTML::image('kuwpons/images/payment-icon.png','')!!}</div>
	                        <div class="form-group">
	                          <label for="">Name on Card</label>
	                          <input class="form-control" type="text" placeholder="" >
	                        </div>
	                        <div class="form-group">
	                          <label>Security Code </label>
	                          <input class="form-control" type="text" placeholder="" >
	                          <p>What's this?</p>
	                        </div>
	                        <div class="form-group">
	                          <div class="shipping-checkbox">
	                            <input type="checkbox" value="None" id="credit-checkbox" name="check" checked />
	                            Do not save credit card
	                            <label for="credit-checkbox"></label>
	                          </div>
	                        </div>
	                        <div class="place-order">
	                        	<input type="submit" name="submit" value="Place Order" class="defaultbtn place-order-btn">
	                          {{-- <button class="defaultbtn place-order-btn">Place Order</button> --}}
	                        </div>
                        </form>
                    </div>
                    <div>
                    	{{Form::open(array('class'=>'clears','action' => 'OrdersController@placeOrder', 'method'=>'POST', 'enctype'=>"multipart/form-data"))}}
                  		{{-- <form action="" method="post" enctype="multipart/form-data" class="clears"> --}}
	                        <div class="form-group">
	                          <label for="">Card Number</label>
	                          <input class="form-control" type="text" placeholder="" >
	                        </div>
	                        <div class="form-group">
	                          <label>Expires</label>
	                          <select class="form-control">
	                            <option selected value='0'>Month</option>
	                            <option value='1'>Janaury</option>
	                            <option value='2'>February</option>
	                            <option value='3'>March</option>
	                            <option value='4'>April</option>
	                            <option value='5'>May</option>
	                            <option value='6'>June</option>
	                            <option value='7'>July</option>
	                            <option value='8'>August</option>
	                            <option value='9'>September</option>
	                            <option value='10'>October</option>
	                            <option value='11'>November</option>
	                            <option value='12'>December</option>
	                          </select>
	                          <select class="form-control">
	                            <option selected value="0">Year</option>
	                            <option value="1">2017</option>
	                            <option value="2">2018</option>
	                            <option value="3">2019</option>
	                            <option value="4">2020</option>
	                            <option value="5">2021</option>
	                            <option value="6">2022</option>
	                            <option value="7">2023</option>
	                            <option value="8">2024</option>
	                            <option value="9">2025</option>
	                          </select>
	                        </div>
	                        <div class="form-group">{!!HTML::image('kuwpons/images/payment-icon.png','')!!}</div>
	                        <div class="form-group">
	                          <label for="">Name on Card</label>
	                          <input class="form-control" type="text" placeholder="" >
	                        </div>
	                        <div class="form-group">
	                          <label>Security Code </label>
	                          <input class="form-control" type="text" placeholder="" >
	                          <p>What's this?</p>
	                        </div>
	                        <div class="form-group">
	                          <div class="shipping-checkbox">
	                            <input type="checkbox" value="None" id="shipping-checkbox" name="check" checked />
	                            Do not save credit card
	                            <label for="shipping-checkbox"></label>
	                          </div>
	                        </div>
	                        <div class="place-order">
	                        	<input type="submit" name="submit" value="Place Order" class="defaultbtn place-order-btn">
	                          {{-- <button class="defaultbtn place-order-btn">Place Order</button> --}}
	                        </div>
                        </form>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            @endif
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 order-summary-respon">
              <div class="order-summary">
                <h1>Order Summary</h1>
                <div class="order-summary-table">
                  <table id="cart">
                    <thead>
                      <tr>
                        <th>{{count($productDetails)}} ITEMS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Order Total <span><a href="{{URL::to('/myCart')}}">View Details</a></span></td>
                        <td>KD {{$totalPrice}}</td>
                      </tr>
                    </tbody>
                    <thead>
                      <tr>
                        <td class="total-payable">Total Payable</td>
                        <td class="total-payable">KD {{$totalPrice}}</td>
                      </tr>
                    </thead>
                  </table>
                </div>
                {{-- <div class="delivery-address">
                  <h3>Delivery To</h3>
                  <name>Sourav Debnath</name>
                  <address>
                  Rampur Bhatpara Gaighata North 24 parganas - 743249 West Bengal
                  </address>
                  <phone>Mobile: 9933391148</phone>
                  <a href="">Change Address</a> </div>
              </div> --}}
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
    $(document).ready(function() {

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>
@endpush
@endsection

