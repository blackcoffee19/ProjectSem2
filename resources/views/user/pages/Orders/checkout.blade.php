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
      @if(\Session::has('paypal_error'))
          <div class="alert alert-danger">{{ \Session::get('paypal_error') }}</div>
          {{ \Session::forget('paypal_error') }}
      @endif
      @if(\Session::has('success_paypal'))
          <div class="alert alert-success">{{ \Session::get('paypal_success'). " Make sure you sign all delivery Infomation" }}</div>
      @endif
      @php
          $shipment = 2;
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
                                        @if (Session::has('select_add'))
                                        <input class="form-check-input" type="radio" name="select_address" data-shipment="{{$add->shipment_fee}}" {{Session::get('select_add') == $add->id_address?'checked':''}} value="{{$add->id_address}}">
                                        @else
                                        <input class="form-check-input" type="radio" name="select_address" data-shipment="{{$add->shipment_fee}}" {{$add->default ? "checked":''}} value="{{$add->id_address}}">
                                        @endif
                                        <label class="form-check-label text-dark" >
                                          Reciver : {{$add->receiver}}
                                        </label>
                                      </div>
                                      <p class="text-muted">{{$add->email}}</p>
                                      <address style="height: 90px">
                                        {{$add->address}}<br>
                                        <abbr title="Phone">P: {{$add->phone}}</abbr></address>
                                        @php
                                          if(!Session::has('select_add')){
                                            if($add->default){
                                              $shipment_fee = $add->shipment_fee;
                                            }
                                          }else{
                                            $shipment_fee = intval(Session::get('shipfee'));
                                          }
                                        @endphp
                                      @if ($add->default)
                                      <span class="text-danger">Default address </span>
                                      @endif
                                      <a href="javascript:void(0);" class="text-muted remove_add text-end" data-idadd="{{$add->id_address}}">Remove Address</a>
                                    </div>
                                  </div>
                              @endforeach
                            @else
                            @php
                                $shipment_fee = Session::has('shipfee')?intval(Session::get('shipfee')):20000;
                            @endphp
                            @endif
                          </div>
                        </div>
                      </div>
                    @else
                      @php
                          $shipment_fee = Session::has('shipfee')?intval(Session::get('shipfee')):20000;
                      @endphp
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
                              <input type="text" class="form-control" name="nameReciever" placeholder="Reciever name"  required="" value="{{Session::has('name')?Session::get('name'):''}}">
                            </div>
                            <div class="col-6">
                              <input type="text" class="form-control" name="phoneReciever" placeholder="Phone number"  required="" value="{{Session::has('phone')?Session::get('phone'):''}}">
                            </div>
                            <div class="col-6">
                              <input type="text" class="form-control" name="emailReciever" placeholder="Email" value="{{Session::has('email')?Session::get('email'):''}}">
                            </div>
                            <div class="col-12">
                              <input type="text" class="form-control" name="addressReciever" placeholder="Address" value="{{Session::has('address')?Session::get('address'):''}}">
                            </div>
                            <div class="col-12">
                              <select class="form-select" name="province" id="province">
                                @if (Session::has('province'))
                                    <option value="{{Session::get('province')}}">{{Session::get('province')}}</option>
                                @endif
                              </select>
                            </div>
                            <div class="col-12">
                              <select class="form-select" name="district" id="district" disabled>
                                @if (Session::has('district'))
                                  <option value="{{Session::get('district')}}">{{Session::get('district')}}</option>
                                @endif
                              </select>
                            </div>
                            <div class="col-12">
                              <select class="form-select" name="ward" id="ward" disabled>
                                @if (Session::has('ward'))
                                  <option value="{{Session::get('ward')}}">{{Session::get('ward')}}</option>
                                @endif
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endif
                  </div>
                  <input type="hidden" name="shipment_fee" id="shipment_fee"value="{{Session::has('shipfee')?intval(Session::get('shipfee')):$shipment_fee}}">
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
                          placeholder="Write delivery instructions ">{{Session::has('instructions')?Session::get('instructions'):''}}</textarea>
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
                          <div class="card card-bordered shadow-none mb-2">
                            <div class="card-body p-6 {{Session::has('success_paypal')?'alert alert-primary':''}}">
                              <div class="d-flex">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="order_method" value="paypal" id="paypal" {{Session::has('success_paypal')?'checked':''}}>
                                    <label class="form-check-label ms-2" for="paypal">
                                    </label>
                                </div>
                                <div >
                                  <h5 class="mb-1 h6"> Payment with Paypal</h5>
                                  <p class="mb-0 small">{{Session::has('paypal_success')?Session::get('paypal_success'):'You will be redirected to PayPal website to complete your purchase
                                    securely.'}}</p>
                                    <a class="btn btn-primary m-3 px-2 h5"  id="paypal_btn" data-success="{{Session::has('paypal_success')? 'success': 'none'}}">Pay </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          @if (!Session::has('success_paypal'))
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
                                </div>
                              </div>
                            </div>
                          </div>
                              
                          @endif
                          <div class="mt-5 d-flex justify-content-end">
                            <a href="#" class="btn btn-outline-gray-400 text-muted"
                              data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false"
                              aria-controls="flush-collapseThree">Prev</a>
                            
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
                            <img src="{{asset('images/products/'.$item->Product->Library[0]->image)}}" alt="Ecommerce" class="img-fluid">    
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
                        Service Fee <i class="feather-icon icon-info text-muted" data-bs-toggle="tooltip"
                          title="Shipment Fee"></i>
                      </div>
                      <div class="fw-bold" id="shippment_fee" data-ship="{{$shipment_fee}}">
                        {{number_format($shipment_fee,0,'',' ')}} đ
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between {{Session::has('shipfee') && intval(Session::get('shipfee'))<$shipment_fee?'':'d-none'}} mb-2 " id="extra_ship">
                      <div>Extra Shipment fee<i class="feather-icon icon-info text-muted" data-bs-toggle="tooltip" title="Shipment Fee"></i>
                      </div>
                      <div class="fw-bold text-danger" >
                        + 10000đ
                      </div>
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
                          $subtotal +=Session::has('shipfee')?intval(Session::get('shipfee')):$shipment_fee;
                          if(Session::has('coupon') && $coupon->freeship){
                            $subtotal -= $coupon->discount;
                          }else if(Session::has('coupon')){
                            $subtotal *=(1- $coupon->discount/100);
                          }
                      @endphp
                      <div id="total" data-total="{{$subtotal-$shipment_fee}}">
                        {{number_format($subtotal,0,'',' ') }} đ
                      </div>
                    </div>
                  </li>
                </ul>

              </div>
              <div class="mt-4 row">
                <button type="submit" class="btn btn-primary ms-2 col-3" id="submit_order" {{!Auth::check()?(!Session::has('paypal_success')?"disabled":''):''}}>Finish Order</button>
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
      $(document).ready(function(){
            $('.remove_add').click(function(){
              window.location.assign(window.location.origin+'/public/index.php/remove_address/'+$(this).data('idadd'));
            });
            $('input[name="select_address"]').change(function(){
              if(parseInt($('input[name="select_address"]:checked').data('shipment'))>20000){
                if($("#shippment_fee").data('ship') != 30000){
                  $('#extra_ship').removeClass('d-none');
                  $('#shipment_fee').val(30000);
                  let totall = parseInt($("#total").data('total'))+30000;
                  $('#total').html(totall+' VND');
                  $("#paypal_btn").text("Pay $"+Math.floor((parseInt($('#total').data('total'))+30000)*0,000043));
                };
              }else{
                if(!$('#extra_ship').hasClass('d-none')){
                  $('#extra_ship').addClass('d-none');
                }
                $("#shippment_fee").html('20000 VND');
                  $("#shippment_fee").data('ship',20000);
                  $('#shipment_fee').val(20000);
                  $('#total').html('$'+parseInt($("#total").data('total'))+20000)
                  $("#paypal_btn").text("Pay $"+((parseInt($('#total').data('total'))+30000)*0.000043).toFixed(2));
              }
            })
            @if(Session::has('success_paypal'))
            $("#paypal_btn").text("Paied");
            @else
            $("#paypal_btn").text("Pay $"+((parseInt($('#total').data('total'))+parseInt($('#shipment_fee').val()))*0.000043).toFixed(2));
            @endif
            $("input[name=order_method]").change(function(){
              if(($('#paypal').is(':checked') && $('#paypal_btn').data('success') == "success")|| $("#cashonDelivery").is(':checked')){
                $('#submit_order').removeAttr('disabled');
              }else{
                $('#submit_order').attr('disabled','disabled');
              }
            });
            $("#paypal_btn").click(function(){
              @if(!Session::has('paypal_success'))
                @if(Auth::check())
                  window.location.assign(window.location.origin+'/public/index.php/process-transaction?select_address='+$('input[name=select_address]:checked').val()+"&instruction="+$("#DeliveryInstructions").val()+"&shipfee="+$('#shipment_fee').val()+"&coupon="+$('input[name=code_coupon]').val());
                @else
                  window.location.assign(window.location.origin+'/public/index.php/process-transaction?name='+$('input[name=nameReciever]').val()+"&phone="+$('input[name=phoneReciever]').val()+"&email="+$('input[name=emailReciever]').val()+"&province="+$('#province option:selected').val()+"&district="+$('#district option:selected').val()+"&ward="+$('#ward option:selected').val()+"&address="+$('input[name=addressReciever]').val()+"&instruction="+$("#DeliveryInstructions").val()+"&shipfee="+$('#shipment_fee').val());
                @endif
              @else
                alert("You has paied. Now Sign all delivery information then submit");
              @endif
            })
        })
    </script>
@endsection