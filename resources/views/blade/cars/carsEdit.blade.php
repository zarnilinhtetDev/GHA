@include('master.header')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->

        </nav>

        @include('master.sidebar')

        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-sm-6">
                                <h1>Cars</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Cars Edit
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="card">
                    <form action="{{ url('cars_update', $carShow->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="car_type">Car Type<span style="color: red;">&nbsp;*</span></label>
                                    <input type="text" class="form-control" id="car_type" name="car_type"
                                        value="{{ $carShow->car_type }}" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="car_model">Car Grade<span style="color: red;">&nbsp;*</span></label>
                                    <input type="text" class="form-control" id="car_model" name="car_model"
                                        value="{{ $carShow->car_model }}"required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="car_number">Car Number<span style="color: red;">&nbsp;*</span></label>
                                    <input type="text" class="form-control" id="car_number" name="car_number"
                                        value="{{ $carShow->car_number }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="manufacture_year">Car Manufacture Year<span
                                            style="color: red;">&nbsp;*</span></label>
                                    <input type="text" class="form-control" id="manufacture_year"
                                        name="manufacture_year" value="{{ $carShow->manufacture_year }}"required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="License_expire">License Expire<span
                                            style="color: red;">&nbsp;*</span></label>
                                    <input type="text" class="form-control" id="License_expire" name="License_expire"
                                        value="{{ $carShow->License_expire }}"required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="car_color">Car Color<span style="color: red;">&nbsp;*</span></label>
                                    <input type="text" class="form-control" id="car_color" name="car_color"
                                        value="{{ $carShow->car_color }}"required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="car_images">Car Images<span style="color: red;">&nbsp;*</span></label>
                                    <div class="border p-1" style="border:#d0d0db 1px solid">
                                        {{-- <input type="file" class="form-control-file" id="car_images"
                                            name="car_images" required> --}}

                                        <input type="file" class="form-control-file" id="car_images"
                                            name="car_images" value="{{ $carShow->car_images }}">
                                    </div>
                                    @error('car_images')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if ($carShow->car_images)
                                        <div class="mt-2">

                                            <img src="{{ asset('carimage/' . $carShow->car_images) }}"
                                                onclick="window.open(this.src,'_blank')" width="100px">

                                        </div>
                                    @endif
                                </div>

                            </div>
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control p-1" rows="3" placeholder="Enter ..." style="border:#d0d0db 1px solid"
                                    name="description">{{ $carShow->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary"
                                style="background-color: #007BFF">Update</button>
                        </div>
                    </form>
                </div>


            </section>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; SSE Web Solutions</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    @include('master.footer')
