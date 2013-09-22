<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require "application/third_party/lightopenid/openid.php";

class Home extends CI_Controller {
	
	public function index()
	{
		$data['js'] = array('');

		$this->load->view('view_header', $data);
		$this->load->view('view_home');
		$this->load->view('view_footer');
	}

	public function login(){



	}


	
}
