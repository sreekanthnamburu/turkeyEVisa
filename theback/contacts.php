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
														 case 'new' :?>
							 <?php 
							 							 if(isset($_REQUEST['id'])){$id=$_REQUEST['id'];

							 $result=$mysqli->query("select * from applications where id={$id}");

$ap=$result->fetch_array(MYSQLI_ASSOC);
}
if($_POST['submit']){
$message=$_POST['newmsg'];
$userid=$_POST['userid'];
$name=$_POST['name'];
$subject=$_POST['subject'];
$email=$_POST['email'];
$adminemail=$_POST['adminemail'];
if($adminemail =='1'){
$adminemailid="info@turkeyvisapro.com";
$adminemailname="Turkey Visa Pro";}else{
$adminemailid="info@quick-visa.org";
$adminemailname="Quick Visa";}
if($mysqli->query("insert INTO visa_contacts(name,email,subject,message,createddate,adminsent,userid) values('$name','$email','$subject','$message',NOW(),'1','$userid')")) {
// send email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: '.$adminemailname.'<'.$adminemailid.'>' . "\r\n";
$email_body='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
            <head>
            <meta name="viewport" content="width=device-width" />
                                          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                                                                                  <title>Reply Contact Message</title>
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
                             <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">,</p>&#13;

<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">'.$message.'</p>
         <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">
                      <tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 10px 0;">&#13;
</td>&#13;
</tr></table>
<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Kind Regards,</b><br/>Support Team.</p></td>
</tr></table></div>


</td>
<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
</tr></table><table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;">
<div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">
<table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td align="center" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #666; font-weight: normal; margin: 0 0 10px; padding: 0;">
         Copyright 2015 Quick eVisa.
</p>
</td>
</tr></table></div>

</td>
<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
</tr></table></body>
</html>';
if(mail($email,"'".$subject."'",$email_body,$headers))
{
echo "<span class='alert alert-success'>Mail Sent Successfully</span>";
 echo '<script type="text/javascript">';
        echo 'window.location.href="contacts.php?sendreply=true&action=adminsent";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="2;url=contacts.php?sendreply=true&action=adminsent" />';
        echo '</noscript>';

}
else {
 echo '<script type="text/javascript">';
        echo 'window.location.href="applications.php?sendreply=false&action=adminsent";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="2;url=contacts.php?sendreply=false&action=adminsent" />';
        echo '</noscript>';
}
} else echo "Mail Sent Failed".$mysqli->error;
}
?>
<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Send New Mail/Message
							<small>
								<i class="icon-double-angle-right"></i>
								Reply
							</small>
						</h1>
					</div><!--/.page-header-->
														<form class="form-horizontal" action="contacts.php?action=new" method="post" />
								<div class="control-group">
									<label class="control-label" for="form-field-1">Name</label>

									<div class="controls form-static">
										<input type="text" name="name" value="<?=explode('?|',$ap['firstname'])[0]?>" />
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Email</label>

									<div class="controls form-static">
										<input type="text" name="email" value="<?=$ap['email']?>" />
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label" for="form-field-1">Sent From </label>

									<div class="controls form-static">
										<select name="adminemail">
                                        <option value="2">Quick Visa</option>
                                        </select>
									</div>
								</div>
                                <?php $et=$mysqli->query('select * from email_templates ORDER BY templatename ASC');?>
                                <div class="control-group">
									<label class="control-label" for="form-field-1">Email Templates </label>

									<div class="controls form-static">
										<select name="email_templates" id="email_templates">
                                        <option value=""></option>
                                        <?php //while ($applications) {
									 while($value=$et->fetch_assoc()){?>
                                        <option value="<?=$value['id']?>"><?=$value['templatename']?></option>
                                        <?php }?>
                                        </select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Subject</label>

									<div class="controls form-static">
										<input type="text" name="subject" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Message Content</label>

									<div class="controls form-static">
										<textarea name="newmsg" rows="10" cols="30" id="msgEditor" class="span12"></textarea>
                                        <?php if($ap['invoiceid'] != ""){?><b>Payment Link : <?=$baseurl;?>/index.php/application/payments/<?=$ap['invoiceid']?></b><b>Preview Link : <?=$baseurl;?>/index.php/application/apppreview/<?=$ap['invoiceid']?></b>

										<?php }?><br/>
                                        <?php if($ap['status'] =="C"){?>Download Link : <?=$baseurl;?>/application/download-evisa/<?=$ap['invoiceid']?><?php }?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1"></label>

									<div class="controls form-static">
                                    <input type="hidden" name="userid" value="<?=$id;?>" /><input type="submit" value="Send " name="submit" class="btn btn-success">
								<a href="contacts.php" class="btn btn-grey" > Cancel</a></div></div>
								</form>
							<?php break;
							 case 'reply' :?>
							 <?php 
							 $id=$_REQUEST['id'];
							 $mysqli->query("Update visa_contacts set view = '1'

Where id = $id

");
							 $result=$mysqli->query("select * from visa_contacts where id={$id}");
$ap=$result->fetch_array(MYSQLI_ASSOC);
if($_POST['submit']){
$message=$_POST['replymsg'];
$name=$ap['name'];
$subject=$ap['subject'];
// send email
$adminemail=$_POST['adminemail'];
if($adminemail =='1'){
$adminemailid="info@turkeyvisapro.com";
$adminemailname="Turkey Visa Pro";}else{
$adminemailid="info@quick-visa.org";
$adminemailname="Quick Visa";}
$userid=$_POST['userid'];
$email=$_POST['email'];
if($mysqli->query("insert INTO visa_contacts(name,email,subject,message,createddate,adminsent,userid) values('$name','$email','$subject','$message',NOW(),'1','$userid')")) {
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: '.$adminemailname.'<'.$adminemailid.'>' . "\r\n";
$email_body='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
            <head>
            <meta name="viewport" content="width=device-width" />
                                          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                                                                                  <title>Reply Contact Message</title>
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
                             <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">,</p>&#13;

<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">'.$message.'</p>
         <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">
                      <tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 10px 0;">&#13;
</td>
</tr></table>
<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Kind Regards,</b><br/>Support Team.</p></td>
</tr></table></div>

</td>
<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
</tr></table><table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;">
<div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">
<table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td align="center" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #666; font-weight: normal; margin: 0 0 10px; padding: 0;">
         Copyright 2015 Quick eVisa .
</p>
</td>
</tr></table></div>
</td>
<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;
</tr></table></body>
</html>';
if(mail($email,"Reply Mail to '".$subject."'",$email_body,$headers))
{
echo "<span class='alert alert-success'>Message Sent Successfully</span>";
 echo '<script type="text/javascript">';
        echo 'window.location.href="contacts.php?sendreply=true";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="2;url=contacts.php?sendreply=true&action=adminsent" />';
        echo '</noscript>';

}
else {
 echo '<script type="text/javascript">';
        echo 'window.location.href="applications.php?sendreply=false";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="2;url=contacts.php?sendreply=false&action=adminsent" />';
        echo '</noscript>';
}
}
}
?>
<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Reply to <?=$ap['name']?>(<?=$ap['email']?>)
							<small>
								<i class="icon-double-angle-right"></i>
								Reply
							</small>
						</h1>
					</div><!--/.page-header-->
														<form class="form-horizontal" action="contacts.php?action=reply" method="post" />
								<div class="control-group">
									<label class="control-label" for="form-field-1">name</label>

									<div class="controls form-static">
										<?=$ap['name']?>
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Email</label>

									<div class="controls form-static">
										<?=$ap['email']?>
                                        <input type="hidden" name="email" value="<?=$ap['email']?>" />
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label" for="form-field-1">Sent From</label>

									<div class="controls form-static">
                                <select name="adminemail">
                                        <option value="2">Quick Visa</option>
                                        </select>
                                        </div>
								</div>
                                 <?php $et=$mysqli->query('select * from email_templates  ORDER BY templatename ASC');?>
                                <div class="control-group">
									<label class="control-label" for="form-field-1">Email Templates </label>

									<div class="controls form-static">
										<select name="email_templates" id="email_templates">
                                        <option value=""></option>
                                        <?php //while ($applications) {
									 while($value=$et->fetch_assoc()){?>
                                        <option value="<?=$value['id']?>"><?=$value['templatename']?></option>
                                        <?php }?>
                                        </select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">subject</label>

									<div class="controls form-static">
										<?=$ap['subject']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Message</label>

									<div class="controls form-static">
										<?=$ap['message']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Created Date</label>

									<div class="controls form-static">
										<?=$ap['createddate']?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1" >Reply Message</label>

									<div class="controls form-static">
										<textarea name="replymsg" rows="8" cols="30" id="msgEditor" style="width:70%"></textarea>
									</div>
								</div>
                                <div class="control-group">

									<div class="controls form-static">
																		<input type="hidden" name="id" value="<?=$ap['id']?>">
								<input type="submit" value="Reply" name="submit" class="btn btn-success">
                                <a href="contacts.php" class="btn btn-grey" > Cancel</a>
									</div>
								</div>
								
								</form>
							<?php break;
							 case 'delete': 
							 $id=$_REQUEST['id'];
							 $query="delete from visa_contacts where id=".$id;
							 if($mysqli->query($query)){
								echo '<script type="text/javascript">';
								echo 'window.location.href="contacts.php?delete=true";';
								echo '</script>';
								echo '<noscript>';
								echo '<meta http-equiv="refresh" content="0;url=contacts.php?delete=true" />';
								echo '</noscript>';
							 }
							?>
							<?php break;?>
							<?php case "adminsent":?>
                             <?php
	/*
		Place code to connect to your DB here.
	*/

	$tbl_name="visa_contacts";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where adminsent='1' ";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "contacts.php?action=adminsent"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name where adminsent='1' ORDER by createddate DESC LIMIT $start, $limit";
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
							<?php //$result=$mysqli->query('select * from visa_contacts ORDER BY createddate DESC');
							
//print_r($applications);
//exit;
?>
<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Contact Messages
							<small>
								<i class="icon-double-angle-right"></i>
								All Contact Messages
							</small>
						</h1>
					</div><!--/.page-header-->
							<div class="row-fluid">
                            <a href="contacts.php?action=new" class="btn btn-success">New Message</a>
								<h3 class="header smaller lighter blue">List of Contact Messages</h3>
<?php if($_REQUEST['sendreply']=='true'){?>
			<div class="alert alert-block alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-ok green"></i>

								Mail Sent Successfully
							</div><?php }?>
			<?php if($_REQUEST['delete']=='true'){?>
			<div class="alert alert-block alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-ok green"></i>

								Message Deleted Successfully
							</div><?php }?>
								<table id="sample-table-2" class="table table-striped table-bordered table-hover datatable">
									<thead>
										<tr>
											<!--<th class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</th>-->
											<!--<th>Id</th>-->
											<th>id</th>
											<th>Name</th>
											<th>Email</th>
											<th class="hidden-480">User ID</th>

											<th class="hidden-phone">
												<i class="icon-time bigger-110 hidden-phone"></i>
												Subject
											</th>
                                            <th class="hidden-phone">
												<i class="icon-time bigger-110 hidden-phone"></i>
												Created Date
											</th>
											<th class="hidden-480">Message</th>

											<th>Actions</th>
										</tr>
									</thead>

									<tbody>
									<?php //while ($applications) {
									
									while($applications=$result->fetch_assoc()){
									?>
										<tr>
										<!--
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>-->
											<?php /*<td><?=$applications['id']?></td>*/?>
											<td><?=$applications['id']?></td>

											<td>
												<?=$applications['name']?>
											</td>
											<td><?=$applications['email']?></td>
											<td class="hidden-480"><a href="applications.php?action=view&id=<?=$applications['userid']?>"><?=$applications['userid']?></a></td>
											<td class="hidden-phone"><?=$applications['subject']?></td>
											<td class="hidden-phone"><?=$applications['createddate']?></td>
											<td class="hidden-480">
											
											<?php echo $applications['message']?>
											</td>

											<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">
													<a class="blue" href="contacts.php?action=reply&id=<?=$applications['id']?>">
														<i class="icon-mail-reply bigger-130"></i>
													</a>

													<a class="green" href="contacts.php?action=delete&id=<?=$applications['id']?>">
														<i class="icon-trash bigger-130"></i>
													</a>
												</div>

												<div class="hidden-desktop visible-phone">
													<div class="inline position-relative">
														<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
															<i class="icon-caret-down icon-only bigger-120"></i>
														</button>

														<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
															<li>
																<a href="contacts.php?action=reply&id=<?=$applications['id']?>" class="tooltip-info" data-rel="tooltip" title="View">
																	<span class="blue">
																		<i class="icon-mail-reply bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="contacts.php?action=delete&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																	<span class="green">
																		<i class="icon-trash bigger-120"></i>
																	</span>
																</a>
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
							<?php }
							} else {?>
                            <?php
	/*
		Place code to connect to your DB here.
	*/

	$tbl_name="visa_contacts";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where adminsent !='1' ";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "contacts.php"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name where adminsent !='1'  ORDER by createddate DESC LIMIT $start, $limit";
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
			$pagination.= "<li class=\"prev\"><a href=\"$targetpage?page=$prev\"><i class=\"icon-double-angle-left\"></i></a></li>";
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
					$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
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
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href=\"#\">...</li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href=\"$targetpage?page=1\">1</a></i>";
				$pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
				$pagination.= "<li><a href=\"#\">...</li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href=\"#\">...</li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
				$pagination.= "<li><a href=\"#\">...</li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a href=\"$targetpage?page=$next\"><i class=\"icon-double-angle-right\"></i></a></li>";
		else
			$pagination.= "<li class=\"next disabled\"><a href=\"#\"><i class=\"icon-double-angle-right\"></i></a></li>";
		$pagination.= "</ul></div></div></div>";		
	}
