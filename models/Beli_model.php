<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beli_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table beli di database
	public function read($suplier_id='',$barang_id='') {

		//sql read
        $this->db->select('beli.*');
        $this->db->select('suplier.id AS suplier_id');
        $this->db->select('barang.nama AS nama_barang');
        $this->db->from('beli');
        $this->db->join('suplier', 'beli.suplier_id = suplier.id');
        $this->db->join('barang', 'beli.barang_id = barang.id');

        //filter data sesuai id yang dikirim dari controller
		if(($suplier_id != '') AND ($barang_id != '')) {
			$this->db->where('beli.suplier_id', $suplier_id);
            $this->db->where('beli.barang_id', $barang_id);
		}

        $this->db->order_by('beli.suplier_id ASC');
        $this->db->order_by('beli.barang_id ASC');

		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table beli di database
	public function read_single($id) {

		//sql read
		$this->db->select('*');
		$this->db->from('beli');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table beli di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('beli', $input);
	}

	//function update berfungsi merubah data ke table beli di database
	public function update($input, $id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		//$input = data yang dikirim dari controller
		return $this->db->update('beli', $input);
	}

	//function delete berfungsi menghapus data dari table beli di database
	public function delete($id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('id', $id);
		return $this->db->delete('beli');
	}

	public function read_rekap() {
		
		//sql read
		$this->db->select('beli.*');
		$this->db->select('SUM(beli.total) AS total_pertanggal');
		$this->db->from('beli');
		$this->db->group_by('tanggal');

		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}
}