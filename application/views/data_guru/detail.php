<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('data_guru') ?>" class="btn btn-sm btn-primary"
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
              value="<?= $guru->nip ?>"
              id="nip"
              disabled="" />
        </div>
        <div class="form-group col-md-12">
          <label class="control-label">Nama Guru</label>
            <input
              class="form-control"
              value="<?= $guru->nama_guru ?>"
              id="nama_guru_mapel"
              disabled="" />
        </div>
        <div class="form-group col-md-12">
          <label class="control-label">Mata Pelajaran</label>
            <input
              class="form-control"
              value="<?= $guru->mata_pelajaran ?>"
              id="mata_pelajaran"
              disabled="" />
        </div>
      </div>
    </div>
  </div>
</div>
