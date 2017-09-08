<main id="main-container">
                <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                <?=$header_title;?>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Users</li>
                                <li><a class="link-effect" href="">Edit Group</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content">
                    <!-- My Block -->
                    <div class="block">
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <button type="button"><i class="si si-settings"></i></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="close"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title"><?=$header_title;?></h3>
                        </div>
                        <div class="block-content">
                                                     <?php if($message){?>
                            <div class="alert alert-success alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                        <?php echo $message;?>
                                    </div>
                                    <?php }?>
                            <form class="js-validation-edit-group form-horizontal push-10-t" action="<?php echo current_url()?>" method="post">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="group_name" value="<?=$group_name['value']?>" name="group_name" placeholder="Choose a Group Name..">
                                                    <label for="first_name">Group Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" value="<?=$group_description['value'];?>"  id="group_description" name="group_description" placeholder="Enter your Description..">
                                                    <label for="last_name">Description</label>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                            	<a href="<?=base_url();?>index.php/auth/users" class="btn btn-sm btn-inverse">Cancel</a>
                                                <button class="btn btn-sm btn-primary" name="submit" type="submit">Save Group</button>
                                            </div>
                                        </div>
                                       </form>
                        </div>
                    </div>
                    <!-- END My Block -->
                </div>
                <!-- END Page Content -->
            </main>