
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
                <th>Guru Mapel Mengajar</th>
                <th>Keperluan</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $a = 1;
              $sorted_verifikasi_validasi = array_reverse($verifikasi_validasi);
              foreach($sorted_verifikasi_validasi as $row) :
                    if ($row->status == 0) {
                        $btn = 'btn-danger';
                        $fa = 'fa-times-circle';
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
                <td><a class="btn btn-xs btn-primary text-white" href="<?= base_url('verifikasi_validasi/show/' . $row->id_pengajuan) ?>"><i style="font-size: 0.5rem;" class="fa fa-eye"></i> Detail </a> <span class="ml-1"><?= $row->nama_lengkap ?></span></td>
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
                <td><?= $row->guru_mapel ?></td>
                <td><?= $row->keperluan ?></td>
                <td class="text-center"><button class="btn <?= $btn ?> btn-xs" disabled="disabled"><i class="fa <?= $fa ?>"></i><?= $kata ?></button></td>
                <td>
                    <?php if ($row->status == 0) : ?>
                        <a onclick="confirmDelete(event, '<?= base_url('verifikasi_validasi/destroy/' . $row->id_pengajuan) ?>');" class="btn btn-danger btn-semi-sm text-white"><i class="fa fa-trash"></i> Didelete</a>
                    <?php elseif ($row->status == 1) : ?>
                        <a onclick="confirmDitolak(event, '<?= base_url('verifikasi_validasi/ditolak/' . $row->id_pengajuan) ?>');" class="btn btn-danger btn-semi-sm text-white"><i class="far fa-times-circle"></i> Ditolak</a>
                        <a onclick="confirmDiterima(event, '<?= base_url('verifikasi_validasi/diterima/' . $row->id_pengajuan) ?>');" class="btn btn-success btn-semi-sm text-white"><i class="far fa-check-circle"></i> Diterima</a>
                    <?php elseif ($row->status == 2) : ?>
                      <a href="<?= base_url('verifikasi_validasi/dicetak/' . $row->id_pengajuan) ?>" class="btn btn-info btn-semi-sm"><i class="fa fa-print"></i> Cetak</a>
                    <?php endif; ?>
                </td>

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

