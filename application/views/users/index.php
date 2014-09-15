<?php include(APPPATH."views/inc/header.php"); ?>

<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-xs-12">
        <div class="table-header"> Results for "Latest <?php echo ucwords($variable); ?>" </div>
        <div>
          <table id="sample-table-2" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="center">ID</th>
                <th>User Name</th>
                <th>Full Name</th>
                <th>Password Hint</th>
                <th>Password Hint Answer</th>
                <th style="width: 148px;">Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php if($users->num_rows()>0){ ?>
              <?php foreach($users->result() as $row){ ?>
              <?php $edit = site_url($variable."/edit/".$row->id); ?>
              <?php $delete = site_url($variable."/delete/".$row->id); ?>
              <tr>
                <td class="center"><a href="<?php echo $edit; ?>"><?php echo $row->id; ?></a></td>
                <td><a href="<?php echo $edit; ?>"><?php echo $row->username; ?></a></td>
                <td><a href="<?php echo $edit; ?>"><?php echo $row->firstname.' '.$row->lastname; ?></a></td>
                <td><a href="<?php echo $edit; ?>"><?php echo $row->password_hint; ?></a></td>
                <td><a href="<?php echo $edit; ?>"><?php echo $row->password_hint_answer; ?></a></td>
                <td><label>
          <input type="checkbox" class="ace ace-switch ace-switch-4 btn-flat" id="active_<?php echo $row->id; ?>" onclick="set_status('<?php echo $row->id; ?>')" name="active" <?php if($row->active=="1"){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label><span class="label label-success arrowed" id="active_success_<?php echo $row->id; ?>" style="display:none;">Success</span>
                </td>
                <td><div class="hidden-sm hidden-xs action-buttons"> <a class="green" href="<?php echo $edit; ?>"> <i class="ace-icon fa fa-pencil bigger-130"></i> </a> <a class="red" href="<?php echo $delete; ?>" onclick="return confirm('Are you sure you wish to proceed?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a> </div></td>
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
    
    <!-- PAGE CONTENT ENDS --> 
  </div>
  <!-- /.col --> 
</div>
<?php include(APPPATH."views/inc/footer.php"); ?>
<script>
	function set_status(id){
		var status = $("#active_"+id).is(":checked");
		$.post("<?php echo site_url('users/set_status'); ?>", {id:id, status:status}).done(function(result){
			$("#active_success_"+id).fadeIn();
			$("#active_success_"+id).fadeOut(2000);
		});
	}
</script>
