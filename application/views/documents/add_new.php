<?php include(APPPATH."views/inc/header.php"); ?>

<div class="col-xs-12">
  <form role="form" id="<?php echo $variable; ?>" name="<?php echo $variable; ?>" method="post" action="<?php echo site_url($variable.'/add_new_success'); ?>" class="form-horizontal" enctype="multipart/form-data">
    <?php if(strtolower($user->type_name)=="student"){ ?>
    <div class="form-group">
      <label for="semester_id" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter("Semester"); ?>: </label>
      <div class="col-xs-10">
        <select class="chzn-select col-xs-10 col-sm-3" data-placeholder="Choose a semester..." style="max-width: 240px;" id="semester_id" name="semester_id">
          <option value=""></option>
          <?php if($semesters->num_rows()>0){ ?>
          <?php foreach($semesters->result() as $row){ ?>
          <option value="<?php echo $row->id; ?>" <?php if($this->input->post("semester_id")==$row->id){echo 'selected="selected"';} ?>><?php echo $row->semester; ?></option>
          <?php } ?>
          <?php } ?>
        </select>
      </div>
    </div>
    <?php } ?>
    <div class="form-group">
      <label for="subject_id" class="col-sm-2 control-label no-padding-right"> <?php echo string_filter("Subjects"); ?>: </label>
      <div class="col-xs-10" id="get_subjects">
        <select class="chzn-select col-xs-10 col-sm-3" data-placeholder="Choose a subject..." style="max-width: 240px;" id="subject_id" name="subject_id">
          <option value=""></option>
          <?php if($subjects->num_rows()>0){ ?>
          <?php foreach($subjects->result() as $data){ ?>
          <option value="<?php echo $data->id; ?>" <?php if($this->input->post("subject_id")==$data->id){echo 'selected="selected"';} ?>><?php echo $data->subjects; ?></option>
          <?php } ?>
          <?php } ?>
        </select>
        <img src="<?php echo base_url(); ?>assets/img/loading.gif" id="loader" style="display:none;" /> </div>
    </div>
    <div class="form-group">
      <label for="filename" class="col-sm-2 control-label no-padding-right"> File Name: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-3" id="filename" name="filename" value="<?php echo $this->input->post("filename"); ?>">
      </div>
    </div>
    <div class="form-group ace-file-input-">
      <label for="filename" class="col-sm-2 control-label no-padding-right"> Select Document: </label>
      <div class="col-sm-9">
      <span style="font-size:10px;">You can select multiple files here.</span>
        <input type="file" id="id-input-file-2" class="col-xs-10 col-sm-3" style="width: 240px;" name="doc_paths[]" multiple="multiple" />
        <span class="label label-warning"> <i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Max file size allow 30MB </span><img src="<?php echo base_url(); ?>assets/img/loading.gif" id="loader-2" style="margin-left:5px; display:none;" /> </div>
    </div>
    <div class="form-group">
      <label for="filename" class="col-sm-2 control-label no-padding-right"> Privacy: </label>
      <div class="col-sm-9">
        <label style="float: left; margin-top: 6px;">
          <input type="checkbox" class="ace ace-switch ace-switch-3" checked="checked" name="privacy" id="privacy" <?php if($this->input->post("privacy")=="on"){echo 'checked="checked"';} ?>>
          <span class="lbl"></span> </label>
      </div>
    </div>
    <div class="form-group" id="progress_upload" style="display:none;">
    <label for="filename" class="col-sm-2 control-label no-padding-right"> &nbsp; </label>
    <div class="col-sm-3">
      <div data-percent="0%" class="progress progress-upload">
        <div style="width:0%;" class="progress-bar progress-bar-upload"></div>
      </div>
      </div>
    </div>
    <div class="clearfix"></div>
   <!-- <div class="bar"></div>
    <div class="percent"></div>
    <div id="status"></div>-->
    <div class="clearfix form-actions">
      <div class="col-md-offset-2 col-md-9">
        <button type="submit" class="btn btn-info" id="add_new_document"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
        &nbsp; &nbsp; &nbsp;
        <button type="reset" class="btn"> <i class="ace-icon fa fa-undo bigger-110"></i> Reset </button>
      </div>
    </div>
  </form>
