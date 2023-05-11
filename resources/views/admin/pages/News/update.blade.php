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
                            <h2>Update New</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">New</li>
                                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ Route('adminNew') }}" class="btn btn-light">Back To New</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <form action="{{ Route('adminUpdateNew', $id_news->id_news) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row ">
                    <div class="col-xl-12 col-12 mb-5">
                        <!-- card -->
                        <div class="card h-100 card-lg">
                            <!-- card body -->
                            <div class="card-body p-6">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="form-label">Order code</h4>
                                            <input type="text" name="order_code" class="form-control"
                                                value="{{ $id_news->order_code }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="form-label" style="color: red">Title *</h4>
                                            <textarea type="text" name="title" class="form-control" required>{{ $id_news->title }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="form-label">Id user</h4>
                                            <input type="number" name="id_user" class="form-control"
                                                value="{{ $id_news->id_user }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="form-label" style="color: red">Link *</h4>
                                            <input type="text" name="link" class="form-control"
                                                value="{{ $id_news->link }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="form-label">Attr</h4>
                                            <input type="text" name="attr" class="form-control"
                                                value="{{ $id_news->attr }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="form-label">Send admin</h4>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="send_admin"
                                                    value="0" checked>
                                                <label class="form-check-label" for="inlineRadio1">Default</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="send_admin"
                                                    value="1">
                                                <label class="form-check-label" for="inlineRadio1">Not Default</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-10">
                                        <button type="submit" class="btn btn-info" style="width: 100%;">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    {{-- ==========//========== --}}
@endsection
