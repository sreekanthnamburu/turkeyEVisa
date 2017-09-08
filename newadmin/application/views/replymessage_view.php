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
                                <li>Messages</li>
                                <li><a class="link-effect" href="">Reply to Mail</a></li>
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
                                        <?=$message;?>
                                    </div>
                                    <?php }?>
                            <form class="js-validation-edit-template form-horizontal" action="<?php echo site_url(uri_string())?>" method="post">
                                        <div class="form-group">
                                        <label class="col-md-3 control-label" for="example-hf-email">Name :</label>
                                            <div class="col-md-7">
                                                	<div class="form-control-static">
														<?=$messages->name?>
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-3 control-label" for="example-hf-email">Email :</label>
                                            <div class="col-sm-7">
                                                	<div class="form-control-static">
														<?php echo $messages->email;?>
                                                        </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-hf-email">Message :</label>
                                            <div class="col-sm-7">
                                                	<div class="form-control-static">
														<?=$messages->message;?>
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-3 control-label" for="example-hf-email">Subject :</label>
                                            <div class="col-sm-7">
												<input type="text" class="form-control" name="subject" value="<?=$messages->subject;?>"  />
                                            </div>
                                        </div>
                                        <div class="form-group email_templates">
                                        <label class="col-md-3 control-label" for="example-hf-email">Select from Template :</label>
                                            <div class="col-sm-7">
												<select name="email_template" class="form-control" id="email_template">
                                                <option value="">Select Template</option>
                                                <?php foreach($email_templates as $et):?>
                                                <option value="<?=$et->id;?>"><?=$et->templatename;?></option>
                                                <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-hf-email">Reply Message :</label>
                                            <div class="col-md-9">
                                                <div class="block-content block-content-full">
                                                <textarea class="js-summernote" id="templateData" name="templateData"></textarea>
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group">
                                        <label class="col-md-3 control-label" for="example-hf-email"></label>
                                            <div class="col-xs-9">
                                            	<a href="<?=base_url();?>index.php/application" class="btn btn-sm btn-inverse">Cancel</a>
                                                <button class="btn btn-sm btn-primary" name="submit" type="submit">Send Mail</button>
                                            </div>
                                        </div>	
                                    </form>
                        </div>
                    </div>
                    <!-- END My Block -->
                </div>
                <!-- END Page Content -->
            </main>