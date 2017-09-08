<!-- ***************** - Main Content Area - ***************** -->

<div id="main" class="tt-slider-">
  <div class="main-area">
    <!-- ////////////////////////////////////////////////////////// -->
    <!-- ***************** - Content Start Here - ***************** -->
    <!-- ////////////////////////////////////////////////////////// -->
    <!-- ***************** - Breadcrumbs Start Here - ***************** -->
    <div class="tools"> <span class="tools-top"></span>
      <div class="frame">
        <h1>Check Status</h1>
        <a class="ka_button small_button small_cherry search_form" href="<?=base_url();?>index.php/application">Apply Now</a>
        <p class="breadcrumb"><a href="<?php echo BASETHEMEPATH;?>index.php/home">Home</a>
          <!--<a href="<?php echo BASETHEMEPATH;?>index.php/application">Application</a>-->
          <span class='current_crumb'>Visa Status </span></p>
      </div>
      <!-- END frame -->
      <span class="tools-bottom"></span> </div>
    <!-- END tools -->
    <main role="main" id="content" class="content_blog">
      <!--<div class="shadow_img_frame shadow_banner_regular">

        <div class="img-preload"><img class="attachment-fadeIn" alt="" src="<?php echo BASETHEMEPATH;?>images/check-status.jpg" style="display: inline;"></div>

      </div>-->
      <br/>
      <div class="two_thirds">
        <!-- ***************** - START Contact Form - ***************** -->
        <div class="tt-column">
          <!-- <div style="background:#333;padding:3px;margin-bottom:10px;" class="curve2">

                    <div style="padding-top:10px;color: #ff5400;" class="cl44">Basic Fields

<div class="cl45">Fields marked in '<span class="rdclr">*</span>' are Mandatory</div></div>

</div>-->
          <div id="contact-form-8801" role="form">
            <?php if($visa_status){?>
            <table>
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
            </table>
            <?php echo $message_content;?>
            <?php } else {?>
            <form class="input-blocks clearfix" method="post" action="<?=base_url();?>index.php/application/check-status">
              <?php if(validation_errors()){?>
              <div class="error"> <?php echo validation_errors(); ?>
            <?php echo $message_content;?> </div>
              <?php }?>
            <?php echo $message_content;?>
              <div>
                <label class="name" for="8801-name">Application Number/Reference Number<span class="rdclr">*</span></label>
                <input type="text" name="applicationnumber" id="applicationnumber">
              </div>
             <!-- <div>
                <label class="grunion-field-label email" for="8801-email">Email Address<span class="rdclr">*</span></label>
                <input type="email" name="email" id="email">
              </div>
              <div>
                <label class="grunion-field-label email" for="8801-email">PassPort Number <span class="rdclr">*</span></label>
                <input type="text" name="passport" id="passport">
              </div>-->
              <div class="line">
                <div>
                  <input type="submit" class="ka_button small_button small_cherry" value="Check Status" name="checkstatus">
                  <!--<a class="ka_button small_button small_cherry" href="#">Check Status</a>-->
                </div>
              </div>
            </form>
            <?php }?>
            </div>
        </div>
        <!-- ***************** - END Contact Form - ***************** -->
        <p>&nbsp;</p>
      </div>
      <br class="clear">
      <div style="height:20px;" class="hr_gap"></div>
    </main>
    <!-- END main #content -->
    <aside class="sidebar_blog" id="sidebar" role="complementary">
      <div class="sidebar-widget">
        <div class="tt-icon-box">
						  <span class="fa-stack fa-5x"><i style="color:#E15258;" class="fa fa-circle fa-stack-2x"></i><i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse"></i></span>
						  <h1>3 steps away from a Turkey visa.</h1>
						  <p><strong>Fill out the Secured Form</strong> -  No documents to send off.  <strong>Confirm And Pay</strong> - Get Turkey <strong>Visa by Email</strong></p>
					   </div>
      </div>
      <!--<div class="sidebar-widget">               

					<div class="module_round_box_outer">

					<div class="module_round_box">

					<div class="s5_module_box_1">

					<div class="s5_resize_below_columns_inner s5_module_box_2" style="min-height: 313px;">

					<div class="s5_mod_h3_outer">

					<h3 class="s5_mod_h3"><span class="s5_h3_first">Information</span></h3>

					</div>

																	



					<div class="jlnews_slider">

						<div id="jlnews_slider" style="height: 1560px; top: -780px;">

									<span class=""><div><p>Unfortunately if you do a mistake filling e-visa from is invalid and you will need to process a new one. So we have a strict no-refund policy.
Please choose your country or region of travel document. People with dual nationality should choose the nationality according to the passport to be used for the travel.
</p> ...</div>
 <a href="<?php echo BASETHEMEPATH;?>index.php/application" class="ka_button small_button small_coolblue">Apply Now!</a>
