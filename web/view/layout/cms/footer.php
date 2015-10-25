
      <footer class="main-footer">
        <div class="pull-right hidden-xs"><b>Version</b> 2.3.0</div>
        <strong>Copyright &copy; 2014-2015 .</strong> All rights reserved.
      </footer>

      <?php require_once 'rightbar.php'; ?>  
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

      <!-- jQuery 2.1.4 -->
      <script src="<?= SRC_CMS?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?= SRC_CMS?>/bootstrap/js/bootstrap.min.js"></script>
    
    <?php if (!empty($datatab)) : ?>
    <!-- DataTables -->
    <script src="<?= SRC_CMS?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= SRC_CMS?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script>
      $(function () {
    <?php for ($i=0; $i < $datatab; $i++) {  ?>
        $('#datatab<?= $i ?>').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
    <?php } ?>
      });
    </script>
    <?php endif; ?>
    <!-- SlimScroll -->
    <script src="<?= SRC_CMS?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= SRC_CMS?>/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= SRC_CMS?>/dist/js/app.min.js"></script>
    <!-- img upload -->
    <script src="<?= SRC_CMS?>/plugins/jasny/js/bootstrap-fileupload.js"></script>
    <!--  bottstrap switch btn -->
    <script src="<?= SRC_CMS?>/plugins/switch/static/js/bootstrap-switch.min.js"></script>
    <!-- basic function js -->
    <script src="<?= SRC_BOOT ?>/js/basicFunction.js"></script>
    
    <script>
      <?php if (!empty($jscript)) { echo $jscript; } ?>
    </script>