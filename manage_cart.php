<?php require('mainadmin/functions.inc.php');
require('add_to_cart.php');
$pid = $get_safe_value($conn, $_POST['pid']);
$qty = $get_safe_value($conn, $_POST['qty']);
$type = $get_safe_value($conn, $_POST['type']);

$obj = new add_to_cart();

if ($type == 'add') {
    $obj->addproduct($pid, $qty);
}
echo $obj->totalProduct();
