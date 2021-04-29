<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Site</title>
    <style>
        textarea {
            padding: 10px;
            width: 25%;
            height: 100px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .name
        {
            width: 24%;
            margin-bottom: 5px;
        }
        .comment
        {
            margin: 5px auto;
            padding: 10px;
            width: 50%;
            height: 100px;
            box-sizing: border-box;
            border: 1px solid black;
            font-size: 18px;
        }
    </style>
</head>
<body>
<?php

    if (isset($_POST['comment']) && isset($_POST['name']) && isset($_POST['button']))
    {
        $commentsFile = fopen('comments.txt', 'a+');
        fwrite($commentsFile, '<div class="comment"><b>Имя:</b> ' . $_POST['name'] . '<br /><b>Отзыв:</b> ' . nl2br($_POST['comment']) . '</div>');
        fclose($commentsFile);
    }
    $data = file_get_contents('comments.txt');
    $template = '/http[s]?:\/\/(?!([\w\.]*(bsuir\.by)|(www\.bsuir\.by)))(www\.)?[\w\.-]+\.\w{2,6}(\/[\w\.\/-]+)*/';
    $data = preg_replace($template, "#Внешние ссылки запрещены#", $data);
    echo $data;
?>
<form align="center" method="post">
    <p><b>Введите ваш отзыв:</b></p>
    <p><input type="text" placeholder="Имя" class="name" name="name"><br />
    <textarea placeholder="Отзыв" name="comment"></textarea></p>
    <p><input type="submit" name="button"></p>
</form>
</body>
</html>