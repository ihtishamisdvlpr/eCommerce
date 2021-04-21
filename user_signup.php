<?php require('mainadmin/functions.inc.php');
$name = get_safe_value($conn, $_POST['name']);
$email = get_safe_value($conn, $_POST['email']);
$mobile = get_safe_value($conn, $_POST['mobile']);
$password = get_safe_value($conn, md5($_POST['password']));

$check_user = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email'"));
if ($check_user > 0) {
    echo "present";
} else {
    $added_on = date('y-m-d H:i:s');
    mysqli_query($conn, "INSERT INTO `users`(`name`,`email`,`mobile`,`password`,`added_on`) VALUES('$name','$email','$mobile','$password','$added_on')");
    echo "insert";
}
