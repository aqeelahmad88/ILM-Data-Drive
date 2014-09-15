<div id="pictures" class="tab-pane">
  <?php if($pictures->num_rows()>0){ ?>
  <ul class="ace-thumbnails">
    <?php foreach($pictures->result() as $pics){ ?>
    <?php $path = './uploads/'.$pics->doc_paths.'/'.$pics->uploaded_filename; ?>
    <?php if(file_exists($path)){ ?>
    <?php if($user->user_rights==1){ ?>
    <li> <a data-rel="colorbox" href="<?php echo base_url().'uploads/'.$pics->doc_paths.'/'.$pics->uploaded_filename; ?>"> <img src="<?php echo base_url().'uploads/'.$pics->doc_paths.'/'.$pics->uploaded_filename; ?>" alt="150x150" width="150" height="150">
      <div class="text">
        <div class="inner"><?php echo $pics->filename; ?></div>
      </div>
      </a>
      <div class="tools tools-bottom"> <a href="<?php echo site_url("documents/delete_img/?img=".'uploads/'.$pics->doc_paths.'/'.$pics->uploaded_filename); ?>" onclick="return confirm('Are you sure you wish to proceed?')"> <i class="ace-icon fa fa-times red"></i> </a> </div>
    </li>
    <?php }else{ ?>
    <li> <a href="<?php echo base_url().'uploads/'.$pics->doc_paths.'/'.$pics->uploaded_filename; ?>" data-rel="colorbox"> <img alt="150x150" src="<?php echo base_url().'uploads/'.$pics->doc_paths.'/'.$pics->uploaded_filename; ?>" width="150" height="150" />
      <div class="text">
        <div class="inner"><?php echo $pics->filename; ?></div>
      </div>
      </a> </li>
    <?php } ?>
    <?php } ?>
    <?php } ?>
  </ul>
  <?php } ?>
</div>
