<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('Barang_model', 'Kategori_barang_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada barang model
		//function read berfungsi mengambil/read data dari table barang di database
		$data_barang = $this->Barang_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar barang',
						'theme_page' => 'barang_read',

						//data barang dikirim ke view
						'data_barang' => $data_barang
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengambil daftar kategori_barang dari table kategori_barang
		$data_kategori_barang = $this->Kategori_barang_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Tambah barang',
						'theme_page' => 'barang_insert',

						//mengirim daftar kategori_barang ke view
						'data_kategori_barang' => $data_kategori_barang,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		//menangkap data input dari view
		$kategori_barang_id = $this->input->post('kategori_barang_id');
		$nama = $this->input->post('nama');
		$stok = $this->input->post('stok');
        $harga = $this->input->post('harga');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'kategori_barang_id' => $kategori_barang_id,
						'nama' => $nama,
						'stok' => $stok,
                        'harga' => $harga,
					);

		//memanggil function insert pada barang model
		//function insert berfungsi menyimpan/create data ke table barang di database
		$data_barang = $this->Barang_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('barang/read');
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);
		
		//function read berfungsi mengambil 1 data dari table barang sesuai id yg dipilih
		$data_barang_single = $this->Barang_model->read_single($id);

		//mengambil daftar kategori_barang dari table kategori_barang
		$data_kategori_barang = $this->Kategori_barang_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Ubah barang',
						'theme_page' => 'barang_update',

						//mengirim data barang yang dipilih ke view
						'data_barang_single' => $data_barang_single,

						//mengirim daftar kategori_barang ke view
						'data_kategori_barang' => $data_kategori_barang,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//menangkap data input dari view
		$kategori_barang_id = $this->input->post('kategori_barang_id');
		$nama = $this->input->post('nama');
		$stok = $this->input->post('stok');
        $harga = $this->input->post('harga');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'kategori_barang_id' => $kategori_barang_id,
						'nama' => $nama,
						'stok' => $stok,
                        'harga' => $harga,
					);

		//memanggil function update pada barang model
		//function update berfungsi merubah data ke table barang di database
		$data_barang = $this->Barang_model->update($input, $id);

		//mengembalikan halaman ke function read
		redirect('barang/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada barang model
		$data_barang = $this->Barang_model->delete($id);

		//mengembalikan halaman ke function read
		redirect('barang/read');
	}

	public function read_export() {
		//memanggil function read pada barang model
		//function read berfungsi mengambil/read data dari table barang di database
		$data_barang = $this->Barang_model->read();
	
		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Daftar barang',

						//data barang dikirim ke view
						'data_barang' => $data_barang
					);

		//memanggil file view
		$this->load->view('barang_read_export', $output);
	}

	public function data_export() {
		//memanggil function read pada barang model
		//function read berfungsi mengambil/read data dari table barang di database
		$data_barang = $this->Barang_model->read();
	
		//mengirim data ke view
		$output = array(
						//memanggil view
						'data' => 'Daftar barang',

						//data barang dikirim ke view
						'data_barang' => $data_barang
					);

		//memanggil file view
		$this->load->view('barang_data_export', $output);
	}

// CHART
	public function chart_column() {
		//memanggil function read pada kota model
		//function read berfungsi mengambil/read data dari table kota di database
		$data_barang = $this->Barang_model->read();

		//mengirim data ke view
		$output = array(
			'judul' => 'Data Stok Antar Barang',
			'data_barang' => $data_barang,
			'theme_page' => 'charts/column_barang',
		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}
		
// UPLOAD GAMBAR
	public function upload_form() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);
		
		//function read berfungsi mengambil 1 data dari table barang sesuai id yg dipilih
		$data_barang_single = $this->Barang_model->read_single($id);

		//mengambil daftar kategori_barang dari table kategori_barang
		$data_kategori_barang = $this->Kategori_barang_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Upload gambar barang',
						'theme_page' => 'gambar_upload',

						//mengirim data barang yang dipilih ke view
						'data_barang_single' => $data_barang_single,

						//mengirim daftar kategori_barang ke view
						'data_kategori_barang' => $data_kategori_barang,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function upload_submit() {

			//menangkap id data yg dipilih dari view (parameter get)
			$id = $this->uri->segment(3);

			//setting library upload
	        $config['upload_path']          = './upload_folder/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = 10000;
	        $config['encrypt_name']         = TRUE;
	        $this->load->library('upload', $config);

	        //jika gagal upload
	        if ( ! $this->upload->do_upload('userfile')) {

	        	//mengirim output ke view
                $output = array(
                				'nama' => 'Upload File',
								
                			);
                $this->load->view('upload', $output);

            //jika upload berhasil
	        } else {
	        	
	        	//respon upload berhasil 
	        	$upload_data = $this->upload->data();
	        	$file_name = $upload_data['file_name'];

				//mengirim input ke barang
				$input = array(
								'gambar' => $file_name,
											
				);

				$this->Barang_model->update($input, $id);
				
				//mengembalikan halaman ke function read
				redirect('barang/read');
	        }
	}
}
