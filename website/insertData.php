<?php
require "../php/connect.php";
$data1 = $_GET["data1"];
$data2 = $_GET["data2"];
$data3 = $_GET["data3"];
$data4 = $_GET["data4"];
$data5 = $_GET["data5"];
$data6 = $_GET["data6"];
$data7 = $_GET["data7"];
$data8 = $_GET["data8"];
$data9 = $_GET["data9"];
$data10 = $_GET["data10"];
$data11 = $_GET["data11"];
$data12 = $_GET["data12"];
$data13 = $_GET["data13"];


$query = "INSERT INTO sensors(sensor1,sensor2,sensor3,sensor4,sensor5,sensor6,sensor7,sensor8,sensor9,sensor10,sensor11,sensor12,sensor13)
VALUES ('{$data1}', '{$data2}', '{$data3}', '{$data4}', '{$data5}', '{$data6}', '{$data7}', '{$data8}', '{$data9}', '{$data10}', '{$data11}', '{$data12}', '{$data13}');";
$sendquery = mysqli_query( $connect, $query );
?>
