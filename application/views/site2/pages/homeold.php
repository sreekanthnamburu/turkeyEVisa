    <!-- Teaser start --> <style>  #ima{  float: right;    margin-right: -36px;    margin-top: -78px;  }  </style>
    <section id="teaser">
      <div class="container">
        <div class="row">
		
          <div class="col-md-7 col-xs-12 pull-right">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Wrapper for slides start -->
              <div class="carousel-inner">
                <div class="item active">
                  <h1 class="title">3 simple steps your Turkey Visa to fly!
                    <span class="subtitle">Quick, Easy and Secure process to get Visa. Apply Here</span></h1>
                    <div class="car-img">
                      <img src="<?php echo BASETHEMEPATH;?>img/slide2.png" class="img-responsive" alt="">
                    </div>
                  </div>
                <div class="item">
                    <h1 class="title">Turkish Tourist & Business Visa in 30 min
                      <span class="subtitle">Our Secure Online System Receive Within 24 Hours Of Applying</span></h1>
                      <div class="car-img">
                        <img src="<?php echo BASETHEMEPATH;?>img/slide3.png" class="img-responsive" alt="">
                      </div>
                </div>
					<div class="item">
                    <h1 class="title"> Apply for your Family Turkey Visa
                      <span class="subtitle">Family, Group and Private Visas to Turkey</span></h1>
                      <div class="car-img">
                        <img src="<?php echo BASETHEMEPATH;?>img/slide1.png" class="img-responsive" alt="">
                      </div>
                    </div>			
					<!--<div class="item">              
						<h1 class="title">Apply your Turkey Visa Online           
						 <span class="subtitle">Using our secure online application service.</span></h1>                 
						 <div class="car-img">                   
							<img src="<?php echo BASETHEMEPATH;?>img/slide4.png" class="img-responsive" alt="">      
						</div>             
					</div>-->
                  </div>
				  
                  <!-- Wrapper for slides end -->

                  <!-- Slider Controls start -->
                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                  <!-- Slider Controls end -->
                </div>
              </div>
			  
              <div class="col-md-5 col-xs-12 pull-left">
                <div class="reservation-form-shadow">
				<h2 style="color: black; text-align: center; font-weight: 900; font-size: 22px;">Fill e-Visa Application Form</h2>
				<!--<p style="padding:15px;text-align:justify;color:black"><strong>Information Note:</strong> If you have dual nationality, you should use the nationality according the passport you will be using for the travel to Turkey. You always have to make sure that the country of travel document is not different from what is on the e-visa. For example if you are dual national used one country of travel document to get the e-visa but carry the other country of travel document at the time travelling will make your visa invalid.</p>-->
                  <form action="<?php echo $base_url;?>index.php/application" method="post" name="car-select-form" validate="no-validate" id="visaform">

                    <div class="alert alert-danger hidden" id="car-select-form-msg">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <strong>Note:</strong> All fields required!
                    </div>
                    
                    <!-- Car select start -->
                    <div class="styled-select-car">
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
                    <!-- Car select end -->
                    <div class="location">
                      <div class="input-group pick-up">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>Arrival</span>
                         <?php echo date_picker("arrivaldate",date('Y'),date('Y')+5,$arrivaldatemonth,$arrivaldateday,$arrivaldateyear);?>
                      </div>
                      </div>
                    <!-- Pick-up location start -->
                    <div class="location">
                      <div class="input-group pick-up">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>Email</span>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required="">
                      </div>
                      </div>
                      <!-- Pick-up location end -->
                    
                    <!-- Pick-up date/time start -->
                     <div class="location">
                      <div class="input-group pick-up">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>Phone</span>
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number"  required="">
                      </div>
                      </div>
                      
                    <!-- Pick-up date/time end -->
                    
                   
                    <button type="submit" class="submit" name="submit"  id="checkoutModalLabel">continue application<i class="glyphicon glyphicon-chevron-right"></i></button>
                  </form> 

                </div>
              </div>

            </div>
          </div>
        </section>
        <div class="arrow-down"></div>
        <!-- Teaser end -->

