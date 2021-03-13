<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        //proteksi halaman
        $this->simple_login->cek_login();
        $this->load->model('pelanggan_model');
        $this->load->model('transaksi_model');
        $this->load->model('produk_model');
    }

    //Halaman dashboard
    public function index()
    {
        $data = array(
            'title' => 'Halaman Administrator',
            'total_pelanggan' => $this->pelanggan_model->total_pelanggan(),
            'total_transaksi' => $this->transaksi_model->total_transaksi(),
            'total_pr' => $this->produk_model->total_pr(),
            'isi' => 'admin//dashboard/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
