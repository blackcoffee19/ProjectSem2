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
                            <h2>Edit Customers</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                            class="text-inherit">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Customers</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Customers</li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <a href="{{ Route('adminCustomers') }}" class="btn btn-light">Back to Customers</a>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('adminUpdateCustomers', $id_user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6 shadow border-0 row">
                    <div class="col">
                        <div class="card-body p-6 ">
                            <h4 class="form-label">Customers Image</h4>
                            <div class="mb-4">
                                @if ($id_user->avatar)
                                    <input type="file" id="form5Example3" name="photo"
                                        onchange="document.getElementById('img-previewone').src = window.URL.createObjectURL(this.files[0]); document.getElementById('img-previewone').style.display = 'block'">
                                    <div>
                                        <img src="{{ asset('images/avatar/' . $id_user->avatar) }}" id="img-previewone"
                                            style="margin-top: 20px; width: 100%;" name="avatar">
                                        <img src="{{ asset('images/avatar/' . $id_user->avatar) }}" id="img-previewone"
                                            style="margin-top: 20px; display: none; width: 100%;" name="avatar">
                                    </div>
                                @else
                                    <input type="file" id="form5Example3" name="photo"
                                        onchange="document.getElementById('img-preview2').src = window.URL.createObjectURL(this.files[0]); document.getElementById('img-preview2').style.display = 'block'">
                                    <img src="" id="img-preview2"
                                        style="margin-top: 20px; display: none; width: 100%;" name="avatar">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body p-6 ">
                            <h4 class="form-label">Customers Name</h4>
                            <input type="text" name="name" class="form-control" value="{{ $id_user->name }}" readonly>
                        </div>
                        <div class="card-body p-6 ">
                            <h4 class="form-label">Phone</h4>
                            <input type="tel" name="phone" class="form-control" value="{{ $id_user->phone }}"
                                required>
                        </div>
                        <div class="card-body p-6 ">
                            <h4 class="form-label">Email</h4>
                            <input type="email" name="email" class="form-control" value="{{ $id_user->email }}"
                                required>
                        </div>
                        <div class="card-body p-6 ">
                            <h4 class="form-label">Password</h4>
                            <input type="password" name="password" class="form-control" value="{{ $id_user->password }}"
                                required>
                        </div>


                        <div class="card-body p-6 ">
                            <h4 class="form-label">Select</h4><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="admin" id="user" value="0"
                                    checked>
                                <label class="form-check-label" for="inlineRadio1">User</label> &emsp;

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="admin" id="admin"
                                        value="1">
                                    <label class="form-check-label" for="inlineRadio1">Admin</label> &ensp;
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="admin" id="manager"
                                        value="2">
                                    <label class="form-check-label" for="inlineRadio1">Manager</label>
                                </div>

                            </div>
                            <div class="card-body p-6 ">
                                <button type="submit" class="btn btn-primary" style="width: 100%">Update</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </main>
@endsection
