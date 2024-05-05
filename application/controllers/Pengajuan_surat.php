<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('encryption');		
		if ($this->session->userdata('isLogin')==false) {
			redirect('login');
		}
	}

    private $table = "tbl_pengajuan_d";
 
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function index()
    {
        $data['app_title'] = 'Pengajuan Surat Dispensasi';
		$data['app_url'] = base_url('pengajuan_surat');
        $data['pengajuan_surat'] = $this->getAll();
        $this->template->admin('pengajuan_surat/index', $data);
    }

    public function create()
	{
		$data['app_title'] = 'Tambah Pengajuan Surat Dispensasi';
		$data['app_url'] = base_url('pengajuan_surat');
        $data['guru_mapel_list'] = $this->db->get('tbl_guru_mapel')->result();
		$this->template->admin('pengajuan_surat/create', $data);
	}

    public function storePengajuan()
    {
        $object = array(
			'nama_lengkap' => $this->session->userdata('nama_lengkap'),
			'nis' => $this->session->userdata('nis'),
			'kelas' => $this->session->userdata('kelas'),
			'jurusan' => $this->session->userdata('jurusan'),
			'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
			'mulai_jam' => $this->input->post('mulai_jam'),
			'selesai_jam' => $this->input->post('selesai_jam'),
			'guru_mapel' => $this->input->post('guru_mapel'),
			'keperluan' => $this->input->post('keperluan'),
			'status' => $this->input->post('status')
		);
		$this->db->insert('tbl_pengajuan_d', $object);
		$this->session->set_flashdata('notif', 'Data Pengajuan Surat Dispensasi berhasil ditambahkan! Tunggu balasan dari petugas');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('pengajuan_surat');
    }
    
	public function select($id_pengajuan)
	{
		return $this->db->get_where('tbl_pengajuan_d', array('id_pengajuan' => $id_pengajuan))->row();
	}

	public function show($id_pengajuan)
	{
        $data['app_title'] = 'Detail Laporan Pengaduan';
		$data['app_url'] = base_url('pengajuan_surat');
		$data['pengajuan_surat'] = $this->select($id_pengajuan);
		$this->template->admin('pengajuan_surat/detail', $data);
	}

    public function edit($id_pengajun)
	{
        $data['app_title'] = 'Edit Laporan Pengaduan';
		$data['app_url'] = base_url('pengajuan_surat');
		$data['pengajuan_surat'] = $this->select($id_pengajun);
        $data['guru_mapel_list'] = $this->db->get('tbl_guru_mapel')->result();
		$this->template->admin('pengajuan_surat/edit', $data);
	}

    public function update()
    {
        $object = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'nis' => $this->input->post('nis'),
			'kelas' => $this->input->post('kelas'),
			'jurusan' => $this->input->post('jurusan'),
			'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
			'mulai_jam' => $this->input->post('mulai_jam'),
			'selesai_jam' => $this->input->post('selesai_jam'),
			'guru_mapel' => $this->input->post('guru_mapel'),
			'keperluan' => $this->input->post('keperluan'),
		);
		$this->db->where('id_pengajuan', $this->input->post('id_pengajuan'));
		$this->db->update('tbl_pengajuan_d', $object );
		$this->session->set_flashdata('notif', 'Data Pengajuan Surat Dispensasi berhasil diubah!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('pengajuan_surat');
    }
    

    public function destroy($id_pengajuan) {
        $this->db->delete('tbl_pengajuan_d', array('id_pengajuan' => $id_pengajuan));
        $this->session->set_flashdata('notif', 'Data Pengajuan Surat Dispensasi berhasil dihapus!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('pengajuan_surat');
        
    }

}
