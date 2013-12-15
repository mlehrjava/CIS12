<?php
ob_start();
session_start();
require ('inc/config.inc.php');
include ('inc/header.html');
?>
	<!-----------------------Contact----------------------->
    <?php
    require ('../mysqli_connect.php');

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$trimmed = array_map('trim', $_POST);
				$errors = array();
				
	if (empty($_POST['cf_name'])) {
				$errors[] = 'You forgot to enter your first name.';
				} else {
				$name = mysqli_real_escape_string($dbc, $trimmed['first_name']);
				}
				
	if (!preg_match('/^\s*[A-Za-z-.\'\s]{2,40}\s*$/', $_POST['cf_name'])){
				$errors[] = 'You may not use one or more of characters that you provided in your name.';
				} else {
				$name = mysqli_real_escape_string($dbc, $trimmed['cf_name']);
				}

				
	if (empty($_POST['cf_email'])) {
				$errors[] = 'You forgot to enter your email address.';
				} else {
				$email = mysqli_real_escape_string($dbc, $trimmed['cf_email']);
				}
				
			if (!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $trimmed['cf_email'])){
				$errors[] = 'You may not use one or more of characters that you provided in your email.';
				} else {
				$email = mysqli_real_escape_string($dbc, $trimmed['cf_email']);
				}
		
		if (!preg_match('/^\s*[0-9-\(\)]{9,20}\s*$/', $trimmed['cf_phone'])){
				$errors[] = 'You may not use one or more of characters that you provided in your phone number.';
				} else {
				$phone = mysqli_real_escape_string($dbc, $trimmed['cf_phone']);
				}
				
	if (!preg_match('/^\s*[A-Za-z-.\'\,\(\)\s]{2,250}\s*$/', $_POST['cf_message'])){
				$errors[] = 'You may not use one or more of characters that you provided in your message.';
				} else {
				$message = mysqli_real_escape_string($dbc, $trimmed['cf_message']);
				}
				
				if (empty($errors)) { 
				$q = "UPDATE aw2274434_personal_messages SET name='$name', email='$email', phone='$phone', message='$message'";
					$r = @mysqli_query ($dbc, $q);
					if (mysqli_affected_rows($dbc) == 1) {
					echo "<p>Thank you, <b>$name</b>, for the following message:<br />
							<tt>$message</tt></p>
							<p>We will reply to you at <i>$email</i>.</p>\r\n";
					} else {
					echo '<p class="error">The message could not be sent due to a system error. We apologize for any inconvenience.</p>'; // Public message.
					echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>';
					}
				} else { 
				echo '<p class="error">The following error(s) occurred:<br />';
				foreach ($errors as $msg) {
					echo " - $msg<br />\n";}
					echo '</p><p>Please try again.</p>';
					}



		
		}
		
		?>
 
    
	
	
	
	
    <form action="handle_form.php" method="post">
			<fieldset><legend>Enter your information in the form below:</legend>
			<p><label>Name: <input type="text" name="cf_name" size="20" maxlength="30" value="<?php if (isset($trimmed['cf_name'])) echo $trimmed['cf_name']; ?>"></textarea></label></p>
			<p><label>Email Address: <input type="text" name="cf_email" size="20" maxlength="40" value="<?php if (isset($trimmed['cf_email'])) echo $trimmed['cf_email']; ?>"></textarea></label></p>
			<p><label>Phone: <input type="text" name="cf_phone" size="20" maxlength="40" value="<?php if (isset($trimmed['cf_phone'])) echo $trimmed['cf_phone']; ?>"></textarea></label></p>
			<p><label>Message: <textarea name="cf_message" rows="3" cols="40" maxlength="240" value="<?php if (isset($trimmed['cf_message'])) echo $trimmed['cf_message']; ?>"></textarea></label></p>
			</fieldset>
			<p align="center"><input type="submit" name="cf_submit" value="Submit My Information" /></p>
		</form>
    <!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>