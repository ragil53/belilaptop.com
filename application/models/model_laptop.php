<?php

class Model_laptop extends CI_Model {
	var $table = 'tb_laptop';

	public function laptop_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function get_all_laptop()
	{
		$this->db->from('tb_laptop');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_by_id($id)
	{
		$this->db->form($this->table);
		$this->db->where('id_laptop', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_laptop', $id);
		$this->db->delete($this->table);
	}
}
