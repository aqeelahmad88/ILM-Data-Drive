<?php include(APPPATH."views/inc/header.php"); ?>

<div id="timeline-1">
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
      <?php if($todaydocuments->num_rows()>0){ ?>
      <div class="timeline-container">
        <div class="timeline-label"> <span class="label label-primary arrowed-in-right label-lg"> <b>Today</b> </span> </div>
        <div class="timeline-items">
          <?php foreach($todaydocuments->result() as $row){ ?>
          <div class="timeline-item clearfix">
            <div class="timeline-info"> <img alt="<?php echo $row->fullname; ?>" src="<?php echo avatar($row->user_id); ?>" /> </div>
            <div class="widget-box transparent">
              <div class="widget-header widget-header-small">
                <h5 class="widget-title smaller"><span class="grey">New document added by</span> <a href="<?php echo site_url("profile/".$row->user_name); ?>" class="blue"><?php echo $row->fullname; ?></a> </h5>
                <span class="widget-toolbar no-border"><span class="grey"><span style="color:#478fca !important;">Department:</span> <?php echo $row->department; ?></span> | <span class="grey"><span style="color:#478fca !important;">User Type:</span> <?php echo $row->user_type; ?></span> | <i class="ace-icon fa fa-download"></i> <a href="<?php echo base_url().'uploads/'.$row->doc_paths.'/'.$row->uploaded_filename; ?>" target="_blank"class="blue">Download</a> | <i class="ace-icon fa fa-clock-o bigger-110"></i> <?php echo format_date($row->date_time); ?>
                <?php if($user->user_rights==1){ ?>
                | <a class="red" href="<?php echo site_url("documents/delete/".$row->id); ?>" onclick="return confirm('Are you sure you wish to proceed?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
                <?php } ?>
                </span> </div>
              <div class="widget-body">
                <div class="widget-main"> <span class="grey"><strong>"<?php echo $row->filename; ?>"</strong></span><br />
                  <?php echo $row->fullname; ?> added new document for subject <span class="red">"<?php echo $row->subject; ?>"</span>
                  <?php if(strtolower($row->user_type)=="student"){ ?>
                  in the <span style="color:#FF892A;">"<?php echo $row->semester; ?>"</span>
                  <?php } ?>
                  . <br />
                  File name is <span class="green"> <?php echo $row->name; ?></span>&hellip; <?php echo icon($row->type); ?> :: <?php echo get_dg($row->filesize); ?> <br />
                  <br />
                  <div class="pull-left" id="preview_panel">
                    <?php
				  	$url = base_url().'uploads/'.$row->doc_paths.'/'.$row->uploaded_filename;
				  	echo get_preview($row->type, $row->type, $url);
				  ?>
                  </div>
                  <div style="clear:both;"></div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <!-- /.timeline-items --> 
      </div>
      <?php } ?>
      <!-- /.timeline-container -->
      <?php if($yesterdaydocuments->num_rows()>0){ ?>
      <div class="timeline-container">
        <div class="timeline-label"> <span class="label label-success arrowed-in-right label-lg"> <b>Yesterday</b> </span> </div>
        <div class="timeline-items">
          <?php foreach($yesterdaydocuments->result() as $row){ ?>
          <div class="timeline-item clearfix">
            <div class="timeline-info"> <img alt="<?php echo $row->fullname; ?>" src="<?php echo avatar($row->user_id); ?>" /> </div>
            <div class="widget-box transparent">
              <div class="widget-header widget-header-small">
                <h5 class="widget-title smaller"><span class="grey">New document added by</span> <a href="<?php echo site_url("profile/".$row->user_name); ?>" class="blue"><?php echo $row->fullname; ?></a> </h5>
                <span class="widget-toolbar no-border"><span class="grey"><span style="color:#478fca !important;">Department:</span> <?php echo $row->department; ?></span> | <span class="grey"><span style="color:#478fca !important;">User Type:</span> <?php echo $row->user_type; ?></span> | <i class="ace-icon fa fa-download"></i> <a href="<?php echo base_url().'uploads/'.$row->doc_paths.'/'.$row->uploaded_filename; ?>" target="_blank"class="blue">Download</a> | <i class="ace-icon fa fa-clock-o bigger-110"></i> <?php echo format_date($row->date_time); ?>
                <?php if($user->user_rights==1){ ?>
                | <a class="red" href="<?php echo site_url("documents/delete/".$row->id); ?>" onclick="return confirm('Are you sure you wish to proceed?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
                <?php } ?>
                </span> </div>
              <div class="widget-body">
                <div class="widget-main"> <span class="grey"><strong>"<?php echo $row->filename; ?>"</strong></span><br />
                  <?php echo $row->fullname; ?> added new document for subject <span class="red">"<?php echo $row->subject; ?>"</span>
                  <?php if(strtolower($row->user_type)=="student"){ ?>
                  in the <span style="color:#FF892A;">"<?php echo $row->semester; ?>"</span>
                  <?php } ?>
                  . <br />
                  File name is <span class="green"> <?php echo $row->name; ?></span>&hellip; <?php echo icon($row->type); ?> :: <?php echo get_dg($row->filesize); ?> <br />
                  <br />
                  <div class="pull-left" id="preview_panel">
                    <?php
				  	$url = base_url().'uploads/'.$row->doc_paths.'/'.$row->uploaded_filename;
				  	echo get_preview($row->type, $row->type, $url);
				  ?>
                  </div>
                  <div style="clear:both;"></div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <!-- /.timeline-items --> 
      </div>
      <?php } ?>
      <!-- /.timeline-container -->
      <?php if($otherdocuments->num_rows()>0){ ?>
      <?php foreach($otherdocuments->result() as $row){ ?>
      <div class="timeline-container">
        <?php
      	$colors = array("brown", "pink", "grey", "blue", "orange", "purple", "black");
		$colors = $colors[array_rand($colors, 1)];
		$data = $this->common_model->query("
			SELECT documents.id, users.id AS user_id, users.user_name, user_type.`type` AS user_type, departments.name AS department, CONCAT(users.first_name,' ',users.last_name) AS fullname, semesters.semester, subjects.subjects AS subject, documents.filename, documents.filesize, documents.name, documents.`type`, documents.time AS date_time, documents.doc_paths, documents.uploaded_filename 
			FROM documents 
			LEFT JOIN users ON documents.user_id = users.id
			LEFT JOIN semesters ON documents.semester_id = semesters.id
			LEFT JOIN subjects ON documents.subject_id = subjects.id
			LEFT JOIN departments ON users.department = departments.id
			LEFT JOIN user_type ON users.user_type = user_type.id
			WHERE DATE(documents.time) = '".$row->dates."'
			AND documents.privacy = 0
			ORDER BY documents.time DESC
		");
	  ?>
        <?php if($data->num_rows()>0){ ?>
        <div class="timeline-label"> <span class="label label-<?php echo $colors; ?> arrowed-in-right label-lg"> <b><?php echo date('M d', strtotime($row->dates)); ?></b> </span> </div>
        <div class="timeline-items">
          <?php foreach($data->result() as $row){ ?>
          <div class="timeline-item clearfix">
            <div class="timeline-info"> <img alt="<?php echo $row->fullname; ?>" src="<?php echo avatar($row->user_id); ?>" /> </div>
            <div class="widget-box transparent">
              <div class="widget-header widget-header-small">
                <h5 class="widget-title smaller"><span class="grey">New document added by</span> <a href="<?php echo site_url("profile/".$row->user_name); ?>" class="blue"><?php echo $row->fullname; ?></a> </h5>
                <span class="widget-toolbar no-border"><span class="grey"><span style="color:#478fca !important;">Department:</span> <?php echo $row->department; ?></span> | <span class="grey"><span style="color:#478fca !important;">User Type:</span> <?php echo $row->user_type; ?></span> | <i class="ace-icon fa fa-download"></i> <a href="<?php echo base_url().'uploads/'.$row->doc_paths.'/'.$row->uploaded_filename; ?>" target="_blank"class="blue">Download</a> | <i class="ace-icon fa fa-clock-o bigger-110"></i> <?php echo format_date($row->date_time); ?>
                <?php if($user->user_rights==1){ ?>
                | <a class="red" href="<?php echo site_url("documents/delete/".$row->id); ?>" onclick="return confirm('Are you sure you wish to proceed?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
                <?php } ?>
                </span> </div>
              <div class="widget-body">
                <div class="widget-main"> <span class="grey"><strong>"<?php echo $row->filename; ?>"</strong></span><br />
                  <?php echo $row->fullname; ?> added new document for subject <span class="red">"<?php echo $row->subject; ?>"</span>
                  <?php if(strtolower($row->user_type)=="student"){ ?>
                  in the <span style="color:#FF892A;">"<?php echo $row->semester; ?>"</span>
                  <?php } ?>
                  . <br />
                  File name is <span class="green"> <?php echo $row->name; ?></span>&hellip; <?php echo icon($row->type); ?> :: <?php echo get_dg($row->filesize); ?> <br />
                  <br />
                  <div class="pull-left" id="preview_panel">
                    <?php
				  	$url = base_url().'uploads/'.$row->doc_paths.'/'.$row->uploaded_filename;
				  	echo get_preview($row->type, $row->type, $url);
				  ?>
                  </div>
                  <div style="clear:both;"></div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <!-- /.timeline-items --> 
      </div>
      <?php } ?>
      <?php } ?>
      <?php } ?>
      <!-- /.timeline-container --> 
    </div>
  </div>
</div>
<?php include(APPPATH."views/inc/footer.php"); ?>
