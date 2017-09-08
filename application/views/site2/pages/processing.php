    <!-- processing start --> <style>  #ima{  float: right;    margin: 0px;      }  </style>
<section id="teaser1">	
	<div class="container">		
	<div class="row">						  	
	<div class="col-md-7 col-xs-12 ">	
		<div class="content">
	<h3 style="color:white">PROCESSING - YOUR E-VISA APPLICATION IN 3 EASY STEPS</h3><br/>		
	<div class="item active">	
	<h1 class="title1">STEP 1: Complete the <a href="http://turkeyevisa.online/index.php/application" title="olnine evisa application">online Application</a> Form <span class="subtitle1">Complete the online secure 128-bit SSL Encryption Application form for your travel purposes in order to obtain <a href="http://turkeyevisa.online/index.php/application" title="evisa turkey">e-Visa</a> authorisation before traveling to Turkey.</span></h1> 		
	</div>			
	<br/>		
	<div class="item active">	
	<h1 class="title1">STEP 2: Convenient payment Methods <span class="subtitle1">This website has integrated for the convenience of applicants/users the following payment methods for acceptance the named are; Visa, Master Card, Credit/Debit, PayPal and Direct Bank Transfer which are secure methods on the go, with SSL encryption.</span></h1> 			
	</div>		
	<br/>			
	<div class="item active">	
	<h1 class="title1">STEP 3: Get your <a href="http://turkeyevisa.online/index.php/application" title="how to get turkey visa">e-Visa</a> confirmation via your Email <span class="subtitle1">Applicants/Users receive their Turkish e-Visa confirmation electronically. The <a href="http://turkeyevisa.online/index.php/application" title="evisa turjey application">e-Visa application</a> is submitted online via <a href="https://www.turkeyevisa.online">turkeyevisa.online</a> and in return an e-Visa confirmation is sent directly to the applicants/users email account in PDF format. 24x7 email updates and support provided.</span></h1> 			
	</div>			
	</div> 
	<br/>
	<a href="<?=base_url();?>index.php/application" title="turkey visa apply" class="btn1 scroll-to"> Apply Visa</a>
	</div>
	
    	<div class="col-md-5 col-xs-12">							
			<img src="<?php echo BASETHEMEPATH;?>img/business-2.png" class="img-responsive" alt="">		
		</div>	  
	</div>       
 
 </div>    
 </section>
        <div class="arrow-down"></div>
        <!-- processing end -->
    <!-- processing start -->
          <section id="reviews" class="container wow fadeInUp">
		  <section id="information" class="container">

          <!-- Single photo start -->
          <div data-wow-offset="100" class="row wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
            <div class="col-md-7 col-xs-12 pull-right">
			<div class="content">
              <img src="<?php echo BASETHEMEPATH;?>img/quick_evisa.png" alt="" class="img-responsive"id="ima">
			  </div>
            </div>
            <div class="col-md-5 pull-left">       
	
			
			<div class="service-icon">></div>
			<p >Enter your Visa Option: Nationality, Number of Applicants, Specified Travel Document and select processing time preference. </p>
			<div class="service-icon">></div>
			<p >Enter Travel dates and Personal information: Applicants details, contact information and agree the terms of use.</p>
			<div class="service-icon">></div>
			<p >Review and Submit: At this point, your application has been submitted for conformation. If its required, you can edit and update the application.</p>
			<div class="service-icon">></div>
			<p >Payment: You will finally make payment using one of the payment options provided.</p>
			<div class="service-icon">></div>
			<p >Download the e-Visa confirmation: Emailed to you, you can open, save and download the PDF document and Print it.</p>
		
			<a href="<?=base_url();?>index.php/application" title="apply turkey visa" class="btn">Apply</a>           

			</div>
          </div>
          <!-- Single photo end -->
        </section>
        </section>
        <!-- processing end -->
      
       <!-- Check Status start -->
        <section style="visibility: visible; animation-name: slideInLeft;" id="newsletter" class="wow slideInLeft animated" data-wow-offset="300">        
		<div class="container">        
		<div class="col-md-12">    
		<div class="location-select">          
        <div class="row">                
		<form id="statusform" method="post" action="index.php/application/check-status-json">   
		<div class="col-md-4">              
        <h2  style="color:white;text-align:right; margin-top:18px;margin-right:25px;">Check Status</h2>        
		</div>         
		<div class="col-md-4 statusinput">   
		<input type="text" name="applicationnumber" class="form-control input-lg" id="applicationnumber" placeholder="Enter Application/Reference Number" required="">       
		</div>      
		<div class="col-md-3 statusinput"><input type="submit" name="checkstatus" class="btn btn-primary btn-lg btn-block" value="Check Status">
		</div>      
		</form>
		</div>   
		</div>    
		</div>       
		</div>        
		</section>
        <!-- Check Status end -->

        <!-- Partners start -->
        <section id="partners" class="wow fadeIn" data-wow-offset="50">
          <div class="container">
            <div class="row">
            
              <div class="col-md-3 col-xs-6 text-center">
                <img src="<?php echo BASETHEMEPATH;?>img/partner1.png" alt="Partner" class="img-responsive wow fadeInUp" data-wow-delay="0.5s" data-wow-offset="200">
              </div>
              <div class="col-md-3 col-xs-6 text-center">
                <img src="<?php echo BASETHEMEPATH;?>img/partner2.png" alt="Partner" class="img-responsive wow fadeInUp" data-wow-delay="1s" data-wow-offset="200">
              </div>
              <div class="col-md-3 col-xs-6 text-center">
                <img src="<?php echo BASETHEMEPATH;?>img/partner3.png" alt="Partner" class="img-responsive wow fadeInUp" data-wow-delay="1.5s" data-wow-offset="200">
              </div>
              <div class="col-md-3 col-xs-6 text-center">
                <img src="<?php echo BASETHEMEPATH;?>img/partner4.png" alt="Partner" class="img-responsive wow fadeInUp" data-wow-delay="2s" data-wow-offset="200">
              </div>
            </div>
          </div>
        </section>
        <!-- Partners end -->					
       

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
    $html="<div class=\"row ".$name." \"><div class=\"col-md-4\"><select name=\"".$name."month".$a."\" required class=\"col-md-4 form-control\">";
	 $html.="<option value=''>Month</option>";
    for($i=1;$i<=12;$i++)
    {	
		if($month == $i) $s="selected=selected"; else $s="";
		$monthval=$months[$i];
		if($i<10){
			$i="0".$i;}
       $html.="<option value='$i' $s>$monthval</option>";
    }
    $html.="</select></div> ";
   
    // Day dropdown
    $html.="<div class=\"col-md-4\"><select name=\"".$name."day".$a."\" required class=\"col-md-4 form-control\">";
	 $html.="<option value=''>Day</option>";
    for($i=1;$i<=31;$i++)
    {
		if($i<10){
			$i="0".$i;}
		if($i==$day) $s="selected=selected"; else $s="";
       $html.="<option value='$i' $s>$i</option>";
    }
    $html.="</select></div>";

    // Year dropdown
    $html.="<div class=\"col-md-4\"><select name=\"".$name."year".$a."\" required class=\"col-md-4 form-control\">";
	 $html.="<option value=''>Year</option>";

    for($i=$startyear;$i<=$endyear;$i++)
    {      
		if($i==$year) $s="selected=selected"; else $s="";
      $html.="<option value='$i' $s>$i</option>";
    }
    $html.="</select></div></div>";

    return $html;
}?>


     
            
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

                error.insertAfter(".arrivaldate");

            }else if (name === "dobmonth[]" || name === "dobday[]" || name === "dobyear[]") {

                error.insertAfter(".dob");

            }else if (name === "pidmonth[]" || name === "pidday[]" || name === "pidyear[]") {

                error.insertAfter(".pid");

            }else if (name === "pedmonth[]" || name === "pedday[]" || name === "pedyear[]") {

                error.insertAfter(".ped");

            }

			else if (name === "VisaPermitExpireDatemonth" || name === "VisaPermitExpireDateday" || name === "VisaPermitExpireDateyear") {

                error.insertAfter(".VisaPermitExpireDate']");

            }

			else if (type === "radio") {

                error.insertAfter(jQuery(this).find("lable"));

            }

			 else {

                error.insertAfter(element);

            }

        }
					});	
						});

					</script>