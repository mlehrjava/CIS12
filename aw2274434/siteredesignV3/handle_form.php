	<?php
	include ('inc/header.html');
	?>
		
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
					<p>We will reply to you at <i>$email</i>.</p>\r\n";
					} else {
					echo '<p class="error">Please go back and fill out the form again.</p>';}

				$mail_to = 'allison@ccr.tv';
				$subject = 'Message from an isshinryu karate site visitor: '.$name."\r\n";
				$body_message = 'From: '.$name."\r\n";
				$body_message .= 'E-mail: '.$email."\r\n";
				$body_message .= 'Phone: '.$phone."\r\n";
				$body_message .= 'Message: '.$message."\r\n";

				$headers = 'From: '.$email."\r\n";
				$headers .= 'Reply-To: '.$email."\r\n";
				$mail_status = mail($mail_to, $subject, $body_message, $headers);

					if ($mail_status) { ?>
						<script language="javascript" type="text/javascript">
							alert('Thank you for the message. We will contact you shortly.');
							window.location = 'contact_form.php';
						</script><?php}
						else { ?>
						<script language="javascript" type="text/javascript">
							alert('Message failed. Please, send an email to allison@ccr.tv');
							window.location = 'contact_form.php';
						</script><?php
						}
			?>
		</div>
	</div>
</div>
</body>
</html>