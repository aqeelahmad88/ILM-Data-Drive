<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("isLoggedIn")){
			redirect(site_url("homepage"));	
		}
	}
	function index()
	{
		$data["title"] = "Settings";
		$data["user"] = $this->session->userdata("isLoggedIn");
		$data["variable"] = "Settings";
		$data["users"] = $this->common_model->query("SELECT * FROM users WHERE users.id = ".$data["user"]->id."")->row();
		$this->load->view("settings/index", $data);
	}
	function personal(){
		$user = $this->session->userdata("isLoggedIn");
		//print_r($user); exit;
		$type = strtolower($user->type_name);
		$data = array();
		foreach($_POST as $key=>$val){
			$data[$key] = $val;
		}
		$name = $_FILES['avatar_img']['name'];
		if(strlen($name)){
			$delete = $this->common_model->query("SELECT avatar FROM users WHERE users.id = ".$user->id."")->row();
			$path = './uploads/'.$type.'/'.$user->user_name.'/'.$delete->avatar;
			if(file_exists($path)){
				unlink($path);
			}
			$fname=time().'_'.basename($_FILES['avatar_img']['name']);
			$fname = str_replace(" ","_",$fname);
			$fname = str_replace("%","_",$fname);
			$name_ext = end(explode(".", basename($_FILES['avatar_img']['name'])));
			$name = str_replace('.'.$name_ext,'',basename($_FILES['avatar_img']['name']));
			$uploaddir = './uploads/'.$type.'/'.$user->user_name.'/';
			$uploadfile = $uploaddir.$fname;
			if (move_uploaded_file($_FILES['avatar_img']['tmp_name'], $uploadfile)){
				$data["avatar"] = $fname;
			}
		}
		$this->common_model->editRecord('id', $user->id, 'users', $data);
		$this->session->set_flashdata("success","Edit Record Sucessfully Changed");
		redirect(site_url("settings"));
			
	}
	function resume(){
		$user = $this->session->userdata("isLoggedIn");
		//print_r(serialize($_POST)); exit;
		$data["resume"] = json_encode($_POST);
		$this->common_model->editRecord('id', $user->id, 'users', $data);
		$this->session->set_flashdata("success","Edit Record Sucessfully Changed");
		redirect(site_url("settings#tabs-2"));
	}
	function privacy(){
		$user = $this->session->userdata("isLoggedIn");
		$data["privacy"] = json_encode($_POST);
		$this->common_model->editRecord('id', $user->id, 'users', $data);
		$this->session->set_flashdata("success","Edit Record Sucessfully Changed");
		redirect(site_url("settings#tabs-3"));
	}
	function password(){
		$user = $this->session->userdata("isLoggedIn");
		$oldpassword = $this->input->post("old-password");
		$password = $this->input->post("new-password");
		$data["password"] = md5($password);
		$check = $this->common_model->query("SELECT * FROM users WHERE users.id = ".$user->id."")->row();
		$current = $check->password;
		if(md5($oldpassword)==$current){
			$this->common_model->editRecord('id', $user->id, 'users', $data);
			$this->session->set_flashdata("success","Password Sucessfully Changed");
		}else{
			$this->session->set_flashdata("error","Old password does not match...");
		}
		redirect(site_url("settings#tabs-4"));
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	function edit_account(){
		$id = $this->session->userdata("isLoggedIn")->vendorid;
		$this->form_validation->set_rules('firsttname', 'First Name', 'required');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$data = array();
			foreach($_POST as $key=>$val){
				$data[$key] = $val;
			}
			$this->common_model->editRecord('id', $id, 'vendor', $data);
			$this->session->set_flashdata("success","Edit Record Sucessfully Changed");
			redirect(site_url("settings"));
		}
	}
	function user()
	{
		$data["title"] = "Settings";
		$data["user"] = $this->session->userdata("isLoggedIn");
		$data["row"] = $this->common_model->query("SELECT * FROM users WHERE users.id = ".$data["user"]->id."")->row();
		$data["variable"] = "settings";
		$this->load->view("settings/users", $data);
	}
	function edit_user(){
		$id = $this->session->userdata("isLoggedIn")->id;
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		if($this->form_validation->run() == FALSE){
			$this->user();
		}else{
			$data = array();
			foreach($_POST as $key=>$val){
				if($key!="password"){
					$data[$key] = $val;
				}
			}
			if(isset($_POST["password"])){
				if($_POST["password"]!=""){
					$data["password"] = md5($_POST["password"]);	
				}	
			}
			$this->common_model->editRecord('id', $id, 'users', $data);
			$this->session->set_flashdata("success","Edit Record Sucessfully Changed");
			redirect(site_url("settings/user"));
		}
	}
}