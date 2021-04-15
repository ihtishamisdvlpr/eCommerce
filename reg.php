<?php
require('mainadmin/functions.inc.php');
$name = get_safe_value($conn, $_POST['name']);
$email = get_safe_value($conn, $_POST['email']);
$mobile = get_safe_value($conn, $_POST['mobile']);
$password = get_safe_value($conn, md5($_POST['password']));
$checkAlreadyExist = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$email'");
if ($checkAlreadyExist > 0) {
    echo "email already exists";
} else {
    $added_on = date('Y-m-d h:i:s');
    mysqli_query($conn, "INSERT INTO `users`(`name`, `password`, `email`, `mobile`, `added_on`) VALUES('$name','$password','$mobile','$email','$added_on')");
    echo 'you have been registered';
}
