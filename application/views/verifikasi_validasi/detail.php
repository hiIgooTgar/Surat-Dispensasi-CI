<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('verifikasi_validasi') ?>" class="btn btn-sm btn-primary"
    ><i class="fa fa-arrow-left mb-1"></i> Kembali</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body row">
        <div class="form-group col-md-6">
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
          <label class="control-label">Tanggal Pengajuan</label>
            <input
              class="form-control"
              value="<?= date('d F Y', strtotime($verifikasi_validasi->tgl_pengajuan)) ?>"
              id="tgl_pengajuan"
              disabled="" />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Mulai Jam ke</label>
          <select disabled="" class="form-control" name="mulai_jam" id="mulai_jam">
            <option value="">-- Pilih Jam --</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '1') echo 'selected'; ?> value="1">1 (07.30 - 08.00)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '2') echo 'selected'; ?> value="2">2 (08.00 - 08.40)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '3') echo 'selected'; ?> value="3">3 (08.40 - 09.20)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == 'istirahat-1') echo 'selected'; ?> value="istirahat-1">Istirahat (09.20 - 09.35)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '4') echo 'selected'; ?> value="4">4 (09.35 - 10.15)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '5') echo 'selected'; ?> value="5">5 (10.15 - 10.55)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '6') echo 'selected'; ?> value="6">6 (10.55 - 11.35)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '7') echo 'selected'; ?> value="7">7 (11.35 - 12.15)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == 'istirahat-2') echo 'selected'; ?> value="istirahat-2">Istirahat / Solat Dzuhur (12.15 - 12.50)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '8') echo 'selected'; ?> value="8">8 (12.50 - 13.30)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '9') echo 'selected'; ?> value="9">9 (13.30 - 14.10)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '10') echo 'selected'; ?> value="10">10 (14.10 - 14.50)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '11') echo 'selected'; ?> value="11">11 (14.10 - 15.30)</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Selesai Jam ke</label>
          <select disabled="" class="form-control" name="mulai_jam" id="mulai_jam">
            <option value="">-- Pilih Jam --</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '1') echo 'selected'; ?> value="1">1 (07.30 - 08.00)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '2') echo 'selected'; ?> value="2">2 (08.00 - 08.40)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '3') echo 'selected'; ?> value="3">3 (08.40 - 09.20)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == 'istirahat-1') echo 'selected'; ?> value="istirahat-1">Istirahat (09.20 - 09.35)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '4') echo 'selected'; ?> value="4">4 (09.35 - 10.15)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '5') echo 'selected'; ?> value="5">5 (10.15 - 10.55)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '6') echo 'selected'; ?> value="6">6 (10.55 - 11.35)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '7') echo 'selected'; ?> value="7">7 (11.35 - 12.15)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == 'istirahat-2') echo 'selected'; ?> value="istirahat-2">Istirahat / Solat Dzuhur (12.15 - 12.50)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '8') echo 'selected'; ?> value="8">8 (12.50 - 13.30)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '9') echo 'selected'; ?> value="9">9 (13.30 - 14.10)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '10') echo 'selected'; ?> value="10">10 (14.10 - 14.50)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == '11') echo 'selected'; ?> value="11">11 (14.10 - 15.30)</option>
            <option <?php if ($verifikasi_validasi->mulai_jam == 'tidak_kembali') echo 'selected'; ?> value="tidak_kembali">Tidak kembali ke sekolah</option>
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
        <div class="form-group col-md-12">
          <label class="control-label">Keperluan</label>
            <textarea disabled="" class="form-control" name="keperluan" id="keperluan" cols="30" rows="10"><?= $verifikasi_validasi->keperluan ?></textarea>
        </div>
      </div>
    </div>
  </div>
</div>