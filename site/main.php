<?php
session_start();
if (isset($_SESSION['session']) && $_SESSION['session']) {
    if (isset($_COOKIE['key'])) {
        if ($_SESSION['key'] != $_COOKIE['key']) {
            session_destroy();
        }
    } else {
        session_destroy();
    }
}

if (isset($_SESSION['authorized']) && $_SESSION['authorized']) {
    $isAuthorizedUser = true;
} else {
    $isAuthorizedUser = false;
}
$mySQL = mysqli_connect("localhost", "root", "", "site_db");
$SQL = "SELECT * FROM `product`";
$request = mysqli_query($mySQL, $SQL);
if ($request) {
    $data = mysqli_fetch_all($request);
    foreach ($data as $item) {
        if (isset($_POST['btn' . $item[0]])) {
            setcookie('btn' . $item[0], true, time() + 20 * 60);
            echo '<script>window.location.href="catalog.php?id=2";</script>';
        }
        if (isset($_POST['btndel' . $item[0]])) {
            setcookie('btn' . $item[0], true, time() - 20 * 60);
            echo '<script>window.location.href="catalog.php?id=2";</script>';
        }
    }
}
