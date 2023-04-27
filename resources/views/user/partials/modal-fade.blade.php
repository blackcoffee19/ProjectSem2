<div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body p-8">
        <div class="position-absolute top-0 end-0 me-3 mt-3">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="slide_wrapper">
              <div class="slider_modalproduct product" id="productModal" style="height: 500px">
              </div>
            </div>
            <div class="product-tools">
              <div class="thumbnails slider_modalnav row g-3" id="productModalThumbnails">                  
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="ps-lg-8 mt-6 mt-lg-0">
              <p class="mb-4 d-block text-primary text-uppercase typeModal"></p>
              <a id="moveProductDetail">
                <h2 class="mb-1 h1 text-capitalize" id="productNameModal"></h2>
              </a>
              <div class="mb-4 text-warning" id="ratingModal">
                <a href="#" class="ms-2" id="soldModal"></a>
              </div>
              <h5 class="text-danger" id="priceAFSModal"></h5>
              <div class="hasSale">
                <span class="text-decoration-line-through text-muted" id="priceModal"></span>
                <span><small class="fs-6 ms-2 text-danger" id="saleModal"></small></span>
              </div>
              <hr class="my-6">
              <div class="mb-4">
                <button type="button" class="btn btn-outline-secondary">
                  Left: <span id="quantityModal"></span>grams
                </button> 
              </div>
              <form action="{{route('products-details')}}" method="post" class="row">
                @csrf
                <input type="hidden" name="id_pro">
                <input type="hidden" name="max_quan" >
              <div>
                <div class="input-group input-spinner ">
                  <button type="button" class="btn btn-outline-secondary btn_minus" style="border-radius: 10px 0 0 10px;"  data-field="quantity" >
                    <i class="bi bi-dash-lg"></i>
                  </button>
                  <input type="text" name="quan" class="border border-secondary text-center pt-1 fs-4 text-secondary" style="width: 50px;" value="100"/>
                  <button type="button" class="btn btn-outline-secondary btn_plus" style="border-radius: 0 10px 10px 0;" >
                    <i class="bi bi-plus-lg"></i>
                  </button>
                  <p class="ms-5 fw-bold align-self-end mb-1">g</p>
                </div>
              </div>
              <div class="mt-3 row justify-content-start g-2 align-items-center">

                <div class="col-lg-4 col-md-5 col-6 d-grid">
                  <button type="submit" class="btn btn-primary">
                    <i class="feather-icon icon-shopping-bag me-2"></i>Add to cart
                  </button>
                </div>
                <div class="col-md-4 col-5">
                  <a class="btn btn-light compare_product" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare"  data-bs-product="">
                    <i class="bi bi-arrow-left-right"></i>
                  </a>
                  <a class="btn btn-light {{Auth::check()? 'addFav':''}}" id="modal_Fav"
                  {{!Auth::check() ?'data-bs-toggle=modal data-bs-target=#userModal href=#!': "data-bs-toggle=tooltip data-bs-html=true title=Wishlist data-bs-idproduct="}}></a>
                </div>
              </div>
              </form>
              <hr class="my-6">
              <div>
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td>Product Code:</td>
                      <td id="idModal">FBB00255</td>
                    </tr>
                    <tr>
                      <td>Availability:</td>
                      <td>In Stock</td>
                    </tr>
                    <tr>
                      <td>Type:</td>
                      <td class="typeModal">Fruits</td>
                    </tr>
                    <tr>
                      <td>Shipping:</td>
                      <td>
                        <small>01 day shipping.<span class="text-muted">( Free pickup today)</span></small>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
  <div role="alert"  id="toastAdd" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='1500'>
      <div class="toast-body" style=" padding:10px">
        <div class="row">
          <div class="col-2 mb-2 mx-auto">
            <i class="bi bi-bag-check" style="color: #2ec27e; font-size: 2.3rem"></i>
          </div>
          <h4 class="text-center text-uppercase" style="font-family: 'Quicksand', sans-serif;">Add to cart successully</h4>
        </div>
      </div>
  </div>
</div>

  <div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
    <div role="alert"  id="toastCompare" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='1500'>
        <div class="toast-body" style="padding:10px">
          <div class="row">
            <div class="col-2 mb-2 mx-auto">
              <i class="bi bi-lightbulb " style="color: #f5c211; font-size: 1.3rem"></i>
            </div>
            <h4 class="text-center text-uppercase" style="font-family: 'Quicksand', sans-serif;" id="messCompare"></h4>
          </div>
        </div>
    </div>
  </div>  
