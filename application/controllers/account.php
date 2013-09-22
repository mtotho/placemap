<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require "application/third_party/lightopenid/openid.php";

class Account extends CI_Controller {

	public function index()
	{
		
	}

	public function login(){
		$data['js'] = array('');

		$this->load->view('view_header', $data);
		$this->load->view('account/view_login');
		$this->load->view('view_footer');
	}
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */