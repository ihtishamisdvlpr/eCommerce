<?php require 'top.inci.php';
$categories = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($conn, $_GET['id']);
    $res = mysqli_query($conn, "SELECT * FROM categories WHERE id='" . $id . "'");
    $row = mysqli_fetch_assoc($res);
    $categories = $row['categories'];
}
if (isset($_POST['submit_category'])) {
    $category = get_safe_value($conn, $_POST['category']);
    if (isset($_GET['id']) && $_GET['id'] != '') {
        mysqli_query($conn, "UPDATE `categories` SET `categories`='" . $categories . "' WHERE `id`='" . $id . "'");
    } else {
        $sql = "INSERT INTO `categories`(`categories`,`status`) VALUES('$category','0')";
        mysqli_query($conn, $sql);
    }
    header('location:categories.php');
    die();
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
        <h4>Add Category Name</h4>
        <form method="POST">
            <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $categories ?>" name="category" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name" required>
            </div>
            <br />
            <button type="submit" name="submit_category" class="btn btn-primary">Submit Category</button>
        </form>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>