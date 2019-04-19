<?php
include('search.php');
require 'datalogin.php';
S();
/*
$sql = "SELECT * 
	FROM inventory 
	WHERE stock=1
    ORDER BY RAND()
    LIMIT 6";
	
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '
        <div class="container">    
            <div class="row">
        ';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $stock_no = $row['stock_no'];
        $make = $row['make'];
        $model = $row['model'];
        $year = $row['year'];
        $miles = $row['miles'];
        $color = $row['color'];
        $city_mpg = $row['city_mpg'];
        $highway_mpg = $row['highway_mpg'];
        $price = $row['price'];
        $discount = $row['discount'];
        if ($row['new_used'] == 'new') {
            $src = "/Project/images/new_cars/{$stock_no}.jpg";
            $new_used = "NEW";
            $bottomtext = "Stock #: " . $stock_no . "<br>" . "$" . $price . " (-$" . $discount . ")<br>"
                        . $city_mpg . "/" . $highway_mpg . " MPG<br>"
                        . $color . " exterior";
        }
        else {
            $src = "/Project/images/used_cars/{$stock_no}.jpg";
            $new_used = "USED";
            $bottomtext = "Stock #: " . $stock_no . "<br>" . "$" . $price . " (-$" . $discount . ")<br>"
                        . $miles . " miles <br>"
                        . $city_mpg . "/" . $highway_mpg . " MPG<br>"
                        . $color . " exterior";
        }
        $toptext = $new_used . " " . $year . " " . $make . " " . $model;
                echo '
                <div class="col-sm-4" style="height: 500px">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><center>'.$toptext.'</center></div>
                        <div class="panel-body"><center><img src="'.$src.'" /></center></div>
                        <div class="panel-footer"><center>'.$bottomtext.'<br><br>
                        <a class="purchase" href="addtocart.php?stock_no='.$stock_no.'">Purchase</a></center></div>
                    </div>
                </div>
                ';
    }
    echo '
            </div>
        </div>
        ';
    } 
    
    else {
        echo "We currently have no cars in stock.";
    }
*/
include ('footer.php');                
?>
