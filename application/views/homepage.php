<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 13 Jun 2014 06:39:32 GMT -->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Login Page -<?php echo site_title; ?></title>
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/fav.png">
<meta name="description" content="User login page" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" />

<!-- text fonts -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.css" />

<!-- ace styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" />

<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-part2.min.css" />
		<![endif]-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-rtl.min.css" />

<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-ie.min.css" />
		<![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
		<![endif]-->
</head>
<body class="login-layout light-login">
<div class="main-container">
  <div class="main-content">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="login-container">
          <div class="center">
            <h1> <img src="<?php echo base_url(); ?>assets/img/fav.png" /> <span class="red">ILM</span> <span class="white">Data Drive</span> </h1>
          </div>
          <div class="space-6"></div>
          <div class="position-relative">
            <div id="login-box" class="login-box visible widget-box no-border">
              <div class="widget-body">
                <div class="widget-main">
                  <h4 class="header blue lighter bigger"> <i class="ace-icon fa fa-coffee green"></i> Please Enter Your Information </h4>
                  <div class="space-6"></div>
                  <div class="control-group error"> <span class="help-inline" style="color:#D15B47;"> <?php echo validation_errors(); ?> <?php echo $this->session->flashdata("error"); ?> </span> </div>
                  <form action="<?php echo site_url("homepage/auth"); ?>" method="post" name="login-form" id="login-form">
                    <fieldset>
                      <label class="block clearfix"> <span class="block input-icon input-icon-right">
                        <input type="text" class="form-control" placeholder="Username" name="user_email" id="user_email" value="<?php echo $this->input->post("user_email"); ?>" />
                        <i class="ace-icon fa fa-user"></i> </span> </label>
                      <label class="block clearfix"> <span class="block input-icon input-icon-right">
                        <input type="password" class="form-control" placeholder="Password" name="user_password" id="user_password" value="" />
                        <i class="ace-icon fa fa-lock"></i> </span> </label>
                      <div class="space"></div>
                      <div class="clearfix">
                        <label class="inline">
                          <input type="checkbox" class="ace" />
                          <span class="lbl"> Remember Me</span> </label>
                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary"> <i class="ace-icon fa fa-key"></i> <span class="bigger-110">Login</span> </button>
                      </div>
                      <div class="space-4"></div>
                    </fieldset>
                  </form>
                </div>
                <div class="toolbar clearfix">
                  <!--<div> <a href="#" data-target="#forgot-box" class="forgot-password-link"> <i class="ace-icon fa fa-arrow-left"></i> I forgot my password </a> </div>-->
                  <div class="pull-right"> <a href="#" data-target="#signup-box" class="user-signup-link"> I want to register <i class="ace-icon fa fa-arrow-right"></i> </a> </div>
                </div>
                <div class="toolbar clearfix" style="background:#DD5A43;">
                  <!--<div> <a href="#" data-target="#forgot-box" class="forgot-password-link"> <i class="ace-icon fa fa-arrow-left"></i> I forgot my password </a> </div>-->
                  <a href="<?php echo site_url("search"); ?>" id="search-documents">
                  <div><p style="color:#FFF; text-align:center; margin-top:5px;">Search Documents</p></div></a>
                </div>
              </div>
              <style>#search-documents:hover{text-decoration:none;}</style>
              <!-- /.widget-body --> 
            </div>
            <!-- /.login-box -->
            
            <div id="forgot-box" class="forgot-box widget-box no-border">
              <div class="widget-body">
                <div class="widget-main">
                  <h4 class="header red lighter bigger"> <i class="ace-icon fa fa-key"></i> Retrieve Password </h4>
                  <div class="space-6"></div>
                  <p> Enter your email and to receive instructions </p>
                  <form>
                    <fieldset>
                      <label class="block clearfix"> <span class="block input-icon input-icon-right">
                        <input type="email" class="form-control" placeholder="Email" />
                        <i class="ace-icon fa fa-envelope"></i> </span> </label>
                      <div class="clearfix">
                        <button type="button" class="width-35 pull-right btn btn-sm btn-danger"> <i class="ace-icon fa fa-lightbulb-o"></i> <span class="bigger-110">Send Me!</span> </button>
                      </div>
                    </fieldset>
                  </form>
                </div>
                <!-- /.widget-main -->
                
                <div class="toolbar center"> <a href="#" data-target="#login-box" class="back-to-login-link"> Back to login <i class="ace-icon fa fa-arrow-right"></i> </a> </div>
              </div>
              <!-- /.widget-body --> 
            </div>
            <!-- /.forgot-box -->
            
            <div id="signup-box" class="signup-box widget-box no-border">
              <div class="widget-body">
                <div class="widget-main">
                  <h4 class="header green lighter bigger"> <i class="ace-icon fa fa-users blue"></i> New User Registration </h4>
                  <div class="space-6"></div>
                  <p> Enter your details to begin: </p>
                  <p style="font-size:12px; display:none;" id="register_wait"><img src="<?php echo base_url('assets/img/loading.gif'); ?>" style="float:left;"> &nbsp;&nbsp; Please wait...</p>
                  <p style="font-size:12px; color:#ed1717; display:none;" id="register_error"></p>
                  <p style="font-size:12px; color:#29ba41; display:none;" id="register_success"></p>
                  <form action="<?php echo site_url("homepage/register"); ?>" method="post" name="form-register" id="form-register">
                    <fieldset>
                      <label class="block clearfix"> <span class="block input-icon input-icon-right">
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" />
                        </span> </label>
                      <label class="block clearfix"> <span class="block input-icon input-icon-right">
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" />
                        </span> </label>
                      <label class="block clearfix"> <span class="block input-icon input-icon-right">
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Username" />
                        <i class="ace-icon fa fa-user"></i> </span> </label>
                      <label class="block clearfix"> <span class="block input-icon input-icon-right">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
                        <i class="ace-icon fa fa-envelope"></i> </span> </label>
                      <label class="block clearfix"> <span class="block input-icon input-icon-right">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                        <i class="ace-icon fa fa-lock"></i> </span> </label>
                      <label class="block clearfix"> <span class="block input-icon input-icon-right">
                        <input type="password" class="form-control" name="re_password" id="re_password" placeholder="Repeat password" />
                        <i class="ace-icon fa fa-retweet"></i> </span> </label>
                      <label class="block clearfix"> <span class="block input-icon input-icon-right">
                        <select class="chzn-select width-100 form-control" data-placeholder="Choose a Department..." style="min-width: 301px;" name="department" id="department">
                          <option value=""></option>
                          <?php if($departments->num_rows()>0){ ?>
                          <?php foreach($departments->result() as $row){ ?>
                          <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                          <?php } ?>
                          <?php } ?>
                        </select>
                        </span> </label>
                      <label class="block clearfix">
                      Gender: &nbsp;&nbsp;&nbsp;
                      <label for="male">
                        <input type="radio" name="gender" id="male" value="male">
                        <span class="lbl"> Male</span> </label>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label for="female">
                        <input type="radio" name="gender" id="female" value="female">
                        <span class="lbl"> Female</span> </label>
                      </label>
                      <div style="clear:both;"></div>
                      <label class="block clearfix">
                      Type: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label for="teacher">
                        <input type="radio" name="user_type" id="teacher" value="1">
                        <span class="lbl"> Teacher</span> </label>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label for="student">
                        <input type="radio" name="user_type" id="student" value="2">
                        <span class="lbl"> Student</span> </label>
                      </label>
                      <label class="block clearfix">
                        <input class="span10 date-picker form-control" name="dob" id="dob" type="text" data-date-format="dd-mm-yyyy" placeholder="Date of birth" />
                      </label>
                      <div class="clearfix">
                        <button type="button" class="width-100 pull-right btn btn-sm btn-success" onClick="register()"> <span class="bigger-110">Register</span> <i class="ace-icon fa fa-arrow-right icon-on-right"></i>  </button>
                      </div>
                    </fieldset>
                  </form>
                </div>
                <div class="toolbar center"> <a href="#" data-target="#login-box" class="back-to-login-link"> <i class="ace-icon fa fa-arrow-left"></i> Back to login </a> </div>
              </div>
              <!-- /.widget-body --> 
            </div>
            <!-- /.signup-box --> 
          </div>
          <!-- /.position-relative --> 
          
          <!--<div class="navbar-fixed-top align-right"> <br />
            &nbsp; <a id="btn-login-dark" href="#">Dark</a> &nbsp; <span class="blue">/</span> &nbsp; <a id="btn-login-blur" href="#">Blur</a> &nbsp; <span class="blue">/</span> &nbsp; <a id="btn-login-light" href="#">Light</a> &nbsp; &nbsp; &nbsp; </div>--> 
        </div>
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
  </div>
  <!-- /.main-content --> 
</div>
<!-- /.main-container --> 

<!-- basic scripts --> 

<!--[if !IE]> -->
		<script src="<?php echo base_url(); ?>assets/ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

		<!-- <![endif]--> 

<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<![endif]--> 

<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]--> 

