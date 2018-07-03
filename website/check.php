<?php
require "../php/connect.php";
$ledNumber = $_POST[ "ledNumber" ];
$query = "SELECT state FROM led WHERE id={$ledNumber}";
$sendquery = mysqli_query( $connect, $query );
$takedata = mysqli_fetch_row($sendquery);
$ledState = $takedata[0];
echo $ledState;
?>
