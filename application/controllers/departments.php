<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departments extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("isLoggedIn")){
			redirect(site_url("homepage"));	
		}
	}
	function index()
	{
		$data["title"] = "Departments";
		$data["user"] = $this->session->userdata("isLoggedIn");
		$data["departments"] = $this->common_model->query("SELECT * FROM departments ORDER BY id DESC");
		$data["variable"] = "departments";
		$this->load->view("departments/index", $data);
	}
	function add_new_success(){
		$this->form_validation->set_rules('name', 'Department Name', 'required|callback_checkDepartment');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$data['name'] = $this->input->post('name');
			$this->common_model->insert("departments", $data);
			redirect(site_url("departments"));
		}
	}
	function checkDepartment()
	{
		$name = $this->input->post("name");
		$query = $this->common_model->query("SELECT * FROM departments WHERE departments.name = '".$name."'");
		if ($query->num_rows()<=0)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('checkDepartment', 'This department already exists.');
			return FALSE;
		}
	}
	function delete($id){
		$this->common_model->delete("id",$id,"departments");	
		redirect(site_url("departments"));
	}
}