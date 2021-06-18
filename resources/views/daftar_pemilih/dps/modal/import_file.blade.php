<!-- Modal -->
<div class="modal fade" id="modalImportFile" role="dialog" aria-labelledby="modalImportFile" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Import File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="frm-import-file" nctype="multipart/form-data">
              @csrf
              <div class="col">
                <div class="form-group">
                  <label> Upload File </label>
                  <input type="file" name="file" class="form-control" id="file">
                </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fas fa-window-close"></i> Close</button>
        <button type="submit" class="btn btn-primary btn-sm" id="btn-import"> <i class="fas fa-file-upload"></i> Import</button>
      </div>
          </form>
    </div>
  </div>
</div>

