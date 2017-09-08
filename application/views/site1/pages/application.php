<?php  $this->load->database();?>
         
      <style>
.help-block {
    font-size: 9px;
    margin: 0;
}

.input-blocks label {
    display: block;
    float: none;
    font-size: 11px;
    font-weight: bold;
    margin-bottom: 6px;
}</style>	  <!-- ***************** - Main Content Area - ***************** -->
         <div id="main">
            <div class="main-area">
            
            
            
            
            
            
              <!-- ////////////////////////////////////////////////////////// -->
              <!-- ***************** - Content Start Here - ***************** -->
              <!-- ////////////////////////////////////////////////////////// -->
              
              
              <!-- ***************** - Breadcrumbs Start Here - ***************** -->
              
				<div class="tools">
					<span class="tools-top"></span>
					<div class="frame">
						<h1>Turkey e-Visa Application Form</h1>	
                       

					<p class="breadcrumb"><a href="<?php echo BASETHEMEPATH;?>index.php/home">Home</a><!--<a href="<?php echo BASETHEMEPATH;?>index.php/application">Application</a>--><span class='current_crumb'>Apply Visa </span></p>
					</div><!-- END frame -->
				</div><!-- END tools -->
                                    <div class="timezone" style="float:right"><p> <strong>Information Note:</strong> If you have dual nationality, you should use the nationality according the passport you will be using for the travel to Turkey. You always have to make sure that the country of travel document is not different from what is on the e-visa. For example if you are dual national used one country of travel document to get the e-visa but carry the other country of travel document at the time travelling will make your visa invalid.</p>

