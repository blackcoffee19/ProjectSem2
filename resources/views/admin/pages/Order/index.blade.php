@extends('admin.partials.master')
@section('admin-content')
    <main>
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <!-- page header -->
                    <div>
                        <h2>Order List</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Order List</li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class=" p-6 ">
                            <div class="row justify-content-between">
                                <div class="col-md-4 col-12 mb-2 mb-md-0">
                                    <!-- form -->
                                    <form action="{{ Route('orther.findByName') }}" class="d-flex" role="search">
                                        <input class="form-control" type="search" placeholder="Search Orther Name"
                                            aria-label="Search" name="order_code" value="{{isset($search)? $search:''}}">
                                        <button class="btn btn-primary" value="Search"><i
                                                class="fas fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="col-lg-2 col-md-4 col-12">
                                    <!-- select -->
                                    <form action="{{ route('orther.findByName') }}" class="d-flex">
                                        <select class="form-select" name="status" onchange="this.form.submit()">
                                            <option value="">Status</option>
                                            @foreach ($status->unique('status') as $orther)
                                                <option value="{{ $orther->status }}">{{ $orther->status }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                            <!-- table responsive -->
                            <div class="table-responsive">
                                <table
                                    class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                                    <thead class="p-2 bg-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>Order Name</th>
                                            <th>Customer</th>
                                            <th>Date & TIme</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no =1;
                                            if(app('request')->input('page')!=null && app('request')->input('page')!=1){
                                                $no =app('request')->input('page')*10-9;
                                            }
                                        @endphp
                                        @foreach ($orthers as $orther)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td><a href="{{ Route('adminShowOrther', $orther->id_order) }}"
                                                        class="text-reset">{{ $orther->order_code }}</a></td>
                                                <td>{{ $orther->receiver }}</td>

                                                <td>{{ $orther->created_at }}</td>
                                                <td>{{ $orther->method }}</td>

                                                <td>
                                                    {{-- <span
                                                        class="p-2 bg-light-primary text-dark-primary">{{ $orther->status }}</span> --}}
                                                    @switch($orther->status)
                                                        @case($orther->status == 'finished')
                                                            <span
                                                                class="btn bg-light-primary text-dark-primary">{{ $orther->status }}</span>
                                                        @break

                                                        @case($orther->status == 'delivery')
                                                            <span
                                                                class="btn bg-light-warning text-dark-warning">{{ $orther->status }}</span>
                                                        @break

                                                        @case($orther->status == 'transaction failed')
                                                            <span
                                                                class="btn bg-light-danger text-dark-danger">{{ $orther->status }}</span>
                                                        @break

                                                        @case($orther->status == 'cancel')
                                                            <span
                                                                class="btn bg-light-danger text-dark-danger">{{ $orther->status }}</span>
                                                        @break

                                                        @case($orther->status == 'unconfirmed')
                                                            <span
                                                                class="btn bg-dark-secondary text-dark">{{ $orther->status }}</span>
                                                        @break

                                                        @case($orther->status == 'confirmed')
                                                            <span
                                                                class="btn bg-light-info text-dark-info">{{ $orther->status }}</span>
                                                        @break

                                                        @default
                                                    @endswitch
                                                </td>
                                                <td>{{ number_format($orther->total,0,'',' ') }} đ</td>

                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item"
                                                                    href="{{ Route('adminShowOrther', $orther->id_order) }}"><i
                                                                        class="bi bi-eye me-3 "></i>Detail</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="p-5">
                            {{ $orthers->onEachSide(1)->links('user.pagination.cus_pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
