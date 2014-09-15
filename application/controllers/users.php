<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("isLoggedIn")){
			redirect(site_url("homepage"));	
		}
	}
	function index()
	{
		$data["title"] = "Users";
		$data["user"] = $this->session->userdata("isLoggedIn");
		$AND = "";
		if(user_role()=="V0" || user_role()=="V1"){
			$AND = "AND vendorid = ".$data["user"]->vendorid;	
		}
		$data["users"] = $this->common_model->query("SELECT * FROM users WHERE users.id <> ".$data["user"]->id." ".$AND." ORDER BY id DESC");
		$data["variable"] = "users";
		$this->load->view("users/index", $data);
	}
	function add_new()
	{
		$data["title"] = "Add New";
		$data["user"] = $this->session->userdata("isLoggedIn");
		$data["variable"] = "users";
		$data["vendors"] = $this->common_model->query("SELECT * FROM vendor WHERE vendor.id <> 3 ORDER BY id DESC");
		$data["user_roles"] = $this->common_model->query("SELECT * FROM user_roles ORDER BY id ASC");
		$this->load->view("users/add_new", $data);
	}
	function add_new_success(){
		$this->form_validation->set_rules('username', 'User Name', 'required|callback_checkUser');
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == FALSE){
			$this->add_new();
		}else{
			$data = array();
			foreach($_POST as $key=>$val){
				$data[$key] = $val;
			}
			if(isset($_POST["active"])){
				if($_POST["active"]=="on"){
					$data["active"] = 1;
				}else{
					$data["active"] = 0;
				}
			}else{
				$data["active"] = 0;
			}
			$data["password"] = md5($data["password"]);
			$this->common_model->insert("users", $data);
			$this->session->set_flashdata("success","New Record Successfully Entered");
			redirect(site_url("users"));
		}
	}
	function edit($id){
		$data['title'] = "Edit";
		$data['user'] = $this->session->userdata("isLoggedIn");
		$data["variable"] = "users";
		$data['row'] = $this->common_model->query("SELECT * FROM users WHERE users.id = '".$id."'")->row();
		if(user_role()=="V0" || user_role()=="V1"){
			if($data["row"]->vendorid!=$data["user"]->vendorid){
				$this->session->set_flashdata("error","Sorry, Invalid product id...");
				redirect(site_url("users"));
			}
		}
		$data["vendors"] = $this->common_model->query("SELECT * FROM vendor ORDER BY id DESC");
		$data["user_roles"] = $this->common_model->query("SELECT * FROM user_roles ORDER BY id ASC");
		$this->load->view('users/edit',$data);
	}
	function edit_success($id){
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		if($this->form_validation->run() == FALSE){
			$this->edit($id);
		}else{
			$data = array();
			foreach($_POST as $key=>$val){
				if($key!="password"){
					$data[$key] = $val;
				}
			}
			if(isset($_POST["active"])){
				if($_POST["active"]=="on"){
					$data["active"] = 1;
				}else{
					$data["active"] = 0;
				}
			}else{
				$data["active"] = 0;
			}
			if(isset($_POST["password"])){
				if($_POST["password"]!="utr"){
					$data["password"] = md5($_POST["password"]);	
				}	
			}
			$this->common_model->editRecord('id', $id, 'users', $data);
			$this->session->set_flashdata("success","Edit Record Sucessfully Changed");
			redirect(site_url("users"));
		}
	}
	function checkUser(){
		$val = $this->input->post("username");
		$query = $this->common_model->query("SELECT * FROM users WHERE users.username = '".$val."'");
		if ($query->num_rows()>0)
		{
			$this->form_validation->set_message('checkUser', 'This user is already exists.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	function delete($id){
		$this->common_model->delete("id",$id,"users");
		$this->session->set_flashdata("error","Record Deleted...");
		redirect($_SERVER["HTTP_REFERER"]);
	}
	function set_status(){
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