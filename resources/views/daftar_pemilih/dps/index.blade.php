@extends('layout.home')
@section('title', 'User Settings')
@section('content')
    <!-- Start div layoutSidenav_content-->
    <div id="layoutSidenav_content">
        <!-- Start main content -->
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Daftar Pemilih Sementara</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        List DPS
                    </div>
                    <div class="card-body">
                        <!-- Button trigger modal  -->
                        <div class="row">
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary btn-md btn-block" onclick="addDps()">
                                    <i class="fas fa-user-plus"></i> Add
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-info btn-md btn-block" onclick="importFile()">
                                    <i class="fas fa-file-import"></i> Import
                                </button>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control" id="search" placeholder="Search nama" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered text-center" id="tableDps" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NKK</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="rowData">
        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </main>
        <!-- end main content -->
        @include("daftar_pemilih.dps.modal.add_dps")
        @include("daftar_pemilih.dps.modal.import_file")

@endsection
@section('pagespecificscripts')
    <script type="text/javascript" src="{{ asset('js/daftar_pemilih/dps/index.js') }}" defer></script>
@stop
