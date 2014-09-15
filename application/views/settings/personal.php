<form class="form-horizontal" role="form" name="users" id="users" enctype="multipart/form-data" action="<?php echo site_url("settings/personal"); ?>" method="post">
  <br />
  <br />
  <?php $fieldname = "first_name"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-9">
      <input type="text" class="col-xs-10 col-sm-5 limit_char" id="<?php echo $fieldname; ?>" name="<?php echo $fieldname; ?>" maxlength="15" value="<?php echo $value; ?>">
      <span id="span_<?php echo $fieldname; ?>" style="margin-top:3px; color:#F00; display:none;">&nbsp;</span> </div>
  </div>
  <?php $fieldname = "last_name"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-9">
      <input type="text" class="col-xs-10 col-sm-5 limit_char" id="<?php echo $fieldname; ?>" name="<?php echo $fieldname; ?>" maxlength="15" value="<?php echo $value; ?>">
      <span id="span_<?php echo $fieldname; ?>" style="margin-top:3px; color:#F00; display:none;">&nbsp;</span> </div>
  </div>
  <?php $fieldname = "father_name"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-9">
      <input type="text" maxlength="30" class="col-xs-10 col-sm-5 limit_char" id="<?php echo $fieldname; ?>" name="<?php echo $fieldname; ?>" value="<?php echo $value; ?>">
      <span id="span_<?php echo $fieldname; ?>" style="margin-top:3px; color:#F00; display:none;">&nbsp;</span> </div>
  </div>
  <?php $fieldname = "gender"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-9"> &nbsp;&nbsp;&nbsp;&nbsp;
      <label for="male">
        <input type="radio" name="gender" id="male" value="male" <?php if($value=="male"){echo 'checked="checked"';} ?>>
        <span class="lbl"> Male</span> </label>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <label for="female">
        <input type="radio" name="gender" id="female" value="female" <?php if($value=="female"){echo 'checked="checked"';} ?>>
        <span class="lbl"> Female</span> </label>
    </div>
  </div>
  <?php $fieldname = "blood_group"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-4">
      <select id="form-field-select-3" class="chosen-select" data-placeholder="Choose blood group..." name="<?php echo $fieldname; ?>">
        <option></option>
        <option value="O−" <?php if($value=="O−"){echo 'selected="selected"';} ?>>O−</option>
        <option value="O+" <?php if($value=="O+"){echo 'selected="selected"';} ?>>O+</option>
        <option value="A−" <?php if($value=="A−"){echo 'selected="selected"';} ?>>A−</option>
        <option value="A+" <?php if($value=="A+"){echo 'selected="selected"';} ?>>A+</option>
        <option value="B−" <?php if($value=="B−"){echo 'selected="selected"';} ?>>B−</option>
        <option value="B+" <?php if($value=="B+"){echo 'selected="selected"';} ?>>B+</option>
        <option value="AB−" <?php if($value=="AB−"){echo 'selected="selected"';} ?>>AB−</option>
        <option value="AB+" <?php if($value=="AB+"){echo 'selected="selected"';} ?>>AB+</option>
      </select>
    </div>
  </div>
  <?php $fieldname = "cnic"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo strtoupper(string_filter($fieldname)); ?> </label>
    <div class="col-sm-9">
      <input type="text" class="col-xs-10 col-sm-5 limit_number" maxlength="14" id="<?php echo $fieldname; ?>" name="<?php echo $fieldname; ?>" value="<?php echo $value; ?>">
      <span id="span_<?php echo $fieldname; ?>" style="margin-top:3px; color:#F00; display:none;">&nbsp;</span> </div>
  </div>
  <?php $fieldname = "contact_number"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-9">
      <input type="text" class="col-xs-10 col-sm-5" id="<?php echo $fieldname; ?>" name="<?php echo $fieldname; ?>" value="<?php echo $value; ?>">
    </div>
  </div>
  <?php $fieldname = "dob"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo strtoupper(string_filter($fieldname)); ?> </label>
    <div class="col-sm-9">
      <input class="date-picker col-xs-10 col-sm-5" id="<?php echo $fieldname; ?>" name="<?php echo $fieldname; ?>" type="text" data-date-format="yyyy-mm-dd" value="<?php echo $value; ?>" />
      <!-- <input class="col-xs-10 col-sm-5" name="<?php echo $fieldname; ?>" value="<?php echo $value; ?>" id="<?php echo $fieldname; ?>" type="text" data-date-format="dd-mm-yyyy" />--> 
    </div>
  </div>
  <?php $fieldname = "postal_address"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-9">
      <input type="text" class="col-xs-10 col-sm-5" id="<?php echo $fieldname; ?>" name="<?php echo $fieldname; ?>" value="<?php echo $value; ?>">
    </div>
  </div>
  <?php $fieldname = "city"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-9">
      <input type="text" class="col-xs-10 col-sm-5 limit_char" maxlength="25" id="city_" name="<?php echo $fieldname; ?>" value="<?php echo $value; ?>">
      <span id="span_city_" style="margin-top:3px; color:#F00; display:none;">&nbsp;</span> </div>
  </div>
  <?php $fieldname = "province"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-9">
      <input type="text" class="col-xs-10 col-sm-5 limit_char" maxlength="25" id="<?php echo $fieldname; ?>" name="<?php echo $fieldname; ?>" value="<?php echo $value; ?>">
      <span id="span_<?php echo $fieldname; ?>" style="margin-top:3px; color:#F00; display:none;">&nbsp;</span> </div>
  </div>
  <?php $fieldname = "country"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-9">
      <input type="text" class="col-xs-10 col-sm-5 limit_char" id="country_" name="<?php echo $fieldname; ?>" maxlength="25" value="<?php echo $value; ?>">
      <span id="span_country_" style="margin-top:3px; color:#F00; display:none;">&nbsp;</span> </div>
  </div>
  <?php $fieldname = "facebook"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-9">
      <input type="text" class="col-xs-10 col-sm-5 valid_link" id="<?php echo $fieldname; ?>" name="<?php echo $fieldname; ?>" value="<?php echo $value; ?>"><span id="span_<?php echo $fieldname; ?>" style="margin-top:3px; color:#F00; display:none;">&nbsp;</span>
    </div>
  </div>
  <?php $fieldname = "twitter"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-9">
      <input type="text" class="col-xs-10 col-sm-5 valid_link" id="<?php echo $fieldname; ?>" name="<?php echo $fieldname; ?>" value="<?php echo $value; ?>"><span id="span_<?php echo $fieldname; ?>" style="margin-top:3px; color:#F00; display:none;">&nbsp;</span>
    </div>
  </div>
  <?php $fieldname = "linkedin"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-9">
      <input type="text" class="col-xs-10 col-sm-5 valid_link" id="<?php echo $fieldname; ?>" name="<?php echo $fieldname; ?>" value="<?php echo $value; ?>"><span id="span_<?php echo $fieldname; ?>" style="margin-top:3px; color:#F00; display:none;">&nbsp;</span>
    </div>
  </div>
  <?php $fieldname = "avatar_img"; ?>
  <?php $value = $users->id; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-4">
      <input type="file" id="id-input-file-2" class="col-xs-10 col-sm-3" name="<?php echo $fieldname; ?>" />
      <img src="<?php echo avatar($value); ?>" style="max-width:334px;" /> </div>
  </div>
  <?php $fieldname = "about"; ?>
  <?php $value = $users->$fieldname; ?>
  <div class="form-group">
    <label for="<?php echo $fieldname; ?>" class="col-sm-3 control-label no-padding-right"> <?php echo string_filter($fieldname); ?> </label>
    <div class="col-sm-9">
      <textarea rows="7" cols="36" name="<?php echo $fieldname; ?>"><?php echo $value; ?></textarea>
    </div>
  </div>
  <div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
      <button type="submit" class="btn btn-info"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
      &nbsp; &nbsp; &nbsp;
      <button type="reset" class="btn"> <i class="ace-icon fa fa-undo bigger-110"></i> Reset </button>
    </div>
  </div>
</form>