<div class="col-md-12 text-center">
               <!-- <h2>Disclaimer:</h2>
                <span class="underline">&nbsp;</span>-->
                <br/><p><b>Disclaimer:</b>We are a Non-Govt Turkish Visa Application Service Provider company assisting travelers with online immigration services.We provide without difficulty online visa registration services which will be verified

by our service experts to avoid errors.</p>
              </div>

		
        <!-- Services start -->
    <section id="services" class="container">    
		<div class="row">      
			<div class="col-md-12 title">         
				<h2>About Company</h2>           
					<span class="underline">&nbsp;</span>         
			</div>            				
			<!-- Service Box start -->       
			<div class="col-md-6">     
				<div class="service-box wow fadeInRight" data-wow-offset="100">      
					<div class="service-icon">></div>             
						<h3 class="service-title">Tourist & Business</h3>       
							<div class="clearfix"></div>       
								<p class="service-content">Applicants obtain their Turkish visa electronically, the e-Visa application can be submitted online, and the e-Visa document is sent via email. Tourists and short-term

business travelers have travel document must be valid for at least 6 months from the date you intend to enter Turkey. 
</p>         
				<!--<a class="popup-link-1" > <input type="submit" value="Read More"class="btn-gray" name="submit"></a>-->
				<!--<a href="javascript:void(0)" class="aboutus"> <input type="submit" value="Read More"class="btn-gray" name="submit">Read More. </a>-->
				<a class="about btn btn-gray">Read More</a>
				</div>       
			</div>       
			<!-- Service Box end -->	
			<!-- Service Box start -->   
			<div class="col-md-6">  
				<div class="service-box wow fadeInLeft" data-wow-offset="100">           
					<div class="service-icon">></div>     
					<h3 class="service-title">Application reviewed by experts</h3>         
						<div class="clearfix"></div>  
									
							<p class="service-content">We provide without difficulty online visa registration services which will be verified by our service experts to avoid errors. Our team is available to offer you whatever

help you need like If any issues or errors with your application, we will communciate by email, phone at your service 24/7.
</p>          
							<!--<a class="popup-link-2" > <input type="submit" value="Read More"class="btn-gray" name="submit"></a>	-->
