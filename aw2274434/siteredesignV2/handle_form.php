<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Isshinryu karate</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta name="description" content="brief synapses of page"/>
	<meta name="keywords" content="important, keywords, about, page"/>
	<link rel="stylesheet" href="style/index.css" />
	<link rel="stylesheet" media="only screen and (max-width: 400px)" href="style/mobile.css" />
	<link rel="stylesheet" media="screen, handheld, print, projection href="style/mobile.css" />
</head>
<body>

<div id="head_container">
 <h1 id="page_title">Isshinryu karate</h1>
</div>


<div id="body_container">
  <a class="tab01" id="tabs" href="index.php" tabindex="1">&nbsp; Home &nbsp;</a>
  <a class="tab02" id="tabs" href="about.php" tabindex="2">About the Dojo</a>
  <a class="tab03" id="tabs" href="instructors.php" tabindex="3">Instructors</a>
  <a class="tab04" id="tabs" href="terms.php" tabindex="4">Terminology</a>
  <a class="tab05" id="tabs" href="awards.php" tabindex="5">Awards and Honors</a>
  


	<div class="tabcont" id="tab01cont">
	<img id="logo" src="fistsbeige7.png" alt="" />
		<div id="rightbox">
				<div id="control_panel">
				<ul id="navlist" >
				<li><a class="navtab" id="contact_tab" href="contact_form.php">Contact Form</a></li>
				<li><a class="navtab" id="reg_tab" href="register.php">Register</a></li>
				<li><a class="navtab" id="users_tab" href="view_users.php">View Users</a></li>
				</ul>
				</div>
			For more information and to book your free trial, call: <br />
			760-568 0961<br /><br />

			68225<br />
			Ramon Road<br />
			at Whispering Palms<br />
			Cathedral City<br />
				
		</div>
		<div id="leftbox">
			<?php 
				if (!empty($_REQUEST['cf_name'])) {
					$name = $_REQUEST['cf_name'];
				} else {
					$name = NULL;
					echo '<p class="error">You forgot to enter your name!</p>';
				}

				if (!empty($_REQUEST['cf_email'])) {
					$email = $_REQUEST['cf_email'];
					} else {
					$email = NULL;
					echo '<p class="error">You forgot to enter your email address!</p>';}

				if (empty($_REQUEST['cf_phone'])) {
					$phone = $_REQUEST['cf_phone'];}
				
				if (!empty($_REQUEST['cf_message'])) {
					$message = $_REQUEST['cf_message'];
					} else {
					$message = NULL;
					echo '<p class="error">You forgot to enter your message!</p>';}

				if ($name && $email && $message) {
					echo "<p>Thank you, <b>$name</b>, for the following message:<br />
					<tt>$message</tt></p>
					<p>We will reply to you at <i>$email</i>.</p>\n";
					} else {
					echo '<p class="error">Please go back and fill out the form again.</p>';}

				$mail_to = 'plumrat@gmail.com';
				$subject = 'Message from a site visitor '.$name;
				$body_message = 'From: '.$name."\n";
				$body_message .= 'E-mail: '.$email."\n";
				$body_message .= 'Phone: '.$phone."\n";
				$body_message .= 'Message: '.$message;

				$headers = 'From: '.$email."\r\n";
				$headers .= 'Reply-To: '.$email."\r\n";
				$mail_status = mail($mail_to, $subject, $body_message, $headers);

					if ($mail_status) { ?>
						<script language="javascript" type="text/javascript">
							alert('Thank you for the message. We will contact you shortly.');
							//window.location = 'contact_form.php';
						</script><?php}
						else { ?>
						<script language="javascript" type="text/javascript">
							alert('Message failed. Please, send an email to plumrat@gmail.com');
							//window.location = 'contact_form.php';
						</script><?php
						}
			?>
		</div>
	</div>
</div>
</body>
</html>