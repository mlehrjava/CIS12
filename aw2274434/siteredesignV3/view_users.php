	<?php
	ob_start();
	session_start();
	require ('inc/config.inc.php');
	$page_title = 'View Users';
	include ('inc/header.html');
	?>
	<style>
div#body_container>a.tab01 {
	background:url(inc/img/button-hov.png) no-repeat center;
	}
</style>




<!-------------------------------------View Users------------------------------------->
			
			<?php

			$page_title = 'View the Current Users';
			echo '<h1 class="tabtitle">Registered Users</h1>';
			
			require ('../mysqli_connect.php');
			
			
			if (isset($_SESSION['user_id'])) {	//IF LOGGED IN
                  
               
                 
					
						
						
				
				
			$display = 8;

			if (isset($_GET['p']) && is_numeric($_GET['p'])) {
				$pages = $_GET['p'];
				} else {
				$q = "SELECT COUNT(user_id) FROM aw2274434_karate_users";
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
					$order_by = 'reg_date ASC';
					break;
				case 'un':
					$order_by = 'username ASC';
					break;
				default:
					$order_by = 'reg_date ASC';
					$sort = 'rd';
					break;
				}
			
			
			
			
			
			$q = "SELECT username, last_name, first_name, DATE_FORMAT(reg_date, '%M %d, %Y') AS dr, user_id FROM aw2274434_karate_users ORDER BY $order_by LIMIT $start, $display";		
			$r = @mysqli_query ($dbc, $q);
			
			
			
			
			
			
			
			echo '<table class="termtable" >
				<tr>
					<td align="center"></td>
					<td align="center"></td>
					<td align="left"><h3><a href="view_users.php?sort=un">Username</a></h3></td>
					<td align="left"><h3><a href="view_users.php?sort=ln">Last Name</a></h3></td>
					<td align="left"><h3><a href="view_users.php?sort=fn">First Name</a></h3></td>
					<td align="left"><h3><a href="view_users.php?sort=rd">Date Registered</a></h3></td>
				</tr>
				';
			//$bg = '#eeeeee'; 
			while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
				//$bg = ($bg=='#770000');
				//echo '<tr bgcolor="' . $bg . '">
				echo '<tr>';
							if ($_SESSION['user_level'] == 1) {	//IF ADMIN
									echo '<td align="left"><a href="edit_user.php?id=' . $row['user_id'] . '">Edit</a></td>
									<td align="left"><a href="delete_user.php?id=' . $row['user_id'] . '">Delete</a></td>';
									} else {
									echo '<td align="center"></td>
									<td align="center"></td>';
									}
						echo '<td align="left">' . $row['username'] . '</td>
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
				
				
				
				} else { //IF NOT LOGGED IN			
              echo 'You are not authorized to view this page. Please log in or register.';
                 }
			?>
			<!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>