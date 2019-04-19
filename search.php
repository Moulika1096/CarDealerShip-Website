
<?php
session_start();
require 'datalogin.php';
include ('include.php');
include ('header.php');

$scolor = "SELECT DISTINCT color
FROM INVENTORY
WHERE STOCK=1";

$smake="SELECT DISTINCT make
FROM INVENTORY
WHERE STOCK=1";

$syear = "SELECT DISTINCT year
FROM INVENTORY
WHERE STOCK=1";

$color = $conn->query($scolor);
$make = $conn->query($smake);
$year = $conn->query($syear);

echo '

<div class="row">
  <div class="col-left" align="left">
    <ul>
      <form action="search.php" method="post">
      <li>
        Make<br>
        ';
        if($make->num_rows > 0){
          while($row = $make->fetch_assoc()) {
            $m = $row['make'];
            if(CheckMake($m)){
              echo '<input type="checkbox" name="make_list[]" value='.$m.' checked>'.$m.'<br>';}
            else{
              echo '<input type="checkbox" name="make_list[]" value='.$m.'>'.$m.'<br>';}
          }
        }
        echo '
        </li>
        <li>
        Year<br>
        ';
        if($year->num_rows > 0){
          while($row = $year->fetch_assoc()){
            $y = $row['year'];
            if(CheckYear($y)){
                echo'<input type = "checkbox" name="year_list[]" value='.$y.' checked>'.$y.'<br>';}
            else{
            echo'<input type = "checkbox" name="year_list[]" value='.$y.' >'.$y.'<br>';}
          }
        }
        echo '
        </li>
        <li>
        Color<br>';
        if($color->num_rows >0){
          while($row = $color->fetch_assoc()) {
            $c = $row['color'];
            if(CheckColor($c)){
                echo '<input type = "checkbox" name="color_list[]" value='.$c.' checked>'.$c.'<br>';}
            else{
            echo '<input type = "checkbox" name="color_list[]" value='.$c.'>'.$c.'<br>';}
          }
        }
        echo '
        </li>
        <li>
        Milage <input type="text" name="miles-from" size="8">
        -
        <input type="text" name="miles-to" size="8"><br>
        </li>
        ';
        echo'
        <li>
        Price <input type="text" name="price-from" size="8">
        -
        <input type="text" name="price-to" size="8"><br>
        <br>
        <input type="submit" name="reset" value="Reset">
        <input type="submit" name="submit" value="Search">
        
        </li>
    </ul>
  </div>';

require 'datalogin.php';
$makelist = array();
$yearlist = array();
$colorlist = array();
$sql = "SELECT * FROM inventory WHERE ";
if(isset($_POST['submit'])){

    $milesfrom = mysqli_real_escape_string($conn, $_POST['miles-from']);
    $milesto = mysqli_real_escape_string($conn, $_POST['miles-to']);
    $pricefrom = mysqli_real_escape_string($conn, $_POST['price-from']);
    $priceto = mysqli_real_escape_string($conn, $_POST['price-to']);
    if(!empty($_POST['make_list'])){
        foreach($_POST['make_list'] as $make){
            array_push($makelist, $make);
        }
    }

    if(!empty($_POST['year_list'])){
        foreach($_POST['year_list'] as $year){
            array_push($yearlist, $year);
        }
    }

    if(!empty($_POST['color_list'])){
        foreach($_POST['color_list'] as $color){
            array_push($colorlist, $color);
        }
    }
    $flag = FALSE;
    if(!empty($makelist)){
        $flag = TRUE;
        $newarray = implode("','",$makelist);
        $sql .= "make IN ('$newarray')";
    }
    if(!empty($yearlist)){
        $newarray = implode("','", $yearlist);
        if($flag){
            $sql .= " AND ";
        }
        $flag = TRUE;
        $sql .= "year IN ('$newarray')";
    }
    if(!empty($colorlist)){
        $newarray = implode("','", $colorlist);
        if($flag){
            $sql .= " AND ";
        }
        $flag = TRUE;
        $sql .= "color IN ('$newarray')";
    }
    if(is_numeric($milesfrom) && is_numeric($milesto)){
        if($flag){
            $sql .=" AND ";
        }
        $_SESSION["milesfrom"] = $milesfrom;
        $_SESSION["milesto"] = $milesto;
        $flag = TRUE;
        $sql.= "miles >= $milesfrom AND miles <= $milesto"; 
    }
    if(is_numeric($pricefrom) && is_numeric($priceto)){

        if($flag){
            $sql .=" AND ";
        }
        $_SESSION["pricefrom"] = $pricefrom;
        $_SESSION["priceto"] = $priceto;
        $flag = TRUE;
        $sql.= "price >= $pricefrom AND price <= $priceto";
    }
}
else {
    $sql = "SELECT * FROM inventory";
}
$_SESSION["search"] = $conn->query($sql);
if(isset($_POST["submit"]) || isset($_POST["reset"])){
    S();
}
?>