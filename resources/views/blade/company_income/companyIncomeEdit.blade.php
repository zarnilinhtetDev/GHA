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


            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Company Income Edit</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/company_income') }}">Company Income</a>
                                </li>
                                <li class="breadcrumb-item active">Company Income Edit</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            {{-- <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>DataTables</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section> --}}

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-3 my-3">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Company Income Update</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ url('/companyincome_show', $income->id) }}" method="POST">
                                    @csrf
                                    <div class="card-body">


                                        <div class="form-group">
                                            <label for="transaction_id">Transaction Name</label>
                                            <select name="transaction_id" class="form-control" id="transaction_id">
                                                <option value="">Select Transaction</option>

                                                @foreach ($transaction as $transactions)
                                                    @if ($income->transaction_id == $transactions->id)
                                                        <option value="{{ $transactions->id }}" selected>
                                                            {{ $transactions->transaction_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $transactions->id }}">
                                                            {{ $transactions->transaction_name }}
                                                        </option>
                                                    @endif
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="company_date">Date</label>
                                            <input class="form-control" type="date" name="company_date"
                                                id="company_date" value="{{ $income->company_date }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="company_price">Price</label>
                                            <input type="text" class="form-control" id="company_price"
                                                name="company_price" value="{{ $income->company_price }}">
                                        </div>


                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border-color:#6B7280"
                                                name="company_description">{{ $income->company_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary"
                                            style="background-color: #007BFF">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
    </div>

    </div>



    </div>


    @include('master.footer')
