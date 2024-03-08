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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">

                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>


            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('filter.soldout') }}" method="get">
                                <div class="row">
                                    <div class="col-md-5 form-group">
                                        <label for="">Date From :</label>
                                        <input type="date" name="start_date" class="form-control" required>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label for="">Date To :</label>
                                        <input type="date" name="end_date" class="form-control" required>
                                    </div>
                                    <div class="col-md-3 mt-3 form-group">
                                        <input type="submit" class="btn btn-primary form-control" value="Search" style="background-color: #218838">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cars Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Car Type</th>
                                    <th>Car Grade</th>
                                    <th>Car Number </th>
                                    <th>Buyer Name</th>
                                    <th>Buying Price</th>
                                    <th>Selling Price</th>
                                    <th>Expense</th>
                                    <th>Profits</th>
                                    <th>Sold Out Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = '1';
                                @endphp

                                @if (isset($filterData))
                                @foreach ($filterData as $car)
                                @php
                                $profit = $profits[$car->id] ?? 0;
                                $expense=$expensesByCarId[$car->id] ??0; // Default to 0 if key is undefined
                                @endphp
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $car->car_type }}</td>
                                    <td>{{ $car->car_model }}</td>
                                    <td>{{ $car->car_number }}</td>
                                    <td>
                                        @if ($car->buyer)
                                        {{ $car->buyer->buyer_name }}
                                        @else
                                        <p class="text-danger">N/A</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($car->buys && $car->buys->count() > 0)
                                        @foreach ($car->buys as $buy)
                                        {{ $buy->price }}
                                        @endforeach
                                        @else
                                        <p class="text-danger">0</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($car->buyer)
                                        {{ $car->buyer->selling }}
                                        @else
                                        <p class="text-danger">0</p>
                                        @endif
                                    </td>
                                    <td>{{$expense}}</td>
                                    <td>
                                        {{ number_format(intval(htmlspecialchars(($car->buyer->selling ??0)- ($buy->price ?? 0) - ($expense??0) )), 0, '', ',') }}
                                    </td>
                                    <td>
                                        @if ($car->buyer)
                                        {{ $car->buyer->created_at->format('Y-m-d') }}
                                        @else
                                        {{ $car->created_at->format('Y-m-d') }}
                                        @endif
                                    </td>
                                </tr>
                                @php
                                $no++;
                                @endphp
                                @endforeach

                                @php
                                $no++;
                                @endphp
                                @else
                                @foreach ($cars as $car)
                                @php
                                $profit = $profits[$car->id] ?? 0;
                                $expense=$expensesByCarId[$car->id] ??0;// Default to 0 if key is undefined
                                @endphp
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $car->car_type }}</td>
                                    <td>{{ $car->car_model }}</td>
                                    <td>{{ $car->car_number }}</td>
                                    <td>
                                        @if ($car->buyer)
                                        {{ $car->buyer->buyer_name }}
                                        @else
                                        <p class="text-danger"></p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($car->buys->count() > 0)
                                        @foreach ($car->buys as $buy)
                                        {{ $buy->price }}
                                        @endforeach
                                        @else
                                        <p class="text-danger">0</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($car->buyer)
                                        {{ $car->buyer->selling }}
                                        @else
                                        <p class="text-danger">0</p>
                                        @endif
                                    </td>
                                    <td>{{$expense}}</td>




                                    <td>
                                        {{ number_format(intval(htmlspecialchars(($car->buyer->selling ??0)- ($buy->price ?? 0) - ($expense??0) )), 0, '', ',') }}

                                    </td>
                                    <td>
                                        @if ($car->buyer)
                                        {{ $car->buyer->created_at->format('Y-m-d') }}
                                        @else
                                        {{ $car->created_at->format('Y-m-d') }}
                                        @endif

                                    </td>
                                </tr>
                                @php
                                $no++;
                                @endphp
                                @endforeach

                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>

            </section>

        </div>



    </div>


    @include('master.footer')
