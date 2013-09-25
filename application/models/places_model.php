<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Places_model extends CI_Model {

	function add($placename, $placedesc, $lat, $lng, $zoom, $email){
		$query = "insert into tbl_place values('','".$placename."', '".$placedesc."','".$lat."','".$lng."','".$zoom."', '".$email."')";
		$this->db->query($query);
	}//end add

	function listplaces(){
		$query = "select * from tbl_place";
		$query = $this->db->query($query);

		return $query->result();
	}

	function getById($placeid){
		$query = "select * from tbl_place where pk_placeid='".$placeid."'";
		$query = $this->db->query($query);

		return $query->row();
	}

}

/* End of file places_model.php */
/* Location: ./application/models/places_model.php */