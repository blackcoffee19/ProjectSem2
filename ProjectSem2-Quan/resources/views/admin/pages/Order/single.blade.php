@extends('admin.partials.master')
@section('admin-content')
    <main>
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <!-- page header -->
                            <h2>Order Single</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order Single</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ Route('adminOrder') }}" class="btn btn-primary">Back to all orders</a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row ">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="card-body p-6">
                            <div class="d-md-flex justify-content-between">
                                <div class="d-flex align-items-center mb-2 mb-md-0">
                                    <h2 class="mb-0">Order ID: #{{ $id_order->id_order }} </h2>
                                    {{-- <span class="badge bg-light-warning text-dark-warning ms-2">Pending</span> --}}
                                    @switch($id_order->status)
                                        @case($id_order->status == 'finished')
                                            <span class="badge ms-2 bg-light-primary text-dark-primary">
                                                {{ $id_order->status }}</span>
                                        @break

                                        @case($id_order->status == 'delivery')
                                            <span class="badge ms-2 bg-light-warning text-dark-warning">
                                                {{ $id_order->status }}</span>
                                        @break

                                        @case($id_order->status == 'transaction failed')
                                            <span class="badge ms-2 bg-light-danger text-dark-danger">
                                                {{ $id_order->status }}</span>
                                        @break

                                        @case($id_order->status == 'cancel')
                                            <span class="badge ms-2 bg-light-danger text-dark-danger">
                                                {{ $id_order->status }}</span>
                                        @break

                                        @case($id_order->status == 'unconfimred')
                                            <span class="badge ms-2 text-bg-dark"> {{ $id_order->status }}</span>
                                        @break

                                        @case($id_order->status == 'confirmed')
                                            <span class="text-primary"> {{ $id_order->status }}</span>
                                        @break

                                        @default
                                    @endswitch
                                </div>
                                <!-- select option -->
                                <div class="d-md-flex">
                                    <!-- button -->
                                    <div class="ms-md-3">
                                        <a href="#" class="btn btn-primary">Save</a>
                                        <a href="#" class="btn btn-secondary">Download Invoice</a>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8">
                                <div class="row">
                                    <!-- address -->
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="mb-6">
                                            <h6>Customer Details</h6>
                                            <p class="mb-1 lh-lg">{{ $id_order->receiver }}<br>
                                                {{ $id_order->email }}<br>
                                                {{ $id_order->phone }}</p>
                                            <a href="#">View Profile</a>
                                        </div>
                                    </div>
                                    <!-- address -->
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="mb-6">
                                            <h6>Shipping Address</h6>
                                            <p class="mb-1 lh-lg">{{ $id_order->address }}

                                        </div>
                                    </div>
                                    <!-- address -->
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="mb-6">
                                            <h6>Order Details</h6>
                                            <p class="mb-1 lh-lg">Order ID: <span
                                                    class="text-dark">{{ $id_order->id_order }}</span><br>
                                                Order Date: <span class="text-dark">{{ $id_order->created_at }}</span><br>
                                                Shipping Fee: <span class="text-dark">$
                                                    {{ $id_order->shipping_fee }}</span><br>
                                                Coupon: <span class="text-dark">
                                                    @if ($id_order->code_coupon != null)
                                                        {{ $id_order->code_coupon }}
                                                    @else
                                                        No Coupon
                                                    @endif
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <!-- Table -->
                                    <table class="table mb-0 text-nowrap table-centered">
                                        <!-- Table Head -->
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Products</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <!-- tbody -->
                                        <tbody>
                                            <span style="color:white">{{ $total = 0 }}</span>
                                            @foreach ($cartItems as $item)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('images/products/' . $item->image) }}"
                                                            alt="{{ $item->name }}" style="width: 50px;">
                                                    </td>
                                                    <td><span class="text-body">${{ $item->price }}</span></td>
                                                    <td>{{ $item->amount }}</td>
                                                    <td>$ {{ $item->price * $item->amount }}</td>
                                                </tr>
                                                <span
                                                    style="color:white">{{ $total += $item->price * $item->amount }}</span>
                                            @endforeach

                                            <tr>
                                                <td class="border-bottom-0 pb-0"></td>
                                                <td class="border-bottom-0 pb-0"></td>
                                                <td colspan="1" class="fw-medium text-dark ">
                                                    <!-- text -->
                                                    Sub Total :
                                                </td>
                                                <td class="fw-medium text-dark ">
                                                    <!-- text -->
                                                    <strong class="text-primary">$ {{ $total }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-bottom-0 pb-0"></td>
                                                <td class="border-bottom-0 pb-0"></td>
                                                <td colspan="1" class="fw-medium text-dark ">
                                                    <!-- text -->
                                                    Shipping Cost
                                                </td>
                                                <td class="fw-medium text-dark  ">
                                                    <!-- text -->
                                                    <strong class="text-primary">$ {{ $id_order->shipping_fee }}</strong>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="border-bottom-0 pb-0"></td>
                                                <td class="border-bottom-0 pb-0"></td>
                                                <td colspan="1" class="fw-medium text-dark ">
                                                    <!-- text -->
                                                    Coupon
                                                </td>
                                                <td class="fw-medium text-dark  ">
                                                    <!-- text -->
                                                    <strong class="text-danger">
                                                        @if ($id_order->code_coupon != null)
                                                            $ -{{ $id_order->coupon->discount }}
                                                        @else
                                                            $ 0
                                                        @endif
                                                    </strong>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td colspan="1" class="fw-semi-bold text-dark ">
                                                    <!-- text -->
                                                    Grand Total
                                                </td>
                                                <td class="fw-semi-bold text-dark ">
                                                    <!-- text -->
                                                    <h5 class="text-info">
                                                        @if ($id_order->code_coupon != null)
                                                            $
                                                            {{ $total + $id_order->shipping_fee - $id_order->coupon->discount }}
                                                        @else
                                                            $ {{ $total + $id_order->shipping_fee }}
                                                        @endif

                                                    </h5>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-6">
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-lg-0">
                                    <h6>Payment Info</h6>
                                    <span>{{ $id_order->method }}</span>
                                </div>
                                {{-- <div class="col-md-6">
                                    <h5>Notes</h5>
                                    <textarea class="form-control mb-3" rows="3" placeholder="Write note for order"></textarea>
                                    <a href="#" class="btn btn-primary">Save Notes</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
