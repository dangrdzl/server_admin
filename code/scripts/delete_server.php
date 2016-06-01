<?php
session_start();
if(empty($_SESSION['logeding'])){
	header("location: ../index.php");
	exit;
}
include('../conexion/config.php');
conexion();

$id_server = addslashes($_GET['id_serv']);

$sql = "DELETE FROM server WHERE `id_server` = '$id_server'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Se elimino servidor correctamente.'); window.open('../admin_dashboard/server.php','_self')</script>";
} else {
    echo "<script>alert('Hubo un error al eliminar servidor.'); window.open('../admin_dashboard/server.php','_self')</script>";
}

$conn->close();

?>
