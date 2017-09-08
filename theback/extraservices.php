<?php include('header.php');

//@ini_set('display_errors',true);

?>

<style>

.control-label{

font-weight:bold;}

</style>

<div class="sidebar-collapse" id="sidebar-collapse">

					<i class="icon-double-angle-left"></i>

				</div>

			</div>



			<div class="main-content">

				<div class="breadcrumbs" id="breadcrumbs">

					<ul class="breadcrumb">

						<li>

							<i class="icon-home home-icon"></i>

							<a href="#">Home</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>

						<li class="active">extraservices</li>

					</ul><!--.breadcrumb-->



					<div class="nav-search" id="nav-search">

						<form class="form-search" />

							<span class="input-icon">

							</span>

						</form>

					</div><!--#nav-search-->

				</div>



		



					<div class="row-fluid">

						<div class="span12">

							<!--PAGE CONTENT BEGINS-->

							<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] != ' '){

							switch($_REQUEST['action']){

							 case 'view' :?>

							 <?php 

							 $id=$_REQUEST['id'];

							 $result=$mysqli->query("select * from extraservices where id={$id}");

$ap=$result->fetch_array(MYSQLI_ASSOC);

?>

<div class="page-content">

					

					<a href="extraservices.php" class="btn btn-grey" > Go Back</a>

								<a href="extraservices.php?action=edit&id=<?=$ap['id']?>" class="btn btn-success" > Edit and Upload Visa Document</a>

								<?php if($ap['visapdf']==''){?>

												

												<?php } else{?>

													<?php if($ap['visasent'] =='1'){?>

												<a class="btn  btn-info" href="extraservices.php?action=sendvisa&id=<?=$ap['id']?>">

														Visa Already Sent . ReSend Visa

													</a>

													<a target="_blank" class="btn btn-info" href="<?=$baseurl;?>/uploads/<?=$ap['visapdf']?>">

														<i class="icon-download"> Download Visa </i>

													</a><?php } else {?>

													<a class="btn btn-success" href="extraservices.php?action=sendvisa&id=<?=$ap['id']?>">

														Send Visa

													</a>

													<a target="_blank" class="btn btn-info" href="<?=$baseurl;?>/uploads/<?=$ap['visapdf']?>">

														<i class="icon-download"> Download Visa </i>

													</a>

													<?php } }?>

													<hr/>

														<form class="form-horizontal" />

									<?php /*<div class="control-group">

									<label class="control-label" for="form-field-1">Country</label>



									<div class="controls form-static">

									<?php $result=$mysqli->query('select country from visa_country where id='.$ap['country'].'');

?>

										<?php $country=$result->fetch_array(MYSQLI_ASSOC);

										echo $country['country']?>

									</div>

								</div>*/?>
								                                <div class="control-group">

									<label class="control-label" for="form-field-1">Nationality</label>



									<div class="controls form-static">

									<?php //echo $ap['nationality'];?>

										<?php $result2=$mysqli->query('select country,price from visa_country where id='.$ap['nationality'].'');

?>

										<?php $nationality=$result2->fetch_array(MYSQLI_ASSOC);

										echo $nationality['country']?>

									</div>

								</div>
								

								<div class="control-group">

									<label class="control-label" for="form-field-1">Port Of Turkey</label>



									<div class="controls form-static">
                                    <?php $part=$ap['travaldocument']?>
										<?php if($port =="1"){echo "Ataturk Airport (IST)";}else if($port =="2"){ echo "Sabiha Gokcen Airport (SAW)";}else echo "Adnan Menderes Airport (ADB)";?>
										

									</div>

								</div>

<div class="control-group">

									<label class="control-label" for="form-field-1">Air Port Fast-Track Service</label>



									<div class="controls form-static">
                                    <?php $fasttrack=$ap['fasttrack']?>
										<?=($fasttrack=="1")?"Yes":"No";?>
										

									</div>

								</div>
                                <div class="control-group">

									<label class="control-label" for="form-field-1">VIP Service</label>



									<div class="controls form-static">
                                    <?php $vipservice=$ap['vipservice']?>
										<?=($vipservice=="1")?"Yes":"No";?>
										

									</div>

								</div>
                                <div class="control-group">

									<label class="control-label" for="form-field-1">Car Pick-up Service</label>



									<div class="controls form-static">
                                    <?php $carpickup=$ap['fasttrack']?>
									<?=($carpickup=="1")?"Yes":"No";?>
										

									</div>

								</div>
                                 <div class="control-group">

									<label class="control-label" for="form-field-1">Car Seats</label>



									<div class="controls form-static">
                                   <?php if($ap['carseats']=="1"){ echo "4";}else if($ap['carseats']=="2"){echo "8";} else if($ap['carseats']=="3"){ echo "16";}?> Seats
										

									</div>

								</div>
                                 <div class="control-group">

									<label class="control-label" for="form-field-1">Flight Number</label>



									<div class="controls form-static">
                                    <?=$ap['flightnumber']?>
										

									</div>

								</div>
                                 <div class="control-group">

									<label class="control-label" for="form-field-1">Arrival Time</label>



									<div class="controls form-static">
                                    <?=$ap['farrivaltime']?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Arival Date in Turkey</label>



									<div class="controls form-static">

										<?=$ap['arrivaldate']?>

									</div>

								</div>

                                <?php

								$firstname=explode('?|',$ap['firstname']);

								$lastname=explode('?|',$ap['lastname']);

								$dob=explode('?|',$ap['dob']);

								$placeofbirth=explode('?|',$ap['placeofbirth']);

								$mothername=explode('?|',$ap['mothername']);

								$fathername=explode('?|',$ap['fathername']);

								$passportnumber=explode('?|',$ap['passportnumber']);

								$pid=explode('?|',$ap['pid']);

								$ped=explode('?|',$ap['ped']);

                                 for($i=0;$i<$ap['applicants'];$i++){?>
								<div class="box">
                                <b><h4 style="color:#0000CC">Applicant <?=$i+1?> Details</h4></b>

								<div class="control-group">

									<label class="control-label" for="form-field-1">First Name</label>



									<div class="controls form-static">

										<?=$firstname[$i]?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Last Name/Surname</label>



									<div class="controls form-static">

										<?=$lastname[$i]?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Date of Birth</label>



									<div class="controls form-static">

										<?=$dob[$i]?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Place Of Birth</label>



									<div class="controls form-static">

										<?=$placeofbirth[$i]?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Mother Name</label>



									<div class="controls form-static">

										<?=$mothername[$i]?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Father Name</label>



									<div class="controls form-static">

										<?=$fathername[$i]?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Passport Number</label>



									<div class="controls form-static">

										<?=$passportnumber[$i]?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Passport Issue Date</label>



									<div class="controls form-static">

										<?=$pid[$i]?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Passport Expiry Date</label>



									<div class="controls form-static">

										<?=$ped[$i]?>

									</div>

								</div>

                                </div>

                                <?php }?>

								<?php if($ap['TSD'] !=''){?><div class="control-group">

									<label class="control-label" for="form-field-1">Type of Supporting Doc:</label>



									<div class="controls form-static">

										<?=$ap['TSD']?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Country that issued Visa/Residence Permit:</label>



									<div class="controls form-static">

										<?=$ap['CountryVisaPermit']?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Visa/Residence Permit does not expire:</label>



									<div class="controls form-static">

										<?=$ap['VisaPermitExpire']=="1" ? "Yes" : "No"?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Visa/Residence Permit Expiration Date:</label>



									<div class="controls form-static">

										<?=$ap['VisaPermitExpireDate']?>

									</div>

								</div>

								<?php }?>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Email Address</label>



									<div class="controls form-static">

										<?php //$ap['email']?>visapro24@gmail.com

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Phone Number</label>



									<div class="controls form-static">

										<?=$ap['phone']?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Address</label>



									<div class="controls form-static">

										<?=$ap['address']?>

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

																<div class="control-group">

									<label class="control-label" for="form-field-1">IP Address</label>



									<div class="controls form-static">

										<b><?=$ap['ipaddress']?></b>

									</div>

								</div>
                                
                                <div class="control-group">

									<label class="control-label" for="form-field-1">Accessed Country </label>



									<div class="controls form-static">

										<b><?=$ap['country_access']?></b>

									</div>

								</div>
                                <div class="control-group">

									<label class="control-label" for="form-field-1">Accessed Organization</label>



									<div class="controls form-static">

										<b><?=$ap['org']?></b>

									</div>

								</div>
								<div class="control-group">

									<label class="control-label" for="form-field-1">Visa Cost</label>



									<div class="controls form-static">
					<?php $servicefee=$ap['processingtime'];
					if($servicefee =="1"){ $sp="45";$st="Normal (Guaranteed 2 working days)";}else if($servicefee =="2"){$sp="65";$st="Urgent (Guaranteed 4-8 hours)";} else{ $sp="100";$st="Immediately service case in Time off, Sat,Sun or Holidays ";}; ?>
										<b> <?=$ap['applicants']?>  X ( $<?=$nationality['price']?>  + $<?=$sp?> (processing fee))= $ <?=$ap['applicants']*($nationality['price']+$sp)?></b><br />
                                        <?=$st?>

									</div>

								</div>


									<div class="control-group">

									<label class="control-label" for="form-field-1">id</label>



									<div class="controls form-static">

										<?=$ap['id']?>

									</div>

								</div>

									<div class="control-group">

									<label class="control-label" for="form-field-1">Reference Number</label>



									<div class="controls form-static">

										<?=$ap['invoiceid']?>

									</div>

								</div>

								

								<div class="control-group">

									<label class="control-label" for="form-field-1">Created Date</label>



									<div class="controls form-static">

										<?=$ap['createddate']?>

									</div>

								</div>
                                <div class="control-group">

									<label class="control-label" for="form-field-1">Notes</label>



									<div class="controls form-static">

										<?=$ap['notes']?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Status</label>



									<div class="controls form-static">

										<?php switch($ap['status']){

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
                                    <div class="control-group">

									<label class="control-label" for="form-field-1">Payment Link</label>



									<div class="controls form-static">

										<a target="_blank" href="<?=$baseurl;?>/index.php/application/payments/<?=$ap['invoiceid']?>"><?=$baseurl;?>/index.php/application/payments/<?=$ap['invoiceid']?></a>

									</div>

								</div>


								<a href="extraservices.php" class="btn btn-grey" > Go Back</a>

								<a href="extraservices.php?action=edit&id=<?=$ap['id']?>" class="btn btn-success" > Edit and Upload Visa Document</a>

								<?php if($ap['visapdf']==''){?>

												

												<?php } else{?>

													<?php if($ap['visasent'] =='1'){?>

												<a class="btn  btn-info" href="extraservices.php?action=sendvisa&id=<?=$ap['id']?>">

														Visa Already Sent . ReSend Visa

													</a>

													<a target="_blank" class="btn btn-info" href="<?=$baseurl;?>/uploads/<?=$ap['visapdf']?>">

														<i class="icon-download "> Download Visa </i>

													</a><?php } else {?>

													<a class="btn btn-success" href="extraservices.php?action=sendvisa&id=<?=$ap['id']?>">

														Send Visa

													</a>

													<a target="_blank" class="btn btn-info" href="<?=$baseurl;?>/uploads/<?=$ap['visapdf']?>">

														<i class="icon-download"> Download Visa </i>

													</a>

													<?php } }?>

								</form>

							<?php break;

							 case 'edit': ?>

							 <?php if(isset($_POST['update'])){

										$status= $_POST['status'];

										$id=$_POST['id'];

										//$price=$_POST['price'];

										$visapdf=$_FILES['visapdf'];
										$notes=$_POST['notes'];

if($visapdf['error'] == UPLOAD_ERR_OK){

if(move_uploaded_file($visapdf['tmp_name'],"/home/txdcpaqv/public_html/uploads/".$visapdf['name'])){

$name=$visapdf['name'];

$mysqli->query("Update extraservices Set status = '$status',visapdf='$name',notes='$notes'

Where id = $id

");

echo "<span class='alert alert-success'>extraservices Edited Successfully</span>";

 /*echo '<script type="text/javascript">';

        echo 'window.location.href="extraservices.php?edit=true";';

        echo '</script>';

        echo '<noscript>';

        echo '<meta http-equiv="refresh" content="2;url=extraservices.php?edit=true" />';

        echo '</noscript>';*/



} else {



echo "upload failed";}



} else{



$mysqli->query("Update extraservices Set status = '$status',notes='$notes'

Where id = $id

");

echo "<span class='alert alert-success'>extraservices Edited Successfully</span>";

 /*echo '<script type="text/javascript">';

        echo 'window.location.href="extraservices.php?edit=true";';

        echo '</script>';

        echo '<noscript>';

        echo '<meta http-equiv="refresh" content="2;url=extraservices.php?edit=true" />';

        echo '</noscript>';*/

}



}?>

							 							 <?php 

							 $id=$_REQUEST['id'];

							 $result=$mysqli->query("select * from extraservices where id={$id}");

$ap=$result->fetch_array(MYSQLI_ASSOC);

?>

							 <div class="page-content">

					<div class="page-header position-relative">

						<h1>

							extraservices Edit

							<small>

								<i class="icon-double-angle-right"></i>

								<?=explode('?|',$ap['firstname'])[0]?> Visa Application

							</small>

						</h1>

					</div><!--/.page-header-->

					<form class="form-horizontal" method="post" action="extraservices.php?action=edit" enctype="multipart/form-data" />

								<div class="control-group">

									<label class="control-label" for="form-field-1">First Name</label>



									<div class="controls form-static">

										<?php // $fname=explode('?|',$ap['firstname']);
                                        //for($i=0;$i<$ap['applicants'];$i++){?>
                                        <?php //$fname[$i]."<br/>";?>
                                        <?php $firstname=explode('?|',$ap['firstname']);?>
                                        <?php for($i=0;$i<$ap['applicants'];$i++){
                                       echo $firstname[$i]."<br/>";;
									   }?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Invoice Number</label>



									<div class="controls form-static">
                                    

										<?=$ap['invoiceid']?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Passport Numbers</label>



									<div class="controls form-static">

										<?php $passport=explode('?|',$ap['passportnumber']);
										for($i=0;$i<$ap['applicants'];$i++){?>
                                        <?=$passport[$i]."<br/>"; }?>

									</div>

								</div>

								<?php /*?><div class="control-group">

									<label class="control-label" for="form-field-1">Upload Visa</label>



									<div class="controls form-static">

										<input type="file" name="visapdf" id="price" / >

										<p class="help">Please Upload only pdf/Zip files. if re upload replace with existing files. if you have more than one file Zip and Upload. new file will be place to Download.</p>

										<?php if($ap['visapdf']==''){?>

												

												<?php } else{?>

													<p class="alert alert-danger">Visa Already uploaded . please check using download visa link. if you want to replace upload new visa document</p>

													<?php  }?>

									</div>

								</div>

							<?php */?>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Status</label>



									<div class="controls form-static">

										<select name="status" id="status">

										<option value="P" <?php if($ap['status']=='P') {?> selected="selected"<?php }?>> Pending</option>

										<option value="Pr" <?php if($ap['status']=='Pr') {?> selected="selected"<?php }?>>Processing</option>
                                       <?php if($ap['visasent'] =='1'){?> <option value="C" <?php if($ap['status']=='C') {?> selected="selected"<?php }?>>Completed</option><?php }?>
                                        <option value="R" <?php if($ap['status']=='R') {?> selected="selected"<?php }?>>Rejected</option>

									

										</select>

									</div>

								</div>
                                	<div class="control-group">

									<label class="control-label" for="form-field-1">Notes</label>



									<div class="controls form-static">

										<textarea name="notes" class="span12" rows="10" id="neweditor"><?=$ap['notes']?></textarea>
										</select>

									</div>

								</div>
                                <div class="control-group">

									<div class="controls form-static">

								<input type="hidden" name="id" value="<?=$id?>">

								<input type="submit" name="update" class="btn btn-success" value="update">


									</div>

								</div>

								
								</form>

								<a href="extraservices.php?action=view&id=<?=$ap['id']?>" class="btn btn-gray">Back To view Application</a>

							<?php if($ap['visapdf']==''){?>

												

												<?php } else{?>

													<?php if($ap['visasent'] =='1'){?>

												<a class="btn  btn-info" href="extraservices.php?action=sendvisa&id=<?=$ap['id']?>">

														Visa Already Sent . ReSend Visa

													</a>

													<a target="_blank" class="btn btn-info" href="<?=$baseurl;?>/uploads/<?=$ap['visapdf']?>">

														<i class="icon-download"> Download Visa </i>

													</a><?php } else {?>

													<a class="btn btn-success" href="extraservices.php?action=sendvisa&id=<?=$ap['id']?>">

														Send Visa

													</a>

													<a target="_blank" class="btn btn-info" href="<?=$baseurl;?>/uploads/<?=$ap['visapdf']?>">

														<i class="icon-download"> Download Visa </i>

													</a>

													<?php } }?>

							<?php break;

							 case 'sendvisa': ?>

							 <?php 

							 $id=$_REQUEST['id'];

							 $result=$mysqli->query("select * from extraservices where id={$id}");

$ap=$result->fetch_array(MYSQLI_ASSOC);

?>

							 <?php

							 $visadoc=$ap['visapdf'];

							 $invoiceid=$ap['invoiceid'];

							 $namearray=explode('?|',$ap['firstname']);

							 $name=$namearray[0];

							

							 $msg = "Hi User,<a href='$visapdf'>Download Visa</a>";



// use wordwrap() if lines are longer than 70 characters

//$msg = wordwrap($msg,70);



// send email

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



// More headers

$headers .= 'From: Turkey Visa Pro <info@turkeyevisa.online>' . "\r\n";

$email_body='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">

            <head>

            <meta name="viewport" content="width=device-width" />

                                          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

                                                                                  <title>Download E-visa</title>

                                                                                  </head>

                                                                                  <body bgcolor="#f6f6f6" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;">&#13;

&#13;

&#13;

<table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 20px;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;

<td bgcolor="#FFFFFF" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;">&#13;

&#13;

&#13;

<div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">&#13;

<table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">&#13;

                             <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Dear '.$name.'</b>,</p>&#13;
						<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Application ID: '.$invoiceid.'</b>,</p>
						<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Service Selected : E-Visa</b>,</p>
						<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Status : Completed</b>,</p>



<h3 style="font-family: \'Helvetica Neue\', Helvetica, Arial, \'Lucida Grande\', sans-serif; font-size: 20px; line-height: 1.2; color: #000; font-weight: 200; margin: 40px 0 10px; padding: 0;">Your e-Visa is ready.</h3>&#13;

<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Your payment has been approved and your application has been succesfully completed. You can download your e-Visa by clicking the link below.</p>

         <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">

                      <tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 10px 0;">&#13;

<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><a href="'.$baseurl.'/index.php/application/download-evisa/'.$invoiceid.'" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 2; color: #FFF; text-decoration: none; background-color: #be1c03;background-image:-moz-linear-gradient(center top , #be1c03, #670600);box-shadow: 0 0 0 1px #be1c03, 0 0 0 2px #670600;   border: 0 none;color: #f4f4f2;cursor: pointer;margin: 5px 10px 10px 0;font-weight:bold;padding:15px;border-radius:8px">Download&nbsp;e-Visa</a></p>&#13;

</td>&#13;

</tr></table>

 <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Kind Regards</b></p><p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Director</b><br/><b>Visa Solution - Ticketing - Accommodation - Touring - Transportation</b>,<br/>Turkey Visa Pro<br/>3-5 Excelsior House Balfour Road, Ilford, Essex IG1 4HP<br/>Tel : Toll Free - 0800 133 7567</p>

</tr></table></div>&#13;

&#13;

&#13;

</td>&#13;

<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;

</tr></table><table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;

<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;">&#13;

&#13;

&#13;

<div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">&#13;

<table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td align="center" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">&#13;

<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #666; font-weight: normal; margin: 0 0 10px; padding: 0;">

         2015 Turkey Visa Pro .&#13;

</p>&#13;

</td>&#13;

</tr></table></div>&#13;

&#13;

&#13;

</td>&#13;

<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;

</tr></table></body>

</html>';

if(mail($ap['email'],"Download Your Visa",$email_body,$headers))

{

if($mysqli->query("Update extraservices Set status = 'C',visasent='1' Where id = $id")){

//echo "<span class='alert alert-success'>Visa Sent Successfully</span>";

 echo '<script type="text/javascript">';

        echo 'window.location.href="extraservices.php?sendvisa=true";';

        echo '</script>';

        echo '<noscript>';

        echo '<meta http-equiv="refresh" content="2;url=extraservices.php" />';

        echo '</noscript>';



}

else {

 echo '<script type="text/javascript">';

        echo 'window.location.href="extraservices.php?sendvisa=false";';

        echo '</script>';

        echo '<noscript>';

        echo '<meta http-equiv="refresh" content="2;url=extraservices.php?sendvisa=false" />';

        echo '</noscript>';

}

} else {

 echo '<script type="text/javascript">';

        echo 'window.location.href="extraservices.php?sendvisa=false";';

        echo '</script>';

        echo '<noscript>';

        echo '<meta http-equiv="refresh" content="2;url=extraservices.php?sendvisa=false" />';

        echo '</noscript>';

} ?>

							 							 							 

							 <div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Visa Sending

							<small>

								<i class="icon-double-angle-right"></i>

								<?=explode('?|',$ap['firstname'])[0]?> Visa Send

							</small>

						</h1>

					</div><!--/.page-header-->

					<form class="form-horizontal" method="post" action="extraservices.php?action=sendvisa" enctype="multipart/form-data" />

								<div class="control-group">

									<label class="control-label" for="form-field-1">First Name</label>



									<div class="controls form-static">

										<?php // $fname=explode('?|',$ap['firstname']);
                                        //for($i=0;$i<$ap['applicants'];$i++){?>
                                        <?php //$fname[$i]."<br/>";?>
                                        <?php $firstname=explode('?|',$ap['firstname']);?>
                                        <?php for($i=0;$i<$ap['applicants'];$i++){
                                       echo $firstname[$i]."<br/>";;
									   }?>

									</div>

								</div>

																<div class="control-group">

									<label class="control-label" for="form-field-1">Invoice ID</label>



									<div class="controls form-static">

										<?=$ap['invoiceid']?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Passport</label>



									<div class="controls form-static">

										<?php $passport=explode('?|',$ap['passportnumber']);
										for($i=0;$i<$ap['applicants'];$i++){?>
                                        <?=$passport[$i]."<br/>"; }?>

									</div>

								</div>

								<?php if($ap['visapdf']==''){?>

								<p class='alert alert-danger'>Visa Not uploaded. please upload by follow link and try send visa <a class=\"green\" href=\"extraservices.php?action=edit&id=".$ap['id']."\">

														Upload Visa

													</a><p>

								<?php }?>

								<input type="hidden" name="visapdf" value="<?=$_SERVER['HTTP_HOST'] ?>/turkey/frontend/uploads/<?=$ap['visapdf']?>">

								<input type="hidden" name="id" value="<?=$id?>">

								<input type="hidden" name="email" value="<?=$ap['email']?>">

								<?php if($ap['visasent'] =='1'){?>

								<p class='alert alert-success'>Visa Already Sent. Do you want to send again<p> <?php }?>

								<?php if($ap['visapdf']==''){echo"<span class='alert alert-danger'>No visa Found to Send. please upload visa and send visa <a class=\"green\" href=\"extraservices.php?action=edit&id=".$ap['id']."\">

														Upload Visa

													</a><span>";} else {?><input type="submit" name="submit" value="Send Visa" class="btn btn-primary">

								<?php }?></form>

							<?php break;?>

							<?php case "delete":?>

							<?php $id=$_REQUEST['id'];

							if(isset($_POST['delete'])){

							 $query="delete from extraservices where id=".$id;

							 if($mysqli->query($query)){

							 echo "Application was deleted";

								echo '<script type="text/javascript">';

								echo 'window.location.href="extraservices.php?delete=true";';

								echo '</script>';

								echo '<noscript>';

								echo '<meta http-equiv="refresh" content="0;url=extraservices.php?delete=true" />';

								echo '</noscript>';

							 }

							 }?>

							 							 							 <?php 

							 $id=$_REQUEST['id'];

							 $result=$mysqli->query("select * from extraservices where id={$id}");

$ap=$result->fetch_array(MYSQLI_ASSOC);

?>

							 <div class="page-content">

					<div class="page-header position-relative">

						<h1>

							extraservices Delete

							<small>

								<i class="icon-double-angle-right"></i>

								<?=explode('?|',$ap['firstname'])[0]?> Visa Application

							</small>

						</h1>

					</div><!--/.page-header-->

					<form class="form-horizontal" method="post" action="extraservices.php?action=delete" enctype="multipart/form-data" />

								<div class="control-group">

									<label class="control-label" for="form-field-1">First Name</label>

									<div class="controls form-static">

										
                                        <?php $fname=explode('?|',$ap['firstname']);
										for($i=0;$i<$ap['applicants'];$i++){?>
                                        <?=$fname[$i]."<br/>"; }?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Invoice Number</label>



									<div class="controls form-static">

										<?=$ap['invoiceid']?>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Passport Number</label>



									<div class="controls form-static">

										<?php $passport=explode('?|',$ap['passportnumber']);
										for($i=0;$i<$ap['applicants'];$i++){?>
                                        <?=$passport[$i]."<br/>"; }?>

									</div>

								</div>

								<input type="hidden" name="id" value="<?=$id?>">

								<p class="alert alert-danger">Are you sure want to Delete</p>

								<input type="submit" name="delete" value="Delete" class="btn btn-danger">

								</form>

							<?php break;?>
                                                        <?php case "process": ?>
                                                         <?php
	/*
		Place code to connect to your DB here.
	*/

	$tbl_name="extraservices";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where status=\"Pr\" ";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "extraservices.php?action=process"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "select id,processingtime,invoiceid,firstname,visasent,visapdf,createddate,arrivaldate,email,applicants,status from $tbl_name where status=\"Pr\" ORDER BY createddate DESC LIMIT $start, $limit";
	$result = $mysqli->query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"row-fluid\"><div class=\"span6\"><div class=\"dataTables_info\" id=\"sample-table-2_info\">Showing $start to ".($limit*$page)." of ".$total_pages." entries</div></div><div class=\"span6\"><div class=\"dataTables_paginate paging_bootstrap pagination\"><ul>";
		//previous button
		if ($page > 1) 
			$pagination.= "<li class=\"prev\"><a href=\"$targetpage&page=$prev\"><i class=\"icon-double-angle-left\"></i></a></li>";
		else
			$pagination.= "<li class=\"prev disabled\"><a href=\"#\"><i class=\"icon-double-angle-left\"></i></a></li>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
				else
					$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href=\"#\">...</li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lastpage\">$lastpage</a></li>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href=\"$targetpage&page=1\">1</a></i>";
				$pagination.= "<li><a href=\"$targetpage&page=2\">2</a></li>";
				$pagination.= "<li><a href=\"#\">...</li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href=\"#\">...</li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lastpage\">$lastpage</a></li>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li><a href=\"$targetpage&page=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=2\">2</a></li>";
				$pagination.= "<li><a href=\"#\">...</li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a href=\"$targetpage&page=$next\"><i class=\"icon-double-angle-right\"></i></a></li>";
		else
			$pagination.= "<li class=\"next disabled\"><a href=\"#\"><i class=\"icon-double-angle-right\"></i></a></li>";
		$pagination.= "</ul></div></div></div>";		
	}
?>
                            <?php //$result=$mysqli->query('select id,processingtime,invoiceid,firstname,createddate,arrivaldate,email,applicants,status from extraservices where status="Pr" ORDER BY createddate DESC');
								 

							

//print_r($extraservices);

//exit;

?>
<div class="page-content">

					

							<div class="row-fluid">

								<h3 class="header smaller lighter blue">List of Processing extraservices <b class="badge badge-success"><?=$total_pages;?></b></span></h3>

			<?php if($_REQUEST['sendvisa']=='true'){?>

			<div class="alert alert-block alert-success">

								<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



								<i class="icon-ok green"></i>



								Visa Sent Successfully

							</div><?php }?>

			<?php if($_REQUEST['edit']=='true'){?>

			<div class="alert alert-block alert-success">

								<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



								<i class="icon-ok green"></i>



								Application Edited Successfully

							</div><?php }?>

			<?php if($_REQUEST['delete']=='true'){?>

			<div class="alert alert-block alert-success">

								<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



								<i class="icon-ok green"></i>



								Application Deleted Successfully

							</div><?php }?>
                            																<div class="row-fluid">
										<div class="widget-box">
											<div class="widget-header widget-header-small">
												<h5 class="lighter">Search Form</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<form class="form-search" action="extraservices.php?action=search" method="post" />
                                                    <select name="limit" class="span2"><option value="10">10</option><option value="50">50</option><option value="100">100</option></select>
                                                        <input type="text" class="input-medium search-query" name="name" placeholder="Name"/>
                                                        <input type="text" class="input-medium search-query" name="invoice" placeholder="Invoice Number"/>
                                                        <select name="status" class="span2"><option value="all">Any</option><option value="P">Pending</option><option value="Pr">Processing</option><option value="C">Completed</option><option value="R">Rejected</option></select>
														<button type="submit" class="btn btn-purple btn-small">
															Search
															<i class="icon-search icon-on-right bigger-110"></i>
														</button>
													</form>
												</div>
											</div>
										</div></div>
								<table id="sample-table-2" class="table table-striped table-bordered table-hover">

									<thead>

										<tr>

											<!--<th class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</th>-->

											<!--<th>Id</th>-->

											<th>Reference Number</th>

											<th  class="hidden-480">Name</th>

											<th>Created Date</th>

											<th class="hidden-480">Arrival Date</th>



											<th class="hidden-phone">

												<i class="icon-time bigger-110 hidden-phone"></i>

												Email

											</th>
                                            <th>Applicants</th>

											<th>Status</th>



											<th>Actions</th>

										</tr>

									</thead>



									<tbody>

									<?php //while ($extraservices) {

									while($extraservices=$result->fetch_assoc()){?>
                                            <?php
								$processing_fee=$extraservices['processingtime'];
								 if($processing_fee =="1"){
	$procText="normal";
	} 
	else if($processing_fee =="2"){
		$procText="info";
		}
		else{
			$procText="error";}?>

										<tr class="<?=$procText?>">

										<!--

											<td class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</td>-->

											<?php /*<td><?=$extraservices['id']?></td>*/?>

											<td><?=$extraservices['invoiceid']?></td>



											<td class="hidden-480">

												<?php echo explode('?|',$extraservices['firstname'])[0]?>

											</td>

											<td><?=$extraservices['createddate']?></td>

											<td class="hidden-480"><?=$extraservices['arrivaldate']?></td>

											<td class="hidden-phone"><?=$extraservices['email']?></td>
                                            <td><span class="label label-success" style="border-radius:50px"><?=$extraservices['applicants']?></span></td>



											<td>

											

											<?php switch($extraservices['status']){

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

											<?php 

											$invoice_id=$extraservices['invoiceid'];

											//echo $invoice_id;

											$query="select invoice from visa_payments where invoice='$invoice_id' and payment_status='Completed'";

											//echo $query;

											$payment=$mysqli->query($query);

											//$extraservices1=$payment->fetch_assoc();

											$paymentrows=$payment->num_rows;

											//print_r($payment);

											?><?php if($paymentrows > 0){?>

											<span class="label label-success">[Paid]</span>

											<?php } else {?>

											<span class="label label-warning">[Not Paid]</span>		<?php //echo $paymentrows?>								

											<?php } ?>

												

											</td>



											<td class="td-actions">

												<div class="hidden-phone visible-desktop action-buttons">
                                                

													<a class="blue" href="extraservices.php?action=view&id=<?=$extraservices['id']?>">

														<i class="icon-zoom-in bigger-130"></i>

													</a>



													<a class="green" href="extraservices.php?action=edit&id=<?=$extraservices['id']?>">

														<i class="icon-pencil bigger-130"></i>

													</a>

													<a class="red" href="extraservices.php?action=delete&id=<?=$extraservices['id']?>">

														<i class="icon-trash bigger-130"></i>

													</a>
                                                    <a class="green" href="contacts.php?action=new&id=<?=$extraservices['id']?>">

														<i class="icon-envelope bigger-130"></i>

													</a>

												<?php if($extraservices['visapdf']==''){?>

												

												<?php } else{?>

													<?php if($extraservices['visasent'] =='1'){?>

												<a class="btn btn-small btn-info" href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>">

														ReSend Visa

													</a>

													<a target="_blank" class="green" href="<?=$baseurl;?>/uploads/<?=$extraservices['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a><?php } else {?>

													<a class="btn btn-small btn-success" href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>">

														Send Visa

													</a>

													<a target="_blank" class="green" href="<?=$baseurl;?>/uploads/<?=$ap['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a>

													<?php } }?>



												<div class="hidden-desktop visible-phone">

													<div class="inline position-relative">

														<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">

															<i class="icon-caret-down icon-only bigger-120"></i>

														</button>



														<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">

															<li>

																<a href="extraservices.php?action=view&id=<?=$extraservices['id']?>" class="tooltip-info" data-rel="tooltip" title="View">

																	<span class="blue">

																		<i class="icon-zoom-in bigger-120"></i>

																	</span>

																</a>

															</li>



															<li>

																<a href="extraservices.php?action=edit&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit">

																	<span class="green">

																		<i class="icon-edit bigger-120"></i>

																	</span>

																</a>

															</li>

												<li>

																<a href="extraservices.php?action=delete&id=<?=$extraservices['id']?>" class="tooltip-error" data-rel="tooltip" title="Delete">

																	<span class="red">

																		<i class="icon-trash bigger-120"></i>

																	</span>

																</a>

															</li>
                                                            <li>

																<a href="contacts.php?action=new&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit">

																	<span class="green">

																		<i class="icon-envelope bigger-120"></i>

																	</span>

																</a>

															</li>

															<li>

															<?php if($extraservices['visapdf']==''){?>

												

												<?php } else{?>

												<?php if($extraservices['visasent'] =='1'){?>

												<a href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete">

																	ReSend Visa

																</a>

																<a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$extraservices['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a>

												<?php } else {?>

																<a href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete">

																	Send Visa

																</a>

																<a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$extraservices['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a>

																<?php } }?>

															</li>

														</ul>

													</div>

												</div>

											</td>

										</tr>

										<?php } 

										//}?>

											</tbody>

										</table>
                                        <?=$pagination?>

									</div>

									

								</div>
                            <?php break;?>
                            <?php case "completed": ?>
                            <?php
	/*
		Place code to connect to your DB here.
	*/

	$tbl_name="extraservices";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where status=\"C\" ";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "extraservices.php?action=completed"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "select id,processingtime,invoiceid,firstname,visasent,visapdf,createddate,arrivaldate,email,applicants,status from $tbl_name where status=\"C\" ORDER BY createddate DESC LIMIT $start, $limit";
	$result = $mysqli->query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"row-fluid\"><div class=\"span6\"><div class=\"dataTables_info\" id=\"sample-table-2_info\">Showing $start to ".($limit*$page)." of ".$total_pages." entries</div></div><div class=\"span6\"><div class=\"dataTables_paginate paging_bootstrap pagination\"><ul>";
		//previous button
		if ($page > 1) 
			$pagination.= "<li class=\"prev\"><a href=\"$targetpage&page=$prev\"><i class=\"icon-double-angle-left\"></i></a></li>";
		else
			$pagination.= "<li class=\"prev disabled\"><a href=\"#\"><i class=\"icon-double-angle-left\"></i></a></li>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
				else
					$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href=\"#\">...</li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lastpage\">$lastpage</a></li>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href=\"$targetpage&page=1\">1</a></i>";
				$pagination.= "<li><a href=\"$targetpage&page=2\">2</a></li>";
				$pagination.= "<li><a href=\"#\">...</li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href=\"#\">...</li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lastpage\">$lastpage</a></li>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li><a href=\"$targetpage&page=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=2\">2</a></li>";
				$pagination.= "<li><a href=\"#\">...</li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a href=\"$targetpage&page=$next\"><i class=\"icon-double-angle-right\"></i></a></li>";
		else
			$pagination.= "<li class=\"next disabled\"><a href=\"#\"><i class=\"icon-double-angle-right\"></i></a></li>";
		$pagination.= "</ul></div></div></div>";		
	}
?>

                            <?php //$result=$mysqli->query('select id,processingtime,invoiceid,firstname,createddate,arrivaldate,email,applicants,status from extraservices where status="C" ORDER BY createddate DESC');
								 

							

//print_r($extraservices);

//exit;

?>
<div class="page-content">

					

							<div class="row-fluid">

								<h3 class="header smaller lighter blue">List of Completed extraservices <b class="badge badge-success"><?=$total_pages;?></b></h3>

			<?php if($_REQUEST['sendvisa']=='true'){?>

			<div class="alert alert-block alert-success">

								<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



								<i class="icon-ok green"></i>



								Visa Sent Successfully

							</div><?php }?>

			<?php if($_REQUEST['edit']=='true'){?>

			<div class="alert alert-block alert-success">

								<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



								<i class="icon-ok green"></i>



								Application Edited Successfully

							</div><?php }?>

			<?php if($_REQUEST['delete']=='true'){?>

			<div class="alert alert-block alert-success">

								<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



								<i class="icon-ok green"></i>



								Application Deleted Successfully

							</div><?php }?>
                            																<div class="row-fluid">
										<div class="widget-box">
											<div class="widget-header widget-header-small">
												<h5 class="lighter">Search Form</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<form class="form-search" action="extraservices.php?action=search" method="post" />
                                                    <select name="limit" class="span2"><option value="10">10</option><option value="50">50</option><option value="100">100</option></select>
                                                        <input type="text" class="input-medium search-query" name="name" placeholder="Name"/>
                                                        <input type="text" class="input-medium search-query" name="invoice" placeholder="Invoice Number"/>
                                                        <select name="status" class="span2"><option value="all">Any</option><option value="P">Pending</option><option value="Pr">Processing</option><option value="C">Completed</option><option value="R">Rejected</option></select>
														<button type="submit" class="btn btn-purple btn-small">
															Search
															<i class="icon-search icon-on-right bigger-110"></i>
														</button>
													</form>
												</div>
											</div>
										</div></div>
								<table id="sample-table-2" class="table table-striped table-bordered table-hover">

									<thead>

										<tr>

											<!--<th class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</th>-->

											<!--<th>Id</th>-->

											<th>Reference Number</th>

											<th  class="hidden-480">Name</th>

											<th>Created Date</th>

											<th class="hidden-480">Arrival Date</th>



											<th class="hidden-phone">

												<i class="icon-time bigger-110 hidden-phone"></i>

												Email

											</th>
                                            <th>Applicants</th>

											<th>Status</th>



											<th>Actions</th>

										</tr>

									</thead>



									<tbody>

									<?php //while ($extraservices) {

									while($extraservices=$result->fetch_assoc()){?>
                                            <?php
								$processing_fee=$extraservices['processingtime'];
								 if($processing_fee =="1"){
	$procText="normal";
	} 
	else if($processing_fee =="2"){
		$procText="info";
		}
		else{
			$procText="error";}?>

										<tr class="<?=$procText?>">

										<!--

											<td class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</td>-->

											<?php /*<td><?=$extraservices['id']?></td>*/?>

											<td><?=$extraservices['invoiceid']?></td>



											<td class="hidden-480">

												<?php echo explode('?|',$extraservices['firstname'])[0]?>

											</td>

											<td><?=$extraservices['createddate']?></td>

											<td class="hidden-480"><?=$extraservices['arrivaldate']?></td>

											<td class="hidden-phone"><?=$extraservices['email']?></td>
                                            <td><span class="label label-success" style="border-radius:50px"><?=$extraservices['applicants']?></span></td>



											<td>

											

											<?php switch($extraservices['status']){

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

											<?php 

											$invoice_id=$extraservices['invoiceid'];

											//echo $invoice_id;

											$query="select invoice from visa_payments where invoice='$invoice_id' and payment_status='Completed'";

											//echo $query;

											$payment=$mysqli->query($query);

											//$extraservices1=$payment->fetch_assoc();

											$paymentrows=$payment->num_rows;

											//print_r($payment);

											?><?php if($paymentrows > 0){?>

											<span class="label label-success">[Paid]</span>

											<?php } else {?>

											<span class="label label-warning">[Not Paid]</span>		<?php //echo $paymentrows?>								

											<?php } ?>

												

											</td>



											<td class="td-actions">

												<div class="hidden-phone visible-desktop action-buttons">
                                                

													<a class="blue" href="extraservices.php?action=view&id=<?=$extraservices['id']?>">

														<i class="icon-zoom-in bigger-130"></i>

													</a>



													<a class="green" href="extraservices.php?action=edit&id=<?=$extraservices['id']?>">

														<i class="icon-pencil bigger-130"></i>

													</a>

													<a class="red" href="extraservices.php?action=delete&id=<?=$extraservices['id']?>">

														<i class="icon-trash bigger-130"></i>

													</a>
                                                    <a class="green" href="contacts.php?action=new&id=<?=$extraservices['id']?>">

														<i class="icon-envelope bigger-130"></i>

													</a>

												<?php if($extraservices['visapdf']==''){?>

												

												<?php } else{?>

													<?php if($extraservices['visasent'] =='1'){?>

												<a class="btn btn-small btn-info" href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>">

														ReSend Visa

													</a>

													<a target="_blank" class="green" href="<?=$baseurl;?>/uploads/<?=$extraservices['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a><?php } else {?>

													<a class="btn btn-small btn-success" href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>">

														Send Visa

													</a>

													<a target="_blank" class="green" href="<?=$baseurl;?>/uploads/<?=$ap['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a>

													<?php } }?>



												<div class="hidden-desktop visible-phone">

													<div class="inline position-relative">

														<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">

															<i class="icon-caret-down icon-only bigger-120"></i>

														</button>



														<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">

															<li>

																<a href="extraservices.php?action=view&id=<?=$extraservices['id']?>" class="tooltip-info" data-rel="tooltip" title="View">

																	<span class="blue">

																		<i class="icon-zoom-in bigger-120"></i>

																	</span>

																</a>

															</li>



															<li>

																<a href="extraservices.php?action=edit&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit">

																	<span class="green">

																		<i class="icon-edit bigger-120"></i>

																	</span>

																</a>

															</li>

												<li>

																<a href="extraservices.php?action=delete&id=<?=$extraservices['id']?>" class="tooltip-error" data-rel="tooltip" title="Delete">

																	<span class="red">

																		<i class="icon-trash bigger-120"></i>

																	</span>

																</a>

															</li>
                                                            <li>

																<a href="contacts.php?action=new&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit">

																	<span class="green">

																		<i class="icon-envelope bigger-120"></i>

																	</span>

																</a>

															</li>

															<li>

															<?php if($extraservices['visapdf']==''){?>

												

												<?php } else{?>

												<?php if($extraservices['visasent'] =='1'){?>

												<a href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete">

																	ReSend Visa

																</a>

																<a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$extraservices['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a>

												<?php } else {?>

																<a href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete">

																	Send Visa

																</a>

																<a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$extraservices['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a>

																<?php } }?>

															</li>

														</ul>

													</div>

												</div>

											</td>

										</tr>

										<?php } 

										//}?>

											</tbody>

										</table>
                                        <?=$pagination;?>

									</div>

									

								</div>
                            <?php break;?>
                            
                            <?php case "search": ?>
                            <?php
	/*
		Place code to connect to your DB here.
	*/

	$tbl_name="extraservices";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$invoice=$_POST['invoice'];
	$fname=$_POST['name'];
	$status=$_POST['status'];
	if($status != 'all'){ $statusQuery="and status='$status'";} else $statusQuery="";
	$query = "SELECT COUNT(*) as num FROM $tbl_name where invoiceid LIKE '%$invoice%' and firstname LIKE '%$fname%' $statusQuery ";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "extraservices.php?action=completed"; 	//your file name  (the name of this file)
	$limit = $_POST['limit']; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "select id,processingtime,invoiceid,firstname,visasent,visapdf,createddate,arrivaldate,email,applicants,status from $tbl_name where invoiceid LIKE '%$invoice%' and firstname LIKE '%$fname%' $statusQuery ORDER BY createddate DESC LIMIT $start, $limit";
	$result = $mysqli->query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"row-fluid\"><div class=\"span6\"><div class=\"dataTables_info\" id=\"sample-table-2_info\">Showing $start to ".($limit*$page)." of ".$total_pages." entries</div></div><div class=\"span6\"><div class=\"dataTables_paginate paging_bootstrap pagination\"><ul>";
		//previous button
		if ($page > 1) 
			$pagination.= "<li class=\"prev\"><a href=\"$targetpage&page=$prev\"><i class=\"icon-double-angle-left\"></i></a></li>";
		else
			$pagination.= "<li class=\"prev disabled\"><a href=\"#\"><i class=\"icon-double-angle-left\"></i></a></li>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
				else
					$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href=\"#\">...</li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lastpage\">$lastpage</a></li>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href=\"$targetpage&page=1\">1</a></i>";
				$pagination.= "<li><a href=\"$targetpage&page=2\">2</a></li>";
				$pagination.= "<li><a href=\"#\">...</li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href=\"#\">...</li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lastpage\">$lastpage</a></li>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li><a href=\"$targetpage&page=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=2\">2</a></li>";
				$pagination.= "<li><a href=\"#\">...</li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a href=\"$targetpage&page=$next\"><i class=\"icon-double-angle-right\"></i></a></li>";
		else
			$pagination.= "<li class=\"next disabled\"><a href=\"#\"><i class=\"icon-double-angle-right\"></i></a></li>";
		$pagination.= "</ul></div></div></div>";		
	}
?>

                            <?php //$result=$mysqli->query('select id,processingtime,invoiceid,firstname,createddate,arrivaldate,email,applicants,status from extraservices where status="C" ORDER BY createddate DESC');
								 

							

//print_r($extraservices);

//exit;

?>
<div class="page-content">

					

							<div class="row-fluid">

								<h3 class="header smaller lighter blue">Search Results <b class="badge badge-success"><?=$total_pages;?></b></h3>

			<?php if($_REQUEST['sendvisa']=='true'){?>

			<div class="alert alert-block alert-success">

								<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



								<i class="icon-ok green"></i>



								Visa Sent Successfully

							</div><?php }?>

			<?php if($_REQUEST['edit']=='true'){?>

			<div class="alert alert-block alert-success">

								<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



								<i class="icon-ok green"></i>



								Application Edited Successfully

							</div><?php }?>

			<?php if($_REQUEST['delete']=='true'){?>

			<div class="alert alert-block alert-success">

								<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



								<i class="icon-ok green"></i>



								Application Deleted Successfully

							</div><?php }?>
																								<div class="row-fluid">
										<div class="widget-box">
											<div class="widget-header widget-header-small">
												<h5 class="lighter">Search Form</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<form class="form-search" action="extraservices.php?action=search" method="post" />
                                                    <select name="limit" class="span2"><option value="10">10</option><option value="50">50</option><option value="100">100</option></select>
                                                        <input type="text" class="input-medium search-query" name="name" placeholder="Name"/>
                                                        <input type="text" class="input-medium search-query" name="invoice" placeholder="Invoice Number"/>
                                                        <select name="status" class="span2"><option value="all">Any</option><option value="P">Pending</option><option value="Pr">Processing</option><option value="C">Completed</option><option value="R">Rejected</option></select>
														<button type="submit" class="btn btn-purple btn-small">
															Search
															<i class="icon-search icon-on-right bigger-110"></i>
														</button>
													</form>
												</div>
											</div>
										</div></div>
								<table id="sample-table-2" class="table table-striped table-bordered table-hover">

									<thead>

										<tr>

											<!--<th class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</th>-->

											<!--<th>Id</th>-->

											<th>Reference Number</th>

											<th  class="hidden-480">Name</th>

											<th>Created Date</th>

											<th class="hidden-480">Arrival Date</th>



											<th class="hidden-phone">

												<i class="icon-time bigger-110 hidden-phone"></i>

												Email

											</th>
                                            <th>Applicants</th>

											<th>Status</th>



											<th>Actions</th>

										</tr>

									</thead>



									<tbody>

									<?php //while ($extraservices) {

									while($extraservices=$result->fetch_assoc()){?>
                                            <?php
								$processing_fee=$extraservices['processingtime'];
								 if($processing_fee =="1"){
	$procText="normal";
	} 
	else if($processing_fee =="2"){
		$procText="info";
		}
		else{
			$procText="error";}?>

										<tr class="<?=$procText?>">

										<!--

											<td class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</td>-->

											<?php /*<td><?=$extraservices['id']?></td>*/?>

											<td><?=$extraservices['invoiceid']?></td>



											<td class="hidden-480">

												<?php echo explode('?|',$extraservices['firstname'])[0]?>

											</td>

											<td><?=$extraservices['createddate']?></td>

											<td class="hidden-480"><?=$extraservices['arrivaldate']?></td>

											<td class="hidden-phone"><?=$extraservices['email']?></td>
                                            <td><span class="label label-success" style="border-radius:50px"><?=$extraservices['applicants']?></span></td>



											<td>

											

											<?php switch($extraservices['status']){

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

											<?php 

											$invoice_id=$extraservices['invoiceid'];

											//echo $invoice_id;

											$query="select invoice from visa_payments where invoice='$invoice_id' and payment_status='Completed'";

											//echo $query;

											$payment=$mysqli->query($query);

											//$extraservices1=$payment->fetch_assoc();

											$paymentrows=$payment->num_rows;

											//print_r($payment);

											?><?php if($paymentrows > 0){?>

											<span class="label label-success">[Paid]</span>

											<?php } else {?>

											<span class="label label-warning">[Not Paid]</span>		<?php //echo $paymentrows?>								

											<?php } ?>

												

											</td>



											<td class="td-actions">

												<div class="hidden-phone visible-desktop action-buttons">
                                                

													<a class="blue" href="extraservices.php?action=view&id=<?=$extraservices['id']?>">

														<i class="icon-zoom-in bigger-130"></i>

													</a>



													<a class="green" href="extraservices.php?action=edit&id=<?=$extraservices['id']?>">

														<i class="icon-pencil bigger-130"></i>

													</a>

													<a class="red" href="extraservices.php?action=delete&id=<?=$extraservices['id']?>">

														<i class="icon-trash bigger-130"></i>

													</a>
                                                    <a class="green" href="contacts.php?action=new&id=<?=$extraservices['id']?>">

														<i class="icon-envelope bigger-130"></i>

													</a>

												<?php if($extraservices['visapdf']==''){?>

												

												<?php } else{?>

													<?php if($extraservices['visasent'] =='1'){?>

												<a class="btn btn-small btn-info" href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>">

														ReSend Visa

													</a>

													<a target="_blank" class="green" href="<?=$baseurl;?>/uploads/<?=$extraservices['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a><?php } else {?>

													<a class="btn btn-small btn-success" href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>">

														Send Visa

													</a>

													<a target="_blank" class="green" href="<?=$baseurl;?>/uploads/<?=$ap['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a>

													<?php } }?>



												<div class="hidden-desktop visible-phone">

													<div class="inline position-relative">

														<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">

															<i class="icon-caret-down icon-only bigger-120"></i>

														</button>



														<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">

															<li>

																<a href="extraservices.php?action=view&id=<?=$extraservices['id']?>" class="tooltip-info" data-rel="tooltip" title="View">

																	<span class="blue">

																		<i class="icon-zoom-in bigger-120"></i>

																	</span>

																</a>

															</li>



															<li>

																<a href="extraservices.php?action=edit&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit">

																	<span class="green">

																		<i class="icon-edit bigger-120"></i>

																	</span>

																</a>

															</li>

												<li>

																<a href="extraservices.php?action=delete&id=<?=$extraservices['id']?>" class="tooltip-error" data-rel="tooltip" title="Delete">

																	<span class="red">

																		<i class="icon-trash bigger-120"></i>

																	</span>

																</a>

															</li>
                                                            <li>

																<a href="contacts.php?action=new&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit">

																	<span class="green">

																		<i class="icon-envelope bigger-120"></i>

																	</span>

																</a>

															</li>

															<li>

															<?php if($extraservices['visapdf']==''){?>

												

												<?php } else{?>

												<?php if($extraservices['visasent'] =='1'){?>

												<a href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete">

																	ReSend Visa

																</a>

																<a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$extraservices['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a>

												<?php } else {?>

																<a href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete">

																	Send Visa

																</a>

																<a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$extraservices['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a>

																<?php } }?>

															</li>

														</ul>

													</div>

												</div>

											</td>

										</tr>

										<?php } 

										//}?>

											</tbody>

										</table>
                                        <?=$pagination;?>

									</div>

									

								</div>
                            <?php break;?>

							<?php }

							} else {?>
 <?php
	/*
		Place code to connect to your DB here.
	*/

	$tbl_name="extraservices";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where status=\"P\" ";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "extraservices.php?app=page"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "select id,processingtime,invoiceid,firstname,visasent,visapdf,createddate,arrivaldate,email,applicants,status from $tbl_name where status=\"P\" ORDER BY createddate DESC LIMIT $start, $limit";
	$result = $mysqli->query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"row-fluid\"><div class=\"span6\"><div class=\"dataTables_info\" id=\"sample-table-2_info\">Showing $start to ".($limit*$page)." of ".$total_pages." entries</div></div><div class=\"span6\"><div class=\"dataTables_paginate paging_bootstrap pagination\"><ul>";
		//previous button
		if ($page > 1) 
			$pagination.= "<li class=\"prev\"><a href=\"$targetpage&page=$prev\"><i class=\"icon-double-angle-left\"></i></a></li>";
		else
			$pagination.= "<li class=\"prev disabled\"><a href=\"#\"><i class=\"icon-double-angle-left\"></i></a></li>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
				else
					$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href=\"#\">...</li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lastpage\">$lastpage</a></li>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href=\"$targetpage&page=1\">1</a></i>";
				$pagination.= "<li><a href=\"$targetpage&page=2\">2</a></li>";
				$pagination.= "<li><a href=\"#\">...</li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href=\"#\">...</li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lastpage\">$lastpage</a></li>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li><a href=\"$targetpage&page=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=2\">2</a></li>";
				$pagination.= "<li><a href=\"#\">...</li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a href=\"$targetpage&page=$next\"><i class=\"icon-double-angle-right\"></i></a></li>";
		else
			$pagination.= "<li class=\"next disabled\"><a href=\"#\"><i class=\"icon-double-angle-right\"></i></a></li>";
		$pagination.= "</ul></div></div></div>";		
	}
?>
							<?php //$result=$mysqli->query('select id,processingtime,invoiceid,firstname,createddate,arrivaldate,email,applicants,status from extraservices where status="P" ORDER BY createddate DESC');

								 

							

//print_r($extraservices);

//exit;

?>

<div class="page-content">

					

							<div class="row-fluid">

								<h3 class="header smaller lighter blue">List of Pending extraservices <b class="badge badge-success"><?=$total_pages;?></b></h3>

			<?php if($_REQUEST['sendvisa']=='true'){?>

			<div class="alert alert-block alert-success">

								<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



								<i class="icon-ok green"></i>



								Visa Sent Successfully

							</div><?php }?>

			<?php if($_REQUEST['edit']=='true'){?>

			<div class="alert alert-block alert-success">

								<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



								<i class="icon-ok green"></i>



								Application Edited Successfully

							</div><?php }?>

			<?php if($_REQUEST['delete']=='true'){?>

			<div class="alert alert-block alert-success">

								<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



								<i class="icon-ok green"></i>



								Application Deleted Successfully

							</div><?php }?>
																<div class="row-fluid">
										<div class="widget-box">
											<div class="widget-header widget-header-small">
												<h5 class="lighter">Search Form</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<form class="form-search" action="extraservices.php?action=search" method="post" />
                                                    <select name="limit" class="span2"><option value="10">10</option><option value="50">50</option><option value="100">100</option></select>
                                                        <input type="text" class="input-medium search-query" name="name" placeholder="Name"/>
                                                        <input type="text" class="input-medium search-query" name="invoice" placeholder="Invoice Number"/>
                                                        <select name="status" class="span2"><option value="all">Any</option><option value="P">Pending</option><option value="Pr">Processing</option><option value="C">Completed</option><option value="R">Rejected</option></select>
														<button type="submit" class="btn btn-purple btn-small">
															Search
															<i class="icon-search icon-on-right bigger-110"></i>
														</button>
													</form>
												</div>
											</div>
										</div></div>
								<table id="sample-table-2" class="table table-striped table-bordered table-hover">

									<thead>

										<tr>

											<!--<th class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</th>-->

											<!--<th>Id</th>-->

											<th>Reference Number</th>

											<th  class="hidden-480">Name</th>

											<th>Created Date</th>

											<th class="hidden-480">Arrival Date</th>



											<th class="hidden-phone">

												<i class="icon-time bigger-110 hidden-phone"></i>

												Email

											</th>
                                            <th>Applicants</th>

											<th>Status</th>



											<th>Actions</th>

										</tr>

									</thead>



									<tbody>

									<?php //while ($extraservices) {

									while($extraservices=$result->fetch_assoc()){?>
                                            <?php
								$processing_fee=$extraservices['processingtime'];
								 if($processing_fee =="1"){
	$procText="normal";
	} 
	else if($processing_fee =="2"){
		$procText="info";
		}
		else{
			$procText="error";}?>

										<tr class="<?=$procText?>">

										<!--

											<td class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</td>-->

											<?php /*<td><?=$extraservices['id']?></td>*/?>

											<td><?=$extraservices['invoiceid']?></td>



											<td class="hidden-480">

												<?php echo explode('?|',$extraservices['firstname'])[0]?>

											</td>

											<td><?=$extraservices['createddate']?></td>

											<td class="hidden-480"><?=$extraservices['arrivaldate']?></td>

											<td class="hidden-phone"><?=$extraservices['email']?></td>
                                            <td><span class="label label-success" style="border-radius:50px"><?=$extraservices['applicants']?></span></td>



											<td>

											

											<?php switch($extraservices['status']){

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

											<?php 

											$invoice_id=$extraservices['invoiceid'];

											//echo $invoice_id;

											$query="select invoice from visa_payments where invoice='$invoice_id' and payment_status='Completed'";

											//echo $query;

											$payment=$mysqli->query($query);

											//$extraservices1=$payment->fetch_assoc();

											$paymentrows=$payment->num_rows;

											//print_r($payment);

											?><?php if($paymentrows > 0){?>

											<span class="label label-success">[Paid]</span>

											<?php } else {?>

											<span class="label label-warning">[Not Paid]</span>		<?php //echo $paymentrows?>								

											<?php } ?>

												

											</td>



											<td class="td-actions">

												<div class="hidden-phone visible-desktop action-buttons">
                                                

													<a class="blue" href="extraservices.php?action=view&id=<?=$extraservices['id']?>">

														<i class="icon-zoom-in bigger-130"></i>

													</a>



													<a class="green" href="extraservices.php?action=edit&id=<?=$extraservices['id']?>">

														<i class="icon-pencil bigger-130"></i>

													</a>

													<a class="red" href="extraservices.php?action=delete&id=<?=$extraservices['id']?>">

														<i class="icon-trash bigger-130"></i>

													</a>
                                                    <a class="green" href="contacts.php?action=new&id=<?=$extraservices['id']?>">

														<i class="icon-envelope bigger-130"></i>

													</a>

												<?php if($extraservices['visapdf']==''){?>

												

												<?php } else{?>

													<?php if($extraservices['visasent'] =='1'){?>

												<a class="btn btn-small btn-info" href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>">

														ReSend Visa

													</a>

													<a target="_blank" class="green" href="<?=$baseurl;?>/uploads/<?=$extraservices['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a><?php } else {?>

													<a class="btn btn-small btn-success" href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>">

														Send Visa

													</a>

													<a target="_blank" class="green" href="<?=$baseurl;?>/uploads/<?=$ap['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a>

													<?php } }?>



												<div class="hidden-desktop visible-phone">

													<div class="inline position-relative">

														<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">

															<i class="icon-caret-down icon-only bigger-120"></i>

														</button>



														<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">

															<li>

																<a href="extraservices.php?action=view&id=<?=$extraservices['id']?>" class="tooltip-info" data-rel="tooltip" title="View">

																	<span class="blue">

																		<i class="icon-zoom-in bigger-120"></i>

																	</span>

																</a>

															</li>



															<li>

																<a href="extraservices.php?action=edit&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit">

																	<span class="green">

																		<i class="icon-edit bigger-120"></i>

																	</span>

																</a>

															</li>

												<li>

																<a href="extraservices.php?action=delete&id=<?=$extraservices['id']?>" class="tooltip-error" data-rel="tooltip" title="Delete">

																	<span class="red">

																		<i class="icon-trash bigger-120"></i>

																	</span>

																</a>

															</li>
                                                            <li>

																<a href="contacts.php?action=new&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit">

																	<span class="green">

																		<i class="icon-envelope bigger-120"></i>

																	</span>

																</a>

															</li>

															<li>

															<?php if($extraservices['visapdf']==''){?>

												

												<?php } else{?>

												<?php if($extraservices['visasent'] =='1'){?>

												<a href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete">

																	ReSend Visa

																</a>

																<a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$extraservices['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a>

												<?php } else {?>

																<a href="extraservices.php?action=sendvisa&id=<?=$extraservices['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete">

																	Send Visa

																</a>

																<a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$extraservices['visapdf']?>">

														<i class="icon-download bigger-130"></i>

													</a>

																<?php } }?>

															</li>

														</ul>

													</div>

												</div>

											</td>

										</tr>

										<?php } 

										//}?>

											</tbody>

										</table>
                                        <?=$pagination;?>

									</div>

									<?php }?>

								</div>



								</div>

							</div><!--PAGE CONTENT ENDS-->

						</div><!--/.span-->

					</div><!--/.row-fluid-->

				</div><!--/.page-content-->



			</div><!--/.main-content-->

		</div><!--/.main-container-->



		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">

			<i class="icon-double-angle-up icon-only bigger-110"></i>

		</a>



		<!--basic scripts-->



		<!--[if !IE]>-->



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>



		<!--<![endif]-->



		<!--[if IE]>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<![endif]-->



		<!--[if !IE]>-->



		<script type="text/javascript">

			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");

		</script>



		<!--<![endif]-->



		<!--[if IE]>

<script type="text/javascript">

 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");

</script>

<![endif]-->



		<script type="text/javascript">

			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");

		</script>

		<script src="assets/js/bootstrap.min.js"></script>



		<!--page specific plugin scripts-->



		<script src="assets/js/jquery.dataTables.min.js"></script>

		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>



		<!--ace scripts-->



		<script src="assets/js/ace-elements.min.js"></script>

		<script src="assets/js/ace.min.js"></script>
                <script src="assets/css/wysihtml5-0.3.0.min.js"></script>
		<script src="assets/css/prettify.js"></script>
		<script src="assets/css/bootstrap-wysihtml5.js"></script>
 <script type="text/javascript">
	jQuery('#neweditor').wysihtml5();
	jQuery('#replyeditor').wysihtml5();
</script>


		<!--inline scripts related to this page-->



		<script type="text/javascript">

			$(function() {

				/* var oTable1 = $('#sample-table-2').dataTable( {

				"aaSorting": [[2,'desc']],

				"aoColumns": [

			      { "bSortable": false },

			      null,null,null, null,null, null,

				  { "bSortable": false }

				] } );

				

				

				$('table th input:checkbox').on('click' , function(){

					var that = this;

					$(this).closest('table').find('tr > td:first-child input:checkbox')

					.each(function(){

						this.checked = that.checked;

						$(this).closest('tr').toggleClass('selected');

					});

						

				});			*/

				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

				function tooltip_placement(context, source) {

					var $source = $(source);

					var $parent = $source.closest('table')

					var off1 = $parent.offset();

					var w1 = $parent.width();

			

					var off2 = $source.offset();

					var w2 = $source.width();

			

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';

					return 'left';

				}

			});

			

			

		</script>

		<div id="modal-div" class="modal hide fade" tabindex="-1">

										<div class="modal-header no-padding">

									<div class="table-header">

										<button type="button" class="close" data-dismiss="modal">&times;</button>

										Visa Document Not Found

									</div>

								</div>

								<div class="modal-body">

								Visa Not uploaded. please upload by Go to Edit and upload visa and try send visa

								</div>

									<div class="modal-footer">

									<button class="btn btn-small btn-danger pull-left" data-dismiss="modal">

										<i class="icon-remove"></i>

										Close

									</button>

								</div>

	</body>

</html>

