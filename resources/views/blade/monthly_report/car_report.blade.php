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


            <!-- Main content -->
            <section class="content">

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
                                    <th>S</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                                    $no = '1';
                                @endphp
                                @foreach ($car as $cars)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>


                                            <img src="{{ asset('carimage/' . $cars->car_images) }}"
                                                onclick="window.open(this.src,'_blank')" width="65px">

                                        </td>
                                        <td>
                                            <a href="{{ url('Car_Detail', $cars->id) }}" class="btn btn-warning"><i
                                                    class="fa-regular fa-eye"></i></a>
                                            <a href="{{ url('cars_show', $cars->id) }}" class="btn btn-success"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>

                                            <a href="{{ url('cars_delete', $cars->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this car ?')"><i
                                                    class="fa-solid fa-trash"></i></a>

                                        </td>
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>

                </div>

            </section>

        </div>



    </div>


    @include('master.footer')
