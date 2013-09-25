<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dbinit_model extends CI_Model {

	function createTables(){

		$this->tables = array(
			'tbl_user'=>"CREATE TABLE if not exists tbl_user ( 
					pk_email             VARCHAR( 100 ) NOT NULL,
					fld_joindate        DATETIME,
					fld_username 		VARCHAR(100) NOT NULL,
					fld_userlevel       VARCHAR(20) NOT NULL,
					CONSTRAINT pk_tbl_user PRIMARY KEY ( pk_email ));",

			'tbl_place'=>"CREATE TABLE IF NOT exists tbl_place(
					pk_placeid  int auto_increment not null,
					fld_placename varchar(100) not null,
					fld_placedesc varchar(200) not null,
					fld_lat DOUBLE not null,
					fld_lng DOUBLE not null,
					fld_zoom int not null,
					fk_email varchar(100) not null,
					CONSTRAINT pk_tbl_place PRIMARY KEY (pk_placeid));",
	
			'tbl_marker'=>"CREATE TABLE IF NOT exists tbl_marker(
					pk_markerid  int auto_increment not null,
					fk_placeid int not null,
					fk_email varchar(100) NOT NULL,
					fld_lat DOUBLE not null,
					fld_lng DOUBLE not null,
					CONSTRAINT pk_tbl_marker PRIMARY KEY (pk_markerid));",
		
			'tbl_audit'=>"CREATE TABLE IF NOT exists tbl_audit(
					pk_auditid  int auto_increment not null,
					fk_email varchar(100) not null,
					fld_auditname varchar(100) not null,
					fld_auditdesc varchar(1000) not null,
					CONSTRAINT pk_tbl_audit PRIMARY KEY (pk_auditid));",

			'tbl_audit_questiontype'=>"CREATE TABLE IF NOT exists tbl_audit_questiontype(
					pk_questiontypeid  int auto_increment not null,
					fld_questiontype varchar(100) not null,
					CONSTRAINT pk_tbl_audit_questiontype PRIMARY KEY (pk_questiontypeid));",

			'tbl_audit_category'=>"CREATE TABLE IF NOT exists tbl_audit_category(
					pk_auditcatid  int auto_increment not null,
					fk_auditid int not null,
					fld_cattitle varchar(50) not null,
					fld_order int not null,
					CONSTRAINT pk_tbl_audit_category PRIMARY KEY (pk_auditcatid));",

			//select all subcats and display them and text wo. If 
			'tbl_audit_question'=>"CREATE TABLE IF NOT exists tbl_audit_question(
					pk_auditquestionid  int auto_increment not null,
					fk_auditcatid int not null,
					fld_questiontext varchar(50) not null,
					fld_haschildren int not null,
					fld_order int not null,
					fk_questiontypeid int not null,
					CONSTRAINT pk_tbl_audit_question PRIMARY KEY (pk_auditquestionid));",

			'tbl_audit_subquestion'=>"CREATE TABLE IF NOT exists tbl_audit_subquestion(
					pk_auditsubquestid  int auto_increment not null,
					fk_auditquestionid int not null,
					fld_questiontext varchar(50) not null,
					fld_order int not null,
					CONSTRAINT pk_tbl_audit_subquestion PRIMARY KEY (pk_auditsubquestid));",

			'tbl_audit_response'=>"CREATE TABLE IF NOT exists tbl_audit_response(
					pk_auditresponseid  int auto_increment not null,
					fk_markerid int not null,
					fk_auditquestionid varchar(50) not null,
					fk_questiontypeid int not null,
					fld_numericresponse int,
					fld_textresponse varchar(1000),
					CONSTRAINT pk_tbl_audit_response PRIMARY KEY (pk_auditresponseid));",

			


		);//end tables

		foreach($this->tables as $table){
			$this->db->query($table);
		}
	}//end create tables

	function createData(){
		//User data
		$this->db->query("insert into tbl_user values('dev@localhost.com', now(), 'dev', 'admin')");

		//Place Data
		$this->db->query("insert into tbl_place values('', 'Lambertville','Town of lambertville', 40.36547932060214, -74.94623649215697, 15, 'dev@localhost.com')");
		$this->db->query("insert into tbl_place values('', 'Burlington','dtown burlinton', 44.48092227657163, -73.19803702926635, 15, 'dev@localhost.com')");

		//marker data
		$this->db->query("insert into tbl_marker values('', 2, 'dev@localhost.com', 44.48447401914481, -73.2026718864440)");
		$this->db->query("insert into tbl_marker values('', 1,'dev@localhost.com', 40.367506592823226, -74.94610774612426)");
		$this->db->query("insert into tbl_marker values('', 2, 'dev@localhost.com', 44.48239198937903, -73.19949615097045)");
		$this->db->query("insert into tbl_marker values('', 1, 'dev@localhost.com', 40.36734310538835, -74.94623649215697)");

		//audit
		$this->db->query("insert into tbl_audit values('','dev@localhost.com','Place','This audit examines the quality of the location in terms of its awesomeness')");

		//audit question types
		$this->db->query("insert into tbl_audit_questiontype values('', 'Likert')");
		$this->db->query("insert into tbl_audit_questiontype values('', 'Short Answer')");


		//audit categories
		$this->db->query("insert into tbl_audit_category values('','1', 'ACCESS, LINKAGES & INFORMATION', '1')");
		$this->db->query("insert into tbl_audit_category values('','1', 'COMFORT & IMAGE', '2')");
		$this->db->query("insert into tbl_audit_category values('','1', 'USES & ACTIVITIES', '3')");
		$this->db->query("insert into tbl_audit_category values('','1', 'SOCIABILITY', '4')");
		$this->db->query("insert into tbl_audit_category values('','1', 'Identify the Opportunities of this Place', '5')");

		//audit questions                 id, cat, text, haschildren, order, questiontypeid
		$this->db->query("insert into tbl_audit_question values('','1', 'Pedestrians can easily walk to and through the area.', '0', '1', '1')");
		$this->db->query("insert into tbl_audit_question values('','1', 'Pedestrian access is safe and convenient', '1', '2', '1')");
		$this->db->query("insert into tbl_audit_question values('','1', 'Automobiles do not detract from pedestrian experience', '0', '3', '1')");

		//sub questions
		$this->db->query("insert into tbl_audit_subquestion values('', '2', 'Routes are safe and convenient', '1')");
		$this->db->query("insert into tbl_audit_subquestion values('', '2', 'Routes are well marked', '2')");

		//audit response    responseid, markerid, questionid, questiontypeid, numericresponse, textresponse
		$this->db->query("insert into tbl_audit_response values('', 2, 1, 1, 4, '')");
		$this->db->query("insert into tbl_audit_response values('', 2, 3, 1, 4, '')");
	}

	function deleteTables(){
		$this->db->query("DROP TABLE tbl_user, tbl_place, tbl_marker, tbl_audit, tbl_audit_questiontype, tbl_audit_question, tbl_audit_subquestion, tbl_audit_category, tbl_audit_response	");
	}
}

/* End of file dbinit_model.php */
/* Location: ./application/models/dbinit_model.php */