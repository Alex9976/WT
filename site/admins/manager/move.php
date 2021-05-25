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
    <title>Переместить</title>
</head>
<body>

<?php
include "header.php";
?>


<form action="movea.php" method="POST">
    Файл: <input type="text" name="full_filename" /><br><br>
    Новая директория: <input type="text" name="new_directory" /><br><br>
    <input type="submit" value="Переместить!">
</form>
</body>