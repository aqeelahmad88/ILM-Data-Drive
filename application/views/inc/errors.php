<?php if($this->session->flashdata("success")){ ?>

<div class="alert alert-block alert-success">
  <button data-dismiss="alert" class="close" type="button"> <i class="ace-icon fa fa-times"></i> </button>
  <p><?php echo $this->session->flashdata("success"); ?></p>
</div>
<?php } ?>
<?php if($this->session->flashdata("error")){ ?>
<div class="alert alert-danger">
  <button data-dismiss="alert" class="close" type="button"> <i class="ace-icon fa fa-times"></i> </button>
  <?php echo $this->session->flashdata("error"); ?> </div>
<?php } ?>
<?php if(validation_errors()){ ?>
<style>
p{margin:0 0 -5px;}
</style>
<div class="alert alert-danger" style="font-size:12px;">
  <button data-dismiss="alert" class="close" type="button"> <i class="ace-icon fa fa-times"></i> </button>
  <?php echo validation_errors(); ?> </div>
<?php } ?>
