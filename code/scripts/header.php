<?php
session_start();
if(empty($_SESSION['logeding'])){
	header("location: ../index.php");
	exit;
}
include('../conexion/config.php');
conexion();

	$sel_servers = "select * from server";

	$run_server = mysqli_query($conn, $sel_servers);

	$sel_services = "select * from services";

	$run_services = mysqli_query($conn, $sel_services);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Panel de administraci&oacute;n</title>
	<?php
		require('../scripts/calls.php');
	 ?>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<?php
			require('../scripts/menu.php');
			 ?>
		</div>
