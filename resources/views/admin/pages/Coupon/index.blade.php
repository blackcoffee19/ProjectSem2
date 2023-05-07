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
                            <h2>Coupon</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Coupon</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ Route('adminAddCoupon') }}" class="btn btn-primary">Add New Coupon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row ">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <!-- card body -->
                        <div class="card-body p-0">
                            <!-- table -->
                            <div class="table-responsive">
                                <table
                                    class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Code</th>
                                            <th>Discount</th>
                                            <th>Max</th>
                                            <th>Dtatus</th>
                                            <th>Created At</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $coupon)
                                            <tr>
                                                <td>{{ $coupon->id_coupon }}</td>
                                                <td>{{ $coupon->title }}</td>
                                                <td>{{ $coupon->code }}</td>
                                                <td>{{ number_format($coupon->discount), 0 }} đ</td>
                                                <td>{{ $coupon->max }}</td>
                                                <td>
                                                    @if ($coupon->status == 1)
                                                        <span class="btn bg-light-primary text-dark-primary">Active</span>
                                                    @else
                                                        <span class="btn bg-light-danger text-dark-danger">Disabled</span>
                                                    @endif
                                                </td>
                                                <td>{{ $coupon->created_at }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ Route('adminEditCoupon', $coupon->id_coupon) }}">
                                                                    <i class="bi bi-pencil-square me-3"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <form
                                                                    action="{{ Route('adminDeleteCoupon', $coupon->id_coupon) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="bi bi-trash me-3"></i>Delete
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                            {{-- <div class="p-5">
                                {{ $slides->links('pagination::bootstrap-5') }}
                            </div> --}}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
