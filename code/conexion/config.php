<?php 
function conexion()
{
        global $conn;
        $conn = mysqli_connect("localhost","sermin","1234","server");
        //$test = "test"; 
        if (mysqli_connect_errno()) {

                echo "MySQLi Connection was not established: " . mysqli_connect_error();
        } 
}
?>