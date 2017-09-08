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
						<li class="active">Applications</li>
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
							 $result=$mysqli->query("select * from applications where id={$id}");
$ap=$result->fetch_array(MYSQLI_ASSOC);
?>
<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Applications view
							<small>
								<i class="icon-double-angle-right"></i>
								<?=$ap['firstname']?> Visa Application
							</small>
						</h1>
					</div><!--/.page-header-->
														<form class="form-horizontal" />
								<div class="control-group">
									<label class="control-label" for="form-field-1">id</label>

									<div class="controls form-static">
										<?=$ap['id']?>
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Invoice Number</label>

									<div class="controls form-static">
										<?=$ap['invoiceid']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Nationality</label>

									<div class="controls form-static">
									<?php echo $ap['nationality'];?>
										<?php $result2=$mysqli->query('select country from visa_country where id='.$ap['nationality'].'');
?>
										<?php $nationality=$result2->fetch_array(MYSQLI_ASSOC);
										echo $nationality['country']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Travel Document</label>

									<div class="controls form-static">
										<?=$ap['travaldocument']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Arival Date in Turkey</label>

									<div class="controls form-static">
										<?=$ap['arrivaldate']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">First Name</label>

									<div class="controls form-static">
										<?=$ap['firstname']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Last Name/Surname</label>

									<div class="controls form-static">
										<?=$ap['lastname']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Date of Birth</label>

									<div class="controls form-static">
										<?=$ap['dob']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Place Of Birth</label>

									<div class="controls form-static">
										<?=$ap['placeofbirth']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Mother Name</label>

									<div class="controls form-static">
										<?=$ap['mothername']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Father Name</label>

									<div class="controls form-static">
										<?=$ap['fathername']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Passport Number</label>

									<div class="controls form-static">
										<?=$ap['passportnumber']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Passport Issue Date</label>

									<div class="controls form-static">
										<?=$ap['pid']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Passport Expiry Date</label>

									<div class="controls form-static">
										<?=$ap['ped']?>
									</div>
								</div><div class="control-group">
									<label class="control-label" for="form-field-1">Email Address</label>

									<div class="controls form-static">
										<?php //$ap['email']?>info@turkishevisaonline.com
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
									<div class="control-group">
									<label class="control-label" for="form-field-1">Country</label>

									<div class="controls form-static">
									<?php $result=$mysqli->query('select country from visa_country where id='.$ap['country'].'');
