<?php //echo '<pre>'; print_r(); exit; ?>
<?php include(APPPATH."views/inc/header.php"); ?>

<div class="pull-left">
  <?php if(strtolower($user->type_name)=="student"){ ?>
  <a id="add_new_semester" class="blue" href="javascript: void(0)"> <i class="ace-icon fa fa-plus bigger-130"></i> Add new semester </a>
  <?php }else{ ?>
  <a href="javascript: void(0)" class="blue" id="add_new_subject" onclick="add_new_subject('0')"> <i class="ace-icon fa fa-plus bigger-130"></i> Add new subject </a>
  <?php } ?>
</div>
<div class="row">
  <div class="col-xs-12">
  <?php if(strtolower($user->type_name)=="teacher"){ ?>
    <ol class="dd-list" style="">
      <?php $subjects = $this->common_model->query("SELECT * FROM subjects WHERE subjects.user_id = ".$user->id." ORDER BY subjects.subjects ASC"); ?>
      <?php if($subjects->num_rows()>0){ ?>
      <?php foreach($subjects->result() as $sub){ ?>
      <li data-id="3" class="dd-item">
        <div class="dd-handle">
          <div class="pull-left action-buttons"> <a onclick="return confirm('Are you sure you wish to proceed?')" href="<?php echo site_url('semesters_subjects/delete_subject/'.$sub->id); ?>" class="red"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a> </div>
          <?php echo $sub->subjects; ?>
          <div class="pull-right"> <a href="<?php echo site_url("documents/add_new"); ?>" class="blue" id="add_new_subject"> <i class="ace-icon fa fa-plus bigger-130"></i> Add document </a> </div>
        </div>
      </li>
      <?php } ?>
      <?php } ?>
    </ol>
    <?php }else{ ?>
    <?php $semesters = $this->common_model->query("SELECT *, REPLACE(semesters.semester, 'Semester ', '') AS orderby FROM semesters WHERE semesters.user_id = ".$user->id." ORDER BY CAST(`orderby` AS SIGNED) ASC"); ?>
    <?php if($semesters->num_rows()>0){ ?>
    <?php foreach($semesters->result() as $row){ ?>
    <div class="col-sm-6">
      <div id="nestable" class="dd">
        <ol class="dd-list">
          <li data-id="2" class="dd-item">
            <div class="dd-handle"><a onclick="return confirm('Are you sure you wish to proceed?')" href="<?php echo site_url('semesters_subjects/delete_semester/'.$row->id); ?>" class="red"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a> <?php echo $row->semester; ?>
              <div class="pull-right"> <a href="javascript: void(0)" class="blue" id="add_new_subject" onclick="add_new_subject('<?php echo $row->id ?>')"> <i class="ace-icon fa fa-plus bigger-130"></i> Add new subject </a> </div>
            </div>
            <ol class="dd-list" style="">
              <?php $subjects = $this->common_model->query("SELECT * FROM subjects WHERE subjects.semester_id = ".$row->id." ORDER BY subjects.subjects ASC"); ?>
              <?php if($subjects->num_rows()>0){ ?>
              <?php foreach($subjects->result() as $sub){ ?>
              <li data-id="3" class="dd-item">
                <div class="dd-handle">
                  <div class="pull-left action-buttons"> <a onclick="return confirm('Are you sure you wish to proceed?')" href="<?php echo site_url('semesters_subjects/delete_subject/'.$sub->id); ?>" class="red"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a> </div>
                  <?php echo $sub->subjects; ?>
                  <div class="pull-right"> <a href="<?php echo site_url("documents/add_new"); ?>" class="blue" id="add_new_subject"> <i class="ace-icon fa fa-plus bigger-130"></i> Add document </a> </div>
                </div>
              </li>
              <?php } ?>
              <?php } ?>
            </ol>
          </li>
        </ol>
      </div>
    </div>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    <!-- PAGE CONTENT ENDS --> 
  </div>
  <!-- /.col --> 
</div>
<?php include(APPPATH."views/inc/footer.php"); ?>
