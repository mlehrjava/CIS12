<?php
//Create a connection to the database
//DB, UN, Pass, DB
          mysql_connect('209.129.8.3', '47278', 'cis1247278');
          mysql_select_db('47278');
          //mysql_connect('localhost', 'root', '');
          //mysql_select_db('test');
//Query the database
        $query="SELECT `movie_id`, `name`, `studio`, `release_date`,
                       `rating_id`, `duration`
                FROM `ml1150258_entity_movie`;";
        $rs = mysql_query($query);
        echo "<table border='1'>";
		    echo "<tr><th>".'name'."</th>";
            echo "<th>".'studio'."</th>";
            echo "<th>".'release_date'."</th>";
            echo "<th>".'duration'."</th></tr>";
        while($re = mysql_fetch_array($rs)){
                  echo "<tr><td>".$re['name']."</td>";
                  echo "<td>".$re['studio']."</td>";
                  echo "<td>".$re['release_date']."</td>";
                  echo "<td>".$re['duration']."</td></tr>";
        }
        echo "</table>";
?>