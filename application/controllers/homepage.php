<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		if($this->session->userdata("isLoggedIn")){
			redirect(site_url("dashboard"));	
		}
		$data["departments"] = $this->common_model->query("SELECT * FROM departments ORDER BY departments.name ASC");
		$this->load->view("homepage", $data);
	}
	public function auth()
	{
		$username = $this->input->post("user_email");
		$this->form_validation->set_rules('user_email', 'Username', 'required');
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required|xss_clean|callback_checkUsername');
		if($this->form_validation->run() == FALSE){
			$this->load->view('homepage');
		}else{
			$this->session_establish($username);
			redirect(site_url("dashboard"));
		}
	}
	public function session_establish($username)
	{
		$isLoggedIn = $this->common_model->query("
			SELECT users.id, users.user_type, users.user_rights, users.first_name, users.last_name, users.user_name, users.email, users.department, users.dob, users.active, users.time, user_type.`type` AS type_name, departments.name AS dep_name 
			FROM users
			LEFT JOIN user_type ON users.user_type = user_type.id
			LEFT JOIN departments ON users.department = departments.id
			WHERE users.user_name = '".$username."'
		")->row();
		$this->session->set_userdata('isLoggedIn', $isLoggedIn);
	}
	
	function checkUsername()
	{
		$username = $this->input->post("user_email");
		$password = $this->input->post("user_password");
		$password = md5($password);
		$query = $this->common_model->query("SELECT * FROM users WHERE user_name = '".$username."' AND password = '".$password."'");
		if ($query->num_rows()>0)
		{
			if($query->row()->active!=1){
				$this->form_validation->set_message('checkUsername', 'Sorry! Your account has been suspended. Please contact with your administrator.');
				return false;
			}else{
				return TRUE;
			}
		}
		else
		{
			$this->form_validation->set_message('checkUsername', 'Login Authentication Failed');
			return false;
		}
	}
	
	function register(){
		$data = array();
		foreach($_POST as $key=>$val){
			if($key!="re_password"){
				$data[$key] = $val;
			}
		}
		$data['dob'] = date('Y-m-d', strtotime($data['dob']));
		$data['password'] = md5($data['password']);
		$check_username = $this->check_username($data['user_name']);
		$check_email = $this->check_email($data['email']);
		$msg = array();
		if($check_username>0){
			$msg["type"] = FALSE;
			$msg["message"] = "Username is already exists";
			print_r(json_encode($msg)); exit;
		}else if($check_email>0){
			$msg["type"] = FALSE;
			$msg["message"] = "Email is already exists";
			print_r(json_encode($msg)); exit;
		}else{
			$msg["type"] = TRUE;
			$msg["message"] = "Congratulation! You are register now please login...";
			print_r(json_encode($msg));
		}
		
		$this->common_model->insert("users", $data);	
		
	}
	function check_username($username){
		$check = $this->common_model->query("SELECT * FROM users WHERE users.user_name = '".$username."'");
		if($check->num_rows()>0){
			return TRUE;	
		}else{
			return FALSE;	
		}
	}
	function check_email($email){
		$check = $this->common_model->query("SELECT * FROM users WHERE users.email = '".$email."'");
		if($check->num_rows()>0){
			return TRUE;	
		}else{
			return FALSE;	
		}
	}

	function logout()
	{
		$this->session->sess_destroy("isLoggedIn");
		$this->session->sess_destroy("accountInfo");
		redirect(site_url("homepage"));
	}
	function download_file(){
		$file = $this->input->get("filename");
		$file ="./".$file;
		echo $file;
		exit;
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($file).'"'); //<<< Note the " " surrounding the file name
header('Content-Transfer-Encoding: binary');
header('Connection: Keep-Alive');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($file));		
	}
}