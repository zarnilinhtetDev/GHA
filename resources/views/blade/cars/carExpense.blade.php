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

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">


                            <!-- Content Header (Page header) -->
                            <section class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h1>Expenses</h1>
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                                <li class="breadcrumb-item active">Car Expenses</li>
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
                            <div class="container-fluid mb-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-end">
                                            <!-- Added d-flex and justify-content-end classes -->
                                            <button type="button" class="btn btn-default text-white"
                                                data-toggle="modal" data-target="#modal-lg"
                                                style="background-color: #007BFF">
                                                Cars Expenses
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal Content --}}
                            <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Car Expenses</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('car_expense_store', $car->id) }}" method="POST">
                                                @csrf

                                                <div class="form-group " style="display:none">
                                                    <label for="expense_price">Car Name</label>
                                                    <input type="text" value="{{ $car->id }}"
                                                        class="form-control" id="expense_price" name="expense_price"
                                                        placeholder="Enter Expense Amount"
                                                        value="{{ old('expense_price') }}">


                                                </div>

                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" rows="3" name="description" placeholder="Enter ..."></textarea>

                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="expense_price">Price</label>
                                                    <input type="text" class="form-control" id="expense_price"
                                                        name="expense_price" placeholder="Enter Expense Amount"
                                                        value="{{ old('expense_price') }}">

                                                    @error('expense_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
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



                            <h3 class="text-secondary">Car Name - {{ $car->car_type }}</h3>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Transaction Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>{{ $car->car_type }} &nbsp; ( {{ $car->car_number }})</td>
                                                <td>

                                                    @if ($buy)
                                                        {{ $buy->price }}
                                                </td>
                                            @else
                                                N/A
                                                @endif

                                                </td>
                                                <td>

                                                    @if ($buy)
                                                        {{ $buy->created_at }}
                                                </td>
                                            @else
                                                N/A
                                                @endif
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-danger" style="width:82px"><i
                                                            class="fa-solid fa-trash"></i>
                                                </td>
                                            </tr>


                                            @foreach ($expenses as $expense)
                                                <tr>


                                                    <td>{{ $car->car_type }} &nbsp; ( {{ $car->car_number }})&nbsp;
                                                        &nbsp;&nbsp; &nbsp;{{ $expense->description }}</td>
                                                    <td>{{ $expense->expense_price }}</td>
                                                    <td>{{ $expense->created_at }}</td>
                                                    <td>


                                                        <a type="button" class="btn btn-success text-white"
                                                            data-toggle="modal" data-target="#modal-lg1">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="{{ route('delete.expense', $expense->id) }}"
                                                            class="btn btn-danger">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row" colspan="4">Total Expenses</th>
                                                    <td>

                                                    </td>

                                        </tbody>
                                        <div class="modal fade" id="modal-lg1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Car Expenses Edit</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('expense/edit', $car->id) }}"
                                                            method="POST">
                                                            @csrf

                                                            <div class="form-group " style="display:none">
                                                                <label for="expense_price">Car Name</label>
                                                                <input type="text" value="{{ $car->id }}"
                                                                    class="form-control" id="expense_price"
                                                                    name="expense_price"
                                                                    placeholder="Enter Expense Amount"
                                                                    value="{{ old('expense_price') }}">


                                                            </div>

                                                            <div class="form-group">
                                                                <label for="description">Description</label>

                                                                <textarea class="form-control" rows="3" name="description" placeholder="Enter ...">
@isset($expense)
{{ $expense->description }}
@endisset
</textarea>

                                                                @error('description')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="expense_price">Price</label>
                                                                <input type="text" class="form-control"
                                                                    id="expense_price" name="expense_price"
                                                                    placeholder="Enter Expense Amount"
                                                                    value="{{ isset($expense) ? $expense->expense_price : '' }}">

                                                                @error('expense_price')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
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