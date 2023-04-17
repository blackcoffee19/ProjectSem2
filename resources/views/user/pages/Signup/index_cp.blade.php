@extends('user.partials.master')
@section('content')
<main>
    @if ($site == "Signin")
    <section class="my-lg-14 my-8">
        <div class="container">
          <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
              <img src="{{asset('images/svg-graphics/signin.svg')}}" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
              <div class="mb-lg-9 mb-5">
                <h1 class="mb-1 h2 fw-bold">Sign in to FreshCart</h1>
                <p>Welcome back to FreshCart! Enter your email to get started.</p>
              </div>
    
              <form action="{{route('signin')}}" method="POST">
                @csrf
                <div class="row g-3">
                  <div class="col-12">
                    <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required>
                  </div>
                  <div class="col-12">
                    <div class="password-field position-relative">
                      <input type="password" id="fakePassword" name="password" placeholder="Enter Password" class="form-control" required >
                      <span><i id="passwordToggler"class="bi bi-eye-slash"></i></span>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Remember me
                      </label>
                    </div>
                    <div> Forgot password? <a href="../pages/forgot-password.html">Reset It</a></div>
                  </div>
                  <div class="col-12 d-grid"> <button type="submit" class="btn btn-primary">Sign In</button>
                  </div>
                  <div>Don’t have an account? <a href="{{route('signup')}}"> Sign Up</a></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    @else
    <section class="my-lg-14 my-8">
        <div class="container">
          <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
              <img src="{{asset('images/svg-graphics/signup.svg')}}" alt="" class="img-fluid">
            </div>
            <!-- col -->
            <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
              <div class="mb-lg-9 mb-5">
                <h1 class="mb-1 h2 fw-bold">Get Start Shopping</h1>
                <p>Welcome to FreshCart! Enter your email to get started.</p>
              </div>
              <!-- form -->
              <form>
                <div class="row g-3">
                  <!-- col -->
                  <div class="col">
                    <!-- input --><input type="text" class="form-control" placeholder="First name" aria-label="First name"
                      required>
                  </div>
                  <div class="col">
                    <!-- input --><input type="text" class="form-control" placeholder="Last name" aria-label="Last name"
                      required>
                  </div>
                  <div class="col-12">
    
                    <!-- input --><input type="email" class="form-control" id="inputEmail4" placeholder="Email" required>
                  </div>
                  <div class="col-12">
    
                    <div class="password-field position-relative">
                      <input type="password" id="fakePassword" placeholder="Enter Password" class="form-control" required >
                      <span><i id="passwordToggler"class="bi bi-eye-slash"></i></span>
                    </div>
                  </div>
                  <!-- btn -->
                  <div class="col-12 d-grid"> <button type="submit" class="btn btn-primary">Register</button>
                  </div>
    
                  <p><small>By continuing, you agree to our <a href="#!"> Terms of Service</a> & <a href="#!">Privacy
                        Policy</a></small></p>
                </div>
              </form>
            </div>
          </div>
        </div>
    
    
      </section>
    
    @endif

</main>

@endsection