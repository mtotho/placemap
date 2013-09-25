<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Places extends CI_Controller {

	public function index()
	{
		echo "places";
	}

	public function add(){
		$placename = $this->input->post('placename');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$zoom = $this->input->post('zoom');
		if($zoom==""){ //default zoom level
			$zoom=12;
		}
	
		$this->places_model->add($placename,$lat,$lng,$zoom);
		
	}

	public function listplaces(){
		$places = $this->places_model->listplaces();
		$places = json_encode($places);
		echo $places;
		//echo "list";
	}
}

/* End of file places.php */
/* Location: ./application/controllers/api/places.php */