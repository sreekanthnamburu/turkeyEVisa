<?php include('header.php');
//@ini_set('display_errors',true);
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
?>
<style>
.control-label {
	font-weight:bold;
}
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
</style>
<div class="sidebar-collapse" id="sidebar-collapse"> <i class="icon-double-angle-left"></i> </div>
</div>
<div class="main-content">
<div class="breadcrumbs" id="breadcrumbs">
  <ul class="breadcrumb">
    <li> <i class="icon-home home-icon"></i> <a href="#">Home</a> <span class="divider"> <i class="icon-angle-right arrow-icon"></i> </span> </li>
    <li class="active">Applications</li>
  </ul>
  <!--.breadcrumb-->
  <div class="nav-search" id="nav-search">
    <form class="form-search" />
    <span class="input-icon"> </span>
    </form>
  </div>
  <!--#nav-search-->
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
    <?php if($ap['locked'] =="1" && $ap['lockUser'] != $_SESSION['userid'] && $_SESSION['role']!='admin'){
echo "<h1>Application Locked BY Some Other User. You unable to Process this Application</h1>";
}
					else if(!$ap){
					echo "<h1> No sush application found</h1>";}else{?>
    <a href="applications.php" class="btn btn-grey" > Go Back</a> <a href="applications.php?action=edit&id=<?=$ap['id']?>" class="btn btn-success" > Edit and Upload Visa Document</a>
    <a href="contacts.php?action=new&id=<?=$ap['id']?>" class="btn btn-info">Send Mail</a>
    <?php if($ap['visapdf']==''){?>
    <?php } else{?>
    <?php if($ap['visasent'] =='1'){?>
    <a class="btn  btn-info" href="applications.php?action=sendvisa&id=<?=$ap['id']?>"> Visa Already Sent . ReSend Visa </a>
    <?php /*?><a target="_blank" class="btn btn-info" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>">

														<i class="icon-download"> Download Visa </i>

													</a><?php */?>
    <?php } else {?>
    <a class="btn btn-success" href="applications.php?action=sendvisa&id=<?=$ap['id']?>"> Send Visa </a>
    <?php /*?>	<a target="_blank" class="btn btn-info" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>">

														<i class="icon-download"> Download Visa </i>

													</a><?php */?>
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
      <label class="control-label" for="form-field-1">Travel Document</label>
      <div class="controls form-static">
        <?=$ap['travaldocument']?>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="form-field-1">Arival Date in Turkey</label>
      <div class="controls form-static">
         <?=date_format(date_create($ap['arrivaldate']), 'jS F Y');?> (<?=$ap['arrivaldate']?>)
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
    <div class="box"> <b>
      <h4 style="color:#0000CC">Applicant
        <?=$i+1?>
        Details</h4>
      </b>
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
           <?=date_format(date_create($dob[$i]), 'jS F Y');?> (<?=$dob[$i]?>)
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
          <?=date_format(date_create($pid[$i]), 'jS F Y');?> (<?=$pid[$i]?>)
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="form-field-1">Passport Expiry Date</label>
        <div class="controls form-static">
          <?=date_format(date_create($ped[$i]), 'jS F Y');?> (<?=$ped[$i]?>)
        </div>
      </div>
    </div>
    <?php }?>
    <?php if($ap['TSD'] !=''){?>
    <div class="control-group">
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
         <?=date_format(date_create($ap['VisaPermitExpireDate']), 'jS F Y');?> (<?=$ap['VisaPermitExpireDate']?>)
      </div>
    </div>
    <?php }?>
    <div class="control-group">
      <label class="control-label" for="form-field-1">Email Address</label>
      <div class="controls form-static">
        <?php //$ap['email']?>
        info@turkeyevisa.online </div>
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
      <div class="controls form-static"> <b>
        <?=$ap['ipaddress']?>
        </b> </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="form-field-1">Accessed Country </label>
      <div class="controls form-static"> <b>
        <?=$ap['country_access']?>
        </b> </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="form-field-1">Accessed Organization</label>
      <div class="controls form-static"> <b>
        <?=$ap['org']?>
        </b> </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="form-field-1">Visa Cost</label>
      <div class="controls form-static">
        <?php $servicefee=$ap['processingtime'];
					if($servicefee =="1"){ $sp="49";$st="Normal (Guaranteed 2 working days)";}else if($servicefee =="2"){$sp="69";$st="Urgent (Guaranteed 4-8 hours)";} else{ $sp="99";$st="Immediately service case in Time off, Sat,Sun or Holidays ";}; ?>
        <b>
        <?=$ap['applicants']?>
        X ( $
        <?=$nationality['price']?>
        + $
        <?=$sp?>
        (processing fee))= $
        <?=$ap['applicants']*($nationality['price']+$sp)?>
        </b><br />
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
        <?=date_format(date_create($ap['createddate']), 'jS F Y g:ia');?> (<?=$ap['createddate']?>)
      </div>
    </div>
     <div class="control-group">
      <label class="control-label" for="form-field-1">Visa Sent Date</label>
      <div class="controls form-static">
        <?=$ap['visasentdate']?$ap['visasentdate']:"Not Available";?>
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

											case "R":

											echo '<span class="label label-danger">Rejected</span>';

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
      <label class="control-label" for="form-field-1">Download Visa</label>
      <div class="controls form-static">
        <table  border="1">
          <tr>
            <td height="28" bgcolor="#333333"><div align="center" class="style1">Applicant </div></td>
            <td bgcolor="#333333"><div align="center" class="style1">Visa File Name </div></td>
            <td bgcolor="#333333"><div align="center" class="style1">Download </div></td>
            <td bgcolor="#333333"><div align="center" class="style1">Action</div></td>
          </tr>
          <?php 

//$result = mysql_query("SELECT id  FROM upload_images where invoiceid='$message_titles;'");

							

$result =$mysqli->query("SELECT * FROM upload_images where id='$id'");
                 
                while($row =mysqli_fetch_array($result)){
				   $link_address=$row['image'];
			   
				 for($i=0;$i<40;$i++)
					

?>
          <tr>
            <?php    ?>
            <td><b>
              <h6 align="center" style="color:#0000CC">
                <?php 
								echo $row['uniqueid'];?>
              </h6>
              </b> </td>
            <td align="center"><?=$link_address?></td>
            <td><a  class='btn' href='<?=$baseurl;?>/uploads/<?=$link_address?>' type='application/octet-stream'  download target='_blank'> Download Visa</a></td>
            <?php 
									$sql_query=$mysqli->query("SELECT * FROM upload_images where id='&id' and image='$link_address'");
										$result_set =mysqli_fetch_array($sql_query);
										 $ids=$result_set['id'];
										 $link_addresss=$result_set['image'];
										 $invoice_no=$result_set['invoiceid'];
										if(isset($_GET['delete']))
										{
											$sql_query="DELETE from upload_images WHERE uniqueid=".$_GET['delete'];
											if($mysqli->query($sql_query))											
											header("Location: applications.php?action=view&id=".$id);
										}
					
									?>
            <td><a href="javascript:image(<?=$row['uniqueid']?>,<?=$id?>)">Delete</a></td>
            <input type="hidden" name="link_address" value="<?=$link_address?>">
          </tr>
          <?php }?>
        </table>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="form-field-1">Payment Link</label>
      <div class="controls form-static"> <a target="_blank" href="<?=$baseurl;?>/index.php/application/payments/<?=$ap['invoiceid']?>">
        <?=$baseurl;?>
        /index.php/application/payments/
        <?=$ap['invoiceid']?>
        </a> </div>
    </div>
        <div class="control-group">
      <label class="control-label" for="form-field-1">Application Preview Link (USER)</label>
      <div class="controls form-static"> <a target="_blank" href="<?=$baseurl;?>/index.php/application/apppreview/<?=$ap['invoiceid']?>">
        <?=$baseurl;?>
        /index.php/application/apppreview/
        <?=$ap['invoiceid']?>
        </a> </div>
    </div>
    <a href="applications.php" class="btn btn-grey" > Go Back</a> <a href="applications.php?action=edit&id=<?=$ap['id']?>" class="btn btn-success" > Edit and Upload Visa Document</a>
    <a href="contacts.php?action=new&id=<?=$ap['id']?>" class="btn btn-info">Send Mail</a>
    <?php if($ap['visapdf']==''){?>
    <?php } else{?>
    <?php if($ap['visasent'] =='1'){?>
    <a class="btn  btn-info" href="applications.php?action=sendvisa&id=<?=$ap['id']?>"> Visa Already Sent . ReSend Visa </a>
    <?php /*?><a target="_blank" class="btn btn-info" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>">

														<i class="icon-download "> Download Visa </i>

													</a><?php */?>
    <?php } else {?>
    <a class="btn btn-success" href="applications.php?action=delete1&id=<?=$ap['id']?>"> Send Visa </a>
    <?php /*?>	<a target="_blank" class="btn btn-info" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>">

														<i class="icon-download"> Download Visa </i>

													</a><?php */?>
    <?php }
													 }?>
    </form>
    <h3>Emails Sent</h3>
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
	$query = "SELECT COUNT(*) as num FROM $tbl_name where adminsent='1' and userid='$id' ";
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
	$sql = "SELECT * FROM $tbl_name where adminsent='1' and userid='$id' ORDER by createddate DESC LIMIT $start, $limit";
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
          <th class="hidden-phone"> <i class="icon-time bigger-110 hidden-phone"></i> Subject </th>
          <th class="hidden-phone"> <i class="icon-time bigger-110 hidden-phone"></i> Created Date </th>
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
          <td><?=$applications['name']?></td>
          <td><?=$applications['email']?></td>
          <td class="hidden-480"><a href="applications.php?action=view&id=<?=$applications['userid']?>">
            <?=$applications['userid']?>
            </a></td>
          <td class="hidden-phone"><?=$applications['subject']?></td>
          <td class="hidden-phone"><?=$applications['createddate']?></td>
          <td class="hidden-480"><?php echo $applications['message']?> </td>
          <td class="td-actions"><div class="hidden-phone visible-desktop action-buttons"> <a class="blue" href="contacts.php?action=reply&id=<?=$applications['id']?>"> <i class="icon-mail-reply bigger-130"></i> </a> <a class="green" href="contacts.php?action=delete&id=<?=$applications['id']?>"> <i class="icon-trash bigger-130"></i> </a> </div>
            <div class="hidden-desktop visible-phone">
              <div class="inline position-relative">
                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"> <i class="icon-caret-down icon-only bigger-120"></i> </button>
                <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                  <li> <a href="contacts.php?action=reply&id=<?=$applications['id']?>" class="tooltip-info" data-rel="tooltip" title="View"> <span class="blue"> <i class="icon-mail-reply bigger-120"></i> </span> </a> </li>
                  <li> <a href="contacts.php?action=delete&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-trash bigger-120"></i> </span> </a> </li>
                </ul>
              </div>
            </div></td>
        </tr>
        <?php } 
										//}?>
      </tbody>
    </table>
    <?=$pagination?>
    <?php }?>
    <?php //$result=$mysqli->query('select * from visa_contacts ORDER BY createddate DESC');
							
