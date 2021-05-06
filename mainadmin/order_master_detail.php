<?php require 'top.inci.php';
$order_id = mysqli_real_escape_string($conn, $_GET['id']);
if (isset($_POST['update_order_status'])) {
    $update_order_status = $_POST['update_order_status'];
    if ($update_order_status == '5') {
        mysqli_query($conn, "update `order` set order_status='$update_order_status',payment_status='Success' where id='$order_id'");
    } else {
        mysqli_query($conn, "update `order` set order_status='$update_order_status' where id='$order_id'");
    }
}
$type = '';
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}

if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE FROM `users` where `id`='" . $id . "'";
    mysqli_query($conn, $delete_sql);
}

$sql = "SELECT * FROM `users` ORDER BY `id` desc";
$res = mysqli_query($conn, $sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Order Detail</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table style="width: 98rem;">
                                <thead>
                                    <tr>
                                        <th class="product-remove"><span class="nobr">Product Name</span></th>
                                        <th class="product-thumbnail">Product Image</th>
                                        <th class="product-name"><span class="nobr">Qty</span></th>
                                        <th class="product-price"><span class="nobr">price</span></th>
                                        <th class="product-stock-stauts"><span class="nobr">Total Price</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $uid = $_SESSION['USER_ID'];
                                    $res = mysqli_query($conn, "select distinct(order_details.id) ,order_details.*,product.name,product.image,`order`.address,`order`.city,`order`.pincode from order_details,product ,`order` where order_details.order_id='$order_id' and `order`.user_id='$uid' and order_details.product_id=product.id");
                                    $total_price = 0;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $address = $row['address'];
                                        $city = $row['city'];
                                        $pincode = $row['pincode'];
                                        $total_price = $total_price + ($row['qty'] * $row['price']);
                                    ?>
                                        <tr>
                                            <td class="product-name"><?php echo $row['name'] ?></td>
                                            <td class="product-name"> <img src="upload/<?php echo $row['image'] ?>"></td>
                                            <td class="product-name"><?php echo $row['qty'] ?></td>
                                            <td class="product-name"><?php echo $row['price'] ?></td>
                                            <td class="product-name"><?php echo $row['qty'] * $row['price'] ?></td>

                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="product-name">Total Price</td>
                                        <td class="product-name"><?php echo $total_price ?></td>

                                    </tr>
                                </tbody>
                            </table>
                            <div id="address_details">
                                <strong>Address</strong>
                                <?php echo $address ?>, <?php echo $city ?>, <?php echo $pincode ?><br /><br />
                                <strong>Order Status</strong>
                                <?php
                                $order_status_arr = mysqli_fetch_assoc(mysqli_query($conn, "select order_status.name from order_status,`order` where `order`.id='$order_id' and `order`.order_status=order_status.id"));
                                echo $order_status_arr['name'];
                                ?>

                                <div>
                                    <form method="post">
                                        <select class="form-control" name="update_order_status" required>
                                            <option value="">Select Status</option>
                                            <?php
                                            $res = mysqli_query($conn, "select * from order_status");
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                if ($row['id'] == $categories_id) {
                                                    echo "<option selected value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                                } else {
                                                    echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <input type="submit" class="form-control" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.inc.php'; ?>