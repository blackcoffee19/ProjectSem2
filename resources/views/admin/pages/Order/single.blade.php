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
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order Single</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ Route('adminOrder') }}" class="btn btn-light">Back to all orders</a>
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
                                    <h2 class="mb-0">
                                        Order ID: #{{ $id_order->id_order }}
                                        <span style="padding-left: 50px">
                                            <h2>Order Name: {{ $id_order->order_code }}</h2>
                                        </span>
                                    </h2>
                                    {{-- <span class="badge bg-light-warning text-dark-warning ms-2">Pending</span> --}}
                                    <span style="padding-left: 50px">
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
                                    </span>
                                </div>
                                <!-- select option -->
                                {{-- <div class="d-md-flex">
                                    <!-- button -->
                                    <div class="ms-md-3">
                                        <a href="#" class="btn btn-primary">Save</a>
                                        <a href="#" class="btn btn-secondary">Download Invoice</a>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="mt-8">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-12">
                                        <div class="mb-6">
                                            <h6>Customer Details</h6>
                                            <p class="mb-1 lh-lg">{{ $id_order->receiver }}<br>
                                                {{ $id_order->email }}<br>
                                                {{ $id_order->phone }}</p>
                                            @if ($id_order->id_user)
                                            <a href="{{Route('adminShowCustomers', $id_order->id_user)}}">View Profile</a>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- address -->
                                    <div class="col-lg-5 col-md-5 col-12">
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
                                                Shipping Fee: <span class="text-dark">
                                                    {{ number_format($id_order->shipping_fee, 0, '', ' ') }} đ</span><br>
                                                Coupon: <span class="text-dark">
                                                    @if ($id_order->code_coupon != null)
                                                        {{ $id_order->Coupon->title }}
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
                                            @php
                                                $subtotal = 0;
                                            @endphp
                                            @foreach ($cartItems as $item)
                                                @php
                                                    $subtotal += $item->price * (1 - $item->sale / 100) * ($item->amount / 1000);
                                                    $prices = $item->price;
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('products-details', $item->id_product) }}">
                                                            <img src="{{ asset('images/products/' . $item->Product->Library[0]->image) }}"
                                                                alt="{{ $item->Product->Library[0]->image }}"
                                                                style="width: 60px;">
                                                            <span
                                                                style="padding-left: 50px">{{ $item->product->name }}</span>
                                                        </a>
                                                    </td>
                                                    <td><span class="text-body">
                                                            {{ number_format($prices, 0, '', ' ') }}
                                                            đ/kg
                                                        </span></td>
                                                    <td>{{ $item->amount }} grams</td>
                                                    <td>{{ number_format(($prices / 1000) * $item->amount, 0, '', ' ') }} đ
                                                    </td>
                                                </tr>
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
                                                    <strong class="text-primary">{{ number_format($subtotal, 0, '', ' ') }}
                                                        đ</strong>
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
                                                            @php
                                                                $subtotal = $id_order->Coupon->discount <= 100 ? $subtotal * (1 - $id_order->Coupon->discount / 100) : $subtotal - $id_order->Coupon->discount;
                                                            @endphp
                                                            -{{ $id_order->Coupon->discount <= 100 ? number_format($id_order->Coupon->discount, 0, '', ' ') . '%' : number_format($id_order->coupon->discount, 0, '', ' ') . ' đ' }}
                                                        @else
                                                            ---
                                                        @endif
                                                    </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-bottom-0 pb-0"></td>
                                                <td class="border-bottom-0 pb-0"></td>
                                                <td colspan="1" class="fw-medium text-dark ">
                                                    Shipping Cost
                                                </td>
                                                <td class="fw-medium text-dark  ">
                                                    <strong
                                                        class="text-primary">{{ number_format($id_order->shipping_fee, 0, '', ' ') }}đ</strong>
                                                    @php
                                                        $subtotal += $id_order->shipping_fee;
                                                    @endphp
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
                                                        {{ number_format($subtotal, 0, '', ' ') }} đ
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
                                    <p class="text-dard">{{$id_order->delivery_method}}</p>
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
