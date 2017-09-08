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
                                <li>Countries</li>
                                <li><a class="link-effect" href="">List Countries</a></li>
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
                                        	<th style="width: 30px;">ID</th>
                                            <th class="text-center">Country</th>
                                            <th>Price</th>
                                        
                                            
                                            <th>Active</th>
                                            <th class="text-center" style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="js-table-sections-header">
                                    <?php foreach($countries as $row):?>
                                    
                                        <tr>
                                            <td class="text-center">
                                                <?=$row->id?>
                                            </td>
                                            <td class="text-center">
                                               <?=$row->country;?>
                                            </td>
                                            <td class="font-w600"><?php echo $row->price?></td>
                                            
                                            
                                            
                                            <td><?php echo $row->active;?></td>
                                            
                                            <td class="text-center">
                                                <div class="btn-group">
                                                <a class="btn btn-sm btn-info" href="<?php echo site_url('countries/edit/'.$row->id);?>" data-toggle="tooltip" title="View Application"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-sm btn-danger" data-href="<?php echo site_url('countries/delete/'.$row->id);?>" data-toggle="modal" data-target="#modal-delete" title="Delete Country"><i class="fa fa-trash"></i></a>
                                               
                                                </div>
                                            </td>
                                        </tr>
                                       
                                        <?php endforeach;?>
                                    </tbody>
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
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->