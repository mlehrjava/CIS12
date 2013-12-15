<div id="footer">
<?php
$time = time () ;
$year= date("Y",$time); 
echo '<span id="foot_text">Copyright © 2012 - '.$year.' Allison Woods. All rights reserved.</span>';
?>
</div>
</div>
</div>
</body>
</html>

<?php // Flush the buffered output.
ob_end_flush();
?>