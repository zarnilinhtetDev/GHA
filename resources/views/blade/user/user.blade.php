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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">User</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}

                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}

                </div>
            @endif
            @if (session('success_import'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success_import') }}

                </div>
            @endif
            @if (session('delete_success'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('delete_success') }}

                </div>
            @endif
            <section class="content-body">
                <div class="row mt-6">
                    <div class="col-md-6 offset-3">

                        <div class="card  p-4 mb-4">
                            <form action="{{ url('/User_Register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="name" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">Email address <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="email" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputPassword1">Password <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        name="password" required>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label for="is_admin"> Admin </label> &nbsp;
                                    <input type="checkbox" name="is_admin" value="1">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3"
                                    style="background-color: #0069D9">Register</button>
                            </form>
                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>

                                    <th>Create Date</th>
                                    <th>Update Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = '1';
                                @endphp
                                @foreach ($showUser_data as $userData)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $userData->name }}</td>
                                        <td>{{ $userData->email }}</td>
                                        <td>
                                            @if ($userData->is_admin)
                                                <span class="text-primary ">Admin</span>
                                            @else
                                                <span class="text-primary ">User</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $userData->created_at->format('Y-m-d h:i A') }}
                                            ({{ $userData->created_at->diffForHumans() }})
                                        </td>
                                        <td>
                                            {{ $userData->updated_at->format('Y-m-d h:i A') }}
                                            ({{ $userData->updated_at->diffForHumans() }})
                                        </td>
                                        </td>

                                        </td>
                                        </td>

                                        <td>


                                            <a href="{{ url('userShow', $userData->id) }}" class="btn btn-success">
                                                <i class="fa-solid fa-pen-to-square"></i>

                                            </a>

                                            <a href="{{ url('delete_user', $userData->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this user ?')">
                                                <i class="fa-solid fa-trash"></i></a>


                                        </td>

                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
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

    </div>



    </div>


    @include('master.footer')
