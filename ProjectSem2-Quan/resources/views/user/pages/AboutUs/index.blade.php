@extends('user.partials.master')
@section('content')


<body>

  
<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Sign Up</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="fullName" class="form-label">Name</label>
            <input type="text" class="form-control" id="fullName" placeholder="Enter Your Name" required="">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email address" required="">
          </div>

          <div class="mb-5">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password" required="">
            <small class="form-text">By Signup, you agree to our <a href="#!">Terms of Service</a> & <a
                href="#!">Privacy Policy</a></small>
          </div>

          <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
      </div>
      <div class="modal-footer border-0 justify-content-center">

        Already have an account? <a href="#">Sign in</a>
      </div>
    </div>
  </div>
</div>



<!-- Shop Cart -->

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header border-bottom">
    <div class="text-start">
      <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
      <small>Location in 382480</small>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">

    <div class="">
      <!-- alert -->
      <div class="alert alert-danger p-2" role="alert">
        You’ve got FREE delivery. Start <a href="#!" class="alert-link">checkout now!</a>
      </div>
      <ul class="list-group list-group-flush">
        <!-- list group -->
        <li class="list-group-item py-3 ps-0 border-top">
          <!-- row -->
          <div class="row align-items-center">
            <div class="col-3 col-md-2">
              <!-- img --> <img src="../assets/images/products/product-img-1.jpg" alt="Ecommerce"
                class="img-fluid"></div>
            <div class="col-4 col-md-6 col-lg-5">
              <!-- title -->
              <a href="../pages/shop-single.html" class="text-inherit">
                <h6 class="mb-0">Haldiram's Sev Bhujia</h6>
              </a>
              <span><small class="text-muted">.98 / lb</small></span>
              <!-- text -->
              <div class="mt-2 small lh-1"> <a href="#!" class="text-decoration-none text-inherit"> <span
                    class="me-1 align-text-bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-trash-2 text-success">
                      <polyline points="3 6 5 6 21 6"></polyline>
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                      </path>
                      <line x1="10" y1="11" x2="10" y2="17"></line>
                      <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg></span><span class="text-muted">Remove</span></a></div>
            </div>
            <!-- input group -->
            <div class="col-3 col-md-3 col-lg-3">
              <!-- input -->
              <!-- input -->
              <div class="input-group input-spinner  ">
                <input type="button" value="-" class="button-minus  btn  btn-sm " data-field="quantity">
                <input type="number" step="1" max="10" value="1" name="quantity"
                  class="quantity-field form-control-sm form-input   ">
                <input type="button" value="+" class="button-plus btn btn-sm " data-field="quantity">
              </div>

            </div>
            <!-- price -->
            <div class="col-2 text-lg-end text-start text-md-end col-md-2">
              <span class="fw-bold">$5.00</span>

            </div>
          </div>

        </li>
        <!-- list group -->
        <li class="list-group-item py-3 ps-0">
          <!-- row -->
          <div class="row align-items-center">
            <div class="col-3 col-md-2">
              <!-- img --> <img src="../assets/images/products/product-img-2.jpg" alt="Ecommerce"
                class="img-fluid"></div>
            <div class="col-4 col-md-6 col-lg-5">
              <!-- title -->
              <a href="../pages/shop-single.html" class="text-inherit">
                <h6 class="mb-0">NutriChoice Digestive </h6>
              </a>
              <span><small class="text-muted">250g</small></span>
              <!-- text -->
              <div class="mt-2 small lh-1"> <a href="#!" class="text-decoration-none text-inherit"> <span
                    class="me-1 align-text-bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-trash-2 text-success">
                      <polyline points="3 6 5 6 21 6"></polyline>
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                      </path>
                      <line x1="10" y1="11" x2="10" y2="17"></line>
                      <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg></span><span class="text-muted">Remove</span></a></div>
            </div>
            <!-- input group -->
            <div class="col-3 col-md-3 col-lg-3">
              <!-- input -->
              <!-- input -->
              <div class="input-group input-spinner  ">
                <input type="button" value="-" class="button-minus  btn  btn-sm " data-field="quantity">
                <input type="number" step="1" max="10" value="1" name="quantity"
                  class="quantity-field form-control-sm form-input   ">
                <input type="button" value="+" class="button-plus btn btn-sm " data-field="quantity">
              </div>
            </div>
            <!-- price -->
            <div class="col-2 text-lg-end text-start text-md-end col-md-2">
              <span class="fw-bold text-danger">$20.00</span>
              <div class="text-decoration-line-through text-muted small">$26.00</div>
            </div>
          </div>

        </li>
        <!-- list group -->
        <li class="list-group-item py-3 ps-0">
          <!-- row -->
          <div class="row align-items-center">
            <div class="col-3 col-md-2">
              <!-- img --> <img src="../assets/images/products/product-img-3.jpg" alt="Ecommerce"
                class="img-fluid"></div>
            <div class="col-4 col-md-6 col-lg-5">
              <!-- title -->
              <a href="../pages/shop-single.html" class="text-inherit">
                <h6 class="mb-0">Cadbury 5 Star Chocolate</h6>
              </a>
              <span><small class="text-muted">1 kg</small></span>
              <!-- text -->
              <div class="mt-2 small lh-1"> <a href="#!" class="text-decoration-none text-inherit"> <span
                    class="me-1 align-text-bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-trash-2 text-success">
                      <polyline points="3 6 5 6 21 6"></polyline>
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                      </path>
                      <line x1="10" y1="11" x2="10" y2="17"></line>
                      <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg></span><span class="text-muted">Remove</span></a></div>
            </div>
            <!-- input group -->
            <div class="col-3 col-md-3 col-lg-3">
              <!-- input -->
              <!-- input -->
              <div class="input-group input-spinner  ">
                <input type="button" value="-" class="button-minus  btn  btn-sm " data-field="quantity">
                <input type="number" step="1" max="10" value="1" name="quantity"
                  class="quantity-field form-control-sm form-input   ">
                <input type="button" value="+" class="button-plus btn btn-sm " data-field="quantity">
              </div>
            </div>
            <!-- price -->
            <div class="col-2 text-lg-end text-start text-md-end col-md-2">
              <span class="fw-bold">$15.00</span>
              <div class="text-decoration-line-through text-muted small">$20.00</div>
            </div>
          </div>

        </li>
        <!-- list group -->
        <li class="list-group-item py-3 ps-0">
          <!-- row -->
          <div class="row align-items-center">
            <div class="col-3 col-md-2">
              <!-- img --> <img src="../assets/images/products/product-img-4.jpg" alt="Ecommerce"
                class="img-fluid"></div>
            <div class="col-4 col-md-6 col-lg-5">
              <!-- title -->
              <a href="../pages/shop-single.html" class="text-inherit">
                <h6 class="mb-0">Onion Flavour Potato</h6>
              </a>
              <span><small class="text-muted">250g</small></span>
              <!-- text -->
              <div class="mt-2 small lh-1"> <a href="#!" class="text-decoration-none text-inherit"> <span
                    class="me-1 align-text-bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-trash-2 text-success">
                      <polyline points="3 6 5 6 21 6"></polyline>
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                      </path>
                      <line x1="10" y1="11" x2="10" y2="17"></line>
                      <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg></span><span class="text-muted">Remove</span></a></div>
            </div>
            <!-- input group -->
            <div class="col-3 col-md-3 col-lg-3">
              <!-- input -->
              <!-- input -->
              <div class="input-group input-spinner  ">
                <input type="button" value="-" class="button-minus  btn  btn-sm " data-field="quantity">
                <input type="number" step="1" max="10" value="1" name="quantity"
                  class="quantity-field form-control-sm form-input   ">
                <input type="button" value="+" class="button-plus btn btn-sm " data-field="quantity">
              </div>
            </div>
            <!-- price -->
            <div class="col-2 text-lg-end text-start text-md-end col-md-2">
              <span class="fw-bold">$15.00</span>
              <div class="text-decoration-line-through text-muted small">$20.00</div>
            </div>
          </div>

        </li>
        <!-- list group -->
        <li class="list-group-item py-3 ps-0 border-bottom">
          <!-- row -->
          <div class="row align-items-center">
            <div class="col-3 col-md-2">
              <!-- img --> <img src="../assets/images/products/product-img-5.jpg" alt="Ecommerce"
                class="img-fluid"></div>
            <div class="col-4 col-md-6 col-lg-5">
              <!-- title -->
              <a href="../pages/shop-single.html" class="text-inherit">
                <h6 class="mb-0">Salted Instant Popcorn </h6>
              </a>
              <span><small class="text-muted">100g</small></span>
              <!-- text -->
              <div class="mt-2 small lh-1"> <a href="#!" class="text-decoration-none text-inherit"> <span
                    class="me-1 align-text-bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-trash-2 text-success">
                      <polyline points="3 6 5 6 21 6"></polyline>
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                      </path>
                      <line x1="10" y1="11" x2="10" y2="17"></line>
                      <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg></span><span class="text-muted">Remove</span></a></div>
            </div>
            <!-- input group -->
            <div class="col-3 col-md-3 col-lg-3">
              <!-- input -->
              <!-- input -->
              <div class="input-group input-spinner  ">
                <input type="button" value="-" class="button-minus  btn  btn-sm " data-field="quantity">
                <input type="number" step="1" max="10" value="1" name="quantity"
                  class="quantity-field form-control-sm form-input   ">
                <input type="button" value="+" class="button-plus btn btn-sm " data-field="quantity">
              </div>
            </div>
            <!-- price -->
            <div class="col-2 text-lg-end text-start text-md-end col-md-2">
              <span class="fw-bold">$15.00</span>
              <div class="text-decoration-line-through text-muted small">$25.00</div>
            </div>
          </div>

        </li>

      </ul>
      <!-- btn -->
      <div class="d-flex justify-content-between mt-4">
        <a href="#!" class="btn btn-primary">Continue Shopping</a>
        <a href="#!" class="btn btn-dark">Update Cart</a>
      </div>

    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-body p-6">
        <div class="d-flex justify-content-between align-items-start ">
          <div>
            <h5 class="mb-1" id="locationModalLabel">Choose your Delivery Location</h5>
            <p class="mb-0 small">Enter your address and we will specify the offer you area. </p>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="my-5">
          <input type="search" class="form-control" placeholder="Search your area">
        </div>
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h6 class="mb-0">Select Location</h6>
          <a href="#" class="btn btn-outline-gray-400 text-muted btn-sm">Clear All</a>


        </div>
        <div>
          <div data-simplebar style="height:300px;">
            <div class="list-group list-group-flush">

              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action active">
                <span>Alabama</span><span>Min:$20</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>Alaska</span><span>Min:$30</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>Arizona</span><span>Min:$50</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>California</span><span>Min:$29</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>Colorado</span><span>Min:$80</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>Florida</span><span>Min:$90</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>Arizona</span><span>Min:$50</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>California</span><span>Min:$29</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>Colorado</span><span>Min:$80</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>Florida</span><span>Min:$90</span></a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
  <main>
  <!-- section -->
  <section class="mt-lg-14 mt-8">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- col -->
        <div class="offset-lg-1 col-lg-10 col-12">
          <div class="row align-items-center mb-14">
            <div class="col-md-6">
              <!-- text -->
              <div class="ms-xxl-14 me-xxl-15 mb-8 mb-md-0 text-center text-md-start">
                <h1 class="mb-6">Delivering quality and taste in every bite:</h1>
                <p class="mb-0 lead">A delicious meal not only comes from delicious cooking, but also from the food selection process,
                     which is a heart and deep love of a housewife to her family.
                      Accordingly, a meal full of love cannot be missed without the presence of delicious, quality and abundant pepper food. 
                    That's what customers can find when coming to Fresh Shop Clean Food.</p>
              </div>
            </div>
            <!-- col -->
            <div class="col-md-6">
              <div class=" me-6">
                <!-- img -->
                <img src="{{ asset('images/about/thuc-pham-sach.jpg') }}" alt="" class="img-fluid rounded">
              </div>
            </div>

          </div>
          
          <!-- row -->
          <div class="row mb-12">
            <div class="col-12">
              <div class="mb-8">
                <!-- heading -->
                <h1>We Share Your Worry</h1>
              </div>
            </div>
            <div class="col-md-4">
              <!-- card -->
              <div class="card bg-light mb-6 border-0">
                <!-- card body -->
                <div class="card-body p-8">
                  <div class="mb-4">
                    <!-- img -->
                    <img src="{{ asset('images/about/visuckhoe.jpg') }}" width="320" height="270" alt="">
                  </div>
                  <h4>For health</h4>
                  <p>Food is very important, with a lasting impact on health, family life and society. However, 
                    choosing a clean food source is always the hard work of housewives… and FreshShop was formed from that concern.. </p>
                  <!-- btn -->
                  
                </div>

              </div>
            </div>
            <div class="col-md-4">
              <!-- card -->
              <div class="card bg-light mb-6 border-0">
                <!-- card body -->
                <div class="card-body p-8">
                  <div class="mb-4">
                    <!-- img -->
                    <img src="{{ asset('images/about/vikhachhang.png') }}" width="320" height="270" alt="">
                  </div>
                  <h4>For customers</h4>
                  <p>
                    FreshShop brings a source of delicious, clean, 
                    nutritious and environmentally friendly food to share the worries of customers when choosing to buy daily food for their families.. </p>
                  <!-- btn -->
                  
                </div>

              </div>
            </div>
            <div class="col-md-4">
              <!-- card -->
              <div class="card bg-light mb-6 border-0">
                <!-- card body -->
                <div class="card-body p-8">
                  <div class="mb-4">
                    <!-- img -->
                    <img src="{{ asset('images/about/uytin.jpg') }}" width="320" height="270" alt="">
                  </div>
                  <h4>for prestige</h4>
                  <p>FreshShop is a trusted and friendly shopping place for you to discover and experience the diversity of cultures and culinary arts to enjoy.. </p>
                  <!-- btn -->
                  
                </div>

              </div>
            </div>
           

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- section -->
  <section class="bg-success py-14">

    <div class="container">
      <div class="row">
        <!-- col -->
        <div class="offset-lg-1 col-lg-10">
          <div class="row">
            <!-- col -->
            <div class="col-xl-4 col-md-6">
              <div class="text-white me-8 mb-12">
                <!-- text -->
                <h2 class="text-white mb-4 ">Loved and trusted by customers.</h2>
                <p>We give everyone access to the food they love and more time to enjoy it together.</p>
              </div>

            </div>
            <div class="row row-cols-2 row-cols-md-3">
              <!-- col -->
              <div class="col mb-4 mb-md-0">
                <h3 class="display-5 fw-bold text-white mb-0">500k</h3>
                <span class="fs-6 text-white">Shoppers</span>
              </div>
              <!-- col -->
              <div class="col mb-4 mb-md-0">
                <h3 class="display-5 fw-bold text-white mb-0">4,500+</h3>
                <span class="fs-6 text-white">Cities</span>
              </div>
              <!-- col -->
              <div class="col mb-4 mb-md-0">
                <h3 class="display-5 fw-bold text-white mb-0">40k+</h3>
                <span class="fs-6 text-white">Stores</span>
              </div>
              <!-- col -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- section -->
  <section class="mt-14">
    <!-- container -->
    <div class="container">
      <div class="row">
        <!-- col -->
        <div class="offset-md-1 col-md-10">
          <div class="mb-11">
             <!-- heading -->
            <h2>Our Leadership</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
   <!-- section -->
  <section class="mb-14">
     <!-- slider -->
    <div class="team-slider">
       <!-- item -->
      <div class="item mx-2">
        <div class="bg-light rounded ">
           <!-- text -->
          <div class="p-6">
            <h5 class="h6 mb-0">Duy Hiển</h5>
            <small>Vice President, Retail</small>
          </div>
           <!-- img -->
          
        </div>
      </div>
       <!-- item -->
      <div class="item mx-2">

      <div class="bg-light rounded">
           <!-- text -->
          <div class="p-6">
            <h5 class="h6 mb-0">Cát Tường</h5>
            <small>Chief Financial Officer</small>
          </div>
           <!-- img -->
          
        </div>
      </div>
       <!-- item -->
      <div class="item mx-2">
        <div class="bg-light rounded ">
           <!-- text -->
          <div class="p-6">
            <h5 class="h6 mb-0">Minh Quân</h5>
            <small>Chief Communications Officer</small>
          </div>
           <!-- img -->
          
        </div>
      </div>
       <!-- item -->
      <div class="item mx-2">
        <div class="bg-light rounded ">
           <!-- text -->
          <div class="p-6">
            <h5 class="h6 mb-0">Hải Đăng</h5>
            <small>Chief Technology Officer</small>
          </div>
           <!-- img -->
          
        </div>
      </div>
  




    </div>
  </section>
</main>
   <!-- Footer -->
  <!-- footer -->

  <!-- Javascript-->





</body>

</html>
@endsection