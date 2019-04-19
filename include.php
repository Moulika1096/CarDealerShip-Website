<?php
session_start();
require 'datalogin.php';
function ResetSearch(){
    S();
}
function S(){

    $result = $_SESSION["search"];
    if ($result->num_rows > 0) {
        echo '
            <div class="col-right" align="left">
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
            if ($row['new_used'] == 'new') {
                $src = "/Project/images/new_cars/{$stock_no}.jpg";
            }
            else {
                $src = "/Project/images/used_cars/{$stock_no}.jpg";
            }
            $toptext = $year . " " . $make . " " . $model;
            $bottomtext = "Stock #: " . $stock_no . "<br>" . "$" . $price . " (-$" . $discount . ")<br>"
                            . $city_mpg . "/" . $highway_mpg . " MPG<br>"
                            . $color . " exterior";
                    echo '
                    <div class="col-sm-4" style="height: 500px">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><center>'.$toptext.'</center></div>
                            <div class="panel-body"><center><img src="'.$src.'" /></center></div>
                            <div class="panel-footer"><center>'.$bottomtext.'<br><br>
                                <a class="purchase" href="purchase.php">Purchase</a></center></div>
                        </div>
                    </div>
                    ';
        }
        echo '
            </div>
            ';
    } else {
        echo '<center>0 results</center>';
    }
    echo'
    </div>';
}   

function CheckMake($make){
    $result = $_SESSION["search"];
    echo $result->num_rows;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $m = $row['make'];
            if($m == $make){
                return TRUE;
            }
        }
        return FALSE;
    }
    return FALSE;
} 

function CheckYear($year){
    $result = $_SESSION["search"];
    echo $result->num_rows;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $y = $row['year'];
            if($y == $year){
                return TRUE;
            }
        }
        return FALSE;
    }
    return FALSE;
} 

function CheckColor($color){
    $result = $_SESSION["search"];
    echo $result->num_rows;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $c = $row['color'];
            if($c == $color){
                return TRUE;
            }
        }
        return FALSE;
    }
    return FALSE;
} 

?>