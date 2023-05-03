<div class="border-bottom ">
    <div class="bg-light py-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 text-center text-md-start"><span> Super Value Deals - Save more with
                        coupons</span>
                </div>
                <div class="col-6 text-end d-none d-md-block">
                    <i class="fa-brands fa-google"></i>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="py-4 pt-lg-3 pb-lg-0">
        <div class="container">
            <div class="row w-100 align-items-center gx-lg-2 gx-0">
                <div class="col-xxl-2 col-lg-3">
                    <a class="navbar-brand d-none d-lg-block" href="{{ route('index') }}">
                        <img src="{{ asset('images/logo/freshcart-logo.svg') }}" alt="eCommerce HTML Template">

                    </a>
                    <div class="d-flex justify-content-between w-100 d-lg-none">
                        <a class="navbar-brand" href="{{ route('index') }}">
                            <img src="{{ asset('images/logo/freshcart-logo.svg') }}" alt="eCommerce HTML Template">

                        </a>

                        <div class="d-flex align-items-center dropdown dropdown-fullwidth lh-1">
                            <li class="dropdown">
                                <div class="dropdown-menu dropdown-menu-end  ">
                                    
                                </div>
                            </li>

                            <div class="list-inline me-4">
                                @if (Auth::check())
                                    <div class="list-inline-item me-3">
                                        <a href="#!" class=" text-muted dropdown-toggle user_dropdown position-relative" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20"
                                                height="20" fill="currentColor">
                                                <path
                                                    d="M224 0c-17.7 0-32 14.3-32 32V49.9C119.5 61.4 64 124.2 64 200v33.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V200c0-75.8-55.5-138.6-128-150.1V32c0-17.7-14.3-32-32-32zm0 96h8c57.4 0 104 46.6 104 104v33.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V200c0-57.4 46.6-104 104-104h8zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                                            </svg>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                                <span class="fw-bold countFav">
                                                    {{ isset($news) ? count($news) : 0 }}
                                                </span>
                                            </span>
                                        </a>
                                        <div class=" dropdown-menu dropdown-menu-end dropdown-menu-lg shadow p-0 border-0">
                                            <div class="border-bottom p-5 d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5 class="mb-1">Notifications</h5>
                                                    <p class="mb-0 small">You have {{isset($news)? count($news):0}} unread notificates</p>
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
                                                    @if (isset($news))
                                                        @foreach ($news as $new)
                                                            <li class="list-group-item px-5 py-4 list-group-item-action">
                                                                @if (Auth::check() && Auth::user()->admin == "0")
                                                                <a href="{{ route($new->link, $new->attr) }}" class="text-muted">
                                                                    <div class="d-flex">
                                                                        <img src="{{ asset('images/products/'.$new->image) }}" alt="" class="avatar avatar-md rounded-circle" width="40" height="40"/>
                                                                        <div class="ms-4">
                                                                            <p class="mb-1 text-dark">
                                                                                {{$new->title}}
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
                                                                                    $date_new = $new->created_at;
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
                                                                                    // $time= $date_cur->diffInDays($date_new)>1 ? $date_cur->diffInDays($date_new)." days ago": (($date_cur->diffInDays($date_new) == 0)? ($date_cur->diffInHours($date_new)> 0? $date_cur->diffInHours($date_new).' hours before': $date_cur->diffInMinutes($date_new). " minutes ago"): $date_cur->diffInDays($date_new)." day ago");
                                                                                @endphp    
                                                                                </small></span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                @else
                                                                <a href="javascript:void(0)" class="text-muted manager_notificate" data-bs-toggle="modal" data-bs-target="#viewModalOrder2" data-order="{{$new->id_news}}">
                                                                    <div class="d-flex">
                                                                        <img src="{{ asset('images/avatar/'.$new->image) }}" alt="" class="avatar avatar-md rounded-circle" width="40" height="40"/>
                                                                        <div class="ms-4">
                                                                            <p class="mb-1 text-dark">
                                                                                {{$new->title}}
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
                                                                                    $date_new = $new->created_at;
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
                                                                                </small>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>                                                           
                                                                @endif
                                                                {{-- <a href="{{ route($new->link, $new->attr) }}" class="text-muted">
                                                                    <div class="d-flex">
                                                                        <div class=" rounded-circle border">
                                                                            @switch($new->link)
                                                                                @case('feedback')
                                                                                    <i class="fa-solid fa-hand-holding-box fa-2xl" style="color: #26a269;"></i>
                                                                                    @break
                                                                                @case("products-details")
                                                                                <i class="fa-regular fa-crate-apple fa-2xl" style="color: #e66100;"></i>
                                                                                    @break
                                                                                @default
                                                                            @endswitch
                                                                        </div>
                                                                        <div class="ms-4">
                                                                            <p class="mb-1 text-dark">
                                                                                {{$new->title}}
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
                                                                                    $date_new = strtotime($new->created_at);
                                                                                    $date_cur =  date('Y-m-d H:i:s');
                                                                                    $time = strtotime($date_cur) - strtotime($date_new);
                                                                                    echo $time. " days";
                                                                                @endphp    
                                                                                </small></span>
                                                                        </div>
                                                                    </div>
                                                                </a> --}}
                                                            </li>
                                                        @endforeach
                                                    @else
                                                    <li class="list-group-item px-5 py-4 list-group-item-action">
                                                        <h4 class="text-muted text-center">There are no notificates</h4>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="border-top px-5 py-4 text-center">
                                                <a href="#!" class=" "> View All </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-inline-item me-3">
                                        <a href="{{ route('wishlist') }}" class="text-muted position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-heart">
                                                <path
                                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                </path>
                                            </svg>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                                <span class="fw-bold countFav">
                                                    {{ count(Auth::user()->Favourite) }}
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                @endif
                                <div class="list-inline-item dropdown dropdown-fullwidth">
                                    @if (Auth::check())
                                        @if (Auth::user()->avatar)
                                            <img src="{{ asset('images/avatar/' . Auth::user()->avatar) }}"
                                                width="28" height="28" class="img-fluid rounded-circle">
                                        @else
                                            <img src="{{ asset('images/avatar/user.png') }}" width="28"
                                                height="28" class="img-fluid rounded-circle">
                                        @endif
                                        <a href="#!" class="text-muted dropdown-toggle user_dropdown"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class=" dropdown-menu pb-0 ">
                                            <div class="list-group">
                                                <a href="{{ route('accountorder') }}"
                                                    class="list-group-item list-group-item-action"><i
                                                        class="fa-solid fa-truck"></i> Order</a>
                                                <a href="{{ route('accountsetting') }}"
                                                    class="list-group-item list-group-item-action"><i
                                                        class="fa-solid fa-gear"></i> Setting</a>
                                                <a href="{{ route('accountaddress') }}"
                                                    class="list-group-item list-group-item-action"><i
                                                        class="fa-solid fa-location-pin"></i>Address</a>
                                                <a href="{{ route('accountpayment') }}"
                                                    class="list-group-item list-group-item-action"><i
                                                        class="fa-regular fa-credit-card"></i>Payment Method</a>
                                                <a href="{{ route('signout') }}"
                                                    class="list-group-item list-group-item-action"><i
                                                        class="bi bi-box-arrow-in-right"></i> Sign out</a>
                                            </div>
                                        </div>
                                    @else
                                        <a href="#!" class="text-muted" data-bs-toggle="modal"
                                            data-bs-target="#userModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-user">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                                @if (Auth::check() && Auth::user()->admin == '2')
                                    <div>
                                        <a class="text-muted position-relative btn_showcart" href="#offcanvasExample"
                                            role="button" data-bs-target="#offcanvasRight" data-bs-toggle="offcanvas"
                                            aria-controls="offcanvasRight">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                                @if (isset($orders) && count($orders)>0)
                                                    <span class="fw-bold countOrder">{{ count($orders) }}
                                                    </span>
                                                @else 
                                                    <span class="fw-bold countOrder">0</span>
                                                @endif
                                            </span>
                                        </a>
                                    </div>
                                    @else
                                        <div class="list-inline-item">

                                            <a class="text-muted position-relative btn_showcart" href="#offcanvasExample"
                                                role="button" data-bs-target="#offcanvasRight" data-bs-toggle="offcanvas"
                                                aria-controls="offcanvasRight">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-shopping-bag">
                                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                    <line x1="3" y1="6" x2="21" y2="6">
                                                    </line>
                                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                </svg>
                                                <span
                                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                                    @if (Auth::check())
                                                        <span class="fw-bold countCart">
                                                            {{ count(Auth::user()->Cart->where('order_code', '=', null)) }}
                                                        </span>
                                                    @endif
                                                    @if (Session::has('cart'))
                                                        <span class="fw-bold countCart">{{ count(Session::get('cart')) }}
                                                        </span>
                                                    @endif
                                                    @if (!Auth::check() && !Session::has('cart'))
                                                        <span class="fw-bold countCart">0</span>
                                                    @endif
                                                </span>
                                            </a>
                                        </div>
                                        @endif
                            </div>
                            <!-- Button -->
                            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    fill="currentColor" class="bi bi-text-indent-left text-primary"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </button>

                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-5 d-none d-lg-block">
                    <form action="{{Route('product.findByNamePro')}}" method="GET">
                        @csrf
                        <div class="input-group ">
                            @if (isset($name))
                            <input class="form-control rounded" name="name" placeholder="Search for products" value="{{$name}}" >
                                
                            @else
                            <input class="form-control rounded" name="name" placeholder="Search for products" >
                            @endif
                            <span class="input-group-append">
                                <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end"
                                type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65">
                                        </line>
                                    </svg>
                                </button>
                            </span>
                        </div>

                    </form>
                </div>
                <div class="col-md-4 col-xxl-3 mx-auto text-end d-none d-lg-block dropdown dropdown-fullwidth">
                    <div class="d-flex flex-row justify-content-around w-75">
                        @if (Auth::check())
                            {{-- <div class=" me-3">
                                <a href="#!" class="text-muted dropdown-toggle user_dropdown position-relative"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20"
                                        height="20" fill="currentColor">
                                        <path
                                            d="M224 0c-17.7 0-32 14.3-32 32V49.9C119.5 61.4 64 124.2 64 200v33.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V200c0-75.8-55.5-138.6-128-150.1V32c0-17.7-14.3-32-32-32zm0 96h8c57.4 0 104 46.6 104 104v33.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V200c0-57.4 46.6-104 104-104h8zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                                    </svg>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                        <span class="fw-bold countFav">
                                            {{ isset($news) ? count($news) : 0 }}
                                        </span>
                                    </span>
                                </a>
                                <div class=" dropdown-menu shadow">
                                    <div class="list-group">
                                        @if (isset($news))
                                            @foreach ($news as $new)
                                                <a href="{{ route($new->link, $new->attr) }}"
                                                    class="list-group-item list-group-item-action">
                                                    {{ $new->title }}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div> --}}
                            <div class="me-3">
                                <a href="#!" class=" text-muted dropdown-toggle user_dropdown position-relative" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20"
                                        height="20" fill="currentColor">
                                        <path
                                            d="M224 0c-17.7 0-32 14.3-32 32V49.9C119.5 61.4 64 124.2 64 200v33.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V200c0-75.8-55.5-138.6-128-150.1V32c0-17.7-14.3-32-32-32zm0 96h8c57.4 0 104 46.6 104 104v33.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V200c0-57.4 46.6-104 104-104h8zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                                    </svg>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                        <span class="fw-bold countFav">
                                            {{ isset($news) ? count($news) : 0 }}
                                        </span>
                                    </span>
                                </a>
                                <div class=" dropdown-menu dropdown-menu-end dropdown-menu-lg shadow p-0 border-0">
                                    <div class="border-bottom p-5 d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="mb-1">Notifications</h5>
                                            <p class="mb-0 small">You have {{isset($news)? count($news):0}} unread notificates</p>
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
                                            @if (isset($news))
                                                @foreach ($news as $new)
                                                    <li class="list-group-item px-5 py-4 list-group-item-action">
                                                        @if (Auth::check() && Auth::user()->admin == "0")
                                                        <a href="{{ route($new->link, $new->attr) }}" class="text-muted">
                                                            <div class="d-flex">
                                                                <img src="{{ asset('images/products/'.$new->image) }}" alt="" class="avatar avatar-md rounded-circle" width="40" height="40"/>
                                                                <div class="ms-4">
                                                                    <p class="mb-1 text-dark">
                                                                        {{$new->title}}
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
                                                                            $date_new = $new->created_at;
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
                                                                            // $time= $date_cur->diffInDays($date_new)>1 ? $date_cur->diffInDays($date_new)." days ago": (($date_cur->diffInDays($date_new) == 0)? ($date_cur->diffInHours($date_new)> 0? $date_cur->diffInHours($date_new).' hours before': $date_cur->diffInMinutes($date_new). " minutes ago"): $date_cur->diffInDays($date_new)." day ago");
                                                                        @endphp    
                                                                        </small></span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        @else
                                                         <a href="javascript:void(0)" class="text-muted manager_notificate" data-bs-toggle="modal" data-bs-target="#viewModalOrder2" data-order="{{$new->id_news}}">
                                                            <div class="d-flex">
                                                                <img src="{{ asset('images/avatar/'.$new->image) }}" alt="" class="avatar avatar-md rounded-circle" width="40" height="40"/>
                                                                <div class="ms-4">
                                                                    <p class="mb-1 text-dark">
                                                                        {{$new->title}}
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
                                                                            $date_new = $new->created_at;
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
                                                                        </small>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>                                                           
                                                        @endif
                                                    </li>
                                                @endforeach
                                            @else
                                            <li class="list-group-item px-5 py-4 list-group-item-action">
                                                <h4 class="text-muted text-center">There are no notificates</h4>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="me-3">
                                <a href="{{ route('wishlist') }}" class="text-muted position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                        </path>
                                    </svg>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                        <span class="fw-bold countFav">
                                            {{ count(Auth::user()->Favourite) }}
                                        </span>
                                    </span>
                                </a>
                            </div>
                            
                            <div class="list-inline-item ">
                                <a href="#!" class="text-muted dropdown-toggle user_dropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    @if (Auth::user()->avatar)
                                        <img src="{{ asset('images/avatar/' . Auth::user()->avatar) }}"
                                            width="28" height="28" class="img-fluid rounded-circle">
                                    @else
                                        <img src="{{ asset('images/avatar/user.png') }}" width="28"
                                            height="28" class="img-fluid rounded-circle">
                                    @endif

                                    {{ Auth::user()->name }}
                                </a>
                                <div class=" dropdown-menu pb-0 ">
                                    <div class="list-group">
                                        @if (Auth::user()->admin == '1')
                                            <a href="{{ route('dashboard') }}"
                                                class="list-group-item list-group-item-action">Dashboard</a>
                                        @endif
                                        <a href="{{ route('accountorder') }}"
                                            class="list-group-item list-group-item-action"><i
                                                class="fa-solid fa-truck"></i> Order</a>
                                        <a href="{{ route('accountsetting') }}"
                                            class="list-group-item list-group-item-action"><i
                                                class="fa-solid fa-gear"></i> Setting</a>
                                        <a href="{{ route('accountaddress') }}"
                                            class="list-group-item list-group-item-action"><i
                                                class="fa-solid fa-location-pin"></i>Address</a>
                                        <a href="{{ route('accountpayment') }}"
                                            class="list-group-item list-group-item-action"><i
                                                class="fa-regular fa-credit-card"></i>Payment Method</a>
                                        <a href="{{ route('signout') }}"
                                            class="list-group-item list-group-item-action"><i
                                                class="bi bi-box-arrow-in-right"></i> Sign out</a>
                                    </div>
                                </div>
                            </div>
                        @else
                        {{-- {{Route::currentRouteName()}} --}}
                            <div>
                                <a href="#!" class="text-muted" data-bs-toggle="modal"
                                    data-bs-target="#userModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </a>
                            </div>
                        @endif
                        @if (Auth::check() && Auth::user()->admin == '2')
                        <div>
                            <a class="text-muted position-relative btn_showcart" href="#offcanvasExample"
                                role="button" data-bs-target="#offcanvasRight" data-bs-toggle="offcanvas"
                                aria-controls="offcanvasRight">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                    @if (isset($orders) && count($orders)>0)
                                        <span class="fw-bold countOrder">{{ count($orders) }}
                                        </span>
                                    @else 
                                        <span class="fw-bold countOrder">0</span>
                                    @endif
                                </span>
                            </a>
                        </div>
                        @else
                        <div>
                            <a class="text-muted position-relative btn_showcart" href="#offcanvasExample"
                                role="button" data-bs-target="#offcanvasRight" data-bs-toggle="offcanvas"
                                aria-controls="offcanvasRight">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-shopping-bag">
                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                </svg>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                    @if (Auth::check())
                                        <span class="fw-bold countCart">
                                            {{ count(Auth::user()->Cart->where('order_code', '=', null)) }}
                                        </span>
                                    @endif
                                    @if (Session::has('cart'))
                                        <span class="fw-bold countCart">{{ count(Session::get('cart')) }}
                                        </span>
                                    @endif
                                    @if (!Auth::check() && !Session::has('cart'))
                                        <span class="fw-bold countCart">0</span>
                                    @endif
                                </span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-light navbar-default py-0 py-lg-4">
        <div class="container px-0 px-md-3">
            <div class="dropdown me-3 d-none d-lg-block">
                <button class="btn btn-primary px-6 " type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-grid">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg></span> Welcome to website
                </button>
            </div>
            <div class="offcanvas offcanvas-start p-4 p-lg-0" id="navbar-default">
                <div class="d-flex justify-content-between align-items-center mb-2 d-block d-lg-none">
                    <a href="{{ route('index') }}"><img src="{{ asset('images/logo/freshcart-logo.svg') }}"
                            alt="eCommerce HTML Template"></a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="d-none d-lg-block">
                    <ul class="navbar-nav align-items-center ">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ Route('index') }}">
                                Home <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1" style="color:green">
                                    </circle>
                                </svg></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ Route('user.pages.Products.index') }}">
                                Categories <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1" style="color:green">
                                    </circle>
                                </svg></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Account <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1" style="color:green">
                                    </circle>
                                </svg></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('accountorder') }}">Orders</a></li>
                                <li><a class="dropdown-item" href="{{ route('accountsetting') }}">Settings</a></li>
                                <li><a class="dropdown-item" href="{{ route('accountaddress') }}">Address</a></li>
                                <li><a class="dropdown-item" href="{{ route('accountpayment') }}">Payment Method</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('privacy') }}">
                                Privacy Policy <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1" style="color:green">
                                    </circle>
                                </svg></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('user.pages.AboutUs.index')}}">
                                About <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1" style="color:green">
                                    </circle>
                                </svg></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('user.pages.Contact.index')}}">
                                Contact </i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Modal -->

