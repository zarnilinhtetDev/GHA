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

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">



                            <section class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h1>Settings</h1>
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                                <li class="breadcrumb-item active">Settings</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </section>




                            <div class="my-5 col-md-6 mx-auto">
                                <div class="row col-md-12">
                                    <h5 class="col-md-5">Car Sale :</h5>

                                    @if ($sale_setting->transaction_id != null)

                                    <h5 class="col-md-5">{{ $sale_setting->transaction->transaction_name }}</h5>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                            Edit
                                        </button>
                                    </div>
                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Car Sale</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('car_sale/edit') }}" method="post">
                                                        @csrf
                                                        <select name="transaction_id" id="" class="form-control">

                                                            <option value=" {{ $sale_setting->transaction_id }}">
                                                                {{ $sale_setting->transaction->transaction_name }}
                                                            </option>
                                                            @foreach ($transactions as $transaction)
                                                            <option value=" {{ $transaction->id }}">
                                                                {{ $transaction->transaction_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    @else
                                    <form action="{{ url('car_sale') }}" class="col-md-7">
                                        <div class="row col-md-12">
                                            <div class="col-md-9">

                                                <select name="transaction_id" id="" class="form-control">


                                                    <option value="" selected disabled>
                                                Choose Transaction
                                                    </option>
                                                    @foreach ($transactions as $transaction)
                                                    <option value=" {{ $transaction->id }}">
                                                        {{ $transaction->transaction_name }}
                                                    </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>

                                        </div>
                                    </form>
                                    @endif
                                </div>
                                <div class="row col-md-12 mt-3">
                                    <h5 class="col-md-5">Car Buy :</h5>

                                    @if ($buy_setting->transaction_id != null)

                                    <h5 class="col-md-5">{{ $buy_setting->transaction->transaction_name }}</h5>

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-buy">
                                        Edit
                                    </button>
                                    <div class="modal fade" id="modal-buy">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Car Buy</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('car_buy/edit') }}" method="post">
                                                        @csrf
                                                        <select name="transaction_id" id="" class="form-control">

                                                            <option value=" {{ $buy_setting->transaction_id }}">
                                                                {{ $buy_setting->transaction->transaction_name }}
                                                            </option>
                                                            @foreach ($transactions as $transaction)
                                                            <option value=" {{ $transaction->id }}">
                                                                {{ $transaction->transaction_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    @else
                                    <form action="{{ url('car_buy') }}" class="col-md-7">
                                        <div class="row col-md-12">
                                            <div class="col-md-9">

                                                <select name="transaction_id" id="" class="form-control">

                                                    <option value="" selected disabled>
                                                        Choose Transaction
                                                            </option>
                                                    @foreach ($transactions as $transaction)
                                                    <option value=" {{ $transaction->id }}">
                                                        {{ $transaction->transaction_name }}
                                                    </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                                <div class="row col-md-12 mt-3">
                                    <h5 class="col-md-5">Car Expense :</h5>

                                    @if ($car_expense_setting->transaction_id != null)

                                    <h5 class="col-md-5">{{ $car_expense_setting->transaction->transaction_name }}
                                    </h5>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-expense">
                                        Edit
                                    </button>
                                    <div class="modal fade" id="modal-expense">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Car Expense</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('car_expense/edit') }}" method="post">
                                                        @csrf
                                                        <select name="transaction_id" id="" class="form-control">

                                                            <option value=" {{ $buy_setting->transaction_id }}">
                                                                {{ $buy_setting->transaction->transaction_name }}
                                                            </option>
                                                            @foreach ($transactions as $transaction)
                                                            <option value=" {{ $transaction->id }}">
                                                                {{ $transaction->transaction_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    @else
                                    <form action="{{ url('car_expense') }}" class="col-md-7">
                                        <div class="row col-md-12">
                                            <div class="col-md-9">

                                                <select name="transaction_id" id="" class="form-control">

                                                    <option value="" selected disabled>
                                                        Choose Transaction
                                                            </option>
                                                    @foreach ($transactions as $transaction)
                                                    <option value=" {{ $transaction->id }}">
                                                        {{ $transaction->transaction_name }}
                                                    </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>

                                        </div>
                                    </form>
                                    @endif
                                </div>
                                <div class="row col-md-12 mt-3">
                                    <h5 class="col-md-5">Company Expense :</h5>

                                    @if ($company_expense_setting->transaction_id != null)

                                    <h5 class="col-md-5">
                                        {{ $company_expense_setting->transaction->transaction_name }}
                                    </h5>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-company_expense">
                                            Edit
                                        </button>
                                    </div>
                                    <div class="modal fade" id="modal-company_expense">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Company Expense</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('company_expense/edit') }}" method="post">
                                                        @csrf
                                                        <select name="transaction_id" id="" class="form-control">

                                                            <option value=" {{ $company_expense_setting->transaction_id }}">
                                                                {{ $company_expense_setting->transaction->transaction_name }}
                                                            </option>
                                                            @foreach ($transactions as $transaction)
                                                            <option value=" {{ $transaction->id }}">
                                                                {{ $transaction->transaction_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    @else
                                    <form action="{{ url('company_expense') }}" class="col-md-7">
                                        <div class="row col-md-12">
                                            <div class="col-md-9">

                                                <select name="transaction_id" id="" class="form-control">

                                                    <option value="" selected disabled>
                                                        Choose Transaction
                                                            </option>
                                                    @foreach ($transactions as $transaction)
                                                    <option value=" {{ $transaction->id }}">
                                                        {{ $transaction->transaction_name }}
                                                    </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>

                                        </div>
                                    </form>
                                    @endif
                                </div>
                                <div class="row col-md-12 mt-3">
                                    <h5 class="col-md-5">Car Balance Payment:</h5>

                                    @if ($car_buy_payment_setting->transaction_id != null)

                                    <h5 class="col-md-5">
                                        {{ $car_buy_payment_setting->transaction->transaction_name }}
                                    </h5>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-car_buy_payment_setting">
                                        Edit
                                    </button>
                                    <div class="modal fade" id="modal-car_buy_payment_setting">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Car Balance Payment</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('car_balance_payment/edit') }}" method="post">
                                                        @csrf
                                                        <select name="transaction_id" id="" class="form-control">

                                                            <option value=" {{ $company_expense_setting->transaction_id }}">
                                                                {{ $car_buy_payment_setting->transaction->transaction_name }}
                                                            </option>
                                                            @foreach ($transactions as $transaction)
                                                            <option value=" {{ $transaction->id }}">
                                                                {{ $transaction->transaction_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    @else
                                    <form action="{{ url('car_balance_payment') }}" class="col-md-7">
                                        <div class="row col-md-12">
                                            <div class="col-md-9">

                                                <select name="transaction_id" id="" class="form-control">

                                                    <option value="" selected disabled>
                                                        Choose Transaction
                                                            </option>
                                                    @foreach ($transactions as $transaction)
                                                    <option value=" {{ $transaction->id }}">
                                                        {{ $transaction->transaction_name }}
                                                    </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>

                                        </div>
                                    </form>
                                    @endif
                                </div>





                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
    @include('master.footer')
