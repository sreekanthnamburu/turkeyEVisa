<style>
td {
    color: black;
    font-size: 14px;
}
</style>
<section id="top" class=" wow bounceInUp animated">
<main role="main" id="content" class="content_full_width">	
<div id="contact-form-8801" role="form">
            <?php if($visa_status){?>
            <table align="right"  style="margin-right:50px;" class="container">
              <tr><td width="311" class="frame"><h3>Check Status</h3></td>
			  <td width="748"></td>
			  </tr>
			  <tr>
                <td><b>Application Reference Number :</b></td>
                <td><b><?php echo $visa_status['invoiceid']?></b></td>
              <tr>
                <td><b>Passport Number :</b></td>
                <td><b><?php $passport=explode('?|',$visa_status['passportnumber']);
				//print_r($passport);
				for($i=0;$i<sizeof($passport);$i++){
				echo $passport[$i].",";
				}?>
				</b></td>
              <tr>
                <td><b>Visa Status :</b></td>
                <td><b>
                  <?php switch($visa_status['status']){										
	case "P":											echo '<span class="label label-danger">Pending</span>';											break;											case "Pr":											echo '<span class="label label-warning">Processing</span>';											break;																						case "C":											echo '<span class="label label-success">Completed</span>';											break;																						case "A":											echo '<span class="label label-info">Approved</span>';											break;											}?>
                  </b> </td>
              </tr>
			<?php if(($visa_status['status'])=='C' ||($visa_status['status'])=='A'){?>
			<tr>
			<td><h3 style="color: green;">Application Successful</h3></td>
			</tr>
			<tr>
			<td colspan="2">Congratulations! Your e-Visa application for Turkey has been approved by the Turkish Embassy. Download your e-Visa by clicking the below download button, print it and carry whilst travelling to Turkey. A PDF reader must be installed on your computer to open your e-Visa. Visit<a href='https://get.adobe.com/reader/' target='_blank'>  http://www.adobe.com </a>to download PDF reader for free.</td>
			</tr>
	
			<tr>
			<td colspan="2"> <a target="_blank"  href="<?=$baseurl;?>/uploads/<?=$visa_status['visapdf']?>">
          
          <i style='
	background-color: #5cb85c;
    border: medium none;
    border-radius: 0;
    box-shadow: 6px 6px 0 #efe9e9;
    color: #fff;
    font-size: 14px;
    font-weight: 900;
    line-height: 32px;
    margin-right: 13px;
    padding: 10px 5px;
    transition: all 0.2s ease 0s;' class="icon-download"> Download your e-Visa </i>      </a>
	<a target="_blank"  href="<?=$baseurl;?>/application/invoice/<?=$visa_status['invoiceid'];?>">
            
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
            
          </a></td>
			</tr>
			 <?php }?>	
            </table>
			<br/>
			<br/><br />
<br />

			<div align="left">
			
		<br />
			<p>
			
			</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br />
  <br />
</p>
<p>&nbsp;</p>
<p><br/>
  <br/>
      </p>
		 
<p> </p>
<p>&nbsp;</p>
</section>
			</div>
            <?php echo $message_content;?>
            <?php } else {?>
            <form class="input-blocks clearfix" id="statusform" method="post" action="<?=base_url();?>index.php/application/check-status">
              <?php if(validation_errors()){?>
              <div class="error"> <?php echo validation_errors(); ?>
            <?php echo $message_content;?> </div>
              <?php }?>
            <?php echo $message_content;?>
             
      
             
			  
			  <!-- Teaser start --> <style>  #ima{  float: right;    margin-right: -36px;    margin-top: -78px;  }  </style>
 
        <!-- Check status start -->
		  <div class=" col-md-12 title">         
				   
				        <section style="visibility: visible; animation-name: slideInLeft;" id="newsletter" class="wow slideInLeft animated" data-wow-offset="300">    
		<div class="container">        
		<div class="col-md-12">    
		<div class="location-select">          
        <div class="row">                
		<div class="col-md-4">              
        <h2 style="color:white;text-align:right; margin-top:18px;margin-right:25px;">Check Visa Status <i class="glyphicon glyphicon-chevron-right"></i></h2>        
		</div>         
		<div class="col-md-4 statusinput">   
		<input type="text" name="applicationnumber" class="form-control input-lg" id="applicationnumber" placeholder="Enter Application/Reference Number" required="">  
		   
		</div>      
		<div class="col-md-3 statusinput"><input type="submit" name="checkstatus" class="btn btn-primary btn-lg btn-block" value="Check Status">
		
		</div>      
		</div>   
		</div>    
		</div>       
		</div>           
		</section>
		</div>
        <!-- Check status end -->
			  
			  
			  
			  
            </form>
            <?php }?>
    </div>
             </main><!-- END main #content -->
            </section><!-- END main-area -->