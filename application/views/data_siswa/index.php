<div class="row mb-3 mx-1">
  <a href="<?= base_url('data_siswa/create') ?>" class="btn btn-sm btn-primary mx-1"
    ><i class="fa fa-plus"></i> Tambah Data Siswa</a
  >
</div>
<div class="row">
  <div class="form-group col-md-6">
    <select name="kelas" class="form-control" id="kelas">
      <option value="">-- Pilih Kelas --</option>
      <option value="x">X</option>
      <option value="xi">XI</option>
      <option value="xii">XII</option>
    </select>
  </div>
  <div class="form-group col-md-6">
  <select name="jurusan" class="form-control" id="jurusan">
    <option value="">-- Pilih Jurusan --</option>
    <option value="dpib">DPIB / TGB</option>
    <option value="tbs">TBS / BSN</option>
    <option value="tkro">TKRO / TKR</option>
    <option value="mm">MM / BCF</option>
    <option value="tkj">TKJ / TJKT</option>
    <option value="rpl">RPL / PPLG</option>
    <option value="tbo">TBO / TO</option>
  </select>
</div>

</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered" id="tableMobileAdmin" >
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Gender</th>
                <th>Username</th>
                <th>Status Akun</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $a = 1;
              foreach($siswa as $row) :
                if ($row->level == 'siswa') {
                    if ($row->status == 0) {
                        $btn = 'btn-danger';
                        $fa = 'fa-ban';
                        $kata = ' Tidak Aktif';
                    } else if ($row->status == 1) {
                        $btn = 'btn-success';
                        $fa = 'fa-check';
                        $kata = ' Aktif';
                    }
                 ?>
              <tr data-kelas="<?= $row->kelas ?>" data-jurusan="<?= $row->jurusan ?>">
                <td><?= $a++; ?></td>
                <td><?= $row->nama_lengkap ?></td>
                <td><?= $row->nis ?></td>
                <td style="text-transform: uppercase;"><?= $row->kelas ?></td>
                <td style="text-transform: uppercase;">
                <?php  if ($row->jurusan == 'dpib') {
                    echo 'DPIB / TGB';
                } else if ($row->jurusan == 'tbs') {
                    echo 'TBS / BSN';
                } else if ($row->jurusan == 'tkro') {
                    echo 'TKRO / TKR';
                } else if ($row->jurusan == 'mm') {
                    echo 'MM / BCF';
                } else if ($row->jurusan == 'tkj') {
                    echo 'TKJ / TJKT';
                } else if ($row->jurusan == 'rpl') {
                    echo 'RPL / PPLG';
                } else if ($row->jurusan == 'tbo') {
                    echo 'TBO / TO';
                } else {
                  'Tidak Memilih';
                }
              ?>
              </td>
                <td><?php if($row->gender == 'laki_laki') {
                    echo "Laki-laki";
                  } else if($row->gender == 'perempuan') {
                    echo "Perempuan";
                  }
                  ?>
                </td>
                <td><?= $row->username ?></td>
                <td class="text-center"><button class="btn <?= $btn ?> btn-xs" disabled="disabled"><i class="fa <?= $fa ?>"></i><?= $kata ?></button></td>
                <td>
                  <a
                    title="Detail"
                    href="<?= base_url('data_siswa/show/'.$row->id_users) ?>"
                    class="btn btn-info btn-semi-sm"
                    ><i class="fa fa-eye"></i
                  > Detail</a>
                  <a
                    title="Edit"
                    href="<?= base_url('data_siswa/edit/'.$row->id_users) ?>"
                    class="btn btn-warning btn-semi-sm"
                    ><i class="fa fa-edit"></i
                  > Edit</a>
                  <a
                    title="Hapus"
                    onclick="confirmDelete(event, '<?= base_url('data_siswa/destroy/'.$row->id_users) ?>');"
                    class="btn btn-danger btn-semi-sm text-white"
                    ><i class="fa fa-trash"></i
                  > Hapus</a>
                </td>
              </tr>
              <?php 
            }
            endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>




<script>
  document.addEventListener("DOMContentLoaded", function () {
  const kelasSelect = document.getElementById("kelas");
  const jurusanSelect = document.getElementById("jurusan");
  const table = document.getElementById("tableMobileAdmin");
  const rows = table.getElementsByTagName("tr");

  kelasSelect.addEventListener("change", updateTable);
  jurusanSelect.addEventListener("change", updateTable);

  function updateTable() {
    const selectedKelas = kelasSelect.value;
    const selectedJurusan = jurusanSelect.value;

    for (let i = 1; i < rows.length; i++) {
      const row = rows[i];
      const dataKelas = row.getAttribute("data-kelas");
      const dataJurusan = row.getAttribute("data-jurusan");

      if (
        (selectedKelas === "" || dataKelas === selectedKelas) &&
        (selectedJurusan === "" || dataJurusan === selectedJurusan)
      ) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    }
  }

  // Call the updateTable function when the page loads
  updateTable();
});

</script>