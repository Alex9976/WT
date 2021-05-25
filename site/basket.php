<div id="modal-window" class="modal" style="display: block;">
    <div class="modal-content"><span class="close">×</span><br>
        <?php
        $cost = 0;
        $SQL = "SELECT * FROM `product`";
        $request = mysqli_query($mySQL, $SQL);
        if ($request) {
            $data = mysqli_fetch_all($request);
            foreach ($data as $item) {
                if (isset($_COOKIE['btn' . $item[0]]) && $_COOKIE['btn' . $item[0]]) {
                    echo '<div class="product-section" id="', $item[0], '">
                                    <div class="product-img">
                                        <img src="', $item[4], '" alt="">
                                    </div>
                                    <div class="product-header">
                                        <span class="product-title"><a href="#">', $item[1], '</a></span>
                                        <div class="product-description">', $item[2], '</div>
                                    </div>
                                    <h3 class="product-cost" id="', $item[0], '">', $item[3], ' р.</h3>
                                    <form method="post">
                                    <button type="submit" class="buy-button" name="btndel', $item[0], '">Удалить</button>
                                    </form>
                                </div>';
                    $cost += (float)preg_replace("/,/u", ".", $item[3]);
                }
            }
        }
        echo '<div class="modal-buy"><div class="modal-buy-header">Итого: ', preg_replace("/\./u", ",", $cost), ' р.</div>
                                <button type="submit" class="buy-button" name="modal-buy-button">Оформить заказ</button>';
        ?>
    </div>
</div>
<script src="./assets/js/script.js"></script>