<!DOCTYPE html>
<html>
<head>
    <title>Vendors</title>
</head>
<body>
       
    <?php
        include('conn.php');
        $vendor = $_GET["vendor"];
        foreach($dbh->query("SELECT * FROM iteh2lb1var7.vendors") as $row){
            if ($vendor == $row['Name']){
                $idVendor = $row['ID_Vendors'];
            }
        }
              
        $sqlSelect = $dbh->prepare("SELECT * FROM iteh2lb1var7.cars WHERE FID_Vendors= :idVendor");
        $sqlSelect->execute((array(':idVendor' => $idVendor)));
        echo $vendor ." manufacturer cars";
        echo "<table border ='1'>";
        echo "<tr><th>name</th><th>release_date</th><th>race</th><th>state(new,old)</th><th>price</th></tr>";
        foreach($sqlSelect->fetchAll() as $cell){
            $name = $cell['Name'];
            $release = $cell['Release_date'];
            $race = $cell['Race'];
            $state = $cell['State(new,old)'];
            $price = $cell['Price'];

            echo "<tr><td>$name</td><td>$release</td> <td>$race</td><td>$state</td><td>$price</td></tr>";

        }
    ?>

</body>
</html>