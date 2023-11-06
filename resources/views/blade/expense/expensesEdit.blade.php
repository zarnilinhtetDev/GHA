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
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">Home</a>
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
                            <h1>Company Expense</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Company Expense Update</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            {{-- <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>DataTables</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section> --}}

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-3 my-3">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Company Expense Update</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ url('/expense_update', $expenseData->id) }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="category">Category Name</label>
                                            <select name="category" class="form-control" id="category">
                                                <option value="">Select Category
                                                    @foreach ($expenseCategory as $category)
                                                        @if ($expenseData->category == $category->category_name)
                                                <option value="{{ $category->category_name }}" selected>
                                                    {{ $category->category_name }}
                                                </option>
                                            @else
                                                <option value="{{ $category->category_name }}">
                                                    {{ $category->category_name }}
                                                </option>
                                                @endif
                                                @endforeach
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="expense_date">Date</label>
                                            <input class="form-control" type="date" name="expense_date"
                                                id="expense_date" value="{{ $expenseData->expense_date }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="expense_price">Price</label>
                                            <input type="text" class="form-control" id="expense_price"
                                                name="expense_price" value="{{ $expenseData->expense_price }}">
                                        </div>


                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border-color:#6B7280"
                                                name="expense_description">{{ $expenseData->expense_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary"
                                            style="background-color: #007BFF">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </div>

    </div>



    </div>


    @include('master.footer')