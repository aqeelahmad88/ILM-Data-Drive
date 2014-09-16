<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	function index()
	{
		$data["title"] = "Documents";
		$data["user"] = $this->session->userdata("isLoggedIn");
		$data["departments"] = $this->common_model->query("SELECT * FROM departments ORDER BY departments.name ASC");
		$data["subjects"] = $this->common_model->query("SELECT * FROM subjects GROUP BY subjects.subjects ORDER BY subjects.subjects ASC");
		if($this->input->post("departments") || $this->input->post("subjects") || $this->input->post("keyword")){
			$departments = $this->input->post("departments");
			$subjects = $this->input->post("subjects");
			$keyword = $this->input->post("keyword");
			$WHERE = "";
			$AND = "";
			$AND2 = "";
			if($departments){
				$WHERE = "WHERE departments.name LIKE '%".$departments."%'";
			}
			if($subjects){
				$sign = "AND";
				if(!$departments){
					$sign = "WHERE";
				}
				$AND = "$sign subjects.subjects LIKE '%".$subjects."%'";
			}
			if($keyword){
				$sign = "AND";
				if(!$departments && !$subjects){
					$sign = "WHERE";
				}
				$AND2 = "
					$sign
					(
						users.user_name LIKE '%".$keyword."%'
						OR user_type.`type` LIKE '%".$keyword."%'
						OR departments.name LIKE '%".$keyword."%'
						OR CONCAT(users.first_name,' ',users.last_name) LIKE '%".$keyword."%'
						OR semesters.semester LIKE '%".$keyword."%'
						OR subjects.subjects LIKE '%".$keyword."%'
						OR documents.filename LIKE '%".$keyword."%'
					)
				";
			}
			$data["documents"] = $this->common_model->query("
				SELECT documents.id, users.user_name, users.id AS user_id, user_type.`type` AS user_type, departments.name AS department, CONCAT(users.first_name,' ',users.last_name) AS fullname, semesters.semester, subjects.subjects, documents.filename, documents.filesize, documents.name, documents.`type`, documents.time, documents.doc_paths, documents.uploaded_filename, documents.privacy
				FROM documents 
				LEFT JOIN users ON documents.user_id = users.id
				LEFT JOIN semesters ON documents.semester_id = semesters.id
				LEFT JOIN subjects ON documents.subject_id = subjects.id
				LEFT JOIN departments ON users.department = departments.id
				LEFT JOIN user_type ON users.user_type = user_type.id
				".$WHERE."
				".$AND."
				".$AND2."
				AND documents.privacy = 0
				ORDER BY documents.time DESC
			");
		}
		
		$data["variable"] = "search";
		$this->load->view("search/index", $data);
	}
	function set_privacy(){
		$id = $this->input->post("id");	
		$status = $this->input->post("status");
		if($status=="false"){
			$data["privacy"] = 0;	
		}
		if($status=="true"){
			$data["privacy"] = 1;	
		}
		$this->common_model->editRecord('id', $id, 'documents', $data);
		echo $data["privacy"];	
	}
	function get_subjects(){
		$department = $this->input->post("department");
		$subjects = $this->common_model->query("SELECT * FROM subjects WHERE subjects.department = '".$department."'");
		if($subjects->num_rows()>0){
			echo '<select class="chzn-select" data-placeholder="Choose a subject..." id="subjects" name="subjects" style="width: 274px;">';
			echo '<option value=""></option>';
			foreach($subjects->result() as $data){
				echo '<option value="'.$data->id.'">'.$data->subjects.'</option>';	
			}
			echo '</select><img src="'.base_url().'assets/img/loading.gif" id="loader" style="display:none; margin-left: 3px; margin-top: 3px;" /><script>$(document).ready(function(e){$(".chzn-select").chosen();})</script>';
		}
	}



}