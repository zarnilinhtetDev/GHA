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

                </li>
            </ul>
        </nav>
        @include('master.sidebar')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Payment</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('/sold_out_car') }}">Sold Out
                                        Cars</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{ url('/Soldout_Detail', $car->id) }}">Sold
                                        Out Cars
                                        Details</a>
                                </li>
                                <li class="breadcrumb-item active">Payment
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                {{-- Modal for Customer Registration --}}
                <div class="container-fluid mb-4 mr-auto">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button type="button" class="btn btn-default text-white" style="background-color: #007BFF"
                                data-toggle="modal" data-target="#modal-lg">
                                Payment Register
                            </button>
                        </div>
                    </div>
                </div>
                @if (session('payment_store'))
                    <h6 class="alert alert-success">
                        {{ session('payment_store') }}
                    </h6>
                @endif
                @if (session('deleteStatus'))
                    <h6 class="alert alert-danger">
                        {{ session('deleteStatus') }}
                    </h6>
                @endif
                @if (session('payment_update'))
                    <h6 class="alert alert-success">
                        {{ session('customer_update') }}
                    </h6>
                @endif
                <div class="modal fade" id="modal-lg">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add payment</h4>

                            </div>
                            {{-- <form action="{{ url('Add_Payment', $payment->id }}" method="POST"> --}}
                            <form action="{{ url('Add_Payment', $car->id) }}" method="POST">

                                @csrf
                                <div class="modal-body">
                                    <div class="form-group col-12">
                                        <label for="price"> Payment Date<span
                                                style="color: red;">&nbsp;*</span></label>
                                        <input type="date" class="form-control" id="payment_date" name="payment_date"
                                            placeholder="Enter Add Payment Date" required>
                                        @error('payment_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="price">Add Payment <span
                                                style="color: red;">&nbsp;*</span></label>
                                        <input type="text" class="form-control" id="add_payment" name="add_payment"
                                            placeholder="Enter Add Payment" required>
                                        @error('add_payment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-12" style="display: none">
                                        <label for="car_id">Car Type</label>
                                        <input type="text" name="car_id" class="form-control" id="car_id"
                                            value="{{ $buyer->car_id ?? 'null' }}">
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment Table</h3>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Payment Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = '1';
                                @endphp
                                @if ($buyer)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $buyer->created_at }}</td>
                                        <td>{{ $buyer->payment }}</td>
                                        <td></td>
                                    </tr>
                                @endif
                                @foreach ($pay as $pays)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>

                                        <td>{{ $pays->payment_date }}</td>
                                        <td>{{ $pays->add_payment }}</td>

                                        <td>

                                            <a href="{{ url('payment-edit', $pays->id) }}" class="btn btn-success"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>

                                            <a href="{{ url('payment_delete', $pays->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete ?')"><i
                                                    class="fa-solid fa-trash"></i></a>



                                        </td>


                                    </tr>

                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="2">
                                        Total
                                    </td>
                                    <td>
                                        {{ $totalAmount }}
                                    </td>
                                    <td></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                {{-- End of Customers Table --}}
            </section>
        </div>
    </div>
    @include('master.footer')
</body>
