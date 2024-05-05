<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('pengajuan_surat') ?>" class="btn btn-sm btn-primary"
    ><i class="fa fa-arrow-left mb-1"></i> Kembali</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body mt-3">
        <form action="<?= base_url('pengajuan_surat/storePengajuan') ?>" method="post" role="form">
          <div class="row">
            <div class="form-group col-md-6">
                <label class="control-label">Nama Lengkap</label>
                <input
                class="form-control"
                name="nama_lengkap"
                type="text"
                value="<?= $this->session->userdata('nama_lengkap'); ?>"
                disabled
                placeholder="Masukan Nama Lengkap"
                autocomplete="off" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">NIS</label>
                <input
                class="form-control"
                name="nis"
                type="number"
                value="<?= $this->session->userdata('nis') ?>"
                disabled
                placeholder="Masukan NIS"
                autocomplete="off" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Kelas</label>
                <input
                class="form-control"
                name="kelas"
                type="text"
                style="text-transform: uppercase;"
                value="<?= $this->session->userdata('kelas'); ?>"
                disabled
                placeholder="Masukan Kelas"
                autocomplete="off" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Jurusan</label>
                <input
                class="form-control"
                name="jurusan"
                type="text"
                style="text-transform: uppercase;"
                value="<?= $this->session->userdata('jurusan'); ?>"
                disabled
                placeholder="Masukan Jurusan"
                autocomplete="off" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Tanggal Dispensasi</label>
                <input
                class="form-control"
                name="tgl_pengajuan"
                type="date"
                id="tanggal"
                required
                placeholder="Masukan Tanggal Pengajuan"
                autocomplete="off" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Mulai Jam Ke</label>
                <select required class="form-control" name="mulai_jam" id="mulai_jam">
                  <option value="">-- Pilih Jam --</option>
                  <option value="1">1 (07.30 - 08.00)</option>
                  <option value="2">2 (08.00 - 08.40)</option>
                  <option value="3">3 (08.40 - 09.20)</option>
                  <option value="istirahat-1">Istirahat (09.20 - 09.35)</option>
                  <option value="4">4 (09.35 - 10.15)</option>
                  <option value="5">5 (10.15 - 10.55)</option>
                  <option value="6">6 (10.55 - 11.35)</option>
                  <option value="7">7 (11.35 - 12.15)</option>
                  <option value="istirahat-2">Istirahat / Solat Dzuhur (12.15 - 12.50)</option>
                  <option value="8">8 (12.50 - 13.30)</option>
                  <option value="9">9 (13.30 - 14.10)</option>
                  <option value="10">10 (14.10 - 14.50)</option>
                  <option value="11">11 (14.10 - 15.30)</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Selesai Jam Ke</label>
                <select required class="form-control" name="selesai_jam" id="selesai_jam">
                  <option value="">-- Pilih Jam --</option>
                  <option value="1">1 (07.30 - 08.00)</option>
                  <option value="2">2 (08.00 - 08.40)</option>
                  <option value="3">3 (08.40 - 09.20)</option>
                  <option value="istirahat-1">Istirahat (09.20 - 09.35)</option>
                  <option value="4">4 (09.35 - 10.15)</option>
                  <option value="5">5 (10.15 - 10.55)</option>
                  <option value="6">6 (10.55 - 11.35)</option>
                  <option value="7">7 (11.35 - 12.15)</option>
                  <option value="istirahat-2">Istirahat / Solat Dzuhur (12.15 - 12.50)</option>
                  <option value="8">8 (12.50 - 13.30)</option>
                  <option value="9">9 (13.30 - 14.10)</option>
                  <option value="10">10 (14.10 - 14.50)</option>
                  <option value="11">11 (14.10 - 15.30)</option>
                  <option value="tidak_kembali">Tidak kembali ke sekolah</option>
                </select>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Nama Guru Mapel Sedang Mengajar</label>
              <select required class="form-control" name="guru_mapel" id="nama_guru" data-dropdown-css-class="select2">
                  <option value="">-- Pilih Nama Guru Mapel --</option>
                  <?php foreach ($guru_mapel_list as $guru_mapel): ?>
                      <option value="<?= $guru_mapel->nama_guru ?>"><?= $guru_mapel->nama_guru ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-12">
                <label class="control-label">Keperluan</label>
                <textarea required class="form-control" name="keperluan" id="keperluan" placeholder="Masukan keperluan anda" cols="30" rows="10"></textarea>
            </div>
            <!-- status -->
            <input
                class="form-control"
                name="status"
                type="hidden"
                value="1"/>
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
