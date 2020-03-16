@extends('layout.template')


@section('content')
    <!-- main content -->
    <div class="container-fluid ">
        <div class="row">

            <div class="col-xl-12 " >
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Insert Tabel User</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            Upload Validation Error
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="p-4 mb-4" method="post" action="{{ url('/storeUser') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control form-control-user" placeholder="Nama" name="nama" required>
                         </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control form-control-user" placeholder="Username" name="username" required>
                         </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control form-control-user" placeholder="Password" name="password" required>
                        </div><br>
                        <button type="submit" id="button1" class="btn btn-primary"><i class="fas fa-plus-circle"></i> INSERT</button>
                        <a href="{{ url('user') }}" class="btn btn-danger"><i class="fas fa-times-circle"></i> CANCEL </a>
                        </div>

                    </form>
                    
                </div>
              </div>
            </div>

           
            <div class="col-md-6" id="cardSection">

            </div>
        </div>
    </div>
    <!-- end main content -->
@stop

