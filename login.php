<?php include 'connection.inc.php';

if (isset($_POST['login'])) {
   $username = get_safe_value($conn,$_POST['username']);
   $password = get_safe_value($conn,$_POST['password']);
}
?>

<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Login Page</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="admin/assets/css/normalize.css">
   <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="admin/assets/css/font-awesome.min.css">
   <link rel="stylesheet" href="admin/assets/css/themify-icons.css">
   <link rel="stylesheet" href="admin/assets/css/pe-icon-7-filled.css">
   <link rel="stylesheet" href="admin/assets/css/flag-icon.min.css">
   <link rel="stylesheet" href="admin/assets/css/cs-skin-elastic.css">
   <link rel="stylesheet" href="admin/assets/css/style.css">
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-dark">
   <div class="sufee-login d-flex align-content-center flex-wrap">
      <div class="container">
         <div class="login-content">
            <div class="login-form mt-150">
               <form method="POST">
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" name="username" class="form-control" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Password" required>
                  </div>
                  <button type="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <script src="admin/assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
   <script src="admin/assets/js/popper.min.js" type="text/javascript"></script>
   <script src="admin/assets/js/plugins.js" type="text/javascript"></script>
   <script src="admin/assets/js/main.js" type="text/javascript"></script>
</body>

</html>