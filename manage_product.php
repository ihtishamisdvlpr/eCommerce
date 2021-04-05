<?php require 'top.inci.php';
$categories_id = '';
$name = '';
$mrp = '';
$price = '';
$qty = '';
$image = '';
$short_desc = '';
$description = '';
$meta_title = '';
$meta_desc = '';
$meta_keyword = '';





$msg = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($conn, $_GET['id']);
    $res = mysqli_query($conn, "SELECT * FROM product WHERE id='" . $id . "'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $categories = $row['categories'];
    } else {
        header('location:product.php');
        die();
    }
}
if (isset($_POST['submit_category'])) {
    $category = get_safe_value($conn, $_POST['categories_id']);
    $name = get_safe_value($conn, $_POST['name']);
    $mrp = get_safe_value($conn, $_POST['mrp']);
    $price = get_safe_value($conn, $_POST['price']);
    $short_desc = get_safe_value($conn, $_POST['short_desc']);
    $description = get_safe_value($conn, $_POST['description']);
    $meta_title = get_safe_value($conn, $_POST['meta_title']);
    $meta_desc = get_safe_value($conn, $_POST['meta_desc']);
    $meta_keyword = get_safe_value($conn, $_POST['meta_keyword']);
    $image = get_safe_value($conn, $_POST['image']);
    $res = mysqli_query($conn, "SELECT * FROM product WHERE `name`='" . $name . "'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                echo $msg = "Product Already Exist";
            }
        } else {
            echo $msg = "Product Already Exist";
        }
    }
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            mysqli_query($conn, "UPDATE `product` SET `categories_id`='" . $categories_id . "' ,`name`='" . $name . "',`mrp`='" . $mrp . "',`price`='" . $price . "',`short_desc`='" . $short_desc . "',`description`='" . $description . "',`meta_title`='" . $meta_title . "',`meta_desc`='" . $meta_desc . "',`meta_keyword`='" . $meta_keyword . "',`image`='" . $image . "' WHERE `id`='" . $id . "'");
        } else {
            $sql = "INSERT INTO `product`(`categories_id`,`name`,`mrp`,`price`,`short_desc`,`description`,`meta_title`,`meta_desc`,`meta_keyword`,`image`) VALUES('$categories_id','$name','$mrp','$price','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword','$image','0')";
            mysqli_query($conn, $sql);
        }
        header('location:product.php');
        die();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h4>Add product</h4>
        <form method="POST">
            <div class="form-group">
                <select class="form-control" name="categories_id">
                    <option>Select Categories</option>
                    <?php
                    $q = "SELECT id,categories FROM categories ORDER BY categories asc";
                    $res = mysqli_query($conn, $q);
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<option value = " . $row['id'] . ">" . $row['categories'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $name; ?>" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Name" required>
            </div>
            </b>
            <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $mrp; ?>" name="mrp" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct MRP" required>
            </div>
            </b>
            <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $price; ?>" name="price" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Price" required>
            </div>
            </b>
            <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $qty; ?>" name="qty" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Quantity" required>
            </div>
            </b>
            <div class="form-group">
                <textarea type="text" class="form-control" value="<?php echo $short_desc; ?>" name="short_desc" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Short Description" required></textarea>
            </div>
            </b>
            <div class="form-group">
                <textarea type="text" class="form-control" value="<?php echo $description; ?>" name="description" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Description" required></textarea>
            </div>
            </b>
            <div class="form-group">
                <textarea type="text" class="form-control" value="<?php echo $meta_title; ?>" name="meta_title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Meta Title" required></textarea>
            </div>
            </b>
            <div class="form-group">
                <textarea type="text" class="form-control" value="<?php echo $meta_desc; ?>" name="meta_desc" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Meta Description" required></textarea>
            </div>
            </b>
            <div class="form-group">
                <textarea type="text" class="form-control" value="<?php echo $meta_keyword; ?>" name="meta_keyword" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Meta Keyword" required></textarea>
            </div>
            </b>
            <div class="form-group">
                <input type="file" class="form-control" value="<?php echo $image; ?>" name="image" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Image" required>
            </div>
            </b>

            <button type="submit" name="submit_category" class="btn btn-primary">Submit Category</button>
        </form>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>