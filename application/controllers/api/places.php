<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Places extends CI_Controller {

	public function index()
	{
		echo "places";
	}

	public function add(){
		$placename = $this->input->post('placename');
		$placedesc = $this->input->post('placedesc');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$zoom = $this->input->post('zoom');
		if($zoom==""){ //default zoom level
			$zoom=12;
		}
		$email = $this->session->userdata('email');
		$this->places_model->add($placename,$placedesc, $lat,$lng,$zoom, $email);
		
	}

	public function listplaces(){
		$places = $this->places_model->listplaces();
		$places = json_encode($places);
		echo $places;
		//echo "list";
	}

	public function getById(){
		$placeid = $this->input->post('placeid');
		$place = $this->places_model->getById($placeid);
		$place = json_encode($place);
		echo $place;
	}
}

/* End of file places.php */
/* Location: ./application/controllers/api/places.php */