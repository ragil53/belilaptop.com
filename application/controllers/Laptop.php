<?php
class Laptop extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_laptop');
	}
	function index(){
		$data ['laptop'] = $this->model_laptop->get_all_laptop();
		$this->load->view('laptop/laptop_view', $data);
	}
	public function laptop_add()
	{
		$data = array(
				'merk' => $this->input->post('merk'),
				'type' => $this->input->post('type'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),
		);

		$insert = $this->model_laptop->laptop_add($data);
		echo json_encode(array("status" => true));
	}

	public function edit_data($id)
	{
		$data = $this->model_laptop->get_by_id($id);
		echo json_encode($data);
	}

	public function update_data()
	{
		$data = array(
				'merk' => $this->input->post('merk'),
				'type' => $this->input->post('type'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),
		);
		$this->model_laptop->update_data(array('id_laptop'=>$this->input->post('id_laptop')), $data);
		echo json_encode(array("status"=>TRUE));
	}

	public function delete_laptop($id)
	{
		$this->model_laptop->delete_by_id($id);
		echo json_encode(array("status"=>TRUE));
	}
}