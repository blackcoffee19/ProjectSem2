<aside class="col-lg-3 col-md-4 mb-6 mb-md-0">
    <div class="offcanvas offcanvas-start offcanvas-collapse w-md-50 " tabindex="-1" id="offcanvasCategory"
        aria-labelledby="offcanvasCategoryLabel">

        <div class="offcanvas-header d-lg-none">
            <h5 class="offcanvas-title" id="offcanvasCategoryLabel">Filter</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ps-lg-2 pt-lg-0">
            <div class="mb-8">
                <!-- title -->
                 <a href="{{route('user.pages.Products.index')}}" ><h3 class="mb-3" onclick="filterSelection('all')">Categories</h3></a> 
                <!-- nav -->


                 <ul class="nav nav-category" id="categoryCollapseMenu" >
                    <li class="nav-item border-bottom w-100 collapsed" data-bs-toggle="collapse"
                        data-bs-target="#categoryFlushOne" aria-expanded="false" aria-controls="categoryFlushOne"><a
                            href="#" class="nav-link" onclick="filterSelection('3')" >Meat 
                            <i class="feather-icon icon-chevron-right"></i></a>
                        <!-- accordion collapse -->
                     

                    </li>
                    <!-- nav item -->
                    <li class="nav-item border-bottom w-100 collapsed" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"><a
                            href="#" class="nav-link" onclick="filterSelection('1')">
                            Vegetables
                            <i class="feather-icon icon-chevron-right"></i>
                        </a>

   

                    </li>
                    <li class="nav-item border-bottom w-100 collapsed" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                        aria-controls="flush-collapseThree"> <a href="#" class="nav-link" onclick="filterSelection('2')">Fruit
                            <i class="feather-icon icon-chevron-right"></i></a>

                        <!-- collapse -->
                     
                    </li>
                   
                </ul> 
            </div>


            <div class="mb-8">
                <!-- price -->
                <form action="{{Route('product.searchPrice')}}">
                <h3 class="mb-3">Price</h3>
                <div>
                    <!-- range -->
                    <div id="priceRange" class="mb-3"></div>
                    <small class="text-muted ">Form: <br> </small> <input name="form" id="priceRange-value" class="small price1"> <br>
                    <small class="text-muted "> To: <br> </small> <input name="to" id="priceRange-value" class="small price1"><br>
                    <input class="searchPrice" type="submit"value="Search"/>
                </div>
                </form>


            </div>
            <!-- rating -->
            <div class="mb-8">

                <h3 class="mb-3">Rating</h3>
                <div class="filter">
                    <!-- form check -->
                    <div class="form-check mb-2 checkbox">
                        <!-- input -->
                        <input class="form-check-input rating-checkbox"   type="checkbox" value="5" >
                        <label class="form-check-label" for="ratingFive">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning "></i>
                            <i class="bi bi-star-fill text-warning "></i>
                            <i class="bi bi-star-fill text-warning "></i>
                            <i class="bi bi-star-fill text-warning "></i>
                        </label>
                    </div>
                    <!-- form check -->
                    <div class="form-check mb-2 checkbox">
                        <!-- input -->
                        <input class="form-check-input rating-checkbox"    type="checkbox" value="4" >
                        <label class="form-check-label" for="ratingFour">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning "></i>
                            <i class="bi bi-star-fill text-warning "></i>
                            <i class="bi bi-star-fill text-warning "></i>
                            <i class="bi bi-star text-warning"></i>
                        </label>
                    </div>
                    <!-- form check -->
                    <div class="form-check mb-2 checkbox">
                        <!-- input -->
                        <input class="form-check-input rating-checkbox"   type="checkbox" value="3" >
                        <label class="form-check-label" for="ratingThree">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning "></i>
                            <i class="bi bi-star-fill text-warning "></i>
                            <i class="bi bi-star text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                        </label>
                    </div>
                    <!-- form check -->
                    <div class="form-check mb-2 checkbox">
                        <!-- input -->
                        <input class="form-check-input rating-checkbox"  type="checkbox" value="2" >
                        <label class="form-check-label" for="ratingTwo">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                        </label>
                    </div>
                    <!-- form check -->
                    <div class="form-check mb-2 checkbox">
                        <!-- input -->
                        <input class="form-check-input rating-checkbox"   type="checkbox" value="1" >
                        <label class="form-check-label" for="ratingOne">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                        </label>
                    </div>
                </div>


            </div>
            <div class="mb-8 position-relative">
                <!-- Banner Design -->
                <!-- Banner Content -->
                <div class="position-absolute p-5 py-8">
                    <h3 class="mb-0">Fresh Fruits </h3>
                    <p>Get Upto 25% Off</p>
                    <a href="#" class="btn btn-dark">Shop Now<i
                            class="feather-icon icon-arrow-right ms-1"></i></a>
                </div>
                <!-- Banner Content -->
                <!-- Banner Image -->
                <!-- img --><img src="{{asset('/assets/images/banner/assortment-citrus-fruits.png')}}"
                alt="" class="img-fluid rounded ">
                <!-- Banner Image -->
            </div>
        </div>
    </div>
    
</aside>

