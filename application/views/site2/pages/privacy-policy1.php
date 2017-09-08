    <!-- Teaser start --> <style>  #ima{  float: right;    margin-right: -36px;    margin-top: -78px;  }  </style>

       <section class="container" id="services">    
		<div class="row">      
			<div class="col-md-12 title">         
				<h2>Privacy Policy</h2>           
					<span class="underline">&nbsp;</span>         
			</div>            				
			<!-- privacy policy Box start -->       
			<div class="col-md-12">     
				<div data-wow-offset="100" class="service-box wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">      
					      
							<div class="clearfix"></div>       
<p class="service-content">Your personal information is protected with us. Who use SSL security</p>  
<p class="service-content">We are committed to protection the privacy of visitors to our website, as specified in this privacy policy. By applying for a visa to Turkey with www.quick-visa.org, you agree to accept the following conditions of our privacy statement. </p>
<p class="service-content">We will collect, personal data - information that is required to complete a visa application such as your full name, passport number, date of birth, nationality, expiry date and date of arrival in Turkey.</p>
<p class="service-content">Personal data submitted on this website will be used for processing the Turkey visa pre-approval letter by Quick-visa. And your information will be stored at the Turkey Immigration System until you exit Turkey after arriving</p>
<p class="service-content">www.Quick-visa.org is committed to providing the highest level of security and privacy. All transactions of user authentication including credit cards processing are conducted using SSL (Secure Socket Layer) technology, supported by your browser, which encrypts all information that is sent to us. Our security certificate has been verified by Symantec Corporation (USA)</p>
<p class="service-content">Quick visa Visa Service uses cookies and other technologies to enhance your online experience and allow you to quickly and easily complete our online application process.</p>
<p class="service-content">Once the Visa is issued by Turkey Immigration Department, you cannot update the information but you can reapply for a new visa.</p>
<p class="service-content">We have right to collect and store such information as IP address, browser type or operating system type. All the information is highly confidential and this information helps diagnose problems, monitor traffic and site usage.</p>
<p class="service-content">In the website we have integrated online payment tool, PayPal pocket electronic payment. For ease of payment, we accept credit cards, PayPal and direct bank transfer online. So, all credit card information, your PayPal account is required to pay visa fees, and is done through third </p>
<p class="service-content">If you have questions or concerns about this policy please contact us at: info@quick-visa.org</p>
				</div>       
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