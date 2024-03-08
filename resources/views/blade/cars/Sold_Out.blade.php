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
                <li><a class="dropdown-item btn bg-danger  logout-link" href="{{ url('/logout') }}">Logout</a></li>
                </li>
            </ul>
        </nav>
        @include('master.sidebar')

        <div class="content-wrapper">
            <section class="content">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Sold Out Cars</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"> Sold Out Cars </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                </section>
           
                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sold Out Cars Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <div class="d-flex justify-content-end">
                                        <form action="{{ url('/soldout_search') }}" method="POST">
                                            @csrf
                                            <input type="text" name="search" placeholder="Search with Car Number" required class="form-control col-md-2">
                                            &nbsp;&nbsp;
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </form>
                                    </div>
                                    <tr>
                                        <th>Buyer Name</th>
                                        <th>Buyer Phone</th>
                                        <th>Car Type</th>
                                        <th>Car Grade</th>
                                        <th>Car Number </th>
                                        <th>Car Image</th>
                                        <th style="background-color:#A1D39E">Car Profit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>




                                    @if (isset($soldoutData))
                                    @foreach ($soldoutData as $buyer)
                                    @php
                                    $car = $buyer->car;
                                    $profit = $profits[$car->id];
                                    @endphp
                                    <tr>

                                        <td>{{ $buyer->buyer_name }}</td>
                                        <td>{{ $buyer->buyer_ph }}</td>
                                        <td>{{ htmlspecialchars($car->car_type) }}</td>
                                        <td>{{ htmlspecialchars($car->car_model) }}</td>
                                        <td>{{ htmlspecialchars($car->car_number) }}</td>
                                        <td>

                                            <img src="{{ asset('carimage/' . ($buyer->car->car_images ?? 'null')) }}" onclick="window.open(this.src,'_blank')" width="65px">

                                        </td>
                                        <td style="background-color: #A1D39E">

                                            {{ number_format(intval(htmlspecialchars($profit)), 0, '', ',') ?? 'none' }}


                                        <td>
                                            <a href="{{ url('Soldout_Detail', $car->id) }}" class="btn btn-warning" style="width: 100px">Details</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @elseif(isset($buyer))
                                    @foreach ($buyer as $buyers)
                                    @php
                                    $car = $buyers->car;
                                    $profit = $profits[$car->id];
                                    $payment = $total_payments[$car->id];
                                    @endphp

                                    <tr>

                                        <td>{{ $buyers->buyer_name }}</td>
                                        <td>{{ $buyers->buyer_ph }}</td>
                                        <td>{{ htmlspecialchars($car->car_type) }}</td>
                                        <td>{{ htmlspecialchars($car->car_model) }}</td>
                                        <td>{{ htmlspecialchars($car->car_number) }}</td>
                                        <td>
                                            <a target="_blank" href="{{ asset('carimage/' . $buyers->car->car_images) }}">
                                                <img src="{{ asset('carimage/' . $buyers->car->car_images) }}" alt="" width="65px">
                                            </a>
                                        </td>
                                        <td style="background-color: #A1D39E">

                                            {{ number_format(intval(htmlspecialchars($profit)), 0, '', ',') ?? 'none' }}


                                        <td>
                                            <a href="{{ url('Soldout_Detail', $car->id) }}" class="btn btn-warning" style="width: 100px">Details</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    @foreach ($buyers as $buyer)
                                    @php
                                    $car = $buyer->car;
                                    $profit = $profits[$car->id];
                                    $payment = $total_payments[$car->id];
                                    @endphp
                                    @if ($payment > 0)
                                    <tr>

                                        <td>{{ $buyer->buyer_name }}</td>
                                        <td>{{ $buyer->buyer_ph }}</td>
                                        <td>{{ htmlspecialchars($car->car_type) }}</td>
                                        <td>{{ htmlspecialchars($car->car_model) }}</td>
                                        <td>{{ htmlspecialchars($car->car_number) }}</td>
                                        <td>
                                            <a target="_blank" href="{{ asset('carimage/' . $buyer->car->car_images) }}">
                                                <img src="{{ asset('carimage/' . $buyer->car->car_images) }}" alt="" width="65px">
                                            </a>
                                        </td>
                                        <td style="background-color: #A1D39E">

                                            {{ number_format(intval(htmlspecialchars($profit)), 0, '', ',') ?? 'none' }}


                                        <td>
                                            <a href="{{ url('Soldout_Detail', $car->id) }}" class="btn btn-warning" style="width: 100px">Details</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif



                                </tbody>
                            </table>
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
    @include('master.carsoldout_footer')
