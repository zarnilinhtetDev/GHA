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

                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a
                                                        href="{{ url('/dashboard') }}">Dashboard</a></li>
                                                <li class="breadcrumb-item active"> Transaction</li>
                                            </ol>
                                        </div>

                                    </div>
                                </div><!-- /.container-fluid -->
                            </section>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('deleteStatus'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('deleteStatus') }}
                                </div>
                            @endif
                            @if (session('updateStatus'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('updateStatus') }}
                                </div>
                            @endif


                            <div class="container-fluid my-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="{{ url('monthly_transaction_search', $account->id) }}"
                                            method="post">
                                            <div class="row">
                                                <div class="col-md-5 form-group">
                                                    <label for="">Date From :</label>
                                                    <input type="date" name="start_date" class="form-control"
                                                        required>
                                                </div>
                                                <div class="col-md-5 form-group">
                                                    <label for="">Date To :</label>
                                                    <input type="date" name="end_date" class="form-control" required>
                                                </div>
                                                <div class="col-md-3 mt-3 form-group">
                                                    <input type="submit" class="btn btn-primary form-control"
                                                        value="Search" style="background-color: #218838">
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <h3><span style="font-weight:bold">Account Name : {{ $account->account_name }}</span></h3>
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">Transaction Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>

                                                <th>Transaction Name</th>
                                                <th>Status</th>
                                                <th>Amount </th>
                                                <th>Description</th>
                                                <th>Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = '1';
                                            @endphp
                                            @foreach ($transactions as $transaction)
                                                <tr>
                                                    <td>{{ $no }}</td>


                                                    <td>{{ $transaction->transaction_name }}</td>
                                                    <td>{{ ucfirst($transaction->status) }}</td>
                                                    <td>{{ $transaction->transaction_code }}</td>
                                                    <td>{{ $transaction->description }}</td>
                                                    <td>{{ $transaction->created_at }}</td>


                                                </tr>
                                                @php
                                                    $no++;
                                                @endphp
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
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
