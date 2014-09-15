<span style="font-size:12px;">Note: If you want to anbody see your bellow information just put it "ON" else "OFF".</span><br />
<br />
<form role="form" name="users" id="users" enctype="multipart/form-data" action="<?php echo site_url("settings/privacy"); ?>" method="post">
<table id="resume_wizard_skills">
  <tbody>
    <tr>
      <td><span>Father Name:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="father_name" id="father_name" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'father_name')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
    <tr>
      <td><span>Email:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="email" id="email" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'email')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
    <tr>
      <td><span>Gender:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="gender" id="gender" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'gender')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
    <tr>
      <td><span>Blood Group:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="blood_group" id="blood_group" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'blood_group')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
    <tr>
      <td><span>CNIC:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="cnic" id="cnic" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'cnic')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
    <tr>
      <td><span>Contact Number:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="contact_number" id="contact_number" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'contact_number')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
    <tr>
      <td><span>Date of Birth:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="dob" id="dob" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'dob')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
    <tr>
      <td><span>Postal Address:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="postal_address" id="postal_address" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'postal_address')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
    <tr>
      <td><span>City:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="city" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'city')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
    <tr>
      <td><span>Province:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="province" id="province" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'province')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
    <tr>
      <td><span>Country:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="country" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'country')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
    <tr>
      <td><span>Facebook:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="facebook" id="facebook" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'facebook')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
    <tr>
      <td><span>Twitter:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="twitter" id="twitter" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'twitter')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
    <tr>
      <td><span>Linkedin:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="linkedin" id="linkedin" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'linkedin')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
    <tr>
      <td><span>Resume:</span> &nbsp;&nbsp;&nbsp; </td>
      <td><label style="margin-top: 11px;">
          <input type="checkbox" name="resume" id="resume" class="ace ace-switch ace-switch-3" <?php if(set_privacy(NULL, 'resume')){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label></td>
    </tr>
  </tbody>
</table>
<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
      <button type="submit" class="btn btn-info"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
      &nbsp; &nbsp; &nbsp;
      <button type="reset" class="btn"> <i class="ace-icon fa fa-undo bigger-110"></i> Reset </button>
    </div>
  </div>
</form>