<?php  
session_start(); 
$page = 'equipment';
$_SESSION["id"];?> 
<?php 
include "header.php";
include  "fucntion_query.php";

$equipment_id = $_GET['equipment_id'];
$equipment =  Getequipment($equipment_id);
// $equipment =  GetBook($equipment_id);

//print_r($book);
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
				<div class="col col-lg-3">
				</div>
				<div class="col-lg-6 ">
					<h2 class="display-5 text-center">แก้ไข</h2>
					<br>
					<form class="container" action="update_equipment.php" method="post" id="needs-validation" novalidate enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom03">รหัสอุปกรณ์ <span style="color: red"> *</span></label>
								<input type="text" class="form-control" id="validationCustom03" placeholder="รหัสอุปกรณ์" name="equipment_code" value="<?=$equipment->equipment_code?>" required>
								<div class="invalid-feedback">
									กรุณาระบุรหัสอุปกรณ์.
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom04">ชื่ออุปกรณ์<span style="color: red"> *</span></label>
								<input type="text" class="form-control" id="validationCustom04" placeholder="ชื่ออุปกรณ์" name="equipment_name" value="<?=$equipment->equipment_name?>" required>
								<div class="invalid-feedback">
									กรุณาระบุชื่ออุปกรณ์.
								</div>
							</div>
						</div>
						<!-- <div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom05">ผู้จัดทำ<span style="color: red"> *</span></label>
								<input name="book_user" class="form-control" id="validationCustom05" placeholder="ผู้จัดทำ" required rows="4"><?=$book->book_user?></ร>
								<div class="invalid-feedback">
									กรุณาระบุผู้จัดทำ.
								</div>
							</div>
						</div> -->
		
						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom07">เลือกสถานะอุปกรณ์ <span style="color: red"> *</span></label>
								<select class="custom-select" name="equipment_status" id="validationCustom07" required>
									<option value="" selected>เลือกสถานะ </option>
									
									<option  value="ปกติ" <?=$equipment->equipment_status=='ปกติ' ? 'selected' : '';?>>ปกติ</option>
									<option value="หาย" <?=$equipment->equipment_status=='หาย' ? 'selected' : '';?>>หาย</option>
									<option value="อื่นๆ" <?=$equipment->equipment_status=='อื่นๆ' ? 'selected' : '';?>>อื่นๆ</option>
									
								</select>
								<div class="invalid-feedback">
									กรุณาเลือกปี.
								</div>
							</div>
						</div>

						<br>
						<div class="row">
							<div class="col-md-6 mb-3">
								<input type="hidden" name="equipment_id" value="<?=$equipment_id?>">
								<a href="delete_equipment.php?id=<?=$equipment_id?>" onclick="return checkDelete()"><button class="btn btn-danger" type="button">ลบอุปกรณ์</button></a>
								<button class="btn btn-warning" type="submit" onclick="myFunction()">บันทึกการแก้ไข</button>
							</div>
						</div> 
					</form>

					<script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
              (function() {
              	"use strict";
              	window.addEventListener("load", function() {
              		var form = document.getElementById("needs-validation");
              		form.addEventListener("submit", function(event) {
              			if (form.checkValidity() == false) {
              				event.preventDefault();
              				event.stopPropagation();
              			}
              			form.classList.add("was-validated");
              		}, false);
              	}, false);
              }());
          </script>
      </div>
  </div>
</div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script>
function myFunction() {
    alert("แก้ไขข้อมูลเรียบร้อย !");
}
function checkDelete(){
    return confirm('คุณต้องการที่จะลบข้อมูลอุปกรณ์นี้ ?');
}
</script>

</body>

</html>
