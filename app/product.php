<?php
require_once('app/db.php');
function showProducts()
{
    require 'templates/header.php';

    //obtenemos los productos

    $products = getProducts();

?>

    <ul class="list-group">
        <?php foreach ($products as $product) { ?>

            <li class="list-group-item active" aria-current="true">
                <?= $product->id_mate ?>
            </li>
            <li class="list-group-item">
                <b>Forma del mate:</b> <?= $product->forma_mate ?>
            </li>
            <li class="list-group-item">
                <b>Tipo de recubrimiento:</b> <?= $product->recubrimiento_mate ?>
            </li>

        <?php } ?>
    </ul>


<?php require 'templates/footer.php';
}
