<?php include('header.php');?>
    <div class="sidebar-collapse" id="sidebar-collapse"> <i class="icon-double-angle-left"></i> </div>
  </div>
  <div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home home-icon"></i> <a href="#">Home</a> <span class="divider"> <i class="icon-angle-right arrow-icon"></i> </span> </li>
        <li class="active">Dashboard</li>
      </ul>
      <!--.breadcrumb-->
      <div class="page-content">
        <!--<div class="nav-search" id="nav-search">
						<form class="form-search" />
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="icon-search nav-search-icon"></i>
							</span>
						</form>
					</div>-->
        <!--#nav-search-->
        <?php $query="select DISTINCT invoice,auth_amount from visa_payments where payment_status='Completed'";

											//echo $query;

											/*$payment=$mysqli->query($query);
											while($payment_p=$payment->fetch_assoc()){
											$payment_pay +=$payment_p['auth_amount'];
											}
											echo $payment_pay;*/
					 		$pending=$mysqli->query('select id from applications where status="P"');
					 	   $processing=$mysqli->query('select id from applications where status="Pr"');
						   $completed=$mysqli->query('select id from applications where status="C"');
						   $p=$mysqli->query('select a.invoiceid,c.price,a.applicants,a.processingtime from applications as a , visa_country as c where a.nationality=c.id AND a.status="C"');
					$today=$mysqli->query('SELECT a.invoiceid,c.price,a.applicants,a.processingtime FROM applications as a , visa_country as c WHERE a.createddate > DATE_SUB(NOW(), INTERVAL 1 DAY) AND (a.nationality=c.id AND a.status="C")');
					$thisweek=$mysqli->query('SELECT a.invoiceid,c.price,a.applicants,a.processingtime FROM applications as a , visa_country as c WHERE a.createddate > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND (a.nationality=c.id AND a.status="C")');
					$thismonth=$mysqli->query('SELECT a.invoiceid,c.price,a.applicants,a.processingtime FROM applications as a , visa_country as c WHERE a.createddate > DATE_SUB(NOW(), INTERVAL 1 MONTH) AND (a.nationality=c.id AND a.status="C")');
						   while($paymentf=$p->fetch_assoc()){
						   		$payment+=$paymentf['applicants']*$paymentf['price'];	
								if($paymentf['processingtime']="1"){
									$service+=$paymentf['applicants']*45;
								} else if($paymentf['processingtime']="2"){
									$service+=$paymentf['applicants']*65;
								} else{
									$service+=$paymentf['applicants']*100;
								}
								//print_r
						   }
						   while($todayf=$today->fetch_assoc()){
						   		$daypayment+=$todayf['applicants']*$todayf['price'];	
								if($todayf['processingtime']="1"){
									$dayservice+=$todayf['applicants']*45;
								} else if($todayf['processingtime']="2"){
									$dayservice+=$todayf['applicants']*65;
								} else{
									$dayservice+=$todayf['applicants']*100;
								}
								//print_r
						   }
						   while($monthf=$thismonth->fetch_assoc()){
						   		$monthpayment+=$monthf['applicants']*$monthf['price'];	
								if($todayf['processingtime']="1"){
									$monthservice+=$monthf['applicants']*45;
								} else if($monthf['processingtime']="2"){
									$monthservice+=$monthf['applicants']*65;
								} else{
									$monthservice+=$monthf['applicants']*100;
								}
								//print_r
						   }
						   while($weekf=$thisweek->fetch_assoc()){
						   		$weekpayment+=$weekf['applicants']*$weekf['price'];	
								if($todayf['processingtime']="1"){
									$weekservice+=$weekf['applicants']*45;
								} else if($todayf['processingtime']="2"){
									$weekservice+=$weekf['applicants']*65;
								} else{
									$weekservice+=$weekf['applicants']*100;
								}
								//print_r
						   }
					 ?>
        <?php if($_SESSION['role'] == 'admin'){?>
        <div class="row-fluid">
          <h3 class="header smaller lighter blue">Statistics</h3>
          <p>This Payment Statistics based on completed Applications</p>
          <div class="span12 infobox-container">
            <div class="infobox infobox-green  ">
              <div class="infobox-icon"> <i class="icon-dashboard"></i> </div>
              <div class="infobox-data"> <span class="infobox-data-number"><?php echo ($pending->num_rows + $processing->num_rows + $completed->num_rows )?></span>
                <div class="infobox-content">Total Applications</div>
              </div>
            </div>
            <div class="infobox infobox-blue  ">
              <div class="infobox-icon"> <i class="icon-code"></i> </div>
              <div class="infobox-data"> <span class="infobox-data-number"><?php echo $completed->num_rows?></span>
                <div class="infobox-content">Completed Applications</div>
              </div>
            </div>
            <div class="infobox infobox-orange2  ">
              <div class="infobox-icon"> <i class="icon-code"></i> </div>
              <div class="infobox-data"> <span class="infobox-data-number"><?php echo $processing->num_rows?></span>
                <div class="infobox-content">Processing Applications</div>
              </div>
            </div>
            <div class="infobox infobox-red  ">
              <div class="infobox-icon"> <i class="icon-code"></i> </div>
              <div class="infobox-data"> <span class="infobox-data-number"><?php echo $pending->num_rows;?></span>
                <div class="infobox-content">Pending Applications</div>
              </div>
            </div>
            <div class="infobox infobox-pink  ">
              <div class="infobox-icon"> <i class="icon-shopping-cart"></i> </div>
              <div class="infobox-data"> <span class="infobox-data-number">$
                <?=$service;?>
                </span>
                <div class="infobox-content">Total Service Fee</div>
              </div>
            </div>
            <div class="infobox infobox-blue2  ">
              <div class="infobox-icon"> <i class="icon-shopping-cart"></i> </div>
              <div class="infobox-data"> <span class="infobox-data-number">$
                <?=$payment;?>
                </span>
                <div class="infobox-content">Total Embassy Fee</div>
              </div>
            </div>
            <div class="infobox infobox-green  ">
              <div class="infobox-icon"> <i class="icon-shopping-cart"></i> </div>
              <div class="infobox-data"> <span class="infobox-data-number">$
                <?=$service+$payment;?>
                </span>
                <div class="infobox-content">Total Earnings</div>
              </div>
            </div>
            <div class="infobox infobox-green  ">
              <div class="infobox-icon"> <i class="icon-shopping-cart"></i> </div>
              <div class="infobox-data"> <span class="infobox-data-number">$
                <?=($daypayment+$dayservice);?>
                </span>
                <div class="infobox-content">Today Earnings</div>
              </div>
            </div>
            <div class="infobox infobox-green  ">
              <div class="infobox-icon"> <i class="icon-shopping-cart"></i> </div>
              <div class="infobox-data"> <span class="infobox-data-number">$
                <?=($weekpayment+$weekservice);?>
                </span>
                <div class="infobox-content">This Week Earnings</div>
              </div>
            </div>
            <div class="infobox infobox-green  ">
              <div class="infobox-icon"> <i class="icon-shopping-cart"></i> </div>
              <div class="infobox-data"> <span class="infobox-data-number">$
                <?=($monthpayment+$monthservice);?>
                </span>
                <div class="infobox-content">This Month Earnings</div>
              </div>
            </div>
            <div class="span5">&nbsp;</div>
            <!--/span-->
          </div>
        </div>
        <?php }?>
        <?php $result=$mysqli->query('select * from applications where status="P" or status="Pr" ORDER BY createddate DESC LIMIT 10');
							

