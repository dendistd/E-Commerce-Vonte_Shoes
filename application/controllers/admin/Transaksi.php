<?php

class Transaksi extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('konfigurasi_model');
	}

	// Load data transaksi
	public function index()
	{
		$header_transaksi = $this->header_transaksi_model->listing();
		$data = array(	'title' 			=> 'Data Transaksi',
						'header_transaksi'	=> $header_transaksi,
						'isi'				=> 'admin/transaksi/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Detail
	public function detail($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(	'title' 			=> 'Detail Transaksi', 
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'isi'				=> 'admin/transaksi/detail'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Cetak
	public function cetak($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi_model->listing();

		$data = array(	'title' 			=> 'Detail Transaksi', 
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site
					);
		$this->load->view('admin/transaksi/cetak', $data, FALSE);
	}

	// Unduh pdf laporan
	public function pdf($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi_model->listing();

		$data = array(	'title' 			=> 'Detail Transaksi', 
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site
					);
		// $this->load->view('admin/transaksi/cetak', $data, FALSE);
		$html = $this->load->view('admin/transaksi/cetak', $data, true);
		$mpdf = new \Mpdf\Mpdf();
		// Write some HTML code:
		$mpdf->WriteHTML($html);
		// Output a PDF file directly to the browser
		$nama_file_pdf = 'detail-transaksi-'.$kode_transaksi.'.pdf';
		$mpdf->Output($nama_file_pdf,'I');
	}

	// Unduh pengiriman
	public function kirim($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi_model->listing();

		$data = array(	'title' 			=> 'Detail Transaksi', 
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site
					);
		// $this->load->view('admin/transaksi/cetak', $data, FALSE);
		$html = $this->load->view('admin/transaksi/kirim', $data, true);
		$mpdf = new \Mpdf\Mpdf();
		// SETTING HEADER DAN FOOTER
		$mpdf->SetHTMLHeader('
		<div style="text-align: left; font-weight: bold;">
		    <img src="'.base_url('assets/upload/image/'.$site->logo).'" style="height: 40px; width: auto;">
		</div>');
		$mpdf->SetHTMLFooter('
			<div style="padding: 10px 20px; border: solid thin #000; background-color: orange;color: white; font-size: 12px; text-align: center;">'.$site->namaweb.
				'<br>Alamat:  '.$site->alamat.'<br>
				Telepon: '.$site->telepon.'
			</div>
		');
		// END SETTING HEADER DAN FOOTER
		// Write some HTML code:
		$mpdf->WriteHTML($html);
		// Output tampil dengan nama baru
		$nama_file_pdf = url_title($site->namaweb,'dash','true').'-'.$kode_transaksi.'.pdf';
		$mpdf->Output($nama_file_pdf,'I');
	}
	// Status Transaksi
	public function status($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi_model->listing();
		$rekening 			= $this->rekening_model->listing();

		// Validasi input
		$valid 		= $this->form_validation;

		$valid->set_rules('nama_bank','Nama Bank','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('rekening_pembayaran','Nomor Rekening','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('rekening_pelanggan','Nama Pemilik Rekening','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('tanggal_bayar','Tanggal Pembayaran','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('jumlah_bayar','Jumlah Pembayaran','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()) {
			// Check jika gambar diganti 
			if(!empty($_FILES['bukti_bayar']['name'])) {

			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400';//Dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti_bayar')){	
		// End validasi


		$data = array(	'title'				=> 'Status Transaksi',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site,
						'rekening'          => $rekening,
						'error'				=> $this->upload->display_errors(),
						'isi'               => 'admin/transaksi/status'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			// Create thumbnail gambar
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			// Lokasi folder thumbail
			$config['new_image']		= './assets/upload/image/thumbs/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250;//Pixel
			$config['height']       	= 250;//Pixel
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// End create thumbnail

			$i = $this->input;

			$data = array(	'id_header_transaksi'	=> $header_transaksi->id_header_transaksi,
							'status_bayar'          => $i->post('status_bayar'),
							'jumlah_bayar'			=> $i->post('jumlah_bayar'),
							'rekening_pembayaran'	=> $i->post('rekening_pembayaran'),
							'rekening_pelanggan'	=> $i->post('rekening_pelanggan'),
							'bukti_bayar'			=> $upload_gambar['upload_data']['file_name'],
							'id_rekening'			=> $i->post('id_rekening'),
							'tanggal_bayar'			=> $i->post('tanggal_bayar'),
							'nama_bank'				=> $i->post('nama_bank')
						);
			$this->header_transaksi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
			redirect(base_url('admin/transaksi'),'refresh');
		}}else{
			// Edit produk tanpa ganti gambar
			$i = $this->input;

			$data = array(	'id_header_transaksi'	=> $header_transaksi->id_header_transaksi,
							'status_bayar'			=> $i->post('status_bayar'),
							'jumlah_bayar'			=> $i->post('jumlah_bayar'),
							'rekening_pembayaran'	=> $i->post('rekening_pembayaran'),
							'rekening_pelanggan'	=> $i->post('rekening_pelanggan'),
							//'bukti_bayar'			=> $upload_gambar['upload_data']['file_name'],
							'id_rekening'			=> $i->post('id_rekening'),
							'tanggal_bayar'			=> $i->post('tanggal_bayar'),
							'nama_bank'				=> $i->post('nama_bank')
						);
			$this->header_transaksi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
			redirect(base_url('admin/transaksi'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Status Transaksi',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site,
						'rekening'          => $rekening,
						'isi'               => 'admin/transaksi/status'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}
