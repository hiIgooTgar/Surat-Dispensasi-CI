<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('verifikasi_validasi') ?>" class="btn btn-sm btn-primary">
    <i class="fa fa-arrow-left mb-1"></i> Kembali
  </a>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body mt-3">
        <div class="row">
        <div class="form-group col-md-12">
          <label class="control-label">Nama Lengkap</label>
            <input
              class="form-control"
              value="<?= $verifikasi_validasi->nama_lengkap ?>"
              id="nama_lengkap"
              disabled="" />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">NIS</label>
            <input
              class="form-control"
              value="<?= $verifikasi_validasi->nis ?>"
              id="nis"
              disabled="" />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Kelas</label>
            <input
              class="form-control"
              value="<?= $verifikasi_validasi->kelas ?>"
              id="kelas"
              style="text-transform: uppercase;"
              disabled="" />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Jurusan</label>
          <select
                class="form-control"
                id="demoSelect"
                name="jurusan"
                disabled=""
                id="jurusan">
                <option value="">-- Pilih Jurusan --</option>
                  <option <?php if ($verifikasi_validasi->jurusan == 'dpib') echo 'selected'; ?> value="dpib">DPIB / TGB</option>
                  <option <?php if ($verifikasi_validasi->jurusan == 'tbs') echo 'selected'; ?> value="tbs">TBS / BSN</option>
                  <option <?php if ($verifikasi_validasi->jurusan == 'mm') echo 'selected'; ?> value="mm">MM / BCF</option>
                  <option <?php if ($verifikasi_validasi->jurusan == 'tkro') echo 'selected'; ?> value="tkro">TKRO / TKR</option>
                  <option <?php if ($verifikasi_validasi->jurusan == 'tkj') echo 'selected'; ?> value="tkj">TKJ / TJKT</option>
                  <option <?php if ($verifikasi_validasi->jurusan == 'rpl') echo 'selected'; ?> value="rpl">RPL / PPLG</option>
                  <option <?php if ($verifikasi_validasi->jurusan == 'tbo') echo 'selected'; ?> value="tbo">TBO / TO</option>
                </select>
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Nama guru mapel yang sedang mengajar</label>
            <input
              class="form-control"
              value="<?= $verifikasi_validasi->guru_mapel ?>"
              id="guru_mapel"
              disabled="" />
        </div>
        </div>
        <form action="<?= base_url('verifikasi_validasi/cetakPDF') ?>" method="post" role="form">
          <div class="row">
            <input type="hidden" name="id_pengajuan" value="<?= $verifikasi_validasi->id_pengajuan ?>">
            <div class="form-group col-md-12">
              <label class="control-label">Nama Guru Mapel</label>
              <select required class="form-control" name="nama_guru" id="nama_guru" data-dropdown-css-class="select2">
                  <option value="">-- Pilih Nama Guru Mapel --</option>
                  <?php foreach ($guru_mapel_list as $guru_mapel): ?>
                      <option value="<?= $guru_mapel->nama_guru ?>"><?= $guru_mapel->nama_guru ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nama Guru Piket</label>
              <select required class="form-control" name="nama_guru_piket" id="nama_guru_piket" data-dropdown-css-class="select2">
                  <option value="">-- Pilih Nama Guru Piket --</option>
                  <?php foreach ($guru_piket_list as $guru_piket): ?>
                      <option value="<?= $guru_piket->nama_guru_piket ?>"><?= $guru_piket->nama_guru_piket ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="tile-footer">
            <button class="btn btn-danger btn btn-sm" type="submit">
              <i class="fa fa-fw fa-lg fa-print"></i> PDF
            </button>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
