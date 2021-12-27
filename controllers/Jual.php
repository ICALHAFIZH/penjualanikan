<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jual extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('Jual_model', 'Barang_model', 'Pelanggan_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada jual model
		//function read berfungsi mengambil/read data dari table jual di database
		$data_jual = $this->Jual_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar jual',
						'theme_page' => 'jual_read',

						//data jual dikirim ke view
						'data_jual' => $data_jual
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function read_rekap() {
		//memanggil function read pada beli model
		//function read berfungsi mengambil/read data dari table beli di database
		$data_rekap_jual = $this->Jual_model->read_rekap();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar rekap penjualan',
						'theme_page' => 'jual_rekap',

						//data beli dikirim ke view
						'data_rekap_jual' => $data_rekap_jual
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengambil daftar barang dari table barang
		$data_barang = $this->Barang_model->read();
		$data_pelanggan = $this->Pelanggan_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Tambah jual',
						'theme_page' => 'jual_insert',

						//mengirim daftar barang ke view
						'data_barang' => $data_barang,
						'data_pelanggan' => $data_pelanggan,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		
		//menangkap data input dari view
		$pelanggan_id = $this->input->post('pelanggan_id');
		$barang_id = $this->input->post('barang_id');
		$tanggal = $this->input->post('tanggal');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');
		$total = $harga * $jumlah;
				
		//mengirim data ke model
		$input = array(
			//format : nama field/kolom table => data input dari view
			'pelanggan_id' => $pelanggan_id,
			'barang_id' => $barang_id,
			'tanggal' => $tanggal,
			'harga' => $harga,
			'jumlah' => $jumlah,
			'total' => $total,
		);
		
		
		$data_barang_single = $this->Barang_model->read_single($barang_id);
		// update stok barang 
        $updated_stok = $data_barang_single['stok'] - $jumlah;
        $data_barang = $this->Barang_model->update(['stok' => $updated_stok], $barang_id);

		//menghitung total
		$total = $jumlah * $harga;

		//memanggil function insert pada jual model
		//function insert berfungsi menyimpan/create data ke table jual di database
		$data_jual = $this->Jual_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('jual/read');
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);
		
		//function read berfungsi mengambil 1 data dari table jual sesuai id yg dipilih
		$data_jual_single = $this->Jual_model->read_single($id);

		//mengambil daftar barang dari table barang
		$data_barang = $this->Barang_model->read();
		$data_pelanggan = $this->Pelanggan_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Ubah jual',
						'theme_page' => 'jual_update',

						//mengirim data jual yang dipilih ke view
						'data_jual_single' => $data_jual_single,

						//mengirim daftar barang ke view
						'data_barang' => $data_barang,
						'data_pelanggan' => $data_pelanggan,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//menangkap data input dari view
		$pelanggan_id = $this->input->post('pelanggan_id');
		$barang_id = $this->input->post('barang_id');
		$tanggal = $this->input->post('tanggal');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');
		$total = $harga * $jumlah;

		//function read berfungsi mengambil 1 data dari table jual sesuai id yg dipilih
        $data_jual_single = $this->Jual_model->read_single($id);
		$data_barang_single = $this->Barang_model->read_single($data_jual_single['barang_id']);

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'pelanggan_id' => $pelanggan_id,
						'barang_id' => $barang_id,
						'tanggal' => $tanggal,
						'harga' => $harga,
						'jumlah' => $jumlah,
						'total' => $total,
						
					);

		// update stok barang 
        if ( $data_jual_single['jumlah'] < $jumlah) {
            $updated_stok = $data_barang_single['stok'] - ($jumlah -  $data_jual_single['jumlah']);
        } elseif ( $data_jual_single['jumlah'] > $jumlah) {
            $updated_stok = $data_barang_single['stok'] + ( $data_jual_single['jumlah'] - $jumlah);
        }
        $data_barang = $this->Barang_model->update(['stok' => $updated_stok], $barang_id);

		//memanggil function update pada jual model
		//function update berfungsi merubah data ke table jual di database
		$data_jual = $this->Jual_model->update($input, $id);

		//mengembalikan halaman ke function read
		redirect('jual/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table jual sesuai id yg dipilih
        $data_jual_single = $this->Jual_model->read_single($id);
		$data_barang_single = $this->Barang_model->read_single($data_jual_single['barang_id']);

        // membalikan jumlah stok barang
        $updated_stok = $data_barang_single['stok'] + $data_jual_single['jumlah'];
        $data_barang = $this->Barang_model->update(['stok' => $updated_stok], $data_jual_single['barang_id']);
		
		//memanggil function delete pada jual model
		$data_jual = $this->Jual_model->delete($id);
		//mengembalikan halaman ke function read
		redirect('jual/read');
	}

	public function read_export() {
		//memanggil function read pada jual model
		//function read berfungsi mengambil/read data dari table jual di database
		$data_jual = $this->Jual_model->read();
	
		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Daftar jual',

						//data jual dikirim ke view
						'data_jual' => $data_jual
					);

		//memanggil file view
		$this->load->view('jual_read_export', $output);
	}

	public function data_export() {
		//memanggil function read pada jual model
		//function read berfungsi mengambil/read data dari table jual di database
		$data_jual = $this->Jual_model->read();
	
		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Daftar jual',

						//data jual dikirim ke view
						'data_jual' => $data_jual
					);

		//memanggil file view
		$this->load->view('jual_data_export', $output);
	}

    // CHART
	public function chart_column() {
		//memanggil function read pada kota model
		//function read berfungsi mengambil/read data dari table kota di database
		$data_rekap_jual = $this->Jual_model->read_rekap();

		//mengirim data ke view
		$output = array(
			'judul' => 'Data Penjualan Barang',
			'data_rekap_jual' => $data_rekap_jual,
			'theme_page' => 'charts/column_jual',
		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function rekap_export() {
		//memanggil function read pada beli model
		//function read berfungsi mengambil/read data dari table beli di database
		$data_rekap_jual = $this->Jual_model->read_rekap();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar rekap penjualan',
					
						//data beli dikirim ke view
						'data_rekap_jual' => $data_rekap_jual
					);

		//memanggil file view
		$this->load->view('jual_rekap_export', $output);
	}
}
