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
                            <h1>ရရန်စာရင်း</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="{{ url('/expense') }}">Company
                                        Expenses</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{ url('/inout') }}">
                                        ပေးရန် - ရရန် စာရင်းများ</a></li>
                                <li class="breadcrumb-item active">ပေးရန် Update</li>
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
                                    <h3 class="card-title">ရရန် Update</h3>
                                </div>
                                <form action="{{ url('/inout_update', $inout->id) }}" method="POST">
                                    @csrf
                                    <div class="card-body">

                                        <label for="transaction_id">Transaction Name<span
                                                            style="color: red;">&nbsp;*</span></label>
                                        <select name="transaction_id" class="form-control" id="transaction_id" required>
                                            <option value="">Select Transaction</option>

                                            @foreach ($transaction as $transactions)
                                                @if ($inout->transaction_id == $transactions->id)
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
                                        <div class="form-group">
                                            <label for="date">Date<span
                                                            style="color: red;">&nbsp;*</span></label>
                                            <input type="text" class="form-control" id="date" name="date"
                                                placeholder="Enter Date" value="{{ $inout->date }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Price<span
                                                            style="color: red;">&nbsp;*</span></label>
                                            <input type="text" class="form-control" id="price" name="price"
                                                placeholder="Enter Price" value="{{ $inout->price }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input type="text" class="form-control" id="description"
                                                name="description" placeholder="Enter Description "
                                                value="{{ $inout->description }}">
                                        </div>



                                        <!-- /.card-body -->
                                        <div class="modal-footer justify-content-end">

                                            <button type="submit" class="btn btn-primary"
                                                style="background-color: #007BFF">Update</button>
                                        </div>
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
