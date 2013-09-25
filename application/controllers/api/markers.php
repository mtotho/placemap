<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Markers extends CI_Controller {

	public function index(){}

	public function add(){
		$placeid = $this->input->post('placeid');
		$lat = $this->input->post("lat");
		$lng = $this->input->post("lng");
		$email =$this->session->userdata('email');//= $this->input->post("email");

		$this->markers_model->add($placeid, $email, $lat, $lng);
	}

	public function load(){
		$placeid = $this->input->post('placeid');
		$markers = $this->markers_model->load($placeid);
		//print_r($_POST);
		echo json_encode($markers);
	}

	public function test(){
		print_r($this->audit_model->getResponses(2));
	}
}

/* End of file markers.php */
/* Location: ./application/controllers/api/markers.php */