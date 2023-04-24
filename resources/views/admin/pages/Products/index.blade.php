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
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                            <div class="row justify-content-between">
                                <!-- form -->
                                <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0">
                                    <form action="{{ Route('product.findByName') }}" class="d-flex" role="search">
                                        <input class="form-control" type="search" placeholder="Search Product"
                                            aria-label="Search" name="name">
                                        <button class="btn btn-primary" value="Search"><i
                                                class="fas fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="col-xl-2 col-md-4 col-12">
                                    <form action="{{ route('product.findByName') }}" class="d-flex">
                                        <select class="form-select" name="status" onchange="this.form.submit()">
                                            <option value="">Type</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id_type }}">{{ $type->type }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                            <!-- table -->
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
                                            <th>Create at</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prods as $item)
                                            <tr>
                                                <td>{{ $item->id_product }}</td>
                                                <td>
                                                    @foreach (array_reverse($item->libraries->toArray()) as $library)
                                                        <img src="{{ asset('images/products/' . $library['image']) }}"
                                                            alt="" style="width:50px; height:auto;">
                                                    @endforeach
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    {{ $item->typeproduct->type }}
                                                </td>
                                                <td>
                                                    @if ($item->status == '1')
                                                        <span class="btn bg-light-primary text-dark-primary">Active</span>
                                                    @else
                                                        <span class="btn bg-light-danger text-dark-danger">Desable</span>
                                                    @endif
                                                </td>
                                                <td>{{ number_format($item->price, 0) }}</td>
                                                <td>{{ $item->created_at }}</td>
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
                                {{-- {{ $prods->links('pagination::bootstrap-5') }} --}}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>
@endsection
