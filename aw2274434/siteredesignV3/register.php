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
				$page_title = 'Register';

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					require ('../mysqli_connect.php');
					$errors = array();
	
					if 	(empty($_POST['first_name'])){
						$errors[] = 'You forgot to enter your first name.';
						} else {
						$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
						}
					
					if (!preg_match('/^\s*[A-Za-z-.\'\s]{2,40}\s*$/', $_POST ['first_name'])){
						$errors[] = 'You may not use one or more of characters that you provided in your first name.';
						} else {
						$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
						}
	
					if (empty($_POST['last_name'])) {
						$errors[] = 'You forgot to enter your last name.';
						} else {
						$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
						}
						
					if (!preg_match('/^\s*[A-Za-z-.\'\s]{2,40}\s*$/', $_POST ['last_name'])){
						$errors[] = 'You may not use one or more of characters that you provided in your last name.';
						} else {
						$fn = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
						}
					
					if (empty($_POST['email'])) {
						$errors[] = 'You forgot to enter your email address.';
						} else {
						$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
						}

					if (!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $_POST ['email'])){
						$errors[] = 'You may not use one or more of characters that you provided in your email.';
						} else {
						$fn = mysqli_real_escape_string($dbc, trim($_POST['email']));
						}
					
					if (!empty($_POST['pass1'])) {
						if ($_POST['pass1'] != $_POST['pass2']) {
							$errors[] = 'Your password did not match the confirmed password.';
							} else {
							$p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
							}
					} else {
					$errors[] = 'You forgot to enter your password.';
					}

					if (!preg_match('/^[a-z0-9_-]{6,20}$/', $_POST ['pass1'])){
						$errors[] = 'You may not use one or more of characters that you provided in your password. Please use 6-20 characters, a-z, 0-9, "_", and "-" only.';
						} else {
						$fn = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
						}
	
					if (empty($errors)) {
						$q = "INSERT INTO aw2274434_users (first_name, last_name, email, pass, registration_date) VALUES ('$fn', '$ln', '$e', SHA1('$p'), NOW() )";		
						$r = @mysqli_query ($dbc, $q);
						if ($r) { 
							echo '<h1>Thank you!</h1>
							<p>You are now a registered user.</p><p><br /></p>';	
							} else {
							echo '<h1>System Error</h1>
							<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
							echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
							}
							mysqli_close($dbc);
							exit();
							} else { 
							echo '<h1>Error!</h1>
							<p class="error">The following error(s) occurred:<br />';
							foreach ($errors as $msg) { 
								echo " - $msg<br />\n";
								}
							echo '</p><p>Please try again.</p><p><br /></p>';
							}
	
				mysqli_close($dbc);}
				?>
				<h1 class="tabtitle">Register</h1>
				<form action="register.php" method="post">
					<p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
					<p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
					<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
					<p>Password: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  /></p>
					<p>Confirm Password: <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  /></p>
					<p><input type="submit" name="submit" value="Register" /></p>
				</form>

				</div>
	</div>	
</div>



</body>
</html>