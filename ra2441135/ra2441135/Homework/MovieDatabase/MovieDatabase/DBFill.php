<?php
//Create a connection to the database
//DB, UN, Pass, DB
          mysql_connect('209.129.8.3', '47924', '47924cis12');
          mysql_select_db('47924');
          //mysql_connect('localhost', 'root', '');
          //mysql_select_db('test');
//Query the database
        $query="INSERT INTO `ml1150258_entity_movie`
                       (`name`,`studio`,`release_date`,
                        `rating_id`,`duration`) VALUES ";
        $records=50;
        for($i=1;$i<=$records;$i++){
          $query.="('Movie".$i."',";
          $query.=" 'Studio".rand(1,50)."',";
          $query.="'".rand(1950,2010)."-".rand(1,12)."-".rand(1,28)."',";
          $query.=rand(1,4).",";
          $query.=(rand(1,2)+rand(0,99)/100.0).")";
          if($i!=$records)$query.=",";
        }
        echo $query."<br/>";
        $rs = mysql_query($query);
?>