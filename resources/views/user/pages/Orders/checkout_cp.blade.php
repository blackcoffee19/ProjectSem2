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
      <div>
        <div class="row">
          @if (isset($cart) && count($cart)>0)
            <div class="col-lg-7 col-md-12">
              <form action="{{route('checkout')}}" method="post">
                @csrf
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
                          @php
                              $def_add = "";
                          @endphp
                            @foreach ($address as $add)
                            <div class="col-lg-6 col-12 mb-4">
                              <div class="card card-body p-6 " style="height: 240px">
                                    <div class="form-check mb-4">
                                      <input class="form-check-input" type="radio" name="select_address" id="homeRadio" {{$add->default?'checked':''}} value="{{$add->id_address}}">
                                      <label class="form-check-label text-dark" for="homeRadio">
                                        Reciver : {{$add->receiver}}
                                      </label>
                                    </div>
                                    <address style="height: 90px">
                                      {{$add->address}}<br>
                                      <abbr title="Phone">P: {{$add->phone}}</abbr></address>
                                    @if ($add->default)
                                    @php
                                        $def_add = $add->address;
                                    @endphp
                                    <span class="text-danger">Default address </span>
                                    @endif
                                    <a href="javascript:void(0);" class="text-muted remove_add text-end" data-idadd="{{$add->id_address}}">Remove Address</a>
                                  </div>
                                </div>
                                @endforeach
                              @endif
                          </div>
                        </div>
                      </div>
                    @else
                    <input type="hidden" name="code_coupon" value="{{$coupon? $coupon->code:''}}">

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
                            <input type="text" class="form-control" name="nameReciever" placeholder="Reciever name"  required="">
                          </div>
                          <div class="col-6">
                            <input type="text" class="form-control" name="phoneReciever" placeholder="Phone number"  required="">
                          </div>
                          <div class="col-6">
                            <input type="text" class="form-control" name="emailReciever" placeholder="Email">
                          </div>
                          <div class="col-12">
                            <input type="text" class="form-control" name="addressReciever" placeholder="Address">
                          </div>
                          <div class="col-12">
                            <select class="form-select" name="province" id="province">
                            </select>
                          </div>
                          <div class="col-12">
                            <select class="form-select" name="district" id="district" disabled>
                            </select>
                          </div>
                          <div class="col-12">
                            <select class="form-select" name="ward" id="ward" disabled>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                  </div>
                  <div class="accordion-item py-4">
                    <a href="#" class="text-inherit h5"  data-bs-toggle="collapse"
                      data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      <i class="feather-icon icon-shopping-bag me-2 text-muted"></i>Delivery instructions
                    </a>
                    <div id="flush-collapseThree" class="accordion-collapse collapse "
                      data-bs-parent="#accordionFlushExample">

                      <div class="mt-5">
                        <label for="DeliveryInstructions" class="form-label sr-only">Delivery instructions</label>
                        <textarea class="form-control" id="DeliveryInstructions" rows="3"
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
                          <div class="card card-bordered shadow-none mb-2">
                            <div class="card-body p-6">
                              <div class="d-flex">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="order_method" value="paypal" id="paypal" checked>
                                    <label class="form-check-label ms-2" for="paypal">
                                    </label>
                                </div>
                                <div>
                                  <h5 class="mb-1 h6"> Payment with Paypal</h5>
                                  <p class="mb-0 small">You will be redirected to PayPal website to complete your purchase
                                    securely.</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card card-bordered shadow-none">
                            <div class="card-body p-6">
                              <div class="d-flex">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="order_method" value="cod" id="cashonDelivery">
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
                          <div class="mt-5 d-flex justify-content-end">
                            <a href="#" class="btn btn-outline-gray-400 text-muted"
                              data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false"
                              aria-controls="flush-collapseThree">Prev</a>
                            <button type="submit" class="btn btn-primary ms-2" id="submit_order" {{!Auth::check()?"disabled":''}}>Finish Order</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>


                </div>
              </form>
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
                            <span>{{$item->amount}}g</span>
                          </div>
                          <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                            @if ($item->Product->sale>0)
                            @php
                              $subtotal += ($item->Product->price * (1-$item->Product->sale/100))*($item->amount/1000);
                            @endphp
                                <span class="fw-bold">${{$item->Product->price * (1-$item->Product->sale/100)}}/kg</span>
                                <span class="text-decoration-line-through ms-2">{{$item->Product->price}}</span>
                            @else
                            @php
                              $subtotal += $item->Product->price*($item->amount/1000);
                            @endphp
                                <span class="fw-bold">${{$item->Product->price}}/1kg</span>
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
                                <span class="fw-bold">${{$item['per_price'] * (1-$item['sale']/100)}}/kg</span>
                                <span class="text-decoration-line-through ms-2">{{$item['per_price']}}</span>
                            @else
                            @php
                              $subtotal += $item['per_price']*($item['amount']/1000);
                            @endphp
                                <span class="fw-bold">${{$item['per_price']}}/kg</span>
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
                        ${{$subtotal}}
                      </div>

                    </div>
                    <div class="d-flex align-items-center justify-content-between  ">
                      <div>
                        Service Fee <i class="feather-icon icon-info text-muted" data-bs-toggle="tooltip"
                          title="Shipment Fee"></i>
                      </div>
                      <div class="fw-bold" id="shippment_fee">
                        $2.00
                      </div>
                    </div>
                    @if (Session::has('coupon'))
                    <div class="d-flex align-items-center justify-content-between  ">
                      <div>
                        Coupon {{$coupon->title}}<i class="feather-icon icon-info text-muted" data-bs-toggle="tooltip" title="Coupon"></i>
                      </div>
                      <div class="fw-bold" >
                        @if ($coupon->freeship)
                        <span class="text-danger"> - ${{number_format($coupon->discount,2,'.',' ')}}</span>
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
                          $subtotal +=2;
                          if(Session::has('coupon') && $coupon->freeship){
                            $subtotal -= $coupon->discount;
                          }else if(Session::has('coupon')){
                            $subtotal *=(1- $coupon->discount/100);
                          }
                      @endphp
                      <div id="total">
                        ${{$subtotal }}
                      </div>
                    </div>
                  </li>
                </ul>

              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
  <!-- Modal -->
  <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <!-- modal body -->
        <div class="modal-body p-6">
            <div class="d-flex justify-content-between mb-5">
              <!-- heading -->
              <div>
                <h5 class="h6 mb-1" id="addAddressModalLabel">New Shipping Address</h5>
                <p class="small mb-0">Add new shipping address for your order delivery.</p>
              </div>
              <div>
                <!-- button -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            </div>
            
            <div class="row g-3">
              <!-- col -->
              <div class="col-12">
                <input type="text" class="form-control" name="nameReciever" placeholder="Reciever name"  required="">
              </div>
              <div class="col-6">
                <input type="text" class="form-control" name="phoneReciever" placeholder="Phone number"  required="">
              </div>
              <div class="col-6">
                <input type="text" class="form-control" name="emailReciever" placeholder="Email">
              </div>
              <div class="col-12">
                <input type="text" class="form-control" name="addressReciever" placeholder="Address">
              </div>
              <div class="col-12">
                <select class="form-select" id="province">
                </select>
              </div>
              <div class="col-12">
                <select class="form-select" id="district" disabled>
                </select>
              </div>
              <div class="col-12">
                <select class="form-select" id="ward" disabled>
                </select>
              </div>
              <div class="col-12 text-end">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="button" id="sendAddress" disabled >Save Address</button>
              </div>
            </div>
        </div>

      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
      $(document).ready(function(){
            const host = "https://vapi.vnappmob.com";
            const getProvince = host+"/api/province/";
            $.getJSON(getProvince,function(data){
                $('#province').append("<option selected>--Choose 1 province--</option>");
                $.each(data.results,function(key,value){
                    $('#province').append(`<option value='${value.province_id}'>${value.province_name}</option>`);
                });
            });
            $('#province').change(function async(e){
                e.preventDefault();
                let getDistric = host+"/api/province/district/"+$(this).val();
                $('#district').removeAttr('disabled');
                let str = "<option selected>--Choose 1 district--</option>";
                $.getJSON(getDistric,function(data){
                    $.each(data.results,function(key,value){
                        str+=`<option value=${value.district_id}>${value.district_name}</option>`;
                    })
                    $('#district').html(str);
                });
            });
            $('#district').change(function(e){
                e.preventDefault();
                $('#ward').removeAttr('disabled');
                $('#province option:selected').val($('#province option:selected').text());
                let str = '<option selected>--Choose 1 ward--</option>';
                let getWard = host+"/api/province/ward/"+$(this).val();
                $.getJSON(getWard,function(data){
                    $.each(data.results,function(key,value){
                        str+=`<option value=${value.ward_id}>${value.ward_name}</option>`;
                    });
                    $('#ward').html(str);
                });
            });
            $('#ward').change(function(e){
                e.preventDefault();
                $('#district option:selected').val($('#district option:selected').text());
                $('#ward option:selected').val($('#ward option:selected').text());
                if($('input[name="nameReciever"]').val().trim().length > 0 && $('input[name="emailReciever"]').val().trim().length >0 && $('input[name="phoneReciever"]').val().trim().length>0 && $('#ward').val()){
                      $('#submit_order').removeAttr('disabled');
                }else{
                    $("#submit_order").attr('disabled','disabled');
                };
            })
            
            let valiPhone = /^[0-9]{9,11}$/;
            let valiEmail = /^[a-z0-9](\.?[a-z0-9]){5,}@gmail\.com$/;
            $('input[name=phoneReciever]').focusout(function(e){
                e.preventDefault();
                if(!valiPhone.test($(this).val())){
                    $('#valiPhone').text("Invail Phone. Try again");
                    $('#next').attr('disabled','disabled');      
                    $(this).addClass('is-invalid');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#valiPhone').text('');
                }
            });
            $("input[name='nameReciever']").focusout(function(e){
                e.preventDefault();
                if($(this).val().trim().length==0){
                    $('#valiName').text("Please add name for order");
                    $('#next').attr('disabled','disabled');      
                    $(this).addClass('is-invalid');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#valiName').text('');
                }
            });
            $('input[name=emailReciever]').focusout(function(e){
                e.preventDefault();
                if(!valiEmail.test($(this).val())){
                    $('#valiEmail').text("Invaild Email. Try again");
                    $('#next').attr('disabled','disabled');
                    $(this).addClass('is-invalid');      
                }else{
                    $(this).removeClass('is-invalid');
                    $('#valiEmail').text('');
                };
            });
            $('input[name="nameReciever"],input[name="phoneReciever"],input[name="emailReciever"]').on('blur', function(e) {
                e.preventDefault();
                if($('input[name="nameReciever"]').val().trim().length > 0 && $('input[name="emailReciever"]').val().trim().length >0 && $('input[name="phoneReciever"]').val().trim().length>0 ){
                    $("#sendAddress").removeAttr('disabled');
                    console.log($('#ward').val());
                    if($('#ward').val()){
                      $('#submit_order').removeAttr('disabled');
                    }
                }else{
                    $("#sendAddress").attr('disabled','disabled');
                    $("#submit_order").attr('disabled','disabled');
                };
            });
            $('#sendAddress').click(function(){
              $.ajax({
                method: "POST",
                headers: {'X-CSRF-TOKEN':  '{{csrf_token()}}' },
                url: window.location.origin+'/public/index.php/ajax/add_address',
                data: {
                  'name':$('input[name=nameReciever]').val(),
                  'email':$('input[name=emailReciever]').val(),
                  'phone':$('input[name=phoneReciever]').val(),
                  'address':$('input[name=addressReciever]').val()+ ", " + $('#ward option:selected').val()+', '+$('#district option:selected').val()+", "+$('#province option:selected').val(),
                  // 'saveAddress': $('input[name=saveAddress]').val(),
                },
                success: function (data) {
                  $("#listAddress").html(data);
                  $('.remove_add').click(function(){
                    $.get(window.location.origin+"/public/index.php/ajax/remove_address/"+$(this).data('idadd'),function(data){
                      $("#listAddress").html(data);
                  });
                  })
                }
              });
            });
            $('.remove_add').click(function(){
              $.get(window.location.origin+"/public/index.php/ajax/remove_address/"+$(this).data('idadd'),function(data){
                $("#listAddress").html(data);
              });
            })
        })
    </script>
@endsection