<div data-bs-toggle="tooltip"  title="Show Compare" class="position-fixed rounded-circle bottom-0 start-0 p-3 animate__animated animate__heartBeat animate__infinite {{!Session::has('compare')?'d-none':''}}" id="btn-compare">
  <button role="button" class="btn btn-primary shadow" id="show_compare" data-bs-toggle="modal" data-bs-target="#compareProduct">
    <i class="bi bi-arrow-left-right"></i>
  </button>
</div>
<div class="modal fade" id="compareProduct" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header">
        <a class="btn btn-outline-danger" href="{{route('removeCmp')}}">
          <i class="bi bi-x-circle-fill text-danger"></i>
          Clean
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-8">
        <div class="row">
          <table class="table table-hover">
            <tbody id="compare_detail">
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- <div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
  <div role="alert"  id="toastAdd" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='1500'>
      <div class="toast-body" style="height: 100px; padding:30px 0">
        <div class="row">
          <div class="col-2 mb-3 mx-auto">
            <i class="fa-solid fa-cart-circle-check" style="color: #2ec27e; font-size: 2.3rem"></i>
          </div>
          <h4 class="text-center text-uppercase" style="font-family: 'Quicksand', sans-serif;" >Add pet to cart successully</h4>
        </div>
      </div>
  </div>
</div> --}}
<div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
  <div role="alert"  id="toastFeedback" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='1500'>
      <div class="toast-body" style=" padding:10px">
        <div class="row">
          <div class="col-2 mb-2 mx-auto">
            <i class="fa-regular fa-ballot-check" style="color: #2ec27e; font-size: 2.3rem"></i>
          </div>
          <h4 class="text-center text-uppercase" style="font-family: 'Quicksand', sans-serif;">{{Session::has('feedback_mess')?Session::get('feedback_mess'):''}}</h4>
        </div>
      </div>
  </div>
</div>
<div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
  <div role="alert"  id="toastOrder" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='2500'>
      <div class="toast-body" style="height: 150px; padding:30px 20px">
        <div class="row">
          <div class="col-2 mb-3 mx-auto">
            <i class="bi bi-box2-heart"  style="color: #2ec27e; font-size: 2.3rem"></i>
          </div>
          <h5 class="text-center text-capitalize" style="font-family: 'Quicksand', sans-serif;" id="order_message">Order successully!</h5>
        </div>
      </div>
  </div>
</div>
<div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
  <div role="alert"  id="toastWarning" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='2500'>
      <div class="toast-body" style="height: 150px; padding:30px 20px">
        <div class="row">
          <div class="col-2 mb-3 mx-auto">
            <i class="bi bi-exclamation-triangle"  style="color: #c2732e; font-size: 2.3rem"></i>
          </div>
          <h5 class="text-center text-capitalize" style="font-family: 'Quicksand', sans-serif;" >Sorry Manager cannot use this feature.<br>Change to normal account to do this</h5>
        </div>
      </div>
  </div>
</div>
<div class="modal fade" id="editOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
    <div class="modal-content" style="overflow: scroll">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Edit Order</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('user_editorder')}}" method="post">
          @csrf
          <div class="modal-body">
              <div class="row">
                  <div class="col-12 row mt-3">
                      <input type="hidden" name="id_orderedit" id="id_orderedit">
                      <div class="mb-3 row">
                          <label class="col-lg-4 col-md-3 col-form-label" for="edit_cusname">Reciver Name</label>
                          <div class="col-lg-8 col-md-9">
                              <input type="text" name="edit_cusname" id="edit_cusname" class="form-control" required>
                          </div>
                      </div>
                      <div class="mb-3 row">
                          <label class=" col-lg-4 col-md-3 col-form-label" for="edit_cusaddr">Address</label>
                          <div class="col-lg-8 col-md-9">
                              <input type="text" name="edit_cusaddr" id="edit_cusaddr" class="form-control" required>
                          </div>
                      </div>
                      <div class="mb-3 row">
                          <label class="col-lg-4 col-md-3 col-form-label" for="edit_cusphone">Phone</label>
                          <div class="col-lg-8 col-md-9">
                              <input type="text" name="edit_cusphone" id="edit_cusphone" class="form-control" required>
                          </div>
                      </div>
                      <div class="mb-3 row">
                          <label class=" col-lg-4 col-md-3 col-form-label" for="edit_cusemail">Email</label>
                          <div class="col-lg-8 col-md-9">
                              <input type="email" name="edit_email" id="edit_cusemail" class="form-control" required>
                          </div>
                      </div>
                      <div class="mb-3 row">
                          <label for="edit_coupon" class="col-form-label col-lg-4 col-md-3">Coupon</label>
                          <div class="col-lg-8 col-md-9">
                              <p id="name_coupon"></p>
                              <input type="text" class="form-control" name="edit_coupon" id="edit_coupon" disabled >
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" id="submit_order" class="btn btn-primary" disabled>Change</button>
          </div>
      </form>
    </div>
  </div>
