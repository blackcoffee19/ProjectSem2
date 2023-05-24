@extends('admin.partials.master')
@section('admin-content')
    <main>
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <!-- page header -->
                        <div>
                            <h2>Add New Customers</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                            class="text-inherit">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Customers</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add New Customers</li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <a href="{{ Route('adminCustomers') }}" class="btn btn-light">Back to Customers</a>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ Route('adminStoreCustomers') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-6 shadow border-0 row">
                    <div class="col">
                        <div class="card-body p-6 ">
                            <h4 class="mb-5 h5">Customers Image</h4>
                            <div class="mb-4 d-flex">
                                <div class="position-relative">
                                    <input type="file" id="form5Example3" name="avatar"
                                        onchange="document.getElementById('img-previewone').src = window.URL.createObjectURL(this.files[0]); document.getElementById('img-previewone').style.display = 'block'">
                                    <img id="img-previewone" style="margin-top: 20px; display: none; width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body p-6 ">
                            <h4 class="form-label">Customers Name</h4>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="card-body p-6 ">
                            <h4 class="form-label">Phone</h4>
                            <input type="text" name="phone" class="form-control">
                            <span class="text-danger" id="valiPhone"></span>
                        </div>


                        <div class="card-body p-6 ">
                            <h4 class="form-label">Email</h4>
                            <input type="email" name="email" class="form-control " placeholder="....@gmail.com"
                                required>
                                <span class="text-danger" id="valiEmail"></span>
                        </div>
                        <div class="card-body p-6 ">
                            <h4 class="form-label">Password</h4>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="card-body p-6 ">
                            <h4 class="form-label">Select</h4>

                            <input type="radio" id="user" name="admin" value="0" checked>
                            <label for="user"> User </label> &emsp;
                            <input type="radio" id="admin" name="admin" value="1">
                            <label for="admin"> Admin </label> &emsp;
                            <input type="radio" id="manager" name="admin" value="2">
                            <label for="manager"> Manager </label>
                        </div>

                    </div>
                    <div class="card-body p-6 ">
                        <button type="submit" class="btn btn-primary" id="submit_createcus" style="width: 100%">Create</button>
                    </div>
                </div>
        </div>
        </form>

        </div>
    </main>
@endsection
@section('admin-script')
    <script>
        $(document).ready(function(){
            let validatePhone = /^[0-9]{9,11}$/;
            let validateEmail = /^[a-z0-9](\.?[a-z0-9]){5,}@gmail\.com$/;
            $("input[name=phone]").change(function(e){
                e.preventDefault();
                if(!validatePhone.test($(this).val())){
                  $("#submit_createcus").attr('disabled','disabled');
                    $('#valiPhone').text("Invail Phone. Try again");
                    $(this).addClass('is-invalid');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#valiPhone').text('');
                }
            })
            $("input[name=email]").change(function(e){
                if(!validateEmail.test($(this).val())){
                    $('#valiEmail').text("Invaild Email. Try again");
                    $("#submit_createcus").attr('disabled','disabled');
                    $(this).addClass('is-invalid');      
                }else{
                    $(this).removeClass('is-invalid');
                    $('#submit_createcus').text('');
                };
            })
        })
    </script>
@endsection