<?php
include "main.php";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/news_style.css">
    <link rel="stylesheet" href="assets/css/basket.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>Новости</title>
</head>

<body>

    <?php
    include "header.php";
    ?>

    <main>
        <section class="news">
            <div class="container">
                <div class="news-inner">
                    <?php
                    $SQL = "SELECT * FROM `news_articles`";
                    $request = mysqli_query($mySQL, $SQL);
                    if ($request) {
                        $data = mysqli_fetch_all($request);
                        foreach ($data as $item) {
                            echo '<div class="news-article">
                                <div class="news-img">
                                    <img src="', $item[4], '" alt="">
                                </div>
                                <div class="text-block">
                                    <span class="article-title"><a href="#">', $item[2], '</a></span>
                                    <div class="article-text">', $item[3], '</div>
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