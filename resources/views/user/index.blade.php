@extends('user.partials.master')
@section('title', 'Fresh Shop Welcome')
@section('topic', '')
@section('page', '')
@section('content')
    <main>
        <section class="mt-8">
            <div class="container">
                <div class="hero-slider ">
<<<<<<< HEAD
                    <div
                        style="background: url({{ asset('/images/slider/slide-1.jpg') }})no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
                        <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                            <span class="badge text-bg-warning">Opening Sale Discount 50%</span>

                            <h2 class="text-dark display-5 fw-bold mt-4">SuperMarket For Fresh Grocery </h2>
                            <p class="lead">Introduced a new model for online grocery shopping
                                and convenient home delivery.</p>
                            <a href="#!" class="btn btn-dark mt-3">Shop Now <i
                                    class="feather-icon icon-arrow-right ms-1"></i></a>
                        </div>

                    </div>
                    <div class=" "
                        style="background: url({{ asset('/images/slider/slider-2.jpg') }})no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
                        <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                            <span class="badge text-bg-warning">Free Shipping - orders over $100</span>
                            <h2 class="text-dark display-5 fw-bold mt-4">Free Shipping on <br> orders over <span
                                    class="text-primary">$100</span></h2>
                            <p class="lead">Free Shipping to First-Time Customers Only, After promotions and
                                discounts are applied.
                            </p>
                            <a href="#!" class="btn btn-dark mt-3">Shop Now <i
                                    class="feather-icon icon-arrow-right ms-1"></i></a>
                        </div>

                    </div>
=======
                    @foreach ($sliders as $slide)
                        <div style="background: url({{ asset('/images/slider/'.$slide->image) }})no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
                            <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                                <span class="badge" style="background-color: {{$slide->alert_bg}}; color:{{$slide->alert_color}}">{{$slide->alert}}</span>
                                <h2 class="display-5 fw-bold mt-4" style="color:{{$slide->title_color}}">{{$slide->title}}</h2>
                                <p class="lead" style="color:{{$slide->content_color}}">{{$slide->content}}</p>
                                <a href="{{route($slide->link,$slide->attr)}}" class="btn btn-dark mt-3">{{$slide->btn_content}} 
                                    <i class="feather-icon icon-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
>>>>>>> blackcoffee19-Tuong
                </div>
            </div>
        </section>
        <!-- Category Section Start-->
        <section class="mb-lg-10 mt-lg-14 my-8">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-6">

                        <h3 class="mb-0">Featured Categories</h3>

                    </div>
                </div>
                <div class="category-slider ">

