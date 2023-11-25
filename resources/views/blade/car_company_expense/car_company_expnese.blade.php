@include('master.header')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->


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
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Car/Company Expenses</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('/expense') }}">Company
                                            Expenses</a>
                                    </li>
                                    <li class="breadcrumb-item active">Car/Company Expenses</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <div class="card">
                    <div class="card-header" style="background-color: #7fb1e6">
                        <h3 class="card-title text-white">Car Expense</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">



                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <th>Car Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    $totalPrice = 0;
                                @endphp

                                @foreach ($car_expenses as $car_expense)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $car_expense->car->car_type ?? 'null' }}</td>
                                        <td>{{ $car_expense->description }}</td>
                                        <td>{{ $car_expense->expense_price }}</td>

                                        @php
                                            $no++;
                                            $totalPrice += $car_expense->expense_price;
                                        @endphp
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3"></td>
                                    <td><strong>Total: {{ $totalPrice }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <hr>
                    <div class="card-body mt-3">
                        <form action="{{ url('/search') }}" method="POST">
                            @csrf
                            <div class="col-md-12 d-flex ">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="">Date From:</label>
                                        <input type="date" name="start_date" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Date To:</label>
                                        <input type="date" name="end_date" class="form-control" required>
                                    </div>
                                    <div class="col-md-3 mt-3 form-group">
                                        <input type="submit" class="btn btn-primary form-control" value="Search"
                                            style="background-color: #0069D9">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header " style="background-color: #7fb1e6">
                        <h3 class="card-title text-white">Company Expense</h3>
                    </div>
                    <!-- /.card-header -->


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <th>Transaction</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $totalPrice = 0; // Initialize the total price variable.
                            @endphp
                            @if (isset($company_expenses))
                                @foreach ($company_expenses as $company_expense)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $company_expense->transaction->transaction_name }}</td>
                                        <td>{{ $company_expense->expense_date }}</td>
                                        <td>{{ $company_expense->expense_description }}</td>
                                        <td>{{ $company_expense->expense_price }}</td>

                                        @php
                                            $no++;
                                            $totalPrice += $company_expense->expense_price; // Add the expense price to the total.
                                        @endphp
                                    </tr>
                                @endforeach
                            @else
                                @foreach ($search_company_expenses as $search_company_expense)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $search_company_expense->category }}</td>
                                        <td>{{ $search_company_expense->expense_date }}</td>
                                        <td>{{ $search_company_expense->expense_description }}</td>
                                        <td>{{ $search_company_expense->expense_price }}</td>

                                        @php
                                            $no++;
                                            $totalPrice += $search_company_expense->expense_price; // Add the expense price to the total.
                                        @endphp
                                    </tr>
                                @endforeach
                            @endif



                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <td><strong>Total: {{ $totalPrice }}</strong></td>
                            </tr>
                        </tfoot>

                    </table>

                </div>
                <!-- /.card-body -->

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
