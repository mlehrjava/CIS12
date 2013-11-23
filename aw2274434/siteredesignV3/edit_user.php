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
		</div>
			
		<div id="leftbox">
		<?php 
			$page_title = 'Edit a User';
			echo '<h1>Edit a User</h1>';

			if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
				$id = $_GET['id'];
				} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
				$id = $_POST['id'];
				} else {
				echo '<p class="error">This page has been accessed in error.</p>';
				exit();}

			require ('../mysqli_connect.php'); 

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$errors = array();
				
			if (empty($_POST['first_name'])) {
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
				
			if (empty($_POST['email'])) {
				$errors[] = 'You forgot to enter your email address.';
				} else {
				$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
				}
	
			if (empty($errors)) { 
				$q = "SELECT user_id FROM aw2274434_users WHERE email='$e' AND user_id != $id";
				$r = @mysqli_query($dbc, $q);
				if (mysqli_num_rows($r) == 0) {
					$q = "UPDATE aw2274434_users SET first_name='$fn', last_name='$ln', email='$e' WHERE user_id=$id LIMIT 1";
					$r = @mysqli_query ($dbc, $q);
					if (mysqli_affected_rows($dbc) == 1) {
					echo '<p>The user has been edited.</p>';	
					} else {
					echo '<p class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
					echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>';
					}
					} else {
					echo '<p class="error">The email address has already been registered.</p>';
					}
					} else { 
					echo '<p class="error">The following error(s) occurred:<br />';
					foreach ($errors as $msg) {
						echo " - $msg<br />\n";}
						echo '</p><p>Please try again.</p>';
						}
				}


			$q = "SELECT first_name, last_name, email FROM aw2274434_users WHERE user_id=$id";		
			$r = @mysqli_query ($dbc, $q);
			if (mysqli_num_rows($r) == 1) {
				$row = mysqli_fetch_array ($r, MYSQLI_NUM);
				echo '<form action="edit_user.php" method="post">
					<p>First Name: <input type="text" name="first_name" size="15" maxlength="15" value="' . $row[0] . '" /></p>
					<p>Last Name: <input type="text" name="last_name" size="15" maxlength="30" value="' . $row[1] . '" /></p>
					<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="' . $row[2] . '"  /> </p>
					<p><input type="submit" name="submit" value="Submit" /></p>
					<input type="hidden" name="id" value="' . $id . '" />
					</form>';
				} else { 
				echo '<p class="error">This page has been accessed in error.</p>';
				}

		mysqli_close($dbc);
		?>

		</div>
		</div>
	</div>
</body>
</html>