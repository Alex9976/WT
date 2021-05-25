<?php
include "main.php";
$key = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
setcookie("key", $key);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/login_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap"
          rel="stylesheet">
    <title>Вход</title>
</head>
<body>

<?php
include "header.php";
?>

<main>
    <section>
        <div class="container">
            <div class="main-block">
                <div class="contact-form">
                    <form method="post">
                        <div class="form-inner">
                            <div class="form-title">Вход</div>
                            <?php
                            $isError = false;
                            if (isset($_POST) && isset($_POST["btn"])) {

                                if (isset($_POST["login"])) {
                                    $login = $_POST["login"];
                                }
                                if (isset($_POST["password"])) {
                                    $password = md5($_POST["password"]);
                                }
                                if (isset($_POST["anon"])) {
                                    $session = $_POST["anon"];
                                }
								else
								{
									$session = false;
								}
                                $SQL = "SELECT * FROM `users` WHERE password='$password' AND username='$login'";
                                $request = mysqli_query($mySQL, $SQL);
                                if ($request) {
                                    if (count(mysqli_fetch_all($request)) != 0)
                                    {

                                        $_SESSION['name'] = $login;
                                        $_SESSION['authorized'] = true;
                                        if ($session)
                                        {
                                            $_SESSION['key'] = $key;
                                            $_SESSION['session'] = true;
                                        }
                                        if (isset($_GET['id']))
                                        {
                                            $id = $_GET['id'];
                                        }
                                        else
                                        {
                                            $id = 1;
                                        }
                                        echo '<script>window.location.href="',$pagesList[$id - 1][2],'?id=',$id,'";</script>';
                                    }
                                    else {
                                        $isError = true;
                                    }
                                } else {
                                    $isError = true;
                                }
                            } ?>
                            <label for="name"><b>Логин</b></label>
                            <input type="text"
                                   placeholder="" <?php if ($isError) echo 'value="', $_POST["login"], '"'; ?>
                                   name="login" required>
                            <label for="password"><b>Пароль</b></label>
                            <input type="password" placeholder="" value="" name="password" required>
                            <input name="anon" type="checkbox">Чужой компьютер<br><br>
                            <button type="submit" name="btn" class="send-button">Войти</button>
                            <?php if ($isError) echo "<b style='color: red'>Неверное имя пользователя/пароль</b>"; ?>
                        </div>
                    </form>
                    <?php
                        if (isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                        }
                        else
                        {
                            $id = 1;
                        }
                        echo '<a class="register" href="register.php?id=', $id,'">Регистрация</a>';
                    ?>

                </div>
            </div>
        </div>
    </section>
</main>

</body>
</html>