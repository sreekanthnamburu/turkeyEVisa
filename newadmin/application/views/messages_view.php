            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                <?php echo $title;?> <small></small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Messages</li>
                                <li><a class="link-effect" href="">List Messages</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content">
                    <!-- Full Table -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title"><?=$header_title?></h3>
                        </div>
                        <div class="block-content">
                           
                             <?php if($message){?>
                            <div class="alert <?=$messagetype;?> alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                        <?php echo $message;?>
                                    </div>
                                    <?php }?>
                            <div class="table-responsive">
                                 <?php if($messages){?>
                                                <table class="table table-striped table-vcenter">
                                                <tr><th>ID</th><th>Name</th><th>Email</th><th>IP</th><th>Subject</th><th>Created Date</th><th>Actions</th></tr>
                                                <?php foreach($messages as $message):?>
                                                <tr>
										<!--
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>-->
											<?php /*<td><?=$applications['id']?></td>*/?>
											<td><?=$message->id?></td>

											<td>
												<?=$message->name?>
											</td>
											<td><?=$message->email?></td>
											<td><?=$message->senderip?></td>
											<td><?=$message->subject?></td>
											<td><?=$message->createddate?></td>
                                            <td><div class="btn-group">
                                                <a class="btn btn-xs btn-success" href="<?php echo site_url('messages/view/'.$message->id);?>" data-toggle="tooltip" title="View Message"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-xs btn-default" href="<?php echo site_url('messages/reply/'.$message->id);?>" data-toggle="tooltip" title="Reply Message"><i class="fa fa-mail-reply"></i></a>
                                                <a class="btn btn-xs btn-danger" data-href="<?php echo site_url('messages/delete/'.$message->id);?>" data-toggle="modal" data-target="#modal-delete" title="Delete Message"><i class="fa fa-trash"></i></a>
                                                </div></td></tr>
												<?php endforeach;?>
                                                </table>
                                                <?php } else{?>
                                                <div class="alert alert-danger">No Messages found</div>
                                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    Showing
                    <strong><?=$page+1;?></strong>
                    -
                    <strong><?=($per_page+$page> $total)?$total:$per_page+$page;?></strong>
                    of
                    <strong><?=$total;?></strong>
                    </div>
                    <div class="col-md-6">
                    <div class="pull-right">
                     <?php echo $pagination;?>
                     </div>
                     </div>
                     </div>
                    <!-- END Full Table -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->