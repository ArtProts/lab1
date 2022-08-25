<?php
 include('conn.php');
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>LAB1</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>

<!-- form 1 -->
<div class="container">
<form method="GET" action="profit.php" >
    <p>Select date to get profit
        <input name="date_profit" type=date>
        <input  type="submit" value="Get profit" />
</form>

<!-- form 2 -->
<form method="GET" action="get_vendor.php">
    <p>Select vendor to get all his cars
        <select name='vendor'>
    <?php
        $sqlSelect = "SELECT * FROM iteh2lb1var7.vendors";

        foreach($dbh->query($sqlSelect ) as $cell)
        {
            echo "<option> $cell[1]</option>";
        }
    ?>
        </select>
    <input  type="submit" value="Get vendor's">
</form>

<!-- form 3 -->
<form method="GET" action="available_cars.php">
    <p>Select date to get available car's
        <input name="date_available" type=date >
        <input type="submit" value="Get car's">
    
</form>


<!-- form change 1 -->
<form method="GET" action="rent_info.php">

    <p>Select date/time start rent:
        <input type="date" name= "date_start">
        <input type="time" name = "time_start"><br>

    <p>Select date/time end rent:
        <input type="date" name="date_end">
        <input type="time" name="time_end" ><br>
        
    <p>Select car:
        <select name='rent_car'>  
            <?php
                $sqlSelect = "SELECT * FROM iteh2lb1var7.cars";
                    foreach ($dbh->query($sqlSelect) as $cell) {
                        echo "<option>$cell[1]</option>";
                    }
            ?>
        </select>
       
    <p>Input price rent:
        <input name="price_rent" type="number" value="0" >
        <input type="submit" value="Rent" />
</form>

        

<!-- form change 2 -->
<form method="get" action="change_race.php">

    <p>Select car for change race:
        <select name='car_change_race'>
            <?php
                $sqlSelect = "SELECT * FROM iteh2lb1var7.cars";
                foreach ($dbh->query($sqlSelect) as $cell) {
                    echo "<option> $cell[1]</option>"; 
                }
            ?>
        </select>
    <p>Input race
        <input name="new_race"  type="number" value="0">
    <input type="submit" value="Change">   

</form>
</div>

</body>

</html>