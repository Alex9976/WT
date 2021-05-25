<?php
include "main.php";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/contacts_style.css">
    <link rel="stylesheet" href="assets/css/basket.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>Контакты</title>
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
                        <form>
                            <div class="form-inner">
                                <div class="form-title">Связаться с нами</div>
                                <label for="name"><b>Ваше имя</b></label>
                                <input type="text" placeholder="Иван" name="psw" required>
                                <label for="email"><b>Ваш e-mail</b></label>
                                <input type="text" placeholder="email@gmail.com" name="email" required>
                                <label for="message"><b>Сообщение</b></label>
                                <input type="text" placeholder="Как можем вам помочь?" name="message" required>
                                <button type="submit" class="send-button">Отправить</button>
                            </div>
                        </form>
                    </div>

                    <div class="contacts">
                        <h1>Контакты:</h1>
                        <p>+375 29 111-00-00</p>
                        <p>+375 44 111-00-00</p>
                        <p>email@gmail.com</p>
                        <br>
                        <form method="post">
                            <div class="form-inner-newsletter">
                                <div class="form-title">Подписаться на рассылку</div>
                                <label for="email"><b>Ваш e-mail</b></label>
                                <input type="text" placeholder="email@gmail.com" name="email-news" required>
                                <button type="submit" class="send-button-newsletter">Отправить</button>
                            </div>
                        </form>


                        <?php
                        if (isset($_POST["email-news"])) {
                            $email = $_POST["email-news"];
                            $SQL = "INSERT INTO `newsletter`(`id`, `email`) VALUES (NULL,'$email')";
                            $request = mysqli_query($mySQL, $SQL);
                            if ($request) {
                                echo '<p>Вы подписаны на рассылку</p>';
                            } else {
                                echo '<p>Ошибка</p>';
                            }
                        }
                        ?>
                    </div>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2350.099459878399!2d27.591895935753843!3d53.91220848899251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbcfaf05d2e315%3A0xb92d4ad2eb81bddf!2z0YPQuy4g0JPQuNC60LDQu9C-IDksINCc0LjQvdGB0Lo!5e0!3m2!1sru!2sby!4v1613226362317!5m2!1sru!2sby" width="350" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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