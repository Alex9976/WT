<?php

$arr_browsers = ["Opera", "Edg", "Chrome", "Safari", "Firefox", "MSIE", "Trident"];

$agent = $_SERVER['HTTP_USER_AGENT'];

$user_browser = '';
foreach ($arr_browsers as $browser) {
    if (strpos($agent, $browser) !== false) {
        $user_browser = $browser;
        break;
    }
}

switch ($user_browser) {
    case 'MSIE':
        $user_browser = 'Internet Explorer';
        break;

    case 'Trident':
        $user_browser = 'Internet Explorer';
        break;

    case 'Edg':
        $user_browser = 'Microsoft Edge';
        break;
}
if (!isset($_COOKIE["get-browser-stat"]))
{
    $SQL = "UPDATE `browsers` SET `count` = `count` + 1 WHERE `name`='$user_browser'";;
    $request = mysqli_query($mySQL, $SQL);
    $SQL = "SELECT * FROM `browsers` ORDER BY count DESC";;
    $request = mysqli_query($mySQL, $SQL);
    setcookie("get-browser-stat", true);
}