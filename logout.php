<?php if (!isset($_SESSION)) {
  session_start();
}
unset($_SESSION['is_login']);
unset($_SESSION['ADMIN_USERNAME']);
header("location:login.php");
die();

?>