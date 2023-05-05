@extends('admin.partials.master')
@section('admin-content')
    <main>
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <!-- pageheader -->
                        <div>
                            <h2>Edit Coupon</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Coupon</li>
                                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ Route('adminCoupon') }}" class="btn btn-light">Back To Coupon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <form action="{{ Route('adminUpdateCoupon', $id_coupon->id_coupon) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row ">
                    <div class="col-xl-12 col-12 mb-5">
                        <!-- card -->
                        <div class="card h-100 card-lg">
                            <!-- card body -->
                            <div class="card-body p-6">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="form-label">Title</h4>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $id_coupon->title }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="form-label">Code</h4>
                                            <input type="text" name="code" class="form-control"
                                                value="{{ $id_coupon->code }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="form-label">Discount</h4>
                                            <input type="text" name="discount" class="form-control"
                                                value="{{ $id_coupon->discount }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="form-label">Max</h4>
                                            <input type="text" name="max" class="form-control"
                                                value="{{ $id_coupon->max }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="form-label" id="productSKU">Status</h4><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" value="1"
                                                    checked>
                                                <label class="form-check-label" for="inlineRadio1">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status"
                                                    value="0">
                                                <label class="form-check-label" for="inlineRadio2">Disabled</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="form-label">Date</h4>
                                            <input type="date" name="created_at" class="form-control flatpickr"
                                                value="{{ $id_coupon->created_at }}">
                                        </div>
                                    </div>
                                    <div class="col-12 mt-10">
                                        <button type="submit" class="btn btn-info" style="width: 100%;">Save</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
