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
  <div class="col-xs-12">
  <form action="<?php echo site_url("departments/add_new_success"); ?>" name="departments" id="departments" method="post"><input type="text" placeholder="Enter department name" name="name" id="name" value="<?php echo $this->input->post("name"); ?>" /><button type="submit" style="margin-top: -3px;" class="btn btn-sm btn-primary">Add New</button></form>
  <br>
    <div class="row">
      <div class="col-xs-12">
        <div class="table-header"> Result » Departments </div>
        <div> 
          <!--<table id="sample-table-2" class="table table-striped table-bordered table-hover">-->
          <table id="dashboard-table-2" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="center">ID</th>
                <th>Department Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if($departments->num_rows()>0){ ?>
              <?php foreach($departments->result() as $row){ ?>
              <?php $edit = site_url($variable."/edit/".$row->id); ?>
              <?php $delete = site_url($variable."/delete/".$row->id); ?>
              <tr>
                <td class="center"><?php echo $row->id; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><div class="action-buttons"><a class="red" href="<?php echo $delete; ?>" onclick="return confirm('Are you sure you wish to proceed?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a> </div></td>
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
    <!-- PAGE CONTENT ENDS --> 
  </div>
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
	function set_active(id){
		var status = $("#active_"+id).is(":checked");
		$.post("<?php echo site_url('find_users/set_active'); ?>", {id:id, status:status}).done(function(result){
			$("#active_success_"+id).fadeIn();
			$("#active_success_"+id).fadeOut(2000);
		});
	}
</script> 
