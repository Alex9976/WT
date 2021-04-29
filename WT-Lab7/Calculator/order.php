<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mySQL = mysqli_connect("localhost", "root", "", "db");
$SQL = "SELECT * FROM `pizza`";
$request = mysqli_query($mySQL, $SQL);
if ($request) {
    $pizzas = mysqli_fetch_all($request);
}
else
{
    $pizzas = array();
}
$SQL = "SELECT * FROM `ingredient`";
$request = mysqli_query($mySQL, $SQL);
if ($request) {
    $ingredients = mysqli_fetch_all($request);
}
else
{
    $ingredients = array();
}
$SQL = "SELECT * FROM `size`";
$request = mysqli_query($mySQL, $SQL);
if ($request) {
    $sizes = mysqli_fetch_all($request);
}
else
{
    $sizes = array();
}

if(isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $self_delivery = (isset($_POST['self-delivery']) and $_POST['self-delivery'] == 'no') ? 1 : 0;
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
} else {
    exit('Error with sended data');
}



$SQL = "INSERT INTO pizza_order
        (self_delivery, customer_name, customer_email, location, comment, status, info)
        VALUES ('$self_delivery', '$name', '$email', '$location', '$comment', 'NEW', '')";
$request = mysqli_query($mySQL, $SQL);
$order_id =  $mySQL->insert_id;

$tablePizzas = '<table border="1" style="border-collapse: collapse;">
   <tr>
    <th>Пицца</th>
    <th>Размер</th>
    <th>Количество</th>
    <th>Цена</th>
   </tr>';

$tableIngredients = '<table border="1" style="border-collapse: collapse;">
   <tr>
    <th>Пицца</th>
    <th>Топпинг</th>
    <th>Цена</th>
   </tr>';

$totalPrice = 0;
foreach ($pizzas as $pizza) {

    $currPizza = $_POST['order'][$pizza[1]];

    foreach ($sizes as $size) {
        $currCount = $currPizza[$size[2]];
        if($currCount != 0) {
            $pizza_id = $pizza[0];
            $size_id = $size[0];
            $query = "INSERT INTO order_pizzas(order_id, pizza_id, size_id, count)
                VALUES ('$order_id', '$pizza_id', '$size_id', '$currCount')";
            $mySQL->query($query);

            $tablePizzas = $tablePizzas.'<tr><td>'.$pizza[1].'</td>
                              <td>'.$size[2].'</td>
                              <td>'.$currCount.'</td>
                              <td>'.$currCount*$pizza[3]*$size[1].'</td>
                          </tr>';

            $totalPrice += $currCount*$pizza[3]*$size[1];
        }
    }

    if(isset($_POST['indigridients'])) {
        if(array_key_exists($pizza[1], $_POST['indigridients'])) {
            $arr = $_POST['indigridients'][$pizza[1]];
            foreach ($ingredients as $ingredient) {
                for($i = 0; $i < count($arr); $i++) {
                    if($arr[$i] == $ingredient[1]) {
                        $pizza_id = $pizza[0];
                        $ing_id = $ingredient[0];
                        $query = "INSERT INTO order_ingredients(order_id, pizza_id, ingredient_id)
                        VALUES ('$order_id', '$pizza_id', '$ing_id')";
                        $mySQL->query($query);

                        $tableIngredients = $tableIngredients.'<tr><td>'.$pizza[1].'</td>
                                       <td>'.$ingredient[1].'</td>
                                       <td>'.$ingredient[2].'</td>
                                   </tr>';

                        $totalPrice += $ingredient[2];

                    }
                }
            }
        }

    }

}


include "PHPMailer.php";
include "SMTP.php";

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;
$mail->Host = 'ssl://smtp.yandex.ru';
$mail->Port = 465;
$mail->Username = '...';
$mail->Password = '...';;
$mail->setFrom('...';, 'iCore.com');

$mail->addAddress($email);
$mail->addAddress('...';);

$mail->Subject = 'Заказ № '.$order_id;
$body = $tablePizzas.'</table><br>'.$tableIngredients.'</table><br>'.'<h4>Детали: </h4>'.'<b>Имя</b>: '.$name.'<br>'.'<b>Адрес</b>: '.$location.'<br>'.'<b>Итог</b>: '.$totalPrice.'<br>'.'<b>Комментарии</b>: '.$comment.'<br><br>'.'<h3>Спасибо за заказ!</h3>'.$email_content;
$mail->msgHTML($body);
$mail->send();

$mySQL->query("UPDATE pizza_order set price = '".($totalPrice * 10)."' WHERE id = $order_id");
$mySQL->query("UPDATE pizza_order set info = '".$tablePizzas."</table><br>".$tableIngredients."</table><br>"."' WHERE id = $order_id");


echo '<script type="text/javascript">
    window.location = "index.php"
</script>';