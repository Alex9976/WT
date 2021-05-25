<header class="header">
    <div class="container">
        <div class="header-inner">
            <div class="header-logo"><a href="index.php"><img src="assets/images/main/logo.png"></a></div>
            <div class="nav-block">
                <nav>
                    <ul class="nav">
                        <?php
                        $mySQL = mysqli_connect("localhost", "root", "", "site_db");
                        $SQL = "SELECT * FROM `header_nav`";
                        $request = mysqli_query($mySQL, $SQL);
                        if ($request) {
                            $data = mysqli_fetch_all($request);
                            $pagesList = $data;
                            foreach ($data as $item) {
                                echo '<li><a class="nav-link" href="', $item[2], '?id=', $item[0], '">', $item[1], '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </nav>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                } else {
                    $id = 1;
                }
                if (!$isAuthorizedUser) {
                    echo '<div class="header-entry"><a href="login.php?id=', $id, '">Вход</a></div>';
                } else {
                    echo '<div class="header-entry"><a href="logout.php?id=', $id, '">', $_SESSION['name'], ', Выход</a></div>';
                    echo '<button type="submit" class="basket" href="#" name="btn">Корзина</button>
        <section class="catalog">';
                }
                ?>
            </div>
        </div>
    </div>
</header>

<?php
include "stat.php"
?>