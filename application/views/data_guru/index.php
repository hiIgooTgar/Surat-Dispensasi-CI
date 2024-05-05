<div class="row mb-3 mx-1">
  <a href="<?= base_url('data_guru/create') ?>" class="btn btn-sm btn-primary mx-1"
    ><i class="fa fa-plus"></i> Tambah Data Guru Mapel</a
  >
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
                <th>NIP</th>
                <th>Nama Guru Mapel</th>
                <th>Mata Pelajaran</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $a = 1;
              foreach($guru as $row) :
                 ?>
              <tr>
                <td><?= $a++; ?></td>
                <td><?= $row->nip ?></td>
                <td><?= $row->nama_guru ?></td>
                <td><?= $row->mata_pelajaran ?></td>
                <td>
                  <a
                    title="Detail"
                    href="<?= base_url('data_guru/show/'.$row->id_guru) ?>"
                    class="btn btn-info btn-semi-sm"
                    ><i class="fa fa-eye"></i
                  > Detail</a>
                  <a
                    title="Edit"
                    href="<?= base_url('data_guru/edit/'.$row->id_guru) ?>"
                    class="btn btn-warning btn-semi-sm"
                    ><i class="fa fa-edit"></i
                  > Edit</a>
                  <a
                    title="Hapus"
                    onclick="confirmDelete(event, '<?= base_url('data_guru/destroy/'.$row->id_guru) ?>');"
                    class="btn btn-danger btn-semi-sm text-white"
                    ><i class="fa fa-trash"></i
                  > Hapus</a>
                </td>
              </tr>
              <?php 
            endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

