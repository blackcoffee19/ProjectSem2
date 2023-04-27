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
                            <h2>Detail Category</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Categories</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Category</li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <a href="{{ Route('adminCategories') }}" class="btn btn-light">Back to Categories</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-6 shadow border-0 row">
                <div class="col">
                    <div class="card-body p-6 ">
                        <h4 class="form-label">Category Image</h4>
                        <div class="mb-4">
                            @if ($id_type->image)
                                <img src="{{ asset('images/category/' . $id_type->image) }}"style="width: 100%;">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body p-6 fs-2">
                        <label style="width: 200px;">
                            <strong>Name:</strong>
                        </label>
                        <label>
                            {{ $id_type->type }}
                        </label>
                    </div>
                    <div class="card-body p-6 fs-2">
                        <label style="width: 200px;">
                            <strong>Date:</strong>
                        </label>
                        <label>
                            {{ $id_type->created_at }}
                        </label>
                    </div>
                    <div class="card-body p-6 fs-2">
                        <label style="width: 200px;">
                            <strong>Status:</strong>
                        </label>
                        <label>
                            @if ($id_type->status == 'Active')
                                <span class="badge bg-light-primary text-dark-primary">{{ $id_type->status }}</span>
                            @else
                                <span class="badge bg-light-danger text-dark-danger">{{ $id_type->status }}</span>
                            @endif
                        </label>
                    </div>
                    <div class="card-body p-6 fs-2">
                        <a href="{{ Route('adminEditCategory', $id_type->id_type) }}">
                            <button type="submit" class="btn btn-primary" style="width: 100%">Edit</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