</div>
                  
                  <main role="main" id="content" class="content_full_width">
               
       <div class="error"><?php echo validation_errors(); ?></div>
			  <p class="error">
                  <?=$captcha_message?>
                  
                </p><?php if($_GET['step'])$step=$_GET['step']; else $step=$_POST['step'];?>
				<?php if($step !="2"){?>
                 <!--<h1 class="note">Vietnam Visa Application Form</h1>-->
														<div class="step-progress">
			<ul>
				<li class="active">&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
			</ul>
		</div>
        <div class="step-label">
			<ul>
				<li class="active"><span class="fa fa-check green"></span>1. Visa Options</li>
				<li>2. Applicant Details</li>
				<li>3. Review &amp; Payment</li>
			</ul>
		</div>
          <form class="reg-form input-blocks clearfix" id="visaform" action="<?=base_url();?>index.php/application?step=2" validate="no-validate" name="visaform" method="post">
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
              <!-- Job / End -->
              <div class="one_half tt+column">
			                <div class="field clearfix">
                <label for="">Select Your Nationality <span class="red">*</span></label>
                <select name="nationality" id="nationality" required title="Please Select Your Nationality">
                  <option value="" >Select</option>
                  <?php foreach($countrylist as $val){?>
                  <?php if(($val['price'] !='Exempt') && ($val['price'] !='Not Eligible')){ ?>
                  <option value="<?=$val['id']?>" <?php if($val['id']==$nationality){?> selected="selected" <?php }?>>
                  <?=$val['country']?>
                  </option>
                  <?php } }?>
                </select>
				
                <div class="hiddenMenu" > </div>
                <!--<label for="shirtsizefemale">section</label>
	<label for="shirtsizefemale">class teeacher</label>
	<label for="shirtsizefemale">subject</label>
	<label for="shirtsizefemale">phno</label>
	<label for="shirtsizefemale">email id</label>
	<br>-->
              </div>
              <div class="field clearfix">
                <label for="">Number Of Applicants<span class="red">*</span></label>
                <select name="applicants" id="applicants" required >
                  <option value="1" >1 Applicant</option>
                  <option value="2" >2 Applicants</option>
                  <option value="3" >3 Applicants</option>
                  <option value="4" >4 Applicants</option>
                  <option value="5" >5 Applicants</option>
                  <option value="6" >6 Applicants</option>
                  <option value="7" >7 Applicants</option>
                  <option value="8" >8 Applicants</option>
                  <option value="9" >9 Applicants</option>               
                  
                </select>
              </div>
              <!--select Country-->
              <!-- select country /End-->
              <!-- select Specify Document-->
			  <div id="supportDocument" <?php if($TSD !=""){?> style="display:block" <?php } else {?>style="display: none;" <?php }?>>
			  <h3 class="apphead">Additional Info</h3>
              <div class="field clearfix" >
                <label for="inputEmail1" class="col-lg-3 control-label">Type of Supporting Document <span class="red">*</span></label>
                <label class="col-lg-6">
                <select class="form-control" name="TSD" id="SupportingDocumentType" required="">
                  <option value="">Please Select</option>
                  <option value="1" <?php if($TSD=='Visa' || $TSD=='1'){?> selected="selected" <?php }?>>Visa</option>
                  <option value="2" <?php if($TSD=='Residence Permit' || $TSD=='2'){?> selected="selected" <?php }?>>Residence Permit</option>
                </select>
                </label>
              </div>
              <div id="SupportingDocInfo" <?php if($TSD=='Visa' || $TSD=='1' || $TSD=='Residence Permit' || $TSD=='2'){?> style="display:block" <?php } else {?>style="display: none;" <?php }?>>
                <div class="field clearfix">
                  <label for="inputEmail1" class="col-lg-3 control-label">Country that issued Visa/Residence Permit<span class="red">*</span></label>
                  <label class="col-lg-6" id="issuingCountrySet-1" <?php if($TSD=='Visa' || $TSD=='1'){?> style="display:block" <?php } else {?>style="display: none;" <?php }?>>
                  <select class="form-control" name="CountryVisaPermit1" id="CountryVisaPermit1" required="" >
                    <option value="">Please Select</option>
                    <option value="Australia" <?php if($CountryVisaPermit=='Australia'){?> selected <?php }?>>Australia</option>
                    <option value="Canada" <?php if($CountryVisaPermit=='Canada'){?> selected <?php }?>>Canada</option>
                    <option value="Chile" <?php if($CountryVisaPermit=='Chile'){?> selected <?php }?>>Chile</option>
                    <option value="Ireland" <?php if($CountryVisaPermit=='Ireland'){?> selected <?php }?>>Ireland</option>
                    <option value="Israel" <?php if($CountryVisaPermit=='Israel'){?> selected <?php }?>>Israel</option>
                    <option value="Japan" <?php if($CountryVisaPermit=='Japan'){?> selected <?php }?>>Japan</option>
                    <option value="Korea, Republic of" <?php if($CountryVisaPermit=='Korea, Republic of'){?> selected <?php }?>>Korea, Republic of</option>
                    <option value="Mexico" <?php if($CountryVisaPermit=='Mexico'){?> selected <?php }?>>Mexico</option>
                    <option value="New Zealand" <?php if($CountryVisaPermit=='New Zealand'){?> selected <?php }?>>New Zealand</option>
                    <option value="Schengen" <?php if($CountryVisaPermit=='Schengen'){?> selected <?php }?>>Schengen</option>
                    <option value="U.S.A" <?php if($CountryVisaPermit=='U.S.A'){?> selected <?php }?>>U.S.A</option>
                    <option value="United Kingdom" <?php if($CountryVisaPermit=='United Kingdom'){?> selected <?php }?>>United Kingdom</option>
                  </select>
                  </label>
                  <label class="col-lg-6" id="issuingCountrySet-2" <?php if($TSD=='Residence Permit' || $TSD=='2'){?> style="display:block" <?php } else {?>style="display: none;" <?php }?>>
                  <select class="form-control" name="CountryVisaPermit2" id="CountryVisaPermit2" required="">
                    <option value="">Please Select</option>
                    <option value="Australia" <?php if($CountryVisaPermit=='Australia'){?> selected <?php }?>>Australia</option>
                    <option value="Austria" <?php if($CountryVisaPermit=='Austria'){?> selected <?php }?>>Austria</option>
                    <option value="Belgium" <?php if($CountryVisaPermit=='Belgium'){?> selected <?php }?>>Belgium</option>
                    <option value="Canada" <?php if($CountryVisaPermit=='Canada'){?> selected <?php }?>>Canada</option>
                    <option value="Chile" <?php if($CountryVisaPermit=='Chile'){?> selected <?php }?>>Chile</option>
                    <option value="Czech Republic" <?php if($CountryVisaPermit=='Czech Republic'){?> selected <?php }?>>Czech Republic</option>
                    <option value="Denmark" <?php if($CountryVisaPermit=='Denmark'){?> selected <?php }?>>Denmark</option>
                    <option value="Estonia" <?php if($CountryVisaPermit=='Estonia'){?> selected <?php }?>>Estonia</option>
                    <option value="Finland" <?php if($CountryVisaPermit=='Finland'){?> selected <?php }?>>Finland</option>
                    <option value="France" <?php if($CountryVisaPermit=='France'){?> selected <?php }?>>France</option>
                    <option value="Germany" <?php if($CountryVisaPermit=='Germany'){?> selected <?php }?>>Germany</option>
                    <option value="Greece" <?php if($CountryVisaPermit=='Greece'){?> selected <?php }?>>Greece</option>
                    <option value="Hungary" <?php if($CountryVisaPermit=='Hungary'){?> selected <?php }?>>Hungary</option>
                    <option value="Iceland" <?php if($CountryVisaPermit=='Iceland'){?> selected <?php }?>>Iceland</option>
                    <option value="Ireland" <?php if($CountryVisaPermit=='Ireland'){?> selected <?php }?>>Ireland</option>
                    <option value="Israel" <?php if($CountryVisaPermit=='Israel'){?> selected <?php }?>>Israel</option>
                    <option value="Italy" <?php if($CountryVisaPermit=='Italy'){?> selected <?php }?>>Italy</option>
                    <option value="Japan" <?php if($CountryVisaPermit=='Japan'){?> selected <?php }?>>Japan</option>
                    <option value="Korea, Republic of" <?php if($CountryVisaPermit=='Korea, Republic of'){?> selected <?php }?>>Korea, Republic of</option>
                    <option value="Latvia" <?php if($CountryVisaPermit=='Latvia'){?> selected <?php }?>>Latvia</option>
                    <option value="Liechtenstein" <?php if($CountryVisaPermit=='Liechtenstein'){?> selected <?php }?>>Liechtenstein</option>
                    <option value="Lithuania" <?php if($CountryVisaPermit=='Lithuania'){?> selected <?php }?>>Lithuania</option>
                    <option value="Luxembourg" <?php if($CountryVisaPermit=='Luxembourg'){?> selected <?php }?>>Luxembourg</option>
                    <option value="Malta" <?php if($CountryVisaPermit=='Malta'){?> selected <?php }?>>Malta</option>
                    <option value="Mexico" <?php if($CountryVisaPermit=='Mexico'){?> selected <?php }?>>Mexico</option>
                    <option value="Netherlands" <?php if($CountryVisaPermit=='Netherlands'){?> selected <?php }?>>Netherlands</option>
                    <option value="New Zealand" <?php if($CountryVisaPermit=='New Zealand'){?> selected <?php }?>>New Zealand</option>
                    <option value="Norway" <?php if($CountryVisaPermit=='Norway'){?> selected <?php }?>>Norway</option>
                    <option value="Poland" <?php if($CountryVisaPermit=='Poland'){?> selected <?php }?>>Poland</option>
                    <option value="Portugal" <?php if($CountryVisaPermit=='Portugal'){?> selected <?php }?>>Portugal</option>
                    <option value="Schengen" <?php if($CountryVisaPermit=='Schengen'){?> selected <?php }?>>Schengen</option>
                    <option value="Slovakia" <?php if($CountryVisaPermit=='Slovakia'){?> selected <?php }?>>Slovakia</option>
                    <option value="Slovenia" <?php if($CountryVisaPermit=='Slovenia'){?> selected <?php }?>>Slovenia</option>
                    <option value="Spain" <?php if($CountryVisaPermit=='Spain'){?> selected <?php }?>>Spain</option>
                    <option value="Sweden" <?php if($CountryVisaPermit=='Sweden'){?> selected <?php }?>>Sweden</option>
                    <option value="Switzerland" <?php if($CountryVisaPermit=='Switzerland'){?> selected <?php }?>>Switzerland</option>
                    <option value="U.S.A" <?php if($CountryVisaPermit=='U.S.A'){?> selected <?php }?>>U.S.A</option>
                    <option value="United Kingdom" <?php if($CountryVisaPermit=='United Kingdom'){?> selected <?php }?>>United Kingdom</option>
                  </select>
                  </label>
                </div>
                
                
                
                <div class="field clearfix">
                  <label for="inputEmail1" class="col-lg-3 control-label"></label>
                  <div class="radio"><label class="col-lg-6">
                  <input type="checkbox" id="DocumentDoesNotExpire" name="VisaPermitExpire" value="1" required="" <?php if($VisaPermitExpire=='1'){?> checked <?php }?>>Visa/Residence Permit does not expire<span class="red">*</span></label></div>
                  <script>
						jQuery(function() {
  jQuery("#DocumentDoesNotExpire").click(function() {
    if (jQuery(this).is(':checked')) {
      jQuery('#SupportingDocExpDate').hide();
    } else {
      jQuery('#SupportingDocExpDate').show();
    }
  });
						});
					</script>
                </div>
                <div id="SupportingDocExpDate" class="field clearfix one_half" <?php if($VisaPermitExpire=='1'){?> style="display:none" <?php }?>>
                  <label for="inputEmail1" class="col-lg-3 control-label">Visa/Residence Permit Expiration Date:<span class="red">*</span></label>
                  <?php echo date_picker("VisaPermitExpireDate",date('Y'),date('Y')+11,$VisaPermitExpireDatemonth,$VisaPermitExpireDateday,$VisaPermitExpireDateyear);?>
				</label>
                </div>
              </div>
              <br class="clear" />
              <script>
					jQuery(function() {
						jQuery( "#SupportingDocumentType" ).change(function(){
    var chkSupportDocValue = jQuery( "#SupportingDocumentType option:selected" ).val();
    if (chkSupportDocValue == "1") {
      jQuery("#issuingCountrySet-1").show();
      jQuery("#issuingCountrySet-2").hide();
      jQuery("#SupportingDocInfo").show();
    } else if (chkSupportDocValue == "2") {
      jQuery("#issuingCountrySet-1").hide();
      jQuery("#issuingCountrySet-2").show();
      jQuery("#SupportingDocInfo").show();
    } else {
      jQuery("#SupportingDocInfo").hide();
    }
						});
						
					});
				</script>
				</div>
              <div class="field clearfix">
                <label for="">Specify Travel Document <span class="red">*</span></label>
                <select name="travaldocument" id="travaldocument" required title="Please Select Travel Document">
                  <option value="">Select</option>
                  <option value="Ordinary Passport"  <?php if($travaldocument=="Ordinary Passport"){?> selected <?php }?>>Ordinary Passport</option>
                </select>
              </div>
              <div>
               <h3 class="apphead">Processing Time</h3>
              <div class="radio">
              <label><input type="radio" name="processingtime" checked="checked" value="1" />Normal (Guaranteed 2 working days) </label>
              </div>
               <div class="radio">
              <label><input type="radio" name="processingtime" value="2" />Urgent (Guaranteed 4-8 hours)</label>
              </div>
               <div class="radio">
              <label><input type="radio" name="processingtime" value="3" />Immediately service case in Time off, Sat,Sun or Holidays </label>
              </div>
              </div>
                                <input type="hidden" name="arrivaldate" value="<?=$arrivaldateday?>.<?=$arrivaldatemonth?>.<?=$arrivaldateyear?>" />
                  <input type="hidden" name="arrivaldatemonth" value="<?=$arrivaldatemonth?>" />					
                  <input type="hidden" name="arrivaldateday" value="<?=$arrivaldateday?>" />					
                  <input type="hidden" name="arrivaldateyear" value="<?=$arrivaldateyear?>" />
                  <?php for($i=0;$i<$_POST['applicants'];$i++){?>
                  <input type="hidden" name="firstname[]" value="<?=$firstname[$i]?>" />
                  <input type="hidden" name="lastname[]" value="<?=$lastname[$i]?>" />
                  <input type="hidden" name="dob[]" value="<?=$dobday[$i]?>.<?=$dobmonth[$i]?>.<?=$dobyear[$i]?>" />
                  <input type="hidden" name="dobmonth[]" value="<?=$dobmonth[$i]?>" />					
                  <input type="hidden" name="dobday[]" value="<?=$dobday[$i]?>" />					
                  <input type="hidden" name="dobyear[]" value="<?=$dobyear[$i]?>" />
                  <input type="hidden" name="placeofbirth[]" value="<?=$placeofbirth[$i]?>" />
                  <input type="hidden" name="mothername[]" value="<?=$mothername[$i]?>" />
                  <input type="hidden" name="fathername[]" value="<?=$fathername[$i]?>" />
                  <input type="hidden" name="passportnumber[]" value="<?=$passportnumber[$i]?>" />
                  <input type="hidden" name="pid[]" value="<?=$pidday[$i]?>.<?=$pidmonth[$i]?>.<?=$pidyear[$i]?>" />
                  <input type="hidden" name="pidmonth[]" value="<?=$pidmonth[$i]?>" />					
                  <input type="hidden" name="pidday[]" value="<?=$pidday[$i]?>" />					
                  <input type="hidden" name="pidyear[]" value="<?=$pidyear[$i]?>" />	
                  <input type="hidden" name="ped[]" value="<?=$pedday[$i]?>.<?=$pedmonth[$i]?>.<?=$pedyear[$i]?>" />
                  <input type="hidden" name="pedmonth[]" value="<?=$pedmonth[$i]?>" />					
                  <input type="hidden" name="pedday[]" value="<?=$pedday[$i]?>" />					
                  <input type="hidden" name="pedyear[]" value="<?=$pedyear[$i]?>" />
                  <?php }?>
                  <input type="hidden" name="email" value="<?=$email?>" />
                  <input type="hidden" name="phone" value="<?=$phone?>" />
                  <input type="hidden" name="address" value="<?=$address?>" />
              <input type="submit" value="Move to Next Step" class="ka_button small_button small_cherry">
              </div>
              <div class="one_half_last tt_column">
              <div class="right">
<ul>
	<li><center><h1 style="font-weight:bold;color:#df1f26;margin:0px">Summary</h1></center></li>
                        <li style="font-weight: bold; color: #4c4c4c; font-size: 12px; font-family: Arial,Helvetica,sans-serif;">
                            Number of visa<span id="noa" style="font-weight: bold;
                                color: #005286; font-size: 12px; font-family: Arial,Helvetica,sans-serif;">1 Applicant x $0</span></li>
                        <li style="font-weight: bold; color: #4c4c4c; font-size: 12px; font-family: Arial,Helvetica,sans-serif;">
                            Type of visa<span id="type">Multi - Entry</span>
                        </li>
                        <li style="font-weight: bold; color: #4c4c4c; font-size: 12px; font-family: Arial,Helvetica,sans-serif;">
                            Purpose of visit<span id="mucdich1">Tourism</span></li>
                        <li style="font-weight: bold; color: #4c4c4c; font-size: 12px; font-family: Arial,Helvetica,sans-serif;">
                            Embassy Fee<span id="embassytime" style="font-weight: bold; color: #005286;
                                font-size: 12px; font-family: Arial,Helvetica,sans-serif;">1 x $0 = $0</span></li>
                                                        <li style="font-weight: bold; color: #4c4c4c; font-size: 12px; font-family: Arial,Helvetica,sans-serif;">
                            Processing Fee<span id="processing_fee" style="font-weight: bold; color: #005286;
                                font-size: 12px; font-family: Arial,Helvetica,sans-serif;">1 x $45 = $45</span><span id="procText">Normal (Guaranteed 2 working days)</span></li>
                    </ul>
                    <span class="total" style="font-weight: bold; color: #4c4c4c; font-size: 12px; font-family: Arial,Helvetica,sans-serif;">
                        Total service fee</span>
                    <p>
                        <em id="total" style="font-weight: bold; color: #e91503; font-size: 18px; font-family: Arial,Helvetica,sans-serif;">$45</em>
                        <br>
                    </p>
                </div></div>
                <br class="clear" />
              <!-- select Specify Document /End-->
              
          </form>
           <br />
           <br />
      <div class="post_footer"> <br /></div>
   
<div class="tt-icon-box">
      <div class="column-center">
            <h5>Secure Payment</h5>
            <p>All your credit card information are secured.</p>
       </div>
       <div class="column-left">
       			<img src="<?php echo BASETHEMEPATH;?>images/secure-payment-bottom.png" >
      	</div>
  <div class="column-right">
  <h5>Full Money Back Guarantee</h5>
  <p>If our services are not on time.<p>
    </div>
    </div>
          
          <?php }?>
		            <?php if($step=="2"){?>
                     <!--<h1 class="note">Vietnam Visa Application Form</h1>-->
													<div class="step-progress">
			<ul>
				<li class="active">&nbsp;</li>
				<li class="active">&nbsp;</li>
				<li>&nbsp;</li>
			</ul>
		</div>
        <div class="step-label">
			<ul>
				<li>1. Visa Options</li>
				<li class="active"><span class="fa fa-check green"></span>2. Applicant Details</li>
				<li>3. Review &amp; Payment</li>
			</ul>
		</div>
            <form class="reg-form input-blocks clearfix" id="visaform" validate="no-validate" name="visaform" action="<?=base_url();?>index.php/application/appreview" method="post"  >
             <input type="hidden" value="<?=$_POST['processingtime']?>" name="processingtime" />
			 <input type="hidden" value="2" name="step" />
            <input type="hidden" value="<?=$_POST['applicants']?>" name="applicants" />
            <input type="hidden" value="<?=$_POST['nationality']?>" name="nationality" />
            <input type="hidden" value="<?=$_POST['TSD']?>" name="TSD" />
            <input type="hidden" value="<?=$_POST['CountryVisaPermit1']?>" name="CountryVisaPermit1" />
            <input type="hidden" value="<?=$_POST['CountryVisaPermit2']?>" name="CountryVisaPermit2" />
            <input type="hidden" value="<?=$_POST['VisaPermitExpire']?>" name="VisaPermitExpire" />
            <input type="hidden" value="<?=$_POST['VisaPermitExpireDatemonth']?>" name="VisaPermitExpireDatemonth" />
            <input type="hidden" value="<?=$_POST['VisaPermitExpireDateday']?>" name="VisaPermitExpireDateday" />
            <input type="hidden" value="<?=$_POST['VisaPermitExpireDateyear']?>" name="VisaPermitExpireDateyear" />
            <input type="hidden" value="<?=$_POST['travaldocument']?>" name="travaldocument" />
			<h2 class="apphead">Travel Date</h2>
              <div class="field clearfix one_half tt-column">
              
                <label for="">Arrival Date in Turkey <span class="red">*</span></label>
                <?php echo date_picker("arrivaldate",date('Y'),date('Y')+5,$arrivaldatemonth,$arrivaldateday,$arrivaldateyear);?>
                <span class="help-block"><i class="icon-exclamation-sign"></i> <font color=" #3D9CFA"><b>Your Arrival date should be within 3 months as of the date of an eVisa application</b></font></span> </div>
                <br class="clear" />
              <!-- First Name -->
              <?php for($i=0; $i<$_POST['applicants'];$i++){?>
              <h2 class="apphead"> Applicant <?=$i+1?> Passport Information</h2>
              <div class="karma_notify message_blue">
              <div class="field clearfix one_third tt-column">
                <label for="">Name (First and Middle) <span class="red">*</span><span class="help-block"><i class="icon-exclamation-sign"></i> <font color=" #3D9CFA">As in your passport</font></span> </label>
                <input type="text" name="firstname[]" id="firstname<?=$i?>" value="<?=$firstname[$i]?>"  required title="Firstname Required">
                </div>
              <!-- First Name / End -->
              <!-- Last Name -->
              <div class="field clearfix one_third tt-column">
                <label for="">Last Name<span class="red">*</span><span class="help-block"><i class="icon-exclamation-sign"></i><font color=" #3D9CFA"> As in your passport</font></span> </label>
                <input type="text" name="lastname[]" id="lastname<?=$i?>" value="<?=$lastname[$i]?>"  required title="Last Name Required">
                </div>
              <!-- Last Name / End -->
              <div class="field clearfix one_third_last tt-column">
                <label for="">Date Of Birth <span class="red">*</span><span class="help-block"><i class="icon-exclamation-sign"></i> <font color=" #3D9CFA">As in your passport</font></span> </label>
               <?php echo date_picker("dob",date('Y')-100,date('Y'),$dobmonth[$i],$dobday[$i],$dobyear[$i],"Y");?>
                </div>
                    <br class="clear">
              <div class="field clearfix one_third tt-column">
                <label for="">Place Of Birth <span class="red">*</span><span class="help-block"><i class="icon-exclamation-sign"></i> <font color=" #3D9CFA">As in your passport</font></span> </label>
                <input type="text" name="placeofbirth[]" id="placeofbirth<?=$i?>" value="<?=$placeofbirth[$i]?>"  required title="Place Of Birth Required">
                </div>
              <div class="field clearfix one_third tt-column">
                <label for="">Mother's Name <span class="red">*</span></label>
                <input type="text" name="mothername[]" id="mothername<?=$i?>" value="<?=$mothername[$i]?>"  required title="Mother Name Required">
              </div>
              <div class="field clearfix one_third_last tt-column">
                <label for="">Father's Name <span class="red">*</span></label>
                <input type="text" name="fathername[]" id="fathername<?=$i?>" value="<?=$fathername[$i]?>"  required title="Father Name Required">
              </div>
              <br class="clear">
              <?php /* <!-- Street Address -->
                <div class="field clearfix">
                  <label for="">Street Address <span class="red">*</span></label>
                  <input type="text" name="street" id="street" value="<?=$street?>"  required>
                </div>
                <!--Street Address  / End -->
                <!-- Address Line 2 -->
                <div class="field clearfix">
                  <label for="">Address Line 2 <span class="red">*</span></label>
                  <input type="text" name="city" id="city" value="<?=$city?>" >
                </div>
                <!-- Address Line 2 / End -->
                <!-- State/Province/Region -->
                <div class="field clearfix">
                  <label for="">State/Province/Region <span class="red">*</span></label>
                  <input type="text" name="state" id="state" value="<?=$state?>"  required>
                </div>
                <!--State/Province/Region / End -->
                <!-- ZIP/Pincode -->
                <div class="field clearfix">
                  <label for="">ZIP/Pincode <span class="red">*</span></label>
                  <input type="text" name="zipcode" id="zipcode" value="<?=$zipcode?>"  required>
                </div>
                <!--ZIP/Pincode / End --> <?php */?>
              <?php /*<div class="field clearfix">
                <label for="">Country<span class="red">*</span></label>
                <select name="country" id="country" required>
                  <option value="">Select</option>
                  <?php foreach($countrylist as $val){?>
                  <option value="<?=$val['id']?>" <?php if($country==$val['id']){?> selected <?php }?> >
                  <?=$val['country']?>
                  </option>
                  <?php }?>
                </select>
              </div> */?>
              <div class="field clearfix one_third tt-column">
                <label for="">Passport Number <span class="red">*</span><span class="help-block"><i class="icon-exclamation-sign"></i> <font color=" #3D9CFA">As in your passport</font></span> </label>
                <input type="text" name="passportnumber[]" id="passport<?=$i?>" value="<?=$passportnumber[$i]?>"  required title="Passport Number Required">
              </div>
              <div class="field clearfix one_third tt-column">
                <label for="">Passport Issue Date<span class="red">*</span></label>
                <?php echo date_picker("pid",date('Y')-100,date('Y'),$pidmonth[$i],$pidday[$i],$pidyear[$i],"Y");?>	
                </div>
              <div class="field clearfix one_third_last tt-column">
                <label for="">Passport Expiry Date <span class="red">*</span> <span class="help-block"><i class="icon-exclamation-sign"></i> <font color=" #3D9CFA">must be at least 6 months.</font></span> </label>
                <?php echo date_picker("ped",date('Y'),date('Y')+100,$pedmonth[$i],$pedday[$i],$pedyear[$i],"Y");?>
               </div>
                <br class="clear"></div>
                <?php } ?>
                <h2 class="apphead">Contact Information</h2>
              <div class="field clearfix one_half tt-column">
                <label for="">Email Address<span class="red">*</span></label>
                <input type="email" name="email" id="email" class="required email" value="<?=$email?>"  required title="Email Address is Required">
              </div>
              <!-- Telephone Number -->
              <div class="field clearfix one_half_last tt-column">
                <label for="">Telephone Number <span class="red">*</span></label>
                <input type="text" name="phone" id="phone" class="required number" value="<?=$phone?>"  require title="Phone Number is Required">
              </div>
              <br class="clear">
              <!-- Telephone Number / End -->
              <!-- Email / End -->
              <!-- Address -->
              <div class="field clearfix one_half tt-column">
                <label for="">Address <span class="red">*</span></label>
                <textarea  name="address" id="address" required title="Address Required"><?=$address?>
</textarea>
              </div>
              <!-- Address / End -->
              <div class="field clearfix one_half_last tt_column">
			  <span class="clear"></span>
               <label for="">Security Varification <span class="red">*</span></label>  <div style="width:50%;float:right"><img src="<?php echo BASETHEMEPATH;?>captcha_image.php" /></div>
                <div style="width:50%;float:right"><input type="text" name="captcha_input" size="15" required onChange="checkcaptcha()"></div>
                <label class="error">
                  <?=$captcha_message?>
                </label>
				
                <input type="hidden" value="<?php echo $_SESSION['captchapass']?>" name="captchaverify"></div>
				<br class="clear" />
                
               
                <div class="field clearfix">
                <label><input type="checkbox" id="information" name="information" value="1" required title="Please Confirm Your Information is Correct" > I would like to confirm the above information is correct. </label>
                 
                  </div>
                  
                  <div class="field clearfix">
                <label><input type="checkbox" required id="required" name="required" value="1" title="Please Accept Terms and Conditions" >I have read and agreed<a target="_blank" href="<?php echo BASETHEMEPATH;?>index.php/terms " > Terms and Condition. </a> </label>
                  
                  </div>
              <!-- Email -->
              <!-- Re-Password / End -->
              <button type="submit" formaction="<?=base_url();?>index.php/application?step=1" class="ka_button small_button small_cherry"><i class="fa fa-edit"></i>Back</button> 
              <input type="submit" value="Move to Next Step" class="ka_button small_button small_cherry" id="validate">
            </form>
            <?php }?>
           
          
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
<script type="text/javascript">
						jQuery(function() {
						jQuery('#visaform').validate({
							 groups: {
            arrivaldate: "arrivaldatemonth arrivaldateday arrivaldateyear",
			visaExpire : "VisaPermitExpireDatemonth VisaPermitExpireDateday VisaPermitExpireDateyear",
			dob: "dobmonth[] dobday[] dobyear[]",
			pid: "pidmonth[] pidday[] pidyear[]",
			ped: "pedmonth[] pedday[] pedyear[]"
        },
		errorPlacement: function(error, element) {
            var name = element.prop("name");
			var type = element.prop("type");
            if (name === "arrivaldatemonth" || name === "arrivaldateday" || name === "arrivaldateyear") {
                error.insertAfter("select[name='arrivaldateyear']");
            }else if (name === "dobmonth[]" || name === "dobday[]" || name === "dobyear[]") {
                error.insertAfter("select[name='dobyear[]']");
            }else if (name === "pidmonth[]" || name === "pidday[]" || name === "pidyear[]") {
                error.insertAfter("select[name='pidyear[]']");
            }else if (name === "pedmonth[]" || name === "pedday[]" || name === "pedyear[]") {
                error.insertAfter("select[name='pedyear[]']");
            }
			else if (name === "VisaPermitExpireDatemonth" || name === "VisaPermitExpireDateday" || name === "VisaPermitExpireDateyear") {
                error.insertAfter("select[name='VisaPermitExpireDateyear']");
            }
			else if (type === "radio") {
                error.insertAfter(jQuery(this).find("lable"));
            }
			 else {
                error.insertAfter(element);
            }
        }
							});	
/*jQuery("#validate").click(function() {
     if (jQuery("#visaform").valid()) 
	 console.log('valid');
      else
        validator.focusInvalid();
    
     return false;
  });			*/				
						});
					</script>
         <script>
		 jQuery(document).ready(function(){
		 DisplayView();
		 });
