<?php require('header.php');
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
?>
    <script>
        window.location.href = "index.php";
    </script>
<?php
}
$cart_total = 0;
if (isset($_POST['submit'])) {
    $address = get_safe_value($conn, $_POST['address']);
    $city = get_safe_value($conn, $_POST['city']);
    $pincode = get_safe_value($conn, $_POST['pincode']);
    $payment_type = get_safe_value($conn, $_POST['payment_type']);
    $user_id = $_SESSION['USER_ID'];
    foreach ($_SESSION['cart'] as $key => $val) {
        $productarray = get_product($conn, '', '', $key);
        $price = $productarray[0]['price'];
        $qty = $productarray[0]['qty'];
        $cart_total = $cart_total + ($price * $qty);
    }
    $total_price = $cart_total;
    $payment_status = "pending";
    if ($payment_type == 'cod') {
        $payment_status = 'success';
    }
    $order_status = 'pending';
    $added_on = date('y-m-d H:i:s');

    mysqli_query($conn, "INSERT INTO `order`(`user_id`,`address`,`city`,`pincode`,`payment_type`,`payment_status`,`order_status`,`total_price`,`added_on`) 
    VALUES('$user_id',' $address','$city','$pincode','$payment_type','$payment_status','$order_status','$total_price','$added_on')");

    $order_id = mysqli_insert_id($conn);

    foreach ($_SESSION['cart'] as $key => $val) {
        $productarray = get_product($conn, '', '', $key);
        $price = $productarray[0]['price'];
        $qty = $productarray[0]['qty'];
        mysqli_query($conn, "INSERT INTO `order_details`(`order_id`,`product_id`,`qty`,`price`) VALUES('$order_id','$key','$qty','$price')");
    }
?>
    <script>
        window.location.href = "thankyou.php";
    </script>
<?php
}

?>



<div class="body__overlay"></div>
<!-- Start Offset Wrapper -->
<div class="offset__wrapper">
    <!-- Start Search Popap -->
    <div class="search__area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search__inner">
                        <form action="#" method="get">
                            <input placeholder="Search here... " type="text">
                            <button type="submit"></button>
                        </form>
                        <div class="search__close__btn">
                            <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Search Popap -->
    <!-- Start Cart Panel -->
    <div class="shopping__cart">
        <div class="shopping__cart__inner">
            <div class="offsetmenu__close__btn">
                <a href="#"><i class="zmdi zmdi-close"></i></a>
            </div>
            <div class="shp__cart__wrap">
                <div class="shp__single__product">
                    <div class="shp__pro__thumb">
                        <a href="#">
                            <img src="images/product-2/sm-smg/1.jpg" alt="product images">
                        </a>
                    </div>
                    <div class="shp__pro__details">
                        <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                        <span class="quantity">QTY: 1</span>
                        <span class="shp__price">$105.00</span>
                    </div>
                    <div class="remove__btn">
                        <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
                <div class="shp__single__product">
                    <div class="shp__pro__thumb">
                        <a href="#">
                            <img src="images/product-2/sm-smg/2.jpg" alt="product images">
                        </a>
                    </div>
                    <div class="shp__pro__details">
                        <h2><a href="product-details.html">Brone Candle</a></h2>
                        <span class="quantity">QTY: 1</span>
                        <span class="shp__price">$25.00</span>
                    </div>
                    <div class="remove__btn">
                        <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
            </div>
            <ul class="shoping__total">
                <li class="subtotal">Subtotal:</li>
                <li class="total__price">$130.00</li>
            </ul>
            <ul class="shopping__btn">
                <li><a href="cart.html">View Cart</a></li>
                <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
            </ul>
        </div>
    </div>
    <!-- End Cart Panel -->
</div>
<!-- End Offset Wrapper -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">

                            <?php
                            $accordion_class = 'accordion__title';
                            if (!isset($_SESSION['USER_LOGIN'])) {
                                $accordion_class = 'accordion__hide';
                            ?>
                                <div class="accordion__title">
                                    Checkout Method
                                </div>
                                <div class="accordion__body">
                                    <div class="accordion__body__form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form action="#" method="post">
                                                        <h5 class="checkout-method__title">Login</h5>
                                                        <div class="single-input">
                                                            <label for="user-email">Email Address</label>
                                                            <input type="email" name="login_email" id="login_email">
                                                            <span class="field_error" id="login_email_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="user-pass">Password</label>
                                                            <input type="password" name="login_password" id="login_password">
                                                            <span class="field_error" id="login_password_error"></span>
                                                        </div>
                                                        <div class="dark-btn">
                                                            <a type="button" name="login" onclick="user_login()">LogIn</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form action="#">
                                                        <h5 class="checkout-method__title">Register</h5>
                                                        <div class="single-input">
                                                            <label for="user-email">Name</label>
                                                            <input type="text" name="name" id="name">
                                                            <span class="field_error" id="name_error"></span>

                                                        </div>
                                                        <div class="single-input">
                                                            <label for="user-email">Email Address</label>
                                                            <input type="text" name="email" id="email">
                                                            <span class="field_error" id="email_error"></span>

                                                        </div>
                                                        <div class="single-input">
                                                            <label for="user-email">Mobile</label>
                                                            <input type="text" name="mobile" id="mobile">
                                                            <span class="field_error" id="mobile_error"></span>

                                                        </div>

                                                        <div class="single-input">
                                                            <label for="user-pass">Password</label>
                                                            <input type="password" name="password" id="password">
                                                            <span class="field_error" id="password_error"></span>

                                                        </div>
                                                        <div class="dark-btn">
                                                            <a type="button" name="register" onclick="user_register()">Register</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="<?php echo  $accordion_class; ?>">
                                Address Information
                            </div>
                            <div class="accordion__body">
                                <div class="bilinfo">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="address" placeholder="Street Address" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="city" placeholder="City/State" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="pincode" placeholder="Post code/ zip" required>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="<?php echo  $accordion_class; ?>">
                                payment information
                            </div>
                            <div class="accordion__body">
                                <div class="paymentinfo">
                                    <div class="single-method">
                                        <input type="radio" name="payment_type" value="cod" required> COD</input>
                                    </div>
                                    <div class="single-method">
                                        <input type="radio" name="payment_type" value="payu" required> PayU</input>
                                    </div>
                                    </br>
                                </div>
                            </div>
                            <div class="single-method">
                                <input class="fr__btn" type="submit" name="submit" value="Submit" />
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5>
                    <div class="order-details__item">

                        <?php
                        $cart_total = 0;
                        foreach ($_SESSION['cart'] as $key => $val) {
                            $productarray = get_product($conn, '', '', $key);
                            $name = $productarray[0]['name'];
                            $mrp = $productarray[0]['mrp'];
                            $price = $productarray[0]['price'];
                            $image = $productarray[0]['image'];
                            $qty = $productarray[0]['qty'];
                            $cart_total = $cart_total + ($price * $qty);
                        ?>
                            <div class="single-item">
                                <div class="single-item__thumb">
                                    <img src="mainadmin/upload/<?php echo $get_product['0']['image']; ?>">
                                </div>
                                <div class="single-item__content">
                                    <a href="#"><?php echo $name; ?></a>
                                    <span class="price"><?php echo $price * $qty; ?></span>
                                </div>
                                <div class="single-item__remove">
                                    <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')"><i class="zmdi zmdi-delete"></i></a>
                                </div>
                            </div>

                        <?php } ?>
                    </div>

                    <div class="ordre-details__total">
                        <h5>Order total</h5>
                        <span class="price">$<?php echo $cart_total; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->
<?php require('footer.php'); ?>