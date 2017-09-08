    <!-- BEGIN CONTENT WRAPPER -->
	<style>
	td.tdfirst{
    background: none repeat scroll 0 0 #f7f7f7;
    margin-right: 10px;
    padding: 6px 10px 6px 12px;
    position: relative;;
	font-size:13px;
	    border-bottom: 1px solid #f4f4f4;
    text-align: right;
    vertical-align: middle;
    width: 50%;
	font-weight:bold}

tr td.tdsecond{
    float: left;
		font-size:13px;
    width: 80%;
    border-bottom: 1px solid #f4f4f4;
    border-radius: 0 10px 10px 0;
    padding: 6px 0 6px 6px;
    position: relative;
    vertical-align: middle;
	background:#f7f7f7;
}
table{
width:100%}

tr{
    min-height: 22px;
    padding: 5px 0;
    width: 100%;
}</style>
    
         
         <!-- ***************** - Main Content Area - ***************** -->
         <div id="main">
            <div class="main-area">
            
            
            
            
            
            
              <!-- ////////////////////////////////////////////////////////// -->
              <!-- ***************** - Content Start Here - ***************** -->
              <!-- ////////////////////////////////////////////////////////// -->
              
              
              <!-- ***************** - Breadcrumbs Start Here - ***************** -->
				<div class="tools">
					<span class="tools-top"></span>
					<div class="frame">
						<h1>Turkish Application Form</h1>
					</div><!-- END frame -->
				</div><!-- END tools -->
                  
                  
                  <main role="main" id="content" class="content_full_width">
               
      <!--<h3>Get Started! It only takes a few minutes</h3>-->
              <!-- Register Form -->													<div class="step-progress">
			<ul>
				<li class="active">&nbsp;</li>
				<li class="active">&nbsp;</li>
				<li class="active">&nbsp;</li>
			</ul>
		</div>
        <div class="step-label">
			<ul>
				<li>1. Visa Options</li>
				<li>2. Applicant Details</li>
				<li class="active"> <span class="fa fa-check green"></span>3. Review &amp; Payment</li>
			</ul>
		</div><div class="one_half tt_column">
              <form class="reg-form input-blocks clearfix" id="visaform" validate="no-validate" name="visaform" action="<?php echo BASETHEMEPATH;?>index.php/application/appsubmit" method="post"  >
                <h3 class="alt-title">Please review and verify your Turkey e-Visa application submission below.</h3>
				<table>
				<tr><td class="tdfirst">
				Nationality
				</td>
				<td class="tdsecond">
				<?=$nationalityname?>
				<input type="hidden" name="nationality" value="<?=$nationality?>" />
				</td>
				<tr>
				<td class="tdfirst">
				Travel Document
				</td><td class="tdsecond">
				<?=$travaldocument?>
				<input type="hidden" name="travaldocument" value="<?=$travaldocument?>" />
				</td></tr><tr>
				<td class="tdfirst">
				Arrival Date
				</td><td class="tdsecond">
				  <?=$arrivaldateday?>.<?=$arrivaldatemonth?>.<?=$arrivaldateyear?>
                  <input type="hidden" name="arrivaldate" value="<?=$arrivaldateday?>.<?=$arrivaldatemonth?>.<?=$arrivaldateyear?>" />
                  <input type="hidden" name="arrivaldatemonth" value="<?=$arrivaldatemonth?>" />					
                  <input type="hidden" name="arrivaldateday" value="<?=$arrivaldateday?>" />					
                  <input type="hidden" name="arrivaldateyear" value="<?=$arrivaldateyear?>" />
				</td></tr>
