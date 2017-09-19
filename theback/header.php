<?php include(dirname(__FILE__).'/dataconfig.php');
@ini_set('display_errors',0);
ob_start();
$baseurl="https://turkeyevisa.online";
$baseDirectoryPath = "/home/bwin/public_html/";

?>
<?php
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

header ("Location: login.php");

}

?>
<?php 
							 $id=$_SESSION['userid'];
							 $result=$mysqli->query("select * from users where id=$id");
$user=$result->fetch_assoc();

?>
	 <?php
											$query1 = "SELECT COUNT(*) as num FROM applications where MONTH(visasentdate)=MONTH(CURDATE()) and YEAR(visasentdate)=YEAR(CURDATE()) and lockUser='".$id."'";
	$curmonth = $mysqli->query($query1);
	$cur_total_pages = $curmonth->fetch_assoc();?>
	 <?php
											$query2 = "SELECT COUNT(*) as num FROM applications where MONTH(visasentdate)=MONTH(CURDATE())-1 and YEAR(visasentdate)=YEAR(CURDATE()) and lockUser='".$id."'";
	$prevmonth = $mysqli->query($query2);
	$prev_total_pages = $prevmonth->fetch_assoc();?>
                                                                                     <?php
											$query = "SELECT COUNT(*) as num FROM applications where lockUser='".$id."'";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Visa Admin</title>
<meta name="description" content="Static &amp; Dynamic Tables" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--basic styles-->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
<!--page specific plugin styles-->
<!--fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300" />
<!--ace styles-->
<link rel="stylesheet" href="assets/css/ace.min.css" />
<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
<link rel="stylesheet" type="text/css" href="assets/css/prettify.css" />
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-wysihtml5.css" />
<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
<!--inline styles related to this page-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div class="navbar">
  <div class="navbar-inner">
    <div class="container-fluid"> <a href="#" class="brand"> <small> <i class="icon-leaf"></i> Visa Admin </small> </a>
      <!--/.brand-->
      <?php $app=$mysqli->query('select id,processingtime,invoiceid,firstname,createddate,arrivaldate,email,applicants,status from applications where status="Pr" ORDER BY createddate DESC LIMIT 5');
	  $appPaid=$mysqli->query('select id,processingtime,invoiceid,firstname,createddate,arrivaldate,email,applicants,status from applications where status="P" and notes LIKE "%Payment Status: Completed%" ORDER BY createddate DESC LIMIT 5');
					$app_count=$mysqli->query('select id from applications where status="Pr" ORDER BY createddate DESC');
					$apppaid_count=$mysqli->query('select id from applications where status="P" and notes LIKE "%Payment Status: Completed%" ORDER BY createddate');
					$contacts_row=$mysqli->query('select * from visa_contacts where view!=1 and adminsent!=1 ORDER BY createddate DESC LIMIT 3');
					$contact_count=$mysqli->query('select id from visa_contacts where view!=1 and adminsent!=1');
