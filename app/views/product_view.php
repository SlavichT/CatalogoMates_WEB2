<?php

//La vista se encarga de mostrarle al usuario lo que solicitó.

class productView
{
    function showProducts($products)
    {
        include 'templates/header.php';
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
<?php
        include 'templates/footer.php';
    }
}
?>
?>