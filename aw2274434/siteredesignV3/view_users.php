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

			$page_title = 'View the Current Users';
			echo '<h1 class="tabtitle">Registered Users</h1>';
			require ('../mysqli_connect.php');
			$display = 8;

			if (isset($_GET['p']) && is_numeric($_GET['p'])) {
				$pages = $_GET['p'];
				} else {
				$q = "SELECT COUNT(user_id) FROM aw2274434_users";
				$r = @mysqli_query ($dbc, $q);
				$row = @mysqli_fetch_array ($r, MYSQLI_NUM);
				$records = $row[0];
				if ($records > $display) { 
					$pages = ceil ($records/$display);
				} else {
					$pages = 1;
				}
				}
			if (isset($_GET['s']) && is_numeric($_GET['s'])) {
				$start = $_GET['s'];
				} else {
				$start = 0;
				}
				
			$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'rd';
			switch ($sort) {
				case 'ln':
					$order_by = 'last_name ASC';
					break;
				case 'fn':
					$order_by = 'first_name ASC';
					break;
				case 'rd':
					$order_by = 'registration_date ASC';
					break;
				default:
					$order_by = 'registration_date ASC';
					$sort = 'rd';
					break;
				}
				
			$q = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, user_id FROM aw2274434_users ORDER BY $order_by LIMIT $start, $display";		
			$r = @mysqli_query ($dbc, $q);
			echo '<table class="table" >
				<tr>
					<td align="center"></td>
					<td align="center"></td>
					<td align="left"><h3><a href="view_users.php?sort=ln">Last Name</a></h3></td>
					<td align="left"><h3><a href="view_users.php?sort=fn">First Name</a></h3></td>
					<td align="left"><h3><a href="view_users.php?sort=rd">Date Registered</a></h3></td>
				</tr>
				';
			$bg = '#eeeeee'; 
			while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
				$bg = ($bg=='#770000');
				echo '<tr bgcolor="' . $bg . '">
						<td align="left"><a href="edit_user.php?id=' . $row['user_id'] . '">Edit</a></td>
						<td align="left"><a href="delete_user.php?id=' . $row['user_id'] . '">Delete</a></td>
						<td align="left">' . $row['last_name'] . '</td>
						<td align="left">' . $row['first_name'] . '</td>
						<td align="left">' . $row['dr'] . '</td>
					</tr>
					';
				}
			echo '</table>';
			mysqli_free_result ($r);
			mysqli_close($dbc);
			
			if ($pages > 1) {
				echo '<br /><p>';
				$current_page = ($start/$display) + 1;
				if ($current_page != 1) {
					echo '<a href="view_users.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
					}
				for ($i = 1; $i <= $pages; $i++) {
					if ($i != $current_page) {
						echo '<a href="view_users.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
						} else {
						echo $i . ' ';
						}
					}
				if ($current_page != $pages) {
					echo '<a href="view_users.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
					}
				echo '</p>';	
				}
			?>
			</div>
		</div>	
	</div>
</body>
</html>