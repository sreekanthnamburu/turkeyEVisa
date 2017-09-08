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

						<li class="active"><a href="#">Applications</a></li>

					</ul><!--.breadcrumb-->



					<div class="nav-search" id="nav-search">

						<form class="form-search" />

							<span class="input-icon">

							</span>

						</form>

					</div><!--#nav-search-->

				</div>


<form class="form-horizontal" method="post" action="delete.php?action=delete1"  enctype="multipart/form-data" />

								<div class="control-group">

								<table width="381" border="0">
								  <tr>
									<td width="98"><div align="center"><strong>Id </strong></div></td>
									<td width="167"><div align="center"><strong>File Name </strong></div></td>
									<td width="43"><div align="center"><strong>Invoice No</strong></div></td>
								  </tr>
								     <?php 

//$result = mysql_query("SELECT id  FROM upload_images where invoiceid='$message_titles;'");

$id = $_GET['id'];
$image= $link_address;

$result =mysql_query("SELECT * FROM upload_images where id='&id' and image='$image' ");
               $row =mysql_fetch_array($result);
			       $id=$row['id'];
				   $link_address=$row['image'];
				   $invoice_no=$row['invoiceid'];
			
$delete =$mysqli->query("DELETE from upload_images WHERE image=' $link_address'");	   
				  
	header("applications.php");				

?>
								  <tr>
									<td><?=$id;?></td>
									<td> <?=$link_address?></td>
									<td><?=$invoice_no;?></td>
								
								  </tr>
								
								</table>	

								</div>

								<input type="hidden" name="id" value="<?=$id?>">

								<p class="alert alert-danger">Are you sure want to Delete</p>

								<input type="submit" name="delete" value="Delete" class="btn btn-danger">

								</form>
								
								
									<!-- download delete -->
								
								