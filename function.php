<?php

require('mainadmin/connection.inc.php');


function get_safe_value($conn, $str)
{
    if ($str !== '') {
        $str = trim($str);
        return mysqli_real_escape_string($conn, $str);
    }
}


function get_product($conn, $limit = '', $categoriesId = '', $productId = '')
{
    $sql = "SELECT * FROM `product` WHERE status=1";
    if ($categoriesId != '') {
        $sql .= " AND categories_id=$categoriesId";
    }
    if ($productId != '') {
        $sql .= " AND id=$productId";
    }
    $sql .= " ORDER BY id DESC";
    if ($limit !== '') {
        $sql .= " limit $limit";
    }
    $res = mysqli_query($conn, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    return $data;
}
