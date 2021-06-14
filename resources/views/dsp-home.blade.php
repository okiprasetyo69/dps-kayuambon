<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Desa Kayuambon</title>
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
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 float-right">
              <input class="form-control" type="text" placeholder="Masukkan NIK penduduk" aria-label="Search" autofocus>
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
            <button type="button" class="btn btn-secondary btn-sm float-right">Reset</button>
          </div>
        </div>
      </div>
     
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>