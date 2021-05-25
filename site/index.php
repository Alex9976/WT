<?php
include "main.php";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="iCore.com - магазин ноутбуков">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/basket.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>iCore</title>
</head>

<body>

    <?php
    include "header.php";
    ?>

    <main>
        <section class="intro">
            <div class="container">
                <div class="intro-inner">
                    <div class="intro-header">
                        <h1 class="intro-subtitle">Техника нового поколения</h1>
                        <h2 class="intro-title">Скидки до 50%</h2>
                        <a class="button" href="catalog.php">Каталог товаров</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section-header">
                    <div class="section-title">
                        <h2>Рекомендуемые продукты</h2>
                    </div>
                </div>
                <div class="featured-products">
                    <?php
                    $SQL = "SELECT * FROM `recomended_products`";
                    $request = mysqli_query($mySQL, $SQL);
                    if ($request) {
                        $data = mysqli_fetch_all($request);
                        foreach ($data as $item) {
                            echo '<div class="product-item">
                                <div class="product-img">
                                    <img src="', $item[4], '" alt="">
                                </div>
                                <div class="product-text">
                                    <div class="product-text-title">
                                        <h2><a class="link" href="#">', $item[2], '</a></h2>
                                    </div>
                                    <div class="product-text-subtitle">
                                        <p>', $item[3], ' р.</p>
                                    </div>
                                </div>
                              </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="advantage">

                    <?php
                    $SQL = "SELECT * FROM `index_advantages`";
                    $request = mysqli_query($mySQL, $SQL);
                    if ($request) {
                        $data = mysqli_fetch_all($request);
                        foreach ($data as $item) {
                            echo '<div class="advantage-item">
                                <div class="icons">
                                    <img src="', $item[3], '" alt="">
                                </div>
                                <div class="advan-title">', $item[1], '</div>
                                    <div class="adv-subtitle">', $item[2], '</div>
                              </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </section>


        <section class="section">
            <div class="container">
                <div class="section-header">
                    <div class="section-title">
                        <h2>Популярные продукты</h2>
                    </div>
                </div>
                <div class="trending-products">
                    <?php
                    $SQL = "SELECT * FROM `trending_products`";
                    $request = mysqli_query($mySQL, $SQL);
                    if ($request) {
                        $data = mysqli_fetch_all($request);
                        foreach ($data as $item) {
                            echo '<div class="trending-product-item">
                                <div class="product-img">
                                    <img src="', $item[4], '" alt="">
                                </div>
                                <div class="product-text">
                                    <div class="trending-product-text-title">
                                        <h2><a class="link" href="#">', $item[2], '</a></h2>
                                    </div>
                                    <div class="product-text-subtitle">
                                        <p>', $item[3], ' р.</p>
                                    </div>
                                </div>
                               </div>';
                        }
                    }
                    ?>
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