<div class="navbar-buttons navbar-header pull-right" role="navigation">
  <ul class="nav ace-nav">
    <li class="light-blue"> <a data-toggle="dropdown" href="#" class="dropdown-toggle"> <img class="nav-user-photo" src="<?php echo avatar($user->id); ?>" alt="Jason's Photo" /> <span class="user-info"> <small>Welcome,</small> <?php echo ucwords($user->first_name); ?> </span> <i class="ace-icon fa fa-caret-down"></i> </a>
      <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
        <?php if($user->user_rights!=1){ ?>
        <li> <a href="<?php echo site_url("settings"); ?>"> <i class="ace-icon fa fa-cog"></i> Settings </a> </li>
        <li> <a href="<?php echo site_url("profile"); ?>"> <i class="ace-icon fa fa-user"></i> Profile </a> </li>
        <li class="divider"></li>
        <?php } ?>
        <li> <a href="<?php echo site_url("homepage/logout"); ?>"> <i class="ace-icon fa fa-power-off"></i> Logout </a> </li>
      </ul>
    </li>
  </ul>
</div>
