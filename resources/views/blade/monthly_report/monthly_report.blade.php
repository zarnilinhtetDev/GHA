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
                                            <h1>Monthly Report</h1>
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a
                                                        href="{{ url('/dashboard') }}">Dashboard</a></li>
                                                <li class="breadcrumb-item active">Monthly Report</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </section>






                            <div class="card">
                                <div class="container-fluid mt-3 ">
                                    <div class="row ml-2 mr-2">
                                        <div class="col-md-4">

                                            <table class='table table-bordered mt-4'>
                                                <tr style="background-color:#F4F6F9">
                                                    <td style="width:100% " class="text-center btn"> <span
                                                            class="text-dark"><a href="{{ url('car_report') }}"> Total
                                                                Buy
                                                                Car</a></span></td>
                                                    {{-- <td>
                                                        <span
                                                            class="text-dark ">{{ isset($total_car) ? $total_car : 0 }}</span>
                                                    </td> --}}

                                                </tr>
                                            </table>

                                            {{-- <p class="card-text">Total Buy Car - {{ $total_car }}
                                                    </p> --}}
                                        </div>



                                        <div class="col-md-4">
                                            <table class='table table-bordered mt-4'>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span class="text-dark">Total
                                                            Sold Out Car </span></td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_sold_out_car) ? $total_sold_out_car : 0 }}
                                                    </td>

                                                </tr>
                                            </table>



                                        </div>

                                        <div class="col-md-4">

                                            <table class='table table-bordered mt-4'>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span class="text-dark">Total
                                                            Car Expense Price
                                                        </span> </td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_expense) ? $total_expense : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <div class="card">
                                                <div class="card-body">

                                                    <p class="card-text">Total Car Expense Price -
                                                        {{ isset($total_expense) ? $total_expense : 0 }}
                                                    </p>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid mt-3 ">
                                    <div class="row ml-2 mr-2">
                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered '>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span class="text-dark">Total
                                                            Buy Price</span> </td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_buy_price) ? $total_buy_price : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <p class="card-text">Total Buy Price
                                                        -{{ isset($total_buy_price) ? $total_buy_price : 0 }}
                                                    </p> --}}


                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered '>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span class="text-dark">Total
                                                            Sold Out Price </span></td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_sell_price) ? $total_sell_price : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <div class="card">
                                                <div class="card-body">

                                                    <p class="card-text">Total Sold Out Price
                                                        -{{ isset($total_sell_price) ? $total_sell_price : 0 }}
                                                    </p>
                                                </div>
                                            </div> --}}
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered ' style="font-size: 20">
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70% "><span
                                                            class="text-dark">Total
                                                            Car Profit</span> </td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_profit) ? $total_profit : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <div class="card">
                                                <div class="card-body">

                                                    <p class="card-text">Profit
                                                        - {{ isset($total_profit) ? $total_profit : 0 }}
                                                    </p>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid mt-3 ">
                                    <div class="row ml-2 mr-2">
                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered '>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span class="text-dark">Total
                                                            Company Icome</span> </td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_company_income) ? $total_company_income : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <p class="card-text">Total Buy Price
                                                        -{{ isset($total_buy_price) ? $total_buy_price : 0 }}
                                                    </p> --}}


                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered '>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span class="text-dark">Total
                                                            Company Expenses </span></td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_company_expense) ? $total_company_expense : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <div class="card">
                                                <div class="card-body">

                                                    <p class="card-text">Total Sold Out Price
                                                        -{{ isset($total_sell_price) ? $total_sell_price : 0 }}
                                                    </p>
                                                </div>
                                            </div> --}}
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered ' style="font-size: 20">
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70% "><span
                                                            class="text-dark">Total
                                                            Company Profit</span> </td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_company_profit) ? $total_company_profit : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <div class="card">
                                                <div class="card-body">

                                                    <p class="card-text">Profit
                                                        - {{ isset($total_profit) ? $total_profit : 0 }}
                                                    </p>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid mt-3 mb-3">
                                    <div class="row ml-2 mr-2">
                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered '>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span
                                                            class="text-dark">Total ရရန်</span> </td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_out) ? $total_out : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <p class="card-text">Total Buy Price
                                                        -{{ isset($total_buy_price) ? $total_buy_price : 0 }}
                                                    </p> --}}


                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <table class='table table-bordered '>
                                                <tr style="background-color:#F4F6F9">
                                                    <td class="fw-light" style="width:70%"><span
                                                            class="text-dark">Total ပေးရန် </span></td>
                                                    <td class="fw-normal" style="color: black;">
                                                        {{ isset($total_in) ? $total_in : 0 }}
                                                    </td>

                                                </tr>
                                            </table>
                                            {{-- <div class="card">
                                                <div class="card-body">

                                                    <p class="card-text">Total Sold Out Price
                                                        -{{ isset($total_sell_price) ? $total_sell_price : 0 }}
                                                    </p>
                                                </div>
                                            </div> --}}
                                        </div>


                                    </div>
                                </div>
                            </div>
                            {{-- </div> --}}
                            <!-- /.card-body -->

                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
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
