<?php include(APPPATH."views/inc/header.php"); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables/resources/syntax/shCore.css">
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/datatables/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/datatables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/datatables/resources/syntax/shCore.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/datatables/resources/demo.js"></script>
<script>
	$(document).ready(function() {
		$("#dashboard-table-2").dataTable({
			"aaSorting" : [[0, 'desc']]	
		});
	});
</script>

<div class="row">
  <?php if(strtolower($user->type_name)=="student"){ ?>
  <div class="col-xs-12">
    <?php if($semesters->num_rows()>0){ ?>
    <?php foreach($semesters->result() as $sem){ ?>
    <script>
	$(document).ready(function() {
		$("#dashboard-table-<?php echo $sem->id; ?>").dataTable({
			"aaSorting" : [[0, 'desc']]	
		});
	});
  </script>
    <div class="row">
      <div class="col-xs-12">
        <div class="table-header"> Result » <?php echo $sem->semester; ?> </div>
        <div> 
          <!--<table id="sample-table-2" class="table table-striped table-bordered table-hover">-->
          <table id="dashboard-table-<?php echo $sem->id; ?>" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="center">ID</th>
                <th>Subject</th>
                <th>File Name</th>
                <th>File Size</th>
                <th>Time</th>
                <th style="width: 147px;">Privacy</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $documents = $this->common_model->query("
                      SELECT documents.id, users.id AS user_id, user_type.`type` AS user_type, departments.name AS department, CONCAT(users.first_name,' ',users.last_name) AS fullname, semesters.semester, subjects.subjects, documents.filename, documents.filesize, documents.name, documents.`type`, documents.time, documents.doc_paths, documents.uploaded_filename, documents.privacy
                      FROM documents 
                      LEFT JOIN users ON documents.user_id = users.id
                      LEFT JOIN semesters ON documents.semester_id = semesters.id
                      LEFT JOIN subjects ON documents.subject_id = subjects.id
                      LEFT JOIN departments ON users.department = departments.id
                      LEFT JOIN user_type ON users.user_type = user_type.id
                      WHERE documents.user_id = ".$user->id."
                      AND documents.semester_id = ".$sem->id."
                      ORDER BY documents.time DESC
                  ");
              ?>
              <?php if($documents->num_rows()>0){ ?>
              <?php foreach($documents->result() as $row){ ?>
              <?php $edit = site_url($variable."/edit/".$row->id); ?>
              <?php $delete = site_url($variable."/delete/".$row->id); ?>
              <tr>
                <td class="center"><?php echo $row->id; ?></td>
                <td><?php echo $row->subjects; ?></td>
                <td><a href="javascript: void(0)" title="<?php echo $row->filename; ?>" data-rel="tooltip"><?php echo substr($row->filename, 0, 60); ?>...</a></td>
                <td><?php echo icon($row->type); ?> &nbsp;&nbsp; <?php echo get_dg($row->filesize); ?></td>
                <td><?php echo date('M d, Y h:i A', strtotime($row->time)); ?></td>
                <td><label style="float:left;">
                    <input type="checkbox" class="ace ace-switch ace-switch-3" id="privacy_<?php echo $row->id; ?>" onclick="set_privacy('<?php echo $row->id; ?>')" name="privacy" <?php if($row->privacy==1){echo 'checked="checked"';} ?>>
                    <span class="lbl"></span> </label>
                  &nbsp; <span class="label label-success arrowed" id="privacy_success_<?php echo $row->id; ?>" style="display:none;">Success</span></td>
                <td><div class="action-buttons"><i class="ace-icon fa fa-download"></i> <a href="<?php echo base_url().'uploads/'.$row->doc_paths.'/'.$row->uploaded_filename; ?>" target="_blank">Download</a> | <a class="red" href="<?php echo $delete; ?>" onclick="return confirm('Are you sure you wish to proceed?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a> </div></td>
              </tr>
              <?php } ?>
              <?php }else{ ?>
              <tr>
                <td class="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="center" colspan="7">No Record Found</td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br />
    <?php } ?>
    <?php } ?>
    <!-- PAGE CONTENT ENDS --> 
  </div>
  <?php }else{ ?>
  <div class="col-xs-12">
    <div class="table-header"> Result </div>
    <div> 
      <!--<table id="sample-table-2" class="table table-striped table-bordered table-hover">-->
      <table id="dashboard-table-2" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="center">ID</th>
            <th>Subject</th>
            <th>File Name</th>
            <th>File Size</th>
            <th>Time</th>
            <th style="width: 147px;">Privacy</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
                  $documents = $this->common_model->query("
                      SELECT documents.id, users.id AS user_id, user_type.`type` AS user_type, departments.name AS department, CONCAT(users.first_name,' ',users.last_name) AS fullname, semesters.semester, subjects.subjects, documents.filename, documents.filesize, documents.name, documents.`type`, documents.time, documents.doc_paths, documents.uploaded_filename, documents.privacy
                      FROM documents 
                      LEFT JOIN users ON documents.user_id = users.id
                      LEFT JOIN semesters ON documents.semester_id = semesters.id
                      LEFT JOIN subjects ON documents.subject_id = subjects.id
                      LEFT JOIN departments ON users.department = departments.id
                      LEFT JOIN user_type ON users.user_type = user_type.id
                      WHERE documents.user_id = ".$user->id."
                      ORDER BY documents.time DESC
                  ");
              ?>
          <?php if($documents->num_rows()>0){ ?>
          <?php foreach($documents->result() as $row){ ?>
          <?php $edit = site_url($variable."/edit/".$row->id); ?>
          <?php $delete = site_url($variable."/delete/".$row->id); ?>
          <tr>
            <td class="center"><?php echo $row->id; ?></td>
            <td><?php echo $row->subjects; ?></td>
            <td><a href="javascript: void(0)" title="<?php echo $row->filename; ?>" data-rel="tooltip"><?php echo substr($row->filename, 0, 60); ?>...</a></td>
            <td><!--<img src="<?php echo base_url().'uploads/'.$row->doc_paths.'/'.$row->uploaded_filename; ?>" style="max-width:50px;" />--><?php echo icon($row->type); ?> &nbsp;&nbsp; <?php echo get_dg($row->filesize); ?></td>
            <td><?php echo date('M d, Y h:i A', strtotime($row->time)); ?></td>
            <td><label style="float:left;">
                <input type="checkbox" class="ace ace-switch ace-switch-3" id="privacy_<?php echo $row->id; ?>" onclick="set_privacy('<?php echo $row->id; ?>')" name="privacy" <?php if($row->privacy==1){echo 'checked="checked"';} ?>>
                <span class="lbl"></span> </label>
              &nbsp; <span class="label label-success arrowed" id="privacy_success_<?php echo $row->id; ?>" style="display:none;">Success</span></td>
            <td><div class="action-buttons"><i class="ace-icon fa fa-download"></i> <a href="<?php echo base_url().'uploads/'.$row->doc_paths.'/'.$row->uploaded_filename; ?>" target="_blank">Download</a> | <a class="red" href="<?php echo $delete; ?>" onclick="return confirm('Are you sure you wish to proceed?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a> </div></td>
          </tr>
          <?php } ?>
          <?php }else{ ?>
          <tr>
            <td class="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="center" colspan="7">No Record Found</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php } ?>
  <!-- /.col --> 
</div>
<?php include(APPPATH."views/inc/footer.php"); ?>
<style>
.dataTable th[class*="sort"]:after {
	content: "";
}
table.dataTable thead .sorting {
  background: none !important;
}
</style>
<script>
	function set_privacy(id){
		var status = $("#privacy_"+id).is(":checked");
		$.post("<?php echo site_url('documents/set_privacy'); ?>", {id:id, status:status}).done(function(result){
			$("#privacy_success_"+id).fadeIn();
			$("#privacy_success_"+id).fadeOut(2000);
		});
	}
</script> 
