<?php
include 'header.php';
include 'menu.php';
?>

			<!-- Start testimonial Area -->
			<section class="testimonial-area relative section-gap">
				<div class="overlay overlay-bg"></div>
				<div class="container">
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
					</div>
				</div>	
			</section>
			<!-- End testimonial Area -->
			
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
<?php
include 'footer.php';
?>