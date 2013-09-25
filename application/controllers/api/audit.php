<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Audit extends CI_Controller {

	public function index(){}

	public function listaudits(){
		$audits = $this->audit_model->listaudits();
		$audits = json_encode($audits);

		echo $audits;
	}

	public function add(){
		$auditname = $this->input->post('name');
		$auditdesc = $this->input->post('desc');
		$email =$this->session->userdata('email');//$email = //$this->input->post('email');

		$this->audit_model->add($auditname, $auditdesc, $email);

	}

}

/* End of file audit.php */
/* Location: ./application/controllers/api/audit.php */