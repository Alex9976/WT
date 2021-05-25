<?php
include "../main.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/login_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap"
          rel="stylesheet">
    <title>Регистрация</title>
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
                            <div class="form-title">Регистрация</div>
                            <?php
                            $isEmail = false;
                            $isLogin = false;
                            if (isset($_POST) && isset($_POST["btn"])) {

                                if (isset($_POST["login"])) {
                                    $login = $_POST["login"];
                                }
                                if (isset($_POST["password"])) {
                                    $password = md5($_POST["password"]);
                                }
                                if (isset($_POST["name"])) {
                                    $name = $_POST["name"];
                                }
                                if (isset($_POST["email"])) {
                                    $email = $_POST["email"];
                                }

                                $SQL = "SELECT * FROM `admins` WHERE email='$email'";
                                $request = mysqli_query($mySQL, $SQL);
                                if ($request) {
                                    if (count(mysqli_fetch_all($request)) != 0)
                                    {
                                        $isEmail = true;
                                    }
                                }
                                $SQL = "SELECT * FROM `admins` WHERE username='$login'";
                                $request = mysqli_query($mySQL, $SQL);
                                if ($request) {
                                    if (count(mysqli_fetch_all($request)) != 0)
                                    {
                                        $isLogin = true;
                                    }

                                }
                                if (!$isEmail && !$isLogin){
                                    $SQL = "INSERT INTO `admins`(`id`, `username`, `password`, `name`, `email`) VALUES (NULL, '$login', '$password', '$name', '$email')";
                                    $request = mysqli_query($mySQL, $SQL);
                                    $_SESSION['name']=$login;
                                    $_SESSION['authorized']=true;
                                    if (isset($_GET['id']))
                                    {
                                        $id = $_GET['id'];
                                    }
                                    else
                                    {
                                        $id = 1;
                                    }
                                    echo '<script>window.location.href="manager/index.php";</script>';
                                }
                            } ?>
                            <label for="name"><b>Имя</b></label>
                            <input type="text" placeholder="" <?php if ($isLogin || $isLogin) echo 'value="', $_POST["name"], '"'; ?> name="name" required>
                            <?php if ($isEmail) echo "<b style='color: red'>Данная почта занята</b></br>"; ?>
                            <label for="name"><b>Email</b></label>
                            <input type="email" placeholder="" <?php if ($isLogin || $isLogin) echo 'value="', $_POST["email"], '"'; ?> name="email" required>
                            <?php if ($isLogin) echo "<b style='color: red'>Администратор с таким именем уже суествует</b></br>";?>
                            <label for="name"><b>Логин</b></label>
                            <input type="text" placeholder="" <?php if ($isLogin || $isLogin) echo 'value="', $_POST["login"], '"'; ?> name="login" required>
                            <label for="password"><b>Пароль</b></label>
                            <input type="password" placeholder="" value="" name="password" required>
                            <button type="submit" name="btn" class="send-button">Регистрация</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

</body>
</html>