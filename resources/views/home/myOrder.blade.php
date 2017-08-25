@extends('layouts.frontEnd')
@section('content')
  <div class="body_content">
   
    <section class="account-wrap" id="page">
      <div class="container">
        <div class="account-main clears">
          <div class="ac-main-left">
            <h2>My Account</h2>
            <span class="toggle-account"><i class="fa fa-bars" aria-hidden="true"></i></span>
            <ul class="order-menu">
              <li><a href="#"><i class="fa fa-folder-open" aria-hidden="true"></i> My Order</a></li>
              <li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit Address</a></li>
              <li><a href="#"><i class="fa fa-lock" aria-hidden="true"></i>Change Password</a></li>
            </ul>
          </div>
          <div class="ac-main-right">
            <h2>My Order</h2>
            <div class="dt-ord-top clears">
              <div class="dt-ord-top-left"> <span>Order ID: 12345678911 ( 2 Item )</span> <span>Placed on May, 2016</span> </div>
              <div class="dt-ord-top-right"> <a href="#" class="btns dt">Details</a> </div>
            </div>
            <div class="prod-order-status">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2">
                  <prod><img src="http://18.220.22.75/images/my-account-p-img.png" alt=""></prod>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7">
                  <div class="order-issue">
                    <h3>Aenean sed fringilla diam</h3>
                    <div class="issue-box-wrap">
                      <ul>
                        <li><a href="#">Return / Replace</a></li>
                        <li><a href="#">get invoice</a></li>
                        <li> <span>For product related issue</span> <a href="#">message seller</a> </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="wrt-review"> <span><i class="fa fa-file-text-o" aria-hidden="true"></i> Write a Review!</span>
                    <ul>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="track-holder">
              <div class="deliver-sec clears">
                <div class="deliver-sec-left"> <span>Status:</span> <small>Delivered</small> </div>
                <div class="deliver-sec-right"> <span>Delivered On:</span> <small>28 May, 2016</small> </div>
              </div>
              <div class="track-bar-wrap">
                <div class="track-bar"> <span></span> <span></span> <span></span> </div>
                <ul>
                  <li>Placed</li>
                  <li>DisPlaced</li>
                  <li>Dielivered</li>
                </ul>
              </div>
              <a href="#" class="track">Track</a> </div>
            <div class="wishlist-wrap">
              <table class="wishlist-table" width="100%">
                
                <tbody>
                  <tr>
                    <td colspan="2"><a href="#" class="edit-add">Edit Address</a></td>
                    <td colspan="3"></td>
                  </tr>
                  <tr>
                    <td colspan="2"><div class="ord-address">
                        <h3>My Address</h3>
                        <span>Vill + Po - Rampur Bhatpara, Ps - Gaighata, Dist - (N) 24 P.G.S</span> </div></td>
                    <td colspan="3"></td>
                  </tr>
                </tbody>
              </table>
              <div class="address-wrap">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="address-block">
                      <h3>Billing Address</h3>
                      <a href="#" class="btns">Edit</a>
                      <address-content> <span>Vill + Po - Rampur Bhatpara,</span> <span>Ps - Gaighata,</span> <span>Dist - (N) 24 P.G.S</span> </address-content>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="address-block">
                      <h3>Shipping Address</h3>
                      <a href="#" class="btns">Edit</a>
                      <address-content> <span>Vill + Po - Rampur Bhatpara,</span> <span>Ps - Gaighata,</span> <span>Dist - (N) 24 P.G.S</span> </address-content>
                    </div>
                  </div>
                </div>
              </div>
              <div class="change-add">
                <div class="row">
                  <div class="col-lg-8">
                    <h3>Change Password</h3>
                    <form action="#" method="post">
                      <input type="password" name="" placeholder="Old Password"  value="">
                      <input type="password" name="" placeholder="New Password" value="">
                      <input type="password" name="" placeholder="Confirm password"  value="">
                      <input type="submit" name="" value="Submit">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

@endsection
