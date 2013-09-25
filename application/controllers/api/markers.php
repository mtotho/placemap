<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Markers extends CI_Controller {

	public function index(){}

	public function add(){
		$placeid = $this->input->post('placeid');
		$lat = $this->input->post("lat");
		$lng = $this->input->post("lng");

		$this->markers_model->add($placeid, $lat, $lng);
	}

	public function load(){
		$placeid = $this->input->post('placeid');
		$markers = $this->markers_model->load($placeid);
		//print_r($_POST);
		echo json_encode($markers);
	}
}

/* End of file markers.php */
/* Location: ./application/controllers/api/markers.php */