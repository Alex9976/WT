<?php
include "../../main.php";
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/css/login_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap"
          rel="stylesheet">
    <title>Статистика</title>
</head>
<body>
<?php
include "../manager/header.php";
?>
<?php
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
