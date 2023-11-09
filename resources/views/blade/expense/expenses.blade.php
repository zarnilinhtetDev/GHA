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
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">Home</a>
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
                                            <h1> Company Expense</h1>
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                                <li class="breadcrumb-item active"> Company Expense</li>
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
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-default text-white mr-2"
                                            data-toggle="modal" data-target="#modal-lg"
                                            style="background-color: #007BFF">
                                            Company Expense
                                        </button>
                                        <a href="{{ route('expense-category') }}">
                                            <button type="button" class="btn btn-default text-white mr-2"
                                                style="background-color: #007BFF">
                                                Expenses Category
                                            </button>
                                        </a>
                                        <a href="{{ url('company_income') }}">
                                            <button type="button" class="btn btn-default text-white "
                                                style="background-color: #007BFF">
                                                Company Income
                                            </button>
                                        </a>


                                        <a href="{{ url('/daily_expense') }}" class="ml-auto">
                                            <button type="button" class="btn btn-default text-white"
                                                style="background-color: #007BFF">
                                                ‌Daily Expenses
                                            </button>
                                        </a>

                                        <a href="{{ url('/inout') }}" class="ml-6">
                                            <button type="button" class="btn btn-default text-white"
                                                style="background-color: #007BFF">
                                                ‌ပေးရန်/ရရန်
                                            </button>
                                        </a>
                                        <a href="{{ url('car_company_expense') }}" class="ml-6">
                                            <button type="button" class="btn btn-default text-white mr-2"
                                                style="background-color:#5A6268">
                                                Car/Company Expenses
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>


                            {{-- Modal Content --}}
                            <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Company Expense Register</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/expense_register') }}" method="POST">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="category">Category Name</label>
                                                    <select name="category" class="form-control" id="category">
                                                        <option value="">Select Category
                                                            @foreach ($expenseCategory as $category)
                                                        <option value="{{ $category->category_name }}">
                                                            {{ $category->category_name }}
                                                        </option>
                                                        @endforeach
                                                        </option>
                                                    </select>
                                                    @error('category')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="expense_date">Date</label>
                                                    <input class="form-control" type="date" name="expense_date"
                                                        id="expense_date" placeholder="Enter Date"
                                                        value="{{ old('expense_date') }}">
                                                    @error('expense_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="expense_price">Price</label>
                                                    <input type="text" class="form-control" id="expense_price"
                                                        name="expense_price" placeholder="Enter Expense Price"
                                                        value="{{ old('expense_price') }}">
                                                    @error('expense_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" rows="3" placeholder="Enter ..." style="border-color:#6B7280"
                                                        name="expense_description"></textarea>
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
                            </div>

                            <div class="container-fluid my-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="{{ route('filter.companyExpense') }}" method="get">
                                            <div class="row">
                                                <div class="col-md-5 form-group">
                                                    <label for="">Date From :</label>
                                                    <input type="date" name="start_date" class="form-control">
                                                </div>
                                                <div class="col-md-5 form-group">
                                                    <label for="">Date To :</label>
                                                    <input type="date" name="end_date" class="form-control">
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
                                <div class="card-header">
                                    <h3 class="card-title">Company Expense Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Category Name</th>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = '1';
                                                $totalExpensePrice = 0.0;
                                            @endphp
                                            @if (isset($companyExpense))
                                                @foreach ($companyExpense as $comexpense)
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $comexpense->category }}</td>
                                                        <td>{{ $comexpense->expense_date }}</td>
                                                        <td>{{ $comexpense->expense_description }}</td>
                                                        <td>{{ $comexpense->expense_price }}</td>
                                                        <td>
                                                            <a href="{{ url('expense_show', $comexpense->id) }}"
                                                                class="btn btn-success"><i
                                                                    class="fa-solid fa-pen-to-square"></i></a>
                                                            <a href="{{ url('expense_delete', $comexpense->id) }}"
                                                                class="btn btn-danger"><i
                                                                    class="fa-solid fa-trash"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                @foreach ($expense as $expenses)
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $expenses->category }}</td>
                                                        <td>{{ $expenses->expense_date }}</td>
                                                        <td>{{ $expenses->expense_description }}</td>
                                                        <td>{{ $expenses->expense_price }}</td>
                                                        <td>
                                                            <a href="{{ url('expense_show', $expenses->id) }}"
                                                                class="btn btn-success"><i
                                                                    class="fa-solid fa-pen-to-square"></i></a>
                                                            <a href="{{ url('expense_delete', $expenses->id) }}"
                                                                class="btn btn-danger"><i
                                                                    class="fa-solid fa-trash"></i>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $no++;
                                                        $totalExpensePrice += $expenses->expense_price;
                                                    @endphp
                                                @endforeach
                                                <tr>
                                                    <th scope="row" colspan="4">Total Expense</th>
                                                    <td>{{ number_format($totalExpensePrice, 2) }}</td>
                                                    <td></td>
                                                </tr>
                                            @endif
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

        </div>



    </div>


    @include('master.footer')
