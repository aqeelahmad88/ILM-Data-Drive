<?php
function check_delete($tablename, $column, $value){
	$CI = &get_instance();
	$check = $CI->common_model->query("SELECT * FROM $tablename WHERE $tablename.$column = $value");	
	if($check->num_rows()>0){
		return TRUE;	
	}else{
		return FALSE;	
	}
}
function create_u_folder($userid){
	$CI = &get_instance();
	$user = $CI->common_model->query("SELECT user_type.`type`, users.user_name FROM users LEFT JOIN user_type ON users.user_type = user_type.id WHERE users.id = ".$userid."")->row();
	$folder1 = strtolower($user->type);
	$folder2 = strtolower($user->user_name);
	$path = './uploads/'.$folder1.'/'.$folder2;
	if (!file_exists($path)) {
		mkdir($path, 0777, true);
	}
}
function create_folder($userid, $semester_id, $subject_id){
	$CI = &get_instance();
	$user = $CI->common_model->query("SELECT user_type.`type`, users.user_name FROM users LEFT JOIN user_type ON users.user_type = user_type.id WHERE users.id = ".$userid."")->row();
	$folder1 = strtolower($user->type);
	$path = './uploads/'.$folder1;
	if (!file_exists($path)) {
		mkdir($path, 0777, true);
	}
	
	$folder2 = strtolower($user->user_name);
	$path = './uploads/'.$folder1.'/'.$folder2;
	if (!file_exists($path)) {
		mkdir($path, 0777, true);
	}
	if(strtolower($user->type)=="student"){
		$semester = $CI->common_model->query("SELECT semesters.semester FROM semesters WHERE semesters.id = ".$semester_id."")->row();
		$folder3 = slug($semester->semester);
		$path = './uploads/'.$folder1.'/'.$folder2.'/'.$folder3;
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}
	}

	$subjects = $CI->common_model->query("SELECT subjects.subjects FROM subjects WHERE subjects.id = ".$subject_id."")->row();
	$folder4 = slug($subjects->subjects);
	if(strtolower($user->type)=="student"){
		$path = './uploads/'.$folder1.'/'.$folder2.'/'.$folder3.'/'.$folder4;
	}else{
		$path = './uploads/'.$folder1.'/'.$folder2.'/'.$folder4;
	}
	if (!file_exists($path)) {
		mkdir($path, 0777, true);
	}
	
	return $path;
}
function slug($text){ 
	$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	$text = trim($text, '-');
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	$text = strtolower($text);
	$text = preg_replace('~[^-\w]+~', '', $text);
	if (empty($text))
	{
	  return 'n-a';
	}
	return $text;
}
function get_remaining_space(){
	$CI = &get_instance();
	$userid = $CI->session->userdata("isLoggedIn")->id;
	$user = $CI->common_model->query("SELECT premium FROM users WHERE users.id = ".$userid."")->row();
	$data = array();
	if($user->premium==0){
		$data["total"] = "2.0 GB";
		$check = $CI->common_model->query("SELECT SUM(filesize) AS total FROM documents WHERE user_id = ".$userid."");
		if($check->num_rows()>0){
			$total = $check->row()->total;	
			$sizeinbytes = 2147483648 - intval($total);
			$remaining = get_dg($sizeinbytes);
			$data["remaining"] = $remaining;
			$data["percentage"] = get_inper("2147483648", $total);
		}else{
			$data["remaining"] = "2.0 GB";
			$data["percentage"] = get_inper(2147483648, 2147483648);
		}
	}else if($user->premium==1){
		$total = $check->row()->total;	
		$sizeinbytes = 5368709120 - intval($total);
		$remaining = get_dg($sizeinbytes);
		$data["remaining"] = $remaining;
		$data["percentage"] = get_inper(5368709120, $total);
		$data["total"] = "5.0 GB";
	}
	return $data;
}
function get_dg($sizeinbytes){
	$fSExt = array(' Bytes', ' KB', ' MB', ' GB');
	$fSize = $sizeinbytes; 
	$i=0;
	while($fSize>900){$fSize/=1024;$i++;}
	$fSize = (($fSize*100)/100);
	$fSize = explode('.',$fSize);
	$first = $fSize[0];
	if(isset($fSize[1])){
		$second = $fSize[1];
	}else{
		$second = 0;
	}
	$second = substr($second, 0, 2);
	$fSize = $first.'.'.$second;
	$size = $fSize.' '.$fSExt[$i];
	return $size;
}
function get_inper($a, $b){
	$a = intval($a);
	$b = intval($b);
	$result = (($a-$b)/$a)*100;
	$result = explode(".", $result);
	return $result[0];
}
function avatar($userid=NULL){
	$CI = &get_instance();
	$url = "";
	if($userid==NULL){
		$userid = $CI->session->userdata("isLoggedIn")->id;	
	}
	$users = $CI->common_model->query("SELECT LOWER(user_type.`type`) AS type, users.gender, users.avatar, users.user_name FROM users LEFT JOIN user_type ON users.user_type = user_type.id WHERE users.id = ".$userid."")->row();
	if($users->avatar==NULL){
		if($users->gender=="male"){
			$url = base_url()."assets/avatars/avatar.png";
		}else{
			$url = base_url()."assets/avatars/avatar1.png";
		}
	}else{
		$filename = "./uploads/".$users->type."/".$users->user_name."/".$users->avatar;
		if(file_exists($filename)){
			$url = base_url()."uploads/".$users->type."/".$users->user_name."/".$users->avatar;
		}else{
			if($users->gender=="male"){
				$url = base_url()."assets/avatars/avatar.png";
			}else{
				$url = base_url()."assets/avatars/avatar1.png";
			}
		}
	}	
	return $url;
}
function format_date($date){
	return date('h:i A',strtotime($date));	
}
function icon($type){
	$icon = '';
	$img = array("image/png", "image/jpeg", "image/gif", "image/bmp");
	if(in_array($type, $img)){
		$icon = '<i class=" ace-icon  fa fa-picture-o green"></i>';
	}

	$audio = array("audio/mpeg", "audio/mpeg", "audio/wma", "audio/wav", "audio/ogg", "audio/mp3", "audio/amr", "audio/aac");
	if(in_array($type, $audio)){
		$icon = '<i class=" ace-icon  fa fa-music blue"></i>';
	}

	$video = array("video/quicktime", "video/mp4", "video/flv", "video/mkv");
	if(in_array($type, $video)){
		$icon = '<i class=" ace-icon  fa fa-film blue"></i>';
	}

	$pdf = array("application/pdf");
	if(in_array($type, $pdf)){
		$icon = '<i class=" ace-icon  fa fa-file-text red"></i>';
	}

	$document = array("application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/msword", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "text/comma-separated-values", "application/vnd.openxmlformats-officedocument.presentationml.presentation", "application/vnd.ms-powerpoint", "text/plain");
	if(in_array($type, $document)){
		$icon = '<i class=" ace-icon  fa fa-file-text grey"></i>';
	}

	$zip = array('"application/x-zip"', 'application/x-zip');
	if(in_array($type, $zip)){
		$icon = '<i class=" ace-icon  fa fa-archive brown"></i>';
	}
	
	if(!in_array($type, $img) && !in_array($type, $audio) && !in_array($type, $video) && !in_array($type, $pdf) && !in_array($type, $document) && !in_array($type, $zip)){
		$colors = array("brown", "pink", "grey", "blue", "orange", "purple", "black");
		$colors = $colors[array_rand($colors, 1)];
		$icon = '<i class=" ace-icon  fa fa-folder '.$colors.'"></i>';
	}

	return $icon;
}
function get_file_type($type){
	$icon = '';
	$img = array("image/png", "image/jpeg", "image/gif", "image/bmp");
	if(in_array($type, $img)){
		$icon = 'image';
	}

	$audio = array("audio/mpeg", "audio/mpeg", "audio/wma", "audio/wav", "audio/ogg", "audio/mp3", "audio/amr", "audio/aac");
	if(in_array($type, $audio)){
		$icon = 'audio';
	}

	$video = array("video/quicktime", "video/mp4", "video/flv", "video/mkv", "audio/aac");
	if(in_array($type, $video)){
		$icon = 'video';
	}
	
	return $icon;
}
function get_preview($format, $type, $url){
	$result = "";
	if(get_file_type($format)=="image"){
		$result = '<img src="'.$url.'" style="max-width:400px;" />';
	}
	if(get_file_type($format)=="audio"){
		$result = '<audio controls><source src="'.$url.'" type="'.$type.'">Your browser does not support the audio element. </audio>';
	}
	if(get_file_type($format)=="video"){
		$result = '<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="264" poster="" data-setup="{}"> <source src="'.$url.'" type="'.$type.'" /> <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p> </video>';
	}
	return $result;
		
}
function privacy($userid=NULL, $pid){
	$CI = &get_instance();
	$loginuser = $CI->session->userdata("isLoggedIn");
	if($loginuser->user_rights==1){
		return FALSE;	
	}
	if($userid==NULL){
		$userid = $loginuser->id;	
	}
	$users = $CI->common_model->query("SELECT * FROM users WHERE users.id = ".$userid."")->row();
	if($loginuser->id==$users->id){
		return FALSE;
	}
	$result = $users->privacy;
	$result = json_decode($result);
	$result = (array)$result;
	if(array_key_exists($pid, $result)){
		$result = TRUE;	
	}else{
		$result = FALSE;	
	}
	return $result;
}
function set_privacy($userid=NULL, $pid){
	$CI = &get_instance();
	$loginuser = $CI->session->userdata("isLoggedIn");
	if($userid==NULL){
		$userid = $loginuser->id;	
	}
	$users = $CI->common_model->query("SELECT * FROM users WHERE users.id = ".$userid."")->row();
	$result = $users->privacy;
	$result = json_decode($result);
	$result = (array)$result;
	if(array_key_exists($pid, $result)){
		$result = TRUE;	
	}else{
		$result = FALSE;	
	}
	return $result;
}
function url_filter($url){
	$url = str_replace("https://", "", $url);
	$url = str_replace("http://", "", $url);
	$url = "http://".$url;
	return $url;
}
function total_images($userid){
	$CI = &get_instance();
	$row = $CI->common_model->query("
		SELECT COUNT(*) total FROM documents 
		WHERE user_id = ".$userid."
		AND (
			documents.`type` = 'image/png'
			OR documents.`type` = 'image/jpeg'
			OR documents.`type` = 'image/gif'
			OR documents.`type` = 'image/bmp'
		)	
	")->row();	
	return $row->total;
}
function total_docs($userid){
	$CI = &get_instance();
	$row = $CI->common_model->query("
		SELECT COUNT(*) total FROM documents 
		WHERE user_id = ".$userid."
		AND (
			documents.`type` <> 'image/png'
			AND documents.`type` <> 'image/jpeg'
			AND documents.`type` <> 'image/gif'
			AND documents.`type` <> 'image/bmp'
		)	
	")->row();	
	return $row->total;
}


















function format_currency($price){
	$price = number_format($price, 2);
	return "$ ".$price;
}
function string_filter($str){
	$str = str_replace("_", " ", $str);
	
	$str = ucwords($str);
	return $str;
}
function set_menu($elements, $icons){
	$CI = &get_instance();
	$str = '<li class="';
	if($CI->uri->segment(1)==$elements){
		$str .= 'active open';
	}
	$str .= ' hover"> <a href="'.site_url($elements).'" class="dropdown-toggle"> <i class="menu-icon fa fa-'.$icons.'"></i> <span class="menu-text"> '.ucwords($elements).' </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
	<ul class="submenu">
	<li class="
	';
	if($CI->uri->segment(1)==$elements && $CI->uri->segment(2)==""){
		$str .= 'active open';
	}
	$str .= '  hover"> <a href="'.site_url($elements).'"> <i class="menu-icon fa fa-caret-right"></i> List All </a> <b class="arrow"></b> </li>
			  <li class="';
	if($CI->uri->segment(1)==$elements && $CI->uri->segment(2)=="add_new"){
		$str .= 'active open';
	}
	$str .= 'hover"> <a href="'.site_url($elements."/add_new").'"> <i class="menu-icon fa fa-caret-right"></i> Add New </a> <b class="arrow"></b> </li>
			</ul>
		  </li>';
	echo $str;
}

function var_exit($post){
	$str = '<pre>';
	$str .= print_r($post);
	$str .= exit;
	echo $str;
}
function get_value($element, $row=NULL){
	$ci = &get_instance();
	$value = "";
	if($ci->uri->segment(2)=="add_new"){
		$value = $ci->input->post($element);	
	}
	if($ci->uri->segment(2)=="edit"){
		$value = $row->$element;	
	}
	return $value;
}
function user_role(){
	$CI = &get_instance();
	$account_type = $CI->session->userdata("isLoggedIn")->account_type;
	$user_level = $CI->session->userdata("isLoggedIn")->user_role;
	$user_role = "";
	if($account_type==1 && $user_level==1){
		$user_role = "G0";
	}
	if($account_type==1 && $user_level==2){
		$user_role = "G1";
	}
	if($account_type==2 && $user_level==1){
		$user_role = "V0";
	}
	if($account_type==2 && $user_level==2){
		$user_role = "V1";
	}
	return $user_role;
}

