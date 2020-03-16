@extends('layout.template')


@section('content')
    <!-- main content -->
    <div class="container-fluid ">
        <div class="row">

            <!-- Jenis -->
            <div class="col-xl-12 " >
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0 font-weight-bold text-primary">List Jenis Baju</h5>
                  <div style="float: right;">   
                    <span>
                        <a href="{{ url('/jenis/export_excel') }}" class="btn btn-success my-3" target="_blank"><i class="fas fa-arrow-circle-down"></i> &nbsp;DOWNLOAD</a>
                        <a class="btn btn-primary" name="btn-insert" href="{{ url('createJen') }}"> <i class="fas fa-plus-circle"></i> &nbsp; ADD DATA</a>
                    </span>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body col-xl-4">
                    <form class="p-4 mb-4" method="get" action="{{ url('jenis') }}">
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
                                <th width="50px" style="height: 40px">#</th>
                                <th width="200px">Nama</th>
                                <th width="150px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $noJen = 0; ?>
                            @foreach($filltable as $jen => $jeni)
                            <?php $noJen++; ?>
                            <tr>
                                <td>{{ $noJenis ?? '' }}</td>
                                <td>{{ $jeni->nama_jenis }}</td>
                                <td>
                                    <a class="btn btn-info" name="btn-update" href="{{ url('/updateJen', $jeni->id_jenis) }}"> <i class="fas fa-pen"></i></a>
                                    <a class="btn btn-danger" name="btn-delete" href="{{ url('/deleteJen', $jeni->id_jenis) }}" onclick="return confirm('Yakin ingin menghapus data jenis baju {{ $jeni->nama_jenis}}?')"> <i class="fas fa-trash"></i></a></td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>{{ $filltable->links() }}


                    

                    @else
                    <h2>Tidak ada data jenis</h2>

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

