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


            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Transaction Payment Edit</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>

                                <li class="breadcrumb-item active">Transaction Payment Edit</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            @if (session('updateStatus'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('updateStatus') }}
                </div>
            @endif
            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-3 my-3 p-3">
                            <div class="card card-primary p-4">

                                <!-- /.card-header -->
                                <!-- form start -->

                                <form action="{{ url('payment_update', $show->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" value="" name="transaction_id">
                                    <input type="hidden" value="" name="account_id">

                                    <div class="form-group">
                                        <label for="status">Status <span style="color: red;">*</span></label>
                                        <select name="status" class="form-control" id="status" required>
                                            <option value="{{ strtoupper($show->status) }}">
                                                {{ strtoupper($show->status) }}</option>
                                            <option value="in">IN</option>
                                            <option value="out">OUT</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="transaction_code">Amount <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="transaction_code" name="amount"
                                            placeholder="Enter Transaction Code" required value="{{ $show->amount }}">
                                        @error('transaction_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter ...">{{ $show->description }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="modal-footer justify-content-end">

                                        <button type="submit" class="btn btn-primary"
                                            style="background-color: #007BFF">Update</button>
                                    </div>
                                </form>
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
