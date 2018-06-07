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
								<li><a href="facebook.php"><span class="glyphicon glyphicon-thumbs-up"></span> Facebook</a></li>
								<li class="active"><a href="location.php"><span class="glyphicon glyphicon-map-marker"></span> Location</a></li>
							</ul>
							<div class="tab-content">
								<div id="menu1" class="tab-pane in active">
									<h3 class="qr-coming">SMS QR Code</h3>
									<form>
									  <fieldset>
									    <legend>Size:</legend>
										<div class="qr-control">
									  		<input type="radio" name="size" value="250x250" checked>250x250
										</div>
										<div class="qr-control">
									  		<input type="radio" name="size" value="320x320" <?php if(isset($_GET['size'])){ echo $_GET['size'] == '320x320' ? 'checked' : ''; } ?> >320x320
										</div>
									  </fieldset>
									  <fieldset>
									    <legend>Encoding:</legend>
										<div class="qr-control">
									    	<input type="radio" name="encoding" value="UTF-8" checked>UTF-8<br>
										</div>
										<div class="qr-control">
									    	<input type="radio" name="encoding" value="Shift_JIS" <?php if(isset($_GET['encoding'])){ echo $_GET['encoding'] == 'Shift_JIS' ? 'checked' : ''; } ?>>Shift_JIS<br>
										</div>
										<div class="qr-control">
									    	<input type="radio" name="encoding" value="ISO-8859-1" <?php if(isset($_GET['encoding'])){ echo $_GET['encoding'] == 'ISO-8859-1' ? 'checked' : ''; } ?>>ISO-8859-1<br>
										</div>
									  </fieldset>
									  <fieldset class="qr-input-sms qr-input--setting">
									    <legend>Error correction:</legend>
									    <select name="correction">
									    	<option value="L" <?php if(isset($_GET['correction'])){ echo $_GET['correction'] == 'L' ? 'selected' : ''; } ?>>L</option>
									    	<option value="M" <?php if(isset($_GET['correction'])){ echo $_GET['correction'] == 'M' ? 'selected' : ''; } ?>>M</option>
									    	<option value="Q" <?php if(isset($_GET['correction'])){ echo $_GET['correction'] == 'Q' ? 'selected' : ''; } ?>>Q</option>
									    	<?php if(isset($_GET['correction'])) { ?>
									    		<?php if($_GET['correction'] != 'Q' && $_GET['correction'] != 'M' && $_GET['correction'] != 'L') { ?>
									    			<option value="H" selected>H</option>
									    		<?php } else{ ?>
									    			<option value="H">H</option>
									    		<?php } ?>
								    		<?php } else{ ?>
								    			<option value="H">H</option>
								    		<?php } ?>
									    </select>
									  </fieldset>
									  <fieldset class="qr-input-sms qr-input-sms--number">
									    <legend>Latitude: </legend>
									    <input type="text" name="latitude">
									  </fieldset>
									  <fieldset class="qr-input-sms qr-input-sms--message">
									    <legend>Longitude: </legend>
									    <input type="text" name="longitude">
									  </fieldset>									  
									  <button type="submit"><span class="glyphicon glyphicon-refresh"></span>Create QR Code</button>
									  <a class="qr-btn-reload" href="location.php"><span class="glyphicon glyphicon-repeat"></span> Reload</a>
									</form>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-4">
						<div id="qr-result">
							<div class="wrapper-qr__img">
								<?php 
									if(isset($_REQUEST['phone_number']) && isset($_REQUEST['message']))
									{
										//capture from the form
										$size          = $_REQUEST['size'];
										$content 	   = "SMSTO:{$_REQUEST['phone_number']}:{$_REQUEST['message']}";
										$correction    = strtoupper($_REQUEST['correction']);
										$encoding      = $_REQUEST['encoding'];
								
										// form google chart api link
										$rootUrl = "http://chart.googleapis.com/chart?cht=qr&chs=$size&chl=$content&choe=$encoding&chld=$correction";
										
										// get file in folder
										$files1 = scandir('images/sms');
										$link 	= 'http://localhost/qr/qr_js/images/sms/';
										$files2 = $link.$files1['2'];
										// Save link -> file in folder
								?>

								<img src="<?= $rootUrl ?>" alt="">
								<div class="qr-chose">
								    <span class="qr-chose__text">
								         Format:
								    </span>
								    <div class="qr-chose__toggle active">
								        JPG
								    </div>
								    <div class="qr-chose__toggle">
								        EPS
								    </div>
								    <div class="qr-chose__toggle">
								        SVG
								    </div>
								</div>								
								<div class="qr-btn">
									<a href="<?= $files2 ?>" download><span class="glyphicon glyphicon-download-alt"></span> Dowload</a>
								</div>
								<?php
										$rootUrls = str_replace(" ", "+", $rootUrl);
										file_put_contents("images/sms/adquest_qr.png", fopen($rootUrls, 'r'));
									}
									else
									{
								?>
								<img src="img/adquest_qr.png" alt="" disabled>
								<div class="qr-chose">
								    <span class="qr-chose__text">
								         Format:
								    </span>
								    <div class="qr-chose__toggle active">
								        JPG
								    </div>
								    <div class="qr-chose__toggle">
								        EPS
								    </div>
								    <div class="qr-chose__toggle">
								        SVG
								    </div>
								</div>
								<div class="qr-btn">
									<a href="#" disabled><span class="glyphicon glyphicon-download-alt"></span> Dowload</a>
								</div>								
								<?php		

									}
								?>
							</div>
						</div>
					</div>						
				</div>
<?php require_once('footer.php'); ?>				
