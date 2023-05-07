@extends('admin.partials.master')
@section('admin-content')
    <main>
        <div class="container">
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <h2>Customers</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Customers
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <a href="#!" class="btn btn-primary">Add New Customer</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-12 mb-5">
                    <div class="card h-100 card-lg">
                        <div class="p-6">
                            <div class="row justify-content-between">
                                <div class="col-md-4 col-12">
                                    <form class="d-flex" role="search">
                                        <input class="form-control" type="search" placeholder="Search Customers"
                                            aria-label="Search" />
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table
                                    class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Purchase Date</th>
                                            <th>Phone</th>
                                            <th>Spent</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{ $customer->id_user }}</td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ($customer->avatar != null)
                                                            <img src="{{ asset('images/avatar/' . $customer->avatar) }}"
                                                                alt="" class="avatar avatar-xs rounded-circle" />
                                                        @else
                                                            <img src="{{ asset('images/avatar/user.png') }}" alt=""
                                                                class="avatar avatar-xs rounded-circle" />
                                                        @endif

                                                        <div class="ms-2">
                                                            <a href="#" class="text-inherit">{{ $customer->name }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $customer->email }}</td>

                                                <td>{{ $customer->created_at }}</td>
                                                <td>{{ $customer->phone }}</td>
                                                <td>-</td>

                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="#"><i
                                                                        class="bi bi-trash me-3"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#"><i
                                                                        class="bi bi-pencil-square me-3"></i>Edit</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="p-5">
                                {{ $customers->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
