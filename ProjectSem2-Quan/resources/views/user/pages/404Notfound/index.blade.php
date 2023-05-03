@extends('user.partials.master')
@section('content')
<main>
    <section>
    <div class="container d-flex flex-column">
        <div class="row min-vh-100 justify-content-center align-items-center">
        <div class="offset-lg-1 col-lg-10  py-8 py-xl-0">
            <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class=" mb-6 mb-lg-0">
                    @if (Session::has('error'))
                    <h1>{{Session::get('error')}}...</h1>
                    <p class="mb-8">We can’t find product you’re looking for.<br>
                        Check out our help center or head back to home.
                    </p>
                    @else    
                    <h1>Something’s wrong here...</h1>
                    <p class="mb-8">We can’t find the page you’re looking for.<br>
                        Check out our help center or head back to home.
                    </p>
                    @endif
                    <a href="#" class="btn btn-dark">Help Center <i class="feather-icon icon-arrow-right"></i></a>
                    <a href="{{route('index')}}" class="btn btn-primary ms-2">Back to home</a>
                </div>

            </div>
            <div class="col-md-6">
                <div>
                    <img src="{{asset('/images/svg-graphics/error.svg')}}" alt="" class="img-fluid">
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</main>
@endsection