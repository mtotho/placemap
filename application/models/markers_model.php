<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Markers_model extends CI_Model {

	function add($placeid, $lat, $lng){
		$query = "insert into tbl_marker values('', ".$placeid.", ".$lat.", ".$lng.")";
		$this->db->query($query);
	}

	//load(): load all auditmarkers for the place
	function load($placeid){
		$query = "select * from tbl_marker where fk_placeid=".$placeid;
		$result = $this->db->query($query);

		return $result->result();
	}
}

/* End of file markers_model.php */
/* Location: ./application/models/markers_model.php */