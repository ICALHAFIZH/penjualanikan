<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model('Suplier_model');
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada suplier model
		//function read berfungsi mengambil/read data dari table suplier di database
		$data_suplier = $this->Suplier_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar suplier',
						'theme_page' => 'suplier_read',

						//data suplier dikirim ke view
						'data_suplier' => $data_suplier
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert(){
		//mengirim data ke view
		$output = array(
						'judul' => 'Tambah suplier',
						'theme_page' => 'suplier_insert',
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		//menangkap data input dari view
		$nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nama' => $nama,
                        'alamat' => $alamat,
                        'no_telp' => $no_telp,
					);

		//memanggil function insert pada suplier model
		//function insert berfungsi menyimpan/create data ke table suplier di database
		$data_suplier = $this->Suplier_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('suplier/read');
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);
		
		//function read berfungsi mengambil 1 data dari table suplier sesuai id yg dipilih
		$data_suplier_single = $this->Suplier_model->read_single($id);

		//mengirim data ke view
		$output = array(
						'judul' => 'Ubah suplier',
						'theme_page' => 'suplier_update',

						//mengirim data suplier yang dipilih ke view
						'data_suplier_single' => $data_suplier_single,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//menangkap data input dari view
		$nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nama' => $nama,
                        'alamat' => $alamat,
                        'no_telp' => $no_telp,
					);

		//memanggil function update pada suplier model
		//function update berfungsi merubah data ke table suplier di database
		$data_suplier = $this->Suplier_model->update($input, $id);

		//mengembalikan halaman ke function read
		redirect('suplier/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada suplier model
		$data_suplier = $this->Suplier_model->delete($id);

		//mengembalikan halaman ke function read
		redirect('suplier/read');
	}

	public function read_export() {
		//memanggil function read pada suplier model
		//function read berfungsi mengambil/read data dari table suplier di database
		$data_suplier = $this->Suplier_model->read();
	
		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Daftar suplier',

						//data suplier dikirim ke view
						'data_suplier' => $data_suplier
					);

		//memanggil file view
		$this->load->view('suplier_read_export', $output);
	}
	
	public function data_export() {
		//memanggil function read pada suplier model
		//function read berfungsi mengambil/read data dari table suplier di database
		$data_suplier = $this->Suplier_model->read();
	
		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Daftar suplier',

						//data suplier dikirim ke view
						'data_suplier' => $data_suplier
					);

		//memanggil file view
		$this->load->view('suplier_data_export', $output);
	}
}
