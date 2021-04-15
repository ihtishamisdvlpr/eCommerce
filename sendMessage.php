<?php require('mainadmin/functions.inc.php');
$name = get_safe_value($conn, $_POST['name']);
$email = get_safe_value($conn, $_POST['email']);
$mobile = get_safe_value($conn, $_POST['mobile']);
$comment = get_safe_value($conn, $_POST['comment']);
$added_on = date('Y-m-d h:i:s');
mysqli_query($conn, "INSERT INTO `contact_us`(`name`,`email`,`mobile`,`comment`,`added_on`) VALUES('$name','$email','$mobile','$comment','$added_on')");
echo "thanks you";
