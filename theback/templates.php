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
						<li class="active">Templates</li>
					</ul><!--.breadcrumb-->

					<div class="nav-search" id="nav-search">
						<form class="form-search" />
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="icon-search nav-search-icon"></i>
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
							New Template
							<small>
								<i class="icon-double-angle-right"></i>
								New Template
							</small>
						</h1>
					</div><!--/.page-header-->
					<?php if(isset($_POST['submit'])){
					$templatename= $_POST['templatename'];
					$templateData=$_POST['templateData'];
					$users=$_POST['users'];
					//$countrylist= explode("\n",$country);
					//print_r($countrylist);
						$query = "INSERT INTO email_templates VALUES ('','{$templatename}','{$templateData}','1','{$users}' )";
						if($mysqli->query($query)){					
					echo "Templates addeded";
					 echo '<script type="text/javascript">';
        echo 'window.location.href="templates.php";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=templates.php" />';
        echo '</noscript>';
		} else echo $mysqli->error;

					
					}?>
														<form class="form-horizontal" action="templates.php?action=new" method="post" />
								<div class="control-group">
									<label class="control-label" for="form-field-1">Template Name</label>

									<div class="controls form-static">
										<input name="templatename" id="templatename" >
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Template Data</label>

									<div class="controls form-static">
										<textarea name="templateData" rows="10" cols="30" id="neweditor" class="span12"></textarea>
                                        {NAME} - Display name ,{INVOICEID} - Display invoice Id(it will display for only new applications)<br/>
                                        {PAYMENTLINK} - Payment Link , {DOWNLOADLINK} - Download Link
									</div>
                                    
								</div>
                                	<div class="control-group">
<label class="control-label" for="form-field-1">Users Template</label>
									<div class="controls form-static">
										<select name="users">
                                        <option value="1"> yes(Users Message)</option>
                                        <option value="0">No(Normal Mesasge)</option>
                                        
                                        </select>
									</div>
								</div>
                                                                    	<div class="control-group">
									

									<div class="controls form-static">
									<input type="submit" name="submit" class="btn btn-success">
									</div>
								</div>
								
								</form>
							<?php break;
							 case 'edit': ?>
							 <div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Templates Edit
							<small>
								<i class="icon-double-angle-right"></i>
								Templates Edit
							</small>
						</h1>
					</div><!--/.page-header-->
										<?php if(isset($_POST['update'])){
					$id=$_POST['id'];
					$templatename= $_POST['templatename'];
					$templateData=$_POST['templateData'];
					$users=$_POST['users'];
$mysqli->query("Update email_templates Set templatename = '$templatename', templateData='$templateData',users='$users'
Where id = $id
");
echo "Template Edit Successfully";
//header ("Location: application.php");
}?>
							 							 <?php 
							 $id=$_REQUEST['id'];
							 $result=$mysqli->query("select * from email_templates where id={$id}");
$ap=$result->fetch_array(MYSQLI_ASSOC);
?>
														<form class="form-horizontal" action="templates.php?action=edit" method="post" />
								<div class="control-group">
									<label class="control-label" for="form-field-1">Template Name</label>

									<div class="controls form-static">
										<input type="text" name="templatename" id="templatename" value="<?=$ap['templatename']?>" ></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Template Data</label>

									<div class="controls form-static">
                                    <textarea name="templateData" rows="10" cols="30" id="neweditor" class="span12"><?=$ap['templateData']?></textarea>
										{NAME} - Display name ,{INVOICEID} - Display invoice Id(it will display for only new applications)<br/>
                                        {PAYMENTLINK} - Payment Link , {DOWNLOADLINK} - Download Link
									</div>
                                    
								</div>
                                   	<div class="control-group">
									<label class="control-label" for="form-field-1">Users</label>

									<div class="controls form-static">
										<select name="users">
                                        <option value="1" <?=($ap['users']=='1')?'selected':'';?>>Yes</option>
                                        <option value="0" <?=($ap['users']=='0')?'selected':'';?>>No</option>
                                        </select>
									</div>
								</div>
                                    	<div class="control-group">

									<div class="controls form-static">
										<input type="hidden" name="id" value="<?=$id?>">
								<input type="submit" name="update" value="update" class="btn btn-success">
									</div>
								</div>
								
								</form>
							
							<?php break;
							 case 'delete': ?>
							 <?php $id=$_REQUEST['id'];
							 $query="delete from email_templates where id=".$id;
							 if($mysqli->query($query)){
							 echo "Template was deleted";
								echo '<script type="text/javascript">';
								echo 'window.location.href="templates.php";';
								echo '</script>';
								echo '<noscript>';
								echo '<meta http-equiv="refresh" content="0;url=templates.php" />';
								echo '</noscript>';
							 }?>
							<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Template Delete
							<small>
								<i class="icon-double-angle-right"></i>
								Template User
							</small>
						</h1>
					</div><!--/.page-header-->
							<?php break;?>
							<?php }
							} else {
							$result=$mysqli->query('select * from email_templates ORDER BY id ASC');
?>
<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Templates
							<small>
								<i class="icon-double-angle-right"></i>
								All Templates
							</small>
						</h1>
					</div><!--/.page-header-->
					<a href="templates.php?action=new" class="btn btn-primary">Add New</a>
							<div class="row-fluid">
								<h3 class="header smaller lighter blue">List of Users</h3>

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
											<th>Template Name</th>
											<th>Template Data</th>
											<th class="hidden-480">Status</th>
                                            

											<th class="hidden-phone">
												<i class="hidden-phone">Users</i>
												
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
												<?=$value['templatename']?>
											</td>
											<td><?=$value['templateData']?></td>
											<td class="hidden-480"><?=$value['status']?></td>
											<td class="hidden-phone"><?=$value['users']=='1'?'Yes':'No';?></td>

											<td class="hidden-480">
												<span class="label label-warning"></span>
											</td>

											<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">
													
													<a class="green" href="templates.php?action=edit&id=<?=$value['id']?>">
														<i class="icon-pencil bigger-130"></i>
													</a>

													<a class="red" href="templates.php?action=delete&id=<?=$value['id']?>">
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
																<a href="templates.php?action=edit&id=<?=$value['id']?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																	<span class="green">
																		<i class="icon-edit bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="templates.php?action=delete&id=<?=$value['id']?>" class="tooltip-error" data-rel="tooltip" title="Delete">
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
                <script src="assets/css/wysihtml5-0.3.0.min.js"></script>
		<script src="assets/css/prettify.js"></script>
		<script src="assets/css/bootstrap-wysihtml5.js"></script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
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
        <script type="text/javascript">
	jQuery('#neweditor').wysihtml5();
	jQuery('#replyeditor').wysihtml5();
</script>
	</body>
</html>
