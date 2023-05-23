@extends('admin.partials.master')
@section('admin-content')
    <main>
        <div class="container">
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <!-- pageheader -->
                        <div>
                            <h2>Banners</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Banners</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ Route('adminAddBanners') }}" class="btn btn-primary">Add New Banner</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row ">
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
                                            <th>Images</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Status</th>
                                            <th>Type</th>
                                            <th>Created At</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($banners as $banner)
                                            <tr>
                                                <td>{{ $banner->id_banner }}</td>
                                                <td>
                                                    <img src="{{ asset('images/banner/' . $banner->image) }}"
                                                        alt="{{ $banner->image }}" style="width: 200px;">
                                                </td>
                                                <td><a
                                                        href="{{ Route('adminShowBanners', $banner->id_banner) }}">{{ $banner->title }}</a>
                                                </td>
                                                <td>{{ $banner->content }}</td>
                                                <td>
                                                    @if ($banner->status == 1)
                                                        <span class="btn bg-light-primary text-dark-primary">Active</span>
                                                    @else
                                                        <span class="btn bg-light-danger text-dark-danger">Disabled</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($banner->type == 1)
                                                        <span
                                                            class="btn bg-light-primary text-dark-primary">Horizontal</span>
                                                    @else
                                                        <span class="btn bg-light-danger text-dark-danger">Vertical</span>
                                                    @endif
                                                </td>
                                                <td>{{ $banner->updated_at }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ Route('adminShowBanners', $banner->id_banner) }}">
                                                                    <i class="bi bi-eye me-3"></i>Detail</a>
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ Route('adminEditBanners', $banner->id_banner) }}">
                                                                    <i class="bi bi-pencil-square me-3"></i>Edit</a>
                                                            </li>

                                                            <li>
                                                                <form
                                                                    action="{{ Route('adminDeleteBanners', $banner->id_banner) }}"
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
                                {{ $banners->links('pagination::bootstrap-5') }}
                            </div> --}}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
