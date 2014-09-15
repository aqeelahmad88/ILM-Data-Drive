<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<div id="documents" class="tab-pane">
  <div class="profile-feed row">
    <div id="accordion" class="accordion-style2">
      <?php if(
	  			strtolower($users->u_type)=="student" 
				|| (
					$users->user_name!=$user->user_name 
					&& strtolower($users->u_type)=="student"
					)
			){ ?>
      <?php if($semesters->num_rows()>0){ ?>
      <?php $k=1; ?>
      <?php foreach($semesters->result() as $sem){ ?>
      <div class="group">
        <h3 class="accordion-header"><?php echo $sem->semester; ?></h3>
        <div>
          <p>
            <?php $subjects = $this->common_model->query("SELECT * FROM subjects WHERE subjects.semester_id = ".$sem->id." ORDER BY subjects.subjects ASC"); ?>
            <?php if($subjects->num_rows()>0){ ?>
          <div id="tabs-<?php echo $k; ?>">
            <ul>
              <?php $i=1; ?>
              <?php foreach($subjects->result() as $sub){ ?>
              <li> <a href="#tabs-<?php echo $k; ?>-<?php echo $i; ?>"><?php echo $sub->subjects; ?></a> </li>
              <?php $i++; } ?>
            </ul>
            <?php $i=1; ?>
            <?php foreach($subjects->result() as $sub){ ?>
            <div id="tabs-<?php echo $k; ?>-<?php echo $i; ?>">
              <p class="">
                <?php
			  	$AND = "";
              	if($users->user_name!=$user->user_name){
					$AND = "AND documents.privacy = 0";	
				}
			  ?>
                <?php $documents = $this->common_model->query("
						SELECT * FROM documents 
						WHERE documents.user_id = ".$users->id." 
						AND documents.semester_id = ".$sem->id." 
						AND documents.subject_id = ".$sub->id."
						".$AND."
						ORDER BY documents.time DESC
				"); ?>
                <?php if($documents->num_rows()>0){ ?>
                <?php foreach($documents->result() as $doc){ ?>
              <div class="timeline-items">
                <div class="timeline-item clearfix">
                  <div class="widget-box transparent">
                    <div class="widget-header widget-header-small">
                      <h5 class="widget-title smaller">
                      <?php
                      	$imgtype = array("image/png", "image/jpeg", "image/gif", "image/bmp");
						if(in_array($doc->type, $imgtype)){
					  ?>
                      <img src="<?php echo base_url().'uploads/'.$doc->doc_paths.'/'.$doc->uploaded_filename; ?>" style="max-width:50px; margin-top:3px;" />
                      <?php	
						}else{
							echo icon($doc->type);
						}
					  ?>
                      <span class="grey">"<a href="javascript: void(0)" title="<?php echo $doc->filename; ?>" data-rel="tooltip"><?php echo substr($doc->filename, 0, 60); ?>...</a>"</span> <span class="red">"<?php echo get_dg($doc->filesize); ?>"</span> <span class="widget-toolbar no-border"><span class="grey"><i class="ace-icon fa fa-download"></i> <a class="blue" href="<?php echo base_url().'uploads/'.$doc->doc_paths.'/'.$doc->uploaded_filename; ?>" target="_blank">Download</a> | <i class="ace-icon fa fa-clock-o bigger-110"></i> <?php echo date("M d, Y h:i A", strtotime($doc->time)); ?>
                      <?php if($user->user_rights==1){ ?>
                      | <a onclick="return confirm('Are you sure you wish to proceed?')" href="<?php echo site_url("documents/delete/".$doc->id); ?>" class="red"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
                      <?php } ?>
                      </span> </div>
                  </div>
                </div>
              </div>
              <?php } ?>
              <?php }else{ ?>
              <p>No document found in the "<?php echo $sub->subjects; ?>" subject.</p>
              <?php } ?>
              </p>
            </div>
            <?php $i++; } ?>
          </div>
          <?php } ?>
          </p>
        </div>
      </div>
      <script>
      	$(document).ready(function(e) {
            $("#tabs-<?php echo $k; ?>").tabs();
        });
      </script>
      <?php $k++; } ?>
      <?php } ?>
      <?php }else if(strtolower($users->u_type)=="teacher" || ($users->user_name!=$user->user_name && strtolower($users->u_type)=="teacher")){ ?>
      <div>
        <p>
          <?php $subjects = $this->common_model->query("SELECT * FROM subjects WHERE subjects.user_id = ".$users->id." ORDER BY subjects.subjects ASC"); ?>
          <?php if($subjects->num_rows()>0){ ?>
        <div id="tabs-1">
          <ul>
            <?php $i=1; ?>
            <?php foreach($subjects->result() as $sub){ ?>
            <li> <a href="#tabs-1-<?php echo $i; ?>"><?php echo $sub->subjects; ?></a> </li>
            <?php $i++; } ?>
          </ul>
          <?php $i=1; ?>
          <?php foreach($subjects->result() as $sub){ ?>
          <div id="tabs-1-<?php echo $i; ?>">
            <p class="">
              <?php
			  	$AND = "";
              	if($users->user_name!=$user->user_name){
					$AND = "AND documents.privacy = 0";	
				}
				if($user->user_rights==1){
					$AND = "";	
				}
			  ?>
              <?php $documents = $this->common_model->query("
						SELECT * FROM documents 
						WHERE documents.user_id = ".$users->id." 
						AND documents.subject_id = ".$sub->id."
						".$AND."
						ORDER BY documents.time DESC
				"); ?>
              <?php if($documents->num_rows()>0){ ?>
              <?php foreach($documents->result() as $doc){ ?>
            <div class="timeline-items">
              <div class="timeline-item clearfix">
                <div class="widget-box transparent">
                  <div class="widget-header widget-header-small">
                    <h5 class="widget-title smaller">
                    <?php
                      	$imgtype = array("image/png", "image/jpeg", "image/gif", "image/bmp");
						if(in_array($doc->type, $imgtype)){
					  ?>
                    <img src="<?php echo base_url().'uploads/'.$doc->doc_paths.'/'.$doc->uploaded_filename; ?>" style="max-width:50px; margin-top:3px;" />
                    <?php	
						}else{
							echo icon($doc->type);
						}
					  ?>
                    <span class="grey">"<a href="javascript: void(0)" title="<?php echo $doc->filename; ?>" data-rel="tooltip"><?php echo substr($doc->filename, 0, 60); ?>...</a>"</span> <span class="red">"<?php echo get_dg($doc->filesize); ?>"</span> <span class="widget-toolbar no-border"><span class="grey"><i class="ace-icon fa fa-download"></i> <a class="blue" href="<?php echo base_url().'uploads/'.$doc->doc_paths.'/'.$doc->uploaded_filename; ?>" target="_blank">Download</a> | <i class="ace-icon fa fa-clock-o bigger-110"></i> <?php echo date("M d, Y h:i A", strtotime($doc->time)); ?>
                    <?php if($user->user_rights==1){ ?>
                    | <a onclick="return confirm('Are you sure you wish to proceed?')" href="<?php echo site_url("documents/delete/".$doc->id); ?>" class="red"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
                    <?php } ?>
                    </span> </div>
                </div>
              </div>
            </div>
            <?php } ?>
            <?php }else{ ?>
            <p>No document found in the "<?php echo $sub->subjects; ?>" subject.</p>
            <?php } ?>
            </p>
          </div>
          <?php $i++; } ?>
        </div>
        <?php } ?>
        </p>
      </div>
      <script>
      	$(document).ready(function(e) {
            $("#tabs-1").tabs();
        });
      </script>
      <?php } ?>
    </div>
  </div>
  <!-- /.row -->
  
  <div class="space-12"></div>
</div>
