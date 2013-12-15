<?php
ob_start();
session_start();
require ('inc/config.inc.php');
$page_title = 'Gallery';
include ('inc/header.html');
?>
	<style>
div#body_container>a.tab04 {
	background:url(inc/img/button-hov.png) no-repeat center;
	}

.gallery {
position:relative;
overflow:hidden;
width:520px;
margin:auto;

}

.gallery img {border:0;}
.gallery .float-left {float:left;}
.gallery .float-right {float:right;}
.gallery .clear {clear:both;}
.gallery .clearb10 {padding-bottom:10px;clear:both;}

.gallery .thumb {
overflow:hidden;
float:left;
width:105px;
height:70px;
margin:2px;
border:5px solid #5e0000;
}

.gallery .thumb:hover {
border:0;
width:115px;
height:80px;
}

/***** pagination style *****/
.gallery .paginate-wrapper {
padding:10px 0;
font-size:11px;
}

.gallery a.paginate {
color:#555;
padding:0;
margin:0 2px;
text-decoration:none;
}

.gallery a.current-paginate, 
.gallery a.paginate:hover {
color:#333;
font-weight:700;
padding:0;
margin:0 2px;
text-decoration:none;
}

.gallery a.paginate-arrow {
text-decoration:none;
border:0;
}
</style>


<!-------------------------------------Gallery------------------------------------->

<?php 
if (isset($_SESSION['user_id'])){
if ($_SESSION['user_level'] == 1) {	//IF ADMIN
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Check for an uploaded file:
	if (isset($_FILES['upload'])) {
		
		// Validate the type. Should be JPEG or PNG.
		$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
		if (in_array($_FILES['upload']['type'], $allowed)) {
		
			// Move the file over.
			if (move_uploaded_file ($_FILES['upload']['tmp_name'], "gallery/{$_FILES['upload']['name']}")) {
				echo '<p><em>The file has been uploaded!</em></p>';
			} // End of move... IF.
			
		} else { // Invalid type.
			echo '<p class="error">Please upload a JPEG or PNG image.</p>';
		}

	} // End of isset($_FILES['upload']) IF.
	
	// Check for an error:
	if ($_FILES['upload']['error'] > 0) {
		echo '<p class="error">The file could not be uploaded because: <strong>';
	
		// Print a message based upon the error.
		switch ($_FILES['upload']['error']) {
			case 1:
				print 'The file exceeds the upload_max_filesize setting in php.ini.';
				break;
			case 2:
				print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
				break;
			case 3:
				print 'The file was only partially uploaded.';
				break;
			case 4:
				print 'No file was uploaded.';
				break;
			case 6:
				print 'No temporary folder was available.';
				break;
			case 7:
				print 'Unable to write to the disk.';
				break;
			case 8:
				print 'File upload stopped.';
				break;
			default:
				print 'A system error occurred.';
				break;
		} // End of switch.
		
		print '</strong></p>';
	
	} // End of error IF.
	
	// Delete the file if it still exists:
	if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
		unlink ($_FILES['upload']['tmp_name']);
	}
			
} // End of the submitted conditional.
?>
	
<form enctype="multipart/form-data" action="upload_image.php" method="post">

	<input type="hidden" name="MAX_FILE_SIZE" value="524288" />
	
	<fieldset><legend>Select a JPEG or PNG image of 512KB or smaller to be uploaded:</legend>
	
	<p><b>File:</b> <input type="file" name="upload" /></p>

	
	</fieldset>
	<div align="center"><input type="submit" name="submit" value="Submit" /></div>
	
	

<?php
}
}
include ('gallery/index.php');
?>






<!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>