?>
										<?php $country=$result->fetch_array(MYSQLI_ASSOC);
										echo $country['country']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Created Date</label>

									<div class="controls form-static">
										<?=$ap['createddate']?>
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
								<a href="applications.php" class="btn btn-grey" > Go Back</a>
								</form>
							<?php break;
							 case 'edit': ?>
							 <?php if(isset($_POST['update'])){
										$status= $_POST['status'];
										$id=$_POST['id'];
										//$price=$_POST['price'];
										$visapdf=$_FILES['visapdf'];
if($visapdf['error'] == UPLOAD_ERR_OK){
if(move_uploaded_file($visapdf['tmp_name'],"/home/worldevisagroup/public_html/uploads/".$visapdf['name'])){
$name=$visapdf['name'];
$mysqli->query("Update applications Set status = '$status',visapdf='$name'
Where id = $id
");
echo "<span class='alert alert-success'>Applications Edited Successfully</span>";
 echo '<script type="text/javascript">';
        echo 'window.location.href="applications.php?edit=true";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="2;url=applications.php?edit=true" />';
        echo '</noscript>';

} else {

echo "upload failed";}

} else{

$mysqli->query("Update applications Set status = '$status'
Where id = $id
");
echo "<span class='alert alert-success'>Applications Edited Successfully</span>";
 echo '<script type="text/javascript">';
        echo 'window.location.href="applications.php?edit=true";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="2;url=applications.php?edit=true" />';
        echo '</noscript>';
}

}?>
							 							 <?php 
							 $id=$_REQUEST['id'];
							 $result=$mysqli->query("select * from applications where id={$id}");
$ap=$result->fetch_array(MYSQLI_ASSOC);
?>
							 <div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Applications Edit
							<small>
								<i class="icon-double-angle-right"></i>
								<?=$ap['firstname']?> Visa Application
							</small>
						</h1>
					</div><!--/.page-header-->
					<form class="form-horizontal" method="post" action="applications.php?action=edit" enctype="multipart/form-data" />
								<div class="control-group">
									<label class="control-label" for="form-field-1">First Name</label>

									<div class="controls form-static">
										<?=$ap['firstname']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Invoice Number</label>

									<div class="controls form-static">
										<?=$ap['invoiceid']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Nationality</label>

									<div class="controls form-static">
										<?=$ap['passportnumber']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Upload Visa</label>

									<div class="controls form-static">
										<input type="file" name="visapdf" id="price" / >
										<p class="help">Please Upload only pdf files</p>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Status</label>

									<div class="controls form-static">
										<select name="status" id="status">
										<option value="P" <?php if($ap['status']=='P') {?> selected="selected"<?php }?>> Pending</option>
										<option value="Pr" <?php if($ap['status']=='Pr') {?> selected="selected"<?php }?>>Processing</option>
									
										</select>
									</div>
								</div>
								<input type="hidden" name="id" value="<?=$id?>">
								<input type="submit" name="update" value="update">
								</form>
							
							<?php break;
							 case 'sendvisa': ?>
							 <?php 
							 $id=$_REQUEST['id'];
							 $result=$mysqli->query("select * from applications where id={$id}");
$ap=$result->fetch_array(MYSQLI_ASSOC);
?>
							 <?php
							 $visadoc=$ap['visapdf'];
							 $invoiceid=$ap['invoiceid'];
							 $name=$ap['firstname'].' '.$ap['surname'];
							
							 $msg = "Hi User,<a href='$visapdf'>Download Visa</a>";

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Turkish E-visa Group<info@turkishevisaonline.com>' . "\r\n";
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

<p><img src="'.$baseurl.'/images/Logo.jpg" width="172" height="52" alt="e-Visa" /></p>
                             <hr />
                             <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Hi <b>'.$name.'</b>,</p>&#13;

<h1 style="font-family: \'Helvetica Neue\', Helvetica, Arial, \'Lucida Grande\', sans-serif; font-size: 36px; line-height: 1.2; color: #000; font-weight: 200; margin: 40px 0 10px; padding: 0;">Your e-Visa is ready.</h1>&#13;
<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Your payment has been approved and your application has been succesfully completed. You can download your e-Visa by clicking the link below.</p>
         <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">
                      <tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 10px 0;">&#13;
<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><a href="'.$baseurl.'/index.php/application/download-evisa/'.$invoiceid.'" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 2; color: #FFF; text-decoration: none; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 10px; background-color: #fc8a58; margin: 0 10px 0 0; padding: 0; border-color: #fc8a58; border-style: solid; border-width: 10px 20px;">Downlaod e-Visa</a></p>&#13;
</td>&#13;
</tr></table>
<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Kind Regards,</b><br/>Support Team.</p></td>&#13;
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
         Copyright 2014 All Rights Reserved .&#13;
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
if($mysqli->query("Update applications Set status = 'C',visasent='1' Where id = $id")){
//echo "<span class='alert alert-success'>Visa Sent Successfully</span>";
 echo '<script type="text/javascript">';
        echo 'window.location.href="applications.php?sendvisa=true";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="2;url=applications.php" />';
        echo '</noscript>';

}
else {
 echo '<script type="text/javascript">';
        echo 'window.location.href="applications.php?sendvisa=false";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="2;url=applications.php?sendvisa=false" />';
        echo '</noscript>';
}
} else {
 echo '<script type="text/javascript">';
        echo 'window.location.href="applications.php?sendvisa=false";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="2;url=applications.php?sendvisa=false" />';
        echo '</noscript>';
} ?>
							 							 							 
							 <div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Visa Sending
							<small>
								<i class="icon-double-angle-right"></i>
								<?=$ap['firstname']?> Visa Send
							</small>
						</h1>
					</div><!--/.page-header-->
					<form class="form-horizontal" method="post" action="applications.php?action=sendvisa" enctype="multipart/form-data" />
								<div class="control-group">
									<label class="control-label" for="form-field-1">First Name</label>

									<div class="controls form-static">
										<?=$ap['firstname']?>
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
										<?=$ap['passportnumber']?>
									</div>
								</div>
								<?php if($ap['visapdf']==''){?>
								<p class='alert alert-danger'>Visa Not uploaded. please upload by follow link and try send visa <a class=\"green\" href=\"applications.php?action=edit&id=".$ap['id']."\">
														Upload Visa
													</a><p>
								<?php }?>
								<input type="hidden" name="visapdf" value="<?=$_SERVER['HTTP_HOST'] ?>/turkey/frontend/uploads/<?=$ap['visapdf']?>">
								<input type="hidden" name="id" value="<?=$id?>">
								<input type="hidden" name="email" value="<?=$ap['email']?>">
								<?php if($ap['visasent'] =='1'){?>
								<p class='alert alert-success'>Visa Already Sent. Do you want to send again<p> <?php }?>
								<?php if($ap['visapdf']==''){echo"<span class='alert alert-danger'>No visa Found to Send. please upload visa and send visa <a class=\"green\" href=\"applications.php?action=edit&id=".$ap['id']."\">
														Upload Visa
													</a><span>";} else {?><input type="submit" name="submit" value="Send Visa" class="btn btn-primary">
								<?php }?></form>
							<?php break;?>
							<?php }
							} else {?>
							<?php $result=$mysqli->query('select DISTINCT invoice,payer_email,receipt_id,txn_id,auth_amount,payment_status,payment_date from visa_payments where payment_status !="" and txn_id !="" and payment_status !="0"');
								
?>
<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Payments
							<small>
								<i class="icon-double-angle-right"></i>
								All Payments
							</small>
						</h1>
					</div><!--/.page-header-->
							<div class="row-fluid">
								<h3 class="header smaller lighter blue">List of Payments</h3>
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
											<th  class="hidden-480">Email</th>
											<th>Payment Reference</th>
											<th class="hidden-480">Transaction Id</th>

											<th class="hidden-phone">
												<i class="icon-time bigger-110 hidden-phone"></i>
												Payment Date
											</th>
                                            <th>Paid Amount</th>
											<th>Status</th>

											<th>Actions</th>
										</tr>
									</thead>

									<tbody>
									<?php //while ($applications) {
									while($applications=$result->fetch_assoc()){?>
										<tr>
										<!--
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>-->
											<?php/*<td><?=$applications['id']?></td>*/?>
											<td><?=$applications['invoice']?></td>

											<td class="hidden-480">
												<?=$applications['payer_email']?>
											</td>
											<td><?=$applications['receipt_id']?></td>
											<td class="hidden-480"><?=$applications['txn_id']?></td>
											<td class="hidden-phone"><?=$applications['payment_date']?></td>
											<td>
											
											$ <?php echo $applications['auth_amount']?>
											
											</td>
											<td>
											
											<?php echo $applications['payment_status']?>
											
											</td>

											<td class="td-actions">
												
											</td>
										</tr>
										<?php } 
										//}?>
											</tbody>
										</table>
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

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

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

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aaSorting": [[4,'desc']],
				"aoColumns": [
			      { "bSortable": false },
			      null,null,null, null, null,null,
				  { "bSortable": false }
				] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});			
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