jQuery('#applicants').change(function(){ 
DisplayView();
});
jQuery('#nationality').change(function(){
	$nt=jQuery('#nationality').val();
$ntarray=["1","3","5","15","20","24","28","29","31","33","35","37","39","48","53","55","56","58","62","63","66","70","71","77","80","88","98","106","109","112","114","116","121","123","129","130","133","140","152","154","157","162","167","169","173","175","177","184","194","195","196","197"];
if(jQuery.inArray($nt,$ntarray) > -1){
$htmldata='<h3 class="apphead">Additional Classes</h3><div class="cta"><p style="font-weight:bold"><span class="red">*</span> You must meet all the requirements listed below:<br/></p><div class="radio"><label style="font-weight:normal"><input type="checkbox" name="hold" required>Must hold travel documents in accordance with travel purposes.(Return Ticket, Hotel reservation, adequate financial means(U.S. $50 day for each day)</input></label></div><div class="radio"><label style="font-weight:normal"><input type="checkbox" name="supportdoc" required>Must hold a valid and legitimate passport and it is valid for a period of time (at least 6 months beyond my departure from Turkey) allowing you to return at the least.</input></label></div><div class="radio"><labe style="font-weight:normal"l><input type="checkbox" name="check2" required>'+
                       'Must hold a valid Schengen visa or a valid visa from any of the OECD (USA, Canada etc.) member countries.Or I have a valid residence permit of a Schengen or OECD country.'+
                      '</input></label></div>'+
                      ''+
                      '<div class="radio"><label style="font-weight:normal"><input type="checkbox" name="check3" required>'+
                      ' Travelling purpose must be only for tourism or business.'+
                      '</input></label></div>'+
                      ''+
                      '<div class="radio"><label style="font-weight:normal"><input type="checkbox" name="check4" required>'+
                      '   I confirm to have read all the clauses carefully and to agree with them all.'+
                      '</input></label></div>'+
                      ''+
                    '</div>'
jQuery('.hiddenMenu').html($htmldata);
jQuery('.adl').show();
jQuery('.hiddenMenu').show();
jQuery('#supportDocument').show();

}else
{
jQuery('.hiddenMenu').empty();
jQuery('.hiddenMenu').hide();
jQuery('.adl').hide();
jQuery('#supportDocument').hide();
jQuery('#SupportingDocumentType').val('');
jQuery('#CountryVisaPermit1').val('');
jQuery('#CountryVisaPermit2').val('');
jQuery('#VisaPermitExpire').val('');
jQuery('#VisaPermitExpireDate').val('');
}
	DisplayView();
	});
