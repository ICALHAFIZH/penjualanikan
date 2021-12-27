<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jual_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table jual di database
	public function read($pelanggan_id='',$barang_id='') {

		//sql read
        $this->db->select('jual.*');
        $this->db->select('pelanggan.id AS pelanggan_id');
        $this->db->select('barang.nama AS nama_barang');
        $this->db->from('jual');
        $this->db->join('pelanggan', 'jual.pelanggan_id = pelanggan.id');
        $this->db->join('barang', 'jual.barang_id = barang.id');

        //filter data sesuai id yang dikirim dari controller
		if(($pelanggan_id != '') AND ($barang_id != '')) {
			$this->db->where('jual.pelanggan_id', $pelanggan_id);
            $this->db->where('jual.barang_id', $barang_id);
		}

        $this->db->order_by('jual.pelanggan_id ASC');
        $this->db->order_by('jual.barang_id ASC');

		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table jual di database
	public function read_single($id) {

		//sql read
		$this->db->select('*');
		$this->db->from('jual');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table jual di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('jual', $input);
	}

	//function update berfungsi merubah data ke table jual di database
	public function update($input, $id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		//$input = data yang dikirim dari controller
		return $this->db->update('jual', $input);
	}

	//function delete berfungsi menghapus data dari table jual di database
	public function delete($id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('id', $id);
		return $this->db->delete('jual');
	}

	public function read_rekap() {
		
		//sql read
		$this->db->select('jual.*');
		$this->db->select('SUM(jual.total) AS total_pertanggal');
		$this->db->from('jual');
		$this->db->group_by('tanggal');

		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}  
}