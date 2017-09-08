    <!-- Teaser start --> <style>  #ima{  float: right;     }  </style>

			<div class="col-md-12 title">         
				<h2 style="  text-align:center;">About Turkey eVisa Service</h2>           
					<span class="underline">&nbsp;</span>         
			</div>     
			<br><br>


			<section id="teaser1">	
	<div class="container">		
	<div class="row">						  	
	<div class="col-md-7 col-xs-12 ">	
		<div class="content">
		
	<div class="item active">	
		
	<span class="subtitle1">We are not an affiliate of any official Government of Turkey services, Embassy or Government Organisation. We provide assistance with an aim to reduce your time spent and minimise difficulties experienced with online <a href="https://www.turkeyevisa.online/index.php/application" title="evisa trurkey">e-Visa application processes</a>, which will be in turn verified by our advisory team to avoid any decline of approval. Our service aims to support you with accurate application submission for authorisation, for this we charge you additional service fee which is clearly mentioned in our website.</span>		
	</div>			
			
	<div class="item active">	
	<span class="subtitle1">You can apply for Turkish e-Visa using the <a href="https://www.evisa.gov.tr/en/" title="turkey visa govt" target="_blank" style="text-decoration: underline;">Turkey Government Website</a> in which you will not be charged any additional fee. Please refer to respective Embassy and Visa fee information for further clarification.</span>			
	</div>		
			
	<div class="item active">	
	 <span class="subtitle1">Here at <a href="<?=base_url();?>index.php/" title="https://www.turkeyevisa.online/">turkeyevisa.online</a> we have a dedicated team available to offer you step by step support in the case that you require any clarification at any stage of the application process. Using our service will ensure that your application is authorised without error of any nature. Most of the cases whereby applicant <a href="https://www.turkeyevisa.online/" title="turkey evisa application">e-Visa</a> is denied is due to small mistakes, inconsistency and negligence at the time of application and this will eventually result in denial to enter Turkey. </span> 			
	</div>	


		
	</div> 

	</div>
	
    	<div class="col-md-5 col-xs-12">							
			<img src="<?php echo BASETHEMEPATH;?>img/slide1.png" style=" margin-top: 56px;" class="img-responsive" alt="about-u">		
		</div>	  
	</div>       
 
 </div>    
 </section>
  <div class="arrow-down"></div>

<!-- Reviews start -->
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
		 
			<span class="subtitle">Our application service is simple to use, hassle free with a focus on accuracy. Our advisors check your<a href="https://www.turkeyevisa.online/index.php/application" title="turkey visa application"> Turkey Application</a> before submission on multiple occasions to ensure no error has been committed for authorisation. In case of information inaccuracy at the point of data entry,  an advisor from our follow up team will contact you via email/phone at your convenience, to allocate 24x7 Email updates and support.</span><br />

			<br />
			<span class="subtitle">We provide a Quick, Easy and Secure process to obtaining your <a href="https://www.turkeyevisa.online" title="turkey evisa application online">e-Visa</a>. It takes just 5 minutes to <a href="https://www.turkeyevisa.online/application" title="Apply turkey visa">apply online.</a></span>
			<br>	<br>
			<p>Our secure online system, with just 3 simple steps: <a href="https://www.turkeyevisa.online/application" title="fill online turkey visa application">Fill Application</a>, Pay Online and Get e-Visa authorisation via email- all required, before you can safely <a href="https://www.turkeyevisa.online" title="Travel to turkey">travel to Turkey</a>.</p>

<p>We provide 3 levels of processing options- Normal, Urgent and Immediate Service includes weekends & National holidays, to suit your timing needs.</p>

<p>You can contact our USA based office Monday to Friday. For more details please see our <a href="https://www.turkeyevisa.online/index.php/contact-us" title="Turkey evisa contact">contact us page.</a></p>
		
			<a href="<?=base_url();?>index.php/application" title="apply turkey visa online" class="btn">Apply Visa</a>           

			</div>
          </div>
          <!-- Single photo end -->
          
     

        </section>
            
        </section>
        <!-- Reviews end -->

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