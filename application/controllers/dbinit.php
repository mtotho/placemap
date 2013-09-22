<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dbinit extends CI_Controller {

	public function index()
	{
		$data['js'] = array('');

		$this->load->view('view_header', $data);
		$this->load->view('view_dbinit');
		$this->load->view('view_footer');
	}

	public function createTables(){
		$this->dbinit_model->createTables();
		Header('Location: '.site_url("dbinit"));
	}

	public function deleteTables(){
		$this->dbinit_model->deleteTables();
		Header('Location: '.site_url("dbinit"));
	}

}

/* End of file dbinit.php */
/* Location: ./application/controllers/dbinit.php */