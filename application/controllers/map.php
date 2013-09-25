<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends CI_Controller {
	
	public function index()
	{
		$data['js'] = array('placemap/marker.js','placemap/auditmarker.js', 'placemap/map.js','placemap/placemapapi.js', 'placemap/init.js');

		$this->load->view('view_header', $data);
		$this->load->view('view_map');
		$this->load->view('view_footer');
	}

		
}
