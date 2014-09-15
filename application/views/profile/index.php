<?php include(APPPATH."views/inc/header.php"); ?>

<div id="timeline-1">
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
      <div id="user-profile-2" class="user-profile">
        <div class="tabbable">
          <ul class="nav nav-tabs padding-18">
            <li class="active"> <a data-toggle="tab" href="#home"> <i class="green ace-icon fa fa-user bigger-120"></i> Profile </a> </li>
            <li> <a data-toggle="tab" href="#documents"> <i class="orange ace-icon fa fa-briefcase bigger-120"></i> Documents </a> </li>
            <!--<li> <a data-toggle="tab" href="#friends"> <i class="blue ace-icon fa fa-users bigger-120"></i> Friends </a> </li>-->
            <li> <a data-toggle="tab" href="#pictures"> <i class="pink ace-icon fa fa-picture-o bigger-120"></i> Pictures </a> </li>
          </ul>
          <div class="tab-content no-border padding-24">
            <?php include("profile.php"); ?>
            <?php include("documents.php"); ?>
            <?php include("pictures.php"); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(APPPATH."views/inc/footer.php"); ?>
