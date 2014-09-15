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
			"aaSorting" : [[0, 'asc']]	
		});
	});
  </script>

<div class="row">
  <div class="col-xs-12">
    <h3 align="center">Search Documents</h3>
    <br>
    <div class="row">
      <div class="col-xs-12" style="text-align:center;">
      <form action="<?php echo site_url("search"); ?>" name="search-from" id="search-form" method="post">
        <table align="center" width="35%">
          <tr>
            <th>Department: </th>
            <td><select class="chzn-select" data-placeholder="Choose a department..." id="departments" name="departments" style="width: 274px;">
                <option value=""></option>
                <?php if($departments->num_rows()>0){ ?>
                <?php foreach($departments->result() as $row){ ?>
                <option value="<?php echo $row->name; ?>" <?php if($this->input->post("departments")==$row->name){echo 'selected="selected"';} ?>><?php echo $row->name; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <th>Subjects: </th>
            <td><select class="chzn-select" data-placeholder="Choose a subject..." id="subjects" name="subjects" style="width: 274px;">
                <option value=""></option>
                <?php if($subjects->num_rows()>0){ ?>
                <?php foreach($subjects->result() as $row){ ?>
                <option value="<?php echo $row->subjects; ?>" <?php if($this->input->post("subjects")==$row->subjects){echo 'selected="selected"';} ?>><?php echo $row->subjects; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <th>Keyword: </th>
            <td><input type="text" style="width: 274px; text-align:center;" name="keyword" id="keyword" value="<?php echo $this->input->post("keyword"); ?>"></td>
          </tr>
        </table>
        <div class="form-actions">
          <button type="submit" class="btn btn-info"> <i class="icon-ok bigger-110"></i> Submit </button>
        </div>
        </form>
      </div>
      <?php if($this->input->post("departments") || $this->input->post("subjects") || $this->input->post("keyword")){ ?>
      <div class="row">
        <div class="col-xs-12"><br>
        <?php
        	//print_r($documents->result());
		?>
          <div class="table-header"> Result for documents </div>
          <div>
            <table id="dashboard-table-2" class="display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Subject</th>
                  <th>User Name</th>
                  <th>User Type</th>
                  <th>File Name</th>
                  <th>File Size</th>
                  <th>Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php if($documents->num_rows()>0){ ?>
              <?php foreach($documents->result() as $row){ ?>
              <?php $edit = site_url($variable."/edit/".$row->id); ?>
              <?php $delete = site_url($variable."/delete/".$row->id); ?>
              <tr>
                <td><?php echo $row->subjects; ?></td>
                <td><a href="<?php echo site_url("profile/".$row->user_name); ?>" target="_blank"><?php echo $row->user_name; ?></a></td>
                <td><?php echo $row->user_type; ?></td>
                <td><a href="javascript: void(0)" title="<?php echo $row->filename; ?>" data-rel="tooltip"><?php echo substr($row->filename, 0, 60); ?>...</a></td>
                <td><?php echo icon($row->type); ?> &nbsp;&nbsp; <?php echo get_dg($row->filesize); ?></td>
                <td><?php echo date('M d, Y h:i A', strtotime($row->time)); ?></td>
                
                <td><div class="action-buttons"><i class="ace-icon fa fa-download"></i> <a href="<?php echo base_url().'uploads/'.$row->doc_paths.'/'.$row->uploaded_filename; ?>" target="_blank">Download</a> </div></td>
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
      <?php } ?>
    </div>
  </div>
  <!-- /.col --> 
</div>
<style>
.dataTable th[class*="sort"]:after {
	content: "";
}
table.dataTable thead .sorting {
  background: none !important;
}
</style>

<?php include(APPPATH."views/inc/footer.php"); ?>
