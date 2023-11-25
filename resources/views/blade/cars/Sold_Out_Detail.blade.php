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

            <div class="content">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-sm-6"`>
                                <h1>Sold Out Detail</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active"><a href="{{ url('/sold_out_car') }}">Sold Out
                                            Cars</a>
                                    </li>
                                    <li class="breadcrumb-item active">Sold Out Cars Details
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                @if (session('successful'))
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
                <section class="content-body">
                    <div class="card">

                        <div class="card-header text-secondary">
                            <h4>Information</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class='table table-bordered mt-4' style="font-size: 20">

                                    <tr>
                                        <td class="fw-light" style="width:300px">Buyer Name
                                        </td>
                                        <td class="fw-normal">{{ $buyer->buyer_name ?? 'none' }}</td>

                                    </tr>

                                    <tr>
                                        <td class="fw-light" style="width:300px">Car Type</td>
                                        <td class="fw-normal">{{ $cardata->car_type ?? 'none' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Car Model</td>
                                        <td class="fw-normal">{{ $cardata->car_model ?? 'none' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Car Number</td>
                                        <td class="fw-normal">{{ $cardata->car_number ?? 'none' }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-light" style="width: 300px">Car Image</td>
                                        <td>


                                            <img src="{{ asset('carimage/' . ($cardata->car_images ?? 'null')) }}"
                                                onclick="window.open(this.src,'_blank')" width="65px">


                                        </td>
                                    </tr>



                                </table>
                            </div>
                        </div>
                    </div>





                    <div class="card ">
                        <div class="card-header text-secondary">



                            <a href="{{ route('payment.detail', ['id' => $buyer->car_id]) }}"
                                class="btn btn-default text-white" style="background-color: #C82333">
                                Add Payment
                            </a>



                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class='table table-bordered mt-4' style="font-size: 20">
                                    <tr>
                                        <td class="fw-light" style="width: 300px; background-color: #A1D39E;">Profit
                                        </td>
                                        <td class="fw-normal" style="background-color: #A1D39E">
                                            {{ number_format(intval(($buyer->selling ?? 0) - (($buy ? $buy->price : 0) + $totalExpense)), 0, '', ',') ?? 'none' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Buy Price
                                        </td>
                                        <td class="fw-normal">

                                            {{ number_format(intval($buy ? $buy->price : 0), 0, '', ',') ?? 'none' }}

                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Sell Price</td>
                                        <td class="fw-normal">

                                            {{ number_format(intval($buyer->selling), 0, '', ',') ?? 'none' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Payment</td>
                                        <td class="fw-normal">


                                            {{ number_format(intval($buyer->payment + (!empty($totalAmount) && isset($totalAmount[0]['total_amount']) ? $totalAmount[0]['total_amount'] : 0)), 0, '', ',') ?? 'none' }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Balance</td>
                                        <td class="fw-normal">
                                            {{-- {{ $buyer->balance }} --}}
                                            @php
                                                $buyerBalance = $buyer->balance ?? 'none';
                                                $totalAmount = $totalAmount[0]['total_amount'] ?? 0;

                                                if ($buyerBalance !== 'none') {
                                                    //  && $totalAmount == 'none')
                                                    $result = $buyerBalance - $totalAmount;
                                                    echo number_format(intval($result), 0, '', ',');
                                                } else {
                                                    // echo "Invalid input: One or both values are 'none'.";
                                                    echo number_format(intval(0), 0, '', ',');
                                                }

                                            @endphp

                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Document</td>
                                        <td class="fw-normal">
                                            <a target="_blank"
                                                href="{{ asset('carimage/' . ($cardata->car_images ?? 'null')) }}">
                                                <img src="{{ asset('carimage/' . ($cardata->car_images ?? 'null')) }}"
                                                    alt="" width="65px">
                                            </a>
                                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{ asset('documentUpload/' . ($buyer->document ?? 'null')) }}"
                                                class="btn btn-primary" download>
                                                Download
                                            </a>
                                        </td>
                                    </tr>



                                </table>
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
    </div>


    </section>


    </div>



    </div>


    @include('master.footer')
