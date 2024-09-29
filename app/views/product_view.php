<?php
//La vista se encarga de mostrarle al usuario lo que solicitó.

class productView
{
    function showProducts($products)
    {
        require_once 'templates/header.phtml';

        require_once 'templates/product_cards.phtml';
        require_once 'templates/footer.phtml';
    }

    function showProductInDetail($product)
    {
        require_once 'templates/product_detail.phtml';
    }

    function showErrorGeneric($error)
    {
        require_once 'templates/show_error.phtml';
    }
}
