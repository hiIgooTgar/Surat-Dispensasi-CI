<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('pengajuan_surat') ?>" class="btn btn-sm btn-primary"
    ><i class="fa fa-arrow-left mb-1"></i> Kembali</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <form action="<?= base_url('pengajuan_surat/update') ?>" method="post" role="form">
          <div class="row">
          <input
                type="hidden"
                name="id_pengajuan"
                value="<?php echo $this->uri->segment(3); ?>" />
                <div class="form-group col-md-6 mb-3">
                <label>Nama Lengkap</label>
                <input readonly class="form-control" name="nama_lengkap" value="<?= $pengajuan_surat->nama_lengkap ?>" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                <label>NIS</label>
                  <input readonly class="form-control" name="nis" value="<?= $pengajuan_surat->nis ?>" type="number">
                  </div>
                <div class="form-group col-md-6 mb-3">
                  <label>Kelas</label>
                  <select
                  class="form-control"
                  id="demoSelect"
                  name="kelas"
                  readonly
                  id="kelas">
                  <option value="">-- Pilih Kelas --</option>
                  <option value="x" <?php if ($pengajuan_surat->kelas == 'x') echo 'selected'; ?>>X
                  </option>
                  <option value="xi" <?php if ($pengajuan_surat->kelas == 'xi') echo 'selected'; ?>>XI
                  </option>
                  <option value="xii" <?php if ($pengajuan_surat->kelas == 'xii') echo 'selected'; ?>>XII
                  </option>
                  </select>
                </div>
                <div class="form-group col-md-6 mb-3">
                  <label>Jurusan</label>
                  <select
                  class="form-control"
                  readonly
                  id="demoSelect"
                  name="jurusan"
                  id="jurusan">
                  <option value="">-- Pilih Jurusan --</option>
                  <option <?php if ($pengajuan_surat->jurusan == 'dpib') echo 'selected'; ?> value="dpib">DPIB</option>
                  <option <?php if ($pengajuan_surat->jurusan == 'tbs') echo 'selected'; ?> value="tbs">TBS</option>
                  <option <?php if ($pengajuan_surat->jurusan == 'tkj') echo 'selected'; ?> value="tkj">TKJ / TJKT</option>
                  <option <?php if ($pengajuan_surat->jurusan == 'mm') echo 'selected'; ?> value="mm">MM / Broadcasting</option>
                  <option <?php if ($pengajuan_surat->jurusan == 'tkro') echo 'selected'; ?> value="tkro">TKRO / TKR</option>
                  <option <?php if ($pengajuan_surat->jurusan == 'rpl') echo 'selected'; ?> value="rpl">RPL / PPLG</option>
                  <option <?php if ($pengajuan_surat->jurusan == 'tbo') echo 'selected'; ?> value="tbo">TBO</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Tanggal</label>
                  <input
                    class="form-control"
                    value="<?= $pengajuan_surat->tgl_pengajuan ?>"
                    id="tgl_pengajuan"
                    name="tgl_pengajuan"
                    required
                    type="date"
                     />
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Mulai Jam ke</label>
                <select required class="form-control" name="mulai_jam" id="mulai_jam">
                  <option value="">-- Pilih Jam --</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '1') echo 'selected'; ?> value="1">1 (07.30 - 08.00)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '2') echo 'selected'; ?> value="2">2 (08.00 - 08.40)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '3') echo 'selected'; ?> value="3">3 (08.40 - 09.20)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == 'istirahat-1') echo 'selected'; ?> value="istirahat-1">Istirahat (09.20 - 09.35)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '4') echo 'selected'; ?> value="4">4 (09.35 - 10.15)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '5') echo 'selected'; ?> value="5">5 (10.15 - 10.55)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '6') echo 'selected'; ?> value="6">6 (10.55 - 11.35)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '7') echo 'selected'; ?> value="7">7 (11.35 - 12.15)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == 'istirahat-2') echo 'selected'; ?> value="istirahat-2">Istirahat / Solat Dzuhur (12.15 - 12.50)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '8') echo 'selected'; ?> value="8">8 (12.50 - 13.30)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '9') echo 'selected'; ?> value="9">9 (13.30 - 14.10)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '10') echo 'selected'; ?> value="10">10 (14.10 - 14.50)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '11') echo 'selected'; ?> value="11">11 (14.50 - 15.30)</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Selesai Jam ke</label>
                <select required class="form-control" name="selesai_jam" id="selesai_jam">
                  <option value="">-- Pilih Jam --</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '1') echo 'selected'; ?> value="1">1 (07.30 - 08.00)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '2') echo 'selected'; ?> value="2">2 (08.00 - 08.40)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '3') echo 'selected'; ?> value="3">3 (08.40 - 09.20)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == 'istirahat-1') echo 'selected'; ?> value="istirahat-1">Istirahat (09.20 - 09.35)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '4') echo 'selected'; ?> value="4">4 (09.35 - 10.15)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '5') echo 'selected'; ?> value="5">5 (10.15 - 10.55)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '6') echo 'selected'; ?> value="6">6 (10.55 - 11.35)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '7') echo 'selected'; ?> value="7">7 (11.35 - 12.15)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == 'istirahat-2') echo 'selected'; ?> value="istirahat-2">Istirahat / Solat Dzuhur (12.15 - 12.50)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '8') echo 'selected'; ?> value="8">8 (12.50 - 13.30)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '9') echo 'selected'; ?> value="9">9 (13.30 - 14.10)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '10') echo 'selected'; ?> value="10">10 (14.10 - 14.50)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == '11') echo 'selected'; ?> value="11">11 (14.50 - 15.30)</option>
                  <option <?php if ($pengajuan_surat->mulai_jam == 'tidak_kembali') echo 'selected'; ?> value="tidak_kembali">Tidak kembali ke sekolah</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                  <label class="control-label">Nama guru mapel yang sedang mengajar</label>
                  <select required class="form-control" name="guru_mapel" id="nama_guru" data-dropdown-css-class="select2">
                      <option value="">-- Pilih Nama Guru Mapel --</option>
                      <?php foreach ($guru_mapel_list as $guru_mapel): ?>
                          <option value="<?= $guru_mapel->nama_guru ?>" <?php if ($guru_mapel->nama_guru == $pengajuan_surat->guru_mapel) echo 'selected'; ?>>
                              <?= $guru_mapel->nama_guru ?>
                          </option>
                      <?php endforeach; ?>
                  </select>
              </div>

              <div class="form-group col-md-12">
                <label class="control-label">Keperluan</label>
                <textarea required class="form-control" name="keperluan" id="keperluan" cols="30" rows="10"><?= $pengajuan_surat->keperluan ?></textarea>
              </div>
            </div>
                <div class="tile-footer col-md-12">
                    <button class="btn btn-warning btn btn-sm" type="submit">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i> Update Pengaduan
                    </button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
