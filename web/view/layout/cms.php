<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= (!empty($title_for_layout)) ? $title_for_layout  : "Dashbord ".SiteName ; ?></title> 
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <?php require_once 'cms/header.php'; ?>  
  </head>
  <body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper"> 
      <?php require_once 'cms/topbar.php'; ?> 
      <?php require_once 'cms/menu.php'; ?> 
 
      <div class="content-wrapper"> 
        <div class="row"><div class="col-lg-12"><?= $this->Session->flash(); ?></div></div>
        <div class="row"><div class="col-lg-12"><?= $content_for_layout; ?></div></div>
      </div><!-- /.content-wrapper -->

      <?php require_once 'cms/footer.php'; ?>  
  </body>
</html>
