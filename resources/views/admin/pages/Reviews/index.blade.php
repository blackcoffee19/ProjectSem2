@extends('admin.partials.master')
@section('admin-content')
    <main>
        <div class="container">
            <div class="row mb-8">
                <div class="col-md-12">
                    <div>
                        <!-- page header -->
                        <h2>Reviews</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Reviews</li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row ">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="p-6 ">
                            <div class="row justify-content-between">
                                <div class="col-md-4 col-12 mb-2 mb-md-0">
                                    <!-- form -->
                                    <form action="{{ Route('review.findByName') }}" class="d-flex" role="search">
                                        <input class="form-control" type="search" placeholder="Search Rating"
                                            aria-label="Search" name="product">
                                        <button class="btn btn-primary" value="Search"><i
                                                class="fas fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="col-lg-2 col-md-4 col-12">
                                    <form action="{{ Route('review.findByName') }}" class="d-flex" role="search">
                                        <select class="form-select" name="rating" onchange="this.form.submit()">
                                            <option selected>Select Rating</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            <option value="4">Four</option>
                                            <option value="5">Five</option>
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
                                    class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>Product</th>
                                            <th>Name</th>
                                            <th>Reviews</th>
                                            <th>Rating</th>
                                            <th>Date</th>
                                            {{-- <th></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                            <tr>
                                                <td>{{ $review->id_comment }}</td>

                                                <td><a href="{{ route('products-details', $review->id_product) }}"
                                                        class="text-reset">{{ $review->product->name }}</a>
                                                </td>
                                                <td>{{ $review->user->name }}</td>

                                                <td>
                                                    <span class="text-truncate">{{ $review->context }}</span>
                                                </td>
                                                <td>
                                                    @if ($review->rating == 1)
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                        <span><i class="bi bi-star-fill text-light"></i></span>
                                                        <span><i class="bi bi-star-fill text-light"></i></span>
                                                        <span><i class="bi bi-star-fill text-light"></i></span>
                                                        <span><i class="bi bi-star-fill text-light"></i></span>
                                                    @elseif ($review->rating == 2)
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                        <span><i class="bi bi-star-fill text-light"></i></span>
                                                        <span><i class="bi bi-star-fill text-light"></i></span>
                                                        <span><i class="bi bi-star-fill text-light"></i></span>
                                                    @elseif ($review->rating == 3)
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                        <span><i class="bi bi-star-fill text-light"></i></span>
                                                        <span><i class="bi bi-star-fill text-light"></i></span>
                                                    @elseif ($review->rating == 4)
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                        <span><i class="bi bi-star-fill text-light"></i></span>
                                                    @else
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                        <span><i class="bi bi-star-fill text-warning"></i></span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $review->created_at }}
                                                </td>
                                                {{-- <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">\
                                                            <li><a class="dropdown-item" href="#"><i
                                                                        class="bi bi-pencil-square me-3 "></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#"><i
                                                                        class="bi bi-trash me-3"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                            <div class="p-5">
                                {{ $reviews->links('pagination::bootstrap-5') }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
