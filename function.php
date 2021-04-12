<?php
require('mainadmin/connection.inc.php');
function get_product($conn, $type = '', $limit = '')
{
    $sql = "SELECT * FROM `product`";
    if ($type == 'latest') {
        $sql .= " ORDER BY id DESC";
    }
    if ($limit !== '') {
        $sql .= " limit $limit";
    }
    echo $sql;
    $res = mysqli_query($conn, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    return $data;
}