</div>
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
          <form action="{{route('post_address')}}" method="post">
            @csrf
            <div class="row g-3">
              <input type="hidden" name="shipment_fee" id="shipment_fee" value="2">
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
                <select class="form-select" id="province" name="province">
                </select>
              </div>
              <div class="col-12">
                <select class="form-select" id="district" name="district" disabled>
                </select>
              </div>
              <div class="col-12">
                <select class="form-select" id="ward" name="ward" disabled>
                </select>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="saveAddress" id="saveAddress"> 
                  <label class="form-check-label" for="saveAddress">
                    Set as Default
                  </label>
                </div>
              </div>
              <div class="col-12 text-end">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit" id="sendAddress" disabled >Save Address</button>
              </div>
            </div>
          </form>
      </div>

    </div>
  </div>
</div>
<div class="modal fade" id="viewModalOrder" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content ">
      <form action="{{route('confirm_order')}}" method="POST">
        @csrf
      <div class="modal-body p-8" >
        <div class="position-absolute top-0 end-0 me-3 mt-3">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </div>
        <div class="row">
          <div class="col-6 col-md-4 col-lg-6 ">
            <table class="table">
              <thead>
                <tr>
                  <th rowspan="2" >No</th>
                  <th rowspan="2" >&nbsp;</th>
                  <th rowspan="2">Item</th>
                  <th colspan="2"class="text-center">Price</th>
                  <th  rowspan="2" >Amount</th>
                </tr>
                <tr>
                  <th>Price (1kg)</th>
                  <th>Sale</th>
                </tr>
              </thead>
              <tbody id="listCart">
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2">Shipping Fee</td>
                  <td colspan="3" class="text-center" id="shipment_fee_modal"></td>
                </tr>
                <tr>
                  <td colspan="2">Discount</td>
                  <td colspan="3" class="text-center" id="discount"></td>
                </tr>
                <tr>
                  <td colspan="2">Total</td>
                  <td class="3" class="text-center h5" id="total_order"></td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="col-5 col-md-6 col-lg-5 mx-auto">
            <p>Reciever: <span id="receiver"></span></p>
            <p>Address: <span id="address"></span></p>
            <p>Phone: <span id="phone"></span></p>
            <p>Email: <span id="email_order"></span></p>
            <p>Instruction: <small id="instruction"></small></p>
            <p>Payment Method: <span id="payment_method"></span></p>
            <p>Coupon: <span id="coupon_title"></span></p>
            <input type="hidden" name="id_order">
            <div class="row">
              <label for="status_order" class="col-form-label col-4">Status</label>
              <div class="col-8">
                <select name="status_order" id="status_order" class="form-select ">
                  <option value="unconfirmed">Unconfirmed</option>
                  <option value="confirmed">Confirm</option>
                  <option value="delivery">Delivery</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class=" modal-footer me-3 mt-3">
        <button type="submit" class="btn btn-warning" id="save_order" disabled>Save Change</button>
      </div>
      </form> 
    </div>
  </div>
</div>
@if (isset($warning_setting))
<div class="toast align-items-center border-0 start-50 translate-middle-x position-sticky show" role="alert" aria-live="assertive" aria-atomic="true" style="bottom: 15px;width: fit-content;" id="warning_setting">
  <div class="d-flex">
    <div class="toast-body alert alert-warning m-0">
      <a href="{{route($warning_setting->link)}}" class="h5 mx-4"><i class="bi bi-exclamation-triangle fs-4 me-4"></i>{{$warning_setting->title}}</a>
    </div>
  </div>
