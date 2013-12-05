<?php
   //create a connection and open the database
   $con=mysqli_connect("localhost","root","","carsurvey");
   // Check connection
   if (mysqli_connect_errno())
   {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
?>