<?php
session_start();
if(empty($_SESSION['logeding'])){
	header("location: ../index.php");
	exit;
}
include('../conexion/config.php');
conexion();

$id_server = addslashes($_GET['id_server']);
$id_service = addslashes($_GET['id_service']);

$sql = "DELETE FROM monitor WHERE `id_service` = '$id_service' AND `id_server` = '$id_server'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Se elimino monitoreo correctamente.'); window.open('../admin_dashboard/monitoring.php','_self')</script>";
} else {
    echo "<script>alert('Hubo un error al eliminar monitoreo.'); window.open('../admin_dashboard/monitoring.php','_self')</script>";
}

$conn->close();

?>
