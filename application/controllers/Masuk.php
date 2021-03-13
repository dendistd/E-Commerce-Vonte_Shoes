<?php 

class Masuk extends CI_Controller{

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	
	}

	//Login Pelanggan
	public function index()
	{
		// validasi
		$this->form_validation->set_rules('email', 'Email (Username)', 'required',
			array(	'required'	=>	'%s harus diisi'));
		$this->form_validation->set_rules('password', 'Password', 'required',
			array(	'required'	=>	'%s harus diisi'));

		if ($this->form_validation->run()) 
		{
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');
			// proses kek simple login
			$this->simple_pelanggan->login($email, $password);
		}
		// end validasi

		$data = array ('title'					=> 'Login Pelanggan',
					   'isi'					=> 'masuk/list'
					  );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Logout
	public function logout()
	{
		// Ambil fungsi logout di Simple_pelanggan yang sudah diset di auto load libraries
		$this->simple_pelanggan->logout();

	}
}