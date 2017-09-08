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
<p class="service-content">Your personal information is protected by us, we use SSL encryption security for this purpose.</p> 
 
<p class="service-content">We are committed to protecting the privacy of visitors/users/applicants to our website, as specified in this privacy policy statement. By applying for an <a href="https://www.turkeyevisa.online/index.php/about-us" title="turkish evisa application service">e-Visa application service</a> to Turkey with <a href="<?=base_url();?>index.php/ "> turkeyevisa.online </a>you agree to accept the following conditions of our privacy statement in full.</p>

<p class="service-content"> We will request personal data- information that is required to complete a <a href="http://turkeyevisa.online/index.php/application" title="turkey evisa application">e-Visa application</a> such as your full name, passport number, date of birth, nationality, expiry date and arrival into Turkey date- all the expected data which you would associate with an <a href="https://www.turkeyevisa.online/index.php/processing" title="Turkey Visa process">e-Visa application process</a>.</p>

<p class="service-content"> Personal data submitted on this website will be used for the processing purposes only of the Turkey e-Visa pre approval letter by <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> and your information will be stored at the e-Visa application system until you exit Turkey once your visit dates have expired.</p>

<p class="service-content"><a href="<?=base_url();?>index.php"> turkeyevisa.online </a>is committed to providing the highest level of security and privacy of your data. All transactions of visitors/users/applicants authentication including credit card processing are conducted using SSL (Secure 128-bit SSL Encryption application Secure Socket Layer) technology, supported by your browser, which encrypts all information that is sent to us. Our security certificate has been verified by COMODO CA Ltd.</p>

<p class="service-content"><a href="<?=base_url();?>index.php"> turkeyevisa.online</a> e-Visa service uses cookies and other technologies to enhance your online experience and allow you to quickly and easily complete our <a href="<?=base_url();?>index.php/application">online e-Visa application</a> process.</p>

<p class="service-content"> <a href="<?=base_url();?>index.php"> turkeyevisa.online</a> holds the rights to collect and store such information as to your IP address, browser search engine identity or operating system type for the purposes of managing the processing functions to better serve its visitors/users/applicants ongoing. All the information is regarded as highly confidential and this information in turn helps with diagnosing problems, monitoring of traffic and site usage</p>

<p style="font-size:18px;">The data or information provided by you may be used for the following purposes:</p>

<ul type="a"class="service-content">
<li>To offer you services provided by our website.</li>
<li>To personalise the website settings to the visitors/users/applicants needs.</li>
<li>To provide you access to different pages and services available on this website.</li>
<li>For the purposes of communicating with you via email, post, telephone or any other form of communication.</li>
<li>For the purpose of maintaining a record of visitors/users/applicants on a database.</li>
<li>To provide you with notifications, updates and alerts based on services requested by you.</li>
</ul>

<p style="font-size:18px;">The following data may be collected by our website, without limitations:</p>
<ul type="a"class="service-content">
<li>Personal information such as noted above; Nationality, visitors/users/applicants Personal Details, Passport Information, Contact Information and Payment Details</li>
<li><b>IT related information: </b>IP address, Web-browser search engine identity, operating system type, cookie information.</li>
<li><b>Payment Details: </b> Debit or Credit card, PayPal details and Direct Bank Transfer.</li>
</ul>

<p class="service-content"><b>Third Party Websites: </b>The data provided by you on this website might be made accessible to third party websites at different points of time for the purpose of handling certain services such as payments, Official e-Visa application system, delivery of products/purchases or quality control, among others. The use of any data by third party websites is for the sole purpose of dealing with services mentioned to these parties by <a href="<?=base_url();?>index.php/">turkeyevisa.online</a>. Any use which extends beyond these services is strictly prohibited. In addition, data used by third parties must be in keeping with the Privacy terms of statement mentioned here. The visitors/users/applicants of our website will not be notified in advance if or when such a transfer occurs.</p>

<p class="service-content"><b>Payment Security: </b> Within the website we have integrated online payment tools, PayPal pocket electronic payment. For ease of payment facilitation, we accept Debit or Credit cards, PayPal and Direct Bank Transfer online.</p>

<p class="service-content">If you have any questions or concerns about this privacy policy, please don’t hesitate to contact us at: <a href="<?=base_url();?>index.php/contact-us">info@turkeyevisa.online</a></p>


<p class="service-content"> In order to maintain good service standards and protect visitors/users/applicants data, we regularly review the Privacy Policy and from time to time make an update, the latest Privacy Policy will be made available on this website for visitors/users/applicants.</p>
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