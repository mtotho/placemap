<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends CI_Controller {
	
	public function index()
	{
		$data['js'] = array('helpers.js','placemap/marker.js','placemap/auditmarker.js', 'placemap/map.js','placemap/placemapapi.js', 'placemap/init.js');

		$userData['email'] = 'dev@localhost.com';
		$userData['username'] = 'dev';
		$userData['userlevel'] = 'admin';
		$userData['isLoggedIn'] = TRUE;

		$this->login_model->setSession($userData);

		$this->load->view('view_header', $data);
		$this->load->view('view_map');
		$this->load->view('view_footer');
	}

		
}
