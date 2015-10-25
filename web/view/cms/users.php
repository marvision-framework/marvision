
        <section class="content-header">
          <h1>
            <?= translater("users"); ?>
            <small><?= translater("listusers"); ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo URL;?>/admin"><i class="fa fa-dashboard"></i> <?= translater("dashboard"); ?></a></li>
            <li><a href="<?php echo URL;?>/admin/users"><?= translater("users"); ?></a></li>
            <li class="active"><?= translater("listusers"); ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">


          <div class="row">
            <div class="col-md-12">
              <a href="<?= Router::url('admin/user/add') ?>" ><i class="glyphicon glyphicon-plus"></i> Add user</a>
              <ul>
                <?php
                  foreach ($users as $key => $user) :
                  $user = userdata($user);
                ?>
                  <li>
                  <b><?= $user->fullname ?> </b> &nbsp;
                    <a href="<?= Router::url('admin/user/edit/'.$user->id) ?>">Edit</a> |
                    <a href="<?= Router::url('admin/delete/'.$user->id.'?tab=user&red=admin/users') ?>">Delete</a>
                  </li>
                </h1>
                <?php endforeach; ?>
              </ul>
             </div>
          </div>
