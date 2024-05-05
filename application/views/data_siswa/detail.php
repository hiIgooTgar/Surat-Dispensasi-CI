<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('data_siswa') ?>" class="btn btn-sm btn-primary"
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
              value="<?= $siswa->nama_lengkap ?>"
              id="nama_lengkap"
              disabled="" />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">NIS</label>
            <input
              class="form-control"
              value="<?= $siswa->nis ?>"
              id="nis"
              disabled="" />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Kelas</label>
            <input
              class="form-control"
              value="<?= $siswa->kelas ?>"
              style="text-transform: uppercase;"
              id="kelas"
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
              id="username"
              disabled="" />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Password</label>
            <input
              class="form-control"
              value="<?=  $this->encryption->decrypt($siswa->password) ?>"
              id="password"
              disabled="" />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">No Telepone</label>
            <input
              class="form-control"
              value="<?= $siswa->telp ?>"
              id="telp"
              disabled="" />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Gender</label>
          <select
                class="form-control"
                id="demoSelect"
                name="gender"
                disabled=""
                id="gender">
                <option value="">-- Pilih Gender --</option>
                  <option <?php if ($siswa->gender == 'laki_laki') echo 'selected'; ?> value="laki_laki">Laki-laki</option>
                  <option <?php if ($siswa->gender == 'perempuan') echo 'selected'; ?> value="perempuan">Perempuan</option>
                </select>
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Level / Role</label>
            <input
              class="form-control"
              value="<?= $siswa->level ?>"
              id="level"
              disabled="" />
        </div>
        <div class="form-group col-md-6">
                <label class="control-label">Status Akun</label>
                <select
                class="form-control"
                id="demoSelect"
                name="status"
                disabled=""
                id="status">
                <option value="1" <?php if ($siswa->status == '1') echo 'selected'; ?>>Aktif
                </option>
                <option value="0" <?php if ($siswa->status == '0') echo 'selected'; ?>>Tidak Aktif
                </option>
                </select>
            </div>
      </div>
    </div>
  </div>
</div>
