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
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar"> 
  <script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
  <div class="navbar-container" id="navbar-container">
    <div class="navbar-header pull-left"> <a href="<?php echo site_url(); ?>" class="navbar-brand"> <small><img src="<?php echo base_url(); ?>assets/img/fav.png" style="width: 37px;" /> ILM Data Drive </small> </a>
      <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu"> <span class="sr-only">Toggle user menu</span> <img src="<?php echo base_url(); ?>assets/avatars/avatar2.png" alt="" /> </button>
      <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".sidebar"> <span class="sr-only">Toggle sidebar</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    </div>
    <?php include(APPPATH.'views/inc/top-right.php'); ?>
  </div>
  <!-- /.navbar-container --> 
</div>
<div class="main-container" id="main-container">
<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
<div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse"> 
  <script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script> 
  
  <!-- /.sidebar-shortcuts -->
  
  <?php include(APPPATH.'views/inc/menu.php'); ?>
  <!-- /.nav-list -->
  
  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse"> <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i> </div>
  <script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script> 
</div>
<div class="main-content">
<div class="page-header">
  <?php include(APPPATH.'views/inc/breadcrumbs.php'); ?>
</div>
<div class="page-content">
<?php include(APPPATH.'views/inc/errors.php'); ?>
