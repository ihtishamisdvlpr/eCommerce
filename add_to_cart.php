<?php
class add_to_cart
{
    function addProduct()
    {
        $_SESSION['cart'][$pid]['qty'] = $qty;
    }
    function updateProduct()
    {
        if (isset($_SESSION['cart'][$pid]['qty'])) {
            $_SESSION['cart'][$pid]['qty'] = $qty;
        }
    }
    function removeProduct()
    {
        if (isset($_SESSION['cart'][$pid]['qty'])) {
            unset($_SESSION['cart'][$pid]['qty']);
        }
    }
    function emptyProduct()
    {
        unset($_SESSION['cart']);
    }
}
