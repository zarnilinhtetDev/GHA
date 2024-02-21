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
                                                <li class="breadcrumb-item"><a
                                                        href="{{ url('/dashboard') }}">Dashboard</a></li>
                                                <li class="breadcrumb-item active">Monthly Report</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </section>



                            {{-- Modal Content --}}
                            {{-- <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Transaction Register</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/transaction_register') }}" method="POST">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="accounts_id">Account Name <span
                                                            style="color: red;">&nbsp;*</span></label>
                                                    <select name="account_id" class="form-control" id="account_id"
                                                        required>
                                                        <option value="">Select Account</option>


                                                    </select>
                                                    @error('account_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="transaction_code">Code<span
                                                            style="color: red;">&nbsp;*</span></label>
                                                    <input type="text" class="form-control" id="transaction_code"
                                                        name="transaction_code" placeholder="Enter Transaction Code"
                                                        required>
                                                    @error('transaction_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="transaction_name">Name<span
                                                            style="color: red;">&nbsp;*</span></label>
                                                    <input type="text" class="form-control" id="transaction_name"
                                                        name="transaction_name" placeholder="Enter Transaction Name"
                                                        required>
                                                    @error('transaction_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Descriptions</label>
                                                    <textarea class="form-control" rows="3" placeholder="Enter ..." style="border-color:#6B7280" name="description"></textarea>
                                                </div>

                                                <!-- /.card-body -->
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        style="background-color: #007BFF">Register</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div> --}}


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

                            {{-- <div class="card-header">
                                    <h3 class="card-title">Monthly Report Table</h3>
                                </div> --}}
                            <!-- /.card-header -->
                            {{-- <div class="card-body"> --}}
                            {{-- <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Total Buy Car</th>
                                                <th>Total Sold Out Car</th>
                                                <th>Total Car Expense Price</th>
                                                <th>Total Buy Price</th>
                                                <th>Total Sold Out Car's Price</th>
                                                <th>Total Profit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = '1';
                                            @endphp
                                            {{-- @foreach ($transaction as $transactions)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $transactions->account->account_name }}</td>

                                                    <td>{{ $transactions->transaction_code }}</td>
                                                    <td>{{ $transactions->transaction_name }}</td>
                                                    <td>{{ $transactions->description }}</td>
                                                    <td>
                                                        <a href="{{ url('transaction_show', $transactions->id) }}"
                                                            class="btn btn-success"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ url('transaction_delete', $transactions->id) }}"
                                                            class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this transaction ?')"><i
                                                                class="fa-solid fa-trash"></i>
                                                    </td>
                                                </tr>
                                                @php
                                                    $no++;
                                                @endphp
                                            @endforeach --}}
                            {{-- </tbody>
                                    </table> --}}
                            <div class="container-fluid my-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="{{ url('monthly_search') }}" method="get">
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


                            <div class="card">
                                <div class="container-fluid mt-3 ">
                                    <div class="row ml-2 mr-2">
                                        <div class="col-md-4">

                                            <table class='table table-bordered mt-4'>
                                                <tr style="background-color:#F4F6F9">
                                                    <td style="width:70% "> <span class="text-dark">Total Buy
                                                            Car</span></td>
                                                    <td>
                                                        <span
                                                            class="text-dark ">{{ isset($total_car) ? $total_car : 0 }}</span>
                                                    </td>

                                                </tr>
                                            </table>

                                            {{-- <p class="card-text">Total Buy Car - {{ $total_car }}
                                                    </p> --}}
                                        </div>



                                        <div class="col-md-4">
                                            <table class='table table-bordered mt-4'>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span class="text-dark">Total
                                                            Sold Out Car </span></td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_sold_out_car) ? $total_sold_out_car : 0 }}
                                                    </td>

                                                </tr>
                                            </table>



                                        </div>

                                        <div class="col-md-4">

                                            <table class='table table-bordered mt-4'>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span class="text-dark">Total
                                                            Car Expense Price
                                                        </span> </td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_expense) ? $total_expense : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <div class="card">
                                                <div class="card-body">

                                                    <p class="card-text">Total Car Expense Price -
                                                        {{ isset($total_expense) ? $total_expense : 0 }}
                                                    </p>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid mt-3 ">
                                    <div class="row ml-2 mr-2">
                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered '>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span class="text-dark">Total
                                                            Buy Price</span> </td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_buy_price) ? $total_buy_price : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <p class="card-text">Total Buy Price
                                                        -{{ isset($total_buy_price) ? $total_buy_price : 0 }}
                                                    </p> --}}


                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered '>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span class="text-dark">Total
                                                            Sold Out Price </span></td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_sell_price) ? $total_sell_price : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <div class="card">
                                                <div class="card-body">

                                                    <p class="card-text">Total Sold Out Price
                                                        -{{ isset($total_sell_price) ? $total_sell_price : 0 }}
                                                    </p>
                                                </div>
                                            </div> --}}
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered ' style="font-size: 20">
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70% "><span
                                                            class="text-dark">Total
                                                            Car Profit</span> </td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_profit) ? $total_profit : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <div class="card">
                                                <div class="card-body">

                                                    <p class="card-text">Profit
                                                        - {{ isset($total_profit) ? $total_profit : 0 }}
                                                    </p>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid mt-3 ">
                                    <div class="row ml-2 mr-2">
                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered '>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span
                                                            class="text-dark">Total Company Icome</span> </td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_company_income) ? $total_company_income : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <p class="card-text">Total Buy Price
                                                        -{{ isset($total_buy_price) ? $total_buy_price : 0 }}
                                                    </p> --}}


                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered '>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span
                                                            class="text-dark">Total Company Expenses </span></td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_company_expense) ? $total_company_expense : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <div class="card">
                                                <div class="card-body">

                                                    <p class="card-text">Total Sold Out Price
                                                        -{{ isset($total_sell_price) ? $total_sell_price : 0 }}
                                                    </p>
                                                </div>
                                            </div> --}}
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered ' style="font-size: 20">
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70% "><span
                                                            class="text-dark">Total
                                                            Company Profit</span> </td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_company_profit) ? $total_company_profit : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <div class="card">
                                                <div class="card-body">

                                                    <p class="card-text">Profit
                                                        - {{ isset($total_profit) ? $total_profit : 0 }}
                                                    </p>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid mt-3 mb-3">
                                    <div class="row ml-2 mr-2">
                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered '>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span
                                                            class="text-dark">Total ရရန်</span> </td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_out) ? $total_out : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <p class="card-text">Total Buy Price
                                                        -{{ isset($total_buy_price) ? $total_buy_price : 0 }}
                                                    </p> --}}


                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered '>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span
                                                            class="text-dark">Total ပေးရန် </span></td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_in) ? $total_in : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <div class="card">
                                                <div class="card-body">

                                                    <p class="card-text">Total Sold Out Price
                                                        -{{ isset($total_sell_price) ? $total_sell_price : 0 }}
                                                    </p>
                                                </div>
                                            </div> --}}
                                        </div>


                                    </div>
                                </div>
                            </div>
                            {{-- </div> --}}
                            <!-- /.card-body -->

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
