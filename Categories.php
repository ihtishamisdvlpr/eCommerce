<?php require 'top.inci.php';

$sql = "SELECT * FROM `categories` ORDER BY categories desc";
$res = mysqli_query($conn,$sql);
 ?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Orders </h4>
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
                              <tr>
                                  <td class="serial">2.</td>
                                  <td>asd</td>
                                  <td>asd</td>
                                  <td>asd</td>
                              </tr>
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