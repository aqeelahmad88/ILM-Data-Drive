<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("isLoggedIn")){
			redirect(site_url("homepage"));	
		}
	}
	function index()
	{
		$data['title'] = "Dashboard";
		$data['user'] = $this->session->userdata("isLoggedIn");
		create_u_folder($data['user']->id);
		$AND  = "AND documents.privacy = 0";
		if($data['user']->user_rights==1){
			$AND = "";	
		}
		$data["todaydocuments"] = $this->common_model->query("
			SELECT documents.id, users.id AS user_id, users.user_name, user_type.`type` AS user_type, departments.name AS department, CONCAT(users.first_name,' ',users.last_name) AS fullname, semesters.semester, subjects.subjects AS subject, documents.filename, documents.filesize, documents.name, documents.`type`, documents.time AS date_time, documents.doc_paths, documents.uploaded_filename 
			FROM documents 
			LEFT JOIN users ON documents.user_id = users.id
			LEFT JOIN semesters ON documents.semester_id = semesters.id
			LEFT JOIN subjects ON documents.subject_id = subjects.id
			LEFT JOIN departments ON users.department = departments.id
			LEFT JOIN user_type ON users.user_type = user_type.id
			WHERE DATE(documents.time) = CURRENT_DATE()
			".$AND."
			ORDER BY documents.time DESC
		");
		$data["yesterdaydocuments"] = $this->common_model->query("
			SELECT documents.id, users.id AS user_id, users.user_name, user_type.`type` AS user_type, departments.name AS department, CONCAT(users.first_name,' ',users.last_name) AS fullname, semesters.semester, subjects.subjects AS subject, documents.filename, documents.filesize, documents.name, documents.`type`, documents.time AS date_time, documents.doc_paths, documents.uploaded_filename 
			FROM documents 
			LEFT JOIN users ON documents.user_id = users.id
			LEFT JOIN semesters ON documents.semester_id = semesters.id
			LEFT JOIN subjects ON documents.subject_id = subjects.id
			LEFT JOIN departments ON users.department = departments.id
			LEFT JOIN user_type ON users.user_type = user_type.id
			WHERE DATE(documents.time) = DATE(DATE_SUB(NOW(), INTERVAL 1 DAY))
			".$AND."
			ORDER BY documents.time DESC
		");
		$data["otherdocuments"] = $this->common_model->query("
			SELECT DISTINCT(DATE(documents.time)) AS dates 
			FROM documents 
			WHERE DATE(documents.time) <> CURRENT_DATE()
			AND DATE(documents.time) <> DATE(DATE_SUB(NOW(), INTERVAL 1 DAY))
			".$AND."
			ORDER BY documents.time DESC
		");
		$this->load->view('dashboard',$data);
	}



}