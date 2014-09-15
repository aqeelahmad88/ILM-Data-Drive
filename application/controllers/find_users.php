<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Find_users extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("isLoggedIn")){
			redirect(site_url("homepage"));	
		}
	}
	function index()
	{
		$data["title"] = "Find Users";
		$data["user"] = $this->session->userdata("isLoggedIn");
		$data["users"] = $this->common_model->query("SELECT * FROM users WHERE users.user_rights <> 1");
		$data["variable"] = "users";
		$this->load->view("find_users/index", $data);
	}
	function set_active(){
		$id = $this->input->post("id");	
		$status = $this->input->post("status");
		if($status=="false"){
			$data["active"] = 0;	
		}
		if($status=="true"){
			$data["active"] = 1;	
		}
		$this->common_model->editRecord('id', $id, 'users', $data);
		echo $data["active"];	
	}

}