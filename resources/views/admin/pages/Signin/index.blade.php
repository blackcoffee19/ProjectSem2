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
                        <div class="mt-4 mb-2 rounded-pill shadow p-3 text-center">
                            <a class="h4 fw-normal text-decoration-none text-center" href="{{ route('google-auth') }}"
                                style="vertical-align: middle;font-family: 'Montserrat', sans-serif;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-1" height="30"
                                    viewBox="0 0 24 24" width="30">
                                    <path
                                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                        fill="#4285F4" />
                                    <path
                                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                        fill="#34A853" />
                                    <path
                                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                        fill="#FBBC05" />
                                    <path
                                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                        fill="#EA4335" />
                                    <path d="M1 1h22v22H1z" fill="none" />
                                </svg>
                                Sign in with Google
                            </a>
                        </div>
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
