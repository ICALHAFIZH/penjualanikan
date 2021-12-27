<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beli extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('Beli_model', 'Barang_model', 'Suplier_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada beli model
		//function read berfungsi mengambil/read data dari table beli di database
		$data_beli = $this->Beli_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar beli',
						'theme_page' => 'beli_read',

						//data beli dikirim ke view
						'data_beli' => $data_beli
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function read_rekap() {
		//memanggil function read pada beli model
		//function read berfungsi mengambil/read data dari table beli di database
		$data_rekap_beli = $this->Beli_model->read_rekap();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar rekap pemebelian',
						'theme_page' => 'beli_rekap',

						//data beli dikirim ke view
						'data_rekap_beli' => $data_rekap_beli
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengambil daftar beli dari table beli
		$data_barang = $this->Barang_model->read();
		$data_suplier = $this->Suplier_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Tambah beli',
						'theme_page' => 'beli_insert',

						//mengirim daftar beli ke view
						'data_barang' => $data_barang,
						'data_suplier' => $data_suplier,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {

		//menangkap data input dari view
		$suplier_id = $this->input->post('suplier_id');
		$barang_id = $this->input->post('barang_id');
		$tanggal = $this->input->post('tanggal');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');
		//menghitun total
		$total = $harga * $jumlah;


		//proses multi query
		$this->db->trans_begin();

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'suplier_id' => $suplier_id,
						'barang_id' => $barang_id,
						'tanggal' => $tanggal,
						'harga' => $harga,
						'jumlah' => $jumlah,
						'total' => $total,
					);
					
		$data_barang_single = $this->Barang_model->read_single($barang_id);

		//update stok barang 
        $updated_stok = $data_barang_single['stok'] + $jumlah;
        $data_barang = $this->Barang_model->update(['stok' => $updated_stok], $barang_id);
		
		//memanggil function insert pada beli model
		//function insert berfungsi menyimpan/create data ke table beli di database
		$data_beli = $this->Beli_model->insert($input);

		//batalkan semua query (jika ada error)
		if ($this->db->trans_status() === FALSE) {
		    $this->db->trans_rollback();

		//execute semua query (jika tidak ada error)
		} else {
			$this->db->trans_commit();
		}

		//mengembalikan halaman ke function read
		redirect('beli/read');
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);
		
		//function read berfungsi mengambil 1 data dari table beli sesuai id yg dipilih
		$data_beli_single = $this->Beli_model->read_single($id);
		

		//mengambil daftar beli dari table beli
		$data_barang = $this->Barang_model->read();
		$data_suplier = $this->Suplier_model->read();


		//mengirim data ke view
		$output = array(
						'judul' => 'Ubah beli',
						'theme_page' => 'beli_update',

						//mengirim data beli yang dipilih ke view
						'data_beli_single' => $data_beli_single,

						//mengirim daftar beli ke view
						'data_barang' => $data_barang,
						'data_suplier' => $data_suplier,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);
		
		$data_beli_single = $this->Beli_model->read_single($id);
		$data_barang_single = $this->Barang_model->read_single($data_beli_single['barang_id']);
		
		//menangkap data input dari view
		$suplier_id = $this->input->post('suplier_id');
		$barang_id = $this->input->post('barang_id');
		$tanggal = $this->input->post('tanggal');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');
		//menghitun total
		$total = $harga * $jumlah;
		
		//proses multi query
		$this->db->trans_begin();

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'suplier_id' => $suplier_id,
						'barang_id' => $barang_id,
						'tanggal' => $tanggal,
						'harga' => $harga,
						'jumlah' => $jumlah,
						'total' => $total,
						
					);

		// update stok barang 
        if ( $data_beli_single['jumlah'] < $jumlah) {
            $updated_stok = $data_barang_single['stok'] + ($jumlah -  $data_beli_single['jumlah']);
        } elseif ( $data_beli_single['jumlah'] > $jumlah) {
            $updated_stok = $data_barang_single['stok'] - ( $data_beli_single['jumlah'] - $jumlah);
        }
        
		$data_barang = $this->Barang_model->update(['stok' => $updated_stok], $barang_id);
		
		//memanggil function update pada beli model
		//function update berfungsi merubah data ke table beli di database
		$data_beli = $this->Beli_model->update($input, $id);

		//batalkan semua query (jika ada error)
		if ($this->db->trans_status() === FALSE) {
		    $this->db->trans_rollback();

		//execute semua query (jika tidak ada error)
		} else {
			$this->db->trans_commit();
		}

		//mengembalikan halaman ke function read
		redirect('beli/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table jual sesuai id yg dipilih
		$data_beli_single = $this->Beli_model->read_single($id);
		$data_barang_single = $this->Barang_model->read_single($data_beli_single['barang_id']);

		// membalikan jumlah stok barang
        $updated_stok = $data_barang_single['stok'] - $data_beli_single['jumlah'];
        $data_barang = $this->Barang_model->update(['stok' => $updated_stok], $data_beli_single['barang_id']);

		//memanggil function delete pada beli model
		$data_beli = $this->Beli_model->delete($id);

		//mengembalikan halaman ke function read
		redirect('beli/read');
	}

	public function read_export() {
		//memanggil function read pada beli model
		//function read berfungsi mengambil/read data dari table beli di database
		$data_beli = $this->Beli_model->read();
	
		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Daftar beli',

						//data beli dikirim ke view
						'data_beli' => $data_beli
					);

		//memanggil file view
		$this->load->view('beli_read_export', $output);
	}

	public function data_export() {
		//memanggil function read pada beli model
		//function read berfungsi mengambil/read data dari table beli di database
		$data_beli = $this->Beli_model->read();
	
		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Daftar beli',

						//data beli dikirim ke view
						'data_beli' => $data_beli
					);

		//memanggil file view
		$this->load->view('beli_data_export', $output);
	}

	// CHART
	public function chart_column() {
		//memanggil function read pada kota model
		//function read berfungsi mengambil/read data dari table kota di database
		$data_rekap_beli = $this->Beli_model->read_rekap();

		//mengirim data ke view
		$output = array(
			'judul' => 'Data Rekap Pembelian Barang',
			'data_rekap_beli' => $data_rekap_beli,
			'theme_page' => 'charts/column_beli',
		);

		//memanggil file view 
		$this->load->view('theme/index', $output);
	}

	public function rekap_export() {
		//memanggil function read pada beli model
		//function read berfungsi mengambil/read data dari table beli di database
		$data_rekap_beli = $this->Beli_model->read_rekap();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar rekap pemebelian',

						//data beli dikirim ke view
						'data_rekap_beli' => $data_rekap_beli
					);

		//memanggil file view
		$this->load->view('beli_rekap_export', $output);
	}

}