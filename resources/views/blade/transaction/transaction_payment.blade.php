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
                                            <h1>Transaction Add Payment</h1>
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                                <li class="breadcrumb-item active">Transaction Add Payment</li>
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
                            <div class="container-fluid mb-4 mr-auto">
                                <div class="row">
                                    <div class="col-md-12 text-end">
                                        <button type="button" class="btn btn-default text-white" data-toggle="modal" data-target="#modal-lg" style="background-color: #007BFF">
                                            Payment Register
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <h5 class="my-5"> Transaction
                                Name -{{ $transaction->transaction_name }}</h5>
                            {{-- Modal Content --}}
                            <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Transaction Register</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/payment_register', $transaction->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $transaction->id }}" name="transaction_id">
                                                <input type="hidden" value="{{ $transaction->account->account_name }}" name="account_id">

                                                <div class="form-group">
                                                    <label for="status">Status <span style="color: red;">*</span></label>
                                                    <select name="status" class="form-control" id="status" required>
                                                        <option value="">Choose One</option>
                                                        <option value="in">IN</option>
                                                        <option value="out">OUT</option>
                                                    </select>
                                                    @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="transaction_code">Amount <span style="color: red;">*</span></label>
                                                    <input type="number" class="form-control" id="transaction_code" name="amount" placeholder="Enter Amount" required>
                                                    @error('transaction_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter ..."></textarea>
                                                    @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" style="background-color: #007BFF">Register</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>



                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Transaction Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Account Name</th>


                                                <th>Status</th>



                                                <th>Amount</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = '1';
                                            @endphp
                                            @foreach ($payment as $payments)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $payments->account_id }}</td>
                                                <td>{{ $payments->status }}</td>
                                                <td>{{ $payments->amount }}</td>
                                                <td>{{ $payments->description }}</td>
                                                <td>
                                                    <a href="{{ url('payment_edit', $payments->id) }}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ url('transaction_delete_payment', $payments->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this payment ?')"><i class="fa-solid fa-trash"></i></a>
                                                </td>
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