<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]--> 
<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script> 
<script src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script> 
<!-- inline scripts related to this page --> 
<script type="text/javascript">
function register(){
	var con = false;
	$("#register_error").html('');
	$("#register_error").hide();
	$("#register_success").hide();
	var first_name = $("#first_name").val();	
	var user_name = $("#user_name").val();	
	var email = $("#email").val();	
	var password = $("#password").val();	
	var re_password = $("#re_password").val();	
	var department = $("#department").val();
	var user_type = $("#user_type").val();

	if(first_name==""){
		$("#register_error").fadeIn(400);
		$("#register_error").append("Please enter your first name<br>");	
	}
	if(user_name==""){
		$("#register_error").fadeIn(400);
		$("#register_error").append("Please choose your username<br>");	
	}
	if(email==""){
		$("#register_error").fadeIn(400);
		$("#register_error").append("Please enter your email<br>");	
	}
	if(password==""){
		$("#register_error").fadeIn(400);
		$("#register_error").append("Please choose your password<br>");	
	}else
	if(re_password==""){
		$("#register_error").fadeIn(400);
		$("#register_error").append("Please rewrite your password<br>");	
	}else
	if(password!=re_password){
		$("#register_error").fadeIn(400);
		$("#register_error").append("Your password does not match<br>");	
	}
	if(user_type==""){
		$("#register_error").fadeIn(400);
		$("#register_error").append("Please select your profile type<br>");	
	}
	if(department==""){
		$("#register_error").fadeIn(400);
		$("#register_error").append("Please choose your department<br>");	
	}
	
	if(user_name!="" && email!="" && password!="" && password==re_password && department!="" && user_type!=""){
		$("#register_wait").fadeIn(400);
		
		$.post("<?php echo site_url("homepage/register"); ?>", $( "#form-register" ).serialize()).done(function(result){
			var obj = jQuery.parseJSON(result);
			if(obj.type==false){
				$("#register_wait").hide();
				$("#register_error").html(obj.message);	
				$("#register_error").fadeIn(400);
			}
			if(obj.type==true){
				$("#register_wait").hide();
				$("#register_error").hide();
				$("#register_success").fadeIn(400);
				$("#register_success").html(obj.message);	
			}
		});
	}
	
}
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			 $(".chzn-select").chosen(); 
				$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
</body>

<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 13 Jun 2014 06:39:32 GMT -->
</html>
