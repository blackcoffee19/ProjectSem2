@extends('admin.partials.master')
@section('admin-content')
    <main>
        <div class="container">
            <div class="row mb-8">
                <div class="col-md-12">
                    <div>
                        <!-- page header -->
                        <h2>Slides</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Slides</li>
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
                                <a href="{{ Route('adminSlides') }}">
                                    <button class="btn btn-primary">Back To Slide</button>
                                </a>
                                <a href="{{ Route('adminEditSlides', $id_slide->id_slide) }}">
                                    <button class="btn btn-info">Edit</button>
                                </a>
                            </div>
                            <br>
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
                                                <a href="" class="btn btn-dark mt-3">{{ $id_slide->btn_content }}
                                                    <i class="feather-icon icon-arrow-right ms-1"></i>
                                                </a>
                                                {{-- {{ route($id_slide->link, $id_slide->attr) }} --}}
                                            </div>
                                        </div>
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