//print_r($applications);
//exit;
?>
    <?php break;

							 case 'edit': ?>
    <?php 
							  $upload_dir = $baseDirectoryPath."uploads/";
							$id=$_POST['id'];
							$active=$_POST['enable'];
							$notes=$_POST['notes'];
							$status= $_POST['status'];
							$lock=$_POST['lock'];
							$lockUser=$_POST['lock']=='1'?$_SESSION['userid']:"";
							 if(isset($_POST['update'])){
							 if($_FILES["myfile"]["name"][0] !=""){
							 			
    $no_files = count($_FILES["myfile"]['name']);
    for ($i = 0; $i < $no_files; $i++) {

        if ($_FILES["myfile"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["myfile"]["error"][$i] . "<br>";
        } else {

            move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], $upload_dir . $_FILES["myfile"]["name"][$i]);
            echo $_FILES["myfile"]["name"][$i] . "<br>";
			$name=$_FILES["myfile"]["name"][$i];
			$active=$_POST['enable'];
			$result=$mysqli->query("SELECT invoiceid FROM applications where id='$id'");
			$row = mysqli_fetch_array($result);
			$invoiceid=$row['invoiceid'];
			
			 $mysqli->query("INSERT INTO upload_images(id,image,invoiceid)VALUES ('$id','$name','$invoiceid' )");
			$mysqli->query("Update applications Set status = '$status',locked=$lock,lockUser=$lockUser,visapdf='$name',notes='$notes',active='$active' Where id = '$id'");
        }
    }
    echo "<span class='alert alert-success'>Applications Edited Successfully</span>".$ap['invoiceid'];
}
							 
	 else{
$mysqli->query("Update applications Set status = '$status', lockUser='$lockUser', locked = '$lock',notes='$notes',active='$active' Where id = $id");
echo "<span class='alert alert-success'>Applications Edited Successfully</span>";						 
							 
}
}

							 $id=$_REQUEST['id'];

							 $result=$mysqli->query("select * from applications where id={$id}");

$ap=$result->fetch_array(MYSQLI_ASSOC);

?>
    <div class="page-content">
      <div class="page-header position-relative">
        <h1> Applications Edit <small> <i class="icon-double-angle-right"></i>
          <?=explode('?|',$ap['firstname'])[0]?>
          Visa Application </small> </h1>
      </div>
      <!--/.page-header-->
      <form class="form-horizontal" method="post" action="applications.php?action=edit" enctype="multipart/form-data" />
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
      <div class="control-group">
        <label class="control-label" for="form-field-1">Enable Invoice</label>
        <div class="controls form-static">
          <select name="enable">
            <option value="1" <?=$ap['active']=='1'?"selected":""?> />
            
            
            Enable
            
            
            </option>
            <option value="0" <?=$ap['active']=='0'?"selected":""?> />
            
            
            Disable
            
            
            </option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="form-field-1">Lock Application</label>
        <div class="controls form-static">
          <select name="lock">
            <option value="0" <?=$ap['locked']=='0'?"selected":""?> />
            
            
            UnLocked
            
            
            </option>
            <option value="1" <?=$ap['locked']=='1'?"selected":""?> />
            
            
            Locked
            
            
            </option>
          </select>
          <p class="help">Please Lock Application Before Process .</p>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="form-field-1">Upload Visa</label>
        <div class="controls form-static">
          <!--<input type="file" name="visapdf2" id="visapdf2" / > -->
          <span id='spn_inputs'>
          <input type="file" name="myfile[]" id="myfile" />
          <br />
          </span>
          <div></div>
          <div class="dv_add"> <a href="javascript:void(0);" id="anc_add_more">Add More File</a></div>
          <div class="progress">
            <div class="bar"></div >
            <p class="help">Please Upload only pdf/Zip files. if re upload replace with existing files. if you have more than one file Zip and Upload. new file will be place to Download.</p>
            <?php if($ap['visapdf']==''){?>
            <?php } else{?>
            <p class="alert alert-danger">Visa Already uploaded . please check using download visa link. if you want to replace upload new visa document</p>
            <?php  }?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="form-field-1">Status</label>
          <div class="controls form-static">
            <select name="status" id="status">
              <option value="P" <?php if($ap['status']=='P') {?> selected="selected"<?php }?>> Pending</option>
              <option value="Pr" <?php if($ap['status']=='Pr') {?> selected="selected"<?php }?>>Processing</option>
              <?php if($ap['visasent'] =='1'){?>
              <option value="C" <?php if($ap['status']=='C') {?> selected="selected"<?php }?>>Completed</option>
              <?php }?>
              <option value="R" <?php if($ap['status']=='R') {?> selected="selected"<?php }?>>Rejected</option>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="form-field-1">Notes</label>
          <div class="controls form-static">
            <textarea name="notes" class="span12" rows="10" id="neweditor"><?=$ap['notes']?>
