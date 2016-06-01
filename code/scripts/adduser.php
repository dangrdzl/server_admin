<?php
include('../conexion/config.php');
conexion();
session_start();

`username` varchar(25) NOT NULL,
`firstname` varchar(25) NOT NULL,
`lastname` varchar(25) NOT NULL,
`email` varchar(25) NOT NULL,
`password` varchar(25) NOT NULL,
`type` varchar(25) NOT NULL,

$name = addslashes($_POST['server_name']);
$group = addslashes($_POST['server_group']);
$name = addslashes($_POST['server_name']);
$group = addslashes($_POST['server_group']);
$ip = addslashes($_POST['server_ip']);
$id_user = $_SESSION['user_id'];
$sql = "INSERT INTO server (id_user, server_name, server_group, server_adress)
VALUES ('$id_user' ,'$name', '$group', '$ip')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Se agrego nuevo servidor correctamente.'); window.open('../admin_dashboard/server.php','_self')</script>";
} else {
    echo "<script>alert('Hubo un error al agregar nuevo servidor.'); window.open('../admin_dashboard/server.php','_self')</script>";
}

$conn->close();

 ?>
