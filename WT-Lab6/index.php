<?php
include "class.php";

$data = new Data;
$text = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
$num = rand();
$data->text = $text;
$data->num = $num;
$serData = serialize($data);

setcookie("data", $serData, 0);

$data->Print();
?>

</ br><a href="script.php">send</a>