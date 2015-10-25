<div class="panel">
    <div class="panel-heading "><h3><i class="ion ion-android-settings"></i>&nbsp;Parametres de Site</h3></div>
    <div class="panel-body">
        <div class="row"> 

            <div class="col-lg-6">
                <div class="box">
                    <header><div class="icons"><i class="ion ion-aperture"></i>&nbsp;</div><h5>Logo & Icon :</h5>
                    <div class="toolbar">
                        <div class="btn-group"> 
                            <a href="#sortableTable1" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                <i class="ion ion-eye"></i>
                            </a>
                        </div>
                    </div>
                    </header>
                    <div id="sortableTable1" class="body collapse row in"> 
                       <div class="col-lg-6"> 
                            <img src="<?php echo SiteParam()->icon->img ;?>" title="<?php echo SiteParam()->icon->title; ?>" style="width:100%;"/>
                            <a href="#"  data-toggle="modal" data-target="#myModalicon" class="btn btn-default btn-sm accordion-toggle minimize-box">Upload Icon</a>
                        </div>
                       <div class="col-lg-6">

                            <img src="<?php echo SiteParam()->logo->img ;?>" title="<?php echo SiteParam()->logo->title; ?>" style="width:100%;"/>
                            <a href="#"  data-toggle="modal" data-target="#myModallogo" class="btn btn-default btn-sm accordion-toggle minimize-box">Upload Logo</a>
                        </div>
                    </div>
                </div> 
                        <div class="modal fade" id="myModalicon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="" method="post" enctype="multipart/form-data" class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel"> <i class="ion ion-ios-plus-outline"></i>&nbsp;Add New Icon Site</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <input type="text" placeholder="Title Icon" maxlength="40" id="title" name="titleicon" class="form-control" value="<?php echo SiteParam()->icon->title; ?>">

                                           </div>
                                            <div class="col-lg-5">  
                                                <div class="col-lg-12 fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 100%; height: 150px;"><img src="<?php echo SiteParam()->icon->img ;?>" alt="" style="width:100%;"/></div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail fullimg" style="max-width: 100%; min-width: 100%;max-height: 150px; min-height: 60px;"></div>
                                                    <div style="margin-top: -35px;">
                                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Select icon</span><span class="fileupload-exists"><i class="ion ion-refresh"></i></span>
                                                        <input type="file" name="webicon" /></span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="ion ion-close"></i></a>
                                                        <input class="fileupload-exists btn btn-success" type="submit" value="Upload" name="addwebicon">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                    </div>
                                </form>
                            </div>
                        </div> 

                        <div class="modal fade" id="myModallogo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="" method="post" enctype="multipart/form-data" class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel"> <i class="ion ion-ios-plus-outline"></i>&nbsp;Add New Logo Site</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <input type="text" placeholder="Title Logo" maxlength="40" id="title" name="titlelogo" class="form-control" value="<?php echo SiteParam()->logo->title; ?>">

                                           </div>
                                            <div class="col-lg-5">  
                                                <div class="col-lg-12 fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 100%; height: 150px;"><img src="<?php echo SiteParam()->logo->img ;?>" alt="" style="width:100%;"/></div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail fullimg" style="max-width: 100%; min-width: 100%;max-height: 150px; min-height: 60px;"></div>
                                                    <div style="margin-top: -35px;">
                                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Select logo</span><span class="fileupload-exists"><i class="ion ion-refresh"></i></span>
                                                        <input type="file" name="weblogo" /></span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="ion ion-close"></i></a>
                                                        <input class="fileupload-exists btn btn-success" type="submit" value="Upload" name="addweblogo">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                    </div>
                                </form>
                            </div>
                        </div> 
            </div>




            <div class="col-lg-6">
                <div class="box">
                    <header><div class="icons"><i class="ion ion-code-working"></i>&nbsp;</div><h5>meta :</h5>
                    <div class="toolbar">
                        <div class="btn-group"> 
                          
                          <a href="#sortableTablemeta" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                <i class="ion ion-eye"></i>
                            </a>
                        </div>
                    </div>
                    </header>
                    <div id="sortableTablemeta" class="body collapse row in"> 
                            <div class="table-responsive col-lg-12">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>icon</th>
                                            <th>Meta Name</th>
                                            <th></th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ion icon</td>
                                            <td>name meta</td>
                                            <td><a href="#"  data-toggle="modal" data-target="#myModalmeta1" class="btn btn-default btn-sm accordion-toggle minimize-box">Edit</a></td> 
                                        </tr>
                                        <tr>
                                            <td>ion icon</td>
                                            <td>name meta</td>
                                            <td><a href="#"  data-toggle="modal" data-target="#myModalmeta2" class="btn btn-default btn-sm accordion-toggle minimize-box">Edit</a></td> 
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div> 
                        <div class="modal fade" id="myModalmeta1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="" method="post" enctype="multipart/form-data" class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel"> <i class="ion ion-ios-plus-outline"></i>&nbsp;Add New Icon Site</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <input type="text" placeholder="Title Icon" maxlength="40" id="title" name="titleicon" class="form-control" value="<?php if(!empty($icon->title)){ echo $icon->title;} ?>">

                                           </div>
                                            <div class="col-lg-5">  
                                                <div class="col-lg-12 fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 100%; height: 150px;"><img src="<?php echo $baktop = (!empty($icon->value)) ? $icon->value : URL."/assets/upload/img/demoUpload.jpg" ;?>" alt="" style="width:100%;"/></div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail fullimg" style="max-width: 100%; min-width: 100%;max-height: 150px; min-height: 60px;"></div>
                                                    <div style="margin-top: -35px;">
                                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Select icon</span><span class="fileupload-exists"><i class="ion ion-refresh"></i></span>
                                                        <input type="file" name="webicon" /></span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="ion ion-close"></i></a>
                                                        <input class="fileupload-exists btn btn-success" type="submit" value="Upload" name="addwebicon">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                    </div>
                                </form>
                            </div>
                        </div> 
 
            </div>



        </div>  
    </div>
</div>