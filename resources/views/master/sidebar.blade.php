  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <span class="brand-link text-center ">
          <span class="brand-text font-weight-light">Dashboard</span>
      </span>


      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('/dashboard') }}" class="nav-link">
                          <i class="fa-solid fa-car-side"></i>
                          <p class="pl-3">
                              Cars

                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('/sold_out_car') }}" class="nav-link">
                          <i class="fa-solid fa-list"></i>
                          <p class="pl-3">
                              Cars Sold Out

                          </p>
                      </a>

                  </li>


                  <li class="nav-item">
                      <a href="{{ url('expense') }}" class="nav-link">
                          <i class="fa-solid fa-building-circle-arrow-right"></i>
                          <p class="pl-3">
                              Company Expenses
                          </p>
                      </a>
                  </li>

                 <li class="nav-item">
                      <a href="{{ url('account') }}" class="nav-link">
                          <i class="fa-solid fa-credit-card"></i>
                          <p class="pl-3">
                              Accounts
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('transaction') }}" class="nav-link">
                          <i class="fa-solid fa-address-card"></i>
                          <p class="pl-3">
                              Transactions
                          </p>
                      </a>
                  </li>
                  @if (auth()->user()->is_admin)
                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('/user') }}" class="nav-link">
                          <div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus"></i>
                              <p class="pl-3">Users</p>

                          </div>

                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('/monthly_report') }}" class="nav-link">
                          <div class="sb-nav-link-icon"><i class="fa fa-calendar"></i>
                              <p class="pl-3">Monthly Report</p>
                          </div>

                      </a>
                  </li>
                  @endif
                  <li class="nav-item">
                      <a href="{{ url('setting') }}" class="nav-link">
                          <i class="fa-solid fa-gear"></i>
                          <p class="pl-3">
                              Setting
                          </p>
                      </a>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