//exit;
?>
        <div class="row-fluid">
          <h3 class="header smaller lighter blue">Latest Applications</h3>
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
                <th>Accessed Country</th>
                <th class="hidden-480">Arrival Date</th>
                <th class="hidden-phone"> <i class="icon-time bigger-110 hidden-phone"></i> Email </th>
                <th>Applicants</th>
                <th>Locked</th>
                <th>Payment Status</th>
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
              <tr class="<?=$procText;?>">
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
                <?php //echo $ap['nationality'];?>
                <?php $result2=$mysqli->query('select country,price from visa_country where id='.$applications['nationality'].'');

?>
                <?php $nationality=$result2->fetch_array(MYSQLI_ASSOC);
?>
                <td><?php echo $applications['country_access'];?></td>
                <td class="hidden-480"><?=$applications['arrivaldate']?></td>
                <td class="hidden-phone"><?=$applications['email']?></td>
                <td><span class="label label-success" style="border-radius:50px">
                  <?=$applications['applicants']?>
                  </span></td>
                <td><?php if($applications['locked'] =="1" ){?>
                  <span class="label label-warning"><i class="icon-lock bigger-130"></i> <?php echo $username; ?></span>
                  <?php }?>
                </td>
                <td><?php switch($applications['status']){
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
                  <div class="hidden-phone visible-desktop action-buttons"> <a class="blue" href="applications.php?action=view&id=<?=$applications['id']?>"> <i class="icon-zoom-in bigger-130"></i> </a> <a class="green" href="applications.php?action=edit&id=<?=$applications['id']?>"> <i class="icon-pencil bigger-130"></i> </a> <a class="green" href="contacts.php?action=new&id=<?=$applications['id']?>"> <i class="icon-envelope bigger-130"></i> </a>
                    <?php if($applications['visapdf']==''){?>
                    <?php } else{?>
                    <?php if($applications['visasent'] =='1'){?>
                    <a class="btn btn-small btn-info" href="applications.php?action=sendvisa&id=<?=$applications['id']?>"> ReSend Visa </a>
                    <?php } else {?>
                    <a class="btn btn-small btn-success" href="applications.php?action=sendvisa&id=<?=$applications['id']?>"> Send Visa </a>
                    <?php } }?>
                  </div>
                  <div class="hidden-desktop visible-phone">
                    <div class="inline position-relative">
                      <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"> <i class="icon-caret-down icon-only bigger-120"></i> </button>
                      <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                        <li> <a href="applications.php?action=view&id=<?=$applications['id']?>" class="tooltip-info" data-rel="tooltip" title="View"> <span class="blue"> <i class="icon-zoom-in bigger-120"></i> </span> </a> </li>
                        <li> <a href="applications.php?action=edit&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-edit bigger-120"></i> </span> </a> </li>
                        <li> <a href="contacts.php?action=new&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-envelope bigger-120"></i> </span> </a> </li>
                        <li>
                          <?php if($applications['visapdf']==''){?>
                          <?php } else{?>
                          <?php if($applications['visasent'] =='1'){?>
                          <a href="applications.php?action=sendvisa&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete"> ReSend Visa </a>
                          <?php } else {?>
                          <a href="applications.php?action=sendvisa&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete"> Send Visa </a>
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
        </div>
        <?php //}?>
        <?php $result=$mysqli->query('select * from applications where status="C" OR visasent="1" ORDER BY createddate DESC LIMIT 10');
							

//exit;
?>
        <div class="row-fluid">
          <h3 class="header smaller lighter blue">Completed Applications</h3>
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
              <tr>
                <!--
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>-->
                <?php
											$lockid=$applications['lockUser'];
			$query = "SELECT username FROM users where id='$lockid' ";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$username=$total_pages['username']; /*<td><?=$applications['id']?></td>*/?>
                <td><?=$applications['invoiceid']?></td>
                <td class="hidden-480"><?php echo explode('?|',$applications['firstname'])[0]?> </td>
                <td><?=$applications['createddate']?></td>
                <td class="hidden-480"><?=$applications['arrivaldate']?></td>
                <td class="hidden-phone"><?=$applications['email']?></td>
                <td><span class="label label-success" style="border-radius:50px">
                  <?=$applications['applicants']?>
                  </span></td>
                <td><?php if($applications['locked'] =="1" ){?>
                  <span class="label label-warning"><i class="icon-lock bigger-130"></i> <?php echo $username; ?></span>
                  <?php }?>
                </td>
                <td><?php switch($applications['status']){
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
											$invoice_id=$applications['invoiceid'];
											//echo $invoice_id;
											$query="select invoice from visa_payments where invoice='$invoice_id'";
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
                  <div class="hidden-phone visible-desktop action-buttons"> <a class="blue" href="applications.php?action=view&id=<?=$applications['id']?>"> <i class="icon-zoom-in bigger-130"></i> </a> <a class="green" href="applications.php?action=edit&id=<?=$applications['id']?>"> <i class="icon-pencil bigger-130"></i> </a> <a class="green" href="contacts.php?action=new&id=<?=$applications['id']?>"> <i class="icon-envelope bigger-130"></i> </a>
                    <?php if($applications['visapdf']==''){?>
                    <?php } else{?>
                    <?php if($applications['visasent'] =='1'){?>
                    <a class="btn btn-small btn-info" href="applications.php?action=sendvisa&id=<?=$applications['id']?>"> ReSend Visa </a> <a target="_blank" class="green" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>"> <i class="icon-download bigger-130"></i> </a>
                    <?php } else {?>
                    <a class="btn btn-small btn-success" href="applications.php?action=sendvisa&id=<?=$applications['id']?>"> Send Visa </a>
                    <?php } }?>
                  </div>
                  <div class="hidden-desktop visible-phone">
                    <div class="inline position-relative">
                      <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"> <i class="icon-caret-down icon-only bigger-120"></i> </button>
                      <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                        <li> <a href="applications.php?action=view&id=<?=$applications['id']?>" class="tooltip-info" data-rel="tooltip" title="View"> <span class="blue"> <i class="icon-zoom-in bigger-120"></i> </span> </a> </li>
                        <li> <a href="applications.php?action=edit&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-edit bigger-120"></i> </span> </a> </li>
                        <li> <a href="contacts.php?action=new&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-envelope bigger-120"></i> </span> </a> </li>
                        <li>
                          <?php if($applications['visapdf']==''){?>
                          <?php } else{?>
                          <?php if($applications['visasent'] =='1'){?>
                          <a href="applications.php?action=sendvisa&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete"> ReSend Visa </a> <a target="_blank" class="green" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>"> <i class="icon-download bigger-130"></i> </a>
                          <?php } else {?>
                          <a href="applications.php?action=sendvisa&id=<?=$applications['id']?>" class="tooltip-success" data-rel="tooltip" title="Delete"> Send Visa </a> <a target="_blank" class="green" href="applications.php?action=downloadvisa&id=<?=$applications['id']?>"> <i class="icon-download bigger-130"></i> </a>
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
        </div>
        <?php //}?>
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
<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.easy-pie-chart.min.js"></script>
<script src="assets/js/jquery.sparkline.min.js"></script>
<script src="assets/js/flot/jquery.flot.min.js"></script>
<script src="assets/js/flot/jquery.flot.pie.min.js"></script>
<script src="assets/js/flot/jquery.flot.resize.min.js"></script>
<!--ace scripts-->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<!--inline scripts related to this page-->
<script type="text/javascript">
			$(function() {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
				});
			
			
			
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaings",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			
			  var $tooltip = $("<div class='tooltip top in hide'><div class='tooltip-inner'></div></div>").appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
			
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').slimScroll({
					height: '300px'
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
				
			
			})
		</script>
</body>
</html>
