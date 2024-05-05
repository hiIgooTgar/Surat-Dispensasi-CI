<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('data_guru_piket') ?>" class="btn btn-sm btn-primary"
    ><i class="fa fa-arrow-left mb-1"></i> Kembali</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body mt-3">
        <form action="<?= base_url('data_guru_piket/store') ?>" method="post" role="form">
          <div class="row">
          <div class="form-group col-md-12">
                <label class="control-label">NIP</label>
                <input
                class="form-control"
                name="nip"
                type="number"
                placeholder="Masukan NIP"
                autocomplete="off" />
            </div>
            <div class="form-group col-md-12">
                <label class="control-label">Nama Guru Piket</label>
                <input
                class="form-control"
                name="nama_guru_piket"
                type="text"
                placeholder="Masukan Nama Guru Piket"
                autocomplete="off" />
            </div>       
        </div>        
          <div class="tile-footer">
            <button class="btn btn-primary btn btn-sm" type="submit">
              <i class="fa fa-fw fa-lg fa-check-circle"></i>Kirim</button
            >&nbsp;&nbsp;&nbsp;<button
              type="reset"
              class="btn btn-secondary btn-sm">
              <i class="fa fa-times-circle"></i> Reset
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
