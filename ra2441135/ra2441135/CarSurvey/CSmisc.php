<!DOCTYPE html>
<html>
    <head>
	  <title>CSmisc</title>
      <link type='text/css' rel='stylesheet' href='style.css'/>
	</head>
	<body>
      <p>
        <?php
            class Car
            {
                public $isFast = true;
                public $numTires = 4;
              
                public function __construct($sound)
                {
                    $this->sound = $sound;
                }
                public function honk()
                {
                    return "beep beep";
                }
            }
            $sportscar = new Car("beep beep");
            do
            {
                echo $sportscar->honk();
            }
            while (($sportscar -> numTires)>5);
           
        ?>
      </p>
    </body>
</html>