@extends('admin.partials.master')
<style>
    .carousel-nav-icon {
        height: 48px;
        width: 48px;
    }

    .carousel-item {

        .col,
        .col-sm,
        .col-md {
            /* margin: 8px; */
            /* width: 800px; */
            background-size: cover;
            background-position: center center;
        }
    }
</style>
@section('admin-content')
    <main>
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <!-- page header -->
                        <div>
                            <h2>Detail Product</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="#" class="text-inherit">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#" class="text-inherit">Products</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Detail Product
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ Route('adminProduct') }}" class="btn btn-light">Back to Product</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <!-- card -->
                    <div class="card p-6 card-lg">
                        {{-- //asd asd asd --}}

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h2>{{ __('Detail Product') }}</h2>
                                        </div>
                                        <div class="row">
                                            <div class="card-body col-6">
                                                <div class="form-group row mt-3">
                                                    <label for="name" class="col-4 col-form-label text-md-right">
                                                        <h5>{{ __('Name:') }}</h5>
                                                    </label>

                                                    <div class="col col-form-label text-md-right">
                                                        <h5 class="text-primary">{{ $id_product->name }}</h5>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="id_type" class="col-4 col-form-label text-md-right">
                                                        <h5>{{ __('Type:') }}</h5>
                                                    </label>

                                                    <div class="col col-form-label text-md-right">
                                                        <h5 class="text-secondary">{{ $id_product->typeproduct->type }}</h5>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="description" class="col-4 col-form-label text-md-right">
                                                        <h5>{{ __('Description:') }}</h5>
                                                    </label>

                                                    <div class="col col-form-label text-md-right">
                                                        <h5>{{ $id_product->description }}</h5>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="quantity" class="col-4 col-form-label text-md-right">
                                                        <h5>{{ __('Quantity:') }}</h5>
                                                    </label>

                                                    <div class="col col-form-label text-md-right">
                                                        <h5>{{ $id_product->quantity }}</h5>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="original_price" class="col-4 col-form-label text-md-right">
                                                        <h5>{{ __('Original Price:') }}</h5>
                                                    </label>

                                                    <div class="col col-form-label text-md-right">
                                                        <h5>{{ $id_product->original_price }}</h5>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="price" class="col-4 col-form-label text-md-right">
                                                        <h5>{{ __('Price:') }}</h5>
                                                    </label>

                                                    <div class="col col-form-label text-md-right">
                                                        <h5>{{ $id_product->price }}</h5>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="sale" class="col-4 col-form-label text-md-right">
                                                        <h5>{{ __('Sale:') }}</h5>
                                                    </label>

                                                    <div class="col col-form-label text-md-right">
                                                        <h5 class="text-danger">{{ number_format($id_product->sale), 0 }} %
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body col-6">
                                                <div id="carouselExampleIndicators" class="carousel slide">
                                                    <div class="carousel-indicators">
                                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                                            data-bs-slide-to="0" class="active" aria-current="true"
                                                            aria-label="Slide 1"></button>
                                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                                            data-bs-slide-to="3" aria-label="Slide 4"></button>
                                                    </div>
                                                    <div class="carousel-inner">
                                                        <?php if (isset($id_product->libraries[3])): ?>
                                                        <div class="carousel-item active">
                                                            <img src="{{ asset('images/products/' . $id_product->libraries[3]->image) }}"
                                                                class="d-block w-100"
                                                                alt="{{ $id_product->libraries[3]->image }}">
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php if (isset($id_product->libraries[2])): ?>
                                                        <div class="carousel-item">
                                                            <img src="{{ asset('images/products/' . $id_product->libraries[2]->image) }}"
                                                                class="d-block w-100"
                                                                alt="{{ $id_product->libraries[2]->image }}">
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php if (isset($id_product->libraries[1])): ?>
                                                        <div class="carousel-item">
                                                            <img src="{{ asset('images/products/' . $id_product->libraries[1]->image) }}"
                                                                class="d-block w-100"
                                                                alt="{{ $id_product->libraries[1]->image }}">
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php if (isset($id_product->libraries[0])): ?>
                                                        <div class="carousel-item">
                                                            <img src="{{ asset('images/products/' . $id_product->libraries[0]->image) }}"
                                                                class="d-block w-100"
                                                                alt="{{ $id_product->libraries[0]->image }}">
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                                {{-- <div class="form-group row mt-3">
                                                    <div class="col col-form-label text-md-right">
                                                        @foreach ($id_product->libraries as $library)
                                                            <img src="{{ asset('images/products/' . $library->image) }}"
                                                                alt="" style="max-width:500px; height:auto;"
                                                                class="mt-3">
                                                        @endforeach
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="card-footer mt-3">
                                            <a href="#!" onclick="history.back()" class="me-4 btn btn-dark" style="width: 70px">Back</a>
                                            <a href="{{route('adminEditProduct', $id_product->id_product)}}" class="me-4 btn btn-warning">Edit Product</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
