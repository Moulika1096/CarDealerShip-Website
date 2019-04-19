<?php
include('header.php');
?>

<?php
require 'datalogin.php';
    
$sql = "select *
        from inventory
        where new_used='new'
        and stock=1";

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
        $color = $row['color'];
        $city_mpg = $row['city_mpg'];
        $highway_mpg = $row['highway_mpg'];
        $price = $row['price'];
        $discount = $row['discount'];
        $interest_rate = $row['interest_rate'];
        $down_payment = $row['down_payment'];
        $src = "/Project/images/new_cars/{$stock_no}.jpg";
        $toptext = $year . " " . $make . " " . $model;
        $bottomtext = "Stock #: " . $stock_no . "<br>" . "$" . $price . " (-$" . $discount . ")<br>"
						. $interest_rate . "<br>"
						. $down_payment . "<br>"
                        . $city_mpg . "/" . $highway_mpg . " MPG<br>"
                        . $color . " exterior";
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
    echo "0 results";
}

include ('footer.php');
?>
    

