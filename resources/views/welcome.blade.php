@extends('layout.template')


@section('content')
    <!-- main content -->
    <div class="container-fluid ">
        <div class="row">

            <!-- Karyawan -->
            <div class="col-xl-12 " >
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0 font-weight-bold text-primary">Tabel Baju</h5>
                  <div style="float: right;">   
                    <span>
                        <a href="{{ url('/baju/export_excel') }}" class="btn btn-success my-3" target="_blank"><i class="fas fa-arrow-circle-down"></i> &nbsp;DOWNLOAD</a>
                        <a class="btn btn-primary" name="btn-insert" href="{{ url('create') }}"> <i class="fas fa-plus-circle"></i> &nbsp; ADD DATA</a>
                    </span>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    
                    <form class="p-4 mb-4" method="get" action="{{ url('welcome') }}">
                        <table style="margin-bottom: 10px">
                            <tr>
                                <td><button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button></td>
                                <td><input type="text" class="form-control" name="search" placeholder="Search..."></td>
                            </tr>
                        </table>
                    @if (!empty($filltable))
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th width="auto" style="height: 40px">#</th>
                                <th width="auto">Nama</th>
                                <th width="auto">Harga</th>
                                <th width="auto">Jenis</th>
                                <th width="auto">Foto</th>
                                <th width="auto">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach($filltable as $table => $baju)
                            <?php $no++; ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $baju->nama }}</td>
                                <td>{{ $baju->harga }}</td>
                                <td>{{ $baju->Jenis->nama_jenis }}
                                </td>
                                <td>
                                    <img src="{{ url('uploads/'.$baju->foto) }}" style="width: 70px; height: 70px; object-fit: cover;" />
                                </td>
                                <td>
                                    <a class="btn btn-info" name="btn-update" href="{{ url('/update', $baju->id) }}"> <i class="fas fa-pen"></i></a>
                                    <a class="btn btn-danger" name="btn-delete" href="{{ url('/delete', $baju->id) }}" onclick="return confirm('Yakin ingin menghapus data baju {{ $baju->nama}}?')"> <i class="fas fa-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>{{ $filltable->links() }}


                    

                    @else
                    <h2>Tidak ada data baju</h2>

                    @endif
                    </form>



                </div>
                <!-- <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        
                    </nav>
                </div> -->
              </div>
            </div>


        </div>
    </div>
    <!-- end main content -->
@stop

