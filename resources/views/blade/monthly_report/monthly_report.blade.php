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
            <ul class="navbar-nav ml-auto">


                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="btn btn-danger text-white">Logout</a>
                </li>
            </ul>
        </nav>
        @include('master.sidebar')
        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">


                            <!-- Content Header (Page header) -->
                            <section class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h1>Monthly Report</h1>
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                                <li class="breadcrumb-item active">Monthly Report</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </section>

                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <a class="small-box bg-primary d-flex align-items-center justify-content-center" href="{{ url('car_report') }}">
                                        <div class="inner">
                                            <p class="my-auto">Car Report</p>
                                        </div>
                                    </a>

                                </div>
                                <div class="col-md-6">
                                    <a class="small-box bg-primary d-flex align-items-center justify-content-center" href="{{ url('account_report') }}">
                                        <div class="inner">
                                            <p class="my-auto">Account Report</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

            </section>


        </div>



    </div>
    @include('master.footer')
