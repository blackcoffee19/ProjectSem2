<nav class="navbar navbar-expand-lg navbar-glass">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="d-flex align-items-center">
                <a class="text-inherit d-block d-xl-none me-4" data-bs-toggle="offcanvas" href="#offcanvasExample"
                    role="button" aria-controls="offcanvasExample">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                        class="bi bi-text-indent-right" viewBox="0 0 16 16">
                        <path
                            d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm10.646 2.146a.5.5 0 0 1 .708.708L11.707 8l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zM2 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </a>

                <form role="search">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                </form>
            </div>
            <div>
                <ul class="list-unstyled d-flex align-items-center mb-0 ms-5 ms-lg-0">
                    <li class="dropdown">
                        <a class="position-relative btn-icon btn-ghost-secondary btn rounded-circle" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-regular fa-bell"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-2 ms-n2">
                                {{isset($notificates)?count($notificates):0}}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg p-0 border-0">
                            <div class="border-bottom p-5 d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">Notifications</h5>
                                    <p class="mb-0 small">You have {{isset($notificates)?count($notificates):0}} unread messages</p>
                                </div>
                                <a href="#!" class="text-muted">
                                    <a href="#" class="btn btn-ghost-secondary btn-icon rounded-circle"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        data-bs-title="Mark all as read">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            fill="currentColor" class="bi bi-check2-all text-success"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z" />
                                            <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z" />
                                        </svg>
                                    </a>
                                </a>
                            </div>
                            <div data-simplebar style="height: 250px">
                                <!-- List group -->
                                <ul class="list-group list-group-flush notification-list-scroll fs-6">
                                    <!-- List group item -->
                                    @foreach ($notificates as $noti)
                                    <li class="list-group-item px-5 py-4 list-group-item-action active">
                                        <a href="javascript:void(0)" class="text-muted manager_notificate" data-bs-toggle="modal" data-bs-target="#viewModalOrder2" data-order="{{$noti->id_news}}">
                                            <div class="d-flex">
                                                <img src="{{ asset('images/avatar/'.$noti->image) }}" alt="" class="avatar avatar-md rounded-circle" />
                                                <div class="ms-4">
                                                    <p class="mb-1">
                                                        <span class="text-dark">{{$noti->title}}</span>
                                                    </p>
                                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-clock text-muted" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                            <path
                                                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                        </svg><small class="ms-2">
                                                            @php
                                                            $date_new = $noti->created_at;
                                                            $date_cur =  date('Y-m-d H:i:s');
                                                            $difference = strtotime($date_cur) - strtotime($date_new);
                                                            $days= $difference/(60*60*24);
                                                            if($days>30){
                                                                if(($days /30)%12 >1){
                                                                    echo floor(($days /30)%12 )." years";
                                                                }else{
                                                                    echo floor($days /30) .' months';
                                                                }
                                                            }else if($days >1){
                                                                echo floor($days). " days";
                                                            }else{
                                                                echo floor($difference/(60*60)). " hours";
                                                            }
                                                        @endphp            
                                                    </small></span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>   
                                    @endforeach
                                </ul>
                            </div>
                            <div class="border-top px-5 py-4 text-center">
                                <a href="#!" class=" "> View All </a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown ms-4">
                        <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (Auth::user()->avatar)
                                <img src="{{ asset('images/avatar/' . Auth::user()->avatar) }}" width="50"
                                    class="img-fluid rounded-circle">
                            @else
                                <img src="{{ asset('images/avatar/user.png') }}" width="50"
                                    class="img-fluid rounded-circle">
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-end p-0">
                            <div class="lh-1 px-5 py-4 border-bottom">
                                <h5 class="mb-1 h6">{{ Auth::user()->name }}</h5>
                                <small>{{ Auth::user()->email }}</small>
                            </div>

                            <ul class="list-unstyled px-2 py-3">
                                <li>
                                    <a class="dropdown-item" href="#!"> Home </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!"> Profile </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#!"> Settings </a>
                                </li>
                            </ul>
                            <div class="border-top px-5 py-3">
                                <a href="{{ route('signout') }}">Log Out</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="modal fade" id="viewModalOrder2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable" style="margin: 20px 100px 20px 300px ">
      <div class="modal-content ">
        <form action="{{route('remove_notificate')}}" method="POST">
          @csrf
        <div class="modal-body p-8" >
          <div class="position-absolute top-0 end-0 me-3 mt-3">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
          </div>
          <div class="row">
            <div class="col-6 col-md-4 col-lg-6 ">
              <table class="table table-responsive">
                <thead>
                  <tr>
                    <th rowspan="2" >No</th>
                    <th rowspan="2">Item</th>
                    <th colspan="2"class="text-center">Price</th>
                    <th  rowspan="2" >Amount</th>
                  </tr>
                  <tr>
                    <th>Price (1kg)</th>
                    <th>Sale</th>
                  </tr>
                </thead>
                <tbody id="listCart2">
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2">Item Subtotal</td>
                    <td colspan="3" class="text-center" id="item_subtotal2"></td>
                  </tr>
                  <tr>
                    <td colspan="2">Shipping Fee</td>
                    <td colspan="3" class="text-center" id="shipment_fee_modal2"></td>
                  </tr>
                  <tr>
                    <td colspan="2">Discount</td>
                    <td colspan="3" class="text-center" id="discount2"></td>
                  </tr>
                  <tr>
                    <td colspan="2">Total</td>
                    <td class="3" class="text-center h5" id="total_order2"></td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="col-5 col-md-6 col-lg-5 mx-auto d-flex flex-column align-items-end h-100 ">
              <div>
                  <p>Reciever: <span id="receiver2"></span></p>
                  <p>Address: <span id="address2"></span></p>
                  <p>Phone: <span id="phone2"></span></p>
                  <p>Email: <span id="email_order2"></span></p>
                  <p>Instruction: <small id="instruction2"></small></p>
                  <p>Payment Method: <span id="payment_method2"></span></p>
                  <p>Coupon: <span id="coupon_title2"></span></p>
                  <input type="hidden" name="id_notificate">
                  <p class="col-form-label col-4">Status: <span id="status_order2" class="fs-5 fw-bold"></span></p>
                </div>
                <div class="me-3 mt-auto">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-warning" id="save_order" >Close and Remove Notifications</button>
                </div>
            </div>
          </div>
        </div>
        </form> 
      </div>
    </div>
  </div>
