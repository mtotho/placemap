<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Audit_model extends CI_Model {

	function getResponses($markerid){

		$query = "select 
					response.pk_auditresponseid, response.fk_markerid, type.fld_questiontype, cat.fld_cattitle, cat.pk_auditcatid, 
					quest.fld_questiontext, response.fld_numericresponse, response.fld_textresponse 
					from tbl_audit_response response 
					inner join tbl_audit_question quest on response.fk_auditquestionid=quest.pk_auditquestionid
					inner join tbl_audit_questiontype type on response.fk_questiontypeid=type.pk_questiontypeid
					inner join tbl_audit_category cat on quest.fk_auditcatid=cat.pk_auditcatid
					where fk_markerid = ".$markerid."";
					
	
		$result = $this->db->query($query);

		return $result->result();
	}//end getResponses();

	function add($name, $desc, $email){
		$query = "insert into tbl_audit values('','".$email."', '".$name."', '".$desc."')";
		$this->db->query($query);
	}

	function listaudits(){
		$query = "select * from tbl_audit";
		$result = $this->db->query($query);

		return $result->result();
	}
	//function averageAudit($markerid){
	//	$responses = $this->getResponses($markerid);
	//	$categories = array();
	//	foreach($responses as $response){
		//	if($response['fld_questiontype']) == "Likert"){
	////			$categories[$response['pk_auditcatid']]
		//	}

	//	}
	//}//averageAudit

}

/* End of file audit_model.php */
/* Location: ./application/models/audit_model.php */