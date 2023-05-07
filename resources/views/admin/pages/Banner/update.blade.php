@extends('admin.partials.master')
@section('admin-content')
    <main>
        <div class="container">
            <!-- row -->
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <!-- pageheader -->
                        <div>
                            <h2>Edit Banner</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Banners</li>
                                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ Route('adminBanners') }}" class="btn btn-light">Back To Banner</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <form action="{{ route('adminUpdateBanners', $id_banner) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row ">
                    <div class="col-xl-12 col-12 mb-5">
                        <!-- card -->
                        <div class="card h-100 card-lg">
                            <!-- card body -->
                            <div class="card h-100 card-lg p-6">
                                <div class="card-body"> {{-- {{ Route('updateBanner', $id_banner->id) }} --}}
                                    <div class="row">
                                        <div class="col-6">
                                            <div>
                                                @if ($id_banner->id_banner == 1 || $id_banner->id_banner == 2)
                                                    <div class="py-10 px-8 rounded"
                                                        style="background:url({{ asset('/images/banner/' . $id_banner->image) }})no-repeat; background-size: cover; background-position: center;"
                                                        id="img-previewone">
                                                        <div>
                                                            <h3 class="fw-bold mb-1" id="title1"
                                                                style="color:{{ $id_banner->title_color }}">
                                                                {{ $id_banner->title }}
                                                            </h3>
                                                            <p class="mb-4" id="content1"
                                                                style="color:{{ $id_banner->content_color }}">
                                                                {{ $id_banner->content }}</p>
                                                            <a href="#!" class="btn"
                                                                style="background-color: {{ $id_banner->btn_bg_color }};color:{{ $id_banner->btn_color }};"
                                                                id="button1">{{ $id_banner->btn_content }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="py-10 px-8 rounded"
                                                        style="background:url({{ asset('/images/banner/' . $id_banner->image) }})no-repeat; background-size: cover; background-position: center; display: none;"
                                                        id="img-previewtwo">
                                                        <div>
                                                            <h3 class="fw-bold mb-1" id="title2"
                                                                style="color:{{ $id_banner->title_color }}">
                                                                {{ $id_banner->title }}
                                                            </h3>
                                                            <p class="mb-4" id="content2"
                                                                style="color:{{ $id_banner->content_color }}">
                                                                {{ $id_banner->content }}</p>
                                                            <a href="#!" class="btn"
                                                                style="background-color: {{ $id_banner->btn_bg_color }};color:{{ $id_banner->btn_color }};"
                                                                id="button2">{{ $id_banner->btn_content }}</a>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <span style="color:red">* Vui lòng chọn ảnh có kích thước 781 x
                                                        300 px</span>
                                                @else
                                                    <div class="rounded"
                                                        style="background:url({{ asset('/images/banner/' . $id_banner->image) }})no-repeat; background-size: cover; background-position: center; height: 526px; width: 376px; padding-top: 150px; padding-left: 30px; "
                                                        id="img-previewone">
                                                        <div>
                                                            <h3 class="fw-bold mb-1" id="title1"
                                                                style="color:{{ $id_banner->title_color }}">
                                                                {{ $id_banner->title }}
                                                            </h3>
                                                            <p class="mb-4" id="content1"
                                                                style="color:{{ $id_banner->content_color }}">
                                                                {{ $id_banner->content }}</p>
                                                            <a class="btn "
                                                                style="background-color: {{ $id_banner->btn_bg_color }};color:{{ $id_banner->btn_color }}; margin-top: 160px;"
                                                                id="button1">{{ $id_banner->btn_content }}<i
                                                                    class="feather-icon icon-arrow-right ms-1"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="rounded"
                                                        style="background:url({{ asset('/images/banner/' . $id_banner->image) }})no-repeat; background-size: cover; background-position: center; display: none; height: 526px; width: 376px; padding-top: 50px; padding-left: 30px; "
                                                        id="img-previewtwo">
                                                        <div>
                                                            <h3 class="fw-bold mb-1" id="title2">{{ $id_banner->title }}
                                                            </h3>
                                                            <p class="mb-4" id="content2">{{ $id_banner->content }}</p>
                                                            <a href="#!" class="btn"
                                                                style="background-color: {{ $id_banner->btn_bg_color }};color:{{ $id_banner->btn_color }}; margin-top: 160px;"
                                                                id="button2">{{ $id_banner->btn_content }}</a>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <span style="color:red">* Vui lòng chọn ảnh có kích thước 526 x
                                                        376 px</span>
                                                @endif
                                                <br>
                                                <br>
                                                <div class="d-grid gap-2">
                                                    <input type="file" id="form5Example3" name="photo"
                                                        onchange="document.getElementById('img-previewone').style.display = 'none'; document.getElementById('img-previewtwo').style.display = 'block'; document.getElementById('img-previewtwo').style.backgroundImage = 'url(' + window.URL.createObjectURL(this.files[0]) + ')';"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <h3>Title</h3>
                                                <div class="col-6">
                                                    <input type="text" class="form-control"
                                                        value="{{ $id_banner->title }}" id="textTitle"
                                                        oninput="changeText()" name="title">
                                                </div>
                                                <div class="col-6">
                                                    <input type="color" class="form-control form-control-color"
                                                        id="colorTitle" oninput="changeColor()" name="title_color"
                                                        value="{{ $id_banner->title_color }}">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <h3>Content</h3>
                                                <div class="col-6">
                                                    <textarea type="text" class="form-control"id="textContent" oninput="changeText()" name="content">{{ $id_banner->content }}</textarea>
                                                </div>
                                                <div class="col-6">
                                                    <input type="color" class="form-control form-control-color"
                                                        id="colorContent" oninput="changeColor()" name="content_color"
                                                        value="{{ $id_banner->content_color }}">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <h3>Button</h3>
                                                <div class="col-6">
                                                    <input type="text" class="form-control"
                                                        value="{{ $id_banner->btn_content }}" id="textButton"
                                                        oninput="changeText()" name="btn_content">
                                                </div>
                                                <div class="col-6">
                                                    <div style="float:left;">
                                                        <input type="color" class="form-control form-control-color"
                                                            id="colorBackgroundButton" oninput="changeColor()"
                                                            name="btn_bg_color" value="{{ $id_banner->btn_bg_color }}">
                                                    </div>
                                                    <div>
                                                        <input type="color" class="form-control form-control-color"
                                                            id="colorButton" oninput="changeColor()" name="btn_color"
                                                            value="{{ $id_banner->btn_color }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <h3>Link</h3>
                                                    <select name="link" class="form-control" required
                                                        id="link-select">
                                                        <option value="{{ $id_banner->link }}"
                                                            {{ $id_banner->link == $id_banner->id_banner ? 'selected' : '' }}>
                                                            {{ $id_banner->link }}
                                                        </option>
                                                        <option value="">Home</option>
                                                        <option value="user.pages.Products.index">All Product</option>
                                                        <option value="category">Category By Name</option>
                                                        <option value="products">Product By Name</option>
                                                    </select>
                                                </div>
                                                <div id="attr-div" class="col-6" style="display:none;">
                                                    <h3>Attr</h3>
                                                    <select name="attr" class="form-control" required
                                                        id="attr-select">
                                                        <option value="">--Select--</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <script>
                                                var selectBox = document.getElementById("link-select");
                                                var attrBox = document.getElementById("attr-div");
                                                var attrSelect = document.getElementById("attr-select");

                                                // Khởi tạo mảng categoryOptions
                                                var categoryOptions = [{
                                                        value: '1',
                                                        text: 'vegetable'
                                                    },
                                                    {
                                                        value: '2',
                                                        text: 'fruit'
                                                    },
                                                    {
                                                        value: '3',
                                                        text: 'meat'
                                                    }
                                                ];

                                                // Khởi tạo mảng productOptions
                                                var productOptions = [{
                                                        value: '1',
                                                        text: 'Corn'
                                                    }, {
                                                        value: '2',
                                                        text: 'calabash'
                                                    }, {
                                                        value: '3',
                                                        text: 'pumkin'
                                                    }, {
                                                        value: '4',
                                                        text: 'tomato'
                                                    }, {
                                                        value: '5',
                                                        text: 'carrot'
                                                    },
                                                    {
                                                        value: '6',
                                                        text: 'eggplant'
                                                    }, {
                                                        value: '7',
                                                        text: 'White radish'
                                                    }, {
                                                        value: '8',
                                                        text: 'onion'
                                                    }, {
                                                        value: '9',
                                                        text: 'bell pepper'
                                                    }, {
                                                        value: '10',
                                                        text: 'Lettuce'
                                                    },
                                                    {
                                                        value: '11',
                                                        text: 'coconut'
                                                    }, {
                                                        value: '12',
                                                        text: 'watermelon'
                                                    }, {
                                                        value: '13',
                                                        text: 'pear'
                                                    }, {
                                                        value: '14',
                                                        text: 'plum'
                                                    }, {
                                                        value: '15',
                                                        text: 'mangosteen'
                                                    },
                                                    {
                                                        value: '16',
                                                        text: 'durian'
                                                    }, {
                                                        value: '17',
                                                        text: 'apple'
                                                    }, {
                                                        value: '18',
                                                        text: 'pinapple'
                                                    }, {
                                                        value: '19',
                                                        text: 'litchi'
                                                    }, {
                                                        value: '20',
                                                        text: 'mango'
                                                    },
                                                    {
                                                        value: '21',
                                                        text: 'beef'
                                                    }, {
                                                        value: '22',
                                                        text: 'plaice'
                                                    }, {
                                                        value: '23',
                                                        text: 'Snakehead fish'
                                                    }, {
                                                        value: '24',
                                                        text: 'tuna'
                                                    }, {
                                                        value: '25',
                                                        text: 'mackerel'
                                                    },
                                                    {
                                                        value: '26',
                                                        text: 'goat'
                                                    }, {
                                                        value: '27',
                                                        text: 'chicken'
                                                    }, {
                                                        value: '28',
                                                        text: 'pork'
                                                    }, {
                                                        value: '29',
                                                        text: 'lamb'
                                                    }, {
                                                        value: '30',
                                                        text: 'Buffalo'
                                                    },
                                                ];

                                                // Lắng nghe sự kiện thay đổi trên selectBox
                                                selectBox.addEventListener("change", function() {
                                                    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

                                                    if (selectedValue === "category") {
                                                        attrSelect.innerHTML = '';
                                                        categoryOptions.forEach(function(option) {
                                                            var newOption = document.createElement('option');
                                                            newOption.value = option.value;
                                                            newOption.text = option.text;
                                                            attrSelect.add(newOption);
                                                        });
                                                        attrBox.style.display = "block";
                                                    } else if (selectedValue === "products") {
                                                        attrSelect.innerHTML = '';
                                                        productOptions.forEach(function(option) {
                                                            var newOption = document.createElement('option');
                                                            newOption.value = option.value;
                                                            newOption.text = option.text;
                                                            attrSelect.add(newOption);
                                                        });
                                                        attrBox.style.display = "block";
                                                    } else {
                                                        attrBox.style.display = "none";
                                                    }
                                                });
                                            </script>

                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info" style="100%">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
            var input = document.getElementById("textTitle");
            var title1 = document.getElementById("title1");
            var title2 = document.getElementById("title2");
            title1.innerHTML = input.value;
            title2.innerHTML = input.value;

            var input = document.getElementById("textContent");
            var content1 = document.getElementById("content1");
            var content2 = document.getElementById("content2");
            content1.innerHTML = input.value;
            content2.innerHTML = input.value;

            var input = document.getElementById("textButton");
            var button1 = document.getElementById("button1");
            var button2 = document.getElementById("button2");
            button1.innerHTML = input.value;
            button2.innerHTML = input.value;
        }

        function changeColor() {
            var inputColor = document.querySelector('#colorTitle');
            var title1 = document.getElementById("title1");
            var title2 = document.getElementById("title2");
            title1.style.color = inputColor.value;
            title2.style.color = inputColor.value;

            var inputColor = document.querySelector('#colorContent');
            var content1 = document.getElementById("content1");
            var content2 = document.getElementById("content2");
            content1.style.color = inputColor.value;
            content2.style.color = inputColor.value;

            var inputColor = document.querySelector('#colorBackgroundButton');
            var button1 = document.getElementById("button1");
            var button2 = document.getElementById("button2");
            button1.style.backgroundColor = inputColor.value;
            button2.style.backgroundColor = inputColor.value;

            var inputColor = document.querySelector('#colorButton');
            var button1 = document.getElementById("button1");
            var button2 = document.getElementById("button2");
            button1.style.color = inputColor.value;
            button2.style.color = inputColor.value;
        }

        // ---------------------
    </script>
@endsection
