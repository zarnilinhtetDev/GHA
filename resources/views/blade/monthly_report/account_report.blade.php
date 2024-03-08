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
                        <h3 class="card-title">Account Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Account Name</th>
                                    <th>IN</th>
                                    <th>OUT </th>
                                    <th>Balance</th>


                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = '1';
                                @endphp

                                @foreach ($accounts as $account)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td><a
                                                href="{{ url('account_transaction', $account->id) }}">{{ $account->account_name }}</a>
                                        </td>
                                        <td>

                                            @if (isset($sumByin[$account->id]))
                                                {{ $sumByin[$account->id] }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($sumByout[$account->id]))
                                                {{ $sumByout[$account->id] }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td>
                                            {{ $balance[$account->id] ?? 0 }}
                                        </td>
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach






                            </tbody>
                        </table>
                    </div>

                </div>

            </section>

        </div>



    </div>


    @include('master.footer')
