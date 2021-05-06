<?php require('header.php'); ?>
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
                            <span class="breadcrumb-item active">Wishlist</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- wishlist-area start -->
<div class="wishlist-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wishlist-content">
                    <form action="#">
                        <div class="wishlist-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-remove"><span class="nobr">Order ID</span></th>
                                        <th class="product-thumbnail">Order Date</th>
                                        <th class="product-name"><span class="nobr">Address</span></th>
                                        <th class="product-price"><span class="nobr">Payment Type</span></th>
                                        <th class="product-stock-stauts"><span class="nobr">Payment Status</span></th>
                                        <th class="product-add-to-cart"><span class="nobr">Order Status</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $uid = $_SESSION['USER_ID'];
                                    $res = mysqli_query($conn, "select `order`.*,order_status.name as order_status_str from `order`,order_status where `order`.user_id='$uid' and order_status.id=`order`.order_status");
                                    while ($row = mysqli_fetch_assoc($res)) {


                                    ?>
                                        <tr>
                                            <td class="product-add-to-cart"><a href="my_order_details.php?id=<?php echo $row['id']; ?>"><?php echo $row['id']; ?></a></td>
                                            <td class="product-name"><a href="#"><?php echo $row['added_on']; ?><br /><?php echo $row['address']; ?><br /><?php echo $row['city']; ?></a></td>
                                            <td class="product-name"><a href="#"><?php echo $row['payment_type']; ?></a></td>
                                            <td class="product-name"><a href="#"><?php echo $row['payment_status']; ?></a></td>
                                            <td class="product-price"><span class="amount"><?php echo $row['order_status']; ?></span></td>
                                            <td class="product-stock-status"><span class="wishlist-in-stock"><?php echo $row['order_status_str']; ?></span></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">
                                            <div class="wishlist-share">
                                                <h4 class="wishlist-share-title">Share on:</h4>
                                                <div class="social-icon">
                                                    <ul>
                                                        <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-tumblr"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- wishlist-area end -->
<!-- Start Brand Area -->
<div class="htc__brand__area bg__cat--4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ht__brand__inner">
                    <ul class="brand__list owl-carousel clearfix">
                        <li><a href="#"><img src="theme/images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="theme/images/brand/2.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="theme/images/brand/3.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="theme/images/brand/4.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="theme/images/brand/5.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="theme/images/brand/5.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="theme/images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="theme/images/brand/2.png" alt="brand images"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Brand Area -->
<!-- Start Banner Area -->
<div class="htc__banner__area">
    <ul class="banner__list owl-carousel owl-theme clearfix">
        <li><a href="product-details.html"><img src="theme/images/banner/bn-3/1.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="theme/images/banner/bn-3/2.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="theme/images/banner/bn-3/3.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="theme/images/banner/bn-3/4.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="theme/images/banner/bn-3/5.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="theme/images/banner/bn-3/6.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="theme/images/banner/bn-3/1.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="theme/images/banner/bn-3/2.jpg" alt="banner images"></a></li>
    </ul>
</div>
<!-- End Banner Area -->
<!-- End Banner Area -->

<?php require('footer.php'); ?>