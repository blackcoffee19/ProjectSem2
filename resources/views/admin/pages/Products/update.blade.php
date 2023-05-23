@extends('admin.partials.master')
@section('admin-content')
    <main>
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <!-- page header -->
                        <div>
                            <h2>Edit Product</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}" class="text-inherit">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ Route('adminProduct') }}" class="text-inherit">Products</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Edit Product
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
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
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
                                            <h2>{{ __('Edit Product') }}</h2>
                                        </div>
                                        {{-- @if (Session::has('error'))
                                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                        @endif
                                        @if (Session::has('error'))
                                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                        @endif --}}
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('adminUpdateProduct', $id_product) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                {{-- @method('PUT') --}}
                                                <div class="form-group row mt-3">
                                                    <label for="name"
                                                        class="col-md-4 col-form-label text-md-right">Status</label>
                                                    <div class="form-check form-switch mb-4 col-md-6 ">
                                                        <input class="form-check-input ms-5" type="checkbox" role="switch"
                                                            id="flexSwitchStock" name="status"
                                                            {{ $id_product->status ? 'checked' : '' }}>
                                                        <label class="form-check-label ms-3"
                                                            for="flexSwitchStock">{{ $id_product->status ? 'Active' : 'Deactive' }}</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-3">
                                                    <label for="name"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" value="{{ $id_product->name }}" required
                                                            autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="id_type"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                                                    <div class="col-md-6">
                                                        <select id="id_type" name="id_type"
                                                            class="form-control @error('id_type') is-invalid @enderror"
                                                            required>
                                                            {{-- <option value="">-- Select Type --</option> --}}
                                                            @foreach ($types as $type)
                                                                <option value="{{ $type->id_type }}"
                                                                    {{ $id_product->TypeProduct->id_type == $type->id_type ? 'selected' : '' }}>
                                                                    {{ $type->type }}</option>
                                                            @endforeach
                                                        </select>

                                                        @error('id_type')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="description"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                                    <div class="col-md-6">
                                                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ $id_product->description }}</textarea>

                                                        @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="quantity"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="quantity" type="number"
                                                            class="form-control @error('quantity') is-invalid @enderror"
                                                            name="quantity" value="{{ $id_product->quantity }}" required>

                                                        @error('quantity')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="original_price"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Original Price') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="original_price" type="number"
                                                            class="form-control @error('original_price') is-invalid @enderror"
                                                            name="original_price"
                                                            value="{{ $id_product->Expense->last()->costs }}">

                                                        @error('original_price')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="price"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="price" type="number"
                                                            class="form-control @error('price') is-invalid @enderror"
                                                            name="price" value="{{ $id_product->price }}" required>

                                                        @error('price')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="sale"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Sale') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="sale" type="number"
                                                            class="form-control @error('sale') is-invalid @enderror"
                                                            name="sale" value="{{ $id_product->sale }}" required>

                                                        @error('sale')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group mt-5 row">
                                                    @for ($i = 0; $i < count($id_product->libraries); $i++)
                                                        <div class="col-3 d-flex flex-column">
                                                            <div class="position-relative">
                                                                <img src="{{ asset('images/products/' . $id_product->libraries[$i]->image) }}"
                                                                    alt="" style="max-width:100px; height:auto;"
                                                                    class="m-3">
                                                                <div
                                                                    class="position-absolute top-0 start-0 translate-middle ">
                                                                    <input type="checkbox" class="btn-check"
                                                                        id="btn-check-{{ $i }}"
                                                                        name="remove_image[]" autocomplete="off"
                                                                        value="{{ $i }}">
                                                                    <label for="btn-check-{{ $i }}"><i
                                                                            class="bi bi-x-circle text-danger fs-5"></i></label>
                                                                </div>
                                                            </div>
                                                            <input type="file" class="form5Example3 mb-3 form-control"
                                                                name="photos[]">
                                                            <div></div>
                                                        </div>
                                                    @endfor
                                                    @for ($i = 0; $i < 4 - count($id_product->libraries); $i++)
                                                        <div class="col-3 d-flex flex-column">
                                                            <input type="file"
                                                                class="form5Example3 mb-3 form-control"name="photos[]">
                                                            <div></div>
                                                        </div>
                                                    @endfor
                                                </div>

                                                <div class="form-group row mt-3 mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Save') }}
                                                        </button>
                                                        <a href="{{ route('adminProduct') }}"
                                                            class="btn btn-secondary">{{ __('Cancel') }}</a>
                                                    </div>
                                                </div>
                                            </form>
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
@section('admin-script')
    <script>
        $(document).ready(function() {
            $('.form5Example3').change(function() {
                let preview = $(this).next();
                preview.empty();
                var files = $(this)[0].files;
                var promises = [];
                // console.log(preview);
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var reader = new FileReader();
                    promises.push(new Promise(function(resolve, reject) {
                        reader.onload = function(event) {
                            var img = $('<img>').attr('src', event.target.result).attr(
                                'style',
                                'width:100px;');
                            preview.append(img);
                            resolve();
                        };
                        reader.onerror = function(event) {
                            reject(event.target.error);
                        };
                        reader.readAsDataURL(file);
                    }));
                }

                Promise.all(promises).then(function() {
                    console.log('All images loaded');
                }).catch(function(error) {
                    console.log(error);
                });
            });
            $(".btn-check").change(function() {
                if ($(this).is(':checked')) {
                    $(this).next().children().addClass('bi-x-circle-fill');
                    if ($(this).next().children().hasClass('bi-x-circle')) {
                        $(this).next().children().removeClass('bi-x-circle');
                    }
                } else {
                    $(this).next().children().addClass('bi-x-circle');
                    if ($(this).next().children().hasClass('bi-x-circle-fill')) {
                        $(this).next().children().removeClass('bi-x-circle-fill');
                    }
                }
            });
            $("#flexSwitchStock").change(function() {
                if ($(this).is(':checked')) {
                    $(this).next().html('Active');
                } else {
                    $(this).next().html('Deactivate');
                }
            })
            $("input[name='name']").on('focusout', function(e) {
                e.preventDefault();
                if ($(this).val().trim().length == 0) {
                    $(this).val('{{ $id_product->name }}');
                }
            })
            $("input[name=quantity]").on('focusout', function(e) {
                e.preventDefault();
                let validateNum = /^\d{1,10}$/;
                let currentVl = $(this).val();
                if (validateNum.test(currentVl) && (parseInt(currentVl) >= 100)) {
                    $(this).val(currentVl);
                } else {
                    $(this).val({{ $id_product->quantity }});
                }
            })
            $("input[name=price]").on('focusout', function(e) {
                e.preventDefault();
                let validateNum = /^\d{1,10}$/;
                let currentVl = $(this).val();
                if (validateNum.test(currentVl) && (parseInt(currentVl) >= 1000)) {
                    $(this).val(currentVl);
                } else {
                    $(this).val({{ $id_product->price }});
                }
            })
            $("input[name=original_price]").on('focusout', function(e) {
                e.preventDefault();
                let validateNum = /^\d{1,10}$/;
                let currentVl = $(this).val();
                if (validateNum.test(currentVl) && (parseInt(currentVl) >= 1000)) {
                    $(this).val(currentVl);
                } else {
                    $(this).val({{ $id_product->Expense->last()->costs }});
                }
            })
            $("input[name=sale]").on('focusout', function(e) {
                e.preventDefault();
                let validateNum = /^\d{1,10}$/;
                let currentVl = $(this).val();
                if (validateNum.test(currentVl) && (parseInt(currentVl) >= 0)) {
                    $(this).val(currentVl);
                } else {
                    $(this).val({{ $id_product->sale }});
                }
            })
        })
        // function previewImages() {
        // var preview = $("#image-preview");
        // preview.empty();
        // var files = $('#form5Example3')[0].files;
        // var promises = [];
        // for (var i = 0; i < files.length; i++) {
        //     var file = files[i];
        //     var reader = new FileReader();
        //     promises.push(new Promise(function(resolve, reject) {
        //         reader.onload = function(event) {
        //             var img = $('<img>').attr('src', event.target.result).attr('style',
        //                 'width:100px;');
        //             preview.append(img);
        //             resolve();
        //         };
        //         reader.onerror = function(event) {
        //             reject(event.target.error);
        //         };
        //         reader.readAsDataURL(file);
        //     }));
        // }

        // Promise.all(promises).then(function() {
        //     console.log('All images loaded');
        // }).catch(function(error) {
        //     console.log(error);
        // });
        // }
    </script>
@endsection
