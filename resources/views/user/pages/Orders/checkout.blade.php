@extends('user.partials.master')
@section('content')
  <!-- section -->
  <section class="mb-lg-14 mb-8 mt-8">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div>
            <div class="mb-8">
              <h1 class="fw-bold mb-0">Checkout</h1>
              @if (!Auth::check())
              <p class="mb-0">Already have an account? Click here to <a href="#!" class="text-muted" data-bs-toggle="modal"
                data-bs-target="#userModal">Sign in</a>.</p>
              @endif
            </div>
          </div>
        </div>
      </div>
      {{-- <h1>{{Session::has('success_paypal') && Route::currentRouteName() == 'checkout'? "OKE":'NO'}}</h1> --}}
      @if(\Session::has('paypal_error'))
          <div class="alert alert-danger">{{ \Session::get('paypal_error') }}</div>
          {{ \Session::forget('paypal_error') }}
      @endif
      
      @php
          $shipment_fee = 16500;
      @endphp
      <div>
        <form action="{{route('checkout')}}" method="post">
          @csrf
        <div class="row">
          @if (isset($cart) && count($cart)>0)
            <div class="col-lg-7 col-md-12">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                  <div class="accordion-item py-4">
                    @if (Auth::check())
                      <input type="hidden" name="code_coupon" value="{{$coupon? $coupon->code:''}}">
                      <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="fs-5 text-inherit collapsed h4"  data-bs-toggle="collapse"
                          data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                          <i class="feather-icon icon-map-pin me-2 text-muted"></i>Add delivery address
                        </a>
                        <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                          data-bs-target="#addAddressModal">Add a new address </a>
                      </div>
                      <div id="flush-collapseOne" class="accordion-collapse collapse show"
                      data-bs-parent="#accordionFlushExample">
                        <div class="mt-5">
                          <div class="row" id="listAddress">
                            @if (count($address)>0)
                              @foreach ($address as $add)
                                  <div class="col-lg-6 col-12 mb-4">
                                    <div class="card card-body p-6 " style="height: 240px">
                                      <div class="form-check mb-4">
                                        <input class="form-check-input" type="radio" name="select_address" data-address="{{$add->id_address}}" {{$add->default ? "checked":''}} value="{{$add->id_address}}">
                                        <label class="form-check-label text-dark" >
                                          Reciver : {{$add->receiver}}
                                        </label>
                                      </div>
                                      <p class="text-muted">{{$add->email}}</p>
                                      <address style="height: 90px" data-ward="{{$add->ward}}" data-district="{{$add->district}}" data-districtid="{{$add->district_id}}" data_wardid="{{$add->ward_id}}" data-province="{{$add->province}}">
                                        {{$add->address .", ".$add->ward.", ".$add->district}}<br>
                                        {{$add->province}}<br>
                                        <abbr title="Phone">P: {{$add->phone}}</abbr></address>
                                      @if ($add->default)
                                      <span class="text-danger">Default address </span>
                                      @endif
                                      <a href="javascript:void(0);" class="text-muted remove_add text-end" data-idadd="{{$add->id_address}}">Remove Address</a>
                                    </div>
                                  </div>
                              @endforeach
                            @else
                            @endif
                          </div>
                        </div>
                      </div>
                    @else
                      <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="fs-5 text-inherit collapsed h4"  data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                          <i class="feather-icon icon-map-pin me-2 text-muted"></i>Add delivery address
                        </a>
                      </div>
                      <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                        <div class="mt-5">
                          <div class="row g-3">
                            <!-- col -->
                            <div class="col-12">
                              <input type="text" class="form-control" name="nameReciever" placeholder="Reciever name"  required="" >
                              
                            </div>
                            <div class="col-6">
                              <input type="text" class="form-control" name="phoneReciever" placeholder="Phone number"  required="" >
                              
                            </div>
                            <div class="col-6">
                              <input type="text" class="form-control" name="emailReciever" placeholder="Email" >
                            
                            </div>
                            <div class="col-12">
                              <input type="text" class="form-control" name="addressReciever" placeholder="Address" >
                              
                            </div>
                            <div class="col-12">
                              <select class="form-select" name="province" id="province" >
                              </select>
                            </div>
                            <div class="col-12">
                              <select class="form-select" name="district" id="district" disabled>
                              </select>
                            </div>
                            <div class="col-12">
                              <select class="form-select" name="ward" id="ward" disabled>
                              </select>
                              <span class="text-danger" id="error_delivery"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endif
                  </div>
                  <input type="hidden" name="shipment_fee"value="{{$shipment_fee}}">
                  <div class="accordion-item py-4">
                    <a href="#" class="text-inherit h5"  data-bs-toggle="collapse"
                      data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      <i class="feather-icon icon-shopping-bag me-2 text-muted"></i>Delivery instructions
                    </a>
                    <div id="flush-collapseThree" class="accordion-collapse collapse "
                      data-bs-parent="#accordionFlushExample">
                      <div class="mt-5">
                        <label for="DeliveryInstructions" class="form-label sr-only">Delivery instructions</label>
                        <textarea class="form-control" id="DeliveryInstructions" name="delivery_instructions" rows="3"
                          placeholder="Write delivery instructions "></textarea>
                        <p class="form-text">Add instructions for how you want your order shopped and/or delivered</p>
                        <div class="mt-5 d-flex justify-content-end">
                          <a href="#" class="btn btn-outline-gray-400 text-muted"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                            aria-controls="flush-collapseTwo">Prev</a>
                          <a href="#" class="btn btn-primary ms-2"  data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFour" aria-expanded="false"
                            aria-controls="flush-collapseFour">Next</a>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="accordion-item py-4">
                    <a href="#" class="text-inherit h5"  data-bs-toggle="collapse"
                      data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                      <i class="feather-icon icon-credit-card me-2 text-muted"></i>Payment Method
                    </a>
                    <div id="flush-collapseFour" class="accordion-collapse collapse "
                      data-bs-parent="#accordionFlushExample">
                      <div class="mt-5">
                        <div>
                          <div class="mb-5">
                            <select name="delivery_method" id="delivery_method" class="form-select" >
                              <optgroup label="Giao Hang Tiet Kiem" id="ghtk_service">
                              </optgroup>
                              <optgroup label="Giao Hang Nhanh" id="ghn_services">
                              </optgroup>
                            </select>
                          </div>
                          <div class="card card-bordered shadow-none mb-2">
                            <div class="card card-bordered shadow-none">
                              <div class="card-body p-6">
                                <div class="d-flex">
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="order_method" value="cod" id="cashonDelivery" checked>
                                      <label class="form-check-label ms-2" for="cashonDelivery">
                                    </label>
                                  </div>
                                  <div>
                                    <h5 class="mb-1 h6"> Cash on Delivery</h5>
                                    <p class="mb-0 small">Pay with cash when your order is delivered.</p>
                                    <img src="{{asset('images/icons/ghtk.png')}}" width="130" class="img-fluid" id="img_logictic" alt="">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card-body p-6">
                              <div class="d-flex">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="order_method" value="paypal" id="paypal">
                                  <label for="paypal mx-2">
                                    <svg width="56" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <g id="paypal-light-large">
                                      <rect id="card_bg" width="32" height="21.3333" rx="4" fill="#DFE3E8"/>
                                      <g id="paypal">
                                      <path id="Path" d="M13.5642 16.88L13.7976 15.4133H13.2776H10.8242L12.5309 4.57333C12.5354 4.53975 12.552 4.50895 12.5776 4.48666C12.6044 4.46595 12.637 4.45428 12.6709 4.45333H16.8109C18.1909 4.45333 19.1376 4.74 19.6376 5.30666C19.8588 5.54435 20.0129 5.83653 20.0842 6.15333C20.162 6.53833 20.162 6.935 20.0842 7.32V7.65333L20.3176 7.78666C20.4952 7.8752 20.6555 7.99487 20.7909 8.14C20.9947 8.386 21.1262 8.6837 21.1709 9C21.2208 9.41348 21.2028 9.83234 21.1176 10.24C21.0296 10.7352 20.8559 11.2112 20.6042 11.6467C20.4008 11.9958 20.1259 12.2979 19.7976 12.5333C19.4671 12.7587 19.0991 12.9235 18.7109 13.02C18.2751 13.1299 17.827 13.1837 17.3776 13.18H17.0509C16.8219 13.18 16.6002 13.2602 16.4242 13.4067C16.2473 13.5557 16.1311 13.7644 16.0976 13.9933V14.1267L15.6909 16.7133V16.8133C15.6957 16.8308 15.6957 16.8492 15.6909 16.8667H15.6509L13.5642 16.88Z" fill="#253D80"/>
                                      <path id="Path_2" d="M20.5361 7.38667L20.4961 7.63333C19.9494 10.4333 18.0761 11.4067 15.6894 11.4067H14.4761C14.1842 11.4063 13.9354 11.6184 13.8894 11.9067L13.2694 15.8533L13.0894 16.9733C13.0759 17.063 13.1019 17.1542 13.1608 17.2232C13.2196 17.2922 13.3054 17.3324 13.3961 17.3333H15.5561C15.8122 17.3331 16.03 17.1464 16.0694 16.8933V16.7867L16.4761 14.2067V14.0667C16.5125 13.8146 16.7281 13.6274 16.9828 13.6267H17.3361C19.4228 13.6267 21.0628 12.78 21.5361 10.2933C21.7922 9.44343 21.6342 8.52258 21.1094 7.80667C20.9429 7.63588 20.7492 7.49394 20.5361 7.38667V7.38667Z" fill="#189BD7"/>
                                      <path id="Path_3" d="M19.9603 7.16L19.7069 7.09333L19.4269 7.04C19.0739 6.98721 18.7172 6.96268 18.3603 6.96666H15.1069C15.0309 6.96458 14.9555 6.98057 14.8869 7.01333C14.7323 7.0857 14.6246 7.23105 14.6003 7.4L13.9336 11.78V11.9067C13.9795 11.6184 14.2283 11.4063 14.5203 11.4067H15.7336C18.1203 11.4067 19.9936 10.4333 20.5403 7.63333L20.5803 7.38666C20.4367 7.31246 20.2873 7.25003 20.1336 7.2L19.9603 7.16Z" fill="#242E65"/>
                                      <path id="Path_4" d="M14.6022 7.4C14.6265 7.23105 14.7343 7.08571 14.8889 7.01333C14.9575 6.98058 15.0329 6.96458 15.1089 6.96667H18.3622C18.7191 6.96269 19.0758 6.98721 19.4289 7.04L19.7089 7.09333L19.9622 7.16L20.0889 7.2C20.2426 7.25003 20.3919 7.31246 20.5355 7.38667C20.7522 6.55375 20.5536 5.66745 20.0022 5.00667C19.3355 4.3 18.2422 4 16.8155 4H12.6689C12.3769 3.99965 12.1281 4.2117 12.0822 4.5L10.3555 15.44C10.3401 15.5432 10.3701 15.648 10.4379 15.7273C10.5057 15.8066 10.6046 15.8526 10.7089 15.8533H13.2689L13.9355 11.78L14.6022 7.4Z" fill="#253D80"/>
                                      </g>
                                      </g>
                                    </svg>                                    
                                  </label>
                                </div>
                                <div >
                                  <h5 class="mb-1 h6"> Payment with Paypal</h5>
                                  <p class="mb-0 small">{{Session::has('paypal_success')?Session::get('paypal_success'):'You will be redirected to PayPal website to complete your purchase
                                    securely.'}}</p>
                                    <button type="button" for="paypal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#payPalModal" id="paypal_btn">
                                      Pay $<span class="totalPay"></span>
                                    </button>
                                    
                                    {{-- <a class="btn btn-primary m-3 px-2 h5"  id="paypal_btn" data-success="{{Session::has('success_paypal')? 'success': 'none'}}">Pay </a> --}}
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="mt-5 d-flex justify-content-end">
                            <a href="#" class="btn btn-outline-gray-400 text-muted"
                              data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false"
                              aria-controls="flush-collapseThree">Prev</a>
                                <button type="submit" class="btn btn-primary ms-2 col-3" id="submit_order" {{!Auth::check()?"disabled":''}}>Finish Order</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          @else
          <div class="col-lg-7 col-md-12">
            <div class="row">
              <h4 class="text-muted col-12 mb-5">Look like you still add any Item to Cart to take an order.</h4>
              <a href="{{route('index')}}" class="btn btn-dark text-monospace col-4 mx-auto">Back to Homepage</a>
            </div>
          </div>
          @endif

          <div class="col-12 col-md-12 offset-lg-1 col-lg-4">
            <div class="mt-4 mt-lg-0">
              <div class="card shadow-sm">
                <h5 class="px-6 py-4 bg-transparent mb-0">Order Details</h5>
                <ul class="list-group list-group-flush">
                  @php
                      $subtotal = 0;
                  @endphp
                  @if (isset($cart))
                    @foreach ($cart as $item)
                      <li class="list-group-item px-4 py-3">
                        @if (Auth::check())
                        <div class="row align-items-center">
                          <div class="col-2 col-md-2">
                            @if (count($item->Product->Library)>0)
                            <img src="{{asset('images/products/'.$item->Product->Library[0]->image)}}" alt="Ecommerce" class="img-fluid">    
                            @else
                            <img src="{{asset('images/category/'.$item->Product->TypeProduct->image)}}" alt="Ecommerce" class="img-fluid">    
                            @endif
                          </div>
                          <div class="col-5 col-md-5">
                            <h6 class="mb-0">{{$item->Product->name}}</h6>
                          </div>
                          <div class="col-2 col-md-2 text-center text-muted">
                            <span>{{$item->amount}} g</span>
                          </div>
                          <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                            @if ($item->sale>0)
                              @php
                                $subtotal += ($item->price * (1-$item->sale/100))*($item->amount/1000);
                              @endphp
                                <span class="fw-bold me-1">{{number_format($item->price * (1-$item->sale/100),0,'',' ')}}</span>
                                <span class="text-decoration-line-through ms-2">{{$item->price}}</span><small> đ/kg</small>
                            @else
                            @php
                              $subtotal += $item->price*($item->amount/1000);
                            @endphp
                                <span class="fw-bold">{{number_format($item->price,0,'',' ')}} đ/kg</span>
                            @endif
                          </div>
                        </div>
                        @else
                        <div class="row align-items-center">
                          <div class="col-2 col-md-2">
                            <img src="{{asset('images/products/'.$item['image'])}}" alt="Ecommerce" class="img-fluid">
                          </div>
                          <div class="col-5 col-md-5">
                            <h6 class="mb-0">{{$item['name']}}</h6>
                          </div>
                          <div class="col-2 col-md-2 text-center text-muted">
                            <span>{{number_format($item['amount'],0)}}g</span>
                          </div>
                          <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                            @if ($item['sale']>0)
                              @php
                                $subtotal += ($item['per_price'] * (1-$item['sale']/100))*($item['amount']/1000);
                              @endphp
                                <span class="fw-bold">{{number_format($item['per_price'] * (1-$item['sale']/100),0,'',' ')}}</span>
                                <span class="text-decoration-line-through ms-2">{{$item['per_price']}}</span> <small> đ/kg</small>
                            @else
                              @php
                                $subtotal += $item['per_price']*($item['amount']/1000);
                              @endphp
                                <span class="fw-bold">{{number_format($item['per_price'],0,'',' ')}} đ/kg</span>
                            @endif
                          </div>
                        </div>
                        @endif
                      </li>
                    @endforeach
                  @else
                  <li class="list-group-item px-4 py-3">
                    <div class="text-center">
                        <h6 class="text-muted">There are no item in cart</h6>
                    </div>
                  </li>
                  @endif
                  <li class="list-group-item px-4 py-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                      <div>
                        Item Subtotal
                      </div>
                      <div class="fw-bold">
                        {{number_format($subtotal,0,'',' ')}} đ
                      </div>

                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2 ">
                      <div>
                        Service Fee <i class="bi bi-exclamation-circle text-muted" data-bs-toggle="tooltip"
                          title="Shipping fee depends on the shipping address"></i>
                      </div>
                      <div class="fw-bold" id="shippment_fee">
                        {{number_format($shipment_fee,0,'',' ')}} đ
                      </div>
                    </div>
                    <div class=" d-flex flex-column d-none mb-2 " >
                      <div class="d-flex align-items-center justify-content-between">
                        <div>
                          Extra Shipment fee
                          <img src="{{asset('images/icons/GHTK.svg')}}" alt="" width="30" height="30">
                        </div>
                        <div class="fw-bold text-danger" id="extra_ship_display">
                        </div>
                      </div>
                      <div id="extra_ship"></div>
                    </div>
                    @if (Session::has('coupon'))
                    <div class="d-flex align-items-center justify-content-between mb-2 ">
                      <div>
                        Coupon {{$coupon->title}}<i class="feather-icon icon-info text-muted" data-bs-toggle="tooltip" title="Coupon"></i>
                      </div>
                      <div class="fw-bold" >
                        @if ($coupon->freeship)
                        <span class="text-danger"> - {{number_format($coupon->discount,0,'',' ')}} đ</span>
                        @else    
                        <span class="text-danger"> -{{$coupon->discount}}%</span>
                        @endif
                      </div>
                    </div>
                    @endif
                  </li>
                  <!-- list group item -->
                  <li class="list-group-item px-4 py-3">
                    <div class="d-flex align-items-center justify-content-between fw-bold">
                      <div>
                        Total
                      </div>
                      @php
                          if(Session::has('coupon') && $coupon->freeship){
                            $subtotal -= $coupon->discount;
                          }else if(Session::has('coupon')){
                            $subtotal *=(1- $coupon->discount/100);
                          }
                          $total_order = $subtotal+$shipment_fee;
                      @endphp
                      <div id="total" data-subtotal="{{$subtotal}}">
                        {{number_format($total_order,0,'',' ') }} đ
                      </div>
                    </div>
                  </li>
                </ul>

              </div>
              

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    </main>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.remove_add').click(function() {
                window.location.assign(window.location.origin + '/public/index.php/remove_address/' + $(this).data('idadd'));
            });
            @if(Auth::check())
              let addr = $('input[name="select_address"]:checked').parent().next().next();
              $.get(window.location.origin+'/public/index.php/ajax/ghtk_service/fee?province='+addr.data('province')+"&district="+addr.data('district'),function(data){
                let dataJson = jQuery.parseJSON(data);
                // console.log(dataJson);
                let deliver_method = jQuery.parseJSON(dataJson[1]);
                if(deliver_method['fee']['delivery']){
                  let totall = parseInt($("#total").data('subtotal'))+deliver_method['fee']['fee'];
                  if(deliver_method['fee']['fee']!=$("input[name=shipment_fee]").val()){
                    $("#shippment_fee").html(deliver_method['fee']['ship_fee_only']+" đ");
                    $("#total").html(totall +" đ");
                  }
                  $(".totalPay").text((totall*0.000043).toFixed(2));
                  $("input[name=shipment_fee]").val(deliver_method['fee']['fee']);
                  if(deliver_method['fee']['extFees'].length>0){
                    $('#extra_ship').parent().removeClass('d-none');
                    let ex_fee = 0;
                    let transtalate2 = {"Phụ phí hàng nông sản/thực phẩm khô": "Surcharge for agricultural products/dry food"};
                    deliver_method['fee']['extFees'].forEach(el=>{
                      ex_fee+=el['amount'];
                      $('#extra_ship').html(`<div class='ms-3 text-muted'>${transtalate2[el['title']]}</div>`);
                    });
                    $("#extra_ship_display").html("+ "+ex_fee+" đ");
                  }else{
                    $('#extra_ship').parent().addClass('d-none');
                  }
                };
                let str1 = "";
                for (let i = 0; i < dataJson.length; i++) {
                  let name=["Air Transport","Road Transport","Xfast"]
                  str1+=`<option value='${i}' ${i==1?'selected':''}>${name[i]}</option>`;  
                }
                $("#ghtk_service").html(str1);
              });
              $.get(window.location.origin+"/public/index.php/ajax/ghn_service/service?district="+addr.data('districtid'),function(data){
                  let newdata = data.slice(0,data.length-1);
                  let dataJs = jQuery.parseJSON(newdata); 
                  let str = "";
                  dataJs['data'].forEach(service =>{
                    let translate =""; 
                    switch(service['short_name']){
                      case "Chuyển phát thương mại điện tử":
                      translate = "E-commerce delivery";
                        break;
                      case "Chuyển phát truyền thống": 
                      translate ="Traditional delivery";
                        break;
                        case "Tiết kiệm":
                        translate ="Saving delivery";
                          break;
                        default:
                        translate = service['short_name'];
                    };
                    str+=`<option value='${service['service_id']}'>${translate}</option>`;
                    $.get(window.location.origin+"/public/index.php/ajax/ghn_service/fee?ward="+addr.data('wardid')+"&district="+addr.data('districtid')+"&service_id="+service['service_id'],function(data2){
                      let newdata2 = data2.slice(0,data2.length-1);
                      let dataJs2 = jQuery.parseJSON(newdata2);
                      //Change method
                      $('#delivery_method').change(function(){
                        if(parseInt($('#delivery_method option:selected').val()) <10){
                          $("#img_logictic").attr('src',"{{asset('images/icons/ghtk.png')}}");
                          $.get(window.location.origin+'/public/index.php/ajax/ghtk_service/fee?province='+$("#province option:selected").text()+"&district="+$("#district option:selected").text(),function(data3){
                              let dataJson2 = jQuery.parseJSON(data3);
                              let deliver_method2 = jQuery.parseJSON(dataJson2[$('#delivery_method option:selected').val()]);
                              if(deliver_method2['fee']['delivery']){
                                let totall2 = parseInt($("#total").data('subtotal'))+deliver_method2['fee']['fee'];
                                if(deliver_method2['fee']['fee']!=$("input[name=shipment_fee]").val()){
                                  $("#shippment_fee").html(deliver_method2['fee']['ship_fee_only']+" đ");
                                  $("#total").html(totall2 +" đ");
                                }
                                $(".totalPay").text((totall2*0.000043).toFixed(2));
                                $("input[name=shipment_fee]").val(deliver_method2['fee']['fee']);
                                if(parseInt($('#delivery_method').val()) == 2){
                                  $('#extra_ship').parent().addClass('d-none');
                                }else {
                                  $('#extra_ship').parent().removeClass('d-none');
                                }
                                if(deliver_method2['fee']['extFees'].length>0 ){
                                  let transtalate2 = {"Phụ phí hàng nông sản/thực phẩm khô": "Surcharge for agricultural products/dry food"};
                                  let ex_fee2 = 0;
                                  deliver_method2['fee']['extFees'].forEach(el=>{
                                    ex_fee2+=el['amount'];
                                    $('#extra_ship').html(`<div class='ms-3 text-muted'>${transtalate2[el['title']]}</div>`);
                                  });
                                  $("#extra_ship_display").html("+ "+ex_fee2+" đ");
                                }
                              };
                            })   
                        }else{
                          $.get(window.location.origin+"/public/index.php/ajax/ghn_service/fee?ward="+addr.data('wardid')+"&district="+addr.data('districtid')+"&service_id="+$('#delivery_method option:selected').val(),function(data3){
                            let newdata3 = data3.slice(0,data3.length-1);
                            let dataJs6 = jQuery.parseJSON(newdata3);
                            
                            let shipping =dataJs6['data']['total'];
                            let total_ghn  = dataJs6['data']['total']+parseInt($("#total").data('subtotal'));
                            if(shipping!=$("input[name=shipment_fee]").val()){
                              $("#shippment_fee").html(shipping+" đ");
                              $("#total").html(total_ghn +" đ");
                            }
                            $(".totalPay").text((total_ghn*0.000043).toFixed(2));
                            $("input[name=shipment_fee]").val(shipping);
                          });
                          $("#img_logictic").attr('src',"{{asset('images/icons/GHN2.png')}}");
                          $('#extra_ship').parent().addClass('d-none');
                        };
                      });
                    })
                  })
                  $('#ghn_services').html(str);
                });
            @endif
            $('input[name="select_address"]').change(function(){
              addr =  $(this).parent().next().next();
              $.get(window.location.origin+'/public/index.php/ajax/ghtk_service/fee?province='+addr.data('province')+"&district="+addr.data('district'),function(data){
                let dataJson = jQuery.parseJSON(data);
                let deliver_method = jQuery.parseJSON(dataJson[1]);
                if(deliver_method['fee']['delivery']){
                  let totall = parseInt($("#total").data('subtotal'))+deliver_method['fee']['fee'];
                  if(deliver_method['fee']['fee']!=$("input[name=shipment_fee]").val()){
                    $("#shippment_fee").html(deliver_method['fee']['ship_fee_only']+" đ");
                    $("#total").html(totall +" đ");
                  }
                  $(".totalPay").text((totall*0.000043).toFixed(2));
                  $("input[name=shipment_fee]").val(deliver_method['fee']['fee']);
                  if(deliver_method['fee']['extFees'].length>0){
                    $('#extra_ship').parent().removeClass('d-none');
                    let ex_fee = 0;
                    let transtalate2 = {"Phụ phí hàng nông sản/thực phẩm khô": "Surcharge for agricultural products/dry food"};
                    deliver_method['fee']['extFees'].forEach(el=>{
                      ex_fee+=el['amount'];
                      $('#extra_ship').html(`<div class='ms-3 text-muted'>${transtalate2[el['title']]}</div>`);
                    });
                    $("#extra_ship_display").html("+ "+ex_fee+" đ");
                  }else{
                    $('#extra_ship').parent().addClass('d-none');
                  }
                };
                let str1 = "";
                for (let i = 0; i < dataJson.length; i++) {
                  var method = jQuery.parseJSON(dataJson[i]);
                  let name=["Air Transport","Road Transport","Xfast"]
                  str1+=`<option value='${i}' ${i==1?'selected':''}>${name[i]}</option>`;  
                }
                $("#ghtk_service").html(str1);
              });
            });
            $(".totalPay").text(((parseInt($('#total').data('total'))+parseInt($("input[name=shipment_fee]").val()))*0.000043).toFixed(2));
            $("input[name=order_method]").change(function(){
              if(($('#paypal').is(':checked') && $('#paypal_btn').data('success') == "success")|| $("#cashonDelivery").is(':checked')){
                $('#submit_order').removeAttr('disabled');
              }else{
                $('#submit_order').attr('disabled','disabled');
              }
            });
            $("#paypal_btn").click(function(){
              @if(Auth::check())
                $.get(window.location.origin+"/public/index.php/ajax/get-address/"+$('input[name=select_address]:checked').data('address'), function(data){
                  let dataAddress = jQuery.parseJSON(data);
                  $('#intruct_pay').html($("#DeliveryInstructions").val());
                  $('#address_pay').html(dataAddress['address']);
                  $("#ward_pay").html(dataAddress['ward']);
                  $("#delivery_by").html($('#delivery_method option:selected').parent().attr('label')+" - "+$('#delivery_method option:selected').text());
                  $('#district_pay').html(dataAddress['district']);
                  $("#province_pay").html(dataAddress['province']);
                  $('#name_pay').html(dataAddress['receiver']);
                  $('#phone_pay').html(dataAddress['phone']);
                  $('#email_pay').html(dataAddress['email']);
                  $("#confirm_paypal").click(function(){
                    let delivery_met= $('#delivery_method option:selected').parent().attr('label')+" - "+$('#delivery_method option:selected').text();
                    window.location.assign(window.location.origin+'/public/index.php/process-transaction?select_address='+$('input[name=select_address]:checked').val()+"&delivery_method="+delivery_met+"&instruction="+$("#DeliveryInstructions").val()+"&shipfee="+$('input[name=shipment_fee]').val()+"&coupon="+$('input[name=code_coupon]').val());
                  });
                })
              @else
                  if($('input[name=nameReciever]').val().trim().length ==0){
                    $('#name_pay').html("You forgot input receiver name");
                    $('#name_pay').addClass('text-danger');
                    $("#confirm_paypal").attr("disabled","disabled");
                  }else{
                    $('#name_pay').removeClass('text-danger');
                    $('#name_pay').html($('input[name=nameReciever]').val());
                  }
                  if($('input[name=phoneReciever]').val().trim().length == 0){
                    $('#phone_pay').html("You forgot input receiver's phone nummber");
                    $('#phone_pay').addClass('text-danger');

                  }else{ 
                    $('#phone_pay').removeClass('text-danger');
                    $('#phone_pay').html($('input[name=phoneReciever]').val());
                  }
                  if($('input[name=emailReciever]').val().trim().length == 0){
                    $('#email_pay').html("You forgot input email for us");
                    $('#email_pay').addClass('text-danger');
                    $("#confirm_paypal").attr("disabled","disabled");
                  }else{
                    $('#email_pay').removeClass('text-danger');
                    $('#email_pay').html($('input[name=emailReciever]').val());
                  }
                  $('#intruct_pay').html($("#DeliveryInstructions").val());
                  $("#address_pay").html($('input[name=addressReciever]').val());
                  let checkAddr= false;
                  $('#province option:selected').val($('#province option:selected').text());
                  $('#district option:selected').val($('#district option:selected').text());
                  $("#delivery_by").html($('#delivery_method option:selected').parent().attr('label')+" - "+$('#delivery_method option:selected').text());
                  $('#ward option:selected').val($('#ward option:selected').text());
                  if($('#ward option:selected').val() == null || 
                  $('#district option:selected').val() == null||
                  $('#province option:selected').val() == null || 
                  ($('#ward option:selected').val().includes("Choose") || !isNaN($('#ward option:selected').val())) ||
                  ($('#district option:selected').val().includes('Choose') || !isNaN($('#district option:selected').val())) ||
                  ($('#province option:selected').val().includes("Choose") || !isNaN($('#province option:selected').val()))
                  ){
                    $("#ward_pay").html("You need to select Address for Delivery");
                    $("#ward_pay").addClass("text-danger");
                    $("#confirm_paypal").attr("disabled","disabled");
                  }else{
                    
                    $("#ward_pay").removeClass('text-danger');
                    $("#ward_pay").html($('#ward option:selected').val());
                    $('#district_pay').html($('#district option:selected').val());
                    $("#province_pay").html($('#province option:selected').val());
                    checkAddr=true;
                  }
                  if($('input[name=nameReciever]').val().trim().length>0 && $('input[name=phoneReciever]').val().trim().length>0 && $('input[name=emailReciever]').val().trim().length >0 && checkAddr){
                    $("#confirm_paypal").removeAttr('disabled');
                  }
                @endif
            })
            $("#confirm_paypal").click(function(){
              let delivery = $('#delivery_method option:selected').parent().attr('label')+" - "+$('#delivery_method option:selected').text();
                window.location.assign(window.location.origin+'/public/index.php/process-transaction?name='+$('input[name=nameReciever]').val()+"&phone="+$('input[name=phoneReciever]').val()+"&email="+$('input[name=emailReciever]').val()+"&province="+$('#province option:selected').val()+"&district="+$('#district option:selected').val()+"&ward="+$('#ward option:selected').val()+"&address="+$('input[name=addressReciever]').val()+"&instruction="+$("#DeliveryInstructions").val()+"&delivery_method="+delivery+"&shipfee="+$('input[name=shipment_fee]').val());
            })
        })
    </script>
@endsection
