<?php include('header.php');
@ini_set('display_errors',true);?>

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
						<li class="active">Countries</li>
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
<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							New Country
							<small>
								<i class="icon-double-angle-right"></i>
								New Country
							</small>
						</h1>
					</div><!--/.page-header-->
					<?php if(isset($_POST['submit'])){
					$country= $_POST['country'];
					$price=$_POST['price'];
					$countrylist= explode("\n",$country);
					//print_r($countrylist);
					foreach($countrylist as $countryli){
						$query = "INSERT INTO visa_country(country,price,active) VALUES ('{$countryli}','{$price}','1' )";
						$mysqli->query($query);						
					}
					echo "Countries addeded";
					 echo '<script type="text/javascript">';
        echo 'window.location.href="applications.php";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=applications.php" />';
        echo '</noscript>';

					
					}?>
														<form class="form-horizontal" action="countries.php?action=new" method="post" />
								<div class="control-group">
									<label class="control-label" for="form-field-1">Country name</label>

									<div class="controls form-static">
										<textarea name="country" id="country" ></textarea>
										<p class="help">Add multiple countries using line by line</p>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Price</label>

									<div class="controls form-static">
										$<input name="price" id="name">
									</div>
								</div>
								<input type="submit" name="submit">
								</form>
							<?php break;
							 case 'edit': ?>
							 <div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Country  Edit
							<small>
								<i class="icon-double-angle-right"></i>
								Country Edit
							</small>
						</h1>
					</div><!--/.page-header-->
										<?php if(isset($_POST['update'])){
										$country= $_POST['country'];
										$id=$_POST['id'];
										$price=$_POST['price'];

$mysqli->query("Update visa_country Set country = '$country', price='$price'
Where id = $id
");
echo "Country Edit Successfully";
//header ("Location: application.php");
}?>
							 							 <?php 
							 $id=$_REQUEST['id'];
							 $result=$mysqli->query("select * from visa_country where id={$id}");
$ap=$result->fetch_array(MYSQLI_ASSOC);
?>
														<form class="form-horizontal" action="countries.php?action=edit" method="post" />
								<div class="control-group">
									<label class="control-label" for="form-field-1">Country name</label>

									<div class="controls form-static">
										<input type="text" name="country" id="country" value="<?=$ap['country']?>" ></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Price</label>

									<div class="controls form-static">
										$<input name="price" id="price" value="<?=$ap['price']?>" >
									</div>
								</div>
								<input type="hidden" name="id" value="<?=$id?>">
								<input type="submit" name="update" value="update">
								</form>
							
							<?php break;
							 case 'delete': ?>
							 <?php $id=$_REQUEST['id'];
							 $query="delete from visa_country where id=".$id;
							 if($mysqli->query($query)){
							 echo "country was deleted";
								echo '<script type="text/javascript">';
								echo 'window.location.href="countries.php";';
								echo '</script>';
								echo '<noscript>';
								echo '<meta http-equiv="refresh" content="0;url=countries.php" />';
								echo '</noscript>';
							 }?>
							<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Applications Delete
							<small>
								<i class="icon-double-angle-right"></i>
								<?=$ap['firstname']?> Visa Application
							</small>
						</h1>
					</div><!--/.page-header-->
							<?php break;?>
							<?php }
							} else {
	/*
		Place code to connect to your DB here.
	*/

	$tbl_name="visa_country";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$result1 = $mysqli->query($query);
	$total_pages = $result1->fetch_assoc();
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "countries.php"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name ORDER BY country ASC LIMIT $start, $limit";
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
				$pagination.= "<li><a href=\"#\">...</a></li>";
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
				$pagination.= "<li><a href=\"#\">...</a></li>";
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

							
							//$result=$mysqli->query('select * from visa_country ORDER BY country ASC');
?>
<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Countries
							<small>
								<i class="icon-double-angle-right"></i>
								All Countries
							</small>
						</h1>
					</div><!--/.page-header-->
					<a href="countries.php?action=new" class="btn btn-primary">Add New</a>
							<div class="row-fluid">
								<h3 class="header smaller lighter blue">List of Applications</h3>

								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<!--<th class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</th>-->
											<th>Id</th>
											<th>Country</th>
											<th>Price</th>
											<th class="hidden-480">Status</th>

											<th class="hidden-phone">
												<i class="icon-time bigger-110 hidden-phone"></i>
												
											</th>
											<th class="hidden-480"></th>

											<th>Actions</th>
										</tr>
									</thead>

									<tbody>
									<?php //while ($applications) {
									 while($value=$result->fetch_assoc()){?>
										<tr>
										<!--
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>-->
											<td><?=$value['id']?>

											<td>
												<?=$value['country']?>
											</td>
											<td><?=$value['price']?></td>
											<td class="hidden-480"><?=$value['active']?></td>
											<td class="hidden-phone"></td>

											<td class="hidden-480">
												<span class="label label-warning"></span>
											</td>

											<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">
													
													<a class="green" href="countries.php?action=edit&id=<?=$value['id']?>">
														<i class="icon-pencil bigger-130"></i>
													</a>

													<a class="red" href="countries.php?action=delete&id=<?=$value['id']?>">
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
																<a href="countries.php?action=edit&id=<?=$value['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																	<span class="green">
																		<i class="icon-edit bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="countries.php?action=delete&id=<?=$value['id']?>" class="tooltip-error" data-rel="tooltip" title="Delete">
																	<span class="red">
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

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			$(function() {
				/*var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, null, null,
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
			*/
			
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
			})
		</script>
	</body>
</html>
