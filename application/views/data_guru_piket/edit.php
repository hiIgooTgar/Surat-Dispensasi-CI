<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('data_guru_piket') ?>" class="btn btn-sm btn-primary"
    ><i class="fa fa-arrow-left mb-1"></i> Kembali</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body mt-3">
        <form
          action="<?= base_url('data_guru_piket/update') ?>"
          method="post"
          role="form">
          <div class="row">
            <input
                type="hidden"
                name="id_guru_piket"
                value="<?php echo $this->uri->segment(3); ?>" />
            <div class="form-group col-md-12">
                <label class="control-label">NIP</label>
                <input
                class="form-control"
                value="<?= $guru_piket->nip ?>"
                name="nip"
                type="number"
                autocomplete="off"
                placeholder="Masukan NIP" />
            </div>
            <div class="form-group col-md-12">
                <label class="control-label">Nama Guru Piket</label>
                <input
                class="form-control"
                value="<?= $guru_piket->nama_guru_piket ?>"
                name="nama_guru_piket"
                type="text"
                autocomplete="off"
                placeholder="Masukan Nama Guru Piket" />
            </div>
            
          </div>
          <div class="tile-footer">
            <button class="btn btn-warning btn btn-sm" type="submit">
              <i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button
            >
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
