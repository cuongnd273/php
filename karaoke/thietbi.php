<?php
session_start();
if(!isset($_SESSION["admin"]))
{
	header("Location: 404.php");
}
?>
<!doctype html>
<html lang="en">
<?php include_once 'assets/blocks/header.php';?>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- SIDEBAR -->
		<?php include_once 'assets/blocks/menu.php';?>
		<!-- END SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-10 col-md-offset-4">
							<div class="col-lg-5">
								<div class="alert alert-success" id="alert-success-top" ><?php if(isset($mess)) echo $mess;?></div>
								<form action="" method="post">
									<table>
										<tr>
											<td><label>Thiết bị</label></td>
											<td><input type="text" id="thietbi" class="form-control"></td>
										</tr>
										<tr>
											<td></td>
											<td><button type="button" name="them" class="btn btn-sm btn-success" onclick="them_thietbi();">OK</button>
											<button type="reset" class="btn btn-sm btn-warning">Reset</button></td>
										</tr>
									</table>
								</form>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-offset-3">
							<!-- BORDERED TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Thiết bị</h3>
								</div>
								<div class="panel-body">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Thiết bị</th>
												<th>Xóa</th>
											</tr>
										</thead>
										<tbody>
											<?php
											include_once 'connect/db_connect.php';
											$db=new DB_Connect();
											$conn=$db->connect();
											$result=mysqli_query($conn,'select * from thietbi');
											while($row=mysqli_fetch_array($result)){
												echo "<tr>";
												echo '
													<td>'.$row['tenthietbi'].'</td>
												';
												echo '<td><input type="image" width="40dp" heigth="40dp" src="assets/img/delete_icon.png" onclick="xoa_thietbi('.$row['mathietbi'].')"/></td>';
												echo '</tr>';
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- END BORDERED TABLE -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<?php include_once 'assets/blocks/footer.php';?>
		<!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/js/jquery/jquery-2.1.0.min.js"></script>
	<script src="assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/js/klorofil.min.js"></script>
	<script src="assets/js/control/thietbi.js"></script>
</body>

</html>
