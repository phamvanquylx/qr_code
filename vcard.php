<?php require_once('header.php'); ?>
				<div class="row">				
					<div class="col-xs-12 col-sm-8">
						<div id="qr-generator">
							<ul class="nav nav-tabs">
								<li><a href="index.php"><span class="glyphicon glyphicon-link"></span> Url</a></li>
								<li class="active"><a><span class="glyphicon glyphicon-credit-card"></span> VCard</a></li>
								<li><a href="text.php"><span class="glyphicon glyphicon-align-left"></span> Text</a></li>
								<li><a href="email.php"><span class="glyphicon glyphicon-envelope"></span> Email</a></li>
								<li><a href="sms.php"><span class="glyphicon glyphicon-pencil"></span> SMS</a></li>
								<li><a href="facebook.php"><span class="glyphicon glyphicon-thumbs-up"></span> Facebook</a></li>
								<!-- <li><a href="location.php"><span class="glyphicon glyphicon-map-marker"></span> Location</a></li> -->
							</ul>
							<div class="tab-content">
								<div id="menu2" class="tab-pane in active">
								  <h3 class="qr-coming">vCard QR Code</h3>
								  <form class="qr-vcard-form">
									  <fieldset>
									    <legend>Your Name: </legend>
									    <input type="text" name="your_name" placeholder="Your Name" required>
									  </fieldset>
									  <fieldset>
									    <legend>Phone Number: </legend>
									    <input type="number" name="phone_number" placeholder="Phone Number" required>
									  </fieldset>
									  <fieldset>
									    <legend>Email: </legend>
									    <input type="email" name="email" placeholder="Email" required>
									  </fieldset>
									  <fieldset>
									    <legend>Company: </legend>
									    <input type="text" name="company" placeholder="Company">
									  </fieldset>
									  <fieldset>
									    <legend>Street: </legend>
									    <input type="text" name="street" placeholder="Street">
									  </fieldset>
									  <fieldset>
									    <legend>City: </legend>
									    <input type="text" name="city" placeholder="City">
									  </fieldset>
									  <fieldset>
									    <legend>State: </legend>
									    <input type="text" name="state" placeholder="State">
									  </fieldset>
									  <fieldset>
									    <legend>Country: </legend>
									    <input type="text" name="country" placeholder="Country">
									  </fieldset>
									  <fieldset>
									    <legend>Website: </legend>
									    <input type="text" name="website" placeholder="Website">
									  </fieldset>										  						  
								  	<button type="button" class="qr-submit-form qr-submit-form--vcard"><span class="glyphicon glyphicon-refresh"></span> Create QR Code</button>
								  	<a class="qr-btn-reload" href="vcard.php"><span class="glyphicon glyphicon-repeat"></span> Reload</a>
								  </form>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-4">
						<div id="qr-result">
							<div class="spinner-wrapper off">
								<div class="spinner">
								  <div class="dot1"></div>
								  <div class="dot2"></div>
								</div>
							</div>								
							<div class="wrapper-qr__img">
								<img src="img/adquest_qr.png" alt="" disabled>
								<div class="qr-chose" disabled>
								    <span class="qr-chose__text">
								        Format:
								    </span>
								    <div class="qr-chose__toggle open active" data-img="png">
								        .PNG
								    </div>
								    <div class="qr-chose__toggle open" data-img="jpg">
								        .JPG
								    </div>
								    <div class="qr-chose__toggle off">
								        .SVG
								    </div>
								</div>
								<div class="qr-btn">
									<a href="#" disabled><span class="glyphicon glyphicon-download-alt"></span> Dowload</a>
								</div>
							</div>
						</div>
					</div>						
				</div>
<?php require_once('footer.php'); ?>