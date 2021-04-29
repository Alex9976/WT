<?php
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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Доставка пиццы</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <form action="order.php" class="out-pizza flex-container" name="pizza-form" method="post" id="pizza-form">
            <?php
                foreach ($pizzas as $pizza):
            ?>
            <article class="main">
                <div class="article-head">
                    <img src="<?=$pizza[4];?>" alt="<?=$pizza[1];?>" class="img-preview">
                </div>
                <div class="article-body">
                    <h2>
                        <a><?=$pizza[1];?></a>
                    </h2>
                    <p><?=$pizza[2];?></p>
                </div>
                <div class="article-properties">
                    <?php
                        foreach ($sizes as $size):
                            $size_price = $pizza[3] * $size[1];
                    ?>
                    <div class="pizza__order__size">
                        <div class="pizza__order__size__desciption">
                                <div><?=$size[2]?>(<?=$size[3]?> см, <?=$size[1]?> кг)</div>
                        </div>
                        <div class="pizza__order__size__count">
                            <span> <?=$size_price?> руб. | </span>
                           <input type="number" price="<?=$size_price?>" name="order[<?=$pizza[1];?>][<?=$size[2]?>]" min="0" max="30" value="0">
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <select multiple size="4" name="indigridients[<?=$pizza[1]?>][]" class="pizza__order__indigridients">
                        <?php
                           foreach ($ingredients as $ingredient):
                        ?>
                            <option value="<?=$ingredient[1]?>" price="<?=$ingredient[2]?>">
                                <?=$ingredient[1]?> (<?=$ingredient[2]?> руб.)
                            </option>
                        <?php endforeach; ?>
                </select>
            </article>
            <?php endforeach; ?>
            <div class='all-totals'>
                  <h3 class="total-price">Итог: <span id="total-price-value">0</span> руб</h3>
                  <input type="text" class="order-input" name="name" placeholder="Имя" required><br>
                  <input type="email" class="order-input" name="email" placeholder="Почта" required><br>
                  <input type="text" class="order-input" name="location" placeholder="Адрес" required><br>
                  <textarea name="comment" class="order-input" rows="7" cols="30" placeholder="Комментарии"></textarea><br>
                  <label for="self-delivery" style="display: inline;">Самовывоз: </label><input type="checkbox" id="self-delivery" name="self-delivery"><br>
                  <input type="submit" class="btn" value="Заказать">
            </div>    
                
        </form>    
        <script>
           HTMLCollection.prototype.toArray = function() {
              return Array.prototype.slice.call(this )
           }
           
           let form = document.getElementById('pizza-form')
           form.onchange = function(e) {
              let inputs =  form.getElementsByTagName("input")
                 .toArray()
              inputs.splice(-5,5);
        
        
        
              let options = form.getElementsByTagName("select")
                 .toArray()
                 .flatMap(a => a.selectedOptions.toArray())
        
        
              var sumOptions = options.reduce(function(sum, value) {
                return sum += parseInt(value.getAttribute('price'))
              }, 0);
        
              var sumInputs = inputs.reduce(function(sum, value) {
                return sum += value.getAttribute('price') * value.value
              }, 0);
        
              let priceEl = document.getElementById('total-price-value')
              priceEl.innerText = (sumOptions + sumInputs).toFixed(2);
           }
        </script>
    </body>
</html>
