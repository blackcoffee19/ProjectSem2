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
                            <h2>Detail Customers</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                            class="text-inherit">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Customers</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Customers</li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <a href="{{ Route('adminCustomers') }}" class="btn btn-light">Back to Customers</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-6 shadow border-0 row">
                <div class="col">
                    <div class="card-body p-6 ">
                        <h4 class="form-label">Customers Image</h4>
                        <div class="mb-4">
                            @if ($id_user->avatar)
                                <img src="{{ asset('images/avatar/' . $id_user->avatar) }}"style="width: 100%;">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body p-6 fs-2">
                        <label style="width: 200px;">
                            <strong>Name:</strong>
                        </label>
                        <label>
                            {{ $id_user->name }}
                        </label>
                    </div>
                    <div class="card-body p-6 fs-2">
                        <label style="width: 200px;">
                            <strong>Phone:</strong>
                        </label>
                        <label>
                            {{ $id_user->phone }}
                        </label>
                    </div>
                    <div class="card-body p-6 fs-2">
                        <label style="width: 200px;">
                            <strong>Email:</strong>
                        </label>
                        <label>
                            {{ $id_user->email }}
                        </label>
                    </div>

                    <div class="card-body p-6 fs-2">
                        <label style="width: 200px;">
                            <strong>Select:</strong>
                        </label>
                        <label>
                            @if ($id_user->admin == '0')
                                <span class="badge bg-light-primary text-dark-primary">User</span>
                            @elseif ($id_user->admin == '1')
                                <span class="badge bg-light-primary text-dark-danger">Admin</span>
                            @else
                                <span class="badge bg-light-primary text-dark-danger">Manager</span>
                            @endif
                        </label>
                    </div>


                    <div class="card-body p-6 fs-2">
                        <a href="{{ Route('adminEditCustomers', $id_user->id_user) }}">
                            <button type="submit" class="btn btn-primary" style="width: 100%">Edit</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
