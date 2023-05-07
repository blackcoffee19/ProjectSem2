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
                            <h2>Add New Category</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                            class="text-inherit">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Categories</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add New Category</li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <a href="{{ Route('adminCategories') }}" class="btn btn-light">Back to Categories</a>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ Route('adminStoreCategories') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-6 shadow border-0 row">
                    <div class="col">
                        <div class="card-body p-6 ">
                            <h4 class="mb-5 h5">Category Image</h4>
                            <div class="mb-4 d-flex">
                                <div class="position-relative">
                                    <input type="file" id="form5Example3" name="photo"
                                        onchange="document.getElementById('img-previewone').src = window.URL.createObjectURL(this.files[0]); document.getElementById('img-previewone').style.display = 'block'">
                                    <img id="img-previewone" style="margin-top: 20px; display: none; width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body p-6 ">
                            <h4 class="form-label">Category Name</h4>
                            <input type="text" name="type" class="form-control" placeholder="Category Name" required>
                        </div>
                        <div class="card-body p-6 ">
                            <h4 class="form-label">Date</h4>
                            <input type="date" name="created_at" class="form-control flatpickr"
                                placeholder="Select Date">
                        </div>
                        <div class="card-body p-6 ">
                            <h4 class="form-label" id="productSKU">Status</h4><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                                    value="Active" checked>
                                <label class="form-check-label" for="inlineRadio1">Active</label>
                            </div>
                            <!-- input -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                                    value="Disabled">
                                <label class="form-check-label" for="inlineRadio2">Disabled</label>
                            </div>
                        </div>
                        <div class="card-body p-6 ">
                            <button type="submit" class="btn btn-primary" style="width: 100%">Create</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </main>
@endsection