jQuery('input[name=processingtime]').change(function(){
	DisplayView();
	});

function DisplayView(){	
var controller = 'application';
var base_url = '<?php echo base_url(); //you have to load the "url_helper" to use this function ?>';
var nationality = jQuery('#nationality').val();
var applicants = jQuery('#applicants').val();
var processing_fee=jQuery('input[name=processingtime]:checked').val();
if(processing_fee =="1"){
	var procText="Normal (Guaranteed 2 working days) ";
	} 
	else if(processing_fee =="2"){
		var procText="Urgent (Guaranteed 4-8 hours)";
		}
		else{
			var procText="Immediately service case in Time off, Sat,Sun or Holidays";}
if(nationality !=""){
	 jQuery.ajax({
'url' : base_url + 'index.php/' + controller + '/get_country_list',
'type' : 'POST', //the way you want to send data to your URL
'data' : {'id' : nationality , 'applicants': applicants , 'proc_fee':processing_fee },
'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
//var container = $('#container'); //jquery selector (get element by id)
if(data){
	var json= jQuery.parseJSON(data); 
		jQuery('#noa').html(json.applicants+' Applicants X $'+json.price+' = $'+json.apptotal); 
		jQuery('#embassytime').html(json.applicants+' X $'+json.price+' = $'+json.apptotal);
		jQuery('#processing_fee').html(json.applicants+' X $'+json.service_fee+' = $'+json.service_fee*json.applicants); 
		jQuery('#procText').html(procText);
		jQuery('#total').html('$'+json.total);
}
}
}); 
}else{
}
	}
