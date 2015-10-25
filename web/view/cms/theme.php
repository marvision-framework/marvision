
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading col-md-12">
                            <div class="col-md-10" role="tabpanel">
                              <ul class="nav nav-tabs corecttab" role="tablist">
                                <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">Automatique</a></li>
                                <!--li role="presentation" ><a href="#style" aria-controls="style" role="tab" data-toggle="tab">Style sheet</a></li>
                                <li role="presentation" ><a href="#user" aria-controls="user" role="tab" data-toggle="tab">desktop</a></li>
                                <li role="presentation"><a href="#on" aria-controls="on" role="tab" data-toggle="tab">tablet</a></li>
                                <li role="presentation"><a href="#off" aria-controls="off" role="tab" data-toggle="tab">mobile</a></li--> 
                              </ul>
                            </div>
                            <!--div class="col-md-2"> 
                                <a href="<?php //echo URL;?>" class="btn btn-info ">&nbsp;<i class="ion ion-refresh"></i>&nbsp;Restrat</a>
                            </div-->
                        </div>
                        <div class="panel-body">
                          <div class="tab-content col-lg-12 ">
                            <div role="tabpanel" class="tab-pane active" id="all"> 
                                <form action="" method="post" enctype="multipart/form-data" > 
                                <div class="col-lg-12 fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 100%; height: 150px;"><img src="<?php echo $baktop = (!empty($top->value)) ? $top->value : URL."/assets/upload/img/demoUpload.jpg" ;?>" alt="" style="width:100%;"/></div>
                                    <div class="fileupload-preview fileupload-exists thumbnail fullimg" style="max-width: 100%; min-width: 100%;max-height: 150px; min-height: 160px;"></div>
                                    <div style="margin-top: -35px;">
                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Select Top Background</span><span class="fileupload-exists"><i class="ion ion-refresh"></i></span>
                                        <input type="file" name="backtop" /></span>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="ion ion-close"></i></a>
                                        <input class="fileupload-exists btn btn-success" type="submit" value="Upload" name="webbackgroundtop">
                                    </div>
                                </div>
                                </form>
                                <form action="" method="post" enctype="multipart/form-data" > 
                                <div class="col-lg-12 fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 100%; height: 150px;"><img src="<?php echo $bakcont = (!empty($content->value)) ? $content->value : URL."/assets/upload/img/demoUpload.jpg" ;?>" alt="" style="width:100%;"/></div>
                                    <div class="fileupload-preview fileupload-exists thumbnail fullimg" style="max-width: 100%; min-width: 100%;max-height: 150px; min-height: 160px;"></div>
                                    <div style="margin-top: -35px;">
                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Select Content Background</span><span class="fileupload-exists"><i class="ion ion-refresh"></i></span>
                                        <input type="file" name="backcontent" /></span>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="ion ion-close"></i></a>
                                        <input class="fileupload-exists btn btn-success" type="submit" value="Upload" name="webbackgroundcont">
                                    </div>
                                </div>
                                </form>
                                <form action="" method="post" enctype="multipart/form-data" > 
                                <div class="col-lg-12 fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 100%; height: 150px;"><img src="<?php echo $bakfoot = (!empty($footer->value)) ? $footer->value : URL."/assets/upload/img/demoUpload.jpg" ;?>" alt="" style="width:100%;"/></div>
                                    <div class="fileupload-preview fileupload-exists thumbnail fullimg" style="max-width: 100%; min-width: 100%;max-height: 150px; min-height: 160px;"></div>
                                    <div style="margin-top: -35px;">
                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Select Footer Background</span><span class="fileupload-exists"><i class="ion ion-refresh"></i></span>
                                        <input type="file" name="backfooter" /></span>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="ion ion-close"></i></a>
                                        <input class="fileupload-exists btn btn-success" type="submit" value="Upload" name="webbackgroundfoot">
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane " id="style"> 
                                <?php
                                /*$myfile = fopen("http://localhost/4plusup/assets/_WEB/css/css_edit/style.txt", "r") or die("Unable to open file!");
                                // Output one line until end-of-file
                                $file = "";
                                while(!feof($myfile)) {
                                   $file .= fgets($myfile);
                                } 
                                fclose($myfile);*/
                                ?> 
                            </div>
                          </div>
                           
                        </div>
                    </div>
                </div>
            </div>