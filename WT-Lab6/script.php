<?php
include "class.php";

if (isset($_COOKIE["data"])) $serData = $_COOKIE["data"]; 

$data = unserialize($serData);
$data->Print();