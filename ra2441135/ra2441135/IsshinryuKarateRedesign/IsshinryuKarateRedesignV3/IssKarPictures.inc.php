<?php # IssKarPics.inc.php - Pictures
    // This page displays pictures to be included
    // on the News and Events Page.
 
    $page_title = 'View the Current Users';

    require_once ('IssKarConnect.php');

    // Number of records to show per page:
    $display = 1;

    // Determine how many pages there are...
    if (isset($_GET['p']) && is_numeric ($_GET['p']))
    { // Already been determined.

        $pages = $_GET['p'];

    } 
    else 
    { // Need to determine.

        // Count the number of records:
       $q = "SELECT COUNT(picID) FROM ra2441135_isskar_entity_pictures";
        $r = @mysqli_query ($con, $q);
        $row = @mysqli_fetch_array ($r, MYSQLI_NUM);
        $records = $row[0];

        // Calculate the number of pages...
        if ($records > $display) 
        { // More than 1 page.
            $pages = ceil ($records/$display);
        }
        else
        {
            $pages = 1;
        }

    } // End of p IF.

    // Determine where in the database to start returning results...
    if (isset($_GET['s']) && is_numeric ($_GET['s'])) {
    $start = $_GET['s'];
    }
    else
    {
        $start = 0;
    }

    // Define the query:
    $q = "SELECT *
            FROM ra2441135_isskar_entity_pictures
    		LIMIT $start, $display";
    $r = @mysqli_query ($con, $q);

    // Fetch and print all the records....

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
    {

        echo '<img src="' . $row['picture'] . '" id = "newspics">';

    } // End of WHILE loop.
    mysqli_free_result ($r);
    mysqli_close($con);

    // Make the links to other pages, if necessary.
    if ($pages > 1) 
    {

        // Add some spacing and start a paragraph:
        echo '<br /><p>';

        // Determine what page the script is on:
        $current_page = ($start/$display) + 1;

        // If it's not the first page, make a Previous link:
        if ($current_page != 1) 
        {
            echo '<a class="PagenateLink" href="IssKarNE.php?s=' . ($start - $display) . '&p=' . $pages . '"><span id="CurrentPage">Previous</span></a> ';
        }
        // Make all the numbered pages:
        for ($i = 1; $i <= $pages; $i++) 
        {
            if ($i != $current_page) 
            {
                echo '<a class="PagenateLink" href="IssKarNE.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '">' . $i . '</a> ';
            }
            else
            {
                echo '<span id="CurrentPage">' . $i . '</span> ';
            }
        } // End of FOR loop.

    // If it's not the last page, make a Next button:
    if ($current_page != $pages) 
    {
        echo '<a class="PagenateLink" href="IssKarNE.php?s=' . ($start + $display) . '&p=' . $pages . '"><span id="CurrentPage">Next</span></a>';
    }

    echo '</p>'; // Close the paragraph.

    } // End of links section.


?>