<<<<<<< HEAD
                    <div class="item"> 
                        <a href="" class="text-decoration-none text-inherit">
                            <div class="card card-product mb-lg-4">
                                <div class="card-body text-center py-8">
                                    <img src="{{ asset('images/category/category-dairy-bread-eggs.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid">
                                    <div class="text-truncate">Dairy, Bread & Eggs</div>
                                </div>
                            </div>
                        </a></div>
                    <div class="item"> <a href="" class="text-decoration-none text-inherit">
                            <div class="card card-product mb-lg-4">
                                <div class="card-body text-center py-8">
                                    <img src="{{ asset('images/category/category-snack-munchies.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3">
                                    <div class="text-truncate">Snack & Munchies</div>
                                </div>
                            </div>
                        </a></div>
                    <div class="item"> <a href="" class="text-decoration-none text-inherit">
                            <div class="card card-product mb-lg-4">
                                <div class="card-body text-center py-8">
                                    <img src="{{ asset('images/category/category-bakery-biscuits.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3">
                                    <div class="text-truncate">Bakery & Biscuits</div>
                                </div>
                            </div>
                        </a></div>
                    <div class="item"> <a href="" class="text-decoration-none text-inherit">
                            <div class="card card-product mb-lg-4">
                                <div class="card-body text-center py-8">
                                    <img src="{{ asset('images/category/category-instant-food.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3">
                                    <div class="text-truncate">Instant Food</div>
                                </div>
                            </div>
                        </a></div>
                    <div class="item"> <a href="" class="text-decoration-none text-inherit">
                            <div class="card card-product mb-lg-4">
                                <div class="card-body text-center py-8">
                                    <img src="{{ asset('images/category/category-tea-coffee-drinks.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3">
                                    <div class="text-truncate">Tea, Coffee & Drinks</div>
                                </div>
                            </div>
                        </a></div>
                    <div class="item"><a href="" class="text-decoration-none text-inherit">
                            <div class="card card-product mb-lg-4">
                                <div class="card-body text-center py-8">
                                    <img src="{{ asset('images/category/category-atta-rice-dal.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3">
                                    <div class="text-truncate">Atta, Rice & Dal</div>
                                </div>
                            </div>
                        </a></div>

                    <div class="item"> <a href="" class="text-decoration-none text-inherit">
                            <div class="card card-product mb-lg-4">
                                <div class="card-body text-center py-8">
                                    <img src="{{ asset('images/category/category-baby-care.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3">
                                    <div class="text-truncate">Baby Care</div>
                                </div>
                            </div>
                        </a></div>
                    <div class="item"> <a href="" class="text-decoration-none text-inherit">
                            <div class="card card-product mb-lg-4">
                                <div class="card-body text-center py-8">
                                    <img src="{{ asset('images/category/category-chicken-meat-fish.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3">
                                    <div class="text-truncate">Chicken, Meat & Fish</div>
                                </div>
                            </div>
                        </a></div>
                    <div class="item"> <a href="" class="text-decoration-none text-inherit">
                            <div class="card card-product mb-lg-4">
                                <div class="card-body text-center py-8">
                                    <img src="{{ asset('images/category/category-cleaning-essentials.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3">
                                    <div class="text-truncate">Cleaning Essentials</div>
                                </div>
                            </div>
                        </a></div>
                    <div class="item"> <a href="" class="text-decoration-none text-inherit">
                            <div class="card card-product mb-lg-4">
                                <div class="card-body text-center py-8">
                                    <img src="{{ asset('images/category/category-pet-care.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3">
                                    <div class="text-truncate">Pet Care</div>
                                </div>
                            </div>
                        </a></div>