</script>
<?php function date_picker($name, $startyear=NULL, $endyear=NULL ,$month=NULL,$day=NULL,$year=NULL,$array=NULL)
{
    if($startyear==NULL) $startyear = date("Y")-100;
    if($endyear==NULL) $endyear=date("Y")+50; 
	if($month==NULL)$month="";
	if($day==NULL)$day="";
	if($year==NULL)$year="";
	if($array==NULL)$a="";else $a='[]';

    $months=array('','January','February','March','April','May',
    'June','July','August', 'September','October','November','December');

    // Month dropdown
    $html="<select name=\"".$name."month".$a."\" required style=\"height: 40px; width: 30%\">";
	 $html.="<option value=''>Month</option>";
    for($i=1;$i<=12;$i++)
    {	
		if($month == $i) $s="selected=selected"; else $s="";
		$monthval=$months[$i];
		if($i<10){
			$i="0".$i;}
       $html.="<option value='$i' $s>$monthval</option>";
    }
    $html.="</select> ";
   
    // Day dropdown
    $html.="<select name=\"".$name."day".$a."\" required style=\"height: 40px; width: 30%\">";
	 $html.="<option value=''>Day</option>";
    for($i=1;$i<=31;$i++)
    {
		if($i<10){
			$i="0".$i;}
		if($i==$day) $s="selected=selected"; else $s="";
       $html.="<option value='$i' $s>$i</option>";
    }
    $html.="</select> ";

    // Year dropdown
    $html.="<select name=\"".$name."year".$a."\" required style=\"height: 40px; width: 35%\">";
	 $html.="<option value=''>Year</option>";

    for($i=$startyear;$i<=$endyear;$i++)
    {      
		if($i==$year) $s="selected=selected"; else $s="";
      $html.="<option value='$i' $s>$i</option>";
    }
    $html.="</select> ";

    return $html;
}?>
