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
        <title>Загрузить</title>
    </head>
<body>

<?php
include "header.php";
?>

<?php


if (isset($_POST['dir']))
{
	$dir = $_POST['dir'];
	$dir_to_save = $_POST['dir'];
}
else
{
	$dir = "";
	$dir_to_save = "C:/www";
}


if (is_dir($dir) && ($_FILES["file"]["error"] == 0))
{
    
    $save_path = "$dir_to_save/" . $_FILES["file"]["name"];            

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $save_path))
	{
	    $SQL = "SELECT `id` FROM `admins` WHERE username='" . $_SESSION["name"] . "'";
        $request = mysqli_query($mySQL, $SQL);
        if ($request) {
            $data = mysqli_fetch_all($request);
            foreach ($data as $item)
            $SQL = "INSERT INTO `actions`(`id`, `admin_id`, `event`) VALUES (NULL,$item[0],'Upload file " . $_FILES["file"]["name"] . " to " . $dir_to_save . "')";
            $request = mysqli_query($mySQL, $SQL);
        }
        echo "Success!<br>";

        if (strpos($_FILES["file"]['type'], 'text') === 0)
		{
            $file = fopen($save_path, "r");
            $contents = fread($file, 30);
            fclose($file);
            echo $contents;
        } 
		elseif (strpos($_FILES["file"]['type'], 'image') === 0)
		{
            copy($save_path, "." . "\\" . pathinfo($save_path)['basename']);      
            echo "<img src=\"" . pathinfo($save_path)['basename'] . "\">";            
        }
    }
} 
elseif (!is_dir($dir)) 
{
    exit("Неверный путь к директории");    
} 
else 
{
    exit("Ошибка при загрузке");
}
?>
</body>