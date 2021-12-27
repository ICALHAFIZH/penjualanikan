<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model('Pelanggan_model');
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada pelanggan model
		//function read berfungsi mengambil/read data dari table pelanggan di database
		$data_pelanggan = $this->Pelanggan_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar pelanggan',
						'theme_page' => 'pelanggan_read',

						//data pelanggan dikirim ke view
						'data_pelanggan' => $data_pelanggan
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert(){
		//mengirim data ke view
		$output = array(
						'judul' => 'Tambah pelanggan',
						'theme_page' => 'pelanggan_insert',
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		//menangkap data input dari view
		$nama = $this->input->post('nama');
		$gender = $this->input->post('gender');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nama' => $nama,
						'gender' => $gender,
                        'alamat' => $alamat,
                        'no_telp' => $no_telp,
					);

		//memanggil function insert pada pelanggan model
		//function insert berfungsi menyimpan/create data ke table pelanggan di database
		$data_pelanggan = $this->Pelanggan_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('pelanggan/read');
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);
		
		//function read berfungsi mengambil 1 data dari table pelanggan sesuai id yg dipilih
		$data_pelanggan_single = $this->Pelanggan_model->read_single($id);

		//mengirim data ke view
		$output = array(
						'judul' => 'Ubah pelanggan',
						'theme_page' => 'pelanggan_update',

						//mengirim data pelanggan yang dipilih ke view
						'data_pelanggan_single' => $data_pelanggan_single,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//menangkap data input dari view
		$nama = $this->input->post('nama');
		$gender = $this->input->post('gender');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nama' => $nama,
						'gender' => $gender,
                        'alamat' => $alamat,
                        'no_telp' => $no_telp,
					);

		//memanggil function update pada pelanggan model
		//function update berfungsi merubah data ke table pelanggan di database
		$data_pelanggan = $this->Pelanggan_model->update($input, $id);

		//mengembalikan halaman ke function read
		redirect('pelanggan/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada pelanggan model
		$data_pelanggan = $this->Pelanggan_model->delete($id);

		//mengembalikan halaman ke function read
		redirect('pelanggan/read');
	}

	public function read_export() {
		//memanggil function read pada pelanggan model
		//function read berfungsi mengambil/read data dari table pelanggan di database
		$data_pelanggan = $this->Pelanggan_model->read();
	
		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Daftar pelanggan',

						//data pelanggan dikirim ke view
						'data_pelanggan' => $data_pelanggan
					);

		//memanggil file view
		$this->load->view('pelanggan_read_export', $output);
	}
	
	public function data_export() {
		//memanggil function read pada pelanggan model
		//function read berfungsi mengambil/read data dari table pelanggan di database
		$data_pelanggan = $this->Pelanggan_model->read();
	
		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Daftar pelanggan',

						//data pelanggan dikirim ke view
						'data_pelanggan' => $data_pelanggan
					);

		//memanggil file view
		$this->load->view('pelanggan_data_export', $output);
	}
}
