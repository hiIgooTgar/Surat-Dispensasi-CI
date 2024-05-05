<div class="row mb-3 mx-1">
  <a href="<?= base_url('pengajuan_surat/create') ?>" class="btn btn-sm btn-primary mx-1"
    ><i class="fa fa-plus"></i> Tambah Pengajuan Surat Dispensasi</a
  >
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
                <th>NIS</th>
                <th>Tanggal</th>
                <th>Mulai Jam</th>
                <th>Selesai Jam</th>
                <th>Guru Mapel</th>
                <th>Keperluan</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $a = 1;
              $sorted_pengajuan_surat = array_reverse($pengajuan_surat);
              foreach($sorted_pengajuan_surat  as $row) :
                if ($this->session->userdata('nis') == $row->nis) {
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
                <td><?= $row->nis ?></td>
                <td><?= $row->tgl_pengajuan ?></td>
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
                <td>
                 <?php if($row->status == 2 || $row->status == 1 || $row->status == 0) { ?>
                  <a
                    title="Detail"
                    href="<?= base_url('pengajuan_surat/show/'.$row->id_pengajuan) ?>"
                    class="btn btn-info btn-semi-sm"
                    ><i class="fa fa-eye"></i
                  > Detail</a>
                  <?php } ?>
                 <?php if($row->status == 1 ) { ?>
                 <a
                    title="Edit"
                    href="<?= base_url('pengajuan_surat/edit/'.$row->id_pengajuan) ?>"
                    class="btn btn-warning btn-semi-sm"
                    ><i class="fa fa-edit"></i
                  > Edit</a>
                  <?php } ?>
                 <?php if($row->status == 0) { ?>
                  <a
                    title="Hapus"
                    onclick="confirmDelete(event, '<?= base_url('pengajuan_surat/destroy/'.$row->id_pengajuan) ?>');"
                    class="btn btn-danger btn-semi-sm text-white"
                    ><i class="fa fa-trash"></i
                  > Hapus</a>
                <?php } ?>
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
