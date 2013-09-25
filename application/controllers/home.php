<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {
	
	public function index()
	{
		$data['js'] = array('');


		$userData['email'] = 'dev@localhost.com';
		$userData['username'] = 'dev';
		$userData['userlevel'] = 'admin';
		$userData['isLoggedIn'] = TRUE;

		$this->login_model->setSession($userData);

		$this->load->view('view_header', $data);
		$this->load->view('view_home');
		$this->load->view('view_footer');
	}

	public function login(){

		

	}


	
}