</div>
<?php include(APPPATH."views/inc/footer.php"); ?>
<style>
.ace-file-container{width:240px;}
.ace-file-input{width:166px;}
</style>
<script>
$(document).ready(function(e) {
    $("#semester_id").change(function(e) {
		$("#loader").show();
		var semester_id = $(this).val();
        $.post("<?php echo site_url("documents/get_subjects"); ?>", {semester_id:semester_id}).done(function(result){
			if(result==""){
				$(".form-actions").hide();
				alert("Please add subjects first...");
			}else{
				$(".form-actions").show();	
			}
			$("#get_subjects").html(result);
			$("#loader").hide();
		});
    });
	var total = 0;
	$('#id-input-file-2').bind('change', function(e) {
		for(i=0; i<this.files.length; i++){
			total += this.files[i].size;
		}
		$("#loader-2").show();
		sizeinbytes = total;
		var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
		fSize = sizeinbytes; i=0;while(fSize>900){fSize/=1024;i++;}
		var size = (Math.round(fSize*100)/100)+' '+fSExt[i];
		if(sizeinbytes>31457280){
			$(".ace-file-input- .label").removeClass("label-warning");	
			$(".ace-file-input- .label").addClass("label-danger");
			$(".ace-file-input- .label").html('<i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>  Your file size limit exceed. Your file size is: '+size);
			$("#add_new_document").attr("type", "button");
		}else{
			$(".ace-file-input- .label").removeClass("label-warning");	
			$(".ace-file-input- .label").removeClass("label-danger");	
			$(".ace-file-input- .label").addClass("label-success");
			$(".ace-file-input- .label").html('<i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>  Your files are valid for our database. Your files size is: '+size);
			$("#add_new_document").attr("type", "submit");
		}
		$("#loader-2").hide();
		/*$(this).each(data.files, function (index, file) {
			total += file.size;
		});		
		alert(total);
		$("#loader-2").show();
		var sizeinbytes = this.files[0].size;
		var filename = this.files[0].name;
		var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
		fSize = sizeinbytes; i=0;while(fSize>900){fSize/=1024;i++;}
		var size = (Math.round(fSize*100)/100)+' '+fSExt[i];
		if(sizeinbytes>31457280){
			$(".ace-file-input- .label").removeClass("label-warning");	
			$(".ace-file-input- .label").addClass("label-danger");
			$(".ace-file-input- .label").html('<i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>  Your file size limit exceed. Your file size is: '+size);
			$("#add_new_document").attr("type", "button");
		}else{
			$(".ace-file-input- .label").removeClass("label-warning");	
			$(".ace-file-input- .label").removeClass("label-danger");	
			$(".ace-file-input- .label").addClass("label-success");
			$(".ace-file-input- .label").html('<i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>  Your file is valid for our database. Your file "'+filename+'" size is: '+size);
			$("#add_new_document").attr("type", "submit");
		}
		$("#loader-2").hide();*/
	});
});
</script> 
<script src="http://malsup.github.com/jquery.form.js"></script> 
<script>  
 (function() {  
 var bar = $('.bar');  
 var percent = $('.progress-upload');  
 var status = $('.progress-bar-upload');  
 $('form#<?php echo $variable; ?>').ajaxForm({ 
   beforeSend: function() { 
     $("#progress_upload").show();
     status.empty();  
     var percentVal = '0%';  
     bar.width(percentVal);
	 percent.attr("data-percent", percentVal);
	 status.attr("style", "width:"+percentVal+";");
    // percent.html(percentVal);  
   },  
   uploadProgress: function(event, position, total, percentComplete) {  
     var percentVal = percentComplete + '%';  
     bar.width(percentVal)  
	 percent.attr("data-percent", percentVal);
	 status.attr("style", "width:"+percentVal+";");
	 //percent.html(percentVal);  
   },  
   complete: function(xhr) {  
		window.location = "<?php echo site_url("documents"); ?>";
   }  
 });   
 })();      
 </script> 
