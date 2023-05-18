@extends('admin.partials.master')
@section('admin-content')
    <main>
        <div class="container">
            <div class="row mb-8">
                <div class="col-md-12">
                    <!-- page header -->
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <h2>Products</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ Route('adminAddProduct') }}" class="btn btn-primary">Add Product</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row ">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="px-6 py-6 ">
                            <form action="{{ Route('product.findByName') }}" class="container-fluid" role="search">
                                <div class="row justify-content-between">
                                    <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0 ">
                                        <div class="input-group">
                                            <input class="form-control" type="search" placeholder="Search Product"
                                                aria-label="Search" name="name">
                                            <button class="btn btn-primary" value="Search"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-md-2 col-12">
                                        <select class="form-select" name="status_sl" id="status_sl" onchange="this.form.submit()">
                                            <option value="desc" {{isset($status_sl) && $status_sl == 'desc'?"selected":''}}>Active</option>
                                            <option value="asc" {{isset($status_sl) && $status_sl == 'asc'?"selected":''}}>Deactivate</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-md-4 col-12">
                                        <select class="form-select" name="type_product" onchange="this.form.submit()">
                                            <option value="">All</option>
                                            @foreach ($types as $type)
                                                @if ($type->status == 'Active')
                                                    <option value="{{ $type->id_type }}" {{(isset($type_product) && $type_product == $type->id_type) ? "selected":''}}>{{ $type->type }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                            <!-- table -->
                            @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                            <div class="table-responsive">
                                <table
                                    class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>Image</th>
                                            <th>Proudct Name</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Create at</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prods as $item)
                                            <tr>
                                                <td>{{ $item->id_product }}</td>
                                                <td>
                                                    @foreach ($item->libraries as $library)
                                                        <img src="{{ asset('images/products/' . $library['image']) }}"
                                                            alt="" style="width:50px; height:auto;">
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{ route('adminShowProduct', $item->id_product) }}">
                                                        {{ $item->name }}
                                                    </a>
                                                </td>

                                                <td>
                                                    {{ $item->typeproduct->type }}
                                                </td>
                                                <td>
                                                    @if ($item->status == '1')
                                                        <span class="btn bg-light-primary text-dark-primary">Active</span>
                                                    @else
                                                        <span class="btn bg-light-danger text-dark-danger">Deactivate</span>
                                                    @endif
                                                </td>
                                                <td>{{ number_format($item->price, 0) }}đ</td>
                                                <td>{{ number_format($item->quantity, 0) }}g</td>
                                                <td>{{ date_format($item->created_at, 'j/m/Y') }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            {{-- <i class="fa-solid fa-ellipsis-vertical fs-5"></i> --}}
                                                            <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item"
                                                                    href="{{ Route('adminShowProduct', $item->id_product) }}"><i
                                                                        class="bi bi-eye me-3 "></i>Detail</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ Route('adminEditProduct', $item->id_product) }}"><i
                                                                        class="bi bi-pencil-square me-3 "></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <form
                                                                    action="{{ Route('adminDeleteProduct', $item->id_product) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="bi bi-trash me-3"></i>Delete
                                                                    </button>
                                                                </form>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-5">
                                {{ $prods->links('user.pagination.cus_pagination') }}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>
@endsection
