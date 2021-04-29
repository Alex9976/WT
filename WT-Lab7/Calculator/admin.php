<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include "PHPMailer.php";
include "SMTP.php";

$mySQL = mysqli_connect("localhost", "root", "", "db");

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;
$mail->Host = 'ssl://smtp.yandex.ru';
$mail->Port = 465;
$mail->Username = '...';;
$mail->Password = '...';;
$mail->setFrom('...';, 'iCore.com');


if(isset($_POST['change-new'])) {
   $id = $_POST['id'];
   $email = $_POST['email'];
   $msg = 'Заказ поступил на выполнение и будет доставлен в течении 1 часа.';
   $mail->Subject = 'Заказ № '.$id;
   $body = "Заказ принят.";
   $mail->addAddress($email);
   $mail->send();
   $query = "UPDATE pizza_order set status = 'ACCEPTED' WHERE id = '$id'";
   $mySQL->query($query);

}
if(isset($_POST['change-accepted'])) {
   $id = $_POST['id'];
   $query = "UPDATE pizza_order set status = 'DONE' WHERE id = '$id'";
    $mySQL->query($query);
}
$SQL = "SELECT * FROM `pizza_order`";
$request = mysqli_query($mySQL, $SQL);
if ($request) {
    $orders = mysqli_fetch_all($request);
}
else
{
    $orders = array();
}
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Заказы</title>
   <style media="screen">
      td  {
          border: 1px solid #000;
          padding: 3px 5px;
          text-align: center;
      }
      body {
         padding: 0;
         margin: 0;
      }
      table {
          background: #fff;
          color: #000;
          width: 100%;
          border-collapse: collapse;
      }
   </style>
</head>
<body>

<table>
      <tbody>
         <tr>
            <th>Заказ</th>
            <th>Самовывоз</th>
            <th>Пользователь</th>
            <th>Информация</th>
            <th>Цена</th>
            <th>Комментарии</th>
            <th>Статус</th>
         </tr>
         <?php
         foreach ($orders as $order):
         ?>
            <tr>
               <td><?=$order[0]?></td>
               <td><?php if($order[1]) echo 'Да'; else echo 'Нет';?> </td>
               <td><?='Имя: '.$order[2]."<br>Почта: ".$order[3].'<br>Адрес: '.$order[4]?></td>
               <td>
                   <?=$order[8]?>
               </td>
               <td><?=round($order[7] / 10, 2).' руб.'?></td>
               <td><?=$order[5]?></td>
               <td>
                   <?=$order[6]?><br>
                   <?php
                    switch ($order[6]):
                        case 'NEW':
                        ?>
                        <form action="" method="post" name="change-new">
                           <input type="text" name="id" value="<?=$order[0]?>" style="display: none">
                           <input type="text" name="email" value="<?=$order[3]?>" style="display: none">
                           <input type="submit" name="change-new" value="Принять к выполнению">
                        </form>

                        <?php
                           break;
                        case 'ACCEPTED':
                        ?>
                        <form action="" method="post" name="change-accepted">
                           <input type="text" name="id" value="<?=$order[0]?>" style="display: none">
                           <input type="submit" name="change-accepted" value="Сделано">
                        </form>

                        <?php
                           break;
                    endswitch;
                  ?>

               </td>
            </tr>
         <?php endforeach;?>
      </tbody>
   </table>
</table>

</body>
</html>
