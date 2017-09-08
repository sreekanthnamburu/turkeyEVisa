
<section id="top" class="container">
<main role="main" id="content" class="content_full_width">	
<div id="contact-form-8801" role="form">
            <?php if($visa_status){?>
            <table align="left">
              <tr><td width="311" class="frame"><h2>Check Status</h2></td>
			  <td width="748"></td>
			  </tr>
			  <tr>
                <td><b>Application Reference Number *</b></td>
                <td><b><?php echo $visa_status['invoiceid']?></b></td>
              <tr>
                <td><b>Passport Number</b></td>
                <td><b><?php $passport=explode('?|',$visa_status['passportnumber']);
				//print_r($passport);
				for($i=0;$i<sizeof($passport);$i++){
				echo $passport[$i].",";
				}?>
				</b></td>
              <tr>
                <td><b>Visa Status</b></td>
                <td><b>
                  <?php switch($visa_status['status']){											case "P":											echo '<span class="label label-danger">Pending</span>';											break;											case "Pr":											echo '<span class="label label-warning">Processing</span>';											break;																						case "C":											echo '<span class="label label-success">Completed</span>';											break;																						case "A":											echo '<span class="label label-info">Approved</span>';											break;											}?>
                  </b> </td>
              </tr>
			<tr>
			<td><h2>Application Success<span></span></h2></td>
			<td></td>
			</tr>
			<tr>
			<td colspan="2">Congratulations!! Your application for Turkey electronic Visa is approved. Download your e-Visa by clicking the below download button, print it and carry while travelling to Turkey
A PDF reader must be installed on your computer to open your e-Visa. Visit http://www.adobe.com to download PDF reader for free.</td>
			</tr>
			
            </table>
			<br/>
			<div>
			
		<br />
			<p>
			
			</p>
<p><br /><a target="_blank"  href="<?=$baseurl;?>/uploads/<?=$visa_status['visapdf']?>" download="<?=$baseurl;?>/uploads/<?=$visa_status['visapdf']?>" download>

														<i style='
	background-color: #c61334;
    border: medium none;
    border-radius: 0;
    box-shadow: 6px 6px 0 #efe9e9;
    color: #fff;
    font-size: 18px;
    font-weight: 900;
    line-height: 32px;
    margin-right: 13px;
    padding: 0px 5px;
    transition: all 0.2s ease 0s;' class="icon-download"> Download Visa </i>

													</a><a target="_blank"  href="<?=$baseurl;?>/application/invoice/<?=$visa_status['invoiceid'];?>">

														<i style='
	background-color: #c61334;
    border: medium none;
    border-radius: 0;
    box-shadow: 6px 6px 0 #efe9e9;
    color: #fff;
    font-size: 18px;
    font-weight: 900;
    line-height: 32px;
    margin-right: 13px;
    padding: 0px 5px;
    transition: all 0.2s ease 0s;' class="icon-download"> Payment Receipt </i>

													</a></p>
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
        <h2 style="color:white;text-align:right; margin-top:18px;margin-right:25px;">Check Visa Status &#x2771;</h2>        
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