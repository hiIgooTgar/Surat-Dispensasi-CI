<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi_validasi extends CI_Controller {

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
        $data['app_title'] = 'Verifikasi dan Validasi';
        $data['app_url'] = base_url('verifikasi_validasi');
    
        $this->db->select('tbl_pengajuan_d.*, users.nama_lengkap');
        $this->db->from('tbl_pengajuan_d');
        $this->db->join('users', 'tbl_pengajuan_d.nis = users.nis', 'left');
        $this->db->order_by('tbl_pengajuan_d.id_pengajuan', 'ASC'); 
        $data['verifikasi_validasi'] = $this->db->get()->result();
    
        $this->template->admin('verifikasi_validasi/index', $data);
    }
    

    public function ditolak($id_pengajuan)
    {

        $data = array('status' => '0');
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('tbl_pengajuan_d', $data);

        $this->session->set_flashdata('notif', 'Pengajuan surat dispensasi ditolak!');
        $this->session->set_flashdata('sweet_alert', 'success');
        redirect('verifikasi_validasi');
    }

    public function diterima($id_pengajuan)
    {

        $data = array('status' => '2');
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('tbl_pengajuan_d', $data);

        $this->session->set_flashdata('notif', 'Pengajuan surat dispensasi diterima!');
        $this->session->set_flashdata('sweet_alert', 'success');
        redirect('verifikasi_validasi');
    }

    public function select($id_pengajuan)
	{
		return $this->db->get_where('tbl_pengajuan_d', array('id_pengajuan' => $id_pengajuan))->row();
	}

    public function show($id_pengajuan)
	{
		$data['app_title'] = 'Detail Pengajuan Surat Dispensasi';
		$data['app_url'] = base_url('verifikasi_validasi');
		$data['verifikasi_validasi'] = $this->select($id_pengajuan);
		$this->template->admin('verifikasi_validasi/detail', $data);
	}

    public function dicetak($id_pengajuan)
	{
		$data['app_title'] = 'Detail Pengajuan Surat Dispensasi';
		$data['app_url'] = base_url('verifikasi_validasi');
		$data['verifikasi_validasi'] = $this->select($id_pengajuan);
        $data['guru_mapel_list'] = $this->db->get('tbl_guru_mapel')->result();
        $data['guru_piket_list'] = $this->db->get('tbl_guru_piket')->result();

		$this->template->admin('verifikasi_validasi/cetak', $data);
	}
 
    public function cetakPDF()
    {
        $id_pengajuan = $this->input->post('id_pengajuan');
        $nama_guru = $this->input->post('nama_guru');
        $nama_guru_piket = $this->input->post('nama_guru_piket');

        $tahun_sekarang = date("Y");
        $data['tahun_sekarang'] = $tahun_sekarang;
    
        $this->db->select('*');
        $this->db->from('tbl_pengajuan_d');
        $this->db->where('id_pengajuan', $id_pengajuan);
        $query = $this->db->get();
    
        if ($query->num_rows() === 0) {
            redirect('verifikasi_validasi');
            return;
        }
    
        $data['verifikasi_validasi'] = $query->row();
        $data['selected_guru'] = $nama_guru;
        $data['selected_guru_piket'] = $nama_guru_piket;
    
        $guru_mapel = $this->db->get_where('tbl_guru_mapel', ['nama_guru' => $nama_guru])->row();
        $guru_piket = $this->db->get_where('tbl_guru_piket', ['nama_guru_piket' => $nama_guru_piket])->row();
    
        $data['guru_mapel'] = $guru_mapel;
        $data['guru_piket'] = $guru_piket;
        $data['title_pdf'] = 'Surat Dispensasi';
    
        $file_pdf = 'Surat Dispensasi PDF';
        $paper = 'A4';
        $orientation = "portrait";
        $html = $this->load->view('verifikasi_validasi/pdf_dispensasi', $data, true);
    
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
       
    public function destroy($id_pengajuan)
	{
		$this->db->delete('tbl_pengajuan_d', array('id_pengajuan' => $id_pengajuan));
		$this->session->set_flashdata('notif', 'Data pengajuan surat dispensasi berhasil dihapus!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('verifikasi_validasi');
	}

}

