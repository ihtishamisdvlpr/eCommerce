<?php

    $conn = mysqli_connect('localhost','root','','ecommerce');
    if($conn == false){
        die('DB connection error'.mysqli_connect_error());
    }