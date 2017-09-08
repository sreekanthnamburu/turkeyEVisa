    <!-- Teaser start --> <style>  #ima{  float: right;    margin-right: -36px;    margin-top: -78px;  }  </style>

       <section class="container" id="services">    
		<div class="row">      
			<div class="col-md-12 title">         
				<h2>Cancellation & Refund Policy</h2>           
					<span class="underline">&nbsp;</span>         
			</div>            				
			<!-- privacy policy Box start -->       
			<div class="col-md-12">     
				<div data-wow-offset="100" class="service-box wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">      
					      
							<div class="clearfix"></div>       
<ul type="a" class="service-content">
<li>Customers may request for e-Visa application service cancellation and/or refund within 5 days from the date of submission. Unless it has caused by our fatal mistake, our agency service fee may not be refunded.</li>
<li><b>Pre - e-Visa Authorization </b>: Refund except Int'l Credit Card handling fee($5)</li>
<li><b>Post - e-Visa Authorization</b> : Refund except government processing/authorization Fee(20$) and Int'l Credit Card handling fee($5) and administration fee($10) </li>
<li>Turkish Government charges a mandatory, non-refundable processing fee for each e-Visa Application submission. Customers who request for service cancellation and refund after his or her e-Visa Travel Authorization has already been issued will be refunded except for the government processing fee per applicant and int'l credit card handling fee and administration fee.</li>
<li>However our agency service fee will be refunded by customer's request only in case of a fatal mistake such as non-submission of e-Visa application within 24 hours, mailing service failure due to our careless mistake, any inconvenience caused by our system error, etc.</li>
<li>If an application is denied,customer will be refunded except government processing/authorization Fee(20$) and Int'l Credit Card handling fee($5) and administration fee($10).</li>
<li>Customers may request for application service cancellation and/or refund within 5 days from the date of submission. To cancel your e-Visa Application services or to request a refund, please notify our Department of Customer Service by email at <a href="<?=base_url();?>index.php/contact-us">info@turkeyevisa.online</a>. Please include your full name, birth date, passport number and the last four digits of the credit card number used for the transaction.</li>
<!--<li>Your credit card statement will read "AW*quickevisa.com442033188334" to inform the customer what will appear on their credit card statement.</li>-->
</ul>



</ul></div>       
			</div>       
		  
		</div>         
	</section>



      



       

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