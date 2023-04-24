@extends('user.partials.master')
@section('content')
    <main>
        <!-- section -->
        <div class=" mt-8 mb-lg-14 mb-8">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row gx-10">
                    <!--- navCategory --->
                    @include('user.partials.Products.navCategory')
                    <!--- end navCategory --->

                    {{-- main --}}
                    <section class="col-lg-9 col-md-12">
                        <!-- card -->
                        <div class="card mb-4 bg-light border-0">
                            <!-- card body -->
                            <div class=" card-body p-9">
                                <h2 class="mb-0 fs-1">Snacks & Munchies</h2>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">

                            <!-- col -->
                            @foreach ($products as $product)
                                <div class="col">
                                    <!-- card -->

                                    <div class="card card-product">
                                        <div class="card-body">
                                            <!-- badge -->
                                            <div class="text-center position-relative ">
                                                <div class=" position-absolute top-0 start-0">
                                                    <span class="badge bg-danger">{{ $product->sale }}%</span>
                                                </div>
                                                <a href="{{ route('products-details', $product->id_product) }}">
                                                    {{-- {{ route('userShowProduct', $product->id_product) }} --}}
                                                    <!-- img --><img
                                                        src="{{ asset('images/products/' . $product->libraries[3]->image) }}"
                                                        alt="{{ $product->name }}" class="mb-3 img-fluid">
                                                </a>
                                                <!-- action btn -->
                                                <div class="card-product-action">
                                                    <a href="#!" class="btn-action" data-bs-toggle="modal"
                                                        data-bs-target="#quickViewModal"><i class="bi bi-eye"
                                                            data-bs-toggle="tooltip" data-bs-html="true"
                                                            title="Quick View"></i></a>
                                                    <a href="{{ Route('wishlist') }}" class="btn-action"
                                                        data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                                                            class="bi bi-heart"></i></a>
                                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip"
                                                        data-bs-html="true" title="Compare"><i
                                                            class="bi bi-arrow-left-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- heading -->
                                            <div class="text-small mb-1"><a href="#!"
                                                    class="text-decoration-none text-muted"><small>{{ $product->typeproduct->type }}</small></a>
                                            </div>
                                            <h2 class="fs-6"><a
                                                    href="{{ route('products-details', $product->id_product) }}"
                                                    class="text-inherit text-decoration-none">{{ $product->name }}</a></h2>
                                            {{-- <!--{{ route('userShowProduct', $product->id_product) }} --> --}}
                                            <div>
                                                <!-- rating -->
                                                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-half"></i></small> <span
                                                    class="text-muted small">4.5(149)</span>
                                            </div>
                                            <!-- price -->
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <div><span class="text-dark">${{ number_format($product->price, 0) }}</span>
                                                    <span
                                                        class="text-decoration-line-through text-muted">${{ number_format((100 * $product->price) / (100 - $product->sale), 0) }}</span>
                                                </div>
                                                <!-- btn -->
                                                <div><a href="{{ Route('wishlist') }}" class="btn btn-primary btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-plus">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19">
                                                            </line>
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12">
                                                            </line>
                                                        </svg> Add</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    {{-- end main --}}

                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-8">
                    <div class="position-absolute top-0 end-0 me-3 mt-3">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- img slide -->
                            <div class="product productModal" id="productModal">
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="
                  background-image: url(..images/products/product-single-img-1.jpg) ">
                                    <!-- img -->
                                    <img src="{{ asset('images/products/product-single-img-1.jpg') }}" alt="">
                                </div>
                                <div>
                                    <div class="zoom" onmousemove="zoom(event)"
                                        style="
                    background-image: url({{ asset('images/products/product-single-img-2.jpg') }});
                  ">
                                        <!-- img -->
                                        <img src="{{ asset('images/products/product-single-img-2.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div>
                                    <div class="zoom" onmousemove="zoom(event)"
                                        style="
                    background-image: url({{ asset('images/products/product-single-img-3.jpg') }});
                  ">
                                        <!-- img -->
                                        <img src="{{ asset('images/products/product-single-img-3.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div>
                                    <div class="zoom" onmousemove="zoom(event)"
                                        style="
                    background-image: url({{ asset('images/products/product-single-img-4.jpg') }});
                  ">
                                        <!-- img -->
                                        <img src="{{ asset('images/products/product-single-img-4.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            <!-- product tools -->
                            <div class="product-tools">
                                <div class="thumbnails row g-3" id="productModalThumbnails">
                                    <div class="col-3" class="tns-nav-active">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ asset('images/products/product-single-img-1.jpg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ asset('images/products/product-single-img-2.jpg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ asset('images/products/product-single-img-3.jpg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ asset('images/products/product-single-img-4.jpg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ps-lg-8 mt-6 mt-lg-0">
                                <a href="#!" class="mb-4 d-block">Bakery Biscuits</a>
                                <h2 class="mb-1 h1">Napolitanke Ljesnjak</h2>
                                <div class="mb-4">
                                    <small class="text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i></small><a href="#" class="ms-2">(30
                                        reviews)</a>
                                </div>
                                <div class="fs-4">
                                    <span class="fw-bold text-dark">$32</span>
                                    <span class="text-decoration-line-through text-muted">$35</span><span><small
                                            class="fs-6 ms-2 text-danger">26% Off</small></span>
                                </div>
                                <hr class="my-6">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-outline-secondary">
                                        250g
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary">
                                        500g
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary">
                                        1kg
                                    </button>
                                </div>
                                <div>
                                    <!-- input -->
                                    <!-- input -->
                                    <div class="input-group input-spinner  ">
                                        <input type="button" value="-" class="button-minus  btn  btn-sm "
                                            data-field="quantity">
                                        <input type="number" step="1" max="10" value="1"
                                            name="quantity" class="quantity-field form-control-sm form-input   ">
                                        <input type="button" value="+" class="button-plus btn btn-sm "
                                            data-field="quantity">
                                    </div>
                                </div>
                                <div class="mt-3 row justify-content-start g-2 align-items-center">

                                    <div class="col-lg-4 col-md-5 col-6 d-grid">
                                        <!-- button -->
                                        <!-- btn -->
                                        <button type="button" class="btn btn-primary">
                                            <i class="feather-icon icon-shopping-bag me-2"></i>Add to
                                            cart
                                        </button>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <!-- btn -->
                                        <a class="btn btn-light" href="#" data-bs-toggle="tooltip"
                                            data-bs-html="true" aria-label="Compare"><i
                                                class="bi bi-arrow-left-right"></i></a>
                                        <a class="btn btn-light" href="#!" data-bs-toggle="tooltip"
                                            data-bs-html="true" aria-label="Wishlist"><i
                                                class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                                <hr class="my-6">
                                <div>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Product Code:</td>
                                                <td>FBB00255</td>
                                            </tr>
                                            <tr>
                                                <td>Availability:</td>
                                                <td>In Stock</td>
                                            </tr>
                                            <tr>
                                                <td>Type:</td>
                                                <td>Fruits</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping:</td>
                                                <td>
                                                    <small>01 day shipping.<span class="text-muted">( Free pickup
                                                            today)</span></small>
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
@endsection
