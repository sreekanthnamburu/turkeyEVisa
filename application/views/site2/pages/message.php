<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {color: #FFFFFF; font-weight: bold; }
-->
</style>
<section id="top" class="container">
<main role="main" id="content" class="content_full_width">										               <h3><?=$message_title?></h3>

<?php echo $message_content;?>

<?php /*?> <?php /*?>  <?php echo $message_content1;?>  
   
 	<table width="443"  border="1">
								  <tr>
								   <!-- <td height="28" bgcolor="#333333"><div align="center" class="style1"><strong>Applicant </strong></div></td>-->
									<td width="86" bgcolor="#333333"><div align="center" class="style2">Visa File Name </div></td>
									<td width="131" bgcolor="#333333"><div align="center" class="style2">Download </div></td>
								  </tr>
   <?php 

//$result = mysql_query("SELECT id  FROM upload_images where invoiceid='$message_titles;'");


$result = mysql_query("SELECT * FROM upload_images where invoiceid='$message_titles'");
//$result = mysql_query("SELECT * FROM upload_images, applications WHERE upload_images.$message_titles = applications.$message_titles");
                while($row = mysql_fetch_array($result)){
				  // $applicant=$row['applicants'];
				   $link_address=$row['image'];
				   $invoice=$row['invoiceid'];
				   
					//echo base_url();
			//echo "<a href='.base_url().uploads/$link_address'>Link</a>";
			//echo "<a href='".base_url()."$link_address'>visa</a>";
			//echo  "<a  target='_blank' class='btn' href='".base_url()."uploads/$link_address'> Download Visa</a>";
				//	echo "<br />";
					
					?>
					<tr>
					
					 <!-- <td> 
                                <b><h6 align="center" style="color:#0000CC">   </h6></b>																	</td>-->
									<td align="center"><?=$link_address?>   </td>
									<td align="center">
									    <a   style='
	background-color: #5cd142;
    border: medium none;
    border-radius: 0;
    box-shadow: 6px 6px 0 #efe9e9;
    color: #fff;
    font-size: 18px;
    font-weight: 900;
    line-height: 32px;
    margin-right: 13px;
    margin-left: 13px;
    padding: 0px 5px ;
    transition: all 0.2s ease 0s;' class='btn' href='<?=$baseurl;?>/uploads/<?=$link_address?>' type='application/octet-stream'  download target='_blank'> Download your e-Visa</a>
									</td>
	  </tr>
			<?php }?>
</table>
<br/>
<a target="_blank"  href="<?=$baseurl;?>/application/invoice/<?=$invoice?>">
            
          <i style='
	background-color: #716d6e;
    border: medium none;
    border-radius: 0;
    box-shadow: 6px 6px 0;
    color: #fff;
    font-size: 14px;
    font-weight: 900;
    line-height: 40px;
    margin-right: 15px;
    padding: 10px 9px;
    transition: all 0.2s ease 0s;' class="icon-download"> Payment Receipt </i>
            
          </a>
<?php */?></section>
         

          