<a class="about btn btn-gray">Read More</a>					
				</div>    
			</div>         
			<!-- Service Box end -->     
			
			<!-- Service Box start -->   
			<div class="col-md-6">  
				<div class="service-box wow fadeInLeft" data-wow-offset="100">      
					<div class="service-icon">></div>    
					<h3 class="service-title">FAQ</h3>
					  <br/>	<p class="service-content"></p>
					<h4>How much does cost e-visa?</h4>
					<div class="clearfix"></div>           
					 <p class="service-content">The e-visa Embabby fees from $20-60 depending on the country.</p>
  <p class="service-content">Plus our service fee of $60.  </p>     
					<p class="service-content"></p>
  <br/>
  	<p class="service-content"></p>
					<!--<a class="popup-link-3" > <input type="submit" value="Read More"class="btn-gray" name="submit"></a>-->
					<a class="privacy btn btn-gray">Read More</a>	
				</div>        
				
			</div>        
			<!-- Service Box end -->   
			<!-- Service Box start -->   
			<!-- <div class="col-md-6">   
			<div class="service-box wow fadeInRight" data-wow-offset="100">
			<div class="service-icon">+</div>           
			<h3 class="service-title">One Way Car Rentals</h3>    
            <div class="clearfix"></div>     
			<p class="service-content">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed  nonumy eirmod tempor invidunt ut labore et dolore magnaed aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren.</p>    
			</div>           
			</div>                   
			<div class="col-md-6">     
			<div class="service-box wow fadeInRight" data-wow-offset="100"> 
			<div class="service-icon">+</div>       
			<h3 class="service-title">One Way Car Rentals</h3> 
			<div class="clearfix"></div>   
			<p class="service-content">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed  nonumy eirmod tempor invidunt ut labore et dolore magnaed aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren.</p>        
			</div>    
			</div>     
			
			<div class="col-md-6">    
			<div class="service-box wow fadeInRight" data-wow-offset="100">  
			<div class="service-icon">+</div>    
            <h3 class="service-title">One Way Car Rentals</h3>       
			<div class="clearfix"></div>         
			<p class="service-content">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed  nonumy eirmod tempor invidunt ut labore et dolore magnaed aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren.</p>      
			</div>           
			</div>-->         
			<!-- Service Box end -->  
		</div>         
	</section>
        <!-- Services end -->
        


        <!-- Newsletter start -->
       <!-- <section id="newsletter" class="wow slideInLeft" data-wow-offset="300">
          <div class="container">
            <div class="row">
              <div class="col-md-12"><div class="alert hidden" id="newsletter-form-msg"></div></div>
              <div class="col-md-5 col-xs-12">
                <h2 class="title">Sign up for amazing offers 
                  <span class="subtitle">exclusive access for offers and promotions</span></h2>
                </div>
                <div class="col-md-7">
                  <div class="newsletter-form pull-left">
                    <form action="#" method="post" name="newsletter-form" id="newsletter-form">
                      <div class="input-group">
                        <input type="email" name="newsletter-email" class="form-control" placeholder="Enter your Email Address">
                        <span class="input-group-btn">
                          <input class="btn btn-default button" type="submit" value="send">
                        </span>
                      </div>
                    </form>
                  </div>
                  <div class="social-icons pull-right">
                    <ul>
                      <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a class="googleplus" href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </section>-->
          <!-- Newsletter end -->

