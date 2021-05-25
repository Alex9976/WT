<?php
include "../../main.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/css/catalog_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap"
          rel="stylesheet">
    <title>Удалить</title>
</head>
<body>

<?php
include "header.php";
?>


<form action="deletea.php" method="POST">
    Путь к файлу: <input type="text" name="full_filename" /><br><br>
    <input type="submit" value="Удалить!">
</form>
</body>