<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Sign In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('signin') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="modal_email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="modal_email"
                            placeholder="Enter Email address" required="">
                    </div>
                    <div class="mb-5">
                        <label for="modal_password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="modal_password"
                            placeholder="Enter Password" required="">
                    </div>
                    <div> Forgot password? <a href="../pages/forgot-password.html">Reset It</a></div>
                    <button type="submit" class="btn btn-primary" id="modal_signin" style="width: 100px" disabled>Sign In</button>
                </form>
            </div>
            <div class="modal-footer border-0 justify-content-center">Don’t have an account? <a
                    href="{{ route('signup') }}"> Sign Up</a>
            </div>
            <a class="h4 fw-normal text-decoration-none text-center shadow p-2 rounded-pill" href="{{route('google-auth')}}" style="vertical-align: middle;font-family: 'Montserrat', sans-serif;">
                <svg xmlns="http://www.w3.org/2000/svg" class="me-1" height="30" viewBox="0 0 24 24" width="30">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/><path d="M1 1h22v22H1z" fill="none"/>
                </svg>
                Sign in with Google
            </a>
        </div>
    </div>
</div>

@if (Auth::check() && Auth::user()->admin == '2')
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <div class="text-start">
            <h5 id="offcanvasRightLabel" class="mb-0 fs-4">New Orders</h5>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <ul class="list-group list-group-flush">
                @if (isset($orders) && count($orders)>0)
                    @foreach ($orders as $order)
                        <li class='list-group-item py-3 ps-0 border-top border-bottom'>
                            <div class='row align-items-center'>
                                <div class='col-1'>
                                    @if ($order->id_user && $order->User->avatar)
                                        <img src="{{asset('images/avatar/'.$order->User->avatar)}}" alt="" width="40" height="40" class="img-fluid rounded-circle">
                                    @else
                                        <img src="{{asset('images/avatar/user.png')}}" alt="" width="40" height="40" class="img-fluid rounded-circle">
                                    @endif
                                </div>
                                <div class='col-2 '>
                                    <span>#{{$order->order_code}}</span><br>
                                    <small class="text-muted">{{date_format($order->created_at,"F j Y, g:i a")}}</small>
                                </div>
                                <div class='col-2'>Items: <p>{{count($order->Cart)}}</p>
                                </div>
                                <div class="col-2">
                                    @php
                                    $sum =0;
                                    foreach ($order->Cart as $cart) {
                                        if($cart->sale > 0){
                                            $sum += $cart->price*(1 - $cart->sale/100)*($cart->amount/1000);
                                        }else{
                                            $sum += $cart->price*($cart->amount/1000);
                                        };
                                    };   
                                    $sum += $order->shipping_fee;
                                    if($order->code_coupon){
                                        if($order->Coupon->discount >= 10){
                                            $sum = $sum*(1 - $order->Coupon->discount/100);
                                        }else{
                                            $sum -= $order->Coupon->discount;
                                        }
                                    }
                                    echo "Total: $".number_format($sum,2,'.',' ');
                                    @endphp
                                </div>
                                <div class="col-2">
                                    @switch($order->status)
                                        @case('confirmed')
                                            <h5 class="badge bg-warning text-capitalize">{{$order->status}}</h5>
                                            @break
                                        @case('unconfirmed')
                                            <h5 class="badge bg-dark text-capitalize">{{$order->status}}</h5>
                                            @break
                                    @endswitch
                                </div>
                                <div class="col-3">
                                    @switch($order->status)
                                        @case('confirmed')
                                            <button type="button" class="btn btn-danger check_order" data-bs-toggle="modal" data-bs-target="#viewModalOrder" data-order="{{$order->id_order}}" >
                                                Delivery          
                                            </button>
                                            @break
                                        @case('unconfirmed')
                                            <button type="button" class="btn btn-primary check_order" data-bs-toggle="modal" data-bs-target="#viewModalOrder" data-order="{{$order->id_order}}" >
                                                Confirm  
                                            </button>
                                            @break
                                        @default        
                                    @endswitch
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                <li class='list-group-item py-3 ps-0 border-top border-bottom'>
                    <h4 class="text-muted text-center text-uppercase">
                        There are no New Order
                    </h4>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>

@else
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <div class="text-start">
            <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <div class="alert alert-danger p-2" role="alert">
                You’ve got FREE delivery. Start <a href="#!" class="alert-link">checkout now!</a>
            </div>
            <ul class="list-group list-group-flush" id="listCartmodal">
            </ul>
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('order') }}" class="btn btn-primary">Continue Shopping</a>
                <a href="{{route('clear_cart')}}" class="btn btn-outline-secondary">Clear Cart</a>
            </div>
        </div>
    </div>
</div>
@endif