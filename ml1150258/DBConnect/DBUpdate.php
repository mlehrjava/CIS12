<?php
//Create a connection to the database
//DB, UN, Pass, DB
          mysql_connect('209.129.8.3', '47278', 'cis1247278');
          mysql_select_db('47278');
          //mysql_connect('localhost', 'root', '');
          //mysql_select_db('test');
//Query the database
        $query="UPDATE `ml1150258_entity_movie` 
                SET duration=duration+1.3
                WHERE release_date >'1997-02-08' 
                AND studio like '%Studio%'";
        //echo $query."<br/>";
        $rs = mysql_query($query);
?>