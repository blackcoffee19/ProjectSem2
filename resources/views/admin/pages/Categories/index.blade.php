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
                            <h2>Categories</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ Route('adminAddCategories') }}" class="btn btn-primary">Add New Category</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class=" px-6 py-6 ">
                            <div class="row justify-content-between">
                                <div class="col-lg-4 col-md-6 col-12 mb-2 mb-md-0">
                                    <!-- form -->
                                    <form action="{{ Route('category.findByName') }}" class="d-flex" role="search">
                                        <input class="form-control" type="search" placeholder="Search Category"
                                            aria-label="Search" name="type">
                                        <button class="btn btn-primary" value="Search"><i
                                                class="fas fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="col-xl-2 col-md-4 col-12">
                                    <form action="{{ Route('category.findByName') }}" class="d-flex" role="search">
                                        <select class="form-select" name="status" onchange="this.form.submit()">
                                            <option value="">Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Disabled">Disabled</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                            <!-- table -->
                            <div class="table-responsive ">
                                <table
                                    class="table table-centered table-hover mb-0 text-nowrap table-borderless table-with-checkbox">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Created_at</th>
                                            <th>Status</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="product-table">
                                        @foreach ($cats as $item)
                                            <tr>

                                                <td>
                                                    {{ $item->id_type }}
                                                </td>
                                                <td>
                                                    <a href="#!"> <img
                                                            src="{{ asset('images/category/' . $item->image) }}"
                                                            alt="" class="icon-shape icon-sm"></a>
                                                </td>
                                                <td><a href="#" class="text-reset">{{ $item->type }}</a></td>

                                                <td>{{ $item->created_at }}</td>

                                                <td>
                                                    @if ($item->status == 'Active')
                                                        <span
                                                            class="btn bg-light-primary text-dark-primary">{{ $item->status }}</span>
                                                    @else
                                                        <span
                                                            class="btn bg-light-danger text-dark-danger">{{ $item->status }}</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">

                                                            {{-- <li>
                                                                <a class="dropdown-item" href=""
                                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                                    <i class="bi bi-eye me-3" data-bs-toggle="tooltip"
                                                                        data-bs-html="true"></i>Detail</a>
                                                            </li> --}}
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ Route('adminShowCategory', $item->id_type) }}">
                                                                    <i class="bi bi-eye me-3"></i>Detail</a>
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ Route('adminEditCategory', $item->id_type) }}">
                                                                    <i class="bi bi-pencil-square me-3"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <form
                                                                    action="{{ Route('adminDeleteCategory', $item->id_type) }}"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Modal -->
    <div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true" style="z-index: 1200">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="shadow border-0 row">
                    <div class="col">
                        <div class="card-body p-6 ">
                            <h4 class="form-label">Category Image</h4>
                            <img src="" alt="Hình ảnh ở đây" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body p-6 ">
                            <h4 class="form-label">Category Name</h4>
                        </div>
                        <div class="card-body p-6 ">
                            <h4 class="form-label">Date</h4>
                        </div>
                        <div class="card-body p-6 ">
                            <h4 class="form-label" id="productSKU">Status</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
