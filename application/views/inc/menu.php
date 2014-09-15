<ul class="nav nav-list">
  <li class="<?php if($this->uri->segment(1)=="dashboard"){ ?>active open<?php } ?>"> <a href="<?php echo site_url("dashboard"); ?>"> <i class="menu-icon fa fa-tachometer"></i> <span class="menu-text"> Dashboard </span> </a> <b class="arrow"></b> </li>
  <?php if($user->user_rights!=1){ ?>
  <?php $elements = "documents"; ?>
  <?php $icons = "briefcase"; ?>
  <li class="<?php if($this->uri->segment(1)==$elements){ ?>active open<?php } ?>"> <a href="<?php echo site_url($elements); ?>" class="dropdown-toggle"> <i class="menu-icon fa fa-<?php echo $icons; ?>"></i> <span class="menu-text"> <?php echo ucwords($elements); ?> </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
    <ul class="submenu">
      <li class="<?php if($this->uri->segment(1)==$elements && $this->uri->segment(2)==""){ ?>active open<?php } ?>"> <a href="<?php echo site_url($elements); ?>"> <i class="menu-icon fa fa-caret-right"></i> List All </a> <b class="arrow"></b> </li>
      <li class="<?php if($this->uri->segment(1)==$elements && $this->uri->segment(2)=="add_new"){ ?>active open<?php } ?>"> <a href="<?php echo site_url($elements."/add_new"); ?>"> <i class="menu-icon fa fa-caret-right"></i> Add New </a> <b class="arrow"></b> </li>
    </ul>
  </li>
  <?php $elements = "semesters_subjects"; ?>
  <?php $icons = "list-alt"; ?>
  <li class="<?php if($this->uri->segment(1)==$elements){ ?>active open<?php } ?>"> <a href="<?php echo site_url($elements); ?>" > <i class="menu-icon fa fa-<?php echo $icons; ?>"></i> <span class="menu-text">
    <?php
  	if(strtolower($user->type_name)=="student"){
		echo "Semes. & Sub.";
	}else{
		echo "Subjects";
	}
  ?>
    </span></a> <b class="arrow"></b> </li>
  <?php } ?>
  <?php if($user->user_rights==1){ ?>
  <?php $elements = "find_users"; ?>
  <?php $icons = "users"; ?>
  <li class="<?php if($this->uri->segment(1)==$elements){ ?>active open<?php } ?>"> <a href="<?php echo site_url($elements); ?>" > <i class="menu-icon fa fa-<?php echo $icons; ?>"></i> <span class="menu-text">Users</span></a> <b class="arrow"></b> </li>
  <?php $elements = "departments"; ?>
  <?php $icons = "exchange"; ?>
  <li class="<?php if($this->uri->segment(1)==$elements){ ?>active open<?php } ?>"> <a href="<?php echo site_url($elements); ?>" > <i class="menu-icon fa fa-<?php echo $icons; ?>"></i> <span class="menu-text">Departments</span></a> <b class="arrow"></b> </li>
  <?php } ?>
  <?php $elements = "search"; ?>
  <?php $icons = "eye"; ?>
  <li class="<?php if($this->uri->segment(1)==$elements){ ?>active open<?php } ?>"> <a href="<?php echo site_url($elements); ?>" > <i class="menu-icon fa fa-<?php echo $icons; ?>"></i> <span class="menu-text">Search</span></a> <b class="arrow"></b> </li>
</ul>
