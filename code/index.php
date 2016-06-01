<?php
session_start();
if(isset($_SESSION['username'])){
	header("location: ../admin_dashboard/server.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Bienvenido</title>
	<?php
		require('scripts/calls.php');
	 ?>
	<style type="text/css">
	*{
		font-family: 'Raleway', sans-serif;
	}
	</style>
</head>
<body>
<div class="col-md-12">
	<br><br>
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="well">
		<h3>Bienvenido</h3>
			<form action="../scripts/validar.php" method="POST">
				<label>Usuario</label>
				<input type="text" name="username" class="form-control">
				<label>Contraseña</label>
				<input type="password" name="password" class="form-control">
				<br>
				<button value="send" name="send" class="btn btn-primary">Ingresar</button>
			</form>
		</div>
	</div>
	<div class="col-md-4"></div>
</div>

</body>
</html>
