  <div class="container-fluid">
      <div class="row">
          <div class="col-12">


              <!-- Content Header (Page header) -->
              <section class="content-header">
                  <div class="container-fluid">
                      <div class="row mb-2">
                          <div class="col-sm-6">
                              <h1>Cars</h1>
                          </div>
                          <div class="col-sm-6">
                              <ol class="breadcrumb float-sm-right">
                                  <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                  <li class="breadcrumb-item active">Cars</li>
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
              <div class="container-fluid mb-4">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="d-flex justify-content-end"> <!-- Added d-flex and justify-content-end classes -->
                              <button type="button" class="btn btn-default text-white" data-toggle="modal"
                                  data-target="#modal-xl" style="background-color: #007BFF">
                                  Cars Register
                              </button>
                          </div>
                      </div>
                  </div>
              </div>



              {{-- Modal Content --}}
              <div class="modal fade" id="modal-xl">
                  <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">Cars Register</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form action="{{ url('/cars_register') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <div class="row">
                                      <div class="form-group col-4">
                                          <label for="car_name">Car Type<span style="color: red;">&nbsp;*</span></label>
                                          <input type="text" class="form-control" id="car_type" name="car_type"
                                              placeholder="Enter Car Type" value="{{ old('car_type') }}" required>
                                          @error('car_type')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                      <div class="form-group col-4">
                                          <label for="car_brand">Car Grade<span
                                                  style="color: red;">&nbsp;*</span></label>
                                          <input type="text" class="form-control" id="car_model" name="car_model"
                                              placeholder="Enter Car Model" value="{{ old('car_model') }}" required>
                                          @error('car_model')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                      <div class="form-group col-4">
                                          <label for="car_fuel_type">Car Number<span
                                                  style="color: red;">&nbsp;*</span></label>
                                          <input type="text" class="form-control" id="car_number" name="car_number"
                                              placeholder="Enter Car Number" value="{{ old('car_number') }}">
                                          @error('car_number')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="form-group col-md-4">
                                          <label for="manufacture_year">Car Manufacture Year<span
                                                  style="color: red;">&nbsp;*</span></label>
                                          <input type="text" class="form-control" id="manufacture_year"
                                              name="manufacture_year" placeholder="Enter Car Manufacture Year"
                                              value="{{ old('manufacture_year') }}" required>
                                          @error('manufacture_year')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>

                                      <div class="form-group col-md-4">
                                          <label for="License_expire">License Expire<span
                                                  style="color: red;">&nbsp;*</span></label>
                                          <input type="text" class="form-control" id="License_expire"
                                              name="License_expire" placeholder="Enter Car License Expire"
                                              value="{{ old('License_expire') }}" required>
                                          @error('License_expire')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>

                                      <div class="form-group col-md-4">
                                          <label for="car_color">Car Color<span
                                                  style="color: red;">&nbsp;*</span></label>
                                          <input type="text" class="form-control" id="car_color" name="car_color"
                                              placeholder="Enter Car Color" value="{{ old('car_color') }}" required>
                                          @error('car_color')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="form-group col-md-12">
                                          <label for="car_images">Car Images<span
                                                  style="color: red;">&nbsp;*</span></label>
                                          <div class="border p-1" style="border:#d0d0db 1px solid">
                                              <input type="file" class="form-control-file" id="car_images"
                                                  name="car_images" value="{{ old('car_images') }}" required>
                                          </div>
                                          @error('car_images')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>

                                  </div>
                                  <!-- textarea -->
                                  <div class="form-group">
                                      <label>Description</label>
                                      <textarea class="form-control" rows="3" placeholder="Enter ..." class="border p-1"
                                          style="border:#d0d0db 1px solid" name="description"></textarea>
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
                                  <th>Manufacture Year</th>
                                  <th>License Expire</th>
                                  <th>Car Color</th>
                                  <th>Car Image</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @php
                                  $no = '1';
                              @endphp
                              @foreach ($car as $cars)
                                  <tr>
                                      <td>{{ $no }}</td>
                                      <td>{{ $cars->car_type }}</td>
                                      <td>{{ $cars->car_model }}</td>
                                      <td>{{ $cars->car_number }}</td>
                                      <td>{{ $cars->manufacture_year }}</td>
                                      <td>{{ $cars->License_expire }}</td>
                                      <td>{{ $cars->car_color }}</td>
                                      <td>

                                          {{-- <a target="_blank" href="/carimage/{{ $cars->car_images }}">
                                              <img src="{{ asset('carimage/' . $cars->car_images) }}" alt=""
                                                  width="65px">
                                          </a> --}}
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
                              @endforeach
                          </tbody>
                      </table>
                  </div>

              </div>
          </div>
      </div>

  </div>
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
