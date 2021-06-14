<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Desa Kayuambon</title>
    <link href="{{ asset('') }}css/styles.css" rel="stylesheet" />
    <link href="{{ asset('') }}css/custom.css" rel="stylesheet" />
    <!-- TODO : Resolve this datatable css, still on CDN -->
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- TODO : Cannot save inti local project cz some image stored in cloud -->
    <link type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('') }}assets/jqueryconfirm/jquery-confirm.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/jquerysignature/jquery.signature.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="theme-color" content="white"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Base Project">
    <meta name="msapplication-TileImage" content="images/hello-icon-144.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">

    <script src="{{asset('')}}assets/fontawesome/font-awesome-5.15.1-all.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('')}}assets/jquery/jquery-1.12.4.min.js"></script> 
    <script type="text/javascript" src="{{asset('')}}assets/plugins/jquery-ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('') }}assets/jqueryconfirm/jquery-confirm.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/moment/moment.min.js"> </script>
    @yield('custom-css')
  </head>
  <body>
      <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>INFO DAFTAR PEMILH (DPS) PILKADES KAYUAMBON</h1>
            </div>
        </div>
        <br>
        <form id="frm-filter-dps">  
          @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 float-right">
              <input class="form-control" type="text" name="nik" id="nik" placeholder="Masukkan NIK penduduk" aria-label="Search" autofocus>
            </div>
            <div class="col-md-4" style="padding:0px;">
              <button class="btn btn-success" type="submit">
                <i class="fas fa-search-minus">  </i> 
                Cari
              </button>
            </div>
        </div>
        </form>
        <br>
        <div class="row">
          <div class="col">
            <table class="table table-striped table-border">
              <thead>
                <tr class="text-center">
                  <th>NKK</th>
                  <th>NIK</th>
                  <th>NAMA</th>
                  <th>TEMPAT LAHIR</th>
                  <th>TANGGAL LAHIR</th>
                  <th>KAWIN</th>
                  <th>ALAMAT</th>
                  <th>RT</th>
                  <th>RW</th>
                  <th>DIFABEL</th>
                  <th>KETERANGAN</th>
                  <th>SUMBER DATA</th>
                  <th>TPS</th>
                </tr>
              </thead>
              <tbody id="rowData">
               
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <button type="button" id="btn-reset" class="btn btn-secondary btn-sm float-right">Reset</button>
          </div>
        </div>
      </div>
     
      <script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script src="{{ asset('') }}js/scripts.js"></script>
      <script src="/main.js"></script>
      <script src="{{ asset('') }}assets/jquery/datatables.min.js"></script>
      <script type="text/javascript" src="{{asset('')}}assets/jquerysignature/jquery.signature.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

      <script type="text/javascript" src="{{ asset('js/daftar_pemilih/dps/home.js') }}" defer></script>
  </body>
</html>