</textarea>
            </select>
            <p class="help">Please Dont Delete Payment Information. if you want to add new lines. Enter in New Lines</p>
          </div>
        </div>
        <div class="control-group">
          <div class="controls form-static">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" name="update" class="btn btn-success" value="update">
          </div>
        </div>
        </form>
        <a href="applications.php?action=view&id=<?=$ap['id']?>" class="btn btn-gray">Back To view Application</a>
        <?php if($ap['visapdf']==''){?>
        <?php } else{?>
        <?php if($ap['visasent'] =='1'){?>
        <a class="btn  btn-info" href="applications.php?action=sendvisa&id=<?=$ap['id']?>"> Visa Already Sent . ReSend Visa </a> <a target="_blank" class="btn btn-info" href="applications.php?action=downloadvisa&id=<?=$ap['id']?>"> <i class="icon-download"> Download Visa </i> </a>
        <?php } else {?>
        <a class="btn btn-success" href="applications.php?action=sendvisa&id=<?=$ap['id']?>"> Send Visa </a> <a target="_blank" class="btn btn-info" href="applications.php?action=downloadvisa&id=<?=$ap['id']?>"> <i class="icon-download"> Download Visa </i> </a>
        <?php } }?>
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

							 $namearray=explode('?|',$ap['firstname']);

							 $name=$namearray[0];

							

							 $msg = "Hi User,<a href='$visapdf'>Download Visa</a>";



// use wordwrap() if lines are longer than 70 characters

//$msg = wordwrap($msg,70);



// send email

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



// More headers

$headers .= 'From: Turkeyevisa <info@Turkeyevisa.online>' . "\r\n";

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

                             <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Dear '.$name.'</b>,</p>
						<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 0.5; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Application ID :</b> '.$invoiceid.'</p>
						<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 0.5; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Service Selected :</b> E-Visa</p>
						<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 0.5; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Status :</b> Completed</p>

<h3 style="font-family: \'Helvetica Neue\', Helvetica, Arial, \'Lucida Grande\', sans-serif; font-size: 20px; line-height: 1.2; color: #5cb85c; font-weight: 200; margin: 40px 0 10px; padding: 0;">Your e-Visa is ready.</h3>

<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Your payment has been approved and your application has been succesfully completed. You can download your e-Visa by clicking the link below.</p>

         <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">

                      <tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 10px 0;">&#13;

<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><a href="'.$baseurl.'/index.php/application/download-evisa/'.$invoiceid.'" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 2; color: #FFF; text-decoration: none; background-color: #be1c03;background-image:-moz-linear-gradient(center top , #5cb85c, #4cae4c);box-shadow: 0 0 0 1px #be1c03, 0 0 0 2px #670600;   border: 0 none;color: #f4f4f2;cursor: pointer;margin: 5px 10px 10px 0;font-weight:bold;padding:15px;border-radius:8px">Download&nbsp;e-Visa</a></p>&#13;

</td>

</tr></table>

 <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Kind Regards</b></p><p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
 <strong>eVisas Support Team</strong><br />
 <strong>24X7 Email Application Support</strong></br>
 <strong>Web : <a href="http://turkeyevisa.online">www.turkeyevisa.online</a></strong></br>
<strong>Email : <a href="http://turkeyevisa.online">https://turkeyevisa.online/contact-us</a></strong></br>
<b>Tel : Toll Free </b>- 0800 133 7619 ( 9:30 am to 5:30pm - Monday to Friday).<br/>
530 Cedar Dr, Irving, TX 75061, USAv</td>

</tr></table></div>




</td>


<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;

</tr></table><table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;

<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;">&#13;

&#13;

&#13;

<div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">&#13;

<table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td align="center" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">&#13;

<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #666; font-weight: normal; margin: 0 0 10px; padding: 0;">

         &#13;

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

