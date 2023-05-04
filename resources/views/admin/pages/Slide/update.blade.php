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
                            <h2>Banner</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sliders</li>
                                    <li class="breadcrumb-item active" aria-current="page">Update</li>
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
                        <div class="card h-100 card-lg">
                            <div class="card-body p-6"> {{-- {{ Route('updateBanner', $id_banner->id) }} --}}
                                <form action="{{ route('adminUpdateSlides', $id_slide) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row p-5">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="file" id="form5Example3" name="photo"
                                                        onchange="document.getElementById('img-previewone').style.display = 'none'; document.getElementById('img-previewtwo').style.display = 'block'; document.getElementById('img-previewtwo').style.backgroundImage = 'url(' + window.URL.createObjectURL(this.files[0]) + ')';"
                                                        class="form-control">
                                                </div>
                                                <div class="col-6">
                                                    <span style="color: red">* Vui lòng chọn ảnh có kích thước 1660 x
                                                        625</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="dropdown">
                                                <button class="btn btn-info" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Edit Sliders
                                                </button>
                                                <ul class="dropdown-menu" style="width: 100%;">
                                                    <li>
                                                        <h3>Alert</h3>
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $id_slide->alert }}" id="alert_text"
                                                                    oninput="changeText()" name="alert">
                                                            </div>
                                                            <div class="col-2">
                                                                <input type="color"
                                                                    class="form-control form-control-color" id="alert_color"
                                                                    oninput="changeColor()" name="alert_color">
                                                            </div>
                                                            <div class="col-2">
                                                                <input type="color"
                                                                    class="form-control form-control-color" id="alert_bg"
                                                                    oninput="changeColor()" name="alert_bg">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <h3>Title</h3>
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $id_slide->title }}" id="title_text"
                                                                    oninput="changeText()" name="title">
                                                            </div>
                                                            <div class="col-2">
                                                                <input type="color"
                                                                    class="form-control form-control-color" id="title_color"
                                                                    oninput="changeColor()" name="title_color">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <h3>Content</h3>
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $id_slide->content }}" id="content_text"
                                                                    oninput="changeText()" name="content">
                                                            </div>
                                                            <div class="col-2">
                                                                <input type="color"
                                                                    class="form-control form-control-color"
                                                                    id="content_color" oninput="changeColor()"
                                                                    name="content_color">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <h3>Button</h3>
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $id_slide->btn_content }}" id="btn_content"
                                                                    oninput="changeText()" name="btn_content">
                                                            </div>
                                                            <div class="col-2">
                                                                <input type="color"
                                                                    class="form-control form-control-color" id="btn_color"
                                                                    oninput="changeColor()" name="btn_color">
                                                            </div>
                                                            <div class="col-2">
                                                                <input type="color"
                                                                    class="form-control form-control-color"
                                                                    id="btn_bg_color" oninput="changeColor()"
                                                                    name="btn_bg_color">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h3>Link</h3>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $id_slide->link }}"name="link">
                                                            </div>
                                                            <div class="col-6">
                                                                <h3>Attr</h3>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $id_slide->attr }}"name="attr">
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-12 mb-6 mb-lg-3">
                                            <div style="background: url({{ asset('images/slider/' . $id_slide->image) }})no-repeat; background-size: cover; border-radius: .5rem; background-position: center;"
                                                id="img-previewone">
                                                <div
                                                    class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                                                    <span class="badge"
                                                        style="background-color: {{ $id_slide->alert_bg }}; color:{{ $id_slide->alert_color }}"
                                                        id="alert1">{{ $id_slide->alert }}</span>
                                                    <h2 class="display-5 fw-bold mt-4"
                                                        style="color:{{ $id_slide->title_color }}" id="title1">
                                                        {{ $id_slide->title }}
                                                    </h2>
                                                    <p class="lead" style="color:{{ $id_slide->content_color }}"
                                                        id="content1">
                                                        {{ $id_slide->content }}</p>
                                                    <a href="" class="btn btn-dark mt-3"
                                                        id="button1">{{ $id_slide->btn_content }}
                                                        <i class="feather-icon icon-arrow-right ms-1"></i>
                                                    </a>
                                                    {{-- {{ route($id_slide->link, $id_slide->attr) }} --}}
                                                </div>
                                            </div>
                                            <div style="background: url({{ asset('images/slider/' . $id_slide->image) }})no-repeat; background-size: cover; border-radius: .5rem; background-position: center; display: none;"
                                                id="img-previewtwo">
                                                <div
                                                    class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                                                    <span class="badge"
                                                        style="background-color: {{ $id_slide->alert_bg }}; color:{{ $id_slide->alert_color }}"
                                                        id="alert2">{{ $id_slide->alert }}</span>
                                                    <h2 class="display-5 fw-bold mt-4"
                                                        style="color:{{ $id_slide->title_color }}" id="title2">
                                                        {{ $id_slide->title }}
                                                    </h2>
                                                    <p class="lead" style="color:{{ $id_slide->content_color }}"
                                                        id="content2">
                                                        {{ $id_slide->content }}</p>
                                                    <a href="" class="btn btn-dark mt-3"
                                                        id="button2">{{ $id_slide->btn_content }}
                                                        <i class="feather-icon icon-arrow-right ms-1"></i>
                                                    </a>
                                                    {{-- {{ route($id_slide->link, $id_slide->attr) }} --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info" style="width: 100%;">Save</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            // Thay đổi ảnh khi chọn file
            $('#image').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#title-display').text($('#title').val());
                    $('#content-display').text($('#content').val());
                    $('#btn-content-display').text($('#btn_content').val());
                    $('.px-10').css('background-image', 'url(' + e.target.result + ')');
                };
                reader.readAsDataURL(this.files[0]);
            });
        });

        function changeText() {
            var input = document.getElementById("alert_text");
            var alert1 = document.getElementById("alert1");
            var alert2 = document.getElementById("alert2");
            alert1.innerHTML = input.value;
            alert2.innerHTML = input.value;

            var input = document.getElementById("title_text");
            var title1 = document.getElementById("title1");
            var title2 = document.getElementById("title2");
            title1.innerHTML = input.value;
            title2.innerHTML = input.value;

            var input = document.getElementById("content_text");
            var content1 = document.getElementById("content1");
            var content2 = document.getElementById("content2");
            content1.innerHTML = input.value;
            content2.innerHTML = input.value;

            var input = document.getElementById("btn_content");
            var button1 = document.getElementById("button1");
            var button2 = document.getElementById("button2");
            button1.innerHTML = input.value;
            button2.innerHTML = input.value;
        }

        function changeColor() {
            var inputColor = document.querySelector('#alert_color');
            var alert1 = document.getElementById("alert1");
            var alert2 = document.getElementById("alert2");
            alert1.style.color = inputColor.value;
            alert2.style.color = inputColor.value;

            var inputColor = document.querySelector('#alert_bg');
            var alert1 = document.getElementById("alert1");
            var alert2 = document.getElementById("alert2");
            alert1.style.backgroundColor = inputColor.value;
            alert2.style.backgroundColor = inputColor.value;


            var inputColor = document.querySelector('#title_color');
            var title1 = document.getElementById("title1");
            var title2 = document.getElementById("title2");
            title1.style.color = inputColor.value;
            title2.style.color = inputColor.value;

            var inputColor = document.querySelector('#content_color');
            var content1 = document.getElementById("content1");
            var content2 = document.getElementById("content2");
            content1.style.color = inputColor.value;
            content2.style.color = inputColor.value;

            var inputColor = document.querySelector('#btn_color');
            var button1 = document.getElementById("button1");
            var button2 = document.getElementById("button2");
            button1.style.color = inputColor.value;
            button2.style.color = inputColor.value;

            var inputColor = document.querySelector('#btn_bg_color');
            var button1 = document.getElementById("button1");
            var button2 = document.getElementById("button2");
            button1.style.backgroundColor = inputColor.value;
            button2.style.backgroundColor = inputColor.value;
        }
    </script>
@endsection
