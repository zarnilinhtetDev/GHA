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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">


                            <!-- Content Header (Page header) -->
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
                                </div><!-- /.container-fluid -->
                            </section>



                            {{-- Modal Content --}}




                            <div class="my-5 col-md-6 mx-auto">
                                <div class="row col-md-12">
                                    <h5 class="col-md-4">Car Sale :</h5>

                                    @if(isset($car_sales))

                                    <h5 class="col-md-4">{{ $car_sales->car_sale }}</h5>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                        Edit
                                    </button>
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
                                                    <form action="{{url('car_sale/edit')}}" method="post">
                                                        @csrf
                                                        <select name="car_sale" id="" class="form-control">

                                                            <option value=" {{ $car_sales->car_sale  }}">
                                                                {{ $car_sales->car_sale }}
                                                            </option>
                                                            @foreach ($transactions as $transaction )
                                                            <option value=" {{ $transaction->transaction_name }}">
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
                                    <form action="{{url('car_sale')}}" class="col-md-8">
                                        <div class="row col-md-12">
                                            <div class="col-md-8">

                                                <select name="car_sale" id="" class="form-control">


                                                    @foreach ($transactions as $transaction )
                                                    <option value=" {{ $transaction->transaction_name }}">
                                                        {{ $transaction->transaction_name }}
                                                    </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                            <button type="submit" class="btn btn-success">Save</button>

                                        </div>
                                    </form>
                                    @endif
                                </div>






                                <div class="row col-md-12 mt-3">
                                    <h5 class="col-md-4">Car Buy :</h5>
                                    @if(isset($car_buys))
                                    <h5 class="col-md-4">{{$car_buys->car_buy }}</h5>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-buy">
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
                                                    <form action="{{url('car_buy/edit')}}" method="post"> @csrf
                                                        <select name="car_buy" id="" class="form-control">

                                                            <option value=" {{ $car_buys->car_buy  }}">
                                                                {{ $car_buys->car_buy }}
                                                            </option>
                                                            @foreach ($transactions as $transaction )
                                                            <option value=" {{ $transaction->transaction_name }}">
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
                                    <form action="{{url('car_buy')}}" class="col-md-8">
                                        <div class="row col-md-12">
                                            <div class="col-md-8"> <select name="car_buy" id="" class="form-control">


                                                    @foreach ($transactions as $transaction )
                                                    <option value=" {{ $transaction->transaction_name }}">
                                                        {{ $transaction->transaction_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <button class="btn btn-success">Save</button>

                                        </div>
                                    </form> @endif
                                </div>

                                <div class="row col-md-12 mt-3">
                                    <h5 class="col-md-4">Company Expense :</h5>
                                    @if(isset($company_expenses))
                                    <h5 class="col-md-4">{{$company_expenses->company_expense}}</h5>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-expense">
                                        Edit
                                    </button>
                                    <div class="modal fade" id="modal-expense">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Company Expense</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{url('company_expense/edit')}}" method="post"> @csrf
                                                        <select name="company_expense" id="" class="form-control">

                                                            <option value=" {{ $company_expenses->company_expense }}">
                                                                {{ $company_expenses->company_expense }}
                                                            </option>
                                                            @foreach ($transactions as $transaction )
                                                            <option value=" {{ $transaction->transaction_name }}">
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
                                    <form action="{{url('company_expense')}}" class="col-md-8">
                                        <div class="row col-md-12">
                                            <div class="col-md-8"> <select name="company_expense" id="" class="form-control">


                                                    @foreach ($transactions as $transaction )
                                                    <option value=" {{ $transaction->transaction_name }}">
                                                        {{ $transaction->transaction_name }}
                                                    </option>
                                                    @endforeach
                                                </select> </div>



                                            <button class="btn btn-success">Save</button>

                                        </div>
                                    </form>
                                    @endif
                                </div>
                                <div class="row col-md-12 mt-3">
                                    <h5 class="col-md-4">Car Balance Payment:</h5>
                                    @if(isset($car_balance_payments))
                                    <h5 class="col-md-4">{{$car_balance_payments->car_balance_payment}}</h5>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-payment">
                                        Edit
                                    </button>
                                    <div class="modal fade" id="modal-payment">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Car Balance Payment </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{url('car_balance_payment/edit')}}" method="post"> @csrf
                                                        <select name="car_balance_payment" id="" class="form-control">

                                                            <option value=" {{$car_balance_payments->car_balance_payment}}">
                                                                {{$car_balance_payments->car_balance_payment}}
                                                            </option>
                                                            @foreach ($transactions as $transaction )
                                                            <option value=" {{ $transaction->transaction_name }}">
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
                                    <form action="{{url('car_balance_payment')}}" class="col-md-8">
                                        <div class="row col-md-12">
                                            <div class="col-md-8"> <select name="car_balance_payment" id="" class="form-control">


                                                    @foreach ($transactions as $transaction )
                                                    <option value=" {{ $transaction->transaction_name }}">
                                                        {{ $transaction->transaction_name }}
                                                    </option>
                                                    @endforeach
                                                </select> </div>



                                            <button class="btn btn-success">Save</button>

                                        </div>
                                    </form>
                                    @endif
                                </div>
                                <div class="row col-md-12 mt-3">
                                    <h5 class="col-md-4">Car Expense :</h5>
                                    @if(isset($car_expenses))
                                    <h5 class="col-md-4">{{$car_expenses->car_expense}}</h5>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-car-expense">
                                        Edit
                                    </button>
                                    <div class="modal fade" id="modal-car-expense">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Car Expense </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{url('car_expense/edit')}}" method="post"> @csrf
                                                        <select name="car_expense" id="" class="form-control">

                                                            <option value=" {{$car_expenses->car_expense}}">
                                                                {{$car_expenses->car_expense}}
                                                            </option>
                                                            @foreach ($transactions as $transaction )
                                                            <option value=" {{ $transaction->transaction_name }}">
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
                                    <form action="{{url('car_expense')}}" class="col-md-8">
                                        <div class="row col-md-12">
                                            <div class="col-md-8"> <select name="car_expense" id="" class="form-control">


                                                    @foreach ($transactions as $transaction )
                                                    <option value=" {{ $transaction->transaction_name }}">
                                                        {{ $transaction->transaction_name }}
                                                    </option>
                                                    @endforeach
                                                </select> </div>



                                            <button class="btn btn-success">Save</button>

                                        </div>
                                    </form>
                                    @endif
                                </div>
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
    @include('master.footer')
