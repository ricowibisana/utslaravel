@extends('layout.template')


@section('content')
    <!-- main content -->
    <div class="container-fluid ">
        <div class="row">

            <div class="col-xl-12 " >
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Tabel Baju</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body col-xl-4>
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

                    <form class="p-4 mb-4" method="post" action="{{ url('/updateStore/' . $datas->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                        <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="id" id="id" placeholder="Masukan ID" value="{{ $datas->id }}" hidden="true">
                        </div>
                         <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama" value="{{ $datas->nama }}" required>
                        </div>
                         <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukan Harga" value="{{ $datas->harga }}" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis</label>
                            <select class="form-control" id="jenis" name="jenis">
                                <option value="" hidden>Select Role</option>
                                @foreach($jenis as $jen)
                                    <option value="{{ $jen->id_jenis }}" {{ ($datas->jenis == $jen->id_jenis) ? 'selected' : ''}} >{{ $jen->nama_jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Foto</label><br>
                            <img src="{{ url('uploads/'.$datas->foto) }}" alt="{{ $datas->foto }}" width="300px" class="figure-img img-fluid rounded"/>
                            <figcaption class="figure-caption">{{ $datas->foto }}</figcaption><br>
                            <input type="file" name="foto" accept=".jpg, .png, .jpeg">
                        </div><br>
                        <button type="submit" id="button1" class="btn btn-primary"><i class="fas fa-plus-circle"></i> UPDATE </button>
                        <a href="{{ url('welcome') }}" class="btn btn-danger"><i class="fas fa-times-circle"></i> CANCEL </a>
                        </div>

                    </form>
                    
                </div>
              </div>
            </div>

        </div>
    </div>
    <!-- end main content -->
@stop

