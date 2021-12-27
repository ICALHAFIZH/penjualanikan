<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_barang extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model('Kategori_barang_model');
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada kategori_barang model
		//function read berfungsi mengambil/read data dari table kategori_barang di database
		$data_kategori_barang = $this->Kategori_barang_model->read();

		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Daftar Kategori barang',
						'theme_page' => 'kategori_barang_read',

						//data kategori_barang dikirim ke view
						'data_kategori_barang' => $data_kategori_barang
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function read_rekap() {
		//memanggil function read pada beli model
		//function read berfungsi mengambil/read data dari table beli di database
		$data_rekap_kategori_barang = $this->Kategori_barang_model->read_rekap();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar rekap jumlah barang per kategori',
						'theme_page' => 'kategori_barang_rekap',

						//data beli dikirim ke view
						'data_rekap_kategori_barang' => $data_rekap_kategori_barang
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Tambah Kategori barang',
						'theme_page' => 'kategori_barang_insert',
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		//menangkap data input dari view
		$nama = $this->input->post('nama');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nama' => $nama,
					);

		//memanggil function insert pada kategori_barang model
		//function insert berfungsi menyimpan/create data ke table kategori_barang di database
		$data_kategori_barang = $this->Kategori_barang_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('kategori_barang/read');
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table kategori_barang sesuai id yg dipilih
		$data_kategori_barang_single = $this->Kategori_barang_model->read_single($id);

		//mengirim data ke view
		$output = array(
						'judul' => 'Ubah Kategori barang',
						'theme_page' => 'kategori_barang_update',

						//mengirim data kategori_barang yang dipilih ke view
						'data_kategori_barang_single' => $data_kategori_barang_single,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//menangkap data input dari view
		$nama = $this->input->post('nama');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nama' => $nama,
					);

		//memanggil function insert pada kategori_barang model
		//function insert berfungsi menyimpan/create data ke table kategori_barang di database
		$data_kategori_barang = $this->Kategori_barang_model->update($input, $id);

		//mengembalikan halaman ke function read
		redirect('kategori_barang/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada kategori_barang model
		$data_kategori_barang = $this->Kategori_barang_model->delete($id);

		//mengembalikan halaman ke function read
		redirect('kategori_barang/read');
	}
	
	public function read_export() {
		//memanggil function read pada kategori_barang model
		//function read berfungsi mengambil/read data dari table kategori_barang di database
		$data_kategori_barang = $this->Kategori_barang_model->read();
	
		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Daftar Kategori barang',

						//data kategori_barang dikirim ke view
						'data_kategori_barang' => $data_kategori_barang
					);

		//memanggil file view
		$this->load->view('kategori_barang_read_export', $output);
	}
	
	public function data_export() {
		//memanggil function read pada kategori_barang model
		//function read berfungsi mengambil/read data dari table kategori_barang di database
		$data_kategori_barang = $this->Kategori_barang_model->read();
	
		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Daftar Kategori barang',

						//data kategori_barang dikirim ke view
						'data_kategori_barang' => $data_kategori_barang
					);

		//memanggil file view
		$this->load->view('kategori_barang_data_export', $output);
	}

	// CHART
	public function chart_pie() {
		//memanggil function read pada kota model
		//function read berfungsi mengambil/read data dari table kota di database
		$data_rekap_kategori_barang = $this->Kategori_barang_model->read_rekap();

		//mengirim data ke view
		$output = array(
			'judul' => 'Data Rekap Barang per Kategori',
			'data_rekap_kategori_barang' => $data_rekap_kategori_barang,
			'theme_page' => 'charts/pie_kategori_barang',
		);

		//memanggil file view 
		$this->load->view('theme/index', $output);
	}


}