
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading col-md-12">
                            <div class="col-md-9" role="tabpanel">
                              <ul class="nav nav-tabs corecttab" role="tablist">
                                <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">All</a></li>
                                <li role="presentation"><a href="#my" aria-controls="my" role="tab" data-toggle="tab">My Post</a></li>
                                <li role="presentation"><a href="#myoffline" aria-controls="myoffline" role="tab" data-toggle="tab">My Post offline</a></li>
                                <?php if($_SESSION['User']->role != "2"){?>
                                <li role="presentation"><a href="#mynotverif" aria-controls="mynotverif" role="tab" data-toggle="tab">My Post not verif</a></li>
                                <?php }elseif ($_SESSION['User']->role == "2"){?>
                                <li role="presentation"><a href="#notverif" aria-controls="notverif" role="tab" data-toggle="tab">not verif</a></li>
                                <li role="presentation"><a href="#offline" aria-controls="offline" role="tab" data-toggle="tab">offline</a></li>
                                <?php } ?>
                                <?php foreach (Rdir(VENDOR.'/lib/lang') as $key => $lang) { ?>
                                <li role="presentation" ><a href="#post<?php echo $lang;?>" aria-controls="<?php echo $lang;?>" role="tab" data-toggle="tab"><?php echo strtoupper($lang);?></a></li>
                                <?php } ?>
                              </ul>
                            </div>
                            <div class="col-md-3">
                                <a href="<?php echo URL;?>/admin/blog/add" class="btn btn-info btn-block"> &nbsp; <i class="ion ion-plus-circled"></i> &nbsp; Add New Post </a>
                            </div>
                        </div>
                        <div class="panel-body">
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="all"> 
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover ltble" id="dataTables">
                                        <thead>
                                            <tr>
                                                <th class="emptycel"></th> 
                                                <th> Lang </th>
                                                <th> Title </th>
                                                <th class="emptycel"> Description </th>
                                                <th> Time </th>
                                                <th> Catégorie  </th> 
                                                <th> Tags  </th> 
                                                <th> Vue  </th> 
                                                <th> user </th> 
                                                <th class="emptycel"></th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($posts as $key => $post) :?>
                                            <?php if(($post->online == "1")OR(($_SESSION['User']->role == "2")OR($_SESSION['User']->id == $post->iduser))){?>
                                                <tr class="<?php if((($_SESSION['User']->role == "2")OR($_SESSION['User']->id == $post->iduser))AND($post->online != "1")){ echo "notonline";} ?>">
                                                    <td><img src="<?php echo $post->img;?>" class="hoverpic careimg media-object img-thumbnail user-img"></td> 
                                                     <td>
                                                        <?php foreach (postdata($post)->lang as $key => $langpost) { ?>
                                                            <a href="#post<?php echo $langpost;?>" aria-controls="<?php echo $langpost;?>" role="tab" data-toggle="tab" class="btn btn-lang" ><?php echo strtoupper($langpost);?> </a>
                                                        <?php }?>
                                                    </td>
                                                    <td><h5><?php echo postdata($post)->alltitle[$lang]; ?></h5></td>
                                                    <td><h6><p><?php echo postdata($post)->description;?></p></h6></td>
                                                    <td><h6><?php echo postdata($post)->dure;?></h6></td>
                                                    <td>
                                                        <?php foreach (postdata($post)->categs as $key => $cat) {?>
                                                            <a href="<?php echo URL;?>/blog/categ/<?php echo categdata($cat)->slug;?>" class="tags" target="_blank"><?php echo categdata($cat)->title;?> </a>
                                                        <?php }?>
                                                    </td> 
                                                     <td> 
                                                        <?php if (count(postdata($post)->tags) > 0) { ?>
                                                            <a  data-toggle="modal" data-target="#counttag<?php echo $post->id;?>"> <h6><?php echo count(postdata($post)->tags); ?> Tags</h6></a>
                                                        <?php } ?>
                                                            <div class="modal fade" id="counttag<?php echo $post->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title" id="myModalLabel">Tags</h4>
                                                                        </div>
                                                                        <div class="modal-body"> 
                                                                        <?php foreach (postdata($post)->tags as $key => $tag) {?>
                                                                            <a href="<?php //echo URL;?>" class="tags" target="_blank"><?php echo $tag;?> </a>
                                                                        <?php }?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </td> 
                                                    <td><?php if (count(postdata($post)->vue) > 0) { ?>
                                                        <h6><?php echo postdata($post)->vue;?> vue</h6>
                                                        <?php }?>
                                                    </td>  
                                                    <td><img src="<?php echo userdata($post->iduser)->img;?>" class="hoverpic careimg media-object img-thumbnail user-img imgxmin1" title="<?php echo userdata($post->iduser)->infullname;?>"><span class="hidenintab"><?php echo userdata($post->iduser)->infullname;?></span></td>  
                                                    <td style="width:60px;">
                                                        <?php if(($_SESSION['User']->role == "2")OR($_SESSION['User']->id == $post->iduser)){?>
                                                        <a href="<?php echo URL;?>/admin/delete/<?php echo $post->id;?>?model=Post&red=blog" class="btn btn-danger btn-delete "></a>
                                                        <a href="<?php echo URL;?>/admin/blog/edit/<?php echo $post->id;?>" class="btn btn-success btn-edit "></a>
                                                        <?php } ?>
                                                        <a href="<?php echo URL;?>/blog/<?php echo $post->slug;?>" target="_blank" class="btn btn-info btn-vue "></a>
                                                        <a href="<?php echo URL;?>/admin/analyse?data=post&id=<?php echo $post->id;?>" class="btn btn-warning btn-analyse "></a>
                                                    </td>
                                                </tr> 
                                            <?php }?>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="my">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover ltble" id="dataTables1">
                                        <thead>
                                            <tr>
                                                <th class="emptycel"></th> 
                                                <th> Title </th>
                                                <th class="emptycel"> Description </th>
                                                <th> Time </th>
                                                <th> Catégorie  </th> 
                                                <th> Tags  </th> 
                                                <th> Vue  </th> 
                                                <th class="emptycel"></th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($posts as $key => $post) :?>
                                            <?php if(($_SESSION['User']->id == $post->iduser)AND($post->online == "1")){?>
                                                <tr>
                                                    <td><img src="<?php echo $post->img;?>" class="hoverpic careimg media-object img-thumbnail user-img"></td> 
                                                    <td><h5><?php echo postdata($post)->alltitle[$lang]; ?></h5></td>
                                                    <td><h6><p><?php echo postdata($post)->description;?></p></h6></td>
                                                    <td><?php echo postdata($post)->dure;?></td>
                                                    <td>
                                                        <?php foreach (postdata($post)->categs as $key => $cat) {?>
                                                            <a href="<?php echo URL;?>/blog/categ/<?php echo categdata($cat)->slug;?>" class="tags" target="_blank"><?php echo categdata($cat)->title;?> </a>
                                                        <?php }?>
                                                    </td> 
                                                     <td> 
                                                        <?php if (count(postdata($post)->tags) > 0) { ?>
                                                            <a  data-toggle="modal" data-target="#counttag<?php echo $post->id;?>"> <h6><?php echo count(postdata($post)->tags); ?> Tags</h6></a>
                                                        <?php } ?>
                                                            <div class="modal fade" id="counttag<?php echo $post->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title" id="myModalLabel">Tags</h4>
                                                                        </div>
                                                                        <div class="modal-body"> 
                                                                        <?php foreach (postdata($post)->tags as $key => $tag) {?>
                                                                            <a href="<?php //echo URL;?>" class="tags" target="_blank"><?php echo $tag;?> </a>
                                                                        <?php }?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </td>
                                                    <td><?php if (count(postdata($post)->vue) > 0) { ?>
                                                        <h6><?php echo postdata($post)->vue;?> vue</h6>
                                                        <?php }?>
                                                    </td> 
                                                    <td style="width:60px;">
                                                        <?php if(($_SESSION['User']->role == "2")OR($_SESSION['User']->id == $post->iduser)){?>
                                                        <a href="<?php echo URL;?>/admin/delete/<?php echo $post->id;?>?model=Post&red=blog" class="btn btn-danger btn-delete "></a>
                                                        <a href="<?php echo URL;?>/admin/blog/edit/<?php echo $post->id;?>" class="btn btn-success btn-edit "></a>
                                                        <?php } ?>
                                                        <a href="<?php echo URL;?>/blog/<?php echo $post->slug;?>" target="_blank" class="btn btn-info btn-vue "></a>
                                                        <a href="<?php echo URL;?>/admin/analyse?data=post&id=<?php echo $post->id;?>" class="btn btn-warning btn-analyse "></a>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="myoffline">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover ltble" id="dataTables2">
                                        <thead>
                                            <tr>
                                                <th class="emptycel"></th> 
                                                <th> Title </th>
                                                <th class="emptycel"> Description </th>
                                                <th> Time </th>
                                                <th> Catégorie  </th> 
                                                <th> Tags  </th> 
                                                <th> Vue  </th> 
                                                <th class="emptycel"></th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($posts as $key => $post) :?>
                                            <?php if(($_SESSION['User']->id == $post->iduser)AND($post->online == "0")){?>
                                                   <tr>
                                                    <td><img src="<?php echo $post->img;?>" class="hoverpic careimg media-object img-thumbnail user-img"></td> 
                                                    <td><h5><?php echo postdata($post)->alltitle[$lang]; ?></h5></td>
                                                    <td><h6><p><?php echo postdata($post)->description;?></p></h6></td>
                                                    <td><?php echo postdata($post)->dure;?></td>
                                                    <td>
                                                        <?php foreach (postdata($post)->categs as $key => $cat) {?>
                                                            <a href="<?php echo URL;?>/blog/categ/<?php echo categdata($cat)->slug;?>" class="tags" target="_blank"><?php echo categdata($cat)->title;?> </a>
                                                        <?php }?>
                                                    </td> 
                                                     <td> 
                                                        <?php if (count(postdata($post)->tags) > 0) { ?>
                                                            <a  data-toggle="modal" data-target="#counttag<?php echo $post->id;?>"> <h6><?php echo count(postdata($post)->tags); ?> Tags</h6></a>
                                                        <?php } ?>
                                                            <div class="modal fade" id="counttag<?php echo $post->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title" id="myModalLabel">Tags</h4>
                                                                        </div>
                                                                        <div class="modal-body"> 
                                                                        <?php foreach (postdata($post)->tags as $key => $tag) {?>
                                                                            <a href="<?php //echo URL;?>" class="tags" target="_blank"><?php echo $tag;?> </a>
                                                                        <?php }?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </td>
                                                    <td><?php if (count(postdata($post)->vue) > 0) { ?>
                                                        <h6><?php echo postdata($post)->vue;?> vue</h6>
                                                        <?php }?>
                                                    </td> 
                                                    <td style="width:60px;">
                                                        <?php if(($_SESSION['User']->role == "2")OR($_SESSION['User']->id == $post->iduser)){?>
                                                        <a href="<?php echo URL;?>/admin/delete/<?php echo $post->id;?>?model=Post&red=blog" class="btn btn-danger btn-delete "></a>
                                                        <a href="<?php echo URL;?>/admin/blog/edit/<?php echo $post->id;?>" class="btn btn-success btn-edit "></a>
                                                        <?php } ?>
                                                        <a href="<?php echo URL;?>/blog/<?php echo $post->slug;?>" target="_blank" class="btn btn-info btn-vue "></a>
                                                        <a href="<?php echo URL;?>/admin/analyse?data=post&id=<?php echo $post->id;?>" class="btn btn-warning btn-analyse "></a>
                                                    </td> 
                                                   </tr>
                                            <?php }?>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php if($_SESSION['User']->role != "2"){?>
                            <div role="tabpanel" class="tab-pane" id="mynotverif">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover ltble" id="dataTables3">
                                        <thead>
                                            <tr>
                                                <th class="emptycel"></th> 
                                                <th> Title </th>
                                                <th class="emptycel"> Description </th>
                                                <th> Time </th>
                                                <th> Catégorie  </th> 
                                                <th> Tags  </th> 
                                                <th> Vue  </th> 
                                                <th class="emptycel"></th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($posts as $key => $post) :?>
                                            <?php if(($_SESSION['User']->id == $post->iduser)AND($post->online == "2")){?>
                                                <tr class="">
                                                    <td><img src="<?php echo $post->img;?>" class="hoverpic careimg media-object img-thumbnail user-img"></td> 
                                                    <td><h5><?php echo postdata($post)->alltitle[$lang]; ?></h5></td>
                                                    <td><h6><p><?php echo postdata($post)->description;?></p></h6></td>
                                                    <td><?php echo postdata($post)->dure;?></td>
                                                    <td>
                                                        <?php foreach (postdata($post)->categs as $key => $cat) {?>
                                                            <a href="<?php echo URL;?>/blog/categ/<?php echo categdata($cat)->slug;?>" class="tags" target="_blank"><?php echo categdata($cat)->title;?> </a>
                                                        <?php }?>
                                                    </td> 
                                                     <td> 
                                                        <?php if (count(postdata($post)->tags) > 0) { ?>
                                                            <a  data-toggle="modal" data-target="#counttag<?php echo $post->id;?>"> <h6><?php echo count(postdata($post)->tags); ?> Tags</h6></a>
                                                        <?php } ?>
                                                            <div class="modal fade" id="counttag<?php echo $post->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title" id="myModalLabel">Tags</h4>
                                                                        </div>
                                                                        <div class="modal-body"> 
                                                                        <?php foreach (postdata($post)->tags as $key => $tag) {?>
                                                                            <a href="<?php //echo URL;?>" class="tags" target="_blank"><?php echo $tag;?> </a>
                                                                        <?php }?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </td> 
                                                    <td><?php if (count(postdata($post)->vue) > 0) { ?>
                                                        <h6><?php echo postdata($post)->vue;?> vue</h6>
                                                        <?php }?>
                                                    </td> 
                                                    <td style="width:60px;">
                                                        <?php if(($_SESSION['User']->role == "2")OR($_SESSION['User']->id == $post->iduser)){?>
                                                        <a href="<?php echo URL;?>/admin/delete/<?php echo $post->id;?>?model=Post&red=blog" class="btn btn-danger btn-delete "></a>
                                                        <a href="<?php echo URL;?>/admin/blog/edit/<?php echo $post->id;?>" class="btn btn-success btn-edit "></a>
                                                        <?php } ?>
                                                        <a href="<?php echo URL;?>/blog/<?php echo $post->slug;?>" target="_blank" class="btn btn-info btn-vue "></a>
                                                        <a href="<?php echo URL;?>/admin/analyse?data=post&id=<?php echo $post->id;?>" class="btn btn-warning btn-analyse "></a>
                                                    </td>
                                                </tr> 
                                            <?php }?>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php }elseif ($_SESSION['User']->role == "2"){?>
                            <div role="tabpanel" class="tab-pane" id="offline">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover ltble" id="dataTables4">
                                        <thead>
                                            <tr>
                                                <th class="emptycel"></th> 
                                                <th> Title </th>
                                                <th class="emptycel"> Description </th>
                                                <th> Time </th>
                                                <th> Catégorie  </th> 
                                                <th> Tags  </th> 
                                                <th> Vue  </th> 
                                                <th> user </th> 
                                                <th class="emptycel"></th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($posts as $key => $post) :?>
                                            <?php if(($post->online == "0")){?>
                                                <tr class="">
                                                    <td><img src="<?php echo $post->img;?>" class="hoverpic careimg media-object img-thumbnail user-img"></td> 
                                                    <td><h5><?php echo postdata($post)->alltitle[$lang]; ?></h5></td>
                                                    <td><h6><p><?php echo postdata($post)->description;?></p></h6></td>
                                                    <td><?php echo postdata($post)->dure;?></td>
                                                    <td>
                                                        <?php foreach (postdata($post)->categs as $key => $cat) {?>
                                                            <a href="<?php echo URL;?>/blog/categ/<?php echo categdata($cat)->slug;?>" class="tags" target="_blank"><?php echo categdata($cat)->title;?> </a>
                                                        <?php }?>
                                                    </td> 
                                                     <td> 
                                                        <?php if (count(postdata($post)->tags) > 0) { ?>
                                                            <a  data-toggle="modal" data-target="#counttag<?php echo $post->id;?>"> <h6><?php echo count(postdata($post)->tags); ?> Tags</h6></a>
                                                        <?php } ?>
                                                            <div class="modal fade" id="counttag<?php echo $post->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title" id="myModalLabel">Tags</h4>
                                                                        </div>
                                                                        <div class="modal-body"> 
                                                                        <?php foreach (postdata($post)->tags as $key => $tag) {?>
                                                                            <a href="<?php //echo URL;?>" class="tags" target="_blank"><?php echo $tag;?> </a>
                                                                        <?php }?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </td>
                                                    <td><?php if (count(postdata($post)->vue) > 0) { ?>
                                                        <h6><?php echo postdata($post)->vue;?> vue</h6>
                                                        <?php }?>
                                                    </td> 
                                                    <td><img src="<?php echo userdata($post->iduser)->img;?>" class="hoverpic careimg media-object img-thumbnail user-img imgxmin2" title="<?php echo userdata($post->iduser)->infullname;?>"><span class="hidenintab"><?php echo userdata($post->iduser)->infullname;?></span></td>  
                                                    <td style="width:60px;">
                                                        <?php if(($_SESSION['User']->role == "2")OR($_SESSION['User']->id == $post->iduser)){?>
                                                        <a href="<?php echo URL;?>/admin/delete/<?php echo $post->id;?>?model=Post&red=blog" class="btn btn-danger btn-delete "></a>
                                                        <a href="<?php echo URL;?>/admin/blog/edit/<?php echo $post->id;?>" class="btn btn-success btn-edit "></a>
                                                        <?php } ?>
                                                        <a href="<?php echo URL;?>/blog/<?php echo $post->slug;?>" target="_blank" class="btn btn-info btn-vue "></a>
                                                        <a href="<?php echo URL;?>/admin/analyse?data=post&id=<?php echo $post->id;?>" class="btn btn-warning btn-analyse "></a>
                                                    </td>
                                                </tr> 
                                            <?php }?>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="notverif">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover ltble" id="dataTables5">
                                        <thead>
                                            <tr>
                                                <th class="emptycel"></th> 
                                                <th> Title </th>
                                                <th class="emptycel"> Description </th>
                                                <th> Time </th>
                                                <th> Catégorie  </th> 
                                                <th> Tags  </th> 
                                                <th> Vue  </th> 
                                                <th> user </th> 
                                                <th class="emptycel"></th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($posts as $key => $post) :?>
                                            <?php if(($post->online == "2")){?>
                                                <tr class="">
                                                    <td><img src="<?php echo $post->img;?>" class="hoverpic careimg media-object img-thumbnail user-img"></td> 
                                                    <td><h5><?php echo postdata($post)->alltitle[$lang]; ?></h5></td>
                                                    <td><h6><p><?php echo postdata($post)->description;?></p></h6></td>
                                                    <td><?php echo postdata($post)->dure;?></td>
                                                    <td>
                                                        <?php foreach (postdata($post)->categs as $key => $cat) {?>
                                                            <a href="<?php echo URL;?>/blog/categ/<?php echo categdata($cat)->slug;?>" class="tags" target="_blank"><?php echo categdata($cat)->title;?> </a>
                                                        <?php }?>
                                                    </td> 
                                                     <td> 
                                                        <?php if (count(postdata($post)->tags) > 0) { ?>
                                                            <a  data-toggle="modal" data-target="#counttag<?php echo $post->id;?>"> <h6><?php echo count(postdata($post)->tags); ?> Tags</h6></a>
                                                        <?php } ?>
                                                            <div class="modal fade" id="counttag<?php echo $post->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title" id="myModalLabel">Tags</h4>
                                                                        </div>
                                                                        <div class="modal-body"> 
                                                                        <?php foreach (postdata($post)->tags as $key => $tag) {?>
                                                                            <a href="<?php //echo URL;?>" class="tags" target="_blank"><?php echo $tag;?> </a>
                                                                        <?php }?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </td> 
                                                    <td><?php if (count(postdata($post)->vue) > 0) { ?>
                                                        <h6><?php echo postdata($post)->vue;?> vue</h6>
                                                        <?php }?>
                                                    </td> 
                                                    <td><img src="<?php echo userdata($post->iduser)->img;?>" class="hoverpic careimg media-object img-thumbnail user-img imgxmin2" title="<?php echo userdata($post->iduser)->infullname;?>"><span class="hidenintab"><?php echo userdata($post->iduser)->infullname;?></span></td>  
                                                    <td style="width:60px;">
                                                        <?php if(($_SESSION['User']->role == "2")OR($_SESSION['User']->id == $post->iduser)){?>
                                                        <a href="<?php echo URL;?>/admin/delete/<?php echo $post->id;?>?model=Post&red=blog" class="btn btn-danger btn-delete "></a>
                                                        <a href="<?php echo URL;?>/admin/blog/edit/<?php echo $post->id;?>" class="btn btn-success btn-edit "></a>
                                                        <?php } ?>
                                                        <a href="<?php echo URL;?>/blog/<?php echo $post->slug;?>" target="_blank" class="btn btn-info btn-vue "></a>
                                                        <a href="<?php echo URL;?>/admin/analyse?data=post&id=<?php echo $post->id;?>" class="btn btn-warning btn-analyse "></a>
                                                    </td>
                                                </tr> 
                                            <?php }?>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php }?>
                            <?php foreach (Rdir(VENDOR.'/lib/lang') as $key => $lang) { ?>
                            <div role="tabpanel" class="tab-pane" id="post<?php echo $lang;?>">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover ltble" id="dataTables<?php echo $lang;?>">
                                        <thead>
                                            <tr>
                                                <th class="emptycel"></th> 
                                                <th> Title </th>
                                                <th class="emptycel"> Description </th>
                                                <th> Time </th>
                                                <th> Catégorie  </th> 
                                                <th> Tags  </th> 
                                                <th> Vue  </th> 
                                                <th> user </th> 
                                                <th class="emptycel"></th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($posts as $key => $post) :?>
                                            <?php if(in_array($lang, postdata($post)->lang)){?>
                                                <tr class="">
                                                    <td><img src="<?php echo $post->img;?>" class="hoverpic careimg media-object img-thumbnail user-img"></td> 
                                                    <td><h5><?php echo postdata($post)->alltitle[$lang]; ?></h5></td>
                                                    <td><h6><p><?php echo postdata($post)->alldescription[$lang];?></p></h6></td>
                                                    <td><?php echo postdata($post)->dure;?></td>
                                                    <td>
                                                        <?php foreach (postdata($post)->categs as $key => $cat) {?>
                                                            <a href="<?php echo URL;?>/blog/categ/<?php echo categdata($cat)->slug;?>" class="tags" target="_blank"><?php echo categdata($cat)->title;?> </a>
                                                        <?php }?>
                                                    </td> 
                                                     <td> 
                                                        <?php if (count(postdata($post)->tags) > 0) { ?>
                                                            <a  data-toggle="modal" data-target="#counttag<?php echo $post->id;?>"> <h6><?php echo count(postdata($post)->tags); ?> Tags</h6></a>
                                                        <?php } ?>
                                                            <div class="modal fade" id="counttag<?php echo $post->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title" id="myModalLabel">Tags</h4>
                                                                        </div>
                                                                        <div class="modal-body"> 
                                                                        <?php foreach (postdata($post)->tags as $key => $tag) {?>
                                                                            <a href="<?php //echo URL;?>" class="tags" target="_blank"><?php echo $tag;?> </a>
                                                                        <?php }?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </td>
                                                    <td><?php if (count(postdata($post)->vue) > 0) { ?>
                                                        <h6><?php echo postdata($post)->vue;?> vue</h6>
                                                        <?php }?>
                                                    </td> 
                                                    <td><img src="<?php echo userdata($post->iduser)->img;?>" class="hoverpic careimg media-object img-thumbnail user-img imgxmin2" title="<?php echo userdata($post->iduser)->infullname;?>"><span class="hidenintab"><?php echo userdata($post->iduser)->infullname;?></span></td>  
                                                    <td style="width:60px;">
                                                        <?php if(($_SESSION['User']->role == "2")OR($_SESSION['User']->id == $post->iduser)){?>
                                                        <a href="<?php echo URL;?>/admin/delete/<?php echo $post->id;?>?model=Post&red=blog" class="btn btn-danger btn-delete "></a>
                                                        <a href="<?php echo URL;?>/admin/blog/edit/<?php echo $post->id;?>" class="btn btn-success btn-edit "></a>
                                                        <?php } ?>
                                                        <a href="<?php echo URL;?>/blog/<?php echo $post->slug;?>" target="_blank" class="btn btn-info btn-vue "></a>
                                                        <a href="<?php echo URL;?>/admin/analyse?data=post&id=<?php echo $post->id;?>" class="btn btn-warning btn-analyse "></a>
                                                    </td>
                                                </tr> 
                                            <?php }?>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php }?>

                          </div>
                           
                        </div>
                    </div>
                </div>
            </div>