<?php if($TSD !=''){?>				<tr>
				<td class="tdfirst">
				Type of Supporting Document
				</td><td class="tdsecond">
				<?=$TSD='1'?"Visa":"Residence Permit"?>
				<input type="hidden" name="TSD" value="<?=$TSD?>" />
				</td></tr>
				<tr>
				<td class="tdfirst">
				Country that issued Visa/Residence Permit
				</td><td class="tdsecond">
				<?=$CountryVisaPermit?>
				<input type="hidden" name="CountryVisaPermit" value="<?=$CountryVisaPermit?>" />
				</td></tr>
				
				<?php if($VisaPermitExpire !='1'){?>
				<tr>
				<td class="tdfirst">
				Visa/Residence Permit Expiration Date:*
				</td><td class="tdsecond">
                <?=$VisaPermitExpireDateday?>.<?=$VisaPermitExpireDatemonth?>.<?=$VisaPermitExpireDateyear?>
                <input type="hidden" name="VisaPermitExpireDate" value="<?=$VisaPermitExpireDateday?>.<?=$VisaPermitExpireDatemonth?>.<?=$VisaPermitExpireDateyear?>" />
                  <input type="hidden" name="VisaPermitExpireDatemonth" value="<?=$VisaPermitExpireDatemonth?>" />					
                  <input type="hidden" name="VisaPermitExpireDateday" value="<?=$VisaPermitExpireDateday?>" />					
                  <input type="hidden" name="VisaPermitExpireDateyear" value="<?=$VisaPermitExpireDateyear?>" />	
				</td></tr>
				<?php }?>
				<input type="hidden" name="VisaPermitExpire" value="<?=$VisaPermitExpire?>" />
<?php } else {?>
<input type="hidden" name="VisaPermitExpireDate" value="" />
<input type="hidden" name="VisaPermitExpire" value="" />
<input type="hidden" name="CountryVisaPermit" value="" />
<input type="hidden" name="TSD" value="" /><?php }?>

