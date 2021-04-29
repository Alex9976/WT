<!DOCTYPE HTML>
<html>
<head>
    <title></title>
</head>
<body>

<form method="post" align="center">
    Name: <input type="text" name="name"><br>
    Address: <input type="text" name="address"><br>
    Phone: <input type="text" name="phone"><br>
    Email: <input type="email" name="email"><br>
    <input type="submit" name="button">
</form>
<?php
$file = fopen("companies.csv", "a+");
$i = 0;
$companiesList[][4] = "";
$isCorrectName = true;
$isButtonPressed = false;
while (!feof($file)) {
    $companiesList[$i++] = fgetcsv($file, 0, ",");
}

if (isset($_POST['button'])) {
    $isButtonPressed = true;
}

if (isset($_POST['name'])) {
    $name = trim($_POST['name']);
    if ($name == "") {
        echo "Введите имя компании!";
        $isCorrectName = false;
    }

} else {
    $name = "";
}

if ($isButtonPressed) {
    for ($i = 0; $i < count($companiesList) - 1; $i++) {
        if ($companiesList[$i][0] == $name) {
            echo "Данная компания уже существует!";
            $isCorrectName = false;
            break;
        }
    }
}


if (isset($_POST['address'])) {
    $address = trim($_POST['address']);
} else {
    $address = "";
}

if (isset($_POST['phone'])) {
    $phone = trim($_POST['phone']);
} else {
    $phone = "";
}

if (isset($_POST['email'])) {
    $email = trim($_POST['email']);
} else {
    $email = "";
}

if ($isButtonPressed && $isCorrectName) {
    fputcsv($file, array($name, $address, $phone, $email));
}

?>

<style type="text/css">
    .info {
        margin-top: 100px;
        display: flex;
        justify-content: space-around;
    }

    .table {
        width: 50%;
    }

    .search {
        width: 50%;
        display: flex;
        flex-direction: column;
    }
</style>

<div class="info">

    <div class="table">

        <table width="100%">
            <tr>
                <td>Name</td>
                <td>Address</td>
                <td>Phone</td>
                <td>Email</td>
            </tr>
            <?php

            for ($i = 0; $i < count($companiesList) - 1; $i++) {
                echo "<tr>";

                for ($j = 0; $j < count($companiesList[0]); $j++) {
                    echo "<td>", $companiesList[$i][$j], "</td>";
                }

                echo "</tr>";
            }

            ?>

        </table>

    </div>

    <div class="search">
        <form method="post" align="center">
            Name: <input type="text" name="search_name"><br>
            <input type="submit" name="search_button">
        </form>

        <?php
        $isSrcButtonPressed = false;
        if (isset($_POST['search_button'])) {
            $isSrcButtonPressed = true;
        }

        if (isset($_POST['search_name'])) {
            $srcName = trim($_POST['search_name']);
        } else {
            $srcName = "";
        }

        ?>

        <table width="100%">
            <tr>
                <td>Name</td>
                <td>Address</td>
                <td>Phone</td>
                <td>Email</td>
            </tr>

            <?php
            if ($isSrcButtonPressed) {

                for ($i = 0; $i < count($companiesList) - 1; $i++) {
                    if ($companiesList[$i][0] == $srcName) {
                        echo "<tr>";

                        for ($j = 0; $j < count($companiesList[0]); $j++) {
                            echo "<td>", $companiesList[$i][$j], "</td>";
                        }

                        echo "</tr>";
                    }
                }
            }
            ?>
        </table>
    </div>

</div>

</body>
</html>