if($mysqli->query("Update applications Set status = 'C',visasent='1',visasentdate=NOW() Where id = $id")){

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
            <h1> Visa Sending <small> <i class="icon-double-angle-right"></i>
              <?=explode('?|',$ap['firstname'])[0]?>
              Visa Send </small> </h1>
          </div>
          <!--/.page-header-->
          <form class="form-horizontal" method="post" action="applications.php?action=sendvisa" enctype="multipart/form-data" />
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
          <p class='alert alert-danger'>Visa Not uploaded. please upload by follow link and try send visa <a class=\"green\" href=\"applications.php?action=edit&id=".$ap['id']."\"> Upload Visa </a>
          <p>
            <?php }?>
            <input type="hidden" name="visapdf" value="<?=$_SERVER['HTTP_HOST'] ?>/turkey/frontend/uploads/<?=$ap['visapdf']?>">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="email" value="<?=$ap['email']?>">
            <?php if($ap['visasent'] =='1'){?>
          <p class='alert alert-success'>Visa Already Sent. Do you want to send again
          <p>
            <?php }?>
            <?php if($ap['visapdf']==''){echo"<span class='alert alert-danger'>No visa Found to Send. please upload visa and send visa <a class=\"green\" href=\"applications.php?action=edit&id=".$ap['id']."\">

														Upload Visa

													</a><span>";} else {?>
            <input type="submit" name="submit" value="Send Visa" class="btn btn-primary">
            <?php }?>
            </form>
            <?php break;?>
            <?php case "delete":?>
            <?php $id=$_REQUEST['id'];

							if(isset($_POST['delete'])){

							 $query="delete from applications where id=".$id;

							 if($mysqli->query($query)){

							 echo "Application was deleted";

								echo '<script type="text/javascript">';

								echo 'window.location.href="applications.php?delete=true";';

								echo '</script>';

								echo '<noscript>';

								echo '<meta http-equiv="refresh" content="0;url=applications.php?delete=true" />';

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
              <h1> Applications Delete <small> <i class="icon-double-angle-right"></i>
                <?=explode('?|',$ap['firstname'])[0]?>
                Visa Application </small> </h1>
            </div>
            <!--/.page-header-->
            <form class="form-horizontal" method="post" action="applications.php?action=delete" enctype="multipart/form-data" />
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
            <?php case "downloadvisa":?>
            <?php 

							 $id=$_REQUEST['id'];

							 $result=$mysqli->query("select * from applications where id={$id}");

$ap=$result->fetch_array(MYSQLI_ASSOC);

?>
            <div class="page-content">
              <div class="page-header position-relative">
                <h1> Applications Downloads <small> <i class="icon-double-angle-right"></i>
                  <?=explode('?|',$ap['firstname'])[0]?>
                  Visa Application </small> </h1>
              </div>
              <!--/.page-header-->
              <div class="control-group">
                <label class="control-label" for="form-field-1">Download Visa</label>
                <div class="controls form-static">
                  <table  border="1">
                    <tr>
                      <td height="28" bgcolor="#333333"><div align="center" class="style1">Applicant </div></td>
                      <td bgcolor="#333333"><div align="center" class="style1">Visa File Name </div></td>
                      <td bgcolor="#333333"><div align="center" class="style1">Download </div></td>
                      <td bgcolor="#333333"><div align="center" class="style1">Action</div></td>
                    </tr>
                    <?php 

//$result = mysql_query("SELECT id  FROM upload_images where invoiceid='$message_titles;'");

							$invoiceid=$ap['invoiceid'];

$result =$mysqli->query("SELECT * FROM upload_images where id='$id'");
                 
                while($row =mysqli_fetch_array($result)){
				   $link_address=$row['image'];
			   
				 for($i=0;$i<40;$i++)
					

?>
                    <tr>
                      <?php    ?>
                      <td><b>
                        <h6 align="center" style="color:#0000CC">
                          <?php 
								echo $uniqueid;?>
                        </h6>
                        </b> </td>
                      <td align="center"><?=$link_address?></td>
                      <td><a  class='btn' href='<?=$baseurl;?>/uploads/<?=$link_address?>' type='application/octet-stream'  download target='_blank'> Download Visa</a></td>
                      <?php 
									$sql_query=$mysqli->query("SELECT * FROM upload_images where id='&id' and image='$link_address'");
										$result_set =mysqli_fetch_array($sql_query);
										 $ids=$result_set['id'];
										 $link_addresss=$result_set['image'];
										 $invoice_no=$result_set['invoiceid'];
										if(isset($_GET['delete']))
										{
											$sql_query="DELETE from upload_images WHERE uniqueid=".$_GET['delete'];
											if($mysqli->query($sql_query))											
											header("Location: applications.php?action=view&id=".$id);
											//header("Location: applications.php?action=view&id=".$id);
										}
					
									?>
                      <td><a href="javascript:image(<?=$row['uniqueid']?>,<?=$id?>)">Delete</a></td>
                      <input type="hidden" name="link_address" value="<?=$link_address?>">
                    </tr>
                    <?php }?>
                  </table>
                </div>
              </div>
              <?php break;?>
              <?php case "process": ?>
              <?php
	/*
		Place code to connect to your DB here.
	*/

	$tbl_name="applications";		//your table name
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
	$targetpage = "applications.php?action=process"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "select id,processingtime,locked,lockUser,invoiceid,firstname,notes,visasent,visapdf,createddate,arrivaldate,email,applicants,status from $tbl_name where status=\"Pr\" ORDER BY createddate DESC LIMIT $start, $limit";
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
              <?php //$result=$mysqli->query('select id,processingtime,invoiceid,firstname,createddate,arrivaldate,email,applicants,status from applications where status="Pr" ORDER BY createddate DESC');
								 

							

//print_r($applications);

//exit;

?>
              <div class="page-content">
                <div class="row-fluid">
                  <h3 class="header smaller lighter blue">List of Processing Applications <b class="badge badge-success">
                    <?=$total_pages;?>
                    </b></span></h3>
                  <?php if($_REQUEST['sendvisa']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Visa Sent Successfully </div>
                  <?php }?>
                  <?php if($_REQUEST['edit']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Application Edited Successfully </div>
                  <?php }?>
                  <?php if($_REQUEST['delete']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Application Deleted Successfully </div>
                  <?php }?>
                  <div class="row-fluid">
                    <div class="widget-box">
                      <div class="widget-header widget-header-small">
                        <h5 class="lighter">Search Form</h5>
                      </div>
                      <div class="widget-body">
                        <div class="widget-main">
                          <form class="form-search" action="applications.php?action=search" method="post" />
                          <select name="limit" class="span2">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                          </select>
                          <input type="text" class="input-medium search-query" name="name" placeholder="Name"/>
                          <input type="text" class="input-medium search-query" name="email" placeholder="Email"/>
                          <input type="text" class="input-medium search-query" name="invoice" placeholder="Invoice Number"/>
                          <select name="status" class="span2">
                            <option value="all">Any</option>
                            <option value="P">Pending</option>
                            <option value="Pr">Processing</option>
                            <option value="C">Completed</option>
                            <option value="R">Rejected</option>
                          </select>
                          <button type="submit" class="btn btn-purple btn-small"> Search <i class="icon-search icon-on-right bigger-110"></i> </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
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
                        <th class="hidden-phone"> <i class="icon-time bigger-110 hidden-phone"></i> Email </th>
                        <th>Applicants</th>
                        <th>Locked</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php //while ($applications) {

									while($applications=$result->fetch_assoc()){?>
                      <?php
								$processing_fee=$applications['processingtime'];
								 if($processing_fee =="1"){
	$procText="normal";
	} 
	else if($processing_fee =="2"){
		$procText="info";
		}
		else{
			$procText="error";}
			$lockid=$applications['lockUser'];
			$query = "SELECT username FROM users where id='$lockid' ";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$username=$total_pages['username'];?>
                      <tr class="<?=$procText?>">
                        <!--

											<td class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</td>-->
                        <?php /*<td><?=$applications['id']?></td>*/?>
                        <td><?=$applications['invoiceid']?></td>
                        <td class="hidden-480"><?php echo explode('?|',$applications['firstname'])[0]?> </td>
                        <td><?=$applications['createddate']?></td>
                        <td class="hidden-480"><?=$applications['arrivaldate']?></td>
                        <td class="hidden-phone"><?=$applications['email']?></td>
                        <td><span class="label label-success" style="border-radius:50px">
                          <?=$applications['applicants']?>
                          </span></td>
                        <td><?php if($applications['locked'] =="1" ){?>
                          <span class="label label-pink arrowed"><i class="icon-lock bigger-130"></i> <?php echo $username; ?></span>
                          <?php }?>
                        </td>
                        <td><?php switch($applications['status']){

											case "P":

											echo '<span class="label label-danger">Pending</span>';

											break;
											case "R":

											echo '<span class="label label-danger">Rejected</span>';

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

											$invoice_id=$applications['invoiceid'];

											//echo $invoice_id;

											$query="select invoice from visa_payments where invoice='$invoice_id' and payment_status='Completed'";

											//echo $query;

											$payment=$mysqli->query($query);

											//$applications1=$payment->fetch_assoc();

											$paymentrows=$payment->num_rows;

											//print_r($payment);

											?>
                          <?php if($paymentrows > 0 || strpos($applications['notes'],'Payment Status: Completed') !== false){?>
                          <span class="label label-success">[Paid]</span>
                          <?php } else {?>
                          <span class="label label-warning">[Not Paid]</span>
                          <?php //echo $paymentrows?>
                          <?php } ?>
                        </td>
                        <td class="td-actions"><?php if($applications['locked'] =="1" && $applications['lockUser'] != $_SESSION['userid'] && $_SESSION['role']!='admin'){?>
                          <i class="icon-lock bigger-130"></i>
                          <?php }else{?>
                          <div class="hidden-phone visible-desktop action-buttons"> <a class="blue" href="applications.php?action=view&id=<?=$applications['id']?>"> <i class="icon-zoom-in bigger-130"></i> </a> <a class="green" href="applications.php?action=edit&id=<?=$applications['id']?>"> <i class="icon-pencil bigger-130"></i> </a> <a class="red" href="applications.php?action=delete&id=<?=$applications['id']?>"> <i class="icon-trash bigger-130"></i> </a> <a class="green" href="contacts.php?action=new&id=<?=$applications['id']?>"> <i class="icon-envelope bigger-130"></i> </a>
                            <?php if($applications['visapdf']==''){?>
                            <?php } else{?>
                            <?php if($applications['visasent'] =='1'){?>
                            <a class="btn btn-small btn-info" href="applications.php?action=sendvisa&id=<?=$applications['id']?>"> ReSend Visa </a> <a target="_blank" class="green" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>"> <i class="icon-download bigger-130"></i> </a>
                            <?php } else {?>
                            <a class="btn btn-small btn-success" href="applications.php?action=sendvisa&id=<?=$applications['id']?>"> Send Visa </a> <a target="_blank" class="green" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>"> <i class="icon-download bigger-130"></i> </a>
                            <?php } }?>
                          </div>
                          <div class="hidden-desktop visible-phone">
                            <div class="inline position-relative">
                              <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"> <i class="icon-caret-down icon-only bigger-120"></i> </button>
                              <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                                <li> <a href="applications.php?action=view&id=<?=$applications['id']?>" class="tooltip-info" data-rel="tooltip" title="View"> <span class="blue"> <i class="icon-zoom-in bigger-120"></i> </span> </a> </li>
                                <li> <a href="applications.php?action=edit&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-edit bigger-120"></i> </span> </a> </li>
                                <li> <a href="applications.php?action=delete&id=<?=$applications['id']?>" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="icon-trash bigger-120"></i> </span> </a> </li>
                                <li> <a href="contacts.php?action=new&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-envelope bigger-120"></i> </span> </a> </li>
                                <li>
                                  <?php if($applications['visapdf']==''){?>
                                  <?php } else{?>
                                  <?php if($applications['visasent'] =='1'){?>
                                  <a href="applications.php?action=sendvisa&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete"> ReSend Visa </a> <a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$applications['visapdf']?>"> <i class="icon-download bigger-130"></i> </a>
                                  <?php } else {?>
                                  <a href="applications.php?action=sendvisa&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete"> Send Visa </a> <a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$applications['visapdf']?>"> <i class="icon-download bigger-130"></i> </a>
                                  <?php } }?>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <?php }?>
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
              <?php case "myapps": ?>
              <?php
	/*
		Place code to connect to your DB here.
	*/

	$tbl_name="applications";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$userid=$_SESSION['userid'];
	$query = "SELECT COUNT(*) as num FROM $tbl_name where lockUser='$userid'";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "applications.php?action=myapps"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "select id,processingtime,locked,lockUser,invoiceid,firstname,notes,visasent,visapdf,createddate,arrivaldate,email,applicants,status from $tbl_name where lockUser='$userid' ORDER BY status DESC LIMIT $start, $limit";
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
              <?php //$result=$mysqli->query('select id,processingtime,invoiceid,firstname,createddate,arrivaldate,email,applicants,status from applications where status="Pr" ORDER BY createddate DESC');
								 

							

//print_r($applications);

//exit;

?>
              <div class="page-content">
                <div class="row-fluid">
                  <h3 class="header smaller lighter blue">List of Processing Applications <b class="badge badge-success">
                    <?=$total_pages;?>
                    </b></span></h3>
                  <?php if($_REQUEST['sendvisa']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Visa Sent Successfully </div>
                  <?php }?>
                  <?php if($_REQUEST['edit']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Application Edited Successfully </div>
                  <?php }?>
                  <?php if($_REQUEST['delete']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Application Deleted Successfully </div>
                  <?php }?>
                  <div class="row-fluid">
                    <div class="widget-box">
                      <div class="widget-header widget-header-small">
                        <h5 class="lighter">Search Form</h5>
                      </div>
                      <div class="widget-body">
                        <div class="widget-main">
                          <form class="form-search" action="applications.php?action=search" method="post" />
                          <select name="limit" class="span2">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                          </select>
                          <input type="text" class="input-medium search-query" name="name" placeholder="Name"/>
                          <input type="text" class="input-medium search-query" name="email" placeholder="Email"/>
                          <input type="text" class="input-medium search-query" name="invoice" placeholder="Invoice Number"/>
                          <select name="status" class="span2">
                            <option value="all">Any</option>
                            <option value="P">Pending</option>
                            <option value="Pr">Processing</option>
                            <option value="C">Completed</option>
                            <option value="R">Rejected</option>
                          </select>
                          <button type="submit" class="btn btn-purple btn-small"> Search <i class="icon-search icon-on-right bigger-110"></i> </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
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
                        <th class="hidden-phone"> <i class="icon-time bigger-110 hidden-phone"></i> Email </th>
                        <th>Applicants</th>
                        <th>Locked</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php //while ($applications) {

									while($applications=$result->fetch_assoc()){?>
                      <?php
								$processing_fee=$applications['processingtime'];
								 if($processing_fee =="1"){
	$procText="normal";
	} 
	else if($processing_fee =="2"){
		$procText="info";
		}
		else{
			$procText="error";}
			$lockid=$applications['lockUser'];
			$query = "SELECT username FROM users where id='$lockid' ";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$username=$total_pages['username'];?>
                      <tr class="<?=$procText?>">
                        <!--

											<td class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</td>-->
                        <?php /*<td><?=$applications['id']?></td>*/?>
                        <td><?=$applications['invoiceid']?></td>
                        <td class="hidden-480"><?php echo explode('?|',$applications['firstname'])[0]?> </td>
                        <td><?=$applications['createddate']?></td>
                        <td class="hidden-480"><?=$applications['arrivaldate']?></td>
                        <td class="hidden-phone"><?=$applications['email']?></td>
                        <td><span class="label label-success" style="border-radius:50px">
                          <?=$applications['applicants']?>
                          </span></td>
                        <td><?php if($applications['locked'] =="1" ){?>
                          <span class="label label-pink arrowed"><i class="icon-lock bigger-130"></i> <?php echo $username; ?></span>
                          <?php }?>
                        </td>
                        <td><?php switch($applications['status']){

											case "P":

											echo '<span class="label label-danger">Pending</span>';

											break;
											case "R":

											echo '<span class="label label-danger">Rejected</span>';

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

											$invoice_id=$applications['invoiceid'];

											//echo $invoice_id;

											$query="select invoice from visa_payments where invoice='$invoice_id' and payment_status='Completed'";

											//echo $query;

											$payment=$mysqli->query($query);

											//$applications1=$payment->fetch_assoc();

											$paymentrows=$payment->num_rows;

											//print_r($payment);

											?>
                          <?php if($paymentrows > 0 || strpos($applications['notes'],'Payment Status: Completed') !== false){?>
                          <span class="label label-success">[Paid]</span>
                          <?php } else {?>
                          <span class="label label-warning">[Not Paid]</span>
                          <?php //echo $paymentrows?>
                          <?php } ?>
                        </td>
                        <td class="td-actions"><div class="hidden-phone visible-desktop action-buttons"> <a class="blue" href="applications.php?action=view&id=<?=$applications['id']?>"> <i class="icon-zoom-in bigger-130"></i> </a> <a class="green" href="applications.php?action=edit&id=<?=$applications['id']?>"> <i class="icon-pencil bigger-130"></i> </a> <a class="red" href="applications.php?action=delete&id=<?=$applications['id']?>"> <i class="icon-trash bigger-130"></i> </a> <a class="green" href="contacts.php?action=new&id=<?=$applications['id']?>"> <i class="icon-envelope bigger-130"></i> </a>
                            <?php if($applications['visapdf']==''){?>
                            <?php } else{?>
                            <?php if($applications['visasent'] =='1'){?>
                            <a class="btn btn-small btn-info" href="applications.php?action=sendvisa&id=<?=$applications['id']?>"> ReSend Visa </a> <a target="_blank" class="green" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>"> <i class="icon-download bigger-130"></i> </a>
                            <?php } else {?>
                            <a class="btn btn-small btn-success" href="applications.php?action=sendvisa&id=<?=$applications['id']?>"> Send Visa </a> <a target="_blank" class="green" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>"> <i class="icon-download bigger-130"></i> </a>
                            <?php } }?>
                          </div>
                          <div class="hidden-desktop visible-phone">
                            <div class="inline position-relative">
                              <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"> <i class="icon-caret-down icon-only bigger-120"></i> </button>
                              <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                                <li> <a href="applications.php?action=view&id=<?=$applications['id']?>" class="tooltip-info" data-rel="tooltip" title="View"> <span class="blue"> <i class="icon-zoom-in bigger-120"></i> </span> </a> </li>
                                <li> <a href="applications.php?action=edit&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-edit bigger-120"></i> </span> </a> </li>
                                <li> <a href="applications.php?action=delete&id=<?=$applications['id']?>" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="icon-trash bigger-120"></i> </span> </a> </li>
                                <li> <a href="contacts.php?action=new&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-envelope bigger-120"></i> </span> </a> </li>
                                <li>
                                  <?php if($applications['visapdf']==''){?>
                                  <?php } else{?>
                                  <?php if($applications['visasent'] =='1'){?>
                                  <a href="applications.php?action=sendvisa&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete"> ReSend Visa </a> <a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$applications['visapdf']?>"> <i class="icon-download bigger-130"></i> </a>
                                  <?php } else {?>
                                  <a href="applications.php?action=sendvisa&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete"> Send Visa </a> <a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$applications['visapdf']?>"> <i class="icon-download bigger-130"></i> </a>
                                  <?php } }?>
                                </li>
                              </ul>
                            </div>
                          </div></td>
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

	$tbl_name="applications";		//your table name
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
	$targetpage = "applications.php?action=completed"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "select id,processingtime,locked,lockUser,invoiceid,firstname,visasent,notes,visapdf,createddate,arrivaldate,email,applicants,status from $tbl_name where status=\"C\" ORDER BY createddate DESC LIMIT $start, $limit";
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
              <?php //$result=$mysqli->query('select id,processingtime,invoiceid,firstname,createddate,arrivaldate,email,applicants,status from applications where status="C" ORDER BY createddate DESC');
								 

							

//print_r($applications);

//exit;

?>
              <div class="page-content">
                <div class="row-fluid">
                  <h3 class="header smaller lighter blue">List of Completed Applications <b class="badge badge-success">
                    <?=$total_pages;?>
                    </b></h3>
                  <?php if($_REQUEST['sendvisa']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Visa Sent Successfully </div>
                  <?php }?>
                  <?php if($_REQUEST['edit']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Application Edited Successfully </div>
                  <?php }?>
                  <?php if($_REQUEST['delete']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Application Deleted Successfully </div>
                  <?php }?>
                  <div class="row-fluid">
                    <div class="widget-box">
                      <div class="widget-header widget-header-small">
                        <h5 class="lighter">Search Form</h5>
                      </div>
                      <div class="widget-body">
                        <div class="widget-main">
                          <form class="form-search" action="applications.php?action=search" method="post" />
                          <select name="limit" class="span2">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                          </select>
                          <input type="text" class="input-medium search-query" name="name" placeholder="Name"/>
                          <input type="text" class="input-medium search-query" name="email" placeholder="Email"/>
                          <input type="text" class="input-medium search-query" name="invoice" placeholder="Invoice Number"/>
                          <select name="status" class="span2">
                            <option value="all">Any</option>
                            <option value="P">Pending</option>
                            <option value="Pr">Processing</option>
                            <option value="C">Completed</option>
                            <option value="R">Rejected</option>
                          </select>
                          <button type="submit" class="btn btn-purple btn-small"> Search <i class="icon-search icon-on-right bigger-110"></i> </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
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
                        <th class="hidden-phone"> <i class="icon-time bigger-110 hidden-phone"></i> Email </th>
                        <th>Applicants</th>
                        <th>Locked</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php //while ($applications) {

									while($applications=$result->fetch_assoc()){?>
                      <?php
								$processing_fee=$applications['processingtime'];
								 if($processing_fee =="1"){
	$procText="normal";
	} 
	else if($processing_fee =="2"){
		$procText="info";
		}
		else{
			$procText="error";}
			$lockid=$applications['lockUser'];
			$query = "SELECT username FROM users where id='$lockid' ";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$username=$total_pages['username'];?>
                      <tr class="<?=$procText?>">
                        <!--

											<td class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</td>-->
                        <?php /*<td><?=$applications['id']?></td>*/?>
                        <td><?=$applications['invoiceid']?></td>
                        <td class="hidden-480"><?php echo explode('?|',$applications['firstname'])[0]?> </td>
                        <td><?=$applications['createddate']?></td>
                        <td class="hidden-480"><?=$applications['arrivaldate']?></td>
                        <td class="hidden-phone"><?=$applications['email']?></td>
                        <td><span class="label label-success" style="border-radius:50px">
                          <?=$applications['applicants']?>
                          </span></td>
                        <td><?php if($applications['locked'] =="1" ){?>
                          <span class="label label-pink arrowed"><i class="icon-lock bigger-130"></i> <?php echo $username; ?></span>
                          <?php }?>
                        </td>
                        <td><?php switch($applications['status']){

											case "P":

											echo '<span class="label label-danger">Pending</span>';

											break;
											case "R":

											echo '<span class="label label-danger">Rejected</span>';

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

											$invoice_id=$applications['invoiceid'];

											//echo $invoice_id;

											$query="select invoice from visa_payments where invoice='$invoice_id' and payment_status='Completed'";

											//echo $query;

											$payment=$mysqli->query($query);

											//$applications1=$payment->fetch_assoc();

											$paymentrows=$payment->num_rows;

											//print_r($payment);

											?>
                          <?php if($paymentrows > 0 || strpos($applications['notes'],'Payment Status: Completed') !== false){?>
                          <span class="label label-success">[Paid]</span>
                          <?php } else {?>
                          <span class="label label-warning">[Not Paid]</span>
                          <?php //echo $paymentrows?>
                          <?php } ?>
                        </td>
                        <td class="td-actions"><?php if($applications['locked'] =="1" && $applications['lockUser'] != $_SESSION['userid'] && $_SESSION['role']!='admin'){?>
                          <i class="icon-lock bigger-130"></i>
                          <?php }else{?>
                          <div class="hidden-phone visible-desktop action-buttons"> <a class="blue" href="applications.php?action=view&id=<?=$applications['id']?>"> <i class="icon-zoom-in bigger-130"></i> </a> <a class="green" href="applications.php?action=edit&id=<?=$applications['id']?>"> <i class="icon-pencil bigger-130"></i> </a> <a class="red" href="applications.php?action=delete&id=<?=$applications['id']?>"> <i class="icon-trash bigger-130"></i> </a> <a class="green" href="contacts.php?action=new&id=<?=$applications['id']?>"> <i class="icon-envelope bigger-130"></i> </a>
                            <?php if($applications['visapdf']==''){?>
                            <?php } else{?>
                            <?php if($applications['visasent'] =='1'){?>
                            <a class="btn btn-small btn-info" href="applications.php?action=sendvisa&id=<?=$applications['id']?>"> ReSend Visa </a> <a target="_blank" class="green" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>"> <i class="icon-download bigger-130"></i> </a>
                            <?php } else {?>
                            <a class="btn btn-small btn-success" href="applications.php?action=sendvisa&id=<?=$applications['id']?>"> Send Visa </a> <a target="_blank" class="green" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>"> <i class="icon-download bigger-130"></i> </a>
                            <?php } }?>
                          </div>
                          <div class="hidden-desktop visible-phone">
                            <div class="inline position-relative">
                              <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"> <i class="icon-caret-down icon-only bigger-120"></i> </button>
                              <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                                <li> <a href="applications.php?action=view&id=<?=$applications['id']?>" class="tooltip-info" data-rel="tooltip" title="View"> <span class="blue"> <i class="icon-zoom-in bigger-120"></i> </span> </a> </li>
                                <li> <a href="applications.php?action=edit&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-edit bigger-120"></i> </span> </a> </li>
                                <li> <a href="applications.php?action=delete&id=<?=$applications['id']?>" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="icon-trash bigger-120"></i> </span> </a> </li>
                                <li> <a href="contacts.php?action=new&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-envelope bigger-120"></i> </span> </a> </li>
                                <li>
                                  <?php if($applications['visapdf']==''){?>
                                  <?php } else{?>
                                  <?php if($applications['visasent'] =='1'){?>
                                  <a href="applications.php?action=sendvisa&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete"> ReSend Visa </a> <a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$applications['visapdf']?>"> <i class="icon-download bigger-130"></i> </a>
                                  <?php } else {?>
                                  <a href="applications.php?action=sendvisa&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete"> Send Visa </a> <a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$applications['visapdf']?>"> <i class="icon-download bigger-130"></i> </a>
                                  <?php } }?>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <?php }?>
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

	$tbl_name="applications";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$invoice=$_REQUEST['invoice'];
	$fname=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$status=$_REQUEST['status'];
	$limit = $_REQUEST['limit']; 
	if($status != 'all'){ $statusQuery="and status='$status'";} else $statusQuery="";
	$query = "SELECT COUNT(*) as num FROM $tbl_name where invoiceid LIKE '%$invoice%' and email LIKE '%$email%' and firstname LIKE '%$fname%' $statusQuery ";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "applications.php?action=search&invoice=$invoice&name=$fname&email=$email&status=$status&limit=$limit"; 	//your file name  (the name of this file)
									//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "select id,locked,lockUser,processingtime,notes, invoiceid,firstname,visasent,visapdf,createddate,arrivaldate,email,applicants,status from $tbl_name where invoiceid LIKE '%$invoice%' and email LIKE '%$email%' and firstname LIKE '%$fname%' $statusQuery ORDER BY createddate DESC LIMIT $start, $limit";
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
              <?php //$result=$mysqli->query('select id,processingtime,invoiceid,firstname,createddate,arrivaldate,email,applicants,status from applications where status="C" ORDER BY createddate DESC');
								 

							

//print_r($applications);

//exit;

?>
              <div class="page-content">
                <div class="row-fluid">
                  <h3 class="header smaller lighter blue">Search Results <b class="badge badge-success">
                    <?=$total_pages;?>
                    </b></h3>
                  <?php if($_REQUEST['sendvisa']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Visa Sent Successfully </div>
                  <?php }?>
                  <?php if($_REQUEST['edit']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Application Edited Successfully </div>
                  <?php }?>
                  <?php if($_REQUEST['delete']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Application Deleted Successfully </div>
                  <?php }?>
                  <div class="row-fluid">
                    <div class="widget-box">
                      <div class="widget-header widget-header-small">
                        <h5 class="lighter">Search Form</h5>
                      </div>
                      <div class="widget-body">
                        <div class="widget-main">
                          <form class="form-search" action="applications.php?action=search" method="post" />
                          <select name="limit" class="span2">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                          </select>
                          <input type="text" class="input-medium search-query" name="name" placeholder="Name"/>
                          <input type="text" class="input-medium search-query" name="email" placeholder="Email"/>
                          <input type="text" class="input-medium search-query" name="invoice" placeholder="Invoice Number"/>
                          <select name="status" class="span2">
                            <option value="all">Any</option>
                            <option value="P">Pending</option>
                            <option value="Pr">Processing</option>
                            <option value="C">Completed</option>
                            <option value="R">Rejected</option>
                          </select>
                          <button type="submit" class="btn btn-purple btn-small"> Search <i class="icon-search icon-on-right bigger-110"></i> </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
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
                        <th class="hidden-phone"> <i class="icon-time bigger-110 hidden-phone"></i> Email </th>
                        <th>Applicants</th>
                        <th>Locked</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php //while ($applications) {

									while($applications=$result->fetch_assoc()){?>
                      <?php
											
								$processing_fee=$applications['processingtime'];
								 if($processing_fee =="1"){
	$procText="normal";
	} 
	else if($processing_fee =="2"){
		$procText="info";
		}
		else{
			$procText="error";}
				$lockid=$applications['lockUser'];
			$query = "SELECT username FROM users where id='$lockid' ";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$username=$total_pages['username'];?>
                      <tr class="<?=$procText?>">
                        <!--

											<td class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</td>-->
                        <?php /*<td><?=$applications['id']?></td>*/?>
                        <td><?=$applications['invoiceid']?></td>
                        <td class="hidden-480"><?php echo explode('?|',$applications['firstname'])[0]?> </td>
                        <td><?=$applications['createddate']?></td>
                        <td class="hidden-480"><?=$applications['arrivaldate']?></td>
                        <td class="hidden-phone"><?=$applications['email']?></td>
                        <td><span class="label label-success" style="border-radius:50px">
                          <?=$applications['applicants']?>
                          </span></td>
                        <td><?php if($applications['locked'] =="1" ){?>
                          <span class="label label-pink arrowed"><i class="icon-lock bigger-130"></i> <?php echo $username; ?></span>
                          <?php }?>
                        </td>
                        <td><?php switch($applications['status']){

											case "P":

											echo '<span class="label label-danger">Pending</span>';

											break;
											case "R":

											echo '<span class="label label-danger">Rejected</span>';

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

											$invoice_id=$applications['invoiceid'];

											//echo $invoice_id;

											$query="select invoice from visa_payments where invoice='$invoice_id' and payment_status='Completed'";

											//echo $query;

											$payment=$mysqli->query($query);

											//$applications1=$payment->fetch_assoc();

											$paymentrows=$payment->num_rows;

											//print_r($payment);

											?>
                          <?php if($paymentrows > 0 || strpos($applications['notes'],'Payment Status: Completed') !== false){?>
                          <span class="label label-success">[Paid]</span>
                          <?php } else {?>
                          <span class="label label-warning">[Not Paid]</span>
                          <?php //echo $paymentrows?>
                          <?php } ?>
                        </td>
                        <td class="td-actions"><?php if($applications['locked'] =="1" && $applications['lockUser'] != $_SESSION['userid'] && $_SESSION['role']!='admin'){?>
                          <i class="icon-lock bigger-130"></i>
                          <?php }else{?>
                          <div class="hidden-phone visible-desktop action-buttons"> <a class="blue" href="applications.php?action=view&id=<?=$applications['id']?>"> <i class="icon-zoom-in bigger-130"></i> </a> <a class="green" href="applications.php?action=edit&id=<?=$applications['id']?>"> <i class="icon-pencil bigger-130"></i> </a> <a class="red" href="applications.php?action=delete&id=<?=$applications['id']?>"> <i class="icon-trash bigger-130"></i> </a> <a class="green" href="contacts.php?action=new&id=<?=$applications['id']?>"> <i class="icon-envelope bigger-130"></i> </a>
                            <?php if($applications['visapdf']==''){?>
                            <?php } else{?>
                            <?php if($applications['visasent'] =='1'){?>
                            <a class="btn btn-small btn-info" href="applications.php?action=sendvisa&id=<?=$applications['id']?>"> ReSend Visa </a> <a target="_blank" class="green" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>"> <i class="icon-download bigger-130"></i> </a>
                            <?php } else {?>
                            <a class="btn btn-small btn-success" href="applications.php?action=sendvisa&id=<?=$applications['id']?>"> Send Visa </a> <a target="_blank" class="green" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>"> <i class="icon-download bigger-130"></i> </a>
                            <?php } }?>
                          </div>
                          <div class="hidden-desktop visible-phone">
                            <div class="inline position-relative">
                              <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"> <i class="icon-caret-down icon-only bigger-120"></i> </button>
                              <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                                <li> <a href="applications.php?action=view&id=<?=$applications['id']?>" class="tooltip-info" data-rel="tooltip" title="View"> <span class="blue"> <i class="icon-zoom-in bigger-120"></i> </span> </a> </li>
                                <li> <a href="applications.php?action=edit&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-edit bigger-120"></i> </span> </a> </li>
                                <li> <a href="applications.php?action=delete&id=<?=$applications['id']?>" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="icon-trash bigger-120"></i> </span> </a> </li>
                                <li> <a href="contacts.php?action=new&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-envelope bigger-120"></i> </span> </a> </li>
                                <li>
                                  <?php if($applications['visapdf']==''){?>
                                  <?php } else{?>
                                  <?php if($applications['visasent'] =='1'){?>
                                  <a href="applications.php?action=sendvisa&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete"> ReSend Visa </a> <a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$applications['visapdf']?>"> <i class="icon-download bigger-130"></i> </a>
                                  <?php } else {?>
                                  <a href="applications.php?action=sendvisa&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete"> Send Visa </a> <a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$applications['visapdf']?>"> <i class="icon-download bigger-130"></i> </a>
                                  <?php } }?>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <?php }?>
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

	$tbl_name="applications";		//your table name
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
	$targetpage = "applications.php?app=page"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "select id,processingtime,locked,lockUser,invoiceid,notes,firstname,visasent,visapdf,createddate,arrivaldate,email,applicants,status from $tbl_name where status=\"P\" ORDER BY createddate DESC LIMIT $start, $limit";
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
              <?php //$result=$mysqli->query('select id,processingtime,invoiceid,firstname,createddate,arrivaldate,email,applicants,status from applications where status="P" ORDER BY createddate DESC');

								 

							

//print_r($applications);

//exit;

?>
              <div class="page-content">
                <div class="row-fluid">
                  <h3 class="header smaller lighter blue">List of Pending Applications <b class="badge badge-success">
                    <?=$total_pages;?>
                    </b></h3>
                  <?php if($_REQUEST['sendvisa']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Visa Sent Successfully </div>
                  <?php }?>
                  <?php if($_REQUEST['edit']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Application Edited Successfully </div>
                  <?php }?>
                  <?php if($_REQUEST['delete']=='true'){?>
                  <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                    <i class="icon-ok green"></i> Application Deleted Successfully </div>
                  <?php }?>
                  <div class="row-fluid">
                    <div class="widget-box">
                      <div class="widget-header widget-header-small">
                        <h5 class="lighter">Search Form</h5>
                      </div>
                      <div class="widget-body">
                        <div class="widget-main">
                          <form class="form-search" action="applications.php?action=search" method="post" />
                          <select name="limit" class="span2">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                          </select>
                          <input type="text" class="input-medium search-query" name="name" placeholder="Name"/>
                          <input type="text" class="input-medium search-query" name="email" placeholder="Email"/>
                          <input type="text" class="input-medium search-query" name="invoice" placeholder="Invoice Number"/>
                          <select name="status" class="span2">
                            <option value="all">Any</option>
                            <option value="P">Pending</option>
                            <option value="Pr">Processing</option>
                            <option value="C">Completed</option>
                            <option value="R">Rejected</option>
                          </select>
                          <button type="submit" class="btn btn-purple btn-small"> Search <i class="icon-search icon-on-right bigger-110"></i> </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
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
                        <th class="hidden-phone"> <i class="icon-time bigger-110 hidden-phone"></i> Email </th>
                        <th>Applicants</th>
                        <th>Locked</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php //while ($applications) {

									while($applications=$result->fetch_assoc()){?>
                      <?php
								$processing_fee=$applications['processingtime'];
								 if($processing_fee =="1"){
	$procText="normal";
	} 
	else if($processing_fee =="2"){
		$procText="info";
		}
		else{
			$procText="error";}
			$lockid=$applications['lockUser'];
			$query = "SELECT username FROM users where id='$lockid' ";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$username=$total_pages['username'];?>
                      <tr class="<?=$procText?>">
                        <!--

											<td class="center">

												<label>

													<input type="checkbox" />

													<span class="lbl"></span>

												</label>

											</td>-->
                        <?php /*<td><?=$applications['id']?></td>*/?>
                        <td><?=$applications['invoiceid']?></td>
                        <td class="hidden-480"><?php echo explode('?|',$applications['firstname'])[0]?> </td>
                        <td><?=$applications['createddate']?></td>
                        <td class="hidden-480"><?=$applications['arrivaldate']?></td>
                        <td class="hidden-phone"><?=$applications['email']?></td>
                        <td><span class="label label-success" style="border-radius:50px">
                          <?=$applications['applicants']?>
                          </span></td>
                        <td><?php if($applications['locked'] =="1" ){?>
                          <span class="label label-pink arrowed"><i class="icon-lock bigger-130"></i> <?php echo $username; ?></span>
                          <?php }?>
                        </td>
                        <td><?php switch($applications['status']){

											case "P":

											echo '<span class="label label-danger">Pending</span>';

											break;
											case "R":

											echo '<span class="label label-danger">Rejected</span>';

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

											$invoice_id=$applications['invoiceid'];

											//echo $invoice_id;

											$query="select invoice from visa_payments where invoice='$invoice_id' and payment_status='Completed'";

											//echo $query;

											$payment=$mysqli->query($query);

											//$applications1=$payment->fetch_assoc();

											$paymentrows=$payment->num_rows;

											//print_r($payment);

											?>
                          <?php if($paymentrows > 0 || strpos($applications['notes'],'Payment Status: Completed') !== false){?>
                          <span class="label label-success">[Paid]</span>
                          <?php } else {?>
                          <span class="label label-warning">[Not Paid]</span>
                          <?php //echo $paymentrows?>
                          <?php } ?>
                        </td>
                        <td class="td-actions"><?php if($applications['locked'] =="1" && $applications['lockUser'] != $_SESSION['userid'] && $_SESSION['role']!='admin'){?>
                          <i class="icon-lock bigger-130"></i>
                          <?php }else{?>
                          <div class="hidden-phone visible-desktop action-buttons"> <a class="blue" href="applications.php?action=view&id=<?=$applications['id']?>"> <i class="icon-zoom-in bigger-130"></i> </a> <a class="green" href="applications.php?action=edit&id=<?=$applications['id']?>"> <i class="icon-pencil bigger-130"></i> </a> <a class="red" href="applications.php?action=delete&id=<?=$applications['id']?>"> <i class="icon-trash bigger-130"></i> </a> <a class="green" href="contacts.php?action=new&id=<?=$applications['id']?>"> <i class="icon-envelope bigger-130"></i> </a>
                            <?php if($applications['visapdf']==''){?>
                            <?php } else{?>
                            <?php if($applications['visasent'] =='1'){?>
                            <a class="btn btn-small btn-info" href="applications.php?action=sendvisa&id=<?=$applications['id']?>"> ReSend Visa </a> <a target="_blank" class="green" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>"> <i class="icon-download bigger-130"></i> </a>
                            <?php } else {?>
                            <a class="btn btn-small btn-success" href="applications.php?action=sendvisa&id=<?=$applications['id']?>"> Send Visa </a> <a target="_blank" class="green" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>"> <i class="icon-download bigger-130"></i> </a>
                            <?php } }?>
                          </div>
                          <div class="hidden-desktop visible-phone">
                            <div class="inline position-relative">
                              <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"> <i class="icon-caret-down icon-only bigger-120"></i> </button>
                              <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                                <li> <a href="applications.php?action=view&id=<?=$applications['id']?>" class="tooltip-info" data-rel="tooltip" title="View"> <span class="blue"> <i class="icon-zoom-in bigger-120"></i> </span> </a> </li>
                                <li> <a href="applications.php?action=edit&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-edit bigger-120"></i> </span> </a> </li>
                                <li> <a href="applications.php?action=delete&id=<?=$applications['id']?>" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="icon-trash bigger-120"></i> </span> </a> </li>
                                <li> <a href="contacts.php?action=new&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-envelope bigger-120"></i> </span> </a> </li>
                                <li>
                                  <?php if($applications['visapdf']==''){?>
                                  <?php } else{?>
                                  <?php if($applications['visasent'] =='1'){?>
                                  <a href="applications.php?action=sendvisa&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete"> ReSend Visa </a> <a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$applications['visapdf']?>"> <i class="icon-download bigger-130"></i> </a>
                                  <?php } else {?>
                                  <a href="applications.php?action=sendvisa&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete"> Send Visa </a> <a target="_blank" class="green" href="<?=$baseurl?>/uploads/<?=$applications['visapdf']?>"> <i class="icon-download bigger-130"></i> </a>
                                  <?php } }?>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <?php }?>
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
          </div>
          <!--PAGE CONTENT ENDS-->
        </div>
        <!--/.span-->
      </div>
      <!--/.row-fluid-->
    </div>
    <!--/.page-content-->
  </div>
  <!--/.main-content-->
</div>
<!--/.main-container-->
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse"> <i class="icon-double-angle-up icon-only bigger-110"></i> </a>
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
<!-- add more link -->
<script src="assets/js/jquery.form.js"></script>
<script src="assets/js/das.js"></script>
<script>
        /* JS for Uploader */
        $(function() {
            /* Append More Input Files */
            $('#anc_add_more').click(function() {
                $('#spn_inputs').append('<input type="file" name="myfile[]"><br>');
            });
        });

    </script>
<script type="text/javascript">
function image(deleteid,id)
{
	//alert(id);
	if(confirm('Sure To Remove This Record ?'))
	{
		window.location.href='applications.php?action=view&delete='+deleteid+'&id='+id;
	}
}
</script>
<script>/* JS for Uploader */
                   /* (function() {

                        var bar = $('.bar');
                        var percent = $('.percent');
                        var status = $('#status');

                        $('form').ajaxForm({
                            beforeSend: function() {
                                status.empty();
                                var percentVal = '0%';
                                bar.width(percentVal)
                                percent.html(percentVal);
                            },
                            uploadProgress: function(event, position, total, percentComplete) {
                                var percentVal = percentComplete + '%';
                                bar.width(percentVal)
                                percent.html(percentVal);

                            },
                            success: function() {
                                var percentVal = '100%';
                                bar.width(percentVal)
                                percent.html(percentVal);
                            },
                            complete: function(xhr) {
                                status.html(xhr.responseText);
                            }
                        });
                    })();*/
                </script>
<!-- end add more link -->
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
    Visa Document Not Found </div>
</div>
<div class="modal-body"> Visa Not uploaded. please upload by Go to Edit and upload visa and try send visa </div>
<div class="modal-footer">
  <button class="btn btn-small btn-danger pull-left" data-dismiss="modal"> <i class="icon-remove"></i> Close </button>
</div>
</body>
</html>
