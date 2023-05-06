@extends('user.partials.master')
@section('title', 'Fresh Shop Welcome')
@section('topic', '')
@section('page', '')
@section('content')
    <main>
        <section class="mt-8">
            <div class="container">
                <div class="hero-slider ">
                    @foreach ($sliders as $slide)
                        <div
                            style="background: url({{ asset('/images/slider/' . $slide->image) }})no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
                            <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                                <span class="badge"
                                    style="background-color: {{ $slide->alert_bg }}; color:{{ $slide->alert_color }}">{{ $slide->alert }}</span>
                                <h2 class="display-5 fw-bold mt-4" style="color:{{ $slide->title_color }}">{{ $slide->title }}
                                </h2>
                                <p class="lead" style="color:{{ $slide->content_color }}">{{ $slide->content }}</p>
                                <a href="" class="btn mt-3"
                                    style="background-color: {{ $slide->btn_bg_color }}; color:{{ $slide->btn_color }}">{{ $slide->btn_content }}
                                    <i class="feather-icon icon-arrow-right ms-1"></i>
                                </a>
                                {{-- {{ route($slide->link, $slide->attr) }} --}}
                            </div>
                        </div>
                    @endforeach
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
                </div>
            </div>
        </section>
        <!-- Category Section End-->
        <section>
            <div class="container">
                <div class="row">
                    @foreach ($banners as $banner)
                        @if ($banner->id_banner == 1 || $banner->id_banner == 2)
                            <div class="col-12 col-md-6 mb-3 mb-lg-0">
                                <div>
                                    <div class="py-10 px-8 rounded"
                                        style="background:url({{ asset('/images/banner/' . $banner->image) }})no-repeat; background-size: cover; background-position: center;">
                                        <div>
                                            <h3 class="fw-bold mb-1" style="color:{{ $banner->title_color }};">
                                                {{ $banner->title }}
                                            </h3>
                                            <p class="mb-4" style="color:{{ $banner->content_color }}">
                                                {{ $banner->content }}
                                            </p>
                                            <a href="#!" class="btn"
                                                style="background-color: {{ $banner->btn_bg_color }}; color:{{ $banner->btn_color }};">{{ $banner->btn_content }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
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
                                            @if ($pro->sale != 0)
                                                <span class="badge bg-danger">{{ number_format($pro->sale, 0) }}%</span>
                                            @endif
                                        </div>
                                        <a href="{{ route('products-details', $pro->id_product) }}">
                                            @if (count($pro->Library) > 0)
                                                <img src="{{ asset('/images/products/' . $pro->Library[0]->image) }}"
                                                    class="mb-3 img-fluid">
                                            @else
                                                <img src="{{ asset('/images/category/' . $pro->TypeProduct->image) }}"
                                                    class="mb-3 img-fluid">
                                            @endif
                                        </a>
                                        <div class="card-product-action">
                                            <a class="btn-action btn_modal" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal" data-product="{{ $pro->id_product }}">
                                                <i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true"
                                                    title="Quick View"></i>
                                            </a>
                                            <a class="btn-action {{ Auth::check() ? 'addFav' : '' }}"
                                                data-bs-toggle="tooltip"
                                                {{ !Auth::check() ? 'data-bs-toggle=modal data-bs-target=#userModal href=#!' : "data-bs-toggle='tooltip' data-bs-html='true' title='Wishlist' data-bs-idproduct=$pro->id_product" }}>
                                                <i
                                                    class="bi {{ Auth::check() ? (count(Auth::user()->Favourite->where('id_product', '=', $pro->id_product)) > 0 ? 'bi-heart-fill text-danger' : 'bi-heart') : 'bi-heart' }}"></i>
                                            </a>
                                            <a class="btn-action compare_product" data-bs-toggle="tooltip"
                                                data-bs-html="true" title="Compare"
                                                data-bs-product="{{ $pro->id_product }}">
                                                <i class="bi bi-arrow-left-right"></i>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="text-small mb-1"><a href="#!"
                                            class="text-decoration-none text-muted"><small>{{ $pro->TypeProduct->name }}</small></a>
                                    </div>
                                    <h2 class="fs-6">
                                        <a href="{{ route('products-details', $pro->id_product) }}"
                                            class="text-inherit text-decoration-none">{{ $pro->name }}</a>
                                    </h2>
                                    <div>
                                        <p>
                                            @php
                                                $rating = 0;
                                                if (count($pro->Comment->where('rating', '!=', null)) > 0) {
                                                    foreach ($pro->Comment->where('rating', '!=', null) as $cmt) {
                                                        $rating += $cmt->rating;
                                                    }
                                                    $rating /= count($pro->Comment->where('rating', '!=', null));
                                                }
                                            @endphp
                                            @for ($i = 0; $i < floor($rating); $i++)
                                                <i class="bi bi-star-fill fs-4 text-warning"></i>
                                            @endfor
                                            @if (is_float($rating))
                                                <i class="bi bi-star-half fs-4 text-warning"></i>
                                            @endif
                                            @for ($i = 0; $i < 5 - ceil($rating); $i++)
                                                <i class="bi bi-star fs-4 text-warning"></i>
                                            @endfor
                                            <span
                                                class="text-black-50 ms-3">({{ number_format($rating, 1, '.', ' ') }})</span>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div>
                                            @if ($pro->sale > 0)
                                                <span
                                                    class="text-dark fs-5">{{ number_format($pro->price * (1 - $pro->sale / 100), 0, '', ' ') }}</span>
                                                <span
                                                    class="text-decoration-line-through text-muted">{{ number_format($pro->price, 0, '', ' ') }}</span>
                                                <small> đ/kg</small>
                                            @else
                                                <span
                                                    class="text-dark fs-5">{{ number_format($pro->price, 0, '', ' ') }}</span><small>
                                                    đ/kg</small>
                                            @endif
                                        </div>
                                        <div><button data-bs-id="{{ $pro->id_product }}" type="button"
                                                class="btn btn-primary btn addToCart">
                                                <i class="fa-solid fa-cart-shopping fa-xl"></i></button></div>
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
                            <div class="px-xl-8 rounded"
                                style="background:url({{ asset('images/banner/' . $banners[2]->image) }})no-repeat; background-size: cover; height: 515px; padding-top: 168px; padding-left: 30px;">
                                <div class="d-flex flex-column justify-content-start flex-wrap h-75 align-items-baseline">
                                    <h3 class="fw-bold " style="color:{{ $banners[2]->title_color }}">
                                        {{ $banners[2]->title }}
                                    </h3>
                                    <p style="color:{{ $banners[2]->content_color }}">{{ $banners[2]->content }}</p>
                                    <a class="btn "
                                        style="background-color: {{ $banner->btn_bg_color }};color:{{ $banners[2]->btn_color }}; margin:auto 0 ;">{{ $banners[2]->btn_content }}<i
                                            class="feather-icon icon-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                        @foreach ($product_hot as $product)
                            <div class="col">
                                <div class="card card-product">
                                    <div class="card-body">
                                        <div class="text-center  position-relative ">
                                            <div class=" position-absolute top-0 start-0">
                                                @if ($product->sale != 0)
                                                    <span
                                                        class="badge bg-danger">{{ number_format($product->sale, 0) }}%</span>
                                                @endif
                                            </div>
                                            <a href="{{ route('products-details', $product->id_product) }}">
                                                @if (count($product->Library) > 0)
                                                    <img src="{{ asset('/images/products/' . $product->Library[0]->image) }}"
                                                        class="mb-3 img-fluid">
                                                @else
                                                    <img src="{{ asset('/images/category/' . $product->TypeProduct->image) }}"
                                                        class="mb-3 img-fluid">
                                                @endif
                                            </a>
                                            <div class="card-product-action">
                                                <a class="btn-action btn_modal" data-bs-toggle="modal"
                                                    data-bs-target="#quickViewModal"
                                                    data-product="{{ $product->id_product }}"><i class="bi bi-eye"
                                                        data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Quick View"></i></a>
                                                <a class="btn-action {{ Auth::check() ? 'addFav' : '' }}"
                                                    data-bs-toggle="tooltip"
                                                    {{ !Auth::check() ? 'data-bs-toggle=modal data-bs-target=#userModal href=#!' : "data-bs-toggle='tooltip' data-bs-html='true' title='Wishlist' data-bs-idproduct=$product->id_product" }}><i
                                                        class="bi {{ Auth::check() ? (count(Auth::user()->Favourite->where('id_product', '=', $product->id_product)) > 0 ? 'bi-heart-fill text-danger' : 'bi-heart') : 'bi-heart' }}"></i></a>
                                                <a class="btn-action compare_product" data-bs-toggle="tooltip"
                                                    data-bs-html="true" title="Compare"
                                                    data-bs-product="{{ $product->id_product }}"><i
                                                        class="bi bi-arrow-left-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-small mb-1">
                                            <a class="text-decoration-none text-muted">
                                                <small>{{ $product->TypeProduct->type }}</small>
                                            </a>
                                        </div>
                                        <h2 class="fs-6"><a
                                                href="{{ route('products-details', $product->id_product) }}"
                                                class="text-inherit text-decoration-none">{{ $product->name }}</a></h2>
                                        <div
                                            class="d-flex flex-column justify-content-between align-items-center mt-3 flex-nowrap">
                                            <div>
                                                @if ($product->sale > 0)
                                                    <span
                                                        class="text-danger fs-4">{{ number_format($product->price * (1 - $product->sale / 100), 0, '', ' ') }}</span><small>
                                                        đ/kg</small>
                                                @else
                                                    <span
                                                        class="text-dark fs-4">{{ number_format($product->price, 0, '', ' ') }}
                                                        đ/kg</span>
                                                @endif
                                            </div>
                                            <div>
                                                @php
                                                    $rating = 0;
                                                    if (count($product->Comment->where('rating', '!=', null)) > 0) {
                                                        foreach ($product->Comment->where('rating', '!=', null) as $cmt) {
                                                            $rating += $cmt->rating;
                                                        }
                                                        $rating /= count($product->Comment->where('rating', '!=', null));
                                                    }
                                                @endphp
                                                @for ($i = 0; $i < floor($rating); $i++)
                                                    <i class="bi bi-star-fill fs-4 text-warning"></i>
                                                @endfor
                                                @if (is_float($rating))
                                                    <i class="bi bi-star-half fs-4 text-warning"></i>
                                                @endif
                                                @for ($i = 0; $i < 5 - ceil($rating); $i++)
                                                    <i class="bi bi-star fs-4 text-warning"></i>
                                                @endfor
                                                <span
                                                    class="text-black-50 ms-3">({{ number_format($rating, 1, '.', ' ') }})</span>
                                            </div>
                                            <div class="d-grid mt-2">
                                                <button data-bs-id="{{ $product->id_product }}" type="button"
                                                    class="btn btn-primary btn addToCart">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-plus">
                                                        <line x1="12" y1="5" x2="12"
                                                            y2="19">
                                                        </line>
                                                        <line x1="5" y1="12" x2="19"
                                                            y2="12">
                                                        </line>
                                                    </svg> Add to cart
                                                </button>
                                            </div>
                                            <div class="d-flex justify-content-start text-center mt-3">
                                                <div class="deals-countdown w-100" data-countdown="2028/10/10 00:00:00">
                                                </div>
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
                            <div class="mb-6"><img src="{{ asset('/images/icons/clock.svg') }}" alt=""></div>
                            <h3 class="h5 mb-3">
                                10 minute grocery now
                            </h3>
                            <p>Get your order delivered to your doorstep at the earliest from FreshCart pickup stores
                                near you.</p>
                        </div>
                    </div>
                    <div class="col-md-6  col-lg-3">
                        <div class="mb-8 mb-xl-0">
                            <div class="mb-6"><img src="{{ asset('/images/icons/gift.svg') }}" alt=""></div>
                            <h3 class="h5 mb-3">Best Prices & Offers</h3>
                            <p>Cheaper prices than your local supermarket, great cashback offers to top it off. Get best
                                pricess &
                                offers.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="mb-8 mb-xl-0">
                            <div class="mb-6"><img src="{{ asset('/images/icons/package.svg') }}" alt="">
                            </div>
                            <h3 class="h5 mb-3">Wide Assortment</h3>
                            <p>Choose from 5000+ products across food, personal care, household, bakery, veg and non-veg
                                & other
                                categories.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="mb-8 mb-xl-0">
                            <div class="mb-6"><img src="{{ asset('/images/icons/refresh-cw.svg') }}" alt="">
                            </div>
                            <h3 class="h5 mb-3">Easy Returns</h3>
                            <p>Not satisfied with a product? Return it at the doorstep & get a refund within hours. No
                                questions asked
                                <a>policy</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
