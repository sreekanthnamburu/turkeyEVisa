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
                                <li>Applications</li>
                                <li><a class="link-effect" href="">Edit Application</a></li>
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
                            <form class="js-validation-edit-template form-horizontal" action="<?php echo site_url(uri_string())?>" method="post">
                            <?php
							$firstname=explode('?|',$application->firstname);
							$passport=explode('?|',$application->passportnumber);
							?>
                                        <div class="form-group">
                                        <label class="col-md-3 control-label" for="example-hf-email">First Names :</label>
                                            <div class="col-md-7">
                                                	<div class="form-control-static">
														<?php for($i=0;$i<$application->applicants;$i++){
                                       						echo $firstname[$i]."<br/>";}?>
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-3 control-label" for="example-hf-email">Invoice Number :</label>
                                            <div class="col-sm-7">
                                                	<div class="form-control-static">
														<?php echo $application->invoiceid;?>
                                                        </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-hf-email">Passport Number(s) :</label>
                                            <div class="col-sm-7">
                                                	<div class="form-control-static">
														<?php for($i=0;$i<$application->applicants;$i++){?>
          														<?=$passport[$i]."<br/>"; }?>
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-3 control-label" for="example-hf-email">Invoice :</label>
                                            <div class="col-sm-7">
                                                	<div class="form-control-static">
                                                        <label class="css-input css-radio css-radio-lg css-radio-primary push-10-r">
                                                            <input type="radio" checked="" name="enable" value="1" <?=$application->active=='1'?"checked":""?>><span></span> Enable
                                                        </label>
                                                        <label class="css-input css-radio css-radio-lg css-radio-primary">
                                                            <input type="radio" name="enable" value="0" <?=$application->active=='0'?"checked":""?>><span></span> Disable
                                                        </label>
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-3 control-label" for="example-hf-email">Status :</label>
                                            <div class="col-sm-7">
                                                         <select name="status" id="status" class="form-control">
                                                          <option value="P" <?php if($application->status=='P') {?> selected="selected"<?php }?>> Pending</option>
                                                          <option value="Pr" <?php if($application->status=='Pr') {?> selected="selected"<?php }?>>Processing</option>
                                                          <?php if($visa_docs_count){?>
                                                          <option value="C" <?php if($application->status=='C') {?> selected="selected"<?php }?>>Completed</option><?php }?><?php if($application->visasent =='1'){?>
                                                          <option value="V" <?php if($application->status=='V') {?> selected="selected"<?php }?>>Visa Sent</option><?php }else{?>
                                                          <option value="R" <?php if($application->status=='R') {?> selected="selected"<?php }?>>Issue</option>
                                                          <?php }?>
                                                          
                                                        </select>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-hf-email"></label>
                                            <div class="col-xs-7">
                                                <?php if($visa_docs){?>
                                                <h5>Visa Uploads</h5>
                                                <table class="table table-striped table-vcenter">
                                                <tr><th>Visa Name</th><th>Actions</th></tr>
                                                <?php foreach($visa_docs as $visa):?>
                                                <tr><td><?=$visa->image;?></td><td><a href="<?php echo site_url('application/delete_visa/'.$visa->uniqueid);?>" class="btn btn-sm btn-danger">Delete</a></td></tr><?php endforeach;?>
                                                </table>
                                                <?php }?>
                                                <br/>
                                            	<a data-toggle="modal" data-target="#modal-visaupload" data-href="<?php echo site_url('/application/upload/'.$application->id); ?>" class="btn btn-md btn-success">Upload Visa Documents</a>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                        <label class="col-md-3 control-label" for="example-hf-email"></label>
                                            <div class="col-xs-9">
                                            	<a href="<?php echo site_url('application');?>" class="btn btn-sm btn-inverse">Cancel</a>
                                                <button class="btn btn-sm btn-primary" name="submit" type="submit">Save Application</button>
                                            </div>
                                        </div>	
                                    </form>
                        </div>
                    </div>
                    <!-- END My Block -->
                </div>
                <!-- END Page Content -->
            </main>
                        <!-- Delete Modal -->
         <div class="modal fade" id="modal-visaupload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Drag / Upload Visa Documents</h4>
                </div>
            
                <div class="modal-body">
                   <form action="<?php echo site_url('/application/upload/'.$application->id.'/'.$application->invoiceid); ?>" class="dropzone"  >
                   <p class="help">After Drag and Drop Visa Documents automatically updated in Server.</p>
                </div>
            </div>
        </div>
    </div>