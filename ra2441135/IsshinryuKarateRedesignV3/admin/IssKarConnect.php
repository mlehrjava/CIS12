
        <?php
        
            //create a connection and open the database
            $con=mysqli_connect("localhost","root","","47924");
            // Check connection
            if (mysqli_connect_errno())
            {
	        echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
         ?>