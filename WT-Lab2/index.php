<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="iCore.com - магазин ноутбуков">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>iCore</title>
</head>
<body>

<header class="header">
    <div class="container">
        <div class="header-inner">
            <?php
            $navs = array('Главная', 'О нас', 'Каталог', 'Новости', 'Контакты');
            if(isset($_GET['id']))
                $id = $_GET['id'];
            else
                $id = 0;
            ?>
            <nav>
                <ul class="nav">
                    <?php
                    foreach($navs as $key => $nav):
                        ?>
                        <li>
                            <a <?php
                            if($key == $id) 
							{
                                echo 'class="nav-active"';
                            }
                            else 
							{
                                echo 'class="nav-link"';
                            }
                            ?> href="index.php?id=<?=$key?>"><?=$nav?></a>
                        </li>
                    <?
                    endforeach;
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</header>

<main>
</main>

<footer>

</footer>

</body>
</html>