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
                            <h2>New</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">New</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ Route('adminCreateNew') }}" class="btn btn-primary">Create New</a>
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
                                            <th>Order Code</th>
                                            <th>Title</th>
                                            <th>Id User</th>
                                            <th>Link</th>
                                            <th>Attr</th>
                                            <th>Created At</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news as $item)
                                            <tr>
                                                <td>{{ $item->id_news }}</td>
                                                <td>{{ $item->order_code }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->id_user }}</td>
                                                <td>{{ $item->link }}</td>
                                                <td>{{ $item->attr }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ Route('adminEditNew', $item->id_news) }}">
                                                                    <i class="bi bi-pencil-square me-3"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <form
                                                                    action="{{ Route('adminDeleteNew', $item->id_news) }}"
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
