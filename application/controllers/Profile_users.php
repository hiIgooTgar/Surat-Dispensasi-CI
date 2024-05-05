<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_users extends CI_Controller {

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

    public function select($id_users)
	{
		return $this->db->get_where('users', array('id_users' => $id_users))->row();
	}

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->select($user_id); 

        $data['app_title'] = 'Profile User';
        $data['app_url'] = base_url('profile_users');
        $this->template->admin('profile_users/index', $data);
    }

	public function updateUser()
	{
		$user_id = $this->session->userdata('user_id');
		$user = $this->select($user_id);

		// Retrieve data from the form
		$nama_lengkap = $this->input->post('nama_lengkap');
		$nis = $this->input->post('nis');
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$telp = $this->input->post('telp');
		$gender = $this->input->post('gender');

		$data = array(
			'nama_lengkap' => $nama_lengkap,
			'nis' => $nis,
			'kelas' => $kelas,
			'jurusan' => $jurusan,
			'telp' => $telp,
			'gender' => $gender
		);

		$this->db->where('id_users', $user_id);
		$this->db->update('users', $data);

		$user = $this->select($user_id);
		$this->session->set_userdata('nama_lengkap', $user->nama_lengkap);
		$this->session->set_userdata('nis', $user->nis);
		$this->session->set_userdata('kelas', $user->kelas);
		$this->session->set_userdata('jurusan', $user->jurusan);
		$this->session->set_userdata('telp', $user->telp);
		$this->session->set_userdata('gender', $user->gender);

		$this->session->set_flashdata('notif', 'Data user berhasil diupdate');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('profile_users');
	}
}