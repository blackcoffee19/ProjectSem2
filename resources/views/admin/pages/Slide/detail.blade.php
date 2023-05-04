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
                            <h2>Detail Slide</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Slide</li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ Route('adminSlides') }}" class="btn btn-light">Back To Sliders</a>
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
                        <div class="card-body p-6">
                            <div class="row">
                                <div class="col-12 col-md-12 mb-6 mb-lg-3">
                                    <div>
                                        <div
                                            style="background: url({{ asset('images/slider/' . $id_slide->image) }})no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
                                            <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                                                <span class="badge"
                                                    style="background-color: {{ $id_slide->alert_bg }}; color:{{ $id_slide->alert_color }}">{{ $id_slide->alert }}</span>
                                                <h2 class="display-5 fw-bold mt-4"
                                                    style="color:{{ $id_slide->title_color }}">
                                                    {{ $id_slide->title }}
                                                </h2>
                                                <p class="lead" style="color:{{ $id_slide->content_color }}">
                                                    {{ $id_slide->content }}</p>
                                                <a href="" class="btn mt-3"
                                                    style="background-color: {{ $id_slide->btn_bg_color }}; color:{{ $id_slide->btn_color }}">
                                                    {{ $id_slide->btn_content }}
                                                    <i class="feather-icon icon-arrow-right ms-1"></i>
                                                </a>
                                                {{-- {{ route($id_slide->link, $id_slide->attr) }} --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ Route('adminEditSlides', $id_slide->id_slide) }}">
                                <button class="btn btn-info" style="width: 100%">Edit</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
