<?php
include "main.php";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/catalog_style.css">
    <link rel="stylesheet" href="assets/css/basket.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>Каталог</title>
</head>

<body>
    <?php
    include "header.php";
    ?>

    <main>
        <div class="container">
            <div class="catalog-inner">
                <nav class="filter">
                    <?php
                    $SQL = "SELECT * FROM `filter_category`";
                    $request = mysqli_query($mySQL, $SQL);
                    if ($request) {
                        $data = mysqli_fetch_all($request);
                        foreach ($data as $item) {
                            echo '<div class="filter-category">', $item[1], '</div><ul>';
                            $SQL = "SELECT * FROM `category_element` WHERE filter_id = $item[0]";
                            $request = mysqli_query($mySQL, $SQL);
                            if ($request) {
                                $list = mysqli_fetch_all($request);
                                foreach ($list as $element) {
                                    echo '<li>
                                            <input type="checkbox" class="custom-checkbox" id="', $element[2], '" name="', $element[2], '" value="no">
                                            <label for="', $element[2], '">', $element[2], '</label>
                                          </li>';
                                }
                            }
                            echo "</ul>";
                        }
                    }
                    ?>
                    <?php
                    $isVoteSubmit = false;

                    if (isset($_POST) && isset($_POST["voting-submit"])) {
                        $SQL = "SELECT `id` FROM `voting_results`";
                        $request = mysqli_query($mySQL, $SQL);
                        if ($request) {
                            $data = mysqli_fetch_all($request);
                            foreach ($data as $item) {
                                if (isset($_POST[$item[0]])) {
                                    $SQL = "UPDATE `voting_results` SET `voters_count` = `voters_count` + 1 WHERE `id` = $item[0]";
                                    $request = mysqli_query($mySQL, $SQL);

                                    $SQL = "SELECT * FROM `voting_results`";
                                    $request = mysqli_query($mySQL, $SQL);
                                    if ($request) {
                                        $voteData = mysqli_fetch_all($request);
                                        $countsNum = 0;
                                        foreach ($voteData as $element) {
                                            $countsNum += $element[2];
                                        }
                                        $isVoteSubmit = true;
                                    }
                                }
                            }
                        }
                    }
                    ?>
                    <?php
                    if (!($isVoteSubmit || isset($_POST["voting-show"]))) {

                        echo '<form method="post">
                        <div class="voting-header">Какого производителя вы предпочитаете?</div>
                        <div class="vote-elements">';


                        $SQL = "SELECT * FROM `voting_results`";
                        $request = mysqli_query($mySQL, $SQL);
                        if ($request) {
                            $data = mysqli_fetch_all($request);
                            foreach ($data as $item) {
                                echo '<input type="radio" name="', $item[0], '" value="text"><label for="contactChoice1">', $item[1], '</label><br>';
                            }
                        }

                        echo '</div>
                        <div>
                            <button type="submit" class="voting-submit" name="voting-submit">Голосовать</button>
                            <br>
                            <button type="submit" class="voting-submit" name="voting-show">Показать результаты</button>
                        </div>
                    </form>';
                    } else {
                        echo '<div class="voting-header">Какого производителя вы предпочитаете?</div><br>';
                        $SQL = "SELECT * FROM `voting_results`";
                        $request = mysqli_query($mySQL, $SQL);
                        $countsNum = 0;
                        $voteData = mysqli_fetch_all($request);
                        foreach ($voteData as $element) {
                            $countsNum += $element[2];
                        }
                        foreach ($voteData as $element) {
                            echo '<div class="vote-result"><div class="vote-el-name">', $element[1], ': </div><div class="vote-el-result">', round($element[2] * 100 / $countsNum, 2), '%</div></div>';
                        }
                    }
                    ?>

                </nav>
                <div class="products">
                    <?php
                    $SQL = "SELECT * FROM `product`";
                    $request = mysqli_query($mySQL, $SQL);
                    if ($request) {
                        $data = mysqli_fetch_all($request);
                        foreach ($data as $item) {
                            echo '<div class="product-section" id="', $item[0], '">
                                    <div class="product-img">
                                        <img src="', $item[4], '" alt="">
                                    </div>
                                    <div class="product-header">
                                        <span class="product-title"><a href="#">', $item[1], '</a></span>
                                        <div class="product-description">', $item[2], '</div>
                                    </div>
                                    <h3 class="product-cost" id="', $item[0], '">', $item[3], ' р.</h3>
                                <form method="post">
                                    <button type="submit" class="buy-button" name="btn', $item[0], '">Добавить</button>
                                </form>
                                    </div>';
                        }
                    }
                    ?>
                    <?php
                    include "basket.php";
                    ?>
                    <script src="./assets/js/script.js"></script>
                </div>
            </div>
        </div>
        </section>
    </main>

    <?php
    include "footer.php";
    ?>
</body>

</html>