<?php
include('../conexion/config.php');
conexion();

$server_name = addslashes($_POST['server_name']);
$service_name = addslashes($_POST['service_name']);

$sel_servers_where = "select `server_group` from server where id_server = $server_name limit 1";

$run_server_where = mysqli_query($conn, $sel_servers_where);

$group = mysqli_fetch_object($run_server_where);
$group = $group->server_group;

$sql = "INSERT INTO monitor (id_service, id_server, server_group)
VALUES ('$service_name', '$server_name', '$group')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Se vinculo nuevo servicio correctamente.'); window.open('../admin_dashboard/services.php','_self')</script>";
} else {
    echo "<script>alert('Hubo un error al vincular servicio.'); window.open('../admin_dashboard/services.php','_self')</script>";
}

$conn->close();

 ?>
