<?php #TCCU.php - Contact Us
//This page displays a form to be displayed and handled for email use
$page_title = "Tech Connection Computer Services";
include ("TCHeader.inc.html");
?>
	<div id="content">
        <h1>Contact Us</h1>
        <br />
        <h2>We are located at 6115-A Orange Ave. Long Beach, Ca. 90805.</h2>
        <h2>Contact us by phone:</h2>
        
        <h2>Business: (562) 984-7856</h2>
        <h2>Mobile: (562) 552-3243</h2>
        <h2>Or Email Us with Your Questions, Concerns or Feedback:</h2>
        <?php # Script 13.1 - email.php #2
        // This version now scrubs dangerous strings from the submitted input.

            // Check for form submission:
            

	        /* The function takes one argument: a string.
	        * The function returns a clean version of the string.
	        * The clean version may be either an empty string or
	        * just the removal of all newline characters.
	        */

	        $nameErr = $subjectErr = $emailErr = $commentsErr = "";
			$name = $subject = $email = $comments = "";
			if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {


	            
	            function spam_scrubber($value) 
	            {

		            // List of very bad values:
		            $very_bad = array('to:', 'cc:', 'bcc:', 'content-type:', 'mime-version:', 'multipart-mixed:', 'content-transfer-encoding:');
	
		            // If any of the very bad strings are in 
		            // the submitted value, return an empty string:
		            foreach ($very_bad as $v) 
		            {
			                if (stripos($value, $v) !== false) return '';
                    }
	
		                // Replace any newline characters with spaces:
		                $value = str_replace(array( "\r", "\n", "%0a", "%0d"), ' ', $value);
	
		                // Return the value:
		                return stripslashes(trim($value));

	            } // End of spam_scrubber() function.

	            // Clean the form data:
	            $scrubbed = array_map('spam_scrubber', $_POST);

	            if (empty($scrubbed["name"]))
     			{
     				$nameErr = "Name is required";
     			}
   				else
     			{
     				$name = ($scrubbed["name"]);
     				// check if FirstName only contains letters and whitespace
			     	if (!preg_match("/^[a-zA-Z ]*$/",$name))
			    	{
       					$nameErr = "Only letters and white space allowed";
       				}
     			}
     
     			//$subject = test_input($$_POST["subject"]);
     			
     			
     			  				     
    			
   				if (empty($scrubbed["email"]))
     			{
     				$emailErr = "Email is required";
     			}
   				else
     			{
     				$email = $scrubbed["email"];
     				// check if e-mail address syntax is valid
     				if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
       				{
       					$emailErr = "Invalid email format";
       				}
     			}
	 				if (empty($scrubbed["comments"]))
     			{
     				$commentsErr = "Please enter a message to be sent.";
     			}
   				/*else
     			{
     				$comments = test_input($scrubbed["comments"]);
     			}*/

				/*function test_input($data)
				{
     				$data = trim($data);
     				$data = stripslashes($data);
     				$data = htmlspecialchars($data);
     				return $data;
				}*/

	            // Minimal form validation:
	            if (empty($nameErr) && empty($emailErr) && empty($commentsErr) )
	            {
	
		            // Create the body:
		            $body = "Name: {$scrubbed['name']}\n\nComments: {$scrubbed['comments']}";

		            // Make it no longer than 70 characters long:
		            $body = wordwrap($body, 70);
	
		            // Send the email:
		            mail('insanelr@yahoo.com', "Subject: {$scrubbed['subject']}", $body, "From: {$scrubbed['email']}");

		            // Print a message:
		            echo '<p><em>Thank you for your input. 
		            <br />
		            We will reply as soon as we can.</em></p>';
		
		            // Clear $scrubbed (so that the form's not sticky):
		            $scrubbed = array();
	
	            } 
	            else
	            {
		            echo  "<p class='error'>" . $nameErr . ", " . $emailErr . ", "  . $commentsErr . "</p>";
	            }
	
            } // End of main isset() IF.

        // Create the HTML form:
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
	        <p>Name:</p>
	        <input class="input_field" type="text" name="name" size="30" maxlength="60" value="<?php if (isset($scrubbed['name'])) echo $name; ?>" />
	        <span class="error">* <?php echo $nameErr;?></span>
	        <p>Email Address:</p>
	        <input class="input_field" type="text" name="email" size="30" maxlength="80" value="<?php if (isset($scrubbed['email'])) echo $email; ?>" />
	        <span class="error">* <?php echo $emailErr;?></span>
	        <p>Subject:</p>
	        <input class="input_field" type="text" name="subject" size="30" maxlength="80" value="<?php if (isset($scrubbed['subject'])) echo $subject; ?>" />
	        <p>Comments:</p>
	        <textarea class="textarea" name="comments" rows="5" cols="30"><?php if (isset($scrubbed['comments'])) echo $comments; ?></textarea>
	        <span style="vertical-align:top;" class="error">* <?php echo $commentsErr;?></span>
	        <p><input class="submit_button" type="submit" name="submit" value="Send" />
        </form>
        <div id="map">
            <iframe  width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=6115-A+Orange+Ave.+Long+Beach,+Ca.+90805&amp;sll=33.865949,-118.177338&amp;ie=UTF8&amp;hq=&amp;hnear=6115+Orange+Ave,+Long+Beach,+California+90805&amp;t=m&amp;ll=33.865926,-118.177357&amp;spn=0.021381,0.025749&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
            <br />
            <small>
                <a href="https://maps.google.com/maps?q=6115-A+Orange+Ave.+Long+Beach,+Ca.+90805&amp;sll=33.865949,-118.177338&amp;ie=UTF8&amp;hq=&amp;hnear=6115+Orange+Ave,+Long+Beach,+California+90805&amp;t=m&amp;ll=33.865926,-118.177357&amp;spn=0.021381,0.025749&amp;z=14&amp;iwloc=A&amp;source=embed" style="color:#2C3846;text-align:left">View Larger Map</a>
            </small>
            <br />
            <img id="portrait" width="260px" src="images/Marian.jpg">
            <p id="portraitTxt">Founder / CEO: Marian Adams</p>
        </div>
        <?php include('TCFooter.inc.html'); ?>