<?php
require('mainadmin/functions.inc.php');
$email = get_safe_value($conn, $_POST['email']);
$password = get_safe_value($conn, md5($_POST['password']));
$val = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$email'");
$check = mysqli_num_rows($val);
if ($check > 0) {
    $data = mysqli_fetch_assoc($val);
    $_SESSION['is_login'] = TRUE;
    $_SESSION['USER_ID'] = $row['id'];
    $_SESSION['USER_EMAIL'] = $row['email'];
    header('location:index.php');
} else {
    header('location.userLogin.php');
}
