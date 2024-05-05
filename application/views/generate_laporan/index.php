<div class="row mb-3">
  <div class="col-md-12">
    <div class="card px-4 py-4">
      <form class="row" action="<?= base_url('generate_laporan/pdfPrint') ?>" method="post">
        <div class="col-md-4 mb-2">
          <label for="start_date">Periode Mulai:</label>
          <input class="form-control" id="start_date" type="date" name="start_date">
        </div>
        <div class="col-md-4 mb-2">
          <label for="end_date">Periode Sampai:</label>
          <input id="end_date" class="form-control" type="date" name="end_date">
        </div>
        <div class="col-md-4 mb-2">
          <label for="search">Generate PDF</label>
          <br>
          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i> Generate PDF</button>
        </div>
      </form>
    </div>
    <div class="card mt-3 px-2 py-2">
    <div class="row">
      <div class="col-md-3 mx-1">
          <a href="<?= base_url('generate_laporan/exportExcel') ?>" class="btn btn-success btn-sm"><i class="fa fa-file-excel"></i> Excel</a>
      </div>
      </div>
    </div>
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
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Tanggal</th>
                <th>Mulai jam ke</th>
                <th>Selesai jam ke</th>
                <th>Guru Mapel Mengajar</th>
                <th>Keperluan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $a = 1;
              foreach($generate_laporan as $row) :
                // if ($row->level == 'petugas') {
                    if ($row->status == 0) {
                        $btn = 'btn-danger';
                        $fa = 'fa-hand';
                        $kata = ' Ditolak';
                    } else if ($row->status == 1) {
                        $btn = 'btn-warning';
                        $fa = 'fa-hourglass-start';
                        $kata = ' Sedang Proses';
                    } else if ($row->status == 2) {
                        $btn = 'btn-success';
                        $fa = 'fa-check';
                        $kata = ' Diterima';
                    }
                 ?>
              <tr>
                <td><?= $a++; ?></td>
                <td><?= $row->nama_lengkap ?></td>
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
                <td><?= date('d F Y', strtotime($row->tgl_pengajuan)) ?></td>
                <td><?php  if ($row->mulai_jam == 1) {
                    echo 'Jam ke 1 (07.30 - 08.00)';
                } else if ($row->mulai_jam == 2) {
                    echo 'Jam ke 2 (08.00 - 08.40)';
                } else if ($row->mulai_jam == 3) {
                    echo 'Jam ke 3 (08.40 - 09.20)';
                } else if ($row->mulai_jam == 'istirahat-1') {
                    echo 'Istirahat (09.20 - 09.35)';
                } else if ($row->mulai_jam == 4) {
                    echo 'Jam ke 4 (09.35 - 10.15)';
                } else if ($row->mulai_jam == 5) {
                    echo 'Jam ke 5 (10.15 - 10.55)';
                } else if ($row->mulai_jam == 6) {
                    echo 'Jam ke 6 (10.55 - 11.35)';
                } else if ($row->mulai_jam == 7) {
                    echo 'Jam ke 7 (11.35 - 12.15)';
                } else if ($row->mulai_jam == 'istirahat-2') {
                    echo 'Istirahat / Solat Dzuhur (12.15 - 12.50)';
                } else if ($row->mulai_jam == 8) {
                    echo 'Jam ke 8 (12.50 - 13.30)';
                } else if ($row->mulai_jam == 9) {
                    echo 'Jam ke 9 (13.30 - 14.10)';
                } else if ($row->mulai_jam == 10) {
                    echo 'Jam ke 10 (14.10 - 14.50)';
                } else if ($row->mulai_jam == 11) {
                    echo 'Jam ke 11 (14.50 - 13.30)';
                } 
            ?></td>
                <td><?php  if ($row->selesai_jam == 1) {
                    echo 'Jam ke 1 (07.30 - 08.00)';
                } else if ($row->selesai_jam == 2) {
                    echo 'Jam ke 2 (08.00 - 08.40)';
                } else if ($row->selesai_jam == 3) {
                    echo 'Jam ke 3 (08.40 - 09.20)';
                } else if ($row->selesai_jam == 'istirahat-1') {
                    echo 'Istirahat (09.20 - 09.35)';
                } else if ($row->selesai_jam == 4) {
                    echo 'Jam ke 4 (09.35 - 10.15)';
                } else if ($row->selesai_jam == 5) {
                    echo 'Jam ke 5 (10.15 - 10.55)';
                } else if ($row->selesai_jam == 6) {
                    echo 'Jam ke 6 (10.55 - 11.35)';
                } else if ($row->selesai_jam == 7) {
                    echo 'Jam ke 7 (11.35 - 12.15)';
                } else if ($row->selesai_jam == 'istirahat-2') {
                    echo 'Istirahat / Solat Dzuhur (12.15 - 12.50)';
                } else if ($row->selesai_jam == 8) {
                    echo 'Jam ke 8 (12.50 - 13.30)';
                } else if ($row->selesai_jam == 9) {
                    echo 'Jam ke 9 (13.30 - 14.10)';
                } else if ($row->selesai_jam == 10) {
                    echo 'Jam ke 10 (14.10 - 14.50)';
                } else if ($row->selesai_jam == 11) {
                    echo 'Jam ke 11 (14.50 - 13.30)';
                } else if ($row->selesai_jam == 'tidak_kembali') {
                    echo 'Tidak kembali ke sekolah';
                }
            ?></td>
                <td><?= $row->guru_mapel ?></td>
                <td><?= $row->keperluan ?></td>
                <td class="text-center"><button class="btn <?= $btn ?> btn-xs" disabled="disabled"><i class="fa <?= $fa ?>"></i><?= $kata ?></button></td>
              </tr>
              <?php 
            // }
            endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
