<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_guru_piket extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('encryption');		
		if ($this->session->userdata('isLogin')==false) {
			redirect('login');
		}
	}

    private $table = "tbl_guru_piket";
 
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function index()
    {
        $data['app_title'] = 'Data Guru Piket';
		$data['app_url'] = base_url('data_guru_piket');
        $data['guru_piket'] = $this->getAll();
        $this->template->admin('data_guru_piket/index', $data);
    }

	public function select($id_guru_piket)
	{
		return $this->db->get_where('tbl_guru_piket', array('id_guru_piket' => $id_guru_piket))->row();
	}

	public function show($id_guru_piket)
	{
		$data['app_title'] = 'Detail Data Guru Piket';
		$data['app_url'] = base_url('data_guru_piket');
		$data['guru_piket'] = $this->select($id_guru_piket);
		$this->template->admin('data_guru_piket/detail', $data);
	}

	public function create()
	{
		$data['app_title'] = 'Tambah Data Guru Piket';
		$data['app_url'] = base_url('data_guru_piket');
		$this->template->admin('data_guru_piket/create', $data);
	}

	public function store()
	{
		$object = array(
			'nip' => $this->input->post('nip'),
			'nama_guru_piket' => $this->input->post('nama_guru_piket')
		);
		$this->db->insert('tbl_guru_piket', $object);
		$this->session->set_flashdata('notif', 'Data guru piket berhasil ditambahkan!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('data_guru_piket');
	}
    
	public function edit($id_guru_piket)
	{
		$data['app_title'] = 'Edit Data Guru Piket';
		$data['app_url'] = base_url('data_guru_piket');
		$data['guru_piket'] = $this->select($id_guru_piket);
		$this->template->admin('data_guru_piket/edit', $data);
	}

	public function update()
	{
		$object = array(
			'nip' => $this->input->post('nip'),
			'nama_guru_piket' => $this->input->post('nama_guru_piket')
		);
		$this->db->where('id_guru_piket', $this->input->post('id_guru_piket'));
		$this->db->update('tbl_guru_piket', $object );
		$this->session->set_flashdata('notif', 'Data guru piket berhasil diubah!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('data_guru_piket');
	}

	public function destroy($id_guru_piket)
	{
		$this->db->delete('tbl_guru_piket', array('id_guru_piket' => $id_guru_piket));
		$this->session->set_flashdata('notif', 'Data guru piket berhasil dihapus!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('data_guru_piket');
	}
	
}