<?php for($i=0;$i<$_POST['applicants'];$i++){?>
<tr><td colspan="2"><h3 class="apphead">Applicant <?=$i+1?> Details</h3></td></tr><tr>
				<td  colspan="2"><table><tr><td class="tdfirst">
				FirstName
				</td><td class="tdsecond">
				<?=$firstname[$i]?>
				<input type="hidden" name="firstname[]" value="<?=$firstname[$i]?>" />
				</td></tr><tr><td class="tdfirst">
				Surname
				</td><td class="tdsecond">
				<?=$lastname[$i]?>
				<input type="hidden" name="lastname[]" value="<?=$lastname[$i]?>" />
				</td></tr><tr>
				<td class="tdfirst">
				Date of Birth
				</td><td class="tdsecond">
				  <?=$dobday[$i]?>.<?=$dobmonth[$i]?>.<?=$dobyear[$i]?>
                  <input type="hidden" name="dob[]" value="<?=$dobday[$i]?>.<?=$dobmonth[$i]?>.<?=$dobyear[$i]?>" />
                  <input type="hidden" name="dobmonth[]" value="<?=$dobmonth[$i]?>" />					
                  <input type="hidden" name="dobday[]" value="<?=$dobday[$i]?>" />					
                  <input type="hidden" name="dobyear[]" value="<?=$dobyear[$i]?>" />
				</td></tr><tr>
				<td class="tdfirst">
				Place Of Birth
				</td><td class="tdsecond">
				<?=$placeofbirth[$i]?>
				<input type="hidden" name="placeofbirth[]" value="<?=$placeofbirth[$i]?>" />
				</td></tr><tr>
				<td class="tdfirst">
				Mother Name
				</td><td class="tdsecond">
				<?=$mothername[$i]?>
				<input type="hidden" name="mothername[]" value="<?=$mothername[$i]?>" />
				</td></tr><tr>
				<td class="tdfirst">
				Father Name
				</td><td class="tdsecond">
				<?=$fathername[$i]?>
				<input type="hidden" name="fathername[]" value="<?=$fathername[$i]?>" />
				</td></tr><tr>
				<td class="tdfirst">
				Passport Number
				</td><td class="tdsecond">
				<?=$passportnumber[$i]?>
				<input type="hidden" name="passportnumber[]" value="<?=$passportnumber[$i]?>" />
				</td></tr><tr>
				<td class="tdfirst">
				Passport Issue Date
				</td><td class="tdsecond">
				<?=$pidday[$i]?>.<?=$pidmonth[$i]?>.<?=$pidyear[$i]?>
                <input type="hidden" name="pid[]" value="<?=$pidday[$i]?>.<?=$pidmonth[$i]?>.<?=$pidyear[$i]?>" />
                  <input type="hidden" name="pidmonth[]" value="<?=$pidmonth[$i]?>" />					
                  <input type="hidden" name="pidday[]" value="<?=$pidday[$i]?>" />					
                  <input type="hidden" name="pidyear[]" value="<?=$pidyear[$i]?>" />	
				</td></tr><tr>
				<td class="tdfirst">
				Passport Expiry Date
				</td><td class="tdsecond">
					<?=$pedday[$i]?>.<?=$pedmonth[$i]?>.<?=$pedyear[$i]?>
                    <input type="hidden" name="ped[]" value="<?=$pedday[$i]?>.<?=$pedmonth[$i]?>.<?=$pedyear[$i]?>" />
                  <input type="hidden" name="pedmonth[]" value="<?=$pedmonth[$i]?>" />					
                  <input type="hidden" name="pedday[]" value="<?=$pedday[$i]?>" />					
                  <input type="hidden" name="pedyear[]" value="<?=$pedyear[$i]?>" />	
				</td></tr></table></td></tr>
                <?php } ?><tr>
				<td class="tdfirst">
				Email Address
				</td><td class="tdsecond">
				<?=$email?>
				<input type="hidden" name="email" value="<?=$email?>" />
				</td></tr><tr>
				<td class="tdfirst">
				Phone Number
				</td><td class="tdsecond">
				<?=$phone?>
				<input type="hidden" name="phone" value="<?=$phone?>" />
				</td></tr><tr>
				<td class="tdfirst">
				Address
				</td><td class="tdsecond">
				<?=$address?>
				<input type="hidden" name="address" value="<?=$address?>" />
				</td></tr>
                <input type="hidden" name="applicants" value="<?=$_POST['applicants']?>" />
				<?php /*<tr>
				<td class="tdfirst">
				State
				</td><td class="tdsecond">
				<?=$state?>
				<input type="hidden" name="state" value="<?=$state?>" />
				</td></tr><tr>
				<td class="tdfirst">
				City
				</td><td class="tdsecond">
				<?=$city?>
				<input type="hidden" name="city" value="<?=$city?>" />
				</td></tr> <tr>
				<td class="tdfirst">
				Country
				</td><td class="tdsecond">
				<?=$countryname?>
				<input type="hidden" name="country" value="<?=$country?>" />
				</td></tr>
				<?php /*<tr>
				<td class="tdfirst">
				Street Address
				</td><td class="tdsecond">
				<?=$street?>
				<input type="hidden" name="street" value="<?=$street?>" />
				</td></tr><tr>
				<td class="tdfirst">
				Zipcode
				</td><td class="tdsecond">
				<?=$zipcode?>
				<input type="hidden" name="zipcode" value="<?=$zipcode?>" />
				</td></tr>
				<?php */?></table>
                <!-- Job -->
                <!--<div class="field clearfix spaced">
											<div class="grid_2 alpha">
												<div class="radio">
													<input type="radio" name="reg-job" id="reg-job-1" checked> <label for="reg-job-1">Hire a Babysitter</label>
												</div>
											</div>
											<div class="grid_2 omega">
												<div class="radio">
													<input type="radio" name="reg-job" id="reg-job-2"> <label for="reg-job-2">Apply for care jobs</label>
												</div>
											</div>
										</div>-->
                                        <?php if($_POST['processingtime'] =="1"){ $sp="45";}else if($_POST['processingtime'] =="2"){$sp="65";} else{ $sp="100";};?>
                <!-- Job / End -->				<h3>Total Visa Cost : <b>$<?=$_POST['applicants']*($nationality_price+$sp)?></b></h3>			<input type="hidden" value="<?=$nationality_price?>" name="price" /><input type="hidden" value="<?=$invoiceid?>" name="invoiceid" />
                <input type="hidden" value="<?=$_POST['processingtime']?>" name="processingtime" />
				<input type="hidden" value="2" name="step" />
           <button type="submit" formaction="<?=base_url();?>index.php/application?step=1" class="ka_button small_button small_cherry"><i class="fa fa-edit"></i>Click To Edit</button> <button type="submit" name="appreview" class="ka_button small_button small_forestgreen"><i class="fa fa-credit-card"></i> Click To Pay</button>
              </form></div>
			  <div class="one_half_last tt_column">
              <div class="right">
