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

<?php

if (isset($_POST['full_filename']))
{
	$filename = $_POST['full_filename'];
}
else
{
	$filename = "";
}

if (file_exists($filename))
{
    if (unlink($filename))
	{
        $SQL = "SELECT `id` FROM `admins` WHERE username='" . $_SESSION["name"] . "'";
        $request = mysqli_query($mySQL, $SQL);
        if ($request) {
            $data = mysqli_fetch_all($request);
            foreach ($data as $item)
                $SQL = "INSERT INTO `actions`(`id`, `admin_id`, `event`) VALUES (NULL,$item[0],'Delete file " . $filename . "')";
            $request = mysqli_query($mySQL, $SQL);
        }
		echo "Success!";
	}		
	
} 
else 
{
    exit("Неверный путь к файлу");
}
?>
</body>
