<?php require 'top.inci.php';
$type = '';
if (isset($_GET['type']) && $_GET['type'] != '') {
   $type = get_safe_value($conn, $_GET['type']);
   if ($type == 'status') {
      $operation = get_safe_value($conn, $_GET['operation']);
      $id = get_safe_value($conn, $_GET['id']);
      if ($operation == 'active') {
         $status = '1';
      } else {
         $status = '0';
      }
      $update_status = "UPDATE categories SET `status`='" . $status . "' WHERE id='" . $id . "'";
      $res = mysqli_query($conn, $update_status);
   }
}

if ($type == 'delete') {
   $id = get_safe_value($conn, $_GET['id']);
   $delete_sql = "DELETE FROM `categories` where `id`='" . $id . "'";
   mysqli_query($conn, $delete_sql);
}

$sql = "SELECT * FROM `categories` ORDER BY categories asc";
$res = mysqli_query($conn, $sql);
?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Orders </h4>
                  <a href="manage_categories.php">Add Category</a>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">#</th>
                              <th>ID</th>
                              <th>Categories</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $i = 1;
                           while ($row = mysqli_fetch_assoc($res)) {
                           ?>
                              <tr>
                                 <td class="serial"><?php echo $i; ?></td>
                                 <td><?php echo $row['id']; ?></td>
                                 <td><?php echo $row['categories']; ?></td>
                                 <td>
                                    <?php if ($row['status'] == 1) {
                                       echo "<a href='?type=status&operation=deactive&id=" . $row['id'] . "'>deactive</a>|";
                                    } else {
                                       echo "<a href='?type=status&operation=active&id=" . $row['id'] . "'>active</a>|";
                                    }

                                    echo "<a href='?type=delete&id=" . $row['id'] . "'>Delete</a>|";
                                    echo "<a href='manage_categories.php?id=" . $row['id'] . "'>Edit</a>";
                                    ?>
                                 </td>
                              </tr>

                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php require 'footer.inc.php'; ?>