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
        $category = $row['categories_id'];
        $name = $row['name'];
        $mrp = $row['mrp'];
        $price = $row['price'];
        $qty = $row['qty'];
        $short_desc = $row['short_desc'];
        $description = $row['description'];
        $meta_title = $row['meta_title'];
        $meta_desc = $row['meta_desc'];
        $meta_keyword = $row['meta_keyword'];
    } else {
        header('location:product.php');
    }
}

if (isset($_POST['submit_product'])) {
    $category = get_safe_value($conn, $_POST['categories_id']);
    $name = get_safe_value($conn, $_POST['name']);
    $mrp = get_safe_value($conn, $_POST['mrp']);
    $price = get_safe_value($conn, $_POST['price']);
    $qty = get_safe_value($conn, $_POST['qty']);
    $short_desc = get_safe_value($conn, $_POST['short_desc']);
    $description = get_safe_value($conn, $_POST['description']);
    $meta_title = get_safe_value($conn, $_POST['meta_title']);
    $meta_desc = get_safe_value($conn, $_POST['meta_desc']);
    $meta_keyword = get_safe_value($conn, $_POST['meta_keyword']);
    $status = 1;
    $res = mysqli_query(
        $conn,
        "SELECT * FROM product WHERE name='" . $name . "'"
    );
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                echo $msg = 'Category Already Exist';
            }
        } else {
            echo $msg = 'Category Already Exist';
        }
    }
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            mysqli_query(
                $conn,
                "UPDATE `product` SET `categories_id`='" . $category . "' ,`name`='" . $name . "',`mrp`='" . $mrp . "',`price`='" . $price . "',
                    `qty`='" . $qty . "',`short_desc`='" . $short_desc . "',`description`='" . $description . "',`meta_title`='" . $meta_title . "',`meta_desc`='" . $meta_desc . "',
                    `meta_keyword`='" . $meta_keyword . "'WHERE `id`='" . $id . "'"
            );
        } else {
            $image = $_FILES['image'];
            $imagename = $image['name'];
            $imageerror = $image['error'];
            $imagetmp = $image['tmp_name'];
            $imagetext = explode(".", $imagename);
            $imagecheck = strtolower(end($image));
            $imagestore = array('png', 'jpg', 'jpeg');

            if (in_array($imagecheck, $imagestore)) {
                $destination = '../media/product/' . $imagename;
                move_uploaded_file($imagetmp, $destination);
            }


            $sql = "INSERT INTO `product`(`categories_id`,`name`,`mrp`,`price`,`qty`,`short_desc`,`description`,`meta_title`,`meta_desc`,`meta_keyword`,`image`,`status`) 
            VALUES('$category','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword','$image','$status')";
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
        <form method="POST" enctype="multipart/form-data">
            <div class=" form-group">
                <select class="form-control" name="categories_id">
                    <option>Select Categories</option>
                    <?php
                    $q =
                        'SELECT id,categories FROM categories ORDER BY categories asc';
                    $res = mysqli_query($conn, $q);
                    while ($row = mysqli_fetch_assoc($res)) {
                        if ($row['id'] == $category) {
                            echo "<option value=" . $row['id'] . " selected>" . $row['categories'] . "</option>";
                        } else {
                            echo "<option value = " . $row['id'] . " required>" . $row['categories'] . "</option>";
                        }
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
                <textarea type="text" class="form-control" name="short_desc" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Short Description" required><?php echo $short_desc; ?></textarea>
            </div>
            </b>
            <div class="form-group">
                <textarea type="text" class="form-control" name="description" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Description" required><?php echo $description; ?></textarea>
            </div>
            </b>
            <div class="form-group">
                <textarea type="text" class="form-control" name="meta_title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Meta Title" required><?php echo $meta_title; ?></textarea>
            </div>
            </b>
            <div class="form-group">
                <textarea type="text" class="form-control" name="meta_desc" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Meta Description" required><?php echo $meta_desc; ?></textarea>
            </div>
            </b>
            <div class="form-group">
                <textarea type="text" class="form-control" name="meta_keyword" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Meta Keyword" required><?php echo $meta_keyword; ?></textarea>
            </div>
            </b>
            <div class="form-group">
                <input type="file" class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pruduct Meta Keyword"></input>
            </div>
            </b>

            <button type=" submit" name="submit_product" class="btn btn-primary">Submit Product</button>
        </form>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>