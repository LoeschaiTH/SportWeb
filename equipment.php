<?php  
session_start(); 
$page = 'equipment';
$_SESSION["id"];?> 
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
				<div class="col col-lg-3">
				</div>
				<div class="col-lg-6 ">
					<h2 class="display-5 text-center">เพิ่มอุปกรณ์</h2>
					<br>
					<form class="container" action="save_equipment.php" method="post" id="needs-validation" novalidate enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom03">รหัสอุปกรณ์ <span style="color: red"> *</span></label>
								<input type="text" class="form-control" id="validationCustom03" placeholder="รหัสอุปกรณ์" name="equipment_code" required>
								<div class="invalid-feedback">
									กรุณาระบุรหัสอุปกรณ์.
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom04">ชื่ออุปกรณ์<span style="color: red"> *</span></label>
								<input type="text" class="form-control" id="validationCustom04" placeholder="ชื่ออุปกรณ์" name="equipment_name" required>
								<div class="invalid-feedback">
									กรุณาระบุชื่ออุปกรณ์.
								</div>
							</div>
						</div>
						<!-- <div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom05">ผู้จัดทำ<span style="color: red"> *</span></label>
								<input name="book_user" class="form-control" id="validationCustom05" placeholder="ผู้จัดทำ" required rows="4"></ร>
								<div class="invalid-feedback">
									กรุณาระบุผู้จัดทำ.
								</div>
							</div>
						</div> -->
						
						<br>
						<div class="row">
							<div class="col-md-5 mb-3">
								<button class="btn btn-primary" type="submit">บันทึก</button>
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

</body>

</html>
