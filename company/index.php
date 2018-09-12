<?php
include 'header.php';
include 'menu.php';
?>
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->


			<!-- start banner Area -->
			<section class="testimonial-area relative">
				<div class="overlay-bg overlay"></div>
				<div class="container"><br>
				    <div class="row">
						<div class="active-testimonial">
							<div class="single-testimonial item d-flex flex-row">
								<div class="thumb">
									<i class="fa fa-star" aria-hidden="true"></i>
								</div>
								<div class="desc">
								<h4 mt-30>Package A</h4>
									<p>
										Package details
									</p>
									
									<button type="button" class="genric-btn success circle" data-toggle="modal" data-target="#myModal_A">Order Now</button>
								</div>
							</div>
							<div class="single-testimonial item d-flex flex-row">
								<div class="thumb">
									<i class="fa fa-star" aria-hidden="true"></i>
								</div>
								<div class="desc">
									<h4 mt-30>Package B</h4>
									<p>
										Package details
									</p>
									<button type="button" class="genric-btn success circle" data-toggle="modal" data-target="#myModal_B">Order Now</button>
								
								</div>
							</div>	
							<div class="single-testimonial item d-flex flex-row">
								<div class="thumb">
									<i class="fa fa-star" aria-hidden="true"></i>
								</div>
								<div class="desc">
									<h4 mt-30>Package C</h4>
									<p>
										Package details
									</p>
									<button type="button" class="genric-btn success circle" data-toggle="modal" data-target="#myModal_C">Order Now</button>
								
								</div>
							</div>							
						</div>					
					</div><br>
					<div class="row  d-flex align-items-center justify-content-end">
						<div class="banner-content col-lg-6 col-md-12">
							<h1>
								We Provide  <br>
								<span>Solutions</span> that <br>
								Brings <span>Joy</span>							
							</h1>
							<a href="contact.php" class="primary-btn2 header-btn text-uppercase">Hire Us Now!</a>
						</div>	
						<div class="banner-content col-lg-6 col-md-12">
							<!-- Start WOWSlider.com BODY section -->
							<div id="wowslider-container1">
							<div class="ws_images"><ul>
									<li><img src="data1/images/img_bg_1.jpg" alt="Image 1" title="" id="wows1_0"/></li>
									<li><img src="data1/images/img_bg_2.jpg" alt="Image 2" title="" id="wows1_1"/></li>
									<li><img src="data1/images/img_bg_3.jpg" alt="Image 3" title="" id="wows1_2"/></li>
									<li><img src="data1/images/img_bg_4.jpg" alt="Image 4" title="" id="wows1_3"/></li>
								</ul></div>
								<div class="ws_bullets"><div>
									<a href="#" title="Image 1"><span><img src="data1/tooltips/img_bg_1.jpg" alt="Image 1"/>1</span></a>
									<a href="#" title="Image 2"><span><img src="data1/tooltips/img_bg_2.jpg" alt="Image 2"/>2</span></a>
									<a href="#" title="Image 3"><span><img src="data1/tooltips/img_bg_3.jpg" alt="Image 3"/>3</span></a>
									<a href="#" title="Image 4"><span><img src="data1/tooltips/img_bg_4.jpg" alt="Image 4"/>4</span></a>
								</div></div></div>
							</div>	
							<script type="text/javascript" src="engine1/wowslider.js"></script>
							<script type="text/javascript" src="engine1/script.js"></script>
							<!-- End WOWSlider.com BODY section -->
						</div>	<br>					
					</div>
				</div>
			</section>
			<!-- End banner Area -->

<?php
include 'footer.php';
?>
<!-- Modal A-->
            <div id="myModal_A" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">
                                Order Now!
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" id="reused_form" action="mail.php">
                                <p> Send your message in the form below and we will get back to you as early as possible. </p>
                                <div class="form-group">
                                    <label for="name"> Service:</label>
                                    <input type="text" class="form-control" id="service" name="service" value="Package A" required readonly maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="email"> Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="name"> Message:</label>
                                    <textarea class="form-control" type="textarea" name="message" id="message" placeholder="Your Message Here" maxlength="6000" rows="7"></textarea>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs">Send! &rarr;</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

			<!-- Modal B-->
            <div id="myModal_B" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">
                                Order Now!
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" id="reused_form" action="mail.php">
                                <p> Send your message in the form below and we will get back to you as early as possible. </p>
                                <div class="form-group">
                                    <label for="name"> Service:</label>
                                    <input type="text" class="form-control" id="service" name="service" value="Package B" required readonly maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="email"> Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="name"> Message:</label>
                                    <textarea class="form-control" type="textarea" name="message" id="message" placeholder="Your Message Here" maxlength="6000" rows="7"></textarea>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs">Send! &rarr;</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			
			<!-- Modal C-->
            <div id="myModal_C" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">
                                Order Now!
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" id="reused_form" action="mail.php">
                                <p> Send your message in the form below and we will get back to you as early as possible. </p>
                                <div class="form-group">
                                    <label for="name"> Service:</label>
                                    <input type="text" class="form-control" id="service" name="service" value="Package C" required readonly maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="email"> Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="name"> Message:</label>
                                    <textarea class="form-control" type="textarea" name="message" id="message" placeholder="Your Message Here" maxlength="6000" rows="7"></textarea>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs">Send! &rarr;</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>