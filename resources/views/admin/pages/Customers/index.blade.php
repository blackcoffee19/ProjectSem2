@extends('admin.partials.master')
@section('admin-content')
    <main>
        <div class="container">
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <h2>Customers</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="#" class="text-inherit">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Customers
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <a href="{{ route('adminAddCustomers') }}" class="btn btn-primary">Add New Customer</a>
                            {{-- em đặt tên gì thì lấy tên đó nhé --}}
                            {{-- khi em nhấn thì nó theo tên ở trên đi vào route -> gọi hàm create() trong controller -> controller trả về
                                trang chứ form nhập liệu
                                trang nhập liệu khi nhấn create thì gọi thằng store xử lý em chưa viết hàm thì nó xử lý không được
                                --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-12 mb-5">
                    <div class="card h-100 card-lg">
                        <div class="p-6">
                            <div class="row justify-content-between">
                                <div class="col-md-4 col-12">
                                    <form class="d-flex" role="search">
                                        <input class="form-control" type="search" placeholder="Search Customers"
                                            aria-label="Search" />
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table
                                    class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Purchase Date</th>
                                            <th>Phone</th>
                                            <th>Rank</th>
                                            <th>Spent</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{--  Những dữ liệu cứng không cần thiết thì bỏ đi  --}}
                                        {{--  dùng vòng lăpk @foreach để lấy dữ liệu ra  --}}
                                        {{--  dòng foreach à vòng lặp, và ta muốn lặp từng dòng, nghĩa là lặp <tr>, vi tr là dòng  --}}
                                        @foreach ($users as $item)
                                            {{--  lấy cái biến ở controller bỏ vao đây, cho nó 1 cái tên mới là $item  --}}
                                            <tr>
                                                <td>{{ $item->id_user }}</td>
                                                <td>
                                                    <img src="{{ asset('images/avatar/' . $item->avatar) }}" alt=""
                                                        style="width: 50px;">
                                                    {{ $item->name }}
                                                </td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>
                                                    @if ($item->admin == 1)
                                                        Admin
                                                    @elseif ($item->admin == 2)
                                                        Manager
                                                    @else
                                                        User
                                                    @endif
                                                </td>
                                                <td>-</td> {{-- cái giá hơi khó để sau --}}

                                                <td>
                                                    @if ($item->admin != '1')
                                                        <div class="dropdown">
                                                            <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ Route('adminShowCustomers', $item->id_user) }}">
                                                                        <i class="bi bi-eye me-3"></i>Detail</a>
                                                                </li>

                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ Route('adminEditCustomers', $item->id_user) }}">
                                                                        <i class="bi bi-pencil-square me-3"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <form
                                                                        action="{{ Route('adminDeleteCustomers', $item->id_user) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item">
                                                                            <i class="bi bi-trash me-3"></i>Delete
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endif
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
        </div>
    </main>
@endsection
