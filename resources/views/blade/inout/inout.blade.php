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
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="btn btn-danger text-white">Logout</a>
                </li>
                </li>
            </ul>
        </nav>
        @include('master.sidebar')
        <div class="content-wrapper">


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">


                            <!-- Content Header (Page header) -->
                            <section class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h1>ပေးရန် ရရန် စာရင်းများ</h1>
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a
                                                        href="{{ url('/dashboard') }}">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="{{ url('/expense') }}">Company
                                                        Expenses</a>
                                                </li>
                                                <li class="breadcrumb-item active">ပေးရန် - ရရန် စာရင်းများ</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </section>

                            <div class="container-fluid mb-4 mr-auto">
                                <div class="row">
                                    <div class="col-md-4 text-end">
                                        <button type="button" class="btn btn-default text-white" data-toggle="modal"
                                            data-target="#modal-lg" style="background-color: #007BFF">
                                            ရရန်
                                        </button>
                                        <button type="button" class="btn btn-default text-white" data-toggle="modal"
                                            data-target="#modal-aa" style="background-color: #007BFF">
                                            ပေးရန်
                                        </button>
                                    </div>



                                </div>
                            </div>

                            {{-- Modal Content --}}
                            <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">ရရန်</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/ya_yan') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="transaction_id">Transaction Name<span
                                                            style="color: red;">&nbsp;*</span></label>
                                                    <select name="transaction_id" class="form-control"
                                                        id="transaction_id" required>
                                                        <option value="">Select Transaction
                                                            @foreach ($transaction as $transactions)
                                                        <option value="{{ $transactions->id }}">
                                                            {{ $transactions->transaction_name }}
                                                        </option>
                                                        @endforeach
                                                        </option>
                                                    </select>
                                                    @error('transaction_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="date">Date</label>
                                                    <input type="date" class="form-control" id="date"
                                                        name="date" placeholder="Enter Date"
                                                        value="{{ old('date') }}" required>
                                                    @error('date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="price">Price<span
                                                            style="color: red;">&nbsp;*</span></label>
                                                    <input type="text" class="form-control" id="price"
                                                        name="price" placeholder="Enter Price"
                                                        value="{{ old('price') }}" required>
                                                    @error('price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input type="text" class="form-control" id="description"
                                                        name="description" placeholder="Enter Description"
                                                        value="{{ old('description') }}" re>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>



                                                <!-- /.card-body -->
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        style="background-color: #007BFF">Register</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            {{-- Modal Content --}}
                            <div class="modal fade" id="modal-aa">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">ပေးရန်</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/outRegister') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="transaction_id">Transaction Name<span
                                                            style="color: red;">&nbsp;*</span></label>
                                                    <select name="transaction_id" class="form-control"
                                                        id="transaction_id" required>
                                                        <option value="">Select Transaction
                                                            @foreach ($transaction as $transactions)
                                                        <option value="{{ $transactions->id }}">
                                                            {{ $transactions->transaction_name }}
                                                        </option>
                                                        @endforeach
                                                        </option>
                                                    </select>
                                                    @error('transaction_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="out_date">Date<span
                                                            style="color: red;">&nbsp;*</span></label>
                                                    <input type="date" class="form-control" id="out_date"
                                                        name="out_date" placeholder="Enter Date"
                                                        value="{{ old('out_date') }}" required>
                                                    @error('out_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="out_price">Price<span
                                                            style="color: red;">&nbsp;*</span></label>
                                                    <input type="text" class="form-control" id="out_price"
                                                        name="out_price" placeholder="Enter Price"
                                                        value="{{ old('out_price') }}" required>
                                                    @error('out_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="out_description">Description</label>
                                                    <input type="text" class="form-control" id="out_description"
                                                        name="out_description" placeholder="Enter Description"
                                                        value="{{ old('out_description') }}">
                                                    @error('out_description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>



                                                <!-- /.card-body -->
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        style="background-color: #007BFF">Register</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>


                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('deleteStatus'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('deleteStatus') }}
                                </div>
                            @endif
                            @if (session('updateStatus'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('updateStatus') }}
                                </div>
                            @endif
                            <section class="content-body">
                                <div class="card">
                                    <div class="card-header" style="background-color: #96C5F8">
                                        <h3 class="card-title">ရရန်</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Transaction Name</th>
                                                    <th>Date</th>
                                                    <th>Price</th>
                                                    <th>Descripton</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = '1';
                                                @endphp
                                                @foreach ($inouts as $inout)
                                                    @if ($inout->date != null)
                                                        <tr>
                                                            <td>{{ $inout->transaction->transaction_name }}</td>
                                                            <td>{{ $inout->date }}</td>
                                                            <td>{{ $inout->price }}</td>
                                                            <td>{{ $inout->description }}</td>

                                                            <td>
                                                                <a href="{{ url('inout_edit', $inout->id) }}"
                                                                    class="btn btn-success"><i
                                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                                <a href="{{ url('inout_delete', $inout->id) }}"
                                                                    class="btn btn-danger"
                                                                    onclick="return confirm('Are you sure you want to delete?')"><i
                                                                        class="fa-solid fa-trash"></i>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $no++;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            </tbody>




                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card">
                                    <div class="card-header" style="background-color: #96C5F8">
                                        <h3 class="card-title">ပေးရန်</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Transaction Name</th>

                                                    <th>Date</th>
                                                    <th>Price</th>
                                                    <th>Descripton</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = '1';
                                                @endphp
                                                @foreach ($inouts as $inout)
                                                    @if ($inout->out_date != null)
                                                        <tr>
                                                            <td>{{ $inout->transaction->transaction_name }}</td>
                                                            <td>{{ $inout->out_date }}</td>
                                                            <td>{{ $inout->out_price }}</td>
                                                            <td>{{ $inout->out_description }}</td>

                                                            <td>
                                                                <a href="{{ url('out_edit', $inout->id) }}"
                                                                    class="btn btn-success"><i
                                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                                <a href="{{ url('inout_delete', $inout->id) }}"
                                                                    class="btn btn-danger"
                                                                    onclick="return confirm('Are you sure you want to delete?')"><i
                                                                        class="fa-solid fa-trash"></i>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $no++;
                                                        @endphp
                                                    @endif
                                                @endforeach

                                            </tbody>




                                        </table>
                                    </div>
                                    <!-- /.card-body -->
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>






        @include('master.footer')
