<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('encryption');		
		if ($this->session->userdata('isLogin')==false) {
			redirect('login');
		}
	}

    private $table = "users";
 
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function index()
    {
        $data['app_title'] = 'Data Siswa';
		$data['app_url'] = base_url('data_siswa');
        $data['siswa'] = $this->getAll();
        $this->template->admin('data_siswa/index', $data);
    }

	public function select($id_users)
	{
		return $this->db->get_where('users', array('id_users' => $id_users))->row();
	}

	public function show($id_users)
	{
		$data['app_title'] = 'Detail Data siswa';
		$data['app_url'] = base_url('data_siswa');
		$data['siswa'] = $this->select($id_users);
		$this->template->admin('data_siswa/detail', $data);
	}

	public function create()
	{
		$data['app_title'] = 'Tambah Data Siswa';
		$data['app_url'] = base_url('data_siswa');
		$this->template->admin('data_siswa/create', $data);
	}

	public function store()
	{
		$username = $this->input->post('username');

		$username_exists = $this->db->get_where('users', array('username' => $username))->row();

		if ($username_exists) {
			$this->session->set_flashdata('notif', 'Username sudah dipakai. Silakan pilih username lain.');
			$this->session->set_flashdata('sweet_alert', 'error');
			redirect('data_siswa');
		} else {
			$password = $this->encryption->encrypt($this->input->post('password'));

			$object = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'nis' => $this->input->post('nis'),
				'kelas' => $this->input->post('kelas'),
				'jurusan' => $this->input->post('jurusan'),
				'username' => $username,
				'password' => $password,
				'level' => 'siswa',
				'telp' => $this->input->post('telp'),
				'gender' => $this->input->post('gender'),
				'status' => $this->input->post('status')
			);

			$this->db->insert('users', $object);

			$this->session->set_flashdata('notif', 'Data siswa berhasil ditambahkan!');
			$this->session->set_flashdata('sweet_alert', 'success');
			redirect('data_siswa');
		}
	}

    
	public function edit($id_users)
	{
		$data['app_title'] = 'Edit Data Siswa';
		$data['app_url'] = base_url('data_siswa');
		$data['siswa'] = $this->select($id_users);
		$this->template->admin('data_siswa/edit', $data);
	}

	public function update()
	{
		$id_users = $this->input->post('id_users');
		$username = $this->input->post('username');

		$username_exists = $this->db->get_where('users', array('username' => $username, 'id_users !=' => $id_users))->row();

		if ($username_exists) {
			$this->session->set_flashdata('notif', 'Username sudah dipakai. Silakan pilih username lain.');
			$this->session->set_flashdata('sweet_alert', 'error');
			redirect('data_siswa');
		} else {
			$password = $this->encryption->encrypt($this->input->post('password'));

			$object = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'nis' => $this->input->post('nis'),
				'kelas' => $this->input->post('kelas'),
				'jurusan' => $this->input->post('jurusan'),
				'username' => $username,
				'password' => $password,
				'level' => 'siswa',
				'telp' => $this->input->post('telp'),
				'gender' => $this->input->post('gender'),
				'status' => $this->input->post('status')
			);

			$this->db->where('id_users', $id_users);
			$this->db->update('users', $object);
			$this->session->set_flashdata('notif', 'Data siswa berhasil diubah!');
			$this->session->set_flashdata('sweet_alert', 'success');
			redirect('data_siswa');
		}
	}


	public function destroy($id_users)
	{
		$this->db->delete('users', array('id_users' => $id_users));
		$this->session->set_flashdata('notif', 'Data siswa berhasil dihapus!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('data_siswa');
	}
	
}

