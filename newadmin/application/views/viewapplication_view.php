<!-- Main Container -->
<main id="main-container">
  <!-- Page Header -->
  
  <div class="content bg-gray-lighter">
    <div class="row items-push">
      <div class="col-sm-7">
        <h1 class="page-heading"> <?php echo $title;?> <small></small> </h1>
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
      <div class="block-content">
        <?php if($message){?>
        <div class="alert <?=$messagetype;?> alert-dismissable">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
          <?php echo $message;?> </div>
        <?php }?>
        <div class="block">
                                <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
                                    <li class="active">
                                        <a href="#btabs-animated-slideright-home">Main View</a>
                                    </li>
                                    <li>
                                        <a href="#btabs-animated-slideright-profile">Visa Downloads</a>
                                    </li>
                                    <li>
                                        <a href="#btabs-animated-slideright-settings">Messages</a>
                                    </li>
                                </ul>
                                <div class="block-content tab-content">
                                    <div class="tab-pane fade fade-right in active" id="btabs-animated-slideright-home">
                                        <form class="form-horizontal">
          <?php /*<div class="control-group">

									<label class="control-label" for="form-field-1">Country</label>



									<div class="controls form-static">

									<?php $result=$mysqli->query('select country from visa_country where id='.$ap['country'].'');

?>

										<?php $country=$result->fetch_array(MYSQLI_ASSOC);

										echo $country['country']?>

									</div>

								</div>*/?>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Nationality :</label>
            <div class="col-md-7">
              <div class="form-control-static"> <?php echo $application->nationality;?> </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Travel Document :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->travaldocument?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Arival Date in Turkey :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->arrivaldate?>
              </div>
            </div>
          </div>
          <?php

								$firstname=explode('?|',$application->firstname);

								$lastname=explode('?|',$application->lastname);

								$dob=explode('?|',$application->dob);

								$placeofbirth=explode('?|',$application->placeofbirth);

								$mothername=explode('?|',$application->mothername);

								$fathername=explode('?|',$application->fathername);

								$passportnumber=explode('?|',$application->passportnumber);

								$pid=explode('?|',$application->pid);

								$ped=explode('?|',$application->ped);

                                 for($i=0;$i<$application->applicants;$i++){?>
          <div class="box">
          <b>
          <h4 style="color:#0000CC">Applicant
            <?=$i+1?>
            Details</h4>
          </b>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">First Name :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$firstname[$i]?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Last Name/Surname :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$lastname[$i]?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Date of Birth :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$dob[$i]?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Place Of Birth :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$placeofbirth[$i]?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Mother Name :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$mothername[$i]?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Father Name :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$fathername[$i]?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Passport Number :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$passportnumber[$i]?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Passport Issue Date :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$pid[$i]?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Passport Expiry Date :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$ped[$i]?>
              </div>
            </div>
          </div>
          <?php }?>
          <?php if($application->TSD !=''){?>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Type of Supporting Doc :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->TSD;?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Country that issued Visa/Residence Permit :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->CountryVisaPermit;?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Visa/Residence Permit does not expire :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->VisaPermitExpire=="1" ? "Yes" : "No";?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Visa/Residence Permit Expiration Date :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->VisaPermitExpireDate;?>
              </div>
            </div>
          </div>
          <?php }?>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Email Address :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$settings->site_email;?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Phone Number :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->phone;?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Address :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->address;?>
              </div>
            </div>
          </div>
          <?php /*<div class="control-group">

									<label class="control-label" for="form-field-1">Street</label>



									<div class="controls form-static">

										<?=$ap['street']?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">City</label>



									<div class="controls form-static">

										<?=$ap['city']?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Zipcode</label>



									<div class="controls form-static">

										<?=$ap['zipcode']?>

									</div>

								</div> */?>
          <hr/>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">IP Address :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->ipaddress?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Accessed Country :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->country_access?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Accessed Organization :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->org?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Visa Cost :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?php /*$servicefee=$ap['processingtime'];
					if($servicefee =="1"){ $sp="79";$st="Normal (Guaranteed 2 working days)";}else if($servicefee =="2"){$sp="89";$st="Urgent (Guaranteed 4-8 hours)";} else{ $sp="99";$st="Immediately service case in Time off, Sat,Sun or Holidays ";}; ?>
        <b>
        <?=$ap['applicants']?>
        X ( $
        <?=$nationality['price']?>
        + $
        <?=$sp?>
        (processing fee))= $
        <?=$ap['applicants']*($nationality['price']+$sp)?>
        </b><br />
        <?=$st?><?php */?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">id :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->id?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Reference Number :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->invoiceid?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Created Date :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->createddate?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Notes :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?=$application->notes?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Status :</label>
            <div class="col-md-7">
              <div class="form-control-static">
                <?php switch($application->status){

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

											}?>
              </div>
            </div>
          </div>
        </form>
                                    </div>
                                    <div class="tab-pane fade fade-right" id="btabs-animated-slideright-profile">
                                        <h4 class="font-w300 push-15">Visa Downloads</h4>
                                         <?php if($visa_docs){?>
                                                <table class="table table-striped table-vcenter">
                                                <tr><th>Visa Name</th><th>Actions</th></tr>
                                                <?php foreach($visa_docs as $visa):?>
                                                <tr><td><?=$visa->image;?></td><td><a href="<?php echo site_url('application/downloadvisa/'.$visa->uniqueid);?>" class="btn btn-sm btn-success">Download</a> <a data-toggle="modal" data-target="#modal-delete" data-href="<?php echo site_url('application/delete_visa/'.$visa->uniqueid);?>" class="btn btn-sm btn-danger">Delete</a></td></tr><?php endforeach;?>
                                                </table>
                                                <?php } else{?>
                                                <div class="alert alert-danger">No Visadocs found</div>
                                                <?php }?>
                                       
                                    </div>
                                    <div class="tab-pane fade fade-right" id="btabs-animated-slideright-settings">
                                        <h4 class="font-w300 push-15">Messages</h4>
                                        
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
                                                <a class="btn btn-xs btn-success" href="<?php echo base_url();?>/index.php/messages/view/<?=$message->id;?>" data-toggle="tooltip" title="View Message"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-xs btn-default" href="<?php echo base_url();?>/index.php/messages/reply/<?=$message->id;?>" data-toggle="tooltip" title="Reply Message"><i class="fa fa-mail-reply"></i></a>
                                                 <a class="btn btn-xs btn-default btn-danger" data-href="<?php echo base_url();?>/index.php/messages/delete/<?=$message->id;?>" data-toggle="modal" data-target="#modal-delete" title="Delete Message"><i class="fa fa-trash"></i></a>
                                                </div></td></tr>
												<?php endforeach;?>
                                                </table>
                                                <?php } else{?>
                                                <div class="alert alert-danger">No Messages found</div>
                                                <?php }?>
                                        
                                    </div>
                                </div>
                            </div>
        
      </div>
    </div>
    <!-- END Full Table -->
  </div>
  </div>
  <!-- END Page Content -->
</main>
<!-- END Main Container -->
