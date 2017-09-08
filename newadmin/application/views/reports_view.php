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
                                <li>Reports</li>
                                <li><a class="link-effect" href="">Export Reports</a></li>
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
                                                                <form class="js-validation-edit-template form-horizontal push-10-t" action="<?php echo site_url('reports/reports_csv')?>" method="post">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <select name="export" class="form-control">
                                                    <option value="completed">Completed Applications</option>
                                                    <option value="pending"> Pending Applications</option>
                                                    <option value="process">Processing Applications</option>
                                                    </select>
                                                    <label for="first_name">Select to export</label>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <div class="col-xs-12">
                                                <button class="btn btn-sm btn-primary" name="submit" type="submit">Generate CSV</button>
                                            </div>
                                        </div>	
                        </div>
                    </div>
                    <!-- END My Block -->
                </div>
                <!-- END Page Content -->
            </main>