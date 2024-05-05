<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('data_guru_piket') ?>" class="btn btn-sm btn-primary"
    ><i class="fa fa-arrow-left mb-1"></i> Kembali</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body row">
        <div class="form-group col-md-12">
          <label class="control-label">NIP</label>
            <input
              class="form-control"
              value="<?= $guru_piket->nip ?>"
              id="nip"
              disabled="" />
        </div>
        <div class="form-group col-md-12">
          <label class="control-label">Nama Guru Piket</label>
            <input
              class="form-control"
              value="<?= $guru_piket->nama_guru_piket ?>"
              id="nama_guru_piket_s"
              disabled="" />
        </div>
      </div>
    </div>
  </div>
</div>
