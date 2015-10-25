<section class="content-header">
    <h1>
        <?= translater("edit") ?>
        <small><?= translater("edituser") ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL.'/admin'?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= URL.'/admin/users'?>"><?= translater("user") ?></a></li>
        <li class="active"><?= $user->fullname ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form action="" method="post" class="row" enctype="multipart/form-data">
        <div class="col-lg-8">
            <div class="box">
                <div class="box-body row">
                    <?= Form::InputTxt('nom',array('div.class'=>'col-xs-6'),$user->nom); ?>
                    <?= Form::InputTxt('prenom',array('div.class'=>'col-xs-6'),$user->prenom); ?>
                </div>
                <div class="box-body row">
                    <?= Form::InputEmail('email',array('div.class'=>'col-lg-6'),$user->email); ?>
                    <div class="col-lg-6">
                        <?= Form::InputTxt('password',array('div.class'=>'col-xs-8','id'=>'getrandompassword')); ?>
                        <?= Form::InputBtn('find',array('div.class'=>'col-xs-4','class'=>'btn-success','label'=>'show','id'=>'RandomPassword')); ?>
                    </div>
                </div>
                <div class="box-body row">
                    <?= Form::InputTxt('username',array('div.class'=>'col-lg-6'),$user->username); ?>
                    <div class="form-group col-lg-6">
                        <?= Form::SelectOption('role',array('0'=>'user','2'=>'admin'),array('div.class'=>'col-xs-6','label'=>'show'),$user->role); ?>
                        <div class="col-xs-6">
                            <?= Form::InbutCheckbox('active',array('style'=>'on/off','label'=>'none'),$user->active); ?>
                        </div>
                    </div>

                </div>
                <div class="box-body row">
                    <?= Form::InputDate('birthday',array('div.class'=>'col-lg-8'),$user->birthday); ?>
                    <?= Form::SelectOption('sexe',array('0'=>'women','1'=>'men'),array('div.class'=>'col-xs-3'),$user->sexe); ?>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <?= Form::InbutUploadPicture('image'); ?>
        </div>
        <div class="col-lg-12">
            <input type="submit" name="adduser" class="btn btn-success" value="<?= translater("save") ?>"/>
        </div>
    </form>

</section><!-- /.content -->

<script>
    $(document).ready(function(){
        $( "#RandomPassword" ).click(function() {
            var password = randomString(10);
            $('#getrandompassword').val(password);
        });
    });


</script>
