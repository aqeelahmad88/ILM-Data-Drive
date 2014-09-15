<form class="form-horizontal" role="form" name="users" id="users" enctype="multipart/form-data" action="<?php echo site_url("settings/resume"); ?>" method="post">
  <?php $rs = json_decode($users->resume); ?>
  <?php if($rs){ ?>
  <div id="resume-tabs">
    <ul>
      <li> <a href="#resume-tabs-1">Education</a> </li>
      <li> <a href="#resume-tabs-2">Work & Experience</a> </li>
      <li> <a href="#resume-tabs-3">Skills</a> </li>
    </ul>
    <div id="resume-tabs-1">
      <table id="resume_wizard_education">
        <tbody>
          <tr>
            <td><input type="text" placeholder="Degree Name" id="edu_degree" name="edu_degree[]" class="input-sm" value="<?php echo $rs->edu_degree[0]; ?>">
              <input type="text" placeholder="Institution" id="edu_institution" name="edu_institution[]" class="input-sm" value="<?php echo $rs->edu_institution[0]; ?>">
              <select id="edu_year" name="edu_year[]">
                <option value="">Year</option>
                <?php for($i=date('Y'); $i>date('Y')-50; $i--){ ?>
                <option value="<?php echo $i; ?>" <?php if($rs->edu_year[0]==$i){echo 'selected';} ?>><?php echo $i; ?></option>
                <?php } ?>
              </select></td>
          </tr>
          <?php for($j=1; $j<count($rs->edu_degree); $j++){ ?>
          <tr id="first_<?php echo $j; ?>">
            <td><input type="text" placeholder="Degree Name" id="edu_degree" name="edu_degree[]" class="input-sm" value="<?php echo $rs->edu_degree[$j]; ?>">
              <input type="text" placeholder="Institution" id="edu_institution" name="edu_institution[]" class="input-sm" value="<?php echo $rs->edu_institution[$j]; ?>">
              <select id="edu_year" name="edu_year[]">
                <option value="">Year</option>
                <?php for($i=date('Y'); $i>date('Y')-50; $i--){ ?>
                <option value="<?php echo $i; ?>" <?php if($rs->edu_year[$j]==$i){echo 'selected';} ?>><?php echo $i; ?></option>
                <?php } ?>
              </select>
              <a href="javascript: void(0)" class="red" onclick="remove_education(<?php echo $j; ?>)"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <br />
      <button class="btn btn-sm btn-inverse btn-green" type="button" id="add_new_education" data-id="<?php echo count($rs->edu_degree); ?>">Add New</button>
    </div>
    <div id="resume-tabs-2">
      <table id="resume_wizard_experience">
        <tbody>
          <tr>
            <td><input type="text" placeholder="Organization Name" id="ex_organization" name="ex_organization[]" class="input-sm" value="<?php echo $rs->ex_organization[0]; ?>">
              <input type="text" placeholder="Designation" id="ex_designation" name="ex_designation[]" class="input-sm" value="<?php echo $rs->ex_designation[0]; ?>">
              <select id="ex_from" name="ex_from[]">
                <option value="">From</option>
                <?php for($i=date('Y'); $i>date('Y')-50; $i--){ ?>
                <option value="<?php echo $i; ?>" <?php if($rs->ex_from[0]==$i){echo 'selected';} ?>><?php echo $i; ?></option>
                <?php } ?>
              </select>
              <select id="ex_to" name="ex_to[]">
                <option value="">To</option>
                <?php for($i=date('Y'); $i>date('Y')-50; $i--){ ?>
                <option value="<?php echo $i; ?>" <?php if($rs->ex_to[0]==$i){echo 'selected';} ?>><?php echo $i; ?></option>
                <?php } ?>
              </select></td>
          </tr>
          <?php for($j=1; $j<count($rs->ex_organization); $j++){ ?>
          <tr id="first_<?php echo $j; ?>">
            <td><input type="text" placeholder="Organization Name" id="ex_organization" name="ex_organization[]" class="input-sm" value="<?php echo $rs->ex_organization[$j]; ?>">
              <input type="text" placeholder="Designation" id="ex_designation" name="ex_designation[]" class="input-sm" value="<?php echo $rs->ex_designation[$j]; ?>">
              <select id="ex_from" name="ex_from[]">
                <option value="">From</option>
                <?php for($i=date('Y'); $i>date('Y')-50; $i--){ ?>
                <option value="<?php echo $i; ?>" <?php if($rs->ex_from[$j]==$i){echo 'selected';} ?>><?php echo $i; ?></option>
                <?php } ?>
              </select>
              <select id="ex_to" name="ex_to[]">
                <option value="">To</option>
                <?php for($i=date('Y'); $i>date('Y')-50; $i--){ ?>
                <option value="<?php echo $i; ?>" <?php if($rs->ex_to[$j]==$i){echo 'selected';} ?>><?php echo $i; ?></option>
                <?php } ?>
              </select>
              <a href="javascript: void(0)" class="red" onclick="remove_experience(<?php echo $j; ?>)"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <br />
      <button class="btn btn-sm btn-inverse btn-green" type="button" id="add_new_experience" data-id="<?php echo count($rs->ex_organization); ?>">Add New</button>
    </div>
    <div id="resume-tabs-3">
      <table id="resume_wizard_skills">
        <tbody>
          <tr>
            <td><input type="text" placeholder="Skill Name" id="skill_name" name="skill_name[]" class="input-sm" value="<?php echo $rs->skill_name[0]; ?>">
              Know about this skill:
              <select id="about_skill" name="about_skill[]">
                <option value=""></option>
                <?php for($i=100; $i>0; $i--){ ?>
                <option value="<?php echo $i; ?>" <?php if($rs->about_skill[0]==$i){echo 'selected';} ?>><?php echo $i; ?>%</option>
                <?php } ?>
              </select></td>
          </tr>
          <?php for($j=1; $j<count($rs->skill_name); $j++){ ?>
          <tr id="first_<?php echo $j; ?>">
            <td><input type="text" placeholder="Skill Name" id="skill_name" name="skill_name[]" class="input-sm" value="<?php echo $rs->skill_name[$j]; ?>">
              Know about this skill:
              <select id="about_skill" name="about_skill[]">
                <option value=""></option>
                <?php for($i=100; $i>0; $i--){ ?>
                <option value="<?php echo $i; ?>" <?php if($rs->about_skill[$j]==$i){echo 'selected';} ?>><?php echo $i; ?>%</option>
                <?php } ?>
              </select>
              <a href="javascript: void(0)" class="red" onclick="remove_skills(<?php echo $j; ?>)"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <br />
      <button class="btn btn-sm btn-inverse btn-green" type="button" id="add_new_skills" data-id="<?php echo count($rs->skill_name); ?>">Add New</button>
    </div>
  </div>
  <?php }else{ ?>
  <div id="resume-tabs">
    <ul>
      <li> <a href="#resume-tabs-1">Education</a> </li>
      <li> <a href="#resume-tabs-2">Work & Experience</a> </li>
      <li> <a href="#resume-tabs-3">Skills</a> </li>
    </ul>
    <div id="resume-tabs-1">
      <table id="resume_wizard_education">
        <tbody>
          <tr>
            <td><input type="text" placeholder="Degree Name" id="edu_degree" name="edu_degree[]" class="input-sm">
              <input type="text" placeholder="Institution" id="edu_institution" name="edu_institution[]" class="input-sm">
              <select id="edu_year" name="edu_year[]">
                <option value="">Year</option>
                <?php for($i=date('Y'); $i>date('Y')-50; $i--){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
              </select></td>
          </tr>
        </tbody>
      </table>
      <br />
      <button class="btn btn-sm btn-inverse btn-green" type="button" id="add_new_education" data-id="1">Add New</button>
    </div>
    <div id="resume-tabs-2">
      <table id="resume_wizard_experience">
        <tbody>
          <tr>
            <td><input type="text" placeholder="Organization Name" id="ex_organization" name="ex_organization[]" class="input-sm">
              <input type="text" placeholder="Designation" id="ex_designation" name="ex_designation[]" class="input-sm">
              <select id="ex_from" name="ex_from[]">
                <option value="">From</option>
                <?php for($i=date('Y'); $i>date('Y')-50; $i--){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
              </select>
              <select id="ex_to" name="ex_to[]">
                <option value="">To</option>
                <?php for($i=date('Y'); $i>date('Y')-50; $i--){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
              </select></td>
          </tr>
        </tbody>
      </table>
      <br />
      <button class="btn btn-sm btn-inverse btn-green" type="button" id="add_new_experience" data-id="1">Add New</button>
    </div>
    <div id="resume-tabs-3">
      <table id="resume_wizard_skills">
        <tbody>
          <tr>
            <td><input type="text" placeholder="Skill Name" id="skill_name" name="skill_name[]" class="input-sm">
              Know about this skill:
              <select id="about_skill" name="about_skill[]">
                <option value=""></option>
                <?php for($i=100; $i>0; $i--){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?>%</option>
                <?php } ?>
              </select></td>
          </tr>
        </tbody>
      </table>
      <br />
      <button class="btn btn-sm btn-inverse btn-green" type="button" id="add_new_skills" data-id="1">Add New</button>
    </div>
  </div>
  <?php } ?>
  <div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
      <button type="submit" class="btn btn-info"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
      &nbsp; &nbsp; &nbsp;
      <button type="reset" class="btn"> <i class="ace-icon fa fa-undo bigger-110"></i> Reset </button>
    </div>
  </div>
</form>
