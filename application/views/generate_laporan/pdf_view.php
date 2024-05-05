<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf ?></title>

    <!-- Font-icon css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
         body {
            font-family: serif;
        }

        .kop-header {
            margin-bottom: 0;
        }

        .kop-header h5 {
            font-weight: 400;
        }

        .kop-header p {
            margin-bottom: 0;
        }

        .line-tebal {
            border: 2.5px #000 solid;
            margin: 1rem 0 0;
            padding-bottom: 0;
        }
        .line-title{
            margin-top: 2.5px;
            border-top: 1px solid #000;
        }

        .btn-xs,
        .btn-group-xs > .btn {
            padding: 0.19rem 0.3rem;
            font-size: 0.73rem;
            line-height: 1.2;
            border-radius: 1.5px;
        }

        i {
            margin-bottom: 0;
            padding-bottom: 0;
        }

    </style>
</head>

<body>
<table style="width: 100%;">
        <tr>
            <td><img width="110px" src="<?= base_url("assets/images/logo/logo_smk_n1_bkj.png") ?>" alt=""></td>
            <td class="kop-header" align="center">
                <h5>PEMERINTAHAN KABUPATEN PURBALINGGA</h5>
                <h4>SMK NEGERI 1 BUKATEJA</h4>
                <p>Jalan Raya Purwandaru, Bukateja, Purbalingga Kode Pos 53382 Telepon 0286-476110 Faximile 0286-476110 Surat Elektronik smkn1_bukateja@yahoo.co.id</p>
            </td>
        </tr>
    </table>
    
    <div class="line-tebal"></div>
    <div class="line-title">
        <br>
        <p style="margin-bottom: 0;">Periode Mulai : <?= !empty($start_date) ? date('d F Y', strtotime($start_date)) : '-' ?></p>
        <p style="margin-bottom: 0;">Periode Selesai : <?= !empty($end_date) ? date('d F Y', strtotime($end_date)) : '-' ?></p>


        <br>
    
    <table class="table table-hover table-bordered" id="tableMobileAdmin" >
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Mulai jam</th>
                <th>Selesai jam</th>
                <th>Guru Mapel</th>
                <th>Keperluan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $a = 1;
        foreach($generate_laporan as $row) :
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
            <td><?= $row->nama_lengkap ?></td>
            <td><?= date('d F Y', strtotime($row->tgl_pengajuan)) ?></td>
            <td><?php if ($row->mulai_jam == 1) {
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
            <td class="text-center"><button class="btn <?= $btn ?> btn-xs" ><i class="fa <?= $fa ?>"></i><?= $kata ?></button></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