?>
							<?php //$result=$mysqli->query('select * from visa_contacts ORDER BY createddate DESC');
							
//print_r($applications);
//exit;
?>
<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Contact Messages
							<small>
								<i class="icon-double-angle-right"></i>
								All Contact Messages
							</small>
						</h1>
					</div><!--/.page-header-->
							<div class="row-fluid">
                            <a href="contacts.php?action=new" class="btn btn-success">New Message</a>
								<h3 class="header smaller lighter blue">List of Contact Messages</h3>
<?php if($_REQUEST['sendreply']=='true'){?>
			<div class="alert alert-block alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-ok green"></i>

								Mail Sent Successfully
							</div><?php }?>
			<?php if($_REQUEST['delete']=='true'){?>
			<div class="alert alert-block alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-ok green"></i>

								Message Deleted Successfully
							</div><?php }?>
								<table id="sample-table-2" class="table table-striped table-bordered table-hover datatable">
									<thead>
										<tr>
											<!--<th class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</th>-->
											<!--<th>Id</th>-->
											<th>id</th>
											<th>Name</th>
											<th>Email</th>
											<th class="hidden-480">IP</th>

											<th class="hidden-phone">
												<i class="icon-time bigger-110 hidden-phone"></i>
												Subject
											</th>
                                            <th class="hidden-phone">
												<i class="icon-time bigger-110 hidden-phone"></i>
												Created Date
											</th>
											<th class="hidden-480">Message</th>

											<th>Actions</th>
										</tr>
									</thead>

									<tbody>
									<?php //while ($applications) {
									
									while($applications=$result->fetch_assoc()){
									?>
										<tr>
										<!--
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>-->
											<?php /*<td><?=$applications['id']?></td>*/?>
											<td><?=$applications['id']?></td>

											<td>
												<?=$applications['name']?>
											</td>
											<td><?=$applications['email']?></td>
											<td class="hidden-480"><?=$applications['senderip']?></td>
											<td class="hidden-phone"><?=$applications['subject']?></td>
											<td class="hidden-phone"><?=$applications['createddate']?></td>
											<td class="hidden-480">
											
											<?php echo $applications['message']?>
											</td>

											<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">
													<a class="blue" href="contacts.php?action=reply&id=<?=$applications['id']?>">
														<i class="icon-mail-reply bigger-130"></i>
													</a>

													<a class="green" href="contacts.php?action=delete&id=<?=$applications['id']?>">
														<i class="icon-trash bigger-130"></i>
													</a>
												</div>

												<div class="hidden-desktop visible-phone">
													<div class="inline position-relative">
														<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
															<i class="icon-caret-down icon-only bigger-120"></i>
														</button>

														<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
															<li>
																<a href="contacts.php?action=reply&id=<?=$applications['id']?>" class="tooltip-info" data-rel="tooltip" title="View">
																	<span class="blue">
																		<i class="icon-mail-reply bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="contacts.php?action=delete&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																	<span class="green">
																		<i class="icon-trash bigger-120"></i>
																	</span>
																</a>
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

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			$(function() {
				/*var oTable1 = $('#sample-table-2').dataTable( {
				"aaSorting": [[0,'desc']],
				"aoColumns": [
			     null,
			      null, null,null, null, null,null
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
                                                                        <script type="text/javascript">
	jQuery('#msgEditor').wysihtml5();
	//jQuery('#replyeditor').wysihtml5();
	$('#email_templates').change(function(){
			$.ajax({
				   url: "template_json.php?id="+$(this).val(),
				   error: function() {
					  $('#info').html('<p>An error has occurred</p>');
				   },
				   success: function(data) {
				   var datatext=data.templateData;
				   var dataname=data.templatename;
				   <?php if($_GET['id'] && $_GET['action']=='new'){?>
				   var name="<?=$ap['firstname']?explode('?|',$ap['firstname'])[0]:($ap['name']?$ap['name']:'');?>";
				   var invoiceid="<?=$ap['invoiceid']?$ap['invoiceid']:'{INVOICEID}';?>";
				   if(invoiceid !='{INVOICEID}'){
				   var paymentLink="<a href='https://turkeyevisa.online/index.php/application/payments/"+invoiceid+"'>https://turkeyevisa.online/index.php/application/payments/"+invoiceid+"</a>";
				   var downloadLink="<a href='https://turkeyevisa.online/index.php/application/download-evisa/"+invoiceid+"'>https://turkeyevisa.online/index.php/application/download-evisa/"+invoiceid+"</a>";
				   }
				   console.log(data);
				   datatext=datatext.replace("{NAME}",name);
				   datatext=datatext.replace("{INVOICEID}",invoiceid);
				   datatext=datatext.replace("{PAYMENTLINK}",paymentLink);
				   datatext=datatext.replace("{DOWNLOADLINK}",downloadLink);
				   <?php }?>
				   <?php if($ap['name']){?>
				   var name="<?=$ap['name']?$ap['name']:'noname';?>";
				   datatext=datatext.replace("{NAME}",name);
				   <?php }?>
					 $('#msgEditor').data("wysihtml5").editor.setValue(datatext);
					 $('input[name=subject]').val(dataname);
				   },
				   type: 'POST'
				});
		});
</script>
	</body>
</html>
