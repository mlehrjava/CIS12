<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Paycheck Calculations</title>
</head>

<body>
<?php
    //Retrieve the form values
	$payRate=$_GET["payRate"];
	$hrsWrkd=$_GET["hrsWrkd"];
	$dblTime=$_GET["dblTime"];
	$trpTime=$_GET["trpTime"];

	//Calculate the Paycheck
	switch($hrsWrkd<$dblTime||$trpTime){

        case $hrsWrkd>$dblTime:
            $payChck=$dblTime*$payRate+($hrsWrkd-$dblTime)*2*$payRate;
                break;
         case $hrsWrkd>$trpTime:
            $payChck=$trpTime*$payRate+($hrsWrkd-$trpTime)*3*$payRate;
                break;
       default:
            $payChck=$hrsWrkd*$payRate;
}


	//Re-Display the inputs
	echo "<p>Pay Rate = $$payRate/hr</p>";
	echo "<p>Hours Worked = $hrsWrkd(hrs)</p>";
	echo "<p>Double Time starts here at $dblTime(hrs)</p>";
	echo "<p>Triple Time starts here at $trpTime(hrs)</p>";
	echo "<p>Pay Check = $$payChck</p>";
?>
</body>
</html>
