<?php //echo '<pre>'; var_exit(user_role()); exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php echo $title; ?>::<?php echo site_title; ?></title>
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/fav.png">
<meta name="description" content="<?php echo tagline; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" />

<!-- page specific plugin styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/daterangepicker.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colorpicker.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colorbox.css" />

<!-- page specific plugin styles -->

<!-- text fonts -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

<!-- ace styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" />

<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-part2.min.css" />
		<![endif]-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-rtl.min.css" />

<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-ie.min.css" />
		<![endif]-->

<!-- inline styles related to this page -->

<!-- ace settings handler -->
<script src="<?php echo base_url(); ?>assets/js/ace-extra.min.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

<!--[if lte IE 8]>
		<script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
		<![endif]-->
<link href="<?php echo base_url(); ?>assets/video/video-js.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/video/video.js"></script>
<script>
videojs.options.flash.swf = "video-js.swf";
</script>
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default"> 
  <script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
  <div class="navbar-container" id="navbar-container">
    <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler"> <span class="sr-only">Toggle sidebar</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <div class="navbar-header pull-left"> <a href="<?php echo site_url(); ?>" class="navbar-brand"> <small><img src="<?php echo base_url(); ?>assets/img/fav.png" style="width: 37px;" /> ILM Data Drive <?php if($this->session->userdata("isLoggedIn")){ if($user->user_rights==1){ ?>:: Administrator<?php }} ?> </small> </a> </div>
    <?php if($this->session->userdata("isLoggedIn")){ ?>
    <?php include(APPPATH.'views/inc/top-right.php'); ?>
    <?php } ?>
  </div>
  <!-- /.navbar-container --> 
</div>
<div class="main-container" id="main-container">
<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
<?php if($this->session->userdata("isLoggedIn")){ ?>            
<div id="sidebar" class="sidebar                  responsive"> 
  <script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script> 
  
  <!-- /.sidebar-shortcuts -->
  <?php if($this->session->userdata("isLoggedIn")){ ?>
  <?php include(APPPATH.'views/inc/menu.php'); ?>
  <?php } ?>
  
  <!-- /.nav-list -->
  
  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse"> <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i> </div>
  <script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script> 
</div>
<?php } ?>
<div class="main-content">
<?php if($this->session->userdata("isLoggedIn")){ ?>
<?php include(APPPATH.'views/inc/breadcrumbs.php'); ?>
<?php } ?>
<div class="page-content">
<?php if($this->session->userdata("isLoggedIn")){ ?>
<?php include(APPPATH.'views/inc/errors.php'); ?>
<?php } ?>
