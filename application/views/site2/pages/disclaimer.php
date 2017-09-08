    <!-- Teaser start --> <style>  #ima{  float: right;    margin-right: -36px;    margin-top: -78px;  }  </style>

       <section class="container" id="services">    
		<div class="row">      
			<div class="col-md-12 title">         
				<h2>Disclaimer</h2>           
					<span class="underline">&nbsp;</span>         
			</div>            				
			<!-- privacy policy Box start -->       
			<div class="col-md-12">     
				<div data-wow-offset="100" class="service-box wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">      
					      
							<div class="clearfix"></div>       
<ul type="a" class="service-content">
<li>	<a href="<?=base_url();?>index.php/">turkeyevisa.online</a> is not responsible for any incorrect or inaccurate content posted on the <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> website whether caused by users of <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> services or by any of the equipment or programming associated with or utilized by <a href="<?=base_url();?>index.php/">turkeyevisa.online.</a> <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> takes no responsibility for third party advertisements which are posted on this <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> website, nor does it take any responsibility for the goods or services provided by its advertisers. <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> is not responsible for the conduct, whether online or offline, of any User of <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> assumes no responsibility for any error, omission, interruption, deletion, defect, delay in operation or transmission, communications line failure, theft or destruction or unauthorized access to, or alteration of, any User or Member communication. <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> is not responsible for any problems or technical malfunction of any telephone network or lines, computer online systems, servers or providers, computer equipment, software, failure of any email or players due to technical problems or traffic congestion on the Internet, including any injury or damage to Users or to any person's computer related to or resulting from participation or downloading materials in connection with <a href="<?=base_url();?>index.php/">turkeyevisa.online.</a> Under no circumstances shall <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> be responsible for any loss or damage, including personal and mental injury or death, resulting from use of <a href="<?=base_url();?>index.php/">turkeyevisa.online,</a> attendance at a <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> event, from any content posted on or through <a href="<?=base_url();?>index.php/">turkeyevisa.online,</a> or from the conduct of any Users of <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> services, whether online or offline. <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> services are provided "AS-IS" and as available and <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> expressly disclaims any warranty of fitness for a particular purpose or non-infringement. <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> cannot guarantee and does not promise any specific results from use of the <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> services.</li>

<li>	Limitation of Liability in no event shall <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> be liable to you or any third party for any direct, indirect, consequential, exemplary, incidental, special or punitive damages, including lost  profit damages arising from your use of the services, even if <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> has been advised of the possibility of such damages. Notwithstanding anything to the contrary contained herein, <a href="<?=base_url();?>index.php/">turkeyevisa.online's</a> liability to you from any cause whatsoever and regardless of the form of the action, will at all times be limited to the amount paid, if any, by you to <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> for the <a href="<?=base_url();?>index.php/">turkeyevisa.online</a> services.</li>

<li>	Privacy Use of turkeyevisa.online is also governed by our Privacy Policy, which is displayed on the website.</li>

<li>	Recommendation Service and <a href="<?=base_url();?>index.php/application">Application</a> Service: The content of the website is for general information only and does not constitute any form of advice or recommendation upon which a specific decision should be made. The links , URLs or hyperlinks referenced or included anywhere on the Site or any other form of link or re-direction of your connection to, with or through the Site, does not constitute an endorsement by, nor does it incur any obligation, responsibility or liability on the part of the Site.</li>

<li>	Each provision of this section 9 shall be construed separately and will apply even if, for any reason, one or other of these sentences is held inapplicable or unenforceable.</li>
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