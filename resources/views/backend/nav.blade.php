<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html"> Dashboard</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">

        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li><a class="dropdown-item " href="{{ url('/logout') }}">
                <span class="text-danger"> {{ Auth::user()->name }}</span> <span class="text-white">| </span></a></li>
        &nbsp

        <li><a class="dropdown-item text-white logout-link" href="{{ url('/logout') }}">Logout</a></li>

    </ul>
    </li>
    </ul>
</nav>
