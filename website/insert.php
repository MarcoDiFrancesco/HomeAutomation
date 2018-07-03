<?php
require "../php/connect.php";
$ledState = $_POST["ledState"];
$ledNumber = $_POST["ledNumber"];
$query = "UPDATE led SET state='{$ledState}' WHERE id={$ledNumber}";
mysqli_query( $connect, $query );
echo "Led {$ledNumber} aggiornato {$ledState}";
?>
