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




<!-------------------------------------profile------------------------------------->
<?php

if (isset($_SESSION['user_id'])) {	//IF LOGGED IN
                  
               
                 
					if ($_SESSION['user_level'] == 1) {	//IF ADMIN
						
						 
				
				}
				} else { //IF NOT LOGGED IN			
               echo 'You are not authorized to view this page. Please log in or Register.';
                 }


?>
<!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>