<form role="form" name="changepassword" id="changepassword" enctype="multipart/form-data" action="<?php echo site_url("settings/password"); ?>" method="post" onSubmit="return false;">
  <table id="resume_wizard_skills">
    <tbody>
      <tr>
        <td><span>Old Password:</span> &nbsp;&nbsp;&nbsp; </td>
        <td><label style="margin-top: 11px;">
           <input type="password" class="input-sm" name="old-password" id="old-password" required>
            <span class="lbl"></span> </label></td>
      </tr>
      <tr>
        <td><span>New Password:</span> &nbsp;&nbsp;&nbsp; </td>
        <td><label style="margin-top: 11px;">
           <input type="password" class="input-sm" name="new-password" id="new-password" required>
            <span class="lbl"></span> </label></td>
      </tr>
      <tr>
        <td><span>Repeat Password:</span> &nbsp;&nbsp;&nbsp; </td>
        <td><label style="margin-top: 11px;">
            <input type="password" class="input-sm" name="repeat-password" id="repeat-password" required>
            <span class="lbl"></span> </label></td>
      </tr>
    </tbody>
  </table>
  <div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
      <button type="submit" class="btn btn-info" onClick="password_match()"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
      &nbsp; &nbsp; &nbsp;
      <button type="reset" class="btn"> <i class="ace-icon fa fa-undo bigger-110"></i> Reset </button>
    </div>
  </div>
</form>
<script>
	function password_match(){
		var password = document.getElementById("new-password").value;	
		var re_password = document.getElementById("repeat-password").value;	
		if(password!="" && re_password!=""){
			if(password!=re_password){
				alert("Your password does not match.");	
			}else{
				document.getElementById("changepassword").submit();
			}
		}
	}
</script>
