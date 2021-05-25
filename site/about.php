<?php
include "main.php";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/about_style.css">
    <link rel="stylesheet" href="assets/css/basket.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>О нас</title>
</head>

<body>

    <?php
    include "header.php";
    ?>

    <main>
        <section>
            <div class="container">
                <div class="info">
                    <div class="info-inner">
                        <div class="info-text"><b>iCore.com</b> – специализированный интернет-магазин по продаже ноутбуков. Мы предлагаем широкий ассортимент товаров по маркам и характеристикам на любой вкус и любым предпочтениям. В нашем магазине можно подобрать наилучший вариант техники по вашему запросу, либо же привезём под заказ желаемую модель.</div>
                        <h1>Скидки и акции</h1>
                        <div class="info-text">В магазине iCore.com постоянно проводятся разнообразные акции, которые помогают нам радовать своих клиентов не только высоким качеством обслуживания, но и подарками, которые оставят теплые воспоминания от покупки.</div>
                        <h1>Ассортимент и цены</h1>
                        <div class="info-text">Все товары, представленные в магазине являются в наличии и с актуальными ценами, которые перепроверяются каждый день, поэтому наши клиенты могут быть уверены, что стоимость выбранного товара на момент покупки не изменится. Мы работаем напрямую с купными поставщиками, поэтому у нас есть возможность предлагать технику по наименьшим ценам на рынке.</div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        include "basket.php";
        ?>
    </main>



    <?php
    include "footer.php";
    ?>

</body>

</html>