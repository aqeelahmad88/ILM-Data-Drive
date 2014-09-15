<?php include(APPPATH."views/inc/header.php"); ?>

<div class="row">
  <div class="col-xs-12">
    <div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
      <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-23" aria-selected="true"> <a href="#tabs-1" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-23"> <i class=" ace-icon  fa fa-home green"></i> Personal</a> </li>
        <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-2" aria-labelledby="ui-id-24" aria-selected="false"> <a href="#tabs-2" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-24"> <i class=" ace-icon  fa fa-book purple"></i> Resume</a> </li>
        <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-3" aria-labelledby="ui-id-25" aria-selected="false"> <a href="#tabs-3" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-25"> <i class=" ace-icon  fa fa-lock orange"></i> Privacy</a> </li>
        <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-3" aria-labelledby="ui-id-25" aria-selected="false"> <a href="#tabs-4" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-25"> <i class="blue ace-icon fa fa-key bigger-125"></i> Password</a> </li>
      </ul>
      <div id="tabs-1" aria-labelledby="ui-id-23" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false">
        <?php include("personal.php"); ?>
      </div>
      <div id="tabs-2" aria-labelledby="ui-id-24" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" style="display: none;" aria-expanded="false" aria-hidden="true">
        <?php include("resume.php"); ?>
      </div>
      <div id="tabs-3" aria-labelledby="ui-id-25" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" style="display: none;" aria-expanded="false" aria-hidden="true">
        <?php include("privacy.php"); ?>
      </div>
      <div id="tabs-4" aria-labelledby="ui-id-25" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" style="display: none;" aria-expanded="false" aria-hidden="true">
        <?php include("password.php"); ?>
      </div>
    </div>
  </div>
</div>
<?php include(APPPATH."views/inc/footer.php"); ?>
<script>
	$(document).ready(function(e) {
		$("#add_new_education").click(function(e) {
			var id = $("#add_new_education").attr("data-id");
			$("#add_new_education").attr("data-id", Number(id)+1);
			$("#resume_wizard_education > tbody:last").append('<tr id="first_'+id+'"><td><input type="text" placeholder="Degree Name" id="edu_degree" name="edu_degree[]" class="input-sm"> <input type="text" placeholder="Institution" id="edu_institution" name="edu_institution[]" class="input-sm"> <select id="edu_year" name="edu_year[]"><option value="">Year</option><?php for($i=date('Y'); $i>date('Y')-50; $i--){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select> <a href="javascript: void(0)" class="red" onclick="remove_education('+id+')"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></td></tr>');		
        });
		$("#add_new_experience").click(function(e) {
			var id = $("#add_new_experience").attr("data-id");
			$("#add_new_experience").attr("data-id", Number(id)+1);
			$("#resume_wizard_experience > tbody:last").append('<tr id="first_'+id+'"><td><input type="text" placeholder="Organization Name" id="ex_organization" name="ex_organization[]" class="input-sm"> <input type="text" placeholder="Designation" id="ex_designation" name="ex_designation[]" class="input-sm"> <select id="ex_from" name="ex_from[]"><option value="">From</option><?php for($i=date('Y'); $i>date('Y')-50; $i--){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select> <select id="ex_to" name="ex_to[]"><option value="">To</option><?php for($i=date('Y'); $i>date('Y')-50; $i--){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select> <a href="javascript: void(0)" class="red" onclick="remove_experience('+id+')"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></td></tr>');		
        });
		$("#add_new_skills").click(function(e) {
			var id = $("#add_new_skills").attr("data-id");
			$("#add_new_skills").attr("data-id", Number(id)+1);
			$("#resume_wizard_skills > tbody:last").append('<tr id="first_'+id+'"><td><input type="text" placeholder="Skill Name" id="skill_name" name="skill_name[]" class="input-sm"> Know about this skill: <select id="about_skill" name="about_skill[]"><option value=""></option><?php for($i=100; $i>0; $i--){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?>%</option><?php } ?></select> <a href="javascript: void(0)" class="red" onclick="remove_skills('+id+')"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></td></tr>');		
        });
	});


function remove_education(id){
	$("#first_"+id).remove();
} 	
function remove_experience(id){
	$("#first_"+id).remove();
} 	
function remove_skills(id){
	$("#first_"+id).remove();
} 	
</script> 
<script>
function isAlphaOrParen(str) {
  return /^[a-z A-Z()]+$/.test(str);
}
function checkUrl(url)
{
    var pattern = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;
    if(pattern.test(url)){
        return true;
    } else {
        return false;
    }
}	
	$(document).ready(function(e) {
		$(".limit_char").each(function(index, element) {
            $(this).keyup(function(e) {
                var id = $(this).attr("id");
				var val = $("#"+id).val();
				var length = $(this).val().length;
				var length_limit = 10;
				if(id=="father_name"){
					length_limit = 15;
				}
				if(id=="city_" || id=="province" || id=="country_"){
					length_limit = 25;
				}

				if(isAlphaOrParen(val)===false || length >= length_limit){
					$("#span_"+id).fadeIn(400).html("&nbsp;&nbsp; Sorry! Only alphabatical text character with max "+length_limit+" length.");
				}else{
					$("#span_"+id).fadeOut(400);
				}
            });
        });
		$(".limit_number").each(function(index, element) {
            $(this).keyup(function(e) {
                var id = $(this).attr("id");
				var val = $("#"+id).val();
				var length = $(this).val().length;
				var length_limit = 13;
				
				if($.isNumeric(val)===false || length > length_limit){
					$("#span_"+id).fadeIn(400).html("&nbsp;&nbsp; Sorry! Only numerical digits with max 13 length. No special characters");
				}else{
					$("#span_"+id).fadeOut(400);
				}
            });
        });

		$(".valid_link").each(function(index, element) {
			$(this).keyup(function(e) {
				var id = $(this).attr("id");
				var val = $("#"+id).val();	
				if(checkUrl(val)==false){
					$("#span_"+id).fadeIn(400).html("&nbsp;&nbsp; Invalid URL! Please enter a valid URL");
				}
			});
		});
	});

</script>