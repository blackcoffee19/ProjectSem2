@extends('admin.partials.master')
@section('admin-content')
    <main>
        <section class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <!-- card -->
                    <div class="card bg-light border-0 rounded-4"
                        style=" background-image: url({{ asset('images/slider/slider-image-1.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: right; ">
                        <div class="card-body p-lg-12">
                            <h1>Welcome back! FreshCart</h1>
                            <p>
                                FreshCart is simple & clean design for developer and
                                designer.
                            </p>
                            <a href="{{ Route('adminAddProduct') }}" class="btn btn-primary"> Create Product </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table -->


            <div class="row">
                <div class="col-lg-4 col-12 mb-6">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mb-6">
                                <div>
                                    <h4 class="mb-0 fs-5">Earnings</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-danger text-dark-danger rounded-circle">
                                    <i class="bi bi-currency-dollar fs-5"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div class="lh-1">
                                <h1 class="mb-2 fw-bold fs-2">{{ number_format($income[count($income) - 1], 0, '', ' ') }} VND
                                </h1>
                                <span>Monthly revenue</span><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-6">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mb-6">
                                <div>
                                    <h4 class="mb-0 fs-5">Orders</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-warning text-dark-warning rounded-circle">
                                    <i class="bi bi-cart fs-5"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div class="lh-1">
                                <h1 class="mb-2 fw-bold fs-2">{{ $order_y }}</h1>
                                <span><span class="text-dark me-1">{{ $sale_pro }}+</span>New Sales</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-6">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mb-6">
                                <div>
                                    <h4 class="mb-0 fs-5">Customer</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-info text-dark-info rounded-circle">
                                    <i class="bi bi-people fs-5"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div class="lh-1">
                                <h2 class="mb-2 ">{{ $customer }}</h2>
                                <span class="text-dark me-1">User: {{ $users }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row -->
            <div class="row">
                <div class="col-xl-8 col-lg-6 col-md-12 col-12 mb-6">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="card-body p-6">
                            <!-- heading -->
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="mb-1 fs-5">Revenue</h3>
                                    {{-- <small>(+63%) than last year</small> --}}
                                </div>
                                <div>
                                    <!-- select option -->
                                    <select class="form-select" id="select_year">
                                        <option value="2023"
                                            {{ isset($year) ? (intval($year) == 2023 ? 'selected' : '') : 'selected' }}>2023
                                        </option>
                                        <option value="2022"
                                            {{ isset($year) ? (intval($year) == 2022 ? 'selected' : '') : '' }}>2022</option>
                                    </select>
                                </div>
                            </div>
                            <!-- chart -->
                            <div id="revenueChart" class="mt-6"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-12 mb-6">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <!-- heading -->
                            <h3 class="mb-0 fs-5">Total Orders</h3>
                            <div id="totalSale" class="mt-6 d-flex justify-content-center"></div>
                            <div class="mt-4">
                                <!-- list -->
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"
                                            fill="currentColor" class="bi bi-circle-fill text-primary" viewBox="0 0 16 16">
                                            <circle cx="8" cy="8" r="8" />
                                        </svg>
                                        <span class="ms-1"><span class="text-dark">Finished {{ $arr_order[0] }}</span>
                                            ({{ number_format(($arr_order[0] / array_sum($arr_order)) * 100, 0, '', '') }}%)</span>
                                    </li>
                                    <li class="mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"
                                            fill="currentColor" class="bi bi-circle-fill text-warning" viewBox="0 0 16 16">
                                            <circle cx="8" cy="8" r="8" />
                                        </svg>
                                        <span class="ms-1"><span class="text-dark">Cancel {{ $arr_order[1] }}</span>
                                            ({{ number_format(($arr_order[1] / array_sum($arr_order)) * 100, 0, '', '') }}%)</span>
                                    </li>
                                    <li class="mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"
                                            fill="currentColor" class="bi bi-circle-fill text-danger" viewBox="0 0 16 16">
                                            <circle cx="8" cy="8" r="8" />
                                        </svg>
                                        <span class="ms-1"><span class="text-dark">Transaction Failed
                                                {{ $arr_order[2] }}</span>
                                            ({{ number_format(($arr_order[2] / array_sum($arr_order)) * 100, 0, '', '') }}%)</span>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"
                                            fill="currentColor" class="bi bi-circle-fill text-info" viewBox="0 0 16 16">
                                            <circle cx="8" cy="8" r="8" />
                                        </svg>
                                        <span class="ms-1"><span class="text-dark">Order {{ $arr_order[3] }}</span>
                                            ({{ number_format(($arr_order[3] / array_sum($arr_order)) * 100, 0, '', '') }}%)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-12 mb-6">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="card-body p-6">
                            <h3 class="mb-0 fs-5">Sales Overview</h3>
                            <div class="mt-6">

                                <div class="mb-5">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="fs-6">Total Profit</h5>
                                        <span><span
                                                class="me-1 text-dark">{{ $income[count($income) - 1] - $expense[count($expense) - 1] }}
                                                đ</span>
                                            ({{ number_format((($income[count($income) - 1] - $expense[count($expense) - 1]) / (array_sum($income) - array_sum($expense))) * 100, 1, '.', '') }}%)</span>
                                    </div>
                                    <!-- main wrapper -->
                                    <div>
                                        @php
                                            $num_pr = (($income[count($income) - 1] - $expense[count($expense) - 1]) / (array_sum($income) - array_sum($expense))) * 100;
                                        @endphp
                                        <!-- progressbar -->
                                        <div class="progress bg-light-primary" style="height: 6px">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                aria-label="Example 1px high" style="width: {{ $num_pr }}%;"
                                                aria-valuenow="{{ $num_pr }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <!-- text -->
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="fs-6">Total Income</h5>
                                        <span><span class="me-1 text-dark">{{ $income[count($income) - 1] }} đ</span>
                                            ({{ number_format(($income[count($income) - 1] / array_sum($income)) * 100, 1, '.', '') }}%)</span>
                                    </div>
                                    <div>
                                        <!-- progressbar -->
                                        @php
                                            $num_in = ($income[count($income) - 1] / array_sum($income)) * 100;
                                        @endphp
                                        <div class="progress bg-info-soft" style="height: 6px">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                aria-label="Example 1px high" style="width: {{ $num_in }}%;"
                                                aria-valuenow="{{ $num_in }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <!-- text -->
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="fs-6">Total Expenses</h5>
                                        <span><span class="me-1 text-dark">{{ $expense[count($expense) - 1] }} đ</span>
                                            ({{ number_format(($expense[count($expense) - 1] / array_sum($expense)) * 100, 1, '.', '') }}%)</span>
                                    </div>
                                    <div>
                                        @php
                                            $num_ex = ($expense[count($expense) - 1] / array_sum($expense)) * 100;
                                        @endphp
                                        <!-- progressbar -->
                                        <div class="progress bg-light-danger" style="height: 6px">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                aria-label="Example 1px high" style="width: {{ $num_ex }}%"
                                                aria-valuenow="{{ $num_ex }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-12 mb-6">
                    <div class="position-relative h-100">
                        <!-- card -->
                        <div class="card card-lg mb-6 h-100">
                            <div class="card-body h-100" id="top_product">

                            </div>
                            {{-- <div class="card-body">
                                <table class="table caption-top">
                                    <caption class="text-primary fs-4">Hot Product</caption>
                                    <thead>
                                        <tr>
                                            <th>TOP</th>
                                            <th>Product</th>
                                            <th>Purchases</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < count($hot_product); $i++)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td><a href="{{ route('products-details', $hot_product[$i]->id_product) }}"><img src='images/products/{{$hot_product[$i]->image}}' width="50" height="50" style="object-fit: contain"/></a></td>
                                            <td>{{$hot_product[$i]->number}}</td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-6">
                    <div class="card h-100 card-lg">
                        <!-- heading -->
                        <div class="p-6">
                            <h3 class="mb-0 fs-5">Recent Order</h3>
                        </div>
                        <div class="card-body p-0">
                            <!-- table -->
                            <div class="table-responsive">
                                <table class="table table-centered table-borderless text-nowrap table-hover">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">Order Number</th>
                                            <th scope="col">Order from</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recent_orders as $order)
                                            <tr>
                                                <td>#{{ $order->order_code }}</td>
                                                <td>{{ $order->id_user || isset($order->User->name) ? $order->User->name : 'GUEST' }}</td>
                                                <td>{{ date_format($order->created_at, 'j F Y') }}</td>
                                                <td>{{ number_format($order->total, 0, '', ' ') }} đ</td>
                                                <td>
                                                    @switch($order->status)
                                                        @case('finished')
                                                            <span class="badge bg-light-primary text-dark-primary"> Shipped </span>
                                                        @break

                                                        @case('confirmed')
                                                            <span class="badge bg-light-info text-dark-info">Processing</span>
                                                        @break

                                                        @case('unconfirmed')
                                                            <span class="badge bg-light-warning text-dark-warning">Pending</span>
                                                        @break

                                                        @case('delivery')
                                                            <span class="badge bg-light-info text-dark-info">Delivery</span>
                                                        @break

                                                        @case('cancel')
                                                            <span class="badge bg-light-danger text-dark-danger">Cancel</span>
                                                        @break

                                                        @case('transaction failed')
                                                            <span class="badge bg-light-danger text-dark">Transaction Failed</span>
                                                        @break

                                                        @default
                                                    @endswitch
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <h1 style="font-size: 180px; color: #929292; margin: 0 auto;">WELCOME TO DASHBOARD</h1> --}}
    </main>
@endsection

@section('admin-script')
    <script>
        $(document).ready(function() {
            $("#select_year").change(function() {
                window.location.assign(window.location.origin + "/ProjectSem2/public/admin/dashboard?y=" +
                    $(this).val());
            })
        })
    </script>
@endsection
