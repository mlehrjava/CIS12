	<?php
	require ('inc/config.inc.php');
	$page_title = 'Contact';
	include ('inc/header.html');
	?>
	<style>
div#body_container>a.tab06 {
	background:url(inc/img/button-hov.png) no-repeat center;
	}
</style>




<!-------------------------------------Contact------------------------------------->
		

		<form action="handle_form.php" method="post">
			<fieldset><legend>Enter your information in the form below:</legend>
			<p><label>Name: <input type="text" name="cf_name" size="20" maxlength="30" /></label></p>
			<p><label>Email Address: <input type="text" name="cf_email" size="20" maxlength="40" /></label></p>
			<p><label>Phone: <input type="text" name="cf_phone" size="20" maxlength="40" /></label></p>
			<p><label>Message: <textarea name="cf_message" rows="3" cols="40" maxlength="240"></textarea></label></p>
			</fieldset>
			<p align="center"><input type="submit" name="cf_submit" value="Submit My Information" /></p>
		</form>

<!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>