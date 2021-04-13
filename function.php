<?php

require('mainadmin/connection.inc.php');
function get_product($conn, $limit = '', $categoriesId = '')
{
    $sql = "SELECT * FROM `product` WHERE status=1";
    if ($categoriesId != '') {
        $sql .= " AND categories_id=$categoriesId";
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
