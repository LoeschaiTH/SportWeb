
<?php  
session_start(); 
$page = 'lend';?> 
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

    <nav  aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><?="ยินดีต้อนรับ คุณ".$user->name." ".$user->lastname?></li>
      </ol>
    </nav>

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

         </form>
         <form action="save_history.php" method="post"> 
           <div class="container">
            <table id="example" class="table table-hover table-bordered table-dark" cellspacing="0" width="100%">
              <thead >
                <tr class="table-active">
                  <th width="5%">ลำดับ</th>
                  <th width="30%">ชื่ออุปกรณ์</th>
                  <th width="10%">อัปโหลด</th>
                  <th width="5%">สถานะ</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                $equipment = GetDataequipments();
                for ($i=0; $i < count($equipment) ; $i++) { 
                  $disabled = '';
                  if($equipment[$i]->equipment_status == 'ปกติ'){
                    $status = 'info';
                  }elseif ($equipment[$i]->equipment_status == 'ถูกยืม') {
                    $status = 'warning';
                    $disabled = 'disabled';
                  }elseif ($equipment[$i]->equipment_status == 'หาย') {
                    $status = 'danger';
                    $disabled = 'disabled';
                  }else {
                    $status = 'secondary';
                    $disabled = 'disabled';
                  }
                  $checked ='';
                  if($_SESSION["equipment_id"] == $equipment[$i]->equipment_id){
                     $checked = 'checked';
                  }
                  ?>
                  <tr>
                    <td><?=$i+1;?></td>
                    <td >
                      <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"  value="<?=$equipment[$i]->equipment_id?>" name="equipment_id[]" <?=$disabled?> <?=$checked?>>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><?=$equipment[$i]->equipment_name?></span>
                        <a href="<?=$equipment[$i]->equipment_detail != '' ? $equipment[$i]->equipment_detail : '#';?>"?></a>
                      </label>
                    </td>
                    
                
                    <td><?=DateThai($equipment[$i]->equipment_date)?></td>
                    <td><h5><span class="badge badge-<?=$status?>"><?=$equipment[$i]->equipment_status?></span></h5></td>
                  </tr>
                  <?php } ?>   

                </tbody>
              </table>
            </div>

            <div class="row">
              <div class="col-lg-5"></div>
              <div class="col-lg-7">
                <input type="submit" class="btn btn-success " name="submit" id="submit" value="ยืม">
              </div>
            </div>
          </form>

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
      $('#example').DataTable({
        paging: false
      });

      $("form").submit(function(){
          
          var checked = []
          $("input[name='equipment_id[]']:checked").each(function ()
          {
              checked.push(parseInt($(this).val()));
          });
          
          if(checked.length == 0){
            alert("กรุณาเลือกอุปกรณ์ที่ต้องการยืม !");
            return  false;
          }else{
            alert("ทำการยืมเรียบร้อย !");
            return  true;
          }
          
      });
    } );
  </script>
</body>

</html>
