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
                            <h2>Add New Product</h2>
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
                                        Add New Product
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
                                            <h2>{{ __('Add New Product') }}</h2>
                                        </div>

                                        <div class="card-body">
                                            <form method="POST" action="{{ route('admin.product.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group row mt-3">
                                                    <label for="name"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" value="{{ old('name') }}" required
                                                            autocomplete="name" autofocus>
                                                        <span id="check_name"></span>
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
                                                            <option value="">-- Select Type --</option>
                                                            @foreach ($types as $type)
                                                                @if ($type->status == 'Active')
                                                                    <option value="{{ $type->id_type }}"
                                                                        @if (old('id_type') == $type->id_type) selected @endif>
                                                                        {{ $type->type }}</option>
                                                                @endif
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
                                                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" >{{ old('description') }}</textarea>

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
                                                            name="quantity" value="{{ old('quantity') }}" required>

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
                                                            name="original_price" value="{{ old('original_price') }}"
                                                            required>

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
                                                            name="price" value="{{ old('price') }}" required>

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
                                                            name="sale" value="{{ old('sale') }}" required>

                                                        @error('sale')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="image"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Images') }}</label>

                                                    <div class="col-md-6">
                                                        <input type="file" id="form5Example3" name="photos[]" multiple
                                                            onchange="previewImages()">
                                                        <div id="image-preview"></div>
                                                    </div>
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

                        <script>
                            function previewImages() {
                                var preview = $('#image-preview');
                                preview.empty();
                                var files = $('#form5Example3')[0].files;
                                var promises = [];

                                for (var i = 0; i < files.length; i++) {
                                    var file = files[i];
                                    var reader = new FileReader();
                                    promises.push(new Promise(function(resolve, reject) {
                                        reader.onload = function(event) {
                                            var img = $('<img>').attr('src', event.target.result).attr('style',
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
                            }
                        </script>



                    </div>

                </div>
            </div>
    </main>
@endsection
@section('admin-script')
    <script>
        $(document).ready(function(){
            if($("input[name='name']").val().trim().length >0){
                $.get(window.location.origin+"/public/index.php/admin/ajax/check-product?name="+$("input[name='name']").val().trim(),function(data){
                    if(data){
                        $('#check_name').html(`Product name <a href='${data}'>`+$("input[name='name']").val()+"</a> has existed ");
                        $('#check_name').addClass('text-danger');
                        $("input[name='name']").addClass('is-invalid');
                    }else{
                        $('#check_name').html('');
                        $("input[name='name']").removeClass('is-invalid');
                    }
                })
            }
            $("input[name='name']").change(function(e){
                e.preventDefault();
                $.get(window.location.origin+"/public/index.php/admin/ajax/check-product?name="+$(this).val().trim(),function(data){
                    if(data){
                        $('#check_name').html(`Product name <a href='${data}'>`+$("input[name='name']").val()+"</a> has existed ");
                        $('#check_name').addClass('text-danger');
                        $("input[name='name']").addClass('is-invalid');
                    }else{
                        $('#check_name').html('');
                        $("input[name='name']").removeClass('is-invalid');
                    }
                })
            })
            $("input[name=quantity]").on('focusout',function(e){
                e.preventDefault();
                let validateNum =/^\d{1,10}$/;
                let currentVl = $(this).val();
                if(validateNum.test(currentVl) && (parseInt(currentVl) >0)){
                    $(this).removeClass('is-invalid');
                    $(this).val(currentVl);
                }else{
                    $(this).addClass('is-invalid');
                    $(this).val('');
                }
            })
            $("input[name=price]").on('focusout',function(e){
                e.preventDefault();
                let validateNum =/^\d{1,10}$/;
                let currentVl = $(this).val();
                if(validateNum.test(currentVl) && (parseInt(currentVl) >0)){
                    $(this).removeClass('is-invalid');
                    if(currentVl<1000){
                        currentVl *=1000;
                    }
                    $(this).val(currentVl);
                }else{
                    $(this).addClass('is-invalid');
                    $(this).val('');
                }
            })
            $("input[name=original_price]").on('focusout',function(e){
                e.preventDefault();
                let validateNum =/^\d{1,10}$/;
                let currentVl = $(this).val();
                if(validateNum.test(currentVl) && (parseInt(currentVl) >0)){
                    $(this).removeClass('is-invalid');
                    if(currentVl<1000){
                        currentVl *=1000;
                    }
                    $(this).val(currentVl);
                }else{
                    $(this).addClass('is-invalid');
                    $(this).val('');
                }
            })
            $("input[name=sale]").on('focusout',function(e){
                e.preventDefault();
                let validateNum =/^\d{1,10}$/;
                let currentVl = $(this).val();
                if(validateNum.test(currentVl) && (parseInt(currentVl) >=0)){
                    $(this).val(currentVl);
                }else{
                    $(this).val(0);
                }
            })
        })
    </script>
@endsection
