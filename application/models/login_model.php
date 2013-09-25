<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	
	function setSession($userData){
		$this->session->set_userdata($userData);
	}
}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */