<?php require_once('header.php'); ?>
				<div class="row">				
					<div class="col-xs-12 col-sm-8">
						<div id="qr-generator">
							<ul class="nav nav-tabs">
								<li><a href="index.php"><span class="glyphicon glyphicon-link"></span> Url</a></li>
								<li><a href="vcard.php"><span class="glyphicon glyphicon-credit-card"></span> VCard</a></li>
								<li><a href="text.php"><span class="glyphicon glyphicon-align-left"></span> Text</a></li>
								<li><a href="email.php"><span class="glyphicon glyphicon-envelope"></span> Email</a></li>
								<li><a href="sms.php"><span class="glyphicon glyphicon-pencil"></span> SMS</a></li>
								<li class="active"><a><span class="glyphicon glyphicon-thumbs-up"></span> Facebook</a></li>
								<!-- <li><a href="location.php"><span class="glyphicon glyphicon-map-marker"></span> Location</a></li> -->
							</ul>
							<div class="tab-content">
								<div id="menu1" class="tab-pane in active">
									<h3 class="qr-coming">SMS QR Code</h3>
									<form>
									  <fieldset>
									    <legend>Size:</legend>
										<div class="qr-control">
									  		<input type="radio" name="size" class="qr-size" value="250x250">250x250
										</div>
										<div class="qr-control">
									  		<input type="radio" name="size" class="qr-size" value="320x320" checked>320x320
										</div>
									  </fieldset>
									  <fieldset>
									    <legend>Encoding:</legend>
										<div class="qr-control">
									    	<input type="radio" name="encoding" class="qr-encoding" value="UTF-8" checked>UTF-8<br>
										</div>
										<div class="qr-control">
									    	<input type="radio" name="encoding" class="qr-encoding" value="Shift_JIS">Shift_JIS<br>
										</div>
										<div class="qr-control">
									    	<input type="radio" name="encoding" class="qr-encoding" value="ISO-8859-1">ISO-8859-1<br>
										</div>
									  </fieldset>
									  <fieldset class="qr-input-sms qr-input--setting">
									    <legend>Error correction:</legend>
									    <select name="correction" class="qr-correction">
									    	<option value="L" selected>L</option>
									    	<option value="M">M</option>
									    	<option value="Q">Q</option>
							    			<option value="H">H</option>
									    </select>
									  </fieldset>
									  <fieldset class="qr-input-sms qr-input--content">
									    <legend>Your Facebook URL: </legend>
									    <input type="text" name="facebook" placeholder="https://www.facebook.com/" required>
									  </fieldset>								  
									  <button type="button" class="qr-submit-form qr-submit-form--facebook"><span class="glyphicon glyphicon-refresh"></span>Create QR Code</button>
									  <a class="qr-btn-reload" href="javascript:location.reload();"><span class="glyphicon glyphicon-repeat"></span> Reload</a>
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
