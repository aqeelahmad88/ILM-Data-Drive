<div class="breadcrumbs" id="breadcrumbs"> 
  <script type="text/javascript">
						try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
					</script>
  <ul class="breadcrumb">
    <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="<?php echo site_url("dashboard"); ?>">Home</a>
      <?php if($this->uri->segment(1)!=""){ ?>
      <span class="divider"> <i class="icon-angle-right arrow-icon"></i> </span>
      <?php } ?>
    </li>
    <li>
      <?php if($this->uri->segment(2)!=""){ ?>
      <a href="<?php echo site_url($this->uri->segment(1)); ?>">
      <?php } ?>
      <?php echo string_filter($this->uri->segment(1)); ?>
      <?php if($this->uri->segment(2)!=""){ ?>
      </a>
      <?php } ?>
      <?php if($this->uri->segment(2)!=""){ ?>
      <span class="divider"> <i class="icon-angle-right arrow-icon"></i> </span>
      <?php } ?>
    </li>
    <?php if($this->uri->segment(2)!=""){ ?>
    <li class="active"><?php echo string_filter($this->uri->segment(2)); ?></li>
    <?php } ?>
  </ul>
  <!-- /.breadcrumb -->
  
  <?php include(APPPATH.'views/inc/top-search.php'); ?>
  <!-- /.nav-search --> 
</div>
<?php if($user->user_rights!=1){ ?>
<?php $space = get_remaining_space(); ?>
<div data-percent="<?php echo $space["remaining"]; ?> out of <?php echo $space["total"]; ?> Disk Space Remaining" class="progress">
  <div style="width:<?php echo $space["percentage"]; ?>%;" class="progress-bar"></div>
</div>
<?php } ?>
