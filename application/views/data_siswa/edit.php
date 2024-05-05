<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('data_siswa') ?>" class="btn btn-sm btn-primary"
    ><i class="fa fa-arrow-left mb-1"></i> Kembali</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body mt-3">
        <form
          action="<?= base_url('data_siswa/update') ?>"
          method="post"
          role="form">
          <div class="row">
            <input
                type="hidden"
                name="id_users"
                value="<?php echo $this->uri->segment(3); ?>" />
            <div class="form-group col-md-6">
                <label class="control-label">Nama Lengkap</label>
                <input
                class="form-control"
                value="<?= $siswa->nama_lengkap ?>"
                name="nama_lengkap"
                type="text"
                autocomplete="off"
                placeholder="Masukan Nama Lengkap" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">NIS</label>
                <input
                class="form-control"
                value="<?= $siswa->nis ?>"
                name="nis"
                type="text"
                autocomplete="off"
                placeholder="Masukan NIS" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Kelas</label>
                <select
                class="form-control"
                id="demoSelect"
                name="kelas"
                id="kelas">
                <option value="x" <?php if ($siswa->kelas == 'x') echo 'selected'; ?>>X
                </option>
                <option value="xi" <?php if ($siswa->kelas == 'xi') echo 'selected'; ?>>XI
                </option>
                <option value="xii" <?php if ($siswa->kelas == 'xii') echo 'selected'; ?>>XII
                </option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Jurusan</label>
                <select
                class="form-control"
                id="demoSelect"
                name="jurusan"
                id="jurusan">
                <option value="">-- Pilih Jurusan --</option>
                  <option <?php if ($siswa->jurusan == 'dpib') echo 'selected'; ?> value="dpib">DPIB / TGB</option>
                  <option <?php if ($siswa->jurusan == 'tbs') echo 'selected'; ?> value="tbs">TBS / BSN</option>
                  <option <?php if ($siswa->jurusan == 'tkj') echo 'selected'; ?> value="tkj">TKJ / TJKT</option>
                  <option <?php if ($siswa->jurusan == 'mm') echo 'selected'; ?> value="mm">MM / BCF</option>
                  <option <?php if ($siswa->jurusan == 'tkro') echo 'selected'; ?> value="tkro">TKRO / TKR</option>
                  <option <?php if ($siswa->jurusan == 'rpl') echo 'selected'; ?> value="rpl">RPL / PPLG</option>
                  <option <?php if ($siswa->jurusan == 'tbo') echo 'selected'; ?> value="tbo">TBO / TO</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Username</label>
                <input
                class="form-control"
                value="<?= $siswa->username ?>"
                name="username"
                type="text"
                autocomplete="off"
                placeholder="Masukan username" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Password</label>
                <input
                class="form-control"
                value="<?= $this->encryption->decrypt($siswa->password) ?>"
                name="password"
                type="text"
                autocomplete="off"
                placeholder="Masukan password" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">No Telepone</label>
                <input
                class="form-control"
                value="<?= $siswa->telp ?>"
                name="telp"
                type="number"
                placeholder="Masukan No Telepone" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Gender</label>
                <select
                class="form-control"
                id="demoSelect"
                name="gender"
                id="gender">
                <option value="laki_laki" <?php if ($siswa->gender == 'laki_laki') echo 'selected'; ?>>Laki-laki
                </option>
                <option value="perempuan" <?php if ($siswa->gender == 'perempuan') echo 'selected'; ?>>Perempuan
                </option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Level / Role</label>
                <select
                class="form-control"
                id="demoSelect"
                name="level"
                disabled=""
                id="level">
                <option value="admin" <?php if ($siswa->level == 'admin') echo 'selected'; ?>>Admin
                </option>
                <option value="siswa" <?php if ($siswa->level == 'siswa') echo 'selected'; ?>>Siswa
                </option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Status Akun</label>
                <select
                class="form-control"
                id="demoSelect"
                name="status"
                id="status">
                <option value="1" <?php if ($siswa->status == '1') echo 'selected'; ?>>Aktif
                </option>
                <option value="0" <?php if ($siswa->status == '0') echo 'selected'; ?>>Tidak Aktif
                </option>
                </select>
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
