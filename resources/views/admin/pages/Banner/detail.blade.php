@extends('admin.partials.master')
@section('admin-content')
    <main>
        <div class="container">
            <div class="row mb-8">
                <div class="col-md-12">
                    <div>
                        <!-- page header -->
                        <h2>Banner</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Banners</li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
                        <!-- card body -->
                        <div class="card-body p-6">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ Route('adminBanners') }}">
                                    <button class="btn btn-primary">Back To Banner</button>
                                </a>
                                <a href="{{ Route('adminEditBanners', $id_banner->id_banner) }}">
                                    <button class="btn btn-info">Edit</button>
                                </a>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 col-md-12 mb-6 mb-lg-3">
                                    <div>
                                        @if ($id_banner->id_banner == 1 || $id_banner->id_banner == 2)
                                            <div class="px-10 rounded"
                                                style="background:url({{ asset('/images/banner/' . $id_banner->image) }})no-repeat; background-size: cover; background-position: center; height:400px; padding: 100px">
                                                <div>
                                                    <span class="fw-bold mb-8 mx-10"
                                                        style="font-size: 50px; color:{{ $id_banner->title_color }}; ">{{ $id_banner->title }}</span>
                                                    <p class="mb-8 mx-10"
                                                        style="font-size: 20px; color:{{ $id_banner->content_color }};">
                                                        {{ $id_banner->content }}</p>
                                                    <a href="#!" class="btn btn-dark mx-10"
                                                        style="background-color: {{ $id_banner->btn_bg_color }}; color:{{ $id_banner->btn_color }};">{{ $id_banner->btn_content }}</a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col" style="margin: 0 0 0 400px;">
                                                <div class="rounded"
                                                    style="background:url({{ asset('images/banner/' . $id_banner->image) }})no-repeat; background-size: cover; height: 526px; width: 376px; padding-top: 150px; padding-left: 30px; ">
                                                    <div>
                                                        <h3 class="fw-bold " style="color:{{ $id_banner->title_color }}">
                                                            {{ $id_banner->title }}
                                                        </h3>
                                                        <p style="color:{{ $id_banner->content_color }}">
                                                            {{ $id_banner->content }}</p>
                                                        <a class="btn "
                                                            style="background-color: {{ $id_banner->btn_bg_color }};color:{{ $id_banner->btn_color }}; margin-top: 160px;">{{ $id_banner->btn_content }}<i
                                                                class="feather-icon icon-arrow-right ms-1"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
