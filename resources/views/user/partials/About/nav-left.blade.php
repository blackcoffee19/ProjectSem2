<div class="col-lg-3 col-md-4 col-12 border-end  d-none d-md-block">
    <div class="pt-10 pe-lg-10">
        <!-- nav item -->
        <ul class="nav flex-column nav-pills nav-pills-dark">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{ Route('accountOrders') }}">
                    <i class="fa-solid fa-cart-shopping me-5"></i>Your Orders
                </a>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('accountSetting') }}">
                    <i class="fa-solid fa-gear me-5"></i>Settings</a>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('accountAddress') }}">
                    <i class="fa-solid fa-location-pin me-5"></i>Address</a>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('accountPayment') }}">
                    <i class="fa-regular fa-credit-card me-5"></i>Payment Method</a>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <hr>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link " href="{{ Route('index') }}">
                    <i class="fa-solid fa-arrow-right-from-bracket me-5"></i>Log out
                </a>
            </li>
        </ul>
    </div>
</div>
