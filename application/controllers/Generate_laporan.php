<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('encryption');		
		if ($this->session->userdata('isLogin')==false) {
			redirect('login');
		}
	}

    public function index()
    {
        $data['app_title'] = 'Generate Laporan';
		$data['app_url'] = base_url('generate_laporan');

        $this->db->select('tbl_pengajuan_d.*, users.nama_lengkap');
        $this->db->from('tbl_pengajuan_d');
        $this->db->join('users', 'tbl_pengajuan_d.nis = users.nis', 'left');
        $this->db->order_by('tbl_pengajuan_d.id_pengajuan', 'DESC'); 
        $data['generate_laporan'] = $this->db->get()->result();

        $this->template->admin('generate_laporan/index', $data);
    }

	public function select($id_users)
	{
		return $this->db->get_where('users', array('id_users' => $id_users))->row();
	}

    public function pdfPrint()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        if (!empty($start_date) && !empty($end_date)) {
            $this->db->select('tbl_pengajuan_d.*, users.nama_lengkap');
            $this->db->from('tbl_pengajuan_d');
            $this->db->join('users', 'tbl_pengajuan_d.nis = users.nis', 'left');
            $this->db->where('tbl_pengajuan_d.tgl_pengajuan >=', $start_date);
            $this->db->where('tbl_pengajuan_d.tgl_pengajuan <=', $end_date);
            $this->db->order_by('tbl_pengajuan_d.id_pengajuan', 'DESC'); 
            $data['generate_laporan'] = $this->db->get()->result();
        } else {
            $this->db->select('tbl_pengajuan_d.*, users.nama_lengkap');
            $this->db->from('tbl_pengajuan_d');
            $this->db->join('users', 'tbl_pengajuan_d.nis = users.nis', 'left');
            $this->db->order_by('tbl_pengajuan_d.id_pengajuan', 'DESC'); 
            $data['generate_laporan'] = $this->db->get()->result();
        }

        $this->data['generate_laporan'] = $data['generate_laporan'];
        $this->data['title_pdf'] = 'Data Generate Laporan Dispensasi';

        $this->data['start_date'] = $start_date;
        $this->data['end_date'] = $end_date;

        $file_pdf = 'Generate Laporan Dispensasi';
        $paper = 'A4';
        $orientation = "portrait";
        $html = $this->load->view('generate_laporan/pdf_view', $this->data, true);

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }


    public function exportExcel() 
	{
        $this->db->select('nama_lengkap, kelas, jurusan, tgl_pengajuan, mulai_jam, selesai_jam, guru_mapel, keperluan');
        $this->db->from('tbl_pengajuan_d');
        $this->db->order_by('id_pengajuan', 'DESC');
        $query = $this->db->get();
        $data_dispensasi = $query->result();
	
		$object = new PHPExcel();
	
		$object->getProperties()->setCreator('SIM E-Dispensasi');
		$object->getProperties()->setLastModifiedBy('Excel Export');
		$object->getProperties()->setTitle('Data Dispensasi');
	
		$object->setActiveSheetIndex(0);
	
		$object->getActiveSheet()->setCellValue('A1', 'No');
		$object->getActiveSheet()->setCellValue('B1', 'Nama');
		$object->getActiveSheet()->setCellValue('C1', 'Kelas');
		$object->getActiveSheet()->setCellValue('D1', 'Jurusan');
		$object->getActiveSheet()->setCellValue('E1', 'Tanggal');
		$object->getActiveSheet()->setCellValue('F1', 'Mulai Jam ke');
		$object->getActiveSheet()->setCellValue('G1', 'Selesai Jam ke');
		$object->getActiveSheet()->setCellValue('H1', 'Guru Mapel Mengajar');
		$object->getActiveSheet()->setCellValue('I1', 'Keperluan');
	
		$headerStyleArray = array(
			'font' => array('bold' => true, 'color' => array('rgb' => 'FFFFFF')),
			'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '0000FF')),
			'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
		);
	
		$object->getActiveSheet()->getStyle('A1:I1')->applyFromArray($headerStyleArray);
	
		$object->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$object->getActiveSheet()->getColumnDimension('B')->setWidth(35);
		$object->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$object->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$object->getActiveSheet()->getColumnDimension('E')->setWidth(25);
		$object->getActiveSheet()->getColumnDimension('F')->setWidth(37);
		$object->getActiveSheet()->getColumnDimension('G')->setWidth(37);
		$object->getActiveSheet()->getColumnDimension('H')->setWidth(33);
		$object->getActiveSheet()->getColumnDimension('I')->setWidth(40);
	
		$baris = 2;
		$no = 1;
	
		foreach ($data_dispensasi as $s) {
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $s->nama_lengkap);
            $object->getActiveSheet()->setCellValue('C'.$baris, strtoupper($s->kelas));
            if ($s->jurusan == 'dpib') {
                $jurusanMemilih = 'DPIB / TGB';
            } else if ($s->jurusan == 'tbs') {
                $jurusanMemilih = 'TBS / BSN';
            } else if ($s->jurusan == 'tkro') {
                $jurusanMemilih = 'TKRO / TKR';
            } else if ($s->jurusan == 'mm') {
                $jurusanMemilih = 'MM / BCF';
            } else if ($s->jurusan == 'tkj') {
                $jurusanMemilih = 'TKJ / TJKT';
            } else if ($s->jurusan == 'rpl') {
                $jurusanMemilih = 'RPL / PPLG';
            } else if ($s->jurusan == 'tbo') {
                $jurusanMemilih = 'TBO / TO';
            } else {
              'Tidak Memilih';
            }

            $object->getActiveSheet()->setCellValue('D'.$baris, $jurusanMemilih); 
			$object->getActiveSheet()->setCellValue('E'.$baris, date('d F Y', strtotime($s->tgl_pengajuan)));

            if ($s->mulai_jam == 1) {
                $jamMulai = 'Jam ke 1 (07.30 - 08.00)';
            } elseif ($s->mulai_jam == 2) {
                $jamMulai = 'Jam ke 2 (08.00 - 08.40)';
            } elseif ($s->mulai_jam == 3) {
                $jamMulai = 'Jam ke 3 (08.40 - 09.20)';
            } elseif ($s->mulai_jam == 'istirahat-1') {
                $jamMulai = 'Istirahat (09.20 - 09.35)';
            } elseif ($s->mulai_jam == 4) {
                $jamMulai = 'Jam ke 4 (09.35 - 10.15)';
            } elseif ($s->mulai_jam == 5) {
                $jamMulai = 'Jam ke 5 (10.15 - 10.55)';
            } elseif ($s->mulai_jam == 6) {
                $jamMulai = 'Jam ke 6 (10.55 - 11.35)';
            } elseif ($s->mulai_jam == 7) {
                $jamMulai = 'Jam ke 7 (11.35 - 12.15)';
            } elseif ($s->mulai_jam == 'istirahat-2') {
                $jamMulai = 'Istirahat / Solat Dzuhur (12.15 - 12.50)';
            } elseif ($s->mulai_jam == 8) {
                $jamMulai = 'Jam ke 8 (12.50 - 13.30)';
            } elseif ($s->mulai_jam == 9) {
                $jamMulai = 'Jam ke 9 (13.30 - 14.10)';
            } elseif ($s->mulai_jam == 10) {
                $jamMulai = 'Jam ke 10 (14.10 - 14.50)';
            } elseif ($s->mulai_jam == 11) {
                $jamMulai = 'Jam ke 11 (14.50 - 15.30)';
            }
            
			$object->getActiveSheet()->setCellValue('F'.$baris, $jamMulai);

            if ($s->selesai_jam == 1) {
                $jamSelesai = 'Jam ke 1 (07.30 - 08.00)';
            } elseif ($s->selesai_jam == 2) {
                $jamSelesai = 'Jam ke 2 (08.00 - 08.40)';
            } elseif ($s->selesai_jam == 3) {
                $jamSelesai = 'Jam ke 3 (08.40 - 09.20)';
            } elseif ($s->selesai_jam == 'istirahat-1') {
                $jamSelesai = 'Istirahat (09.20 - 09.35)';
            } elseif ($s->selesai_jam == 4) {
                $jamSelesai = 'Jam ke 4 (09.35 - 10.15)';
            } elseif ($s->selesai_jam == 5) {
                $jamSelesai = 'Jam ke 5 (10.15 - 10.55)';
            } elseif ($s->selesai_jam == 6) {
                $jamSelesai = 'Jam ke 6 (10.55 - 11.35)';
            } elseif ($s->selesai_jam == 7) {
                $jamSelesai = 'Jam ke 7 (11.35 - 12.15)';
            } elseif ($s->selesai_jam == 'istirahat-2') {
                $jamSelesai = 'Istirahat / Solat Dzuhur (12.15 - 12.50)';
            } elseif ($s->selesai_jam == 8) {
                $jamSelesai = 'Jam ke 8 (12.50 - 13.30)';
            } elseif ($s->selesai_jam == 9) {
                $jamSelesai = 'Jam ke 9 (13.30 - 14.10)';
            } elseif ($s->selesai_jam == 10) {
                $jamSelesai = 'Jam ke 10 (14.10 - 14.50)';
            } elseif ($s->selesai_jam == 11) {
                $jamSelesai = 'Jam ke 11 (14.50 - 15.30)';
            }  else if ($s->selesai_jam == 'tidak_kembali') {
                $jamSelesai = 'Tidak kembali ke sekolah';
            }
            
            $object->getActiveSheet()->setCellValue('G'.$baris, $jamSelesai);

			$object->getActiveSheet()->setCellValue('H'.$baris, $s->guru_mapel);
			$object->getActiveSheet()->setCellValue('I'.$baris, $s->keperluan);
	
			$object->getActiveSheet()->getStyle('A'.$baris.':I'.$baris)->applyFromArray(
				array(
					'borders' => array(
						'allborders' => array(
							'style' => PHPExcel_Style_Border::BORDER_THIN
						)
					)
				)
			);
	
			$baris++;
		}
	
		$filename = 'Data_dispensasi.xlsx';
		$object->getActiveSheet()->setTitle('Data Dispensasi');
	
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename. '"');
		header('Cache-Control: max-age=0');
	
		$writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
		$writer->save('php://output');
	
		exit;
	}



    
	
}

