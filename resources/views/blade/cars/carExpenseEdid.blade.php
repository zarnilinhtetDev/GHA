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
                                <h1>Cars Expenses Edit</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Cars Expenses Edit
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                @if (session('updateStatus'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('updateStatus') }}
                </div>
                @endif
                <div class="card p-4 col-md-6 mx-auto">
                    <form action="{{ url('car_expense_update', $carExpense->id) }}"
                        method="POST">
                        @csrf

                        <div class="form-group " style="display: none" >
                            <label for="expense_price">Car Name</label>
                            <input type="text" value="{{ $car->id }}"
                                class="form-control" id="expense_price"
                                name="expense_price"
                                placeholder="Enter Expense Amount"
                                value="{{ old('expense_price') }}">

                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>

                            <textarea class="form-control" rows="3" name="description" placeholder="Enter ..."> @isset($carExpense)
{{ $carExpense->description }}
@endisset
                                </textarea>
                        </div>

                        <div class="form-group">
                            <label for="expense_price">Price</label>
                            <input type="number" class="form-control"
                                id="expense_price" name="expense_price"
                                placeholder="Enter Expense Amount"
                                value="{{ isset($carExpense) ? $carExpense->expense_price : '' }}">
                        </div>



                        <!-- /.card-body -->
                        <div class="modal-footer justify-content-between">

                            <button type="submit" class="btn btn-primary"
                                style="background-color: #007BFF">Update</button>
                        </div>
                    </form>
                </div>


            </section>

        </div>
    </div>


    @include('master.footer')