<section data-wow-offset="300" class="wow slideInLeft animated" id="newsletter1" style="visibility: visible; animation-name: slideInLeft;">      
			<div class="container">      
				<div class="row">             
					<div class="col-md-12"><div id="newsletter-form-msg" class="alert hidden"></div></div>     
						<div class="pr-block col-md-4 col-sm-4 clearfix">			
							<div class="pr-blockL">1</div>			
							<div class="pr-blockR">				
								<h3 style="color:white; margin-top:18px">Fill out the secured Form</h3>		
								<p style="color:black">Secure online application saves time and checks for errors</p>			
						<!--<img id="ima"src="<?php echo BASETHEMEPATH;?>img/Steps.png">-->
							</div>		
						</div>       
						<div class="pr-block col-md-4 col-sm-4 clearfix">		
							<div class="pr-blockL">2</div>	
							<div class="pr-blockR">			
								<h3 style="color:white; margin-top:18px">Make your online payment</h3>			
								<p style="color:black">Accept Visa & Master credit & debit card payments easily & securely on the go, with SSL encryption.</p>			
							<!--<img id="ima"src="<?php echo BASETHEMEPATH;?>img/Steps.png">-->
							</div>		
						</div>         
						
						<div class="pr-block col-md-4 col-sm-4 clearfix">		
							<div class="pr-blockL">3</div>	
							<div class="pr-blockR">			
								<h3 style="color:white; margin-top:18px">Get Turkey Visa by email</h3>			
								<p style="color:black">Real time status updates will keep you informed </p>		
							</div>		
						</div>         
						<div class="clearfix"></div>     
				</div>   
			</div>   
		</section>

          <!-- Vehicles start -->
          <section id="vehicles" class="container">
            <div class="row">
              <div class="col-md-12">
                <h2 class="title wow fadeInDown" data-wow-offset="200">Visa <span class="subtitle">Fees</span></h2>
				
              </div>

              <!-- Vehicle nav start -->
              <div class="col-md-2 wow fadeInUp" data-wow-offset="100">
                <div id="vehicle-nav-container">
                  <ul class="vehicle-nav">
                    <li class="active"><a href="#vehicle-1">UK</a><span class="active">&nbsp;</span></li>
                    <li><a href="#vehicle-2">Dubai</a><span class="active">&nbsp;</span></li>
                    <li><a href="#vehicle-3">Saudi Arabia</a><span class="active">&nbsp;</span></li>
                    <li><a href="#vehicle-4">Qatar</a><span class"active">&nbsp;</span></li>
                    <li><a href="#vehicle-5">USA</a><span class="active">&nbsp;</span></li>
                    <li><a href="#vehicle-6">Norway</a><span class="active">&nbsp;</span></li>
					<li><a href="#vehicle-7">Canada</a><span class="active">&nbsp;</span></li>
					<li><a href="#vehicle-8">Netherlands</a><span class="active">&nbsp;</span></li>
					
                  </ul>
				
                </div>
				  <a class="more" > More</a>
              </div>
              <!-- Vehicle nav end -->
              
               <!-- Vehicle 1 data start -->
              <div class="vehicle-data" id="vehicle-1">
			   <div class="col-md-10" data-wow-offset="200">
				<table class="col-md-12">
					<tbody>
							<tr class="text-line">
								<th colspan="2">Price USD $20.00</th>
								<th class="row-green">Services</th>
								<th class="row-grey">Our Services</th>
								<th >Turkey Govt</th>
							</tr>
							
							<tr class="text-line">
								<td>Valid Days</td><td>180</td>
								<td class="row-green">Online Visa Application Service</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>	
							</tr>
							
							<tr class="text-line">
								<td>Stay (Days)</td><td>90</td>
								<td class="row-green">Retrieve Visa option in case lost e-Visa</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td>No.Of Entries</td><td>Multiple</td>
								<td class="row-green">Applications Checked for Errors</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Receive eVisa in adobe file (easy to print)</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Top Notch customer service</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Safe and secure processing</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">24/7 Support via Email</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Your application will reviewed by expert</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Group applications for Traveler</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">100% Money back if your visa is denied</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td ></td>
								<td class="row-grey"><a href="<?=base_url();?>index.php/application" class="btn2">Apply Now</a></td>
								<td ><a target="_blank" href="https://www.evisa.gov.tr/en/" class="btn2">Turkey .Gov</a></td>		
							</tr>
							
					</tbody>
				</table>
              </div>
			  </div>
			   
			   
              <!-- Vehicle 1 data end -->
              
              <!-- Vehicle 2 data start -->
              <div class="vehicle-data" id="vehicle-2">
                <div class="col-md-10" data-wow-offset="200">
				<table class="col-md-12">
					<tbody>
							<tr class="text-line">
								<th colspan="2">Price USD $90.00</th>
								<th class="row-green">Services</th>
								<th class="row-grey">Our Services</th>
								<th >Turkey Govt</th>
							</tr>
							
							<tr class="text-line">
								<td>Valid Days</td><td>180</td>
								<td class="row-green">Online Visa Application Service</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>	
							</tr>
							
							<tr class="text-line">
								<td>Stay (Days)</td><td>90</td>
								<td class="row-green">Retrieve Visa option in case lost e-Visa</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td>No.Of Entries</td><td>Multiple</td>
								<td class="row-green">Applications Checked for Errors</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Receive eVisa in adobe file (easy to print)</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Top Notch customer service</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Safe and secure processing</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">24/7 Support via Email</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Your application will reviewed by expert</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Group applications for Traveler</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">100% Money back if your visa is denied</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td ></td>
								<td class="row-grey"><a href="<?=base_url();?>index.php/application" class="btn2">Apply Now</a></td>
								<td ><a target="_blank" href="https://www.evisa.gov.tr/en/" class="btn2">Turkey .Gov</a></td>		
							</tr>
							
					</tbody>
				</table>
              </div>              </div>				
              

              <!-- Vehicle 2 data end -->
              
              <!-- Vehicle 3 data start -->
              <div class="vehicle-data" id="vehicle-3">
               <div class="col-md-10" data-wow-offset="200">
				<table class="col-md-12">
					<tbody>
							<tr class="text-line">
								<th colspan="2">Price USD $90.00</th>
								<th class="row-green">Services</th>
								<th class="row-grey">Our Services</th>
								<th >Turkey Govt</th>
							</tr>
							
							<tr class="text-line">
								<td>Valid Days</td><td>180</td>
								<td class="row-green">Online Visa Application Service</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>	
							</tr>
							
							<tr class="text-line">
								<td>Stay (Days)</td><td>90</td>
								<td class="row-green">Retrieve Visa option in case lost e-Visa</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td>No.Of Entries</td><td>Multiple</td>
								<td class="row-green">Applications Checked for Errors</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Receive eVisa in adobe file (easy to print)</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Top Notch customer service</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Safe and secure processing</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">24/7 Support via Email</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Your application will reviewed by expert</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">Group applications for Traveler</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td class="row-green">100% Money back if your visa is denied</td>
								<td class="row-grey"><img src="<?php echo BASETHEMEPATH;?>img/right.png"></td>
								<td ><img src="<?php echo BASETHEMEPATH;?>img/cross.png"></td>		
							</tr>
							<tr class="text-line">
								<td></td><td></td>
								<td ></td>
								<td class="row-grey"><a href="<?=base_url();?>index.php/application" class="btn2">Apply Now</a></td>
								<td ><a target="_blank" href="https://www.evisa.gov.tr/en/" class="btn2">Turkey .Gov</a></td>		
							</tr>
							
					</tbody>
				</table>
              </div>				
              </div>
            </div>
          </section>
          <!-- Vehicles end -->



          <!-- Reviews start -->
          <section id="reviews" class="container wow fadeInUp">
		  <section id="information" class="container">

          <!-- Single photo start -->
          <div data-wow-offset="100" class="row wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
            <div class="col-md-5 col-xs-12 pull-right">
              <img src="<?php echo BASETHEMEPATH;?>img/info-img.jpg" alt="Info Img" class="img-responsive">
            </div>
            <div class="col-md-5 pull-left">
              <h2 class="title">Quality Guaranteed</h2>
              <h3 class="subtitle">Here is an example with one single photo displayed on the right.</h3>
              <p>Here is some dummy text. <span class="my-tooltip" data-toggle="tooltip" title="" data-original-title="This is an demo tooltip!">Hover over me!</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vero voluptas delectus explicabo maxime ad qui incidunt! Saepe.</p>
              <a href="http://themeforest.net/item/car-rental-landing-page/8245093?ref=themeinjection" class="btn">More information</a>
              <a href="http://themeforest.net/item/car-rental-landing-page/8245093?ref=themeinjection" class="btn btn-gray">Buy this theme</a>
            </div>
          </div>
          <!-- Single photo end -->
          
          <!-- Video start -->
          <div data-wow-offset="50" class="row wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
            <div class="col-md-5 pull-left">
              <div class="video">
                <!-- Youtube iframe start -->
               <iframe height="315" frameborder="0" width="420" allowfullscreen="" src="//www.youtube.com/embed/mRJuidemjNo"></iframe>
                <!-- Youtube iframe end -->
              </div>
            </div>
            <div class="col-md-5 col-xs-12 pull-right"">
              <h2 class="title">Watch our info tour</h2>
              <h3 class="subtitle">You can also show youtube videos in this section!</h3>
              <p>Here is some dummy text. Lorem ipsum dolor sit amet, <span class="label label-default">This is an labeled text snippet!</span>, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vero voluptas delectus explicabo maxime ad qui incidunt! no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
          </div>
          <!-- Video end -->

        </section>
            
        </section>
        <!-- Reviews end -->



        <!-- Locations start -->
        <section id="locations">
          <div class="container location-select-container wow bounceInDown" data-wow-offset="200">
            <div class="row">
              <div class="col-md-9 col-md-offset-1">
                <div class="location-select">
                  <div class="row">
                  <form id="statusform" method="post" action="<?=$base_url;?>index.php/application/check-status-json">
                    <div class="col-md-4">
                      <h2>Check Status</h2>
                    </div>
                    
                    <div class="col-md-5 statusinput">
                        <input type="text" name="applicationnumber" class="form-control input-lg" id="applicationnumber" placeholder="Enter Application/Reference Number" required>
                    </div>
                    <div class="col-md-2 statusinput"><input type="submit" name="checkstatus" class="btn btn-primary btn-lg btn-block" value="checkstatus"></div>
                  </div></form>
                </div>
              </div>
            </div>
            <div class="arrow-down-location">&nbsp;</div>
          </div>
          <!--<div class="map wow bounceInUp" data-wow-offset="100"><!-- map by gmap3 --><!--</div>-->
		  

        </section>
        <!-- Locations end -->



       



        <!-- Partners start -->
        <section id="partners" class="wow fadeIn" data-wow-offset="50">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2>Meet Our Partners</h2>
                <span class="underline">&nbsp;</span>
                <p>To contribute to positive change and achieve our sustainability goals, we partner with many extraordinary organizations around the world. Their expertise enables us to do far more than we could alone, and their passion and talent inspire us. It is our pleasure to introduce you to a handful of the organizations whose accomplishments and commitments are representative of all the organizations we are fortunate to call our partners.</p>
              </div>
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



        <!-- Contact start -->
        <section id="contact" class="container wow bounceInUp" data-wow-offset="50">
          <div class="row">
            <div class="col-md-12">
              <h2>Contact Us</h2>
            </div>
            <div class="col-md-4 col-xs-12 pull-right">
              <h4 class="contact-box-title">Customer Center</h4>
              <div class="contact-box">
                <img src="<?php echo BASETHEMEPATH;?>img/contact-box-img1.jpg" alt="contact-img">
                <div class="contact-box-name">UK Customers Toll Free
 </div>
                <div class="contact-box-phon"><span class="highlight">Phone:</span> 0800 133 7567</div>
                <div class="contact-box-email"><span class="highlight">Email:</span> info@turkeyvisapro.com</div>
                <div class="clearfix"></div>
              </div>
              <div class="contact-box-border">&nbsp;</div>

              <div class="contact-box-divider">&nbsp;</div>

              <h4 class="contact-box-title">Change or Cancel Reservation</h4>
              <div class="contact-box">
                <img src="<?php echo BASETHEMEPATH;?>img/contact-box-img2.jpg" alt="contact-img">
                <div class="contact-box-name">Mike Smith</div>
                <div class="contact-box-phon"><span class="highlight">Phone:</span> 666-999-888</div>
                <div class="contact-box-email"><span class="highlight">Email:</span> connor@example.com</div>
                <div class="clearfix"></div>
              </div>
              <div class="contact-box-border">&nbsp;</div>

              <div class="contact-box">
                <img src="<?php echo BASETHEMEPATH;?>img/contact-box-img3.jpg" alt="contact-img">
                <div class="contact-box-name">Jane Doe</div>
                <div class="contact-box-phon"><span class="highlight">Phone:</span> 666-999-888</div>
                <div class="contact-box-email"><span class="highlight">Email:</span> connor@example.com</div>
                <div class="clearfix"></div>
              </div>
              <div class="contact-box-border">&nbsp;</div>
            </div>
            <div class="col-md-8 col-xs-12 pull-left">
              <p class="contact-info">To contact our Customer Service Team online, please fill the form and send message <br>
                <span class="address"><span class="highlight">Address:</span>  3-5 Excelsior House Balfour Road, Ilford, Essex IG1 4HP</span></p>
                <form action="#" method="post" id="contact-form" name="contact-form">

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

/*jQuery("#validate").click(function() {

     if (jQuery("#visaform").valid()) 

	 console.log('valid');

      else

        validator.focusInvalid();

    

     return false;

  });			*/				

						});

					</script>