</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>-->
      <!--<div class="sidebar-widget">

                          <div class="info-box info-box__tertiary">

                            <div class="inner- wrapper">

                            <h3 class="info-box-title">Over 30 Years Experience</h3>

                            <h3 class="info-box-title"> We are Fast, Reliable and Safe </h3>

                            <h3 class="info-box-title">No Login or Sign-up required</h3>

                            <h3 class="info-box-title">Secure &amp; Encrypted payment</h3>

                            <h3 class="info-box-title">24/7 online support</h3>

                            <a href="<?php echo BASETHEMEPATH;?>index.php/application" class="ka_button small_button small_coolblue">Apply Now!</a>

                         

                    </div>

					</div>

                 </div>-->
      <div class="sidebar-widget">
        <div class="inner- wrapper">
          <div class="tt-icon-box"> <a href="<?php echo BASETHEMEPATH;?>index.php/application"><img src=" <?php echo BASETHEMEPATH;?>images/secure.jpg"></a> </div>
        </div>
      </div>
      <div class="sidebar-widget">
        <div class="module_round_box_outer">
          <div class="module_round_box">
            <div class="s5_module_box_1">
              <div class="s5_resize_below_columns_inner s5_module_box_2" style="min-height: 313px;">
                <div class="s5_mod_h3_outer">
                  <h3 class="s5_mod_h3"><span class="s5_h3_first">FAQS </span></h3>
                </div>
                <ul class="menu">

								<li class="item-343"><a href="<?php echo BASETHEMEPATH;?>index.php/faq">Can I apply for a student or a job e-Visa?</a></li>

								<li class="item-344"><a href="<?php echo BASETHEMEPATH;?>index.php/faq">How much does cost e-visa?</a></li>

								<li class="item-129"><a href="<?php echo BASETHEMEPATH;?>index.php/faq">
How many days my Turkish e-visa valid?</a></li>

								<li class="item-128"><a href="<?php echo BASETHEMEPATH;?>index.php/faq">Can I have a look Sample e-Visa?</a></li>

								

								</ul>
                <a href="<?php echo BASETHEMEPATH;?>index.php/faq" class="ka_button small_button small_cherry">Read More</a> </div>
            </div>
          </div>
        </div>
      </div>
      <!--<div class="sidebar-widget">

						<div class="module_round_box_outer">

								<div class="module_round_box">

										<div class="s5_module_box_1">

												<div style="min-height: 313px;" class="s5_resize_below_columns_inner s5_module_box_2">

														<div class="s5_mod_h3_outer">

														<h3 class="s5_mod_h3"><span class="s5_h3_first">Apply With Confidence</span></h3>

														</div>

																										



														<div class="jlnews_slider">

															<div style="height: 1560px; top: -780px;" id="jlnews_slider">

																		<span class="">

																	<a title="Lawyer Application" class="" href="#">

																		Lawyer Application			</a>

																	<div><p>Begonia information systems is in final stages of launching a revolutionary application for lawyers / advocates which enable them to supervise and control their day to day office activities, getting and storing all their data at one place and make to reminders to their clients about their cases. This wonderful concept will be launched very soon in the market.</p> ...</div>

																</span>

																

																	</div>

																	</div>

																	

												</div>

										</div>

								</div>

						</div>

					</div>-->
      <!--<div class="sidebar-widget">                 

<div class="module_round_box_outer">

<div class="module_round_box">

<div class="s5_module_box_1">

<div class="s5_resize_below_columns_inner s5_module_box_2" style="min-height: 313px;">

<div class="s5_mod_h3_outer">

<h3 class="s5_mod_h3"><span class="s5_h3_first">Blog</span></h3>

</div>

												

<ul class="menu">

<li class="item-343"><a href="#" title="Video Email Marketing">01/01/15  Happy New Year</a></li>

<li class="item-344"><a href="#" title="Video Email System">15/01/15 azberlajon established embrassy in Turkey</a></li>

<li class="item-129"><a href="#" title="Community based Job Portal">30/01/15 Genuine Turkey visa by Hazran</a></li>

<li class="item-128"><a href="#" title="Health, Fitness &amp; Diet Portal">10/02/15 Genuine Turkey visa by Jebus</a></li>

<li class="item-130"><a href="#" title="Online Buying Network Solution Application">22/02/15 Genuine Turkey visa by Ramlal</a></li>

<li class="item-127"><a href="#" title="Streaming Videos and Social Networking">28/02/15 Genuine Turkey visa by Leela</a></li>

  

</ul>

<a href="<?php echo BASETHEMEPATH;?>index.php/blog" class="ka_button small_button small_coolblue">Read All Posts</a>

</div>

</div>

</div>

</div>  

</div>-->
    </aside>
    </aside>
    <!-- END sidebar -->
  </div>
  <!-- END main-area -->
  <div id="footer-top">&nbsp;</div>
</div>
<!-- END main -->
