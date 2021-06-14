@extends('layout.home')
@section('title', 'Absence')
@section('content')
    <!-- Start div layoutSidenav_content-->
    <div id="layoutSidenav_content">
        <!-- Start main content -->
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"></h1>
  
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                         Absence Form
                    </div>
                    <div class="card-body">
                        <form id="frm-add" enctype="multipart/form-data" action="#">
                         <div class="form-group">
                                <label for="">Date : </label>
                                 <input type="text" name="absence_date" id="absence_date" class="form-control"  placeholder="Enter absence date" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Name : </label>
                                 <input type="text" name="name" class="form-control" id="name"  placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="">Positions : </label>
                                 <input type="text" name="position" class="form-control" id="position"  placeholder="Enter position">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Signature: </label>
                                <div id="signaturePad" ></div>
                                <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                                <textarea id="signature64" name="signed" style="display: none"></textarea>
                            </div>
                         
                            <button type="button" id="btnSave" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <!-- end main content -->
@endsection
@section('pagespecificscripts')
    <script type="text/javascript" src="{{ asset('js/absence/index.js') }}"></script>
@stop
