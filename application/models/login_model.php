<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	
	function setSession($userData){
		$this->session->set_userdata($userData);
	}

	function session_enforce($level, $redirect){

		$islogged = $this->session->userdata('isLoggedIn');
		$userlevel = $this->session->userdata('userlevel');
		if(!$islogged){
			header('Location: ' + site_url($redirect));
		}else{

			if($level == "admin" && $userlevel != "admin"){
				header('Location: ' + site_url($redirect));
			}
			if($level == "standard"){}

		}

		

	}
}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */