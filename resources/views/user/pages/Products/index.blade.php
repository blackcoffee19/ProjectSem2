@extends('user.partials.master')
@section('content')
    <main>
        <style>
            .price1 {

                border: 2px solid #dfe2e1;
                border-radius: .5rem;
                display: block;

                padding: .55rem 3rem .55rem 1rem;

                /* width: 100%; */
            }

            .searchPrice {
                border: 0px;
                width: 70px;
                height: 30px;
                border-radius: .5rem;
                background-color: #0aad0a;
                color: white;
            }
        </style>

        <!-- breadcrumb -->
        {{-- @include('user.partials.breadcrumb') --}}
        <!-- end breadcrumb -->

        <!-- section -->
        <div class=" mt-8 mb-lg-14 mb-8">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row gx-10">
                    <!--- navCategory --->
                    <!-- col -->
                    @include('user.partials.Products.navCategory')
                    <!--- end navCategory --->

                    {{-- main --}}
                    <section class="col-lg-9 col-md-12">
                        <!-- card -->
                        <div class="card mb-4 bg-light border-0">
                            <!-- card body -->
                            <div class=" card-body p-9">
                                @if (isset($name))
                                    <h2 class="mb-0 fs-1">Search for: {{ $name }}</h2>
                                @else
                                    <h2 class="mb-0 fs-1">Categories</h2>
                                @endif
                            </div>
                        </div>
                        <!-- list icon -->
                        <div class="d-lg-flex justify-content-between align-items-center">
                            <div class="mb-3 mb-lg-0">
                                <p class="mb-0"> <span class="text-dark">{{ count($prods) }} </span> Products found </p>
                            </div>

                            <!-- icon -->
                            <div class="d-md-flex justify-content-between align-items-center">
                                {{-- <div class="d-flex align-items-center justify-content-between">
                                    <div>

                                        <a href="shop-list.html" class="text-muted me-3"><i class="bi bi-list-ul"></i></a>
                                        <a href="shop-grid.html" class=" me-3 active"><i class="bi bi-grid"></i></a>
                                        <a href="shop-grid-3-column.html" class="me-3 text-muted"><i
                                                class="bi bi-grid-3x3-gap"></i></a>
                                    </div>
                                    <div class="ms-2 d-lg-none">
                                        <a class="btn btn-outline-gray-400 text-muted" data-bs-toggle="offcanvas"
                                            href="#offcanvasCategory" role="button" aria-controls="offcanvasCategory"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-filter me-2">
                                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                            </svg> Filters</a>
                                    </div>
                                </div> --}}

                                <div class="d-flex mt-2 mt-lg-0">


                                    <div>
                                        <!-- select option -->
                                        <select class="form-select" id="sort" onchange="sortProductsByPrice()">
                                            <option value="">Sort by: Featured</option>
                                            <option value="desc">Price: Low to High</option>
                                            <option value="asc">Price: High to Low</option>
                                        </select>

                                    </div>

                                </div>

                            </div>
                        </div>


                        <!-- row -->
                        <div class="row g-4 row-cols-xl-4 row-cols-lg-2 row-cols-2 row-cols-md-3 mt-2">

                            @foreach ($prods as $pro)
                                <!-- col -->

                                <div class=" filterDiv {{ $pro->id_type }} col" data-price="{{ $pro->price }}">

                                    <!-- card -->
                                    <div class="card card-product">
                                        <div class="card-body">

                                            <div class="text-center position-relative ">
                                                <div class=" position-absolute top-0 start-0">
                                                    @if ($pro->sale != 0)
                                                        <span
                                                            class="badge bg-danger">{{ number_format($pro->sale, 0) }}%</span>
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
                                                        data-bs-target="#quickViewModal"
                                                        data-product="{{ $pro->id_product }}"><i class="bi bi-eye"
                                                            data-bs-toggle="tooltip" data-bs-html="true"
                                                            title="Quick View"></i></a>
                                                    <a class="btn-action {{ Auth::check() ? 'addFav' : '' }}"
                                                        data-bs-toggle="tooltip"
                                                        {{ !Auth::check() ? 'data-bs-toggle=modal data-bs-target=#userModal href=#!' : "data-bs-toggle='tooltip' data-bs-html='true' title='Wishlist' data-bs-idproduct=$pro->id_product" }}><i
                                                            class="bi {{ Auth::check() ? (count(Auth::user()->Favourite->where('id_product', '=', $pro->id_product)) > 0 ? 'bi-heart-fill text-danger' : 'bi-heart') : 'bi-heart' }}"></i></a>
                                                    <a class="btn-action compare_product" data-bs-toggle="tooltip"
                                                        data-bs-html="true" title="Compare"
                                                        data-bs-product="{{ $pro->id_product }}"><i
                                                            class="bi bi-arrow-left-right"></i></a>
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
                                                <p class="rate10">
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
                                                        class="text-black-50 ms-3">{{ number_format($rating, 1, '.', ' ') }}({{ count($pro->Comment->where('rating', '!=', null)) }})</span>
                                                </p>
                                                <input type="hidden" class="rating-value" value="{{ ceil($rating) }}" />
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
                        {{-- {{$prods->links('pagination::bootstrap-5') }} --}}
                    </section>
                    {{-- end main --}}

                </div>
            </div>
        </div>
    </main>

    <script>
        //hiển thị số sao từng sản phẩm
        const ratingValues = document.querySelectorAll(".rating-value");
        ratingValues.forEach(function(ratingValue) {
            const ratingInputs = ratingValue.parentNode.querySelectorAll(".rate10 i");
            const value = Number(ratingValue.value);
            if (value <= 5 && value >= 1) {
                ratingInputs[ratingInputs.length - value].checked = true;
            }

            ratingValue.addEventListener(" i", function() {
                const value = Number(ratingValue.value);
                if (value <= 5 && value >= 1) {
                    ratingInputs[ratingInputs.length - value].checked = true;
                }
            });
        });

        //sắp xếp theo giá
        function sortProductsByPrice() {
            const productDivs = document.querySelectorAll('.filterDiv');
            const selectedOption = document.getElementById('sort').value;

            // Tạo một mảng chứa các sản phẩm và giá của chúng
            let products = [];
            for (let i = 0; i < productDivs.length; i++) {
                const productDiv = productDivs[i];
                const price = parseFloat(productDiv.getAttribute('data-price'));
                products.push({
                    div: productDiv,
                    price: price
                });
            }

            // Sắp xếp sản phẩm theo giá
            if (selectedOption === 'asc') {
                products.sort(function(a, b) {
                    return a.price - b.price;
                });
            } else if (selectedOption === 'desc') {
                products.sort(function(a, b) {
                    return b.price - a.price;
                });
            }
            for (let i = 0; i < products.length; i++) {
                const productDiv = products[i].div;
                const productList = productDiv.parentNode;
                productList.insertBefore(productDiv, productList.firstChild);
            }
            // lọc sản phẩm theo type
        }

        //fiter rate

        $(document).ready(function() {
            var selectedValues = []; // biến lưu trữ danh sách các giá trị được chọn từ các checkbox
            var visibleCols = []; // biến lưu trữ trạng thái ban đầu của các cột
            var filterOn = false; // biến cờ cho biết liệu chức năng lọc đang được kích hoạt hay không

            $(".rating-checkbox").change(function() {
                selectedValues = [];
                $(".rating-checkbox:checked").each(function() {
                    selectedValues.push($(this).val());
                });
                filterData();
            });

            function filterData() {
                visibleCols = $(".col:visible"); // Lưu trạng thái ban đầu của các cột hiển thị
                if (selectedValues.length === 0) {
                    visibleCols.show(); // Hiển thị lại các cột ban đầu đã lưu trữ trước đó
                    filterOn = false; // Đặt biến cờ là false
                } else {
                    visibleCols.hide(); // Ẩn tất cả các cột đang hiển thị trên màn hình trước khi lọc
                    visibleCols.each(function() {
                        if ($.inArray($(this).find(".rating-value").val(), selectedValues) !== -1) {
                            $(this)
                                .show(); // Nếu giá trị của cột nằm trong danh sách giá trị được chọn, hiển thị cột đó
                        }
                    });
                    filterOn = true; // Đặt biến cờ là true
                }
            }

            $(".rating-checkbox").click(function() {
                // Đảo ngược chức năng lọc nếu checkbox đã được chọn
                if (filterOn) {
                    selectedValues = [];
                    $(".rating-checkbox").prop("checked", false);
                    visibleCols.show(); // Hiển thị lại các cột ban đầu đã lưu trữ trước đó
                    filterOn = false; // Đặt biến cờ là false
                }
            });
        });
    </script>
@endsection
