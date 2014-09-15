<?php include(APPPATH."views/inc/header.php"); ?>

<div class="row">
  <div class="col-xs-12"> 
    <!-- PAGE CONTENT BEGINS -->
    
    <div class="error-container">
      <div class="well">
        <h1 class="grey lighter smaller"> <span class="blue bigger-125"> <i class="ace-icon fa fa-sitemap"></i> 404 </span> Page Not Found </h1>
        <hr>
        <h3 class="lighter smaller">We looked everywhere but we couldn't find it!</h3>
        <div>
          <form class="form-search">
            <span class="input-icon align-middle"> <i class="ace-icon fa fa-search"></i>
            <input type="text" placeholder="Give it a search..." class="search-query">
            </span>
            <button type="button" class="btn btn-sm">Go!</button>
          </form>
          <div class="space"></div>
          <h4 class="smaller">Try one of the following:</h4>
          <ul class="list-unstyled spaced inline bigger-110 margin-15">
            <li> <i class="ace-icon fa fa-hand-o-right blue"></i> Re-check the url for typos </li>
            <li> <i class="ace-icon fa fa-hand-o-right blue"></i> Read the faq </li>
            <li> <i class="ace-icon fa fa-hand-o-right blue"></i> Tell us about it </li>
          </ul>
        </div>
        <hr>
        <div class="space"></div>
        <div class="center"> <a class="btn btn-grey" href="javascript:history.back()"> <i class="ace-icon fa fa-arrow-left"></i> Go Back </a> <a class="btn btn-primary" href="<?php echo site_url("dashboard"); ?>"> <i class="ace-icon fa fa-tachometer"></i> Dashboard </a> </div>
      </div>
    </div>
    
    <!-- PAGE CONTENT ENDS --> 
  </div>
  <!-- /.col --> 
</div>
<?php include(APPPATH."views/inc/footer.php"); ?>
