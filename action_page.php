<?php
include('search.php');
?>

<?php
require 'datalogin.php';

$keywords = mysqli_real_escape_string($conn, $_POST['keywords']);

$sql = "SELECT * 
	FROM inventory 
	WHERE stock=1
	and
	(stock_no LIKE '%$keywords%'
	or year LIKE '%$keywords%'
	or make LIKE '%$keywords%'
	or model LIKE '%$keywords%'
	or miles LIKE '%$keywords%'
	or city_mpg LIKE '%$keywords%'
	or highway_mpg LIKE '%$keywords%'
	or color LIKE '%$keywords%'
	or price LIKE '%$keywords%'
	or new_used LIKE '%$keywords%'
	or stock_no LIKE '%$keywords%')";
	
$result = $conn->query($sql);
$_SESSION["search"] = $result;
S();
/*
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
        if ($row['new_used'] == 'new') {
            $src = "/Project/images/new_cars/{$stock_no}.jpg";
            $new_used = "NEW";
        }
        else {
            $src = "/Project/images/used_cars/{$stock_no}.jpg";
            $new_used = "USED";
        }
        $toptext = $new_used . " " . $year . " " . $make . " " . $model;
        $bottomtext = "Stock #: " . $stock_no . "<br>" . "$" . $price . " (-$" . $discount . ")<br>"
						. $interest_rate . " Interest Rate<br>"
						. "$" . $down_payment . " Down Payment<br>"
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
	echo '<center>0 results</center>';
}
  */
include ('footer.php');
?>
