<?php
require "../php/connect.php";
$led = $_GET["led"];
$query = "SELECT state FROM led where id=".$led;
$sendquery = mysqli_query( $connect, $query );
$takedata = mysqli_fetch_row($sendquery);
$ledState = $takedata[0];
echo $ledState;
?>
