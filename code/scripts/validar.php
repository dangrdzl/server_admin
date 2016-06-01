<?php

include('../conexion/config.php');
conexion();
// $conn = mysqli_connect("localhost","sermin","1234","server");

// if (mysqli_connect_errno())

// {

// echo "MySQLi Connection was not established: " . mysqli_connect_error();

// }

if(isset($_POST['send'])){

	$username = mysqli_real_escape_string($conn,$_POST['username']);

	$pass = mysqli_real_escape_string($conn,$_POST['password']);

	$sel_user = "select * from users where username='$username' AND password='$pass'";

	$run_user = mysqli_query($conn, $sel_user);
	list($user_id,$nickname,,,,,$type) = mysqli_fetch_row($run_user);

	$check_user = mysqli_num_rows($run_user);

	// echo $check_user;

		if($check_user>0){
		// echo $check_user;
		session_start();
		$_SESSION['username']=$nickname;
		$_SESSION['user_id']=$user_id;
		$_SESSION['type'] = $type;
		$_SESSION['logeding']= true;

		echo "<script>window.open('../admin_dashboard/server.php','_self')</script>";

		}
		else {

		echo "<script>alert('Usuario o contraseña incorrectos, intente de nuevo.'); window.open('../index.php','_self')</script>";

		}

}

 ?>
