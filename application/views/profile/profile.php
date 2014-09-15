<?php
	$path = './uploads/'.strtolower($users->u_type).'/'.$users->user_name.'/'.$users->avatar;
	$avatar = base_url().'/uploads/'.strtolower($users->u_type).'/'.$users->user_name.'/'.$users->avatar;
	//echo '<pre>';print_r(json_decode($users->privacy));
?>

<div id="home" class="tab-pane in active">
  <div class="row">
    <div class="col-xs-12 col-sm-3 center">
      <div>
        <?php if($users->avatar){ if(file_exists($path)){ ?>
        <span class="profile-picture"> <img class="img-responsive" alt="<?php echo $users->first_name. ' '. $users->last_name; ?>" src="<?php echo $avatar; ?>" width="180" height="200" /> </span>
        <?php }} ?>
        <div class="space-4"></div>
        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
          <div class="inline position-relative"> <i class="ace-icon fa fa-circle light-green"></i> &nbsp; <span class="white"><?php echo $users->first_name.' '.$users->last_name; ?></span> </div>
        </div>
      </div>
      <div class="space-6"></div>
      <div class="profile-contact-info">
        <div class="space-6"></div>
        <div class="profile-social-links align-center">
          <?php if(privacy($users->id, 'facebook')!=1){ ?>
          <a href="<?php echo url_filter($users->facebook); ?>" class="tooltip-info" title="" data-original-title="Visit my Facebook" target="_blank"> <i class="middle ace-icon fa fa-facebook-square fa-2x blue"></i> </a>
          <?php } ?>
          <?php if(privacy($users->id, 'twitter')!=1){ ?>
          <a href="<?php echo url_filter($users->twitter); ?>" class="tooltip-info" title="" data-original-title="Visit my Twitter" target="_blank"> <i class="middle ace-icon fa fa-twitter-square fa-2x light-blue"></i> </a>
          <?php } ?>
          <?php if(privacy($users->id, 'linkedin')!=1){ ?>
          <a href="<?php echo url_filter($users->linkedin); ?>" class="tooltip-error" title="" data-original-title="Visit my Linkedin" target="_blank"> <i class="middle ace-icon fa fa-linkedin-square fa-2x red"></i> </a>
          <?php } ?>
        </div>
      </div>
      <div class="hr hr12 dotted"></div>
      <div class="clearfix">
        <div class="grid2"> <span class="bigger-175 blue"><?php echo total_docs($users->id); ?></span> <br />
          Documents </div>
        <div class="grid2"> <span class="bigger-175 blue"><?php echo total_images($users->id); ?></span> <br />
          Pictures </div>
      </div>
      <div class="hr hr16 dotted"></div>
    </div>
    <!-- /.col -->
    
    <div class="col-xs-12 col-sm-9">
      <h4 class="blue"> <span class="middle"><?php echo $users->dep_name; ?></span> <span class="label label-purple arrowed-in-right"> <i class="ace-icon fa fa-circle smaller-80 align-middle"></i> <?php echo $users->u_type ?> </span> </h4>
      <div class="profile-user-info profile-user-info-striped">
        <?php if($users->user_name){ ?>
        <div class="profile-info-row">
          <div class="profile-info-name"> Username </div>
          <div class="profile-info-value"> <?php echo $users->user_name; ?> </div>
        </div>
        <?php } ?>
        <?php if(privacy($users->id, 'city')!=1 || privacy($users->id, 'province')!=1 || privacy($users->id, 'country')!=1){ ?>
        <div class="profile-info-row">
          <div class="profile-info-name"> Location </div>
          <div class="profile-info-value"> <i class="fa fa-map-marker light-orange bigger-110"></i> <span class="editable">
            <?php if(privacy($users->id, 'city')!=1){ echo $users->city; } ?>
            <?php if(privacy($users->id, 'province')!=1){ echo $users->province; } ?>
            <?php if(privacy($users->id, 'country')!=1){ echo $users->country; } ?>
            </span> </div>
        </div>
        <?php } ?>
        <?php if($users->time){ ?>
        <div class="profile-info-row">
          <div class="profile-info-name"> Joined </div>
          <div class="profile-info-value"><?php echo date('F d, Y', strtotime($users->time)); ?> </div>
        </div>
        <?php } ?>
        <?php if($users->father_name && privacy($users->id, 'father_name')!=1){ ?>
        <div class="profile-info-row">
          <div class="profile-info-name"> Father Name </div>
          <div class="profile-info-value"> <?php echo $users->father_name; ?> </div>
        </div>
        <?php } ?>
        <?php if($users->email && privacy($users->id, 'email')!=1){ ?>
        <div class="profile-info-row">
          <div class="profile-info-name"> Email </div>
          <div class="profile-info-value"> <?php echo $users->email; ?> </div>
        </div>
        <?php } ?>
        <?php if($users->gender && privacy($users->id, 'gender')!=1){ ?>
        <div class="profile-info-row">
          <div class="profile-info-name"> Gender </div>
          <div class="profile-info-value"> <?php echo ucwords($users->gender); ?> </div>
        </div>
        <?php } ?>
        <?php if($users->blood_group && privacy($users->id, 'blood_group')!=1){ ?>
        <div class="profile-info-row">
          <div class="profile-info-name"> Blood Group </div>
          <div class="profile-info-value"> <?php echo $users->blood_group; ?> </div>
        </div>
        <?php } ?>
        <?php if($users->cnic && privacy($users->id, 'cnic')!=1){ ?>
        <div class="profile-info-row">
          <div class="profile-info-name"> CNIC </div>
          <div class="profile-info-value"> <?php echo $users->cnic; ?> </div>
        </div>
        <?php } ?>
        <?php if($users->contact_number && privacy($users->id, 'contact_number')!=1){ ?>
        <div class="profile-info-row">
          <div class="profile-info-name"> Phone Number </div>
          <div class="profile-info-value"> <?php echo $users->contact_number; ?> </div>
        </div>
        <?php } ?>
        <?php if($users->dob && privacy($users->id, 'dob')!=1){ ?>
        <div class="profile-info-row">
          <div class="profile-info-name"> DOB </div>
          <div class="profile-info-value"> <?php echo $users->dob; ?> </div>
        </div>
        <?php } ?>
        <?php if($users->postal_address && privacy($users->id, 'postal_address')!=1){ ?>
        <div class="profile-info-row">
          <div class="profile-info-name"> Postal Address </div>
          <div class="profile-info-value"> <?php echo $users->postal_address; ?> </div>
        </div>
        <?php } ?>
      </div>
      <div class="hr hr-8 dotted"></div>
    </div>
    <!-- /.col --> 
  </div>
  <!-- /.row -->
  
  <div class="space-20"></div>
  <div class="row">
    <div class="col-xs-12 col-sm-6">
      <div class="widget-box transparent">
        <div class="widget-header widget-header-small">
          <h4 class="widget-title smaller"> <i class="ace-icon fa fa-check-square-o bigger-110"></i> Little About Me </h4>
        </div>
        <div class="widget-body">
          <div class="widget-main">
            <p> <?php echo $users->about; ?> </p>
            <p> Thanks for visiting my profile. </p>
          </div>
        </div>
      </div>
    </div>
    <?php $rs = json_decode($users->resume); ?>
    <?php if($rs && privacy($users->id, 'resume')!=1){ ?>
    <div class="col-xs-12 col-sm-6">
      <div class="widget-box transparent">
        <div class="widget-header widget-header-small header-color-blue2">
          <h4 class="widget-title smaller"> <i class="ace-icon fa fa-lightbulb-o bigger-120"></i> My Skills </h4>
        </div>
        <div class="widget-body">
          <div class="widget-main padding-16">
            <div class="clearfix">
              <?php $j=0; ?>
              <?php $colors = array("CA5952", "59A84B", "9585BF", "F2BB46", "2A91D8"); ?>
              <?php for($i=0; $i<count($rs->skill_name); $i++){ ?>
              <?php if($j==5){$j=0;} ?>
              <div class="grid3 center">
                <div class="easy-pie-chart percentage" data-percent="<?php echo $rs->about_skill[$i]; ?>" data-color="#<?php echo $colors[$j]; ?>"> <span class="percent"><?php echo $rs->about_skill[$i]; ?></span>% </div>
                <div class="space-2"></div>
                <?php echo $rs->skill_name[$i]; ?> </div>
              <?php $j++; } ?>
            </div>
            <div class="hr hr-16"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12">
        <div class="col-xs-6 col-sm-6">
          <div class="widget-box transparent">
            <div class="widget-header widget-header-small header-color-blue2">
              <h4 class="widget-title smaller"> <i class="ace-icon fa fa-lightbulb-o bigger-120"></i> Education </h4>
            </div>
            <div class="widget-body">
              <div class="widget-main padding-16">
                <?php $j=0; ?>
                <?php $colors = array("", "progress-bar-success", "progress-bar-purple", "progress-bar-warning", "progress-bar-danger"); ?>
                <?php for($i=0; $i<count($rs->edu_degree); $i++){ ?>
                <?php if($j==5){$j=0;} ?>
                <div class="profile-skills">
                  <div class="progress">
                    <div class="progress-bar <?php echo $colors[$j]; ?>" style="width:80%"> <span class="pull-left"><?php echo $rs->edu_degree[$i]; ?></span> </div>
                  </div>
                </div>
                <table width="100%">
                  <tr>
                    <th style="width:100px;">Organization</th>
                    <td><?php echo $rs->edu_institution[$i]; ?></td>
                  </tr>
                  <tr>
                    <th>Year</th>
                    <td><?php echo $rs->edu_year[$i]; ?></td>
                  </tr>
                </table>
                <br />
                <?php $j++; } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6">
          <div class="widget-box transparent">
            <div class="widget-header widget-header-small header-color-blue2">
              <h4 class="widget-title smaller"> <i class="ace-icon fa fa-lightbulb-o bigger-120"></i> Work & Experiences </h4>
            </div>
            <div class="widget-body">
              <div class="widget-main padding-16">
                <?php $j=0; ?>
                <?php $colors = array("progress-bar-danger", "progress-bar-warning", "progress-bar-purple", "progress-bar-success", ""); ?>
                <?php for($i=0; $i<count($rs->ex_organization); $i++){ ?>
                <?php if($j==5){$j=0;} ?>
                <div class="profile-skills">
                  <div class="progress">
                    <div class="progress-bar <?php echo $colors[$j]; ?>" style="width:80%"> <span class="pull-left"><?php echo $rs->ex_organization[$i]; ?></span> </div>
                  </div>
                </div>
                <table width="100%">
                  <tr>
                    <th style="width:100px;">Designation</th>
                    <td><?php echo $rs->ex_designation[$i]; ?></td>
                  </tr>
                  <tr>
                    <th>From</th>
                    <td><?php echo $rs->ex_from[$i]; ?></td>
                  </tr>
                  <tr>
                    <th>To</th>
                    <td><?php echo $rs->ex_to[$i]; ?></td>
                  </tr>
                </table>
                <br />
                <?php $j++; } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
