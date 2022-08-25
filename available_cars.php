<!DOCTYPE html>
<html>
<head>
    <title>Available car's</title>
</head>
<body>  
      <?php
        include('conn.php');
        $date_available = $_GET["date_available"];
        $result_table="";
		            
        foreach($dbh->query("SELECT * FROM iteh2lb1var7.cars") as $row) {
          
          $cars[$row["ID_Cars"]] = $row["Name"];
          $car_available[$row["ID_Cars"]] = 1;
          $iter[$row["ID_Cars"]] = $row["ID_Cars"];
        }

        $sqlSelect  = $dbh->prepare("SELECT * FROM iteh2lb1var7.rent
        where iteh2lb1var7.rent.Date_start <= :date_available and
        iteh2lb1var7.rent.Date_end >= :date_available");
        
        $sqlSelect->execute(array(':date_available' => $date_available)); 
        $sqlSelect = $sqlSelect->fetchAll(); 
         
        foreach($sqlSelect  as $row){
            $car_available[$row["FID_Car"]] = 0;       
        }

        foreach($iter as $key) {
          if($car_available[$key]){
            $result_table .= "<tr><td>".$cars[$key]."</td></tr>";
          }
        }
        echo "<table border ='1'>";
        echo "<tr><td>Cars available on $date_available</td></tr>";
        echo $result_table;
      
      ?>
</body>
</html>