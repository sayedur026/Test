<?php 
include 'header.php';
include 'menu.php'; 
echo '<br><br>';
if(isset($_GET['sent'])){
	if($_GET['sent']=='t'){
		echo '<center><font color="green">Message has been sent.</font></center>';
	}
	else if($_GET['sent']=='f'){
		echo '<center><font color="red">Message could not be sent</font></center>';
	}
	else if($_GET['sent']=='n'){
		echo '<center><font color="purple">No Email/Phone Entered</font></center>';
	}
}
?>

<section class="whole-wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-6 skill-left">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
								<span class="heading-meta">Get in Touch</span>
								<h2 class="colorlib-heading">Contact</h2>
							</div>
							<div class="col-md-5">
							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</div>
								<div class="colorlib-text">
									<p><a href="mailto:rubelparvez2810@gmail.com">rubelparvez2810@gmail.com</a></p>
								</div>
							</div>

							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<div class="colorlib-text">
									<p>Mirpur, Dhaka, Bangladesh</p>
								</div>
							</div>

						</div>
						</div>
						<div class="col-lg-6 skill-right">
							<div class="col-md-15 col-md-push-1">
								<div class="row">
									<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInRight">
										<form  method="POST" action="mail.php">
											<div class="form-group">
												<input type="text" name="name" id="name" class="form-control" placeholder="Name">
											</div>
											<div class="form-group">
												<input type="text" name="email" id="email" class="form-control" placeholder="Email/Phone" required>
											</div>
											<div class="form-group">
												<input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
											</div>
											<div class="form-group">
												<textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
											</div>
											<div class="form-group">
												<input type="submit" class="btn btn-primary btn-send-message" value="Send Message">
											</div>
										</form>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>	
			</section>

<?php
include 'footer.php';
?>