<ul>
	<li><center><h1 style="font-weight:bold;color:#df1f26;margin:0px 0px 5px 0px">Summary</h1></center></li>
                        <li style="font-weight: bold; color: #4c4c4c; font-size: 12px; font-family: Arial,Helvetica,sans-serif;">
                            Number of visa<span id="noa" style="font-weight: bold;
                                color: #005286; font-size: 12px; font-family: Arial,Helvetica,sans-serif;"><?=$_POST['applicants']?> Applicant x $<?=$nationality_price?></span></li>
                        <li style="font-weight: bold; color: #4c4c4c; font-size: 12px; font-family: Arial,Helvetica,sans-serif;">
                            Type of visa<span id="type">Multi - Entry</span>
                        </li>
                        <li style="font-weight: bold; color: #4c4c4c; font-size: 12px; font-family: Arial,Helvetica,sans-serif;">
                            Purpose of visit<span id="mucdich1">Tourism</span></li>
                        <li style="font-weight: bold; color: #4c4c4c; font-size: 12px; font-family: Arial,Helvetica,sans-serif;">
                            Embassy Fee<span id="embassytime" style="font-weight: bold; color: #005286;
                                font-size: 12px; font-family: Arial,Helvetica,sans-serif;"><?=$_POST['applicants']?> x $<?=$nationality_price?> = $<?=$_POST['applicants']*$nationality_price?></span></li>
                                                        <li style="font-weight: bold; color: #4c4c4c; font-size: 12px; font-family: Arial,Helvetica,sans-serif;">
                            Processing Fee<span id="processing_fee" style="font-weight: bold; color: #005286;
                                font-size: 12px; font-family: Arial,Helvetica,sans-serif;"><?=$_POST['applicants']?> x $<?=$sp?> = $<?=$_POST['applicants']*$sp?></span><?php
								$processing_fee=$_POST['processingtime'];
								 if($processing_fee =="1"){
	$procText="Normal (Guaranteed 2 working days) ";
	} 
	else if($processing_fee =="2"){
		$procText="Urgent (Guaranteed 4-8 hours)";
		}
		else{
			$procText="Immediately service case in Time off, Sat,Sun or Holidays";}?><span id="procText"><?=$procText?></span></li>
                    </ul>
                    <span class="total" style="font-weight: bold; color: #4c4c4c; font-size: 12px; font-family: Arial,Helvetica,sans-serif;">
                        Total service fee</span>
                    <p>
                        <em id="total" style="font-weight: bold; color: #e91503; font-size: 18px; font-family: Arial,Helvetica,sans-serif;">$<?=$_POST['applicants']*($nationality_price+$sp)?></em>
                        <br>
                    </p>
                </div>
                <p style="padding:5px">&nbsp;</p>
                <img src="<?php echo BASETHEMEPATH;?>images/SSL.jpg" alt="SSL" style="margin-left:20px;" /></div>
                <br class="clear" />
          
                   <!-- <br class="clear" />
                    <div class="hr_gap" style="height:130px;"></div>
                    <h1 class="heading-horizontal" style="margin:30px 0 80px 0;"><span>+ Additional Shortcodes</span></h1>
                    <div class="one_fourth tt-column">
                       <a class="tt-icon-box" href="template-shortcodes-buttons.html" title="" target="">
                          <span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x" style="color:#39ADD1;"></i><i class="fa fa-link fa-stack-1x fa-inverse"></i></span>
                          <h4>Buttons</h4>
                       </a>
                    </div>
                    <div class="one_fourth tt-column">
                       <a class="tt-icon-box" href="template-shortcodes-callout-boxes.html" title="" target="">
                          <span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x" style="color:#2570A8;"></i><i class="fa fa-bullhorn fa-stack-1x fa-inverse"></i></span>
                          <h4>Callout Boxes</h4>
                       </a>
                    </div>
                    <div class="one_fourth tt-column">
                       <a class="tt-icon-box" href="template-shortcodes-columns.html" title="" target="">
                          <span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x" style="color:#E0AB18;"></i><i class="fa fa-columns fa-stack-1x fa-inverse"></i></span>
                          <h4>Columns</h4>
                       </a>
                    </div>
                    <div class="one_fourth_last tt-column">
                       <a class="tt-icon-box" href="template-shortcodes-image-frames.html" title="" target="">
                          <span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x" style="color:#913B53;"></i><i class="fa fa-arrow-right fa-stack-1x fa-inverse"></i></span>
                          <h4>Image Frames</h4>
                       </a>
                    </div>
                    <br class="clear" />
                    <div class="hr_gap" style="height:20px;"></div>
                    <div class="one_fourth tt-column">
                       <a class="tt-icon-box" href="template-shortcodes-latest-blog-posts.html" title="" target="">
                          <span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x" style="color:#E15258;"></i><i class="fa fa-comments-o fa-stack-1x fa-inverse"></i></span>
                          <h4>Latest Blog Posts</h4>
                       </a>
                    </div>
                    <div class="one_fourth tt-column">
                       <a class="tt-icon-box" href="template-shortcodes-pricing-tables.html" title="" target="">
                          <span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x" style="color:#665885;"></i><i class="fa fa-table fa-stack-1x fa-inverse"></i></span>
                          <h4>Pricing Tables</h4>
                       </a>
                    </div>
                    <div class="one_fourth tt-column">
                       <a class="tt-icon-box" href="template-shortcodes-social-media-icons.html" title="" target="">
                          <span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x" style="color:#9D8AC7;"></i><i class="fa fa-skype fa-stack-1x fa-inverse"></i></span>
                          <h4>Social Icons</h4>
                       </a>
                    </div>
                    <div class="one_fourth_last tt-column">
                       <a class="tt-icon-box" href="template-shortcodes-tabs-accordion.html" title="" target="">
                          <span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x" style="color:#53BBB4;"></i><i class="fa fa-bars fa-stack-1x fa-inverse"></i></span>
                          <h4>Tabs + Accordion</h4>
                       </a>
                    </div>
                    <br class="clear" />
                    <div class="hr_gap" style="height:20px;"></div>
                    <div class="one_fourth tt-column">
                       <a class="tt-icon-box" href="template-shortcodes-testimonials-tweets.html" title="" target="">
                          <span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x" style="color:#51B46D;"></i><i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse"></i></span>
                          <h4>Testimonials</h4>
                       </a>
                    </div>
                    <div class="one_fourth tt-column">
                       <a class="tt-icon-box" href="template-shortcodes-typography.html" title="" target="">
                          <span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x" style="color:#62707D;"></i><i class="fa fa-font fa-stack-1x fa-inverse"></i></span>
                          <h4>Typography</h4>
                       </a>
                    </div>
                    <div class="one_fourth tt-column">
                       <a class="tt-icon-box" href="template-shortcodes-vector-icons.html" title="" target="">
                          <span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x" style="color:#F9845B;"></i><i class="fa fa-user fa-stack-1x fa-inverse"></i></span>
                          <h4>Vector Icons</h4>
                       </a>
                    </div>
                    <div class="one_fourth_last tt-column">
                       <a class="tt-icon-box" href="template-shortcodes-vector-icon-boxes.html" title="" target="">
                          <span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x" style="color:#39ADD1;"></i><i class="fa fa-users fa-stack-1x fa-inverse"></i></span>
                          <h4>Vector Icon Boxes</h4>
                       </a>
                    </div>
                    <br class="clear" />
                    <div class="hr_gap" style="height:80px;"></div>-->
                  
                  
                  <!-- ////////////////////////////////////////////////////////// -->
                  <!-- ***************** - Content Ends Here - ****************** -->
                  <!-- ////////////////////////////////////////////////////////// -->               
               
               
               

               
               </main><!-- END main #content -->
            </div><!-- END main-area -->
          