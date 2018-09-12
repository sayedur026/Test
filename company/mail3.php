<?php
if(isset($_POST['email'])){
	$email = $_POST['email'];
	$name="";
	if(isset($_POST['name'])){
		$name = $_POST['name'];
	} else {
		$name = "Unknown";
	}
	$service="";
	if(isset($_POST['service'])){
		$service = $_POST['service'];
	} else {
		$service = "Unknown";
	}
	$subject="";
	if(isset($_POST['subject'])){
		$subject = $_POST['subject'];
	} else {
		$subject = "Unknown";
	}
	$message="";
	if(isset($_POST['message'])){
		$message = $_POST['message'];
	} else {
		$message = "Unknown";
	}


	require 'php-mailer-master/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'rubelparvez2810@gmail.com';                 // SMTP username
	$mail->Password = '@r123456';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('rubelparvez2810@gmail.com', 'Sent From Website');
	$mail->addAddress('rubelparvez2810@gmail.com', 'Sent From Website');

	$mail->isHTML(true);                                  // Set email format to HTML
	$body = "Name: ".$name."<br/>Service: ".$service."<br/>Email/Phone: ".$email."<br/>Subject: ".$subject."<br/>Message: ".$message;
	$mail->Subject = $subject;
	$mail->Body    = $body;
	$mail->AltBody = $body;

	if(!$mail->send()) {
		//echo 'Message could not be sent.';
		//echo 'Mailer Error: ' . $mail->ErrorInfo;
		header("Location:contact.php?sent=f");
		die();
	} else {
		//echo 'Message has been sent';
		header("Location:contact.php?sent=t");
		die();
	}

} else {
	//echo 'No Email/Phone Entered';
	header("Location:contact.php?sent=n");
	die();
}