
<?php  
session_start();
$page = 'lend';
?> 
<?php 
include "header.php";
include  "fucntion_query.php";
?>

<body>

  <!-- Navigation -->
  <?php include "navbar.php"; ?>
  <!-- Page Content -->
  
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <img src="images/img_equipment.png" class="img-fluid" alt="Responsive image">
      </div>
    </div>

    <div class="jumbotron">
      <div class="row">
        <div class="col-lg-12 ">
         <h2 class="display-5 text-center">ข้อมูลอุปกรณ์ทั้งหมด</h2>
         <br>

         <form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
         <tr><th>ค้นหาอุปกรณ์ :
            <input name="txtKeyword" type="text" id="txtKeyword" value="<?=$_GET["txtKeyword"];?>">
            <input type="submit" value="Search" class="btn btn-info"></th></form>
          <br>

         <div class="container">
          <table id="example" class="table table-hover table-bordered table-dark" cellspacing="0" width="100%">
            <thead>
              <tr class="table-active">
                <th width="5%">ลำดับ</th>
                <th width="30%">ชื่ออุปกรณ์</th>
                <!-- <th width="20%">ชื่อผู้จัดทำ</th> -->
                <!-- <th width="10%">ปี</th> -->
                <th width="10%">อัปโหลด</th>
                <th width="5%">สถานะ</th>
              </tr>
            </thead>

            <tbody>
             <?php 
             $equipment = GetDataequipments();
             $link = '#';
             for ($i=0; $i < count($equipment) ; $i++) { 
               if($equipment[$i]->equipment_status == 'ปกติ'){
                 $status = 'info';
                 $link = "href='admin-page.php?book_id=".$equipment[$i]->equipment_id."'";
               }elseif ($equipment[$i]->equipment_status == 'ถูกยืม') {
                 $status = 'warning';
               }elseif ($equipment[$i]->equipment_status == 'หาย') {
                 $status = 'danger';
               }else {
                 $status = 'secondary';
               }
               if(isset($_SESSION["status"])){
                if($_SESSION["status"] != 0){
                  $link = "href='equipment_update.php?equipment_id=".$equipment[$i]->equipment_id."'";
                }
              }

              ?>
              <tr>
               <td><?=$i+1;?></td>
               <td>
                <a <?=$link?> >
                  <?php  if(isset($_SESSION["status"])){if($_SESSION["status"] != 0){?>
                  <img width="20" src="./images/pen.png">
                  <?php }}?>
                  <?=$equipment[$i]->equipment_name?></a> <a href="<?=$equipment[$i]->equipment_detail != '' ? $equipment[$i]->equipment_detail : '#';?>"?></a>
                </td>
                
                
                <td><?=DateThai($equipment[$i]->equipment_date)?></td>
                <td><h5><span class="badge badge-<?=$status?>"><?=$equipment[$i]->equipment_status?></span></h5></td>
              </tr>
              <?php } ?>   

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.0.0-beta/dt-1.10.16/datatables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
</body>

</html>
