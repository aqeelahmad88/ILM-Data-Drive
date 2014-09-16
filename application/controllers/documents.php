<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documents extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("isLoggedIn")){
			redirect(site_url("homepage"));	
		}
	}
	function index()
	{
		$data["title"] = "Documents";
		$data["user"] = $this->session->userdata("isLoggedIn");
		$data["semesters"] = $this->common_model->query("SELECT *, REPLACE(semesters.semester, 'Semester ', '') AS orderby FROM semesters WHERE semesters.user_id = ".$data["user"]->id." ORDER BY CAST(`orderby` AS SIGNED) ASC");
		$data["variable"] = "documents";
		$this->load->view("documents/index", $data);
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
		$semester_id = $this->input->post("semester_id");
		$subjects = $this->common_model->query("SELECT * FROM subjects WHERE subjects.semester_id = ".$semester_id."");
		if($subjects->num_rows()>0){
			echo '<select class="chzn-select col-xs-10 col-sm-3" data-placeholder="Choose a subject..." style="max-width: 240px;" id="subject_id" name="subject_id">';
			echo '<option value=""></option>';
			foreach($subjects->result() as $data){
				echo '<option value="'.$data->id.'">'.$data->subjects.'</option>';	
			}
			echo '</select><img src="'.base_url().'assets/img/loading.gif" id="loader" style="display:none; margin-left: 3px; margin-top: 3px;" /><script>$(document).ready(function(e){$(".chzn-select").chosen();})</script>';
		}
	}
	
	function add_new()
	{
		$data["title"] = "Add New";
		$data["user"] = $this->session->userdata("isLoggedIn");
		$data["variable"] = "documents";
		$data["semesters"] = $this->common_model->query("SELECT *, REPLACE(semesters.semester, 'Semester ', '') AS orderby FROM semesters WHERE semesters.user_id = ".$data["user"]->id." ORDER BY CAST(`orderby` AS SIGNED) ASC");
		$data["subjects"] = $this->common_model->query("SELECT * FROM subjects WHERE subjects.user_id = ".$data["user"]->id." ORDER BY subjects.subjects");
		$this->load->view("documents/add_new", $data);
	}
	function add_new_success(){
		$user = $this->session->userdata("isLoggedIn");
		if(strtolower($user->type_name)=="student"){
			$this->form_validation->set_rules('semester_id', 'Semester', 'required');
		}
		$this->form_validation->set_rules('subject_id', 'Subject', 'required');
		$this->form_validation->set_rules('filename', 'File Name', 'required');
		if (empty($_FILES['doc_paths']['name']))
		{
			$this->form_validation->set_rules('doc_paths', 'Document', 'required');
		}
		if($this->form_validation->run() == FALSE){
			$this->add_new();
		}else{
			
			$data['user_id'] = $this->session->userdata("isLoggedIn")->id;
			if(strtolower($user->type_name)=="student"){
				$data['semester_id'] = $this->input->post('semester_id');
			}
			$data['subject_id'] = $this->input->post('subject_id');
			$data['filename'] = $this->input->post('filename');
			if($this->input->post('privacy')=="on"){
				$data['privacy'] = 1;
			}else{
				$data['privacy'] = 0;
			}
			if(strtolower($user->type_name)=="student"){
				$path = create_folder($data['user_id'], $data['semester_id'], $data['subject_id']);
			}else{
				$path = create_folder($data['user_id'], NULL, $data['subject_id']);
			}
			$docpath = str_replace('./uploads/', '', $path);
			$data['doc_paths'] = $docpath;
			for($i=0; $i<count($_FILES['doc_paths']['name']); $i++){
				$name = $_FILES['doc_paths']['name'][$i];
				if(strlen($name)){
					$fname=time().'_'.basename($_FILES['doc_paths']['name'][$i]);
					$fname = str_replace(" ","_",$fname);
					$fname = str_replace("%","_",$fname);
					$name_ext = end(explode(".", basename($_FILES['doc_paths']['name'][$i])));
					$name = str_replace('.'.$name_ext,'',basename($_FILES['doc_paths']['name'][$i]));
					$uploaddir = $path.'/';
					$uploadfile = $uploaddir.$fname;
					if (move_uploaded_file($_FILES['doc_paths']['tmp_name'][$i], $uploadfile)){
						$doc_paths = $_FILES["doc_paths"];
						$data['filesize'] = $doc_paths["size"][$i];
						$data['type'] = $doc_paths["type"][$i];
						$data['name'] = $doc_paths["name"][$i];
						$data["uploaded_filename"] = $fname;
						$this->common_model->insert("documents", $data);
					}else{
					}
				}
			}
		}
	}
	function edit($id){
		if(user_role()=="V0" || user_role()=="V1"){
			$this->session->set_flashdata("error","You cannot edit this product. Please contact UniqueTracks with any questions.");
			redirect(site_url("products"));
			/*$check = $this->common_model->query("SELECT products.active FROM products WHERE products.id = ".$id."")->row();
			if($check->active==0){
				$this->session->set_flashdata("error","You cannot edit this product. Please contact UniqueTracks with any questions.");
				redirect(site_url("products"));
			}*/
		}
		$data['title'] = "Edit";
		$data['user'] = $this->session->userdata("isLoggedIn");
		$data["variable"] = "products";
		$data['row'] = $this->common_model->query("SELECT * FROM products WHERE products.id = '".$id."'")->row();
		if(user_role()=="V0" || user_role()=="V1"){
			if($data["row"]->vendorid!=$data["user"]->vendorid){
				$this->session->set_flashdata("error","Sorry, Invalid product id...");
				redirect(site_url("products"));
			}
		}
		$data["vendors"] = $this->common_model->query("SELECT * FROM vendor WHERE vendor.id <> 3 ORDER BY id DESC");
		$this->load->view('products/edit',$data);
	}
	function edit_success($id){
		$this->form_validation->set_rules('product', 'Product', 'required');
		if($this->form_validation->run() == FALSE){
			$this->edit($id);
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
			if(user_role()=="G0" || user_role()=="G1"){
				$data["vendorid"] = 3;
			}
			$this->common_model->editRecord('id', $id, 'products', $data);
			$this->session->set_flashdata("success","Edit Record Sucessfully Changed");
			redirect(site_url("products"));
		}
	}
	function delete($id){
		$document = $this->common_model->query("SELECT * FROM documents WHERE documents.id = ".$id."")->row();
		$path = './uploads/'.$document->doc_paths.'/'.$document->uploaded_filename;
		if(file_exists($path)){
			unlink($path);
		}
		$this->common_model->delete("id",$id,"documents");
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
		$this->common_model->editRecord('id', $id, 'products', $data);
		echo $data["active"];	
	}
	function import_products(){
		$handle = fopen($_FILES["import_products"]["tmp_name"], 'r');
		$count = 0;
		while (($row=fgetcsv($handle, ","))!== FALSE){
			if($count!=0){
				$data['vendorid'] = $this->session->userdata("isLoggedIn")->vendorid;
				$data['product_code'] = $row[0];
				$data['product'] = $row[1];
				$data['description'] = $row[2];
				$data['active'] = 0;
				$this->common_model->insert("products", $data);
			}
			$count++;
		}
		$this->session->set_flashdata("success","".$count." records imported successfully");
		redirect(site_url("products"));
	}
	function template(){
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename="template.csv"');
		readfile(base_url('template.csv'));
	}
	function delete_img(){
		$img = $this->input->get("img");
		$path = './'.$img;
		if(file_exists($path)){
			unlink($path);
		}
		$this->session->set_flashdata("error","Image deleted.");
		redirect($_SERVER["HTTP_REFERER"]);
	}



}