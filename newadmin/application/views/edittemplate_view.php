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
                                <li>Templates</li>
                                <li><a class="link-effect" href="">Edit Template</a></li>
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
                                    <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                </li>
                            </ul>
                            <h3 class="block-title"><?=$header_title;?></h3>
                        </div>
                        <div class="block-content">
                                                     <?php if($message){?>
                            <div class="alert <?=$messagetype;?> alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                        <?php echo $message;?>
                                    </div>
                                    <?php }?>
                            <form class="js-validation-edit-template form-horizontal push-10-t" action="<?php echo site_url(uri_string())?>" method="post">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="templatename" value="<?php echo $email_template->templatename;?>" name="templatename" placeholder="Choose a First Name..">
                                                    <label for="first_name">Template Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material">
                                                <h3 class="block-title">Template Value</h3>
                                                <div class="block-content block-content-full">
                                                <textarea class="js-summernote" name="templateData"><?=$email_template->templateData;?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-sm-1">
                                        <label>Active</label>
                                        </div>
                                            <div class="col-sm-6">
                                                <div class="form-material">
                                                   <label class="css-input switch switch-md switch-primary">
                                    <input type="checkbox" id="status" name="status" <?=$email_template->status=='1'?"checked":"";?>><span></span>
                                </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-sm-1">
                                        <label>User Template</label>
                                        </div>
                                            <div class="col-sm-6">
                                                <div class="form-material">
                                                   <label class="css-input switch switch-md switch-primary">
                                    <input type="checkbox" id="users" name="users" <?=$email_template->users=='1'?"checked":"";?>><span></span>
                                </label>
                                
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <p class="help">If set user template yes . it will display only messages have userid like sending message from applications</p>
                                        <input type="hidden" value="<?=$email_template->id;?>" name="id" />
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                            	<a href="<?=base_url();?>index.php/template" class="btn btn-sm btn-inverse">Cancel</a>
                                                <button class="btn btn-sm btn-primary" name="submit" type="submit">Save Template</button>
                                            </div>
                                        </div>	
                                    </form>
                        </div>
                    </div>
                    <!-- END My Block -->
                </div>
                <!-- END Page Content -->
            </main>