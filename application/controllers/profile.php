<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("isLoggedIn")){
			redirect(site_url("homepage"));	
		}
	}
	function index($username=NULL)
	{
		$data['title'] = "Dashboard";
		$data['user'] = $this->session->userdata("isLoggedIn");
		if($data['user']->user_name==$username){redirect(site_url("profile"));}
		if($username){
			$data["users"] = $this->common_model->query("
				SELECT users.id, user_type.`type` AS u_type, users.first_name, users.last_name, users.father_name, users.user_name, users.email, departments.name AS dep_name, users.gender, users.blood_group, users.cnic, users.contact_number, users.dob, users.postal_address, users.city, users.province, users.country, users.facebook, users.twitter, users.linkedin, users.avatar, users.about, users.resume, users.privacy, users.time
				FROM users 
				JOIN user_type ON users.user_type = user_type.id
				JOIN departments ON users.department = departments.id
				WHERE users.user_name = '".$username."'
			")->row();
			$data["semesters"] = $this->common_model->query("SELECT * FROM semesters WHERE semesters.user_id = ".$data["users"]->id." ORDER BY semesters.semester ASC");
			

			$AND = "";
			if($data["users"]->user_name!=$data['user']->user_name){
				$AND = "AND documents.privacy = 0";	
			}
			if($data['user']->user_rights==1){
				$AND = "";	
			}
			
			$data["pictures"] = $this->common_model->query("
				SELECT * 
				FROM documents 
				WHERE documents.user_id = ".$data["users"]->id."
				AND (
						documents.`type` = 'image/bmp' 
						OR documents.`type` = 'image/png'
						OR documents.`type` = 'image/jpeg'
						OR documents.`type` = 'image/gif'
				   )
				".$AND."
				ORDER BY documents.time DESC			
			");


			$this->load->view('profile/u/index',$data);
		}else{
			$data["users"] = $this->common_model->query("
				SELECT users.id, user_type.`type` AS u_type, users.first_name, users.last_name, users.father_name, users.user_name, users.email, departments.name AS dep_name, users.gender, users.blood_group, users.cnic, users.contact_number, users.dob, users.postal_address, users.city, users.province, users.country, users.facebook, users.twitter, users.linkedin, users.avatar, users.about, users.resume, users.privacy, users.time
				FROM users 
				JOIN user_type ON users.user_type = user_type.id
				JOIN departments ON users.department = departments.id
				WHERE users.user_name = '".$data['user']->user_name."'
			")->row();
			$data["semesters"] = $this->common_model->query("SELECT * FROM semesters WHERE semesters.user_id = ".$data["users"]->id." ORDER BY semesters.semester ASC");
			$data["pictures"] = $this->common_model->query("
				SELECT * 
				FROM documents 
				WHERE documents.user_id = ".$data["users"]->id."
				AND (
						documents.`type` = 'image/bmp' 
						OR documents.`type` = 'image/png'
						OR documents.`type` = 'image/jpeg'
						OR documents.`type` = 'image/gif'
				   )
				ORDER BY documents.time DESC			
			");
			$this->load->view('profile/index',$data);
		}
	}



}