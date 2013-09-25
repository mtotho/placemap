<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Places_model extends CI_Model {

	function add($placename, $lat, $lng, $zoom){
		$query = "insert into tbl_place values('','".$placename."','".$lat."','".$lng."','".$zoom."')";
		$this->db->query($query);
	}//end add

	function listplaces(){
		$query = "select * from tbl_place";
		$query = $this->db->query($query);

		return $query->result();
	}

}

/* End of file places_model.php */
/* Location: ./application/models/places_model.php */