<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$userlevel = $this->session->userdata('userlevel');
		if($userlevel=="admin"){
			$data['js'] = array('placemap/placemapapi.js', 'admin.js');

			
			$this->load->view('view_header', $data);
			$this->load->view('view_admin');
			$this->load->view('view_footer');

		}else{
			header('Location: '.site_url());
		}
	}//index

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */