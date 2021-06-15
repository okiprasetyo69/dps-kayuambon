<!-- Modal -->
<div class="modal fade" id="modalAddDps" role="dialog" aria-labelledby="modalAddUser" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title-dps">Add DPS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="frm-add-dps">
                @csrf
                <div class="form-group">
                    <label for="">NKK</label>
                    <input type="hidden" name="id" class="form-control" id="dps_id">
                    <input type="text" name="nkk" class="form-control" id="nkk" placeholder="Masukkan NKK">
                    <span id="err_nkk"> </span>
                </div>
                <div class="form-group">
                  <label for="">NIK</label>
                  <input type="text" name="nik" class="form-control" id="nik" placeholder="Masukkan NIK">
                  <span id="err_nik"> </span>
                </div>
                <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama">
                  <span id="err_nama"> </span>
                </div>
                <div class="form-group">
                  <label for="">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Masukkan tempat lahir">
                  <span id="err_tempat_lahir"> </span>
                </div>
                <div class="form-group">
                  <label for="">Tanggal Lahir</label>
                  <input type="text" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="Masukkan tanggal lahir">
                  <span id="err_tgl_lahir"> </span>
                </div>
                <div class="form-group">
                  <label for="">Kawin</label>
                  <input type="text" name="kawin" class="form-control" id="kawin" placeholder="">
                  <span id="err_kawin"> </span>
                </div>
                <div class="form-group">
                  <label for="">Jenis Kelamin</label>
                  <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" placeholder="">
                  <span id="err_jenis_kelamin"> </span>
                </div>
                <div class="form-group">
                  <label for="">Alamat</label>
                  <input type="text" name="alamat" class="form-control" id="alamat" placeholder="">
                  <span id="err_alamat"> </span>
                </div>
                <div class="form-group">
                  <label for="">RT</label>
                  <input type="text" name="rt" class="form-control" id="rt" placeholder="">
                  <span id="err_rt"> </span>
                </div>
                <div class="form-group">
                  <label for="">RW</label>
                  <input type="text" name="rw" class="form-control" id="rw" placeholder="">
                  <span id="err_rw"> </span>
                </div>
                <div class="form-group">
                  <label for="">Difabel</label>
                  <input type="text" name="difabel" class="form-control" id="difabel" placeholder="">
                  <span id="err_difabel"> </span>
                </div>
                <div class="form-group">
                  <label for="">Keterangan</label>
                  <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="">
                  <span id="err_keterangan"> </span>
                </div>
                <div class="form-group">
                  <label for="">Sumber Data</label>
                  <input type="text" name="sumberdata" class="form-control" id="sumberdata" placeholder="">
                  <span id="err_sumber_data"> </span>
                </div>
                <div class="form-group">
                  <label for="">TPS</label>
                  <input type="text" name="tps" class="form-control" id="tps" placeholder="">
                  <span id="err_tps"> </span>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
            <i class="fas fa-window-close"></i> Close</button>
          <button type="submit" class="btn btn-primary btn-sm" id="btn-save"> <i class="fas fa-save"></i> Save</button>
        </div>
            </form>
      </div>
    </div>
  </div>

  