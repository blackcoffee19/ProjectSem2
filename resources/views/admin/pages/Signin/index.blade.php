<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta content="Codescandy" name="author">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-M8S4MT3EYG');
    </script>

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon/favicon.ico') }}">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('css/simplebar.min.css') }}" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">


    <title>Admin - Sign In</title>
</head>

<body>
    <div class="main-wrapper">
        <section class=" {{Session::has('permission_deinied') || Session::has('error')? 'my-lg-13 my-13':'my-lg-16 my-16'}}  mx-10">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    @if (Session::has('permission_deinied'))
                    <div class="col-12 row mb-5">
                        <div class="alert alert-danger col-lg-6 col-md-12 mx-auto">{{Session::get('permission_deinied')}}</div>
                    </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="col-12 row mb-5">
                            <div class="alert alert-danger col-lg-6 col-md-12 mx-auto">{{Session::get('error')}}</div>
                        </div>
                    @endif
                    <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                        @if (Session::has('permission_deinied') || Session::has('error'))
                        <img src="{{ asset('images/svg-graphics/security_fail.png') }}" alt="" class="img-fluid">
                        @else
                        <img src="{{ asset('images/svg-graphics/security_on.svg') }}" alt="" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                        <div class="mb-lg-9 mb-5">
                            <h1 class="mb-1 h2 fw-bold">Sign in to Admin Site</h1>
                            <p>Welcome back to Admin site. But to get in this site you must be an Admin.</p>
                        </div>
                        <form action="{{ route('admin_signin') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <input type="email" class="form-control" name="email" id="inputEmail4"
                                        placeholder="Admin Email" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{$errors->first('email')}}</span>
                                        @endif
                                </div>
                                <div class="col-12 mb-5">
                                    <div class="password-field position-relative">
                                        <input type="password" id="fakePassword" name="password"
                                            placeholder="Enter Password" class="form-control" required>
                                        <span><i id="passwordToggler"class="bi bi-eye-slash"></i></span>
                                    </div>
                                    @if ($errors->has('password'))
                                            <span class="text-danger">{{$errors->first('password')}}</span>
                                        @endif
                                </div>
                                <div class="col-5">
                                    <a href="{{route('index')}}" class="btn btn-warning">Back to Fresh Shop</a>
                                </div>
                                <div class="col-6 mx-auto d-grid"> 
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- footer start-->
    <!-- Libs JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/simplebar.min.js') }}"></script>
    <!-- Theme JS -->
    <script src="{{ asset('js/theme.min.js') }}"></script>
    <script src="{{ asset('js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
    <!-- footer end-->
</body>

</html>
