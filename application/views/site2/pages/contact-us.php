    <!-- Teaser start --> <style>  #ima{  float: right;    margin-right: -36px;    margin-top: -78px;  }  </style>

        <!-- Contact start -->
        <section id="contact" class="container wow bounceInUp" data-wow-offset="50">
          <div class="row">
            <div class="col-md-12">
              <h2>Contact Us</h2>
			  	<span class="underline">&nbsp;</span>  
				<br>
            </div>
            <div class="col-md-4 col-xs-12 pull-right">
            
              <div class="contact-box">
                <img src="<?php echo BASETHEMEPATH;?>img/contact-box-img1.jpg" alt="contact-img">
                <div class="contact-box-name"><span class="highlight">Address</span></div>
                <div class="contact-box-phon">  <span class="address">Evisas.Online</span>, 529 Cedar Dr, Irving, TX 75061, USA</div>
               
                <div class="clearfix"></div>
              </div>
              <div class="contact-box-border">&nbsp;</div>

              <div class="contact-box-divider">&nbsp;</div>

            
              <div class="contact-box">
                <img src="<?php echo BASETHEMEPATH;?>img/contact-box-img2.jpg" alt="contact-img">
                <div class="contact-box-name"><span class="highlight">Monday To Friday</span></div>
               
                <div class="contact-box-email"> 9:30 am to 5:30pm</div>
                <div class="clearfix"></div>
              </div>
              <div class="contact-box-border">&nbsp;</div>

              <div class="contact-box">
                <img src="<?php echo BASETHEMEPATH;?>img/contact-box-img3.jpg" alt="contact-img">
                <div class="contact-box-name"><span class="highlight">US Customers</span></div>
                <div class="contact-box-phon"><span class="highlight">Toll Free:</span>18778376771</div>
                <div class="contact-box-email"><span class="highlight">Email:</span> info@turkeyevisa.online</div>
                <div class="clearfix"></div>
              </div>
              <div class="contact-box-border">&nbsp;</div>
            </div>
            <div class="col-md-8 col-xs-12 pull-left">
              <span class="address"><span class="highlight">Address:</span>  Evisas.Online, 529 Cedar Dr, Irving, TX 75061, USA</span></p>
               <?=$message?>
                <form  action="<?php echo ('contact/send'); ?>" method="post" id="contact-form" name="contact-form">

                  <div class="alert hidden" id="contact-form-msg"></div>

                  <div class="form-group">
                    <input type="text" class="form-control first-name text-field" name="first-name" placeholder="First Name:">
                    <input type="text" class="form-control last-name text-field" name="last-name" placeholder="Last Name:">
                    <div class="clearfix"></div>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control subject text-field" name="subject" placeholder="Subject:">
                  </div>

                  <div class="form-group">
                    <input type="email" class="form-control email text-field" name="email" placeholder="Email:">
                  </div>

                  <div class="form-group">
                    <textarea class="form-control message" name="comments" placeholder="Message:"></textarea>
                  </div>
                  
                    <input type="submit" class="btn submit-message" name="submit-message" value="Submit Message">
                  

                </form>
              </div>

            </div>
          </section>	
<br>
<br>		  
          <!-- Contact end -->

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