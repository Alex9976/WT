<!DOCTYPE HTML>
<html>
<head>
    <title></title>
    <style>
        .element {
            display: flex;
            margin: 50px auto;
            flex-direction: column;
        }
        .table_name {
            text-align: center;
            font-size: 20px;
            font-weight: 700;
        }
        td {
            width: 100%;
            border: solid 1px black;
        }
        tr {
            display: inline-flex;
            width: 100%;
            justify-content: center;
        }
    </style>
</head>
<body>
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

$mySQL = mysqli_connect("localhost", "root", "", "site_db");
$SQL = "UPDATE `browsers` SET `count` = `count` + 1 WHERE `name`='$user_browser'";;
$request = mysqli_query($mySQL, $SQL);
$SQL = "SELECT * FROM `browsers` ORDER BY count DESC";;
$request = mysqli_query($mySQL, $SQL);
if ($request) {
    $data = mysqli_fetch_all($request);
    echo '<table align="center" width="100%"><tr>
        <td><b>Browser</b></td>
        <td><b>Count</b></td>';
    foreach ($data as $item) {
        echo '<tr>
            <td>', $item[1],'</td>
            <td>', $item[2],'</td>
            </tr>';
    }
    echo '</table>';

}