?>
      <ul class="nav ace-nav pull-right">
      <li class="green"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-tasks"></i> <span class="badge badge-important">
          <?=$apppaid_count->num_rows;?>
          </span> </a>
          <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
            <li class="nav-header"> <i class="icon-tasks"></i>
              <?=$apppaid_count->num_rows;?>
              Paid  Pending Applications </li>
            <?php //while ($applications) {
									
									while($applications=$appPaid->fetch_assoc()){
									?>
            <li> <a href="applications.php?action=view&id=<?=$applications['id']?>"> <span class="msg-body"> <span class="msg-title"> <span class="blue">
              <?=$applications['invoiceid']?>
              :</span> </span> <span class="msg-time"> <i class="icon-time"></i> <span><?php echo $applications['createddate']?></span> </span> </span> </a> </li>
            <?php }?>
            <li> <a href="applications.php?action=pending"> See all Progressing Tasks <i class="icon-arrow-right"></i> </a> </li>
          </ul>
        </li>
        <li class="purple"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-tasks"></i> <span class="badge badge-important">
          <?=$app_count->num_rows;?>
          </span> </a>
          <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
            <li class="nav-header"> <i class="icon-tasks"></i>
              <?=$app_count->num_rows;?>
              Processing Applications </li>
            <?php //while ($applications) {
									
									while($applications=$app->fetch_assoc()){
									?>
            <li> <a href="applications.php?action=view&id=<?=$applications['id']?>"> <span class="msg-body"> <span class="msg-title"> <span class="blue">
              <?=$applications['invoiceid']?>
              :</span> </span> <span class="msg-time"> <i class="icon-time"></i> <span><?php echo $applications['createddate']?></span> </span> </span> </a> </li>
            <?php }?>
            <li> <a href="applications.php?action=process"> See all Progressing Tasks <i class="icon-arrow-right"></i> </a> </li>
          </ul>
        </li>
        <li class="green"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-envelope icon-animated-vertical"></i> <span class="badge badge-important">
          <?=$contact_count->num_rows;?>
          </span> </a>
          <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
            <li class="nav-header"> <i class="icon-envelope-alt"></i>
              <?=$contact_count->num_rows;?>
              Unread Messages </li>
            <?php //while ($applications) {
									
									while($contacts=$contacts_row->fetch_assoc()){
									?>
            <li> <a href="contacts.php?action=reply&id=<?=$contacts['id']?>"> <img src="assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" /> <span class="msg-body"> <span class="msg-title"> <span class="blue">
              <?=$contacts['name']?>
              :</span> <?php echo $contacts['message']?> </span> <span class="msg-time"> <i class="icon-time"></i> <span><?php echo $contacts['createddate']?></span> </span> </span> </a> </li>
            <?php }?>
            <li> <a href="contacts.php"> See all messages <i class="icon-arrow-right"></i> </a> </li>
          </ul>
        </li>
        <li class="light-blue"> <a data-toggle="dropdown" href="#" class="dropdown-toggle"> <span class="user-info"> <small>Welcome,</small>
          <?=$user['username'];?>
          </span> <i class="icon-caret-down"></i> </a>
          <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
            <!--<li>
									<a href="#">
										<i class="icon-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>-->
                                <li><a href="#"><label class="badge badge-success"><?=$cur_total_pages['num'];?></label> This Month</a></li>
                                <li><a href="#"><label class="badge badge-success"><?=$prev_total_pages['num']?></label> Last Month</a></li>
                                <li><a href="#"><label class="badge badge-success"><?=$total_pages['num'];?></label> Total Count</a></li>
            <li> <a href="logout.php"> <i class="icon-off"></i> Logout </a> </li>
          </ul>
        </li>
      </ul>
      <!--/.ace-nav-->
    </div>
    <!--/.container-fluid-->
  </div>
  <!--/.navbar-inner-->
</div>
<div class="main-container container-fluid">
<a class="menu-toggler" id="menu-toggler" href="#"> <span class="menu-text"></span> </a>
<div class="sidebar" id="sidebar">
<ul class="nav nav-list">
  <li> <a href="index.php"> <i class="icon-dashboard"></i> <span class="menu-text"> Dashboard </span> </a> </li>
  <li> <a href="applications.php?action=myapps"> <i class="icon-tasks"></i> <span class="menu-text"> My Applications </span> </a> </li>
  <li> <a href="#" class="dropdown-toggle"> <i class="icon-code"></i> <span class="menu-text">List Applications </span> <b class="arrow icon-angle-down"></b> </a>
    <ul class="submenu">
      <li> <a href="applications.php"> <i class="icon-double-angle-right"></i> <span class="menu-text"> Pending Applications </span> </a> </li>
      <li> <a href="applications.php?action=process"> <i class="icon-double-angle-right"></i> <span class="menu-text"> Processing Applications </span> </a> </li>
      <li> <a href="applications.php?action=completed"> <i class="icon-double-angle-right"></i> <span class="menu-text"> Completed Applications </span> </a> </li>
    </ul>
  </li>
  <li> <a href="#" class="dropdown-toggle"> <i class="icon-code"></i> <span class="menu-text"> Services </span> <b class="arrow icon-angle-down"></b> </a>
    <ul class="submenu">
      <li> <a href="extraservices.php"> <i class="icon-double-angle-right"></i> <span class="menu-text"> Pending Services </span> </a> </li>
      <li> <a href="extraservices.php?action=process"> <i class="icon-double-angle-right"></i> <span class="menu-text"> Processing Services </span> </a> </li>
      <li> <a href="extraservices.php?action=completed"> <i class="icon-double-angle-right"></i> <span class="menu-text"> Completed Services </span> </a> </li>
    </ul>
  </li>
  <li> <a href="countries.php"> <i class="icon-compass"></i> <span class="menu-text"> Countries </span> </a> </li>
  <?php if($_SESSION['role'] =='admin'){?>
  <li> <a href="payments.php"> <i class="icon-credit-card"></i> <span class="menu-text"> Payments </span> </a> </li>
  <?php }?>
  <li> <a href="#" class="dropdown-toggle"> <i class="icon-envelope"></i> <span class="menu-text"> Messages </span> <b class="arrow icon-angle-down"></b> </a>
    <ul class="submenu">
      <li> <a href="contacts.php"> <i class="icon-double-angle-right"></i> <span class="menu-text">Received Messages</span> </a> </li>
      <li> <a href="contacts.php?action=adminsent"> <i class="icon-double-angle-right"></i> <span class="menu-text">Sent Messages</span> </a> </li>
    </ul>
  </li>
  <?php if($_SESSION['role'] =='admin'){?>
      <li> <a href="seoinformation.php"> <i class="icon-envelope"></i> <span class="menu-text"> Seo </span> </a> </li>
      <li> <a href="prices.php"> <i class="icon-envelope"></i> <span class="menu-text"> Prices </span> </a> </li>
      <li> <a href="users.php"> <i class="icon-user"></i> <span class="menu-text"> Users </span> </a> </li>
     <li> <a href="templates.php"> <i class="icon-envelope"></i> <span class="menu-text"> Email Templates </span> </a> </li>
  <?php }?>
