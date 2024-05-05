<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf ?></title>

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
        .lampiran p {
            margin-bottom: 0;
        }
        .keterangan_siswa p, .keterangan_guru p, .waktu_dispensasi p {
            margin-bottom: 0;
            margin-left: 1rem;
        }
        .content {
            margin: 2.5rem 0;
        }

        .tanda_tangan p {
            margin-bottom: 0;
        }

        .btn-xs, .btn-group-xs > .btn {
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
        <p style="text-align: right; margin-top: 0.6rem;">Bukateja, <?= date('d F Y', strtotime($verifikasi_validasi->tgl_pengajuan)) ?></p>
        <table class="lampiran" style="width: 100%;">
            <tr>
                <td style="width: 65%;">
                <p>Nomor : <?= rand(10000, 99999) . '/'. 'SMK' .'/'. $tahun_sekarang  ?></p>
                    <p>Lampiran : -</p>
                    <p>Hal : <u>Surat Dispensasi</u></p>
                </td>
                <td style="width: 35%;">
                    <p>Kepada <br> Yth. Bapak/Ibu Guru Piket/Mapel <br> SMK Negeri 1 Bukateja</p>
                </td>
            </tr>
        </table>
        <div class="content">
            <p style="margin-bottom: 0;">Dengan hormat,</p>
            <p style="margin-bottom: 5px;">Kami yang bertanda tangan di bawah ini : </p>
            <div class="keterangan_siswa">
                <p>Nama Siswa : <span style="font-weight: 500;"><?= $verifikasi_validasi->nama_lengkap ?></span></p>
                <p>NIS : <?= $verifikasi_validasi->nis ?></p>
                <p>Kelas : <span style="text-transform: uppercase;"><?= $verifikasi_validasi->kelas ?></span></p>
                <p>Jurusan : <span style="text-transform: uppercase;">
                <?php  if ($verifikasi_validasi->jurusan == 'dpib') {
                    echo 'DPIB / TGB';
                } else if ($verifikasi_validasi->jurusan == 'tbs') {
                    echo 'TBS / BSN';
                } else if ($verifikasi_validasi->jurusan == 'tkro') {
                    echo 'TKRO / TKR';
                } else if ($verifikasi_validasi->jurusan == 'mm') {
                    echo 'MM / BCF';
                } else if ($verifikasi_validasi->jurusan == 'tkj') {
                    echo 'TKJ / TJKT';
                } else if ($verifikasi_validasi->jurusan == 'rpl') {
                    echo 'RPL / PPLG';
                } else if ($verifikasi_validasi->jurusan == 'tbo') {
                    echo 'TBO / TO';
                } else {
                  'Tidak Memilih';
                }
              ?></span></p>
            </div>

            <p style="margin-top: 8.5px; margin-bottom: 0;">Dengan ini mengajukan permohonan dispensasi kepada Bapak/Ibu Guru Piket/Mapel terkait dengan keperluan <?= $verifikasi_validasi->keperluan ?>.  Kami sangat memahami pentingnya kehadiran di sekolah dan berkomitmen untuk mengejar pelajaran yang telah kami lewatkan.</p>
            <p style="margin-bottom: 5px; margin-top: 8.5px;">Kami membutuhkan dispensasi pada periode berikut : </p>
            <div class="waktu_dispensasi">
                <p>Tanggal : <?= date('d F Y', strtotime($verifikasi_validasi->tgl_pengajuan)) ?></p>
                <p>Dimulai : <?php  if ($verifikasi_validasi->mulai_jam == 1) {
                    echo 'Jam ke 1 (07.30 - 08.00)';
                } else if ($verifikasi_validasi->mulai_jam == 2) {
                    echo 'Jam ke 2 (08.00 - 08.40)';
                } else if ($verifikasi_validasi->mulai_jam == 3) {
                    echo 'Jam ke 3 (08.40 - 09.20)';
                } else if ($verifikasi_validasi->mulai_jam == 'istirahat-1') {
                    echo 'Istirahat (09.20 - 09.35)';
                } else if ($verifikasi_validasi->mulai_jam == 4) {
                    echo 'Jam ke 4 (09.35 - 10.15)';
                } else if ($verifikasi_validasi->mulai_jam == 5) {
                    echo 'Jam ke 5 (10.15 - 10.55)';
                } else if ($verifikasi_validasi->mulai_jam == 6) {
                    echo 'Jam ke 6 (10.55 - 11.35)';
                } else if ($verifikasi_validasi->mulai_jam == 7) {
                    echo 'Jam ke 7 (11.35 - 12.15)';
                } else if ($verifikasi_validasi->mulai_jam == 'istirahat-2') {
                    echo 'Istirahat / Solat Dzuhur (12.15 - 12.50)';
                } else if ($verifikasi_validasi->mulai_jam == 8) {
                    echo 'Jam ke 8 (12.50 - 13.30)';
                } else if ($verifikasi_validasi->mulai_jam == 9) {
                    echo 'Jam ke 9 (13.30 - 14.10)';
                } else if ($verifikasi_validasi->mulai_jam == 10) {
                    echo 'Jam ke 10 (14.10 - 14.50)';
                } else if ($verifikasi_validasi->mulai_jam == 11) {
                    echo 'Jam ke 11 (14.50 - 13.30)';
                } 
            ?>
            </p>
                <p>Selesai : <?php  if ($verifikasi_validasi->selesai_jam == 1) {
                    echo 'Jam ke 1 (07.30 - 08.00)';
                } else if ($verifikasi_validasi->selesai_jam == 2) {
                    echo 'Jam ke 2 (08.00 - 08.40)';
                } else if ($verifikasi_validasi->selesai_jam == 3) {
                    echo 'Jam ke 3 (08.40 - 09.20)';
                } else if ($verifikasi_validasi->selesai_jam == 'istirahat-1') {
                    echo 'Istirahat (09.20 - 09.35)';
                } else if ($verifikasi_validasi->selesai_jam == 4) {
                    echo 'Jam ke 4 (09.35 - 10.15)';
                } else if ($verifikasi_validasi->selesai_jam == 5) {
                    echo 'Jam ke 5 (10.15 - 10.55)';
                } else if ($verifikasi_validasi->selesai_jam == 6) {
                    echo 'Jam ke 6 (10.55 - 11.35)';
                } else if ($verifikasi_validasi->selesai_jam == 7) {
                    echo 'Jam ke 7 (11.35 - 12.15)';
                } else if ($verifikasi_validasi->selesai_jam == 'istirahat-2') {
                    echo 'Istirahat / Solat Dzuhur (12.15 - 12.50)';
                } else if ($verifikasi_validasi->selesai_jam == 8) {
                    echo 'Jam ke 8 (12.50 - 13.30)';
                } else if ($verifikasi_validasi->selesai_jam == 9) {
                    echo 'Jam ke 9 (13.30 - 14.10)';
                } else if ($verifikasi_validasi->selesai_jam == 10) {
                    echo 'Jam ke 10 (14.10 - 14.50)';
                } else if ($verifikasi_validasi->selesai_jam == 11) {
                    echo 'Jam ke 11 (14.50 - 13.30)';
                } else if ($verifikasi_validasi->selesai_jam == 'tidak_kembali') {
                    echo 'Tidak kembali ke sekolah';
                }
            ?></p>
            </div>
            <p style="margin-top: 8.5px; margin-bottom: 0;">Untuk itu, kami mohon izin untuk tidak mengikuti kegiatan belajar mengajar selama periode ini agar dapat melaksanakan keperluan <?= $verifikasi_validasi->keperluan ?> dengan baik.</p>
            <p  style="margin-top: 8.5px;">Atas perhatian dan pengertiannya, kami mengucapkan terima kasih.</p>
        </div>

        <table style="width: 100%;" class="tanda_tangan">
            <tr>
                <td style="width:70%">
                    <p>Mengetahui</p>
                    <p>Guru Mapel</p>
                    <br><br><br>
                    <p><?=  $selected_guru ?></p>
                    <p>NIP : <?= isset($guru_mapel) ? $guru_mapel->nip : 'Tidak tersedia' ?></p>
                </td>
                <td style="width:30%">
                    <p>Mengetahui</p>
                    <p>Guru Piket</p>
                    <br><br><br>
                    <p><?=  $selected_guru_piket ?></p>
                    <p>NIP : <?= isset($guru_piket) ? $guru_piket->nip : 'Tidak tersedia' ?></p>
                </td>
            </tr>
        </table>
    </body>
</html>