=======
                    @foreach ($cats as $item)
                        @if ($item->status == 'Active')
                            <div class="item">
                                <a href="{{ route('userShowProductCatagory', $item->id_type) }}"
                                    class="text-decoration-none text-inherit">
                                    <div class="card card-product mb-lg-4">
                                        <div class="card-body text-center py-8">
                                            <img src="{{ asset('images/category/' . $item->image) }}"
                                                alt="Grocery Ecommerce Template" class="mb-3 img-fluid"
                                                style="width: 120px; height: 120px;">
                                            <div class="text-truncate">{{ $item->type }}</div>
                                            {{-- <div class="text-truncate">{{ $item->id_type }}</div> --}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
>>>>>>> blackcoffee19-Tuong
                </div>
            </div>
        </section>
        <!-- Category Section End-->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 mb-3 mb-lg-0">
                        <div>
<<<<<<< HEAD
                            <div class="py-10 px-8 rounded"
                                style="background:url({{ asset('/images/banner/grocery-banner.png') }})no-repeat; background-size: cover; background-position: center;">
=======
                            <div class="py-10 px-8 rounded" style="background:url({{ asset('/images/banner/'.$banner[0]->image) }})no-repeat; background-size: cover; background-position: center;">
>>>>>>> blackcoffee19-Tuong
                                <div>
                                    <h3 class="fw-bold mb-1" style="color: {{$banner[0]->title_color}}">{{$banner[0]->title}}
                                    </h3>
                                    <p class="mb-4" style="color: {{$banner[0]->content_color}}">{{$banner[0]->content}}</p>
                                    <a href="{{route($banner[0]->link,$banner[0]->attr)}}" class="btn " style="background-color: {{$banner[0]->btn_bg_color}};color: {{$banner[0]->btn_color}}">{{$banner[0]->btn_content}}</a>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-12 col-md-6 ">

                        <div>
                            <div class="py-10 px-8 rounded"
<<<<<<< HEAD
                                style="background:url({{ asset('/images/banner/grocery-banner-2.jpg') }})no-repeat; background-size: cover; background-position: center;">
=======
                                style="background:url({{ asset('/images/banner/'.$banner[1]->image) }})no-repeat; background-size: cover; background-position: center;">
>>>>>>> blackcoffee19-Tuong
                                <div>
                                    <h3 class="fw-bold mb-1"style="color: {{$banner[1]->title_color}}">{{$banner[1]->title}}
                                    </h3>
                                    <p class="mb-4" style="color: {{$banner[1]->content_color}}">{{$banner[1]->content}}</p>
                                    <a href="{{route($banner[1]->link,$banner[1]->attr)}}" class="btn"style="background-color: {{$banner[1]->btn_bg_color}};color: {{$banner[1]->btn_color}}">{{$banner[1]->btn_content}}</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Popular Products Start-->
        <section class="my-lg-14 my-8">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-6">

                        <h3 class="mb-0">Popular Products</h3>

                    </div>
                </div>

                <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">
                    @foreach ($products as $pro)
                        <div class="col">
                            <div class="card card-product">
                                <div class="card-body">

                                    <div class="text-center position-relative ">
                                        <div class=" position-absolute top-0 start-0">
                                            @if ($pro->sale !=0)
                                                <span class="badge bg-danger">{{number_format($pro->sale,0)}}%</span>
                                            @endif
                                        </div>
                                        <a href="{{route('products-details',$pro->id_product)}}"> 
                                            <img src="{{ asset('/images/products/'.$pro->Library[0]->image) }}" class="mb-3 img-fluid">
                                        </a>
                                        <div class="card-product-action">
                                            <a class="btn-action btn_modal" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal" data-product="{{$pro->id_product}}"><i class="bi bi-eye"
                                                    data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                            <a class="btn-action {{Auth::check()? 'addFav':''}}" data-bs-toggle="tooltip"
                                            {{!Auth::check() ?'data-bs-toggle=modal data-bs-target=#userModal href=#!': "data-bs-toggle='tooltip' data-bs-html='true' title='Wishlist' data-bs-idproduct=$pro->id_product"}} ><i class="bi {{Auth::check() ? (count(Auth::user()->Favourite->where('id_product','=',$pro->id_product))>0 ? 'bi-heart-fill text-danger' : 'bi-heart'): 'bi-heart'}}"></i></a>
                                            <a class="btn-action compare_product" data-bs-toggle="tooltip" 
                                                data-bs-html="true" title="Compare" data-bs-product="{{$pro->id_product}}"><i
                                                    class="bi bi-arrow-left-right"></i></a>
                                        </div>

                                    </div>
                                    <div class="text-small mb-1"><a href="#!"
                                            class="text-decoration-none text-muted"><small>{{$pro->TypeProduct->name}}</small></a></div>
                                    <h2 class="fs-6">
                                        <a href="{{ route('products-details',$pro->id_product) }}" class="text-inherit text-decoration-none">{{$pro->name}}</a>
                                    </h2>
                                    <div>
                                    <p>    
                                        @php
                                          $rating = 0;
                                          if (count($pro->Comment->where('rating','!=',null)) >0) {
                                            foreach ($pro->Comment->where('rating','!=',null) as $cmt) {
                                              $rating += $cmt->rating;
                                            }
                                            $rating /= count($pro->Comment->where('rating','!=',null));
                                          }
                                      @endphp
                                        @for ($i = 0; $i < floor($rating); $i++)
                                        <i class="bi bi-star-fill fs-4 text-warning"></i>
                                        @endfor
                                        @if (is_float($rating))
                                        <i class="bi bi-star-half fs-4 text-warning"></i>
                                        @endif
                                        @for ($i = 0; $i < 5-ceil($rating); $i++)
                                        <i class="bi bi-star fs-4 text-warning"></i>
                                        @endfor
                                        <span class="text-black-50 ms-3">({{number_format($rating,1,'.',' ')}})</span>
                                    </p> 
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div>
                                            @if ($pro->sale >0)
<<<<<<< HEAD
                                            <span class="text-dark">${{$pro->price*(1-$pro->sale/100)}}</span>
                                            <span class="text-decoration-line-through text-muted">${{$pro->price}}</span> <small>/kg</small>
                                            @else
                                            <span class="text-dark">${{$pro->price}}</span> <small>/kg</small>
                                            @endif
                                        </div>
                                        <div><button data-bs-id="{{$pro->id_product}}" type="button" class="btn btn-primary btn addToCart">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-plus">
                                                    <line x1="12" y1="5" x2="12" y2="19">
                                                    </line>
                                                    <line x1="5" y1="12" x2="19" y2="12">
                                                    </line>
                                                </svg> Add</button></div>
=======
                                            <span class="text-dark fs-5">{{number_format($pro->price*(1-$pro->sale/100),0,'',' ')}}</span>
                                            <span class="text-decoration-line-through text-muted">{{number_format($pro->price,0,'',' ')}}</span> <small> đ/kg</small>
                                            @else
                                            <span class="text-dark fs-5">{{number_format($pro->price,0,'',' ')}}</span><small> đ/kg</small>
                                            @endif
                                        </div>
                                        <div><button data-bs-id="{{$pro->id_product}}" type="button" class="btn btn-primary btn addToCart">
                                            <i class="fa-solid fa-cart-shopping fa-xl"></i></button></div>
>>>>>>> blackcoffee19-Tuong
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Popular Products End-->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-6">
                        <h3 class="mb-0">Daily Best Sells</h3>
                    </div>
                </div>
                <div class="table-responsive-xl pb-6">
                    <div class="row row-cols-lg-4 row-cols-1 row-cols-md-2 g-4 flex-nowrap">
                        <div class="col">
                            <div class=" pt-8 px-6 px-xl-8 rounded"
<<<<<<< HEAD
                                style="background:url({{ asset('images/banner/banner-deal.jpg') }})no-repeat; background-size: cover; height: 470px;">
=======
                                style="background:url({{ asset('images/banner/'.$banner[2]->image) }})no-repeat; background-size: cover; height: 470px;">
>>>>>>> blackcoffee19-Tuong
                                <div>
                                    <h3 class="fw-bold " style="color:{{$banner[2]->title_color}}">
                                        {{$banner[2]->title}}
                                    </h3>                                    
                                    <p style="color:{{$banner[2]->content_color}}">{{$banner[2]->content}}</p>
                                    <a  class="btn " style="background-color: {{$banner[2]->btn_bg_color}};color:{{$banner[2]->btn_color}}">{{$banner[2]->btn_content}}<i
                                            class="feather-icon icon-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                        @foreach ($product_hot as $product)
                        <div class="col">
                            <div class="card card-product">
                                <div class="card-body">
                                    <div class="text-center  position-relative "> 
<<<<<<< HEAD
=======
                                        <div class=" position-absolute top-0 start-0">
                                            @if ($product->sale !=0)
                                                <span class="badge bg-danger">{{number_format($product->sale,0)}}%</span>
                                            @endif
                                        </div>
>>>>>>> blackcoffee19-Tuong
                                        <a href="{{ route('products-details',$product->id_product) }}">
                                        <img src="{{ asset('/images/products/'.$product->Library[0]->image) }}" class="mb-3 img-fluid">
                                        </a>
                                        <div class="card-product-action">
                                            <a  class="btn-action btn_modal" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal" data-product="{{$product->id_product}}"><i class="bi bi-eye"
                                                    data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                            <a  class="btn-action {{Auth::check()? 'addFav':''}}" data-bs-toggle="tooltip"
                                            {{!Auth::check() ?'data-bs-toggle=modal data-bs-target=#userModal href=#!': "data-bs-toggle='tooltip' data-bs-html='true' title='Wishlist' data-bs-idproduct=$product->id_product"}} ><i class="bi {{Auth::check() ? (count(Auth::user()->Favourite->where('id_product','=',$product->id_product))>0 ? 'bi-heart-fill text-danger' : 'bi-heart'): 'bi-heart'}}"></i></a>
                                            <a class="btn-action compare_product" data-bs-toggle="tooltip"
                                                data-bs-html="true" title="Compare" data-bs-product="{{$product->id_product}}"><i
                                                    class="bi bi-arrow-left-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="text-small mb-1">
                                        <a  class="text-decoration-none text-muted">
                                            <small>{{$product->TypeProduct->type}}</small>
                                        </a>
                                    </div>
                                    <h2 class="fs-6"><a href="{{ route('products-details',$product->id_product) }}" class="text-inherit text-decoration-none">{{$product->name}}</a></h2>
                                    
<<<<<<< HEAD
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div>
                                            @if ($product->sale >0)
                                                <span class="text-danger">${{$product->price*(1-$product->sale/100)}}</span> 
                                                <span class="text-decoration-line-through text-muted">${{$product->price}}</span> 
                                            @else
                                            <span class="text-dark">${{$product->price}}</span>
=======
                                    <div class="d-flex justify-content-between align-items-center mt-3 flex-nowrap">
                                        <div>
                                            @if ($product->sale >0)
                                                <span class="text-danger fs-4">{{number_format($product->price*(1-$product->sale/100),0,'',' ')}}</span><small> đ/kg</small>
                                            @else
                                            <span class="text-dark fs-4">{{number_format($product->price,0,'',' ')}} đ/kg</span>
>>>>>>> blackcoffee19-Tuong
                                            @endif
                                        </div>
                                        <div>
                                            @php
                                                $rating = 0;
                                                if (count($product->Comment->where('rating','!=',null)) >0) {
                                                  foreach ($product->Comment->where('rating','!=',null) as $cmt) {
                                                    $rating += $cmt->rating;
                                                  }
                                                  $rating /= count($product->Comment->where('rating','!=',null));
                                                }
                                            @endphp
                                              @for ($i = 0; $i < floor($rating); $i++)
                                              <i class="bi bi-star-fill fs-4 text-warning"></i>
                                              @endfor
                                              @if (is_float($rating))
                                              <i class="bi bi-star-half fs-4 text-warning"></i>
                                              @endif
                                              @for ($i = 0; $i < 5-ceil($rating); $i++)
                                              <i class="bi bi-star fs-4 text-warning"></i>
                                              @endfor
                                              <span class="text-black-50 ms-3">({{number_format($rating,1,'.',' ')}})</span>
                                        </div>
                                    </div>
                                    <div class="d-grid mt-2"><button data-bs-id="{{$product->id_product}}" type="button" class="btn btn-primary btn addToCart">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-plus">
                                                <line x1="12" y1="5" x2="12" y2="19">
                                                </line>
                                                <line x1="5" y1="12" x2="19" y2="12">
                                                </line>
                                            </svg> Add to cart </button></div>
                                    <div class="d-flex justify-content-start text-center mt-3">
                                        <div class="deals-countdown w-100" data-countdown="2028/10/10 00:00:00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </section>
        <section class="my-lg-14 my-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="mb-8 mb-xl-0">
<<<<<<< HEAD
                            <div class="mb-6"><img src="{{ asset('/images/icons/clock.svg') }}"
                                    alt=""></div>
=======
                            <div class="mb-6"><img src="{{ asset('/images/icons/clock.svg') }}" alt=""></div>
>>>>>>> blackcoffee19-Tuong
                            <h3 class="h5 mb-3">
                                10 minute grocery now
                            </h3>
                            <p>Get your order delivered to your doorstep at the earliest from FreshCart pickup stores
                                near you.</p>
                        </div>
                    </div>
                    <div class="col-md-6  col-lg-3">
                        <div class="mb-8 mb-xl-0">
<<<<<<< HEAD
                            <div class="mb-6"><img src="{{ asset('/images/icons/gift.svg') }}"
                                    alt=""></div>
=======
                            <div class="mb-6"><img src="{{ asset('/images/icons/gift.svg') }}" alt=""></div>
>>>>>>> blackcoffee19-Tuong
                            <h3 class="h5 mb-3">Best Prices & Offers</h3>
                            <p>Cheaper prices than your local supermarket, great cashback offers to top it off. Get best
                                pricess &
                                offers.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="mb-8 mb-xl-0">
<<<<<<< HEAD
                            <div class="mb-6"><img src="{{ asset('/images/icons/package.svg') }}"
                                    alt=""></div>
=======
                            <div class="mb-6"><img src="{{ asset('/images/icons/package.svg') }}" alt="">
                            </div>
>>>>>>> blackcoffee19-Tuong
                            <h3 class="h5 mb-3">Wide Assortment</h3>
                            <p>Choose from 5000+ products across food, personal care, household, bakery, veg and non-veg
                                & other
                                categories.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="mb-8 mb-xl-0">
<<<<<<< HEAD
                            <div class="mb-6"><img src="{{ asset('/images/icons/refresh-cw.svg') }}"
                                    alt="">
=======
                            <div class="mb-6"><img src="{{ asset('/images/icons/refresh-cw.svg') }}" alt="">
>>>>>>> blackcoffee19-Tuong
                            </div>
                            <h3 class="h5 mb-3">Easy Returns</h3>
                            <p>Not satisfied with a product? Return it at the doorstep & get a refund within hours. No
                                questions asked
<<<<<<< HEAD
                                <a >policy</a>.
=======
                                <a>policy</a>.
>>>>>>> blackcoffee19-Tuong
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

