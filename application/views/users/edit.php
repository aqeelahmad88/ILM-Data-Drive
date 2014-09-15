<?php include(APPPATH."views/inc/header.php"); ?>
<div class="col-xs-12">
  <form role="form" id="<?php echo $variable; ?>" name="<?php echo $variable; ?>" method="post" action="<?php echo site_url($variable.'/edit_success/'.$row->id); ?>" class="form-horizontal" enctype="multipart/form-data">
    <?php if(user_role()=="G0" || user_role()=="G1"){ ?>
    <div class="form-group">
      <?php $element = "vendorid"; ?>
      <label for="<?php echo $element; ?>" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter("Vendor"); ?>: </label>
      <div class="col-sm-2">
        <select class="chosen-select" id="<?php echo $element; ?>" name="<?php echo $element; ?>" data-placeholder="Choose a <?php echo string_filter("Vendor"); ?>...">
          <option value=""> </option>
          <?php if($vendors->num_rows()>0){ ?>
          <?php foreach($vendors->result() as $data){ ?>
          <option value="<?php echo $data->id; ?>" <?php if($row->vendorid==$data->id){echo 'selected="selected"';} ?>><?php echo $data->vendor; ?></option>
          <?php } ?>
          <?php } ?>
        </select>
      </div>
    </div>
    <?php } ?>
    <!--<div class="form-group">
      <?php $element = "user_role"; ?>
      <label for="<?php echo $element; ?>" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter($element); ?>: </label>
      <div class="col-sm-2">
        <select class="chosen-select" id="<?php echo $element; ?>" name="<?php echo $element; ?>" data-placeholder="Choose a <?php echo string_filter($element); ?>...">
          <option value=""> </option>
          <?php if($user_roles->num_rows()>0){ ?>
          <?php foreach($user_roles->result() as $data){ ?>
          <option value="<?php echo $data->id; ?>" <?php if($row->user_role==$data->id){echo 'selected="selected"';} ?>><?php echo $data->description; ?></option>
          <?php } ?>
          <?php } ?>
        </select>
      </div>
    </div>-->
    <div class="form-group">
      <?php $element = "username"; ?>
      <label for="<?php echo $element; ?>" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter($element); ?>: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-3" id="<?php echo $element; ?>" name="<?php echo $element; ?>" value="<?php echo get_value($element, $row); ?>" readonly="readonly">
      </div>
    </div>
    <div class="form-group">
      <?php $element = "firstname"; ?>
      <label for="<?php echo $element; ?>" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter("First Name"); ?>: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-3" id="<?php echo $element; ?>" name="<?php echo $element; ?>" value="<?php echo get_value($element, $row); ?>">
      </div>
    </div>
    <div class="form-group">
      <?php $element = "lastname"; ?>
      <label for="<?php echo $element; ?>" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter("Last Name"); ?>: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-3" id="<?php echo $element; ?>" name="<?php echo $element; ?>" value="<?php echo get_value($element, $row); ?>">
      </div>
    </div>
    <div class="form-group">
      <?php $element = "password"; ?>
      <label for="<?php echo $element; ?>" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter($element); ?>: </label>
      <div class="col-sm-9">
        <input type="password" class="col-xs-10 col-sm-3" id="<?php echo $element; ?>" name="<?php echo $element; ?>" value="<?php echo 'utr'; ?>">
      </div>
    </div>
    <div class="form-group">
      <?php $element = "password_hint"; ?>
      <label for="<?php echo $element; ?>" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter($element); ?>: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-3" id="<?php echo $element; ?>" name="<?php echo $element; ?>" value="<?php echo get_value($element, $row); ?>">
      </div>
    </div>
    <div class="form-group">
      <?php $element = "password_hint_answer"; ?>
      <label for="<?php echo $element; ?>" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter($element); ?>: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-3" id="<?php echo $element; ?>" name="<?php echo $element; ?>" value="<?php echo get_value($element, $row); ?>">
      </div>
    </div>
    <div class="form-group">
      <?php $element = "active"; ?>
      <label for="<?php echo $element; ?>" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter($element); ?>: </label>
      <div class="col-sm-9">
        <label>
          <input type="checkbox" class="ace ace-switch ace-switch-4 btn-flat" id="<?php echo $element; ?>" name="<?php echo $element; ?>" <?php if($row->$element=="1"){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label>
      </div>
    </div>
    <div class="clearfix form-actions">
      <div class="col-md-offset-2 col-md-9">
        <button type="submit" class="btn btn-info"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
        &nbsp; &nbsp; &nbsp;
        <button type="reset" class="btn"> <i class="ace-icon fa fa-undo bigger-110"></i> Reset </button>
      </div>
    </div>
  </form>
</div>
<?php include(APPPATH."views/inc/footer.php"); ?>
