@include('master.header')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">


                <li class="nav-item">


                    <a href="{{ url('/logout') }}" class="btn btn-danger text-white">Logout</a>


                </li>
            </ul>

        </nav>

        @include('master.sidebar')

        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Cars Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard / Cars</a></li>
                                <li class="breadcrumb-item active">Cars Details</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            @if (session('soldout'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('soldout') }}
            </div>
            @endif

            @if (session('buySuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('buySuccess') }}
            </div>
            @endif
            @if (session('offerSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('offerSuccess') }}
            </div>
            @endif
            <div class="card">
                <div class=" p-4">
                    <div class="card-header" style="">
                        <h4 style="font-size: 18px" class="fw-semibold">
                            @if (isset($buyprice))
                            @if ($buyprice->car_id == $carDetail->id)
                            <a class="btn btn-primary btn-default text-white btn-outline-accent-5 btn-md mr-1" style="background-color:#007BFF">
                                Buying Price
                            </a>
                            @endif
                            @else
                            <a href="{{ url('Buying_Price', $carDetail->id) }}" class="btn btn-primary btn-default text-white btn-outline-accent-5 btn-md mr-1" style="background-color:#007BFF" data-toggle="modal" data-target="#modal-default">
                                Buying Price
                            </a>

                            @endif

                            <a href="{{ url('car_expense', $carDetail->id) }}" class="btn btn-primary btn-default  text-white btn-outline-accent-5 btn-md mr-1" style="background-color:#007BFF">
                                Car Expenses</a>



                            @if (@isset($carstatus))

                            @if ($carDetail->id == $carstatus->car_id)
                            <button type="button" class="btn btn-default text-white mutted" style="background-color: #dc3545">Sold Out </button>
                            @endif
                            @else
                            <a href="{{ url('Buying_Price', $carDetail->id) }}" class="btn btn-default text-white" data-toggle="modal" data-target="#modal-lg" style="background-color:#dc3545">
                                Sold Out
                            </a>
                            @endif

                        </h4>
                    </div>


                    <div class="modal fade container-fluid" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Sold Out</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('BuyingCar', ['id' => $carDetail->id]) }}" method="POST" enctype="multipart/form-data" id="salesForm">
                                        @csrf

                                        <div class="modal-body">
                                            <div class="form-group col-12 " style="display: none">
                                                <label for="car_id">Car Type</label>
                                                <input required type="text" name="car_id" class="form-control" id="car_id" value="{{ $carDetail->id }}" placeholder="Enter Buying Price">


                                            </div>
                                            <input type="hidden" name="car_number" value="{{$carDetail->car_number}}">
                                            <div class="modal-body">
                                                <div class="form-group col-12">
                                                    <label for="price">Buyer Name <span style="color: red;">&nbsp;*</span></label>
                                                    <input required type="text" class="form-control" id="buyer_name" name="buyer_name" placeholder="Enter Buyer Name">
                                                    @error('buyer_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="price">Selling Price<span style="color: red;">&nbsp;*</span></label>
                                                    <input required type="number" class="form-control" id="selling" name="selling" placeholder="Enter Selling Price">
                                                    @error('selling')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="price">Payment<span style="color: red;">&nbsp;*</span></label>
                                                    <input required type="number" class="form-control" id="payment" name="payment" placeholder="Enter Payment">
                                                    @error('payment')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-12">
                                                    <label for="price">Balance</label>
                                                    <script>
                                                        document.getElementById('selling').addEventListener('input', updateBalance);
                                                        document.getElementById('payment').addEventListener('input', updateBalance);

                                                        function updateBalance() {
                                                            // Get the values from the selling and payment input fields
                                                            var sellingPrice = parseFloat(document.getElementById('selling').value) || 0;
                                                            var payment = parseFloat(document.getElementById('payment').value) || 0;

                                                            // Calculate the balance
                                                            var balance = (sellingPrice ? sellingPrice : 0) - (payment ? payment : 0);

                                                            // Update the balance input field
                                                            document.getElementById('balance').value = balance;
                                                        }


                                                        window.addEventListener('load', updateBalance);
                                                    </script>
                                                    <input type="number" class="form-control" id="balance" name="balance">
                                                    @error('balance')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="price">Buyer Phone Number<span style="color: red;">&nbsp;*</span></label>
                                                    <input required type="text" class="form-control" id="buyer_ph" name="buyer_ph" placeholder="Enter Buyer Phone Number">
                                                    @error('buyer_ph')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                                <div class="form-group col-12">
                                                    <label for="price">Document<span style="color: red;">&nbsp;*</span></label>
                                                    <input required type="file" class="form-control" id="document" name="document">
                                                    @error('document')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>


                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Buying Price</h4>

                            </div>
                            <form action="{{ route('Buying_Price', ['id' => $carDetail->id]) }}" method="POST">
                                @csrf
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                <div class="modal-body">
                                    <div class="form-group col-12">
                                        <label for="price">Buying Price</label>
                                        <input type="number" class="form-control" id="price" name="price">
                                    </div>
                                </div>
                                <div class="modal-body" style="display: none">
                                    <div class="form-group col-12">
                                        <label for="car_id">Car Type</label>
                                        <input type="text" name="car_id" class="form-control" id="car_id" value="{{ $carDetail->id }}" placeholder="Enter Buying Price">
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
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card-body" style="">
                            <table class='table table-bordered mt-4' style="font-size: 20">



                                <tr>
                                    <td class="fw-light" style="width:300px">Car Status
                                    </td>
                                    <td>
                                        @if (isset($carstatus) && $carDetail->id == $carstatus->car_id)
                                        <button type="button" class="btn btn-default text-white mutted" style="background-color: #dc3545">
                                            Sold Out
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-default text-white" style="background-color:#047c40">
                                            Available
                                        </button>
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <td class="fw-light" style="width:300px">Car Type
                                    </td>
                                    <td class="fw-normal">{{ $carDetail->car_type }}</td>

                                </tr>
                                <tr>
                                    <td class="fw-light" style="width:300px">Car Grade</td>
                                    <td class="fw-normal">{{ $carDetail->car_model }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-light" style="width:300px">Car Manufacture Years</td>
                                    <td class="fw-normal">{{ $carDetail->manufacture_year }}</td>
                                </tr>
                                <tr>

                                    <td class="fw-light" style="width:300px">License Expire</td>
                                    <td class="fw-normal">{{ $carDetail->License_expire }}</td>
                                </tr>

                                <tr>

                                    <td class="fw-light" style="width:300px"> Car Color</td>
                                    <td class="fw-normal">{{ $carDetail->car_color }}</td>
                                </tr>

                                <tr>

                                    <td class="fw-light" style="width:300px">Car Image</td>
                                    <td>
                                        <img src="{{ asset('carimage/' . $carDetail->car_images) }}" onclick="window.open(this.src,'_blank')" width="65px">

                                    </td>
                                </tr>

                                <tr>
                                    <td class="fw-light" style="width:300px"> Description</td>
                                    <td class="fw-normal">{{ $carDetail->description }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-md-12">
                    <div class="card p-4">
                        <div class="card-header " style="">
                            <h1 style="font-size: 18px" class="fw-semibold">Finance</h1>
                        </div>
                        <table class='table table-bordered mt-4' style="font-size: 20">



                            <tr>
                                <td class="fw-light " style="width: 300px">Buying Price</td>

                                <td class="fw-normal">

                                    @if ($buyprice)
                                    @if ($buyprice->car_id == $carDetail->id)
                                    {{-- {{ $buyprice->price }} --}}
                                    {{ number_format(intval($buyprice->price), 0, '', ',') }}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                @else
                                N/A
                                @endif


                            </tr>

                            <tr>
                                <td class="fw-light" style="width:300px">Total Expense</td>
                                <td class="fw-normal">
                                    @php
                                    $total_expense = 0;
                                    @endphp

                                    @foreach ($carexpenses as $carexpense)
                                    @if ($carexpense->car_id == $carDetail->id)
                                    @php
                                    $total_expense += $carexpense->expense_price;
                                    @endphp
                                    @endif
                                    @endforeach



                                    {{-- {{ $total_expense }} --}}
                                    {{ number_format(intval($total_expense), 0, '', ',') }}


                                </td>

                            </tr>
                            <tr>
                                <td class="fw-light" style="width:300px">Total Cost</td>
                                <td class="fw-normal ">

                                    {{-- {{ ($buyprice->price ?? 0) + $total_expense }} --}}
                                    {{ number_format(intval(($buyprice->price ?? 0) + $total_expense), 0, '', ',') }}

                                </td>

                            </tr>
                        </table>
                    </div>
                </div>
            </div>

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
