<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_guru extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('encryption');		
		if ($this->session->userdata('isLogin')==false) {
			redirect('login');
		}
	}

    private $table = "tbl_guru_mapel";
 
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function index()
    {
        $data['app_title'] = 'Data Guru Mapel';
		$data['app_url'] = base_url('data_guru');
        $data['guru'] = $this->getAll();
        $this->template->admin('data_guru/index', $data);
    }

	public function select($id_guru)
	{
		return $this->db->get_where('tbl_guru_mapel', array('id_guru' => $id_guru))->row();
	}

	public function show($id_guru)
	{
		$data['app_title'] = 'Detail Data Guru Mapel';
		$data['app_url'] = base_url('data_guru');
		$data['guru'] = $this->select($id_guru);
		$this->template->admin('data_guru/detail', $data);
	}

	public function create()
	{
		$data['app_title'] = 'Tambah Data Guru Mapel';
		$data['app_url'] = base_url('data_guru');
		$this->template->admin('data_guru/create', $data);
	}

	public function store()
	{
		$object = array(
			'nip' => $this->input->post('nip'),
			'nama_guru' => $this->input->post('nama_guru'),
			'mata_pelajaran' => $this->input->post('mata_pelajaran')
		);
		$this->db->insert('tbl_guru_mapel', $object);
		$this->session->set_flashdata('notif', 'Data berhasil ditambahkan!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('data_guru');
	}
    
	public function edit($id_guru)
	{
		$data['app_title'] = 'Edit Data Guru Mapel';
		$data['app_url'] = base_url('data_guru');
		$data['guru'] = $this->select($id_guru);
		$this->template->admin('data_guru/edit', $data);
	}

	public function update()
	{
		$object = array(
			'nip' => $this->input->post('nip'),
			'nama_guru' => $this->input->post('nama_guru'),
			'mata_pelajaran' => $this->input->post('mata_pelajaran')
		);
		$this->db->where('id_guru', $this->input->post('id_guru'));
		$this->db->update('tbl_guru_mapel', $object );
		$this->session->set_flashdata('notif', 'Data berhasil diubah!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('data_guru');
	}

	public function destroy($id_guru)
	{
		$this->db->delete('tbl_guru_mapel', array('id_guru' => $id_guru));
		$this->session->set_flashdata('notif', 'Data berhasil dihapus!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('data_guru');
	}
	
}

