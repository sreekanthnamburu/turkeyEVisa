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
                                <li>Templates</li>
                                <li><a class="link-effect" href="">List All Templates</a></li>
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
                                <table class="table table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 120px;">ID</th>
                                            <th>Template Name</th>
                                            <th style="width: 15%;">Template Type</th>
                                            <th style="width: 15%;">Status</th>
                                            <th class="text-center" style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($email_templates as $row):?>
                                        <tr>
                                            <td class="text-center">
                                               <?=$row->id;?>
                                            </td>
                                            <td class="font-w600"><?php echo $row->templatename;?></td>
                                            <td>
                                            <?php if($row->users =='1'){?>
                                                <span class="label label-success">Users</span>
                                                <?php }else { ?>
                                                <span class="label label-info">Messages</span>
                                                <?php }?>
                                            </td>
                                            <td>
                                            <?php if($row->status =='1'){?>
                                                <span class="label label-success">Active</span>
                                                <?php }else { ?>
                                                <span class="label label-danger">In Active</span>
                                                <?php }?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-sm btn-success" href="<?php echo site_url('template/edit/'.$row->id);?>" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-sm btn-danger" data-href="<?php echo site_url('template/delete/'.$row->id);?>"  data-toggle="modal" data-target="#modal-delete" title="Remove Client"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php echo anchor('template/create', 'New Template',array('class' => 'btn btn-lg btn-primary'))?> 
                    <!-- END Full Table -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->