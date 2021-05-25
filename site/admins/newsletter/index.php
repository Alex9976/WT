<?php
include "../../main.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/css/login_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap"
          rel="stylesheet">
    <title>Рассылка</title>
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
                            <?php if (isset($_POST) && isset($_POST["btn"])) {
                                $isError = false;
                                if (isset($_POST["email"])) {
                                    $email = preg_split("/,/", $_POST["email"]);
                                }
                                if (isset($_POST["text"])) {
                                    $text = $_POST["text"];
                                }
                                if (isset($_POST["message"])) {
                                    $message = $_POST["message"];
                                }

                                if (isset($_POST["db-email"])) {
                                    $emailDB = $_POST["db-email"];
                                } else {
                                    $emailDB = false;
                                }

                                foreach ($email as $item) {
                                    if (!preg_match('/@/', $item) && !$emailDB) {
                                        $isError = true;
                                        echo "Incorrect email: ", $item, "<br>";
                                        echo '<label for="emil"><b>Email</b></label>
                                            <input type="text" placeholder="email" name="email" value="', $_POST["email"], '">
                                            <input name="db-email" type="checkbox">Использовать email из БД<br><br>
                                            <label for="text"><b>Тема</b></label>
                                            <input type="text" placeholder="Тема" name="text" value="', $_POST["text"], '" required>
                                            <label for="message"><b>Сообщение</b></label>
                                            <input type="text" placeholder="Сообщение" name="message" value="', $_POST["message"], '" required>';
                                        break;
                                    }
                                }


                                $isSuccess = true;
                                $subject = $text;
                                $subject = '=?utf-8?B?' . base64_encode($subject) . '?=';
                                $headers = "From: <iCoresite@yandex.ru>\r\n";
                                $headers .= "Reply-to: iCoresite@yandex.ru\r\n";
                                $headers .= 'Content-type: text; charset=utf-8';

                                if ($emailDB) {
                                    $SQL = "SELECT * FROM `newsletter`";
                                    $request = mysqli_query($mySQL, $SQL);
                                    if ($request) {
                                        $data = mysqli_fetch_all($request);
                                        $sendEmails = $data;
                                        foreach ($data as $item) {
                                            $to = $item[1];
                                            if (!mail($to, $subject, $message, $headers)) {
                                                $isSuccess = false;
                                                break;
                                            }
                                        }
                                    }
                                } else {
                                    foreach ($email as $item) {
                                        $to = $item;
                                        if (!mail($to, $subject, $message, $headers)) {
                                            $isSuccess = false;
                                            break;
                                        }
                                    }
                                }

                                if ($isSuccess) {
                                    $SQL = "SELECT `id` FROM `admins` WHERE username='" . $_SESSION["name"] . "'";
                                    $request = mysqli_query($mySQL, $SQL);
                                    if ($request) {
                                        $data = mysqli_fetch_all($request);
                                        foreach ($data as $item)
                                            $SQL = "INSERT INTO `actions`(`id`, `admin_id`, `event`) VALUES (NULL,$item[0],'Send email ')";
                                        $request = mysqli_query($mySQL, $SQL);
                                    }
                                    echo "Письмо отправлено<br>";
                                    $fp = fopen('email.txt', 'w');
                                    if (!$emailDB) {
                                        fwrite($fp, $_POST["email"]);
                                    } else {
                                        foreach ($sendEmails as $item) {
                                            fwrite($fp, $item[1] .= "\r\n");
                                        }
                                    }
                                    fclose($fp);
                                } else {
                                    echo "Возникли проблемы при отправке, повторите попытку позже<br>";
                                }
                            } else {
                                $isError = false;
                            }
                            if (!$isError) {

                                echo '<label for="emil"><b>Email</b></label>
                            <input type="text" placeholder="email" name="email" value="">
                            <input name="db-email" type="checkbox">Использовать email из БД<br><br>
                            <label for="text"><b>Тема</b></label>
                            <input type="text" placeholder="Тема" name="text" required>
                            <label for="message"><b>Сообщение</b></label>
                            <input type="text" placeholder="Сообщение" name="message" required>';
                            } ?>
                            <button type="submit" name="btn" class="send-button">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</main>

</body>
</html>