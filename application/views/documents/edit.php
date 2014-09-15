<?php include(APPPATH."views/inc/header.php"); ?>

<div class="col-xs-12">
  <form role="form" id="<?php echo $variable; ?>" name="<?php echo $variable; ?>" method="post" action="<?php echo site_url($variable.'/edit_success/'.$row->id); ?>" class="form-horizontal" enctype="multipart/form-data">
    <?php if(user_role()=="G0" || user_role()=="G1"){ ?>
    <!--<div class="form-group">
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
    </div>-->
    <!--<div class="form-group">
      <?php $element = "product_id"; ?>
      <label for="<?php echo $element; ?>" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter($element); ?>: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-3" id="<?php echo $element; ?>" name="<?php echo $element; ?>" value="<?php echo $row->$element; ?>">
      </div>
    </div>-->
    <div class="form-group">
      <?php $element = "product_code"; ?>
      <label for="<?php echo $element; ?>" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter($element); ?>: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-3" id="<?php echo $element; ?>" name="<?php echo $element; ?>" value="<?php echo $row->$element; ?>">
      </div>
    </div>
    <?php } ?>
    <div class="form-group">
      <?php $element = "product"; ?>
      <label for="<?php echo $element; ?>" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter($element); ?>: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-3" id="<?php echo $element; ?>" name="<?php echo $element; ?>" value="<?php echo $row->$element; ?>">
      </div>
    </div>
    <div class="form-group">
      <?php $element = "description"; ?>
      <label for="<?php echo $element; ?>" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter($element); ?>: </label>
      <div class="col-sm-9">
        <textarea id="<?php echo $element; ?>" name="<?php echo $element; ?>" class="form-control limited col-xs-10 col-sm-3" style="width: 205px; height: 105px;"><?php echo $row->$element; ?></textarea>
      </div>
    </div>
    <?php if(user_role()=="G0" || user_role()=="G1"){ ?>
    <div class="form-group">
      <?php $element = "active"; ?>
      <label for="<?php echo $element; ?>" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter($element); ?>: </label>
      <div class="col-sm-9">
        <label>
          <input type="checkbox" class="ace ace-switch ace-switch-4 btn-flat" id="<?php echo $element; ?>" name="<?php echo $element; ?>" <?php if($row->$element=="1"){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label>
      </div>
    </div>
    <?php } ?>
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
