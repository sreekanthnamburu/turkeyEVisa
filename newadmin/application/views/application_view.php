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
                                <li>Applications</li>
                                <li><a class="link-effect" href="">List Applications</a></li>
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
                                <table class="js-table-sections table table-hover">
                                    <thead>
                                        <tr>
                                        	<th style="width: 30px;"></th>
                                            <th class="text-center">Reference Number</th>
                                            <th>Name</th>
                                        
                                            
                                            <th>Email</th>
                                            <th>Applications</th>
                                            
                                            <th>Payment Status</th>
                                            <th class="text-center" style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <?php foreach($applications as $row):?>
                                    <?php $visa_docs_count=$this->application_model->get_visadocs_count($row->id);?>
                                    <?php if($row->processingtime =='2'){ $class="info";} else if($row->processingtime =='3'){
									$class="danger";}else $class="";?>
                                    <tbody class="js-table-sections-header">
                                        <tr class="<?=$class;?>">
                                            <td class="text-center">
                                                <i class="fa fa-angle-right"></i>
                                            </td>
                                            <td class="text-center">
                                               <?=$row->invoiceid;?>
                                            </td>
                                            <td class="font-w600"><?php echo explode('?|',$row->firstname)[0]?></td>
                                            
                                            
                                            
                                            <td><?php echo $row->email;?></td>
                                            <td><?php echo $row->applicants;?></td>
                                            
                                            <td><?php echo $row->paymentid;?>
                                            <?php switch($row->status){
											case "P":
											echo '<span class="label label-danger">Pending</span>';
											break;
											case "Pr":
											echo '<span class="label label-warning">Processing</span>';
											break;
									
											case "C":
											echo '<span class="label label-success">Completed</span>';
											break;
									
											case "A":
											echo '<span class="label label-info">Approved</span>';
											break;
											}?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                <a class="btn btn-xs btn-success" href="<?php echo site_url('application/view/'.$row->id);?>" data-toggle="tooltip" title="View Application"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-xs btn-default" href="<?php echo site_url('application/edit/'.$row->id);?>" data-toggle="tooltip" title="Edit Application"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-xs btn-danger" data-href="<?php echo site_url('application/delete/'.$row->id);?>" data-toggle="modal" data-target="#modal-delete" title="Remove Application"><i class="fa fa-trash"></i></a>
				<?php if($row->locked !="1" ){?><a class="btn btn-xs btn-default" href="<?php echo site_url('application/lock/'.$row->id);?>"  data-toggle="tooltip" title="Lock Application"><i class="fa fa-unlock"></i></a>
                <?php } else {?>
                <a class="btn btn-xs btn-default" href="<?php echo site_url('application/unlock/'.$row->id);?>"  data-toggle="tooltip" title="Locked By <?php echo $row->username; ?>. UnLock it"><i class="fa fa-lock"></i></a>
                <?php }?>
                <a class="btn btn-xs btn-default" href="<?php echo site_url('application/message/'.$row->id);?>"  data-toggle="tooltip" title="Send Mail to User"><i class="fa fa-envelope"></i></a>
                <?php if($visa_docs_count >0){?>
                <?php if($row->visasent =='1'){?>
                <a class="btn btn-xs btn-success" href="<?php echo site_url('application/sendvisa/'.$row->id);?>"  data-toggle="tooltip" title="Visa Already Sent at <?=$row->visasentdate?>. Resend Visa"><i class="fa fa-send"></i></a>
                <?php } else{?>
                <a class="btn btn-xs btn-info" href="<?php echo site_url('application/sendvisa/'.$row->id);?>"  data-toggle="tooltip" title="Send Visa"><i class="fa fa-send"></i></a>
                <?php }?>
                <?php }?>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tbody class="warning">
                                        <tr><td class="text-center"></td><td><b>Arrival Date</b></td><td><?php echo $row->arrivaldate;?></td><td><b>Created Date</b></td><td><?php echo $row->createddate;?></td><td></td><td></td></tr>
                                        <tr><td class="text-center"></td><td><b>Locked By</b></td><td><?php if($row->locked =="1" ){?>
                          <span class="label label-success"><i class="icon-lock bigger-130"></i> <?php echo $row->username; ?></span>
                          <?php } else {?><span class="label label-warning"><i class="icon-lock bigger-130"></i>None</span><?php }?></td><td><b>Accessed Country</b></td><td><?php echo $row->org?>,<?php echo $row->country_access;?></td><td></td><td></td></tr>
                                        </tbody>
                                        <?php endforeach;?>
                                    
                                </table>
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
                    <div class="well">Table Buttons Info:
<a class="btn btn-xs btn-success" data-toggle="tooltip" title="View Application"><i class="fa fa-eye"></i> View</a>
<a class="btn btn-xs btn-default" data-toggle="tooltip" title="Edit Application"><i class="fa fa-pencil"></i> Edit</a>
<a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Application" data-toggle="modal" data-target="#modal-delete" title="Remove Application"><i class="fa fa-trash"></i> Delete</a>
<a class="btn btn-xs btn-default" data-toggle="tooltip" title="Lock Application"><i class="fa fa-unlock"></i> Lock Application</a>
<a class="btn btn-xs btn-default" data-toggle="tooltip" title="Locked By some user. UnLock it"><i class="fa fa-lock"></i> Unlock Application</a>
<a class="btn btn-xs btn-default" data-toggle="tooltip" title="Send Mail to User"><i class="fa fa-envelope"></i> Mail to user</a>
<a class="btn btn-xs btn-info"data-toggle="tooltip" title="Send Visa"><i class="fa fa-send"></i> Send Visa</a>
<a class="btn btn-xs btn-success" data-toggle="tooltip" title="Visa Already Sent at date. Resend Visa"><i class="fa fa-send"></i> Re Send Visa</a>
</div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->