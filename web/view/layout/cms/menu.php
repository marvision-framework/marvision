
      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?= $_SESSION['User']->img ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?= $_SESSION['User']->fullname ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"><center><?= date("Y-m-d H:i:s"); ?></center></li>
            <li class="treeview <?=(!empty($rightmenu)&&($rightmenu['categ'] == "dashboard")) ? "active" : "" ; ?>">
              <a href="<?= URL;?>/admin">
                <i class="fa fa-menu"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview <?=(!empty($rightmenu)&&($rightmenu['categ'] == "users")) ? "active" : "" ; ?>">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu <?=(!empty($rightmenu)&&($rightmenu['categ'] == "users")) ? "menu-open" : "" ; ?>">
                <li class="<?=(!empty($rightmenu)&&($rightmenu['categ'] == "users")&&($rightmenu['pg'] == "add")) ? "active" : "" ; ?>"><a href="<?= URL;?>/admin/user/add"><i class="fa fa-circle-o"></i>Add User</a></li>
                <li class="<?=(!empty($rightmenu)&&($rightmenu['categ'] == "users")&&($rightmenu['pg'] == "list")) ? "active" : "" ; ?>"><a href="<?= URL;?>/admin/users"><i class="fa fa-circle-o"></i>list Users</a></li>
              </ul>
            </li>
            <li class="treeview <?=(!empty($rightmenu)&&($rightmenu['categ'] == "inbox")) ? "active" : "" ; ?>">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Inbox</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu <?=(!empty($rightmenu)&&($rightmenu['categ'] == "inbox")) ? "menu-open" : "" ; ?>">
                <li class="<?=(!empty($rightmenu)&&($rightmenu['categ'] == "inbox")&&($rightmenu['pg'] == "add")) ? "active" : "" ; ?>"><a href="<?= URL;?>/admin/user/add"><i class="fa fa-circle-o"></i>Send Email</a></li>
                <li class="<?=(!empty($rightmenu)&&($rightmenu['categ'] == "inbox")&&($rightmenu['pg'] == "list")) ? "active" : "" ; ?>"><a href="<?= URL;?>/admin/inbox"><i class="fa fa-circle-o"></i>Reseption Box</a></li>
              </ul>
            </li> 
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>