</div>
@endif
@if (isset($check_orders)&&count($check_orders)>0)
<div data-bs-toggle="tooltip"  title="Show Orders" class="position-sticky rounded-circle p-3 animate__animated animate__heartBeat animate__infinite bottom-0 start-0" id="show_acceptorder">
  <button role="button" class="btn btn-warning shadow rounded" id="show_compare" data-bs-toggle="modal" data-bs-target="#checkOrder0" style="margin-left: 100px">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
  </button>
</div>
  @for ($i = 0; $i < count($check_orders); $i++)
    <div class="modal fade " id="checkOrder{{$i}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="checkOrderLabel{{$i}}" aria-hidden="true">
      <div class="modal-dialog modal-xl  modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="checkOrderLabel{{$i}}">Is this your orders?</h1>
            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
          </div>
          <div class="modal-body row px-5 pb-2">
            <p>We found this order used your assign phone number to order. Tell us is that your order?</p>
            <h5>Order date: {{date_format($check_orders[$i]->created_at,'F j, Y')}}</h5>
            <table class="table col-12">
              <thead>
                <tr>
                  <th rowspan="2"></th>
                  <th colspan="2" class="text-center">Item</th>
                  <th rowspan="2">Price</th>
                  <th rowspan="2">Sale</th>
                  <th rowspan="2">Amount</th>
                </tr>
                <tr>
                  <th>Image</th>
                  <th>Name</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $num = 1;
                    $total = 0;
                @endphp
                @foreach ($check_orders[$i]->Cart as $cart)
                    <tr>
                      <td>{{$num}}</td>
                      <td><img src="{{asset('images/products/'.$cart->Product->Library[0]->image)}}"  class='icon-shape icon-xl'  alt="{{$cart->Product->name}}"></td>
                      <td>{{$cart->Product->name}}</td>
                      <td>{{number_format($cart->price,0,'',' ')}} VND/kg</td>
                      <td>{{$cart->sale}}%</td>
                      <td>{{$cart->amount}} grams</td>
                    </tr>
                    @php
                        $num++;
                        $total += $cart->price*(1 - $cart->sale/100)*($cart->amount/1000);
                    @endphp
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2">Shipment Fee</td>
                  <td colspan="3">{{number_format($check_orders[$i]->shipping_fee,0,'',' ')}} VND</td>
                </tr>
                <tr>
                  <td colspan="2">Total</td>
                  <td colspan="3">{{number_format($total,0,'',' ')}}VND</td>
                </tr>
              </tfoot>
            </table>
            <div class="col-5 mx-auto">
              <p>Reciever: {{$check_orders[$i]->receiver}}</p>
              <p>Address: {{$check_orders[$i]->address}}</p>
              <p>Phone: {{$check_orders[$i]->phone}}</p>
              <p>Email: {{$check_orders[$i]->email}}</p>
            </div>
            <div class="col-5 mx-auto">
              <p>Instruction: {{$check_orders[$i]->instruction}}</p>
              <p>Payment Method: {{$check_orders[$i]->method}}</p>
              <h4>Status: <span class="text-danger fs-4">{{$check_orders[$i]->status}}</span></h4>
            </div>
          </div>
          <div class="modal-footer">
            @if (count($check_orders)>1 && $i != count($check_orders)-1)
            <button class="btn btn-outline-secondary denied_order"data-order={{$check_orders[$i]->id_order}} data-bs-target="#checkOrder{{$i+1}}" data-bs-toggle="modal" >Not mine and Next</button>
            <button class="btn btn-primary accept_order" data-bs-target="#checkOrder{{$i+1}}" data-bs-toggle="modal" data-order={{$check_orders[$i]->id_order}}>Accept and Next</button>
            @endif
            @if (count($check_orders)>1 && $i == count($check_orders)-1)
            <button class="btn btn-outline-secondary denied_order" data-order={{$check_orders[$i]->id_order}} data-bs-dismiss="modal">Not mine</button>
            <button class="btn btn-primary accept_order" data-bs-dismiss="modal" data-order={{$check_orders[$i]->id_order}}>Accept</button>
            @endif
            @if (count($check_orders) == 1)
            <button class="btn btn-outline-secondary denied_order" data-order={{$check_orders[$i]->id_order}} data-bs-dismiss="modal" >Not mine</button>
            <button class="btn btn-primary accept_order" data-order={{$check_orders[$i]->id_order}} data-bs-dismiss="modal" >Accept</button>
            @endif
          </div>
        </div>
      </div>
    </div>
  @endfor
@endif