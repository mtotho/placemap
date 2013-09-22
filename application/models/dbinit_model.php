<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dbinit_model extends CI_Model {

	function createTables(){

		$this->tables = array(
			'tbl_user'=>"CREATE TABLE if not exists tbl_user ( 
			pk_email             VARCHAR( 100 ) NOT NULL,
			fld_joindate        DATETIME,
			CONSTRAINT pk_tbl_user PRIMARY KEY ( pk_email ));"
	
			
		);//end tables

		foreach($this->tables as $table){
			$this->db->query($table);
		}
	}//end create tables

	function deleteTables(){
		$this->db->query("DROP TABLE tbl_user");
	}
}

/* End of file dbinit_model.php */
/* Location: ./application/models/dbinit_model.php */