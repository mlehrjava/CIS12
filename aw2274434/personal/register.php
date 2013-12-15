<?php
ob_start();
session_start();
require ('inc/config.inc.php');
$page_title = 'Registration';
include ('inc/header.html');
?>
	<style>
div#body_container>a.tab01 {
	background:url(inc/img/button-hov.png) no-repeat center;
	}
</style>




<!-------------------------------------Register------------------------------------->
				
				<?php
				

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					
					
					
					require ('../mysqli_connect.php');
					
					$trimmed = array_map('trim', $_POST);
					$fn = $ln = $e = $p = FALSE;
					$errors = array();
					
					
					if 	(empty($trimmed['username'])){
						$errors[] = 'You forgot to enter your username.';
						} else {
						$un = mysqli_real_escape_string($dbc, $trimmed['username']);
						}
						
						if (!preg_match('/^\s*[A-Za-z0-9_\s]{4,30}\s*$/', $trimmed['username'])){
						$errors[] = 'You may not use one or more of characters that you provided in your username.';
						} else {
						$un = mysqli_real_escape_string($dbc, $trimmed['username']);
						}	

						if ($result = @mysqli_query($dbc, 'SELECT * FROM aw2274434_personal_users WHERE username = "'.$trimmed['username'].'"'))	{
							if (mysqli_num_rows($result) > 0){
								$errors[] = "Username already taken";
								} else {
								$un = mysqli_real_escape_string($dbc, $trimmed['username']);
								}
							}						
						
					if 	(empty($trimmed['first_name'])){
						$errors[] = 'You forgot to enter your first name.';
						} else {
						$fn = mysqli_real_escape_string($dbc, $trimmed['first_name']);
						}
					
					if (!preg_match('/^\s*[A-Za-z-.\'\s]{2,40}\s*$/', $trimmed['first_name'])){
						$errors[] = 'You may not use one or more of characters that you provided in your first name.';
						} else {
						$fn = mysqli_real_escape_string($dbc, $trimmed['first_name']);
						}
	
					if (empty($trimmed['last_name'])) {
						$errors[] = 'You forgot to enter your last name.';
						} else {
						$ln = mysqli_real_escape_string($dbc, $trimmed['last_name']);
						}
						
					if (!preg_match('/^\s*[A-Za-z-.\'\s]{2,40}\s*$/', $trimmed['last_name'])){
						$errors[] = 'You may not use one or more of characters that you provided in your last name.';
						} else {
						$ln = mysqli_real_escape_string($dbc, $trimmed['last_name']);
						}
					
					if (empty($trimmed['email'])) {
						$errors[] = 'You forgot to enter your email address.';
						} else {
						$e = mysqli_real_escape_string($dbc, $trimmed['email']);
						}

					if (!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $trimmed['email'])){
						$errors[] = 'You may not use one or more of characters that you provided in your email.';
						} else {
						$e = mysqli_real_escape_string($dbc, $trimmed['email']);
						}
						
					if ($result = @mysqli_query($dbc, 'SELECT * FROM aw2274434_personal_users WHERE email = "'.$trimmed['email'].'"'))	{
							if (mysqli_num_rows($result) > 0){
								$errors[] = "E-mail already registered";
								} else {
								$e = mysqli_real_escape_string($dbc, $trimmed['username']);
								}
							}	
					
					if (!empty($trimmed['pass1'])) {
						if ($trimmed['pass1'] != $trimmed['pass2']) {
							$errors[] = 'Your password did not match the confirmed password.';
						} else {
							$p = mysqli_real_escape_string($dbc, $trimmed['pass1']);
							}
					} else {
					$errors[] = 'You forgot to enter your password.';
					}

					if (!preg_match('/^[a-z0-9_-]{6,40}$/', $trimmed['pass1'])){
						$errors[] = 'You may not use one or more of characters that you provided in your password. Please use 6-20 characters, a-z, 0-9, "_", and "-" only.';
						} else {
						$p = mysqli_real_escape_string($dbc, $trimmed['pass1']);
						}
						

						
						
						
						
					
						
	
					if (empty($errors)) {
					
						$a = md5(uniqid(rand(), true));
					
						$q = "INSERT INTO aw2274434_personal_users (username, first_name, last_name, email, pass, reg_date) VALUES ('$un', '$fn', '$ln', '$e', SHA1('$p'), NOW() )";		
						$r = @mysqli_query ($dbc, $q);
						
						if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

				
				$body = "Thank you for registering at <whatever site>. To activate your account, please click on this link:\n\n";
				$body .= BASE_URL . 'activate.php?x=' . urlencode($e) . "&y=$a";
				mail($trimmed['email'], 'Registration Confirmation', $body, 'From: allison@ccr.tv');
				
				
				echo '<h3>You are now a registered user. A confirmation email has been sent to your address. Please click on the link in that email in order to activate your account.</h3>';
				include ('inc/footer.html');
				exit(); 
				
			} else { 
				echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			}
			}
					 
					
	
				mysqli_close($dbc);}
				?>
				<h1 class="tabtitle">Register</h1>
				<form action="register.php" method="post">
                	<p>Username: <input type="text" name="username" size="15" maxlength="20" value="<?php if (isset($trimmed['username'])) echo $trimmed['username']; ?>" /></p>
					<p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" /></p>
					<p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
					<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($trimmed['email'])) echo $trimmed['email']; ?>"  /> </p>
					<p>Password: <input type="password" name="pass1" size="10" maxlength="40" value="<?php if (isset($trimmed['pass1'])) echo $trimmed['pass1']; ?>"  /></p>
					<p>Confirm Password: <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($trimmed['pass2'])) echo $trimmed['pass2']; ?>"  /></p>
					<p><input type="submit" name="submit" value="Register" /></p>
				</form>

<!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>