</ul>
</li>
</ul>
<table class="table tablenew" id="timetable">
<tr><th>Country</th><th>ISD</th><th>Time</th></tr>
<tr><td>India</td><td>+91</td><td><?php $d = new DateTime("now", new DateTimeZone("Asia/Calcutta"));
echo $d->format(" H:i:s"); //2010-08-14T15:22:22+00:00?></td></tr>
<tr><td>Australia</td><td>+61</td><td><?php $d = new DateTime("now", new DateTimeZone("Australia/Canberra"));
echo $d->format(" H:i:s"); //2010-08-14T15:22:22+00:00?></td></tr>
<tr><td>Canada</td><td>+1</td><td><?php $d = new DateTime("now", new DateTimeZone("America/Santo_Domingo"));
echo $d->format(" H:i:s"); //2010-08-14T15:22:22+00:00?></td></tr>



<tr><td>Kuwait</td><td>+965</td><td><?php $d = new DateTime("now", new DateTimeZone("Asia/Kuwait"));
echo $d->format(" H:i:s");?></td></tr>
<tr><td>Netherlands</td><td>+31</td><td><?php $d = new DateTime("now", new DateTimeZone("Europe/Paris"));
echo $d->format(" H:i:s");?></td></tr>
<tr><td>Norway</td><td>+47</td><td><?php $d = new DateTime("now", new DateTimeZone("Europe/Paris"));
echo $d->format(" H:i:s");?></td></tr>
<tr><td>Saudi</td><td>+966</td><td><?php $d = new DateTime("now", new DateTimeZone("Asia/Kuwait"));
echo $d->format(" H:i:s");?></td></tr>
<tr><td>Spain</td><td>+34</td><td><?php $d = new DateTime("now", new DateTimeZone("Europe/Paris"));
echo $d->format(" H:i:s");?></td></tr>
<tr><td>USA</td><td>+1</td><td><?php $d = new DateTime("now", new DateTimeZone("America/Chicago"));
echo $d->format(" H:i:s");?></td></tr>
<tr><td>Oman</td><td>+968</td><td><?php $d = new DateTime("now", new DateTimeZone("Asia/Muscat"));
echo $d->format(" H:i:s");?></td></tr>
<tr><td>UAE</td><td>+971</td><td><?php $d = new DateTime("now", new DateTimeZone("Asia/Muscat"));
echo $d->format(" H:i:s");?></td></tr>

<tr><td>Bahrain</td><td>+973</td><td><?php $d = new DateTime("now", new DateTimeZone("Asia/Bahrain"));
echo $d->format(" H:i:s");?></td></tr>
<tr><td>Brazil</td><td>+501</td><td><?php $d = new DateTime("now", new DateTimeZone("Brazil/Acre"));
echo $d->format(" H:i:s");?></td></tr>
<tr><td>Qatar</td><td>+974</td><td><?php $d = new DateTime("now", new DateTimeZone("Asia/Qatar"));
echo $d->format(" H:i:s");?></td></tr>
<tr><td>Ireland</td><td>+444</td><td><?php $d = new DateTime("now", new DateTimeZone("Atlantic/Faeroe"));
echo $d->format(" H:i:s");?></td></tr>
<tr><td>Belgium</td><td>+32</td><td><?php $d = new DateTime("now", new DateTimeZone("Europe/Paris"));
echo $d->format(" H:i:s");?></td></tr>
<tr><td>Nigeria</td><td>+234</td><td><?php $d = new DateTime("now", new DateTimeZone("Atlantic/Faeroe"));
echo $d->format(" H:i:s");?></td></tr>




</table>
<!--/.nav-list-->