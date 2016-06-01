<?php
	require('../scripts/header.php');

	if(!empty($_GET['group'])){
		$group = $_GET['group'];
		$sel_monitoring = "select * from monitor WHERE `server_group` = \"$group\"";
		$run_monitoring = mysqli_query($conn, $sel_monitoring);
		$i = 0;
		$dataformonitoring = array();

		while($data = $run_monitoring->fetch_array()){
			$idserver = $data['id_server'];
			$idservice = $data['id_service'];

			$sel_server = mysqli_query($conn, "select `server_adress`, `server_name` from server where id_server = $idserver limit 1");
			$sel_server = mysqli_fetch_object($sel_server);
			$name = $sel_server->server_name;
			$adress = $sel_server->server_adress;

			$sel_service = mysqli_query($conn, "select `service_name`, `service_port` from services where id_service = $idservice limit 1");
			$sel_service = mysqli_fetch_object($sel_service);
			$service_name = $sel_service->service_name;
			$port = $sel_service->service_port;

			$dataformonitoring[$i]['id_server'] = $idserver;
			$dataformonitoring[$i]['id_service'] = $idservice;
			$dataformonitoring[$i]['name'] = $name;
			$dataformonitoring[$i]['host'] = $adress;
			$dataformonitoring[$i]['group'] = $_GET['group'];
			$dataformonitoring[$i]['port'] = $port;
			$dataformonitoring[$i]['service_name'] = $service_name;
			$i++;
		}

	}else{
		$sel_monitoring = "select * from monitor";
		$run_monitoring = mysqli_query($conn, $sel_monitoring);

		$i = 0;
		$dataformonitoring = array();
		while($data = $run_monitoring->fetch_array()){
			$idserver = $data['id_server'];
			$idservice = $data['id_service'];

			$sel_server = mysqli_query($conn, "select `server_adress`, `server_name`, `server_group` from server where id_server = $idserver limit 1");
			$sel_server = mysqli_fetch_object($sel_server);
			$name = $sel_server->server_name;
			$adress = $sel_server->server_adress;
			$group = $sel_server->server_group;

			$sel_service = mysqli_query($conn, "select `service_name`, `service_port` from services where id_service = $idservice limit 1");
			$sel_service = mysqli_fetch_object($sel_service);
			$service_name = $sel_service->service_name;
			$port = $sel_service->service_port;

			$dataformonitoring[$i]['id_server'] = $idserver;
			$dataformonitoring[$i]['id_service'] = $idservice;
			$dataformonitoring[$i]['name'] = $name;
			$dataformonitoring[$i]['host'] = $adress;
			$dataformonitoring[$i]['group'] = $group;
			$dataformonitoring[$i]['port'] = $port;
			$dataformonitoring[$i]['service_name'] = $service_name;
			$i++;
		}
	}
?>
<div class="col-md-1"></div>
<div class="col-md-10">
	<div class="well">
		<h4>Monitoreo de servidores</h4>
		<?php
			if(sizeof($dataformonitoring) !== 0){
		 ?>
		<table class="table-bordered" width="100%">
			<tr>
				<th>Nombre servidor</th>
				<th>Direccion de servidor</th>
				<th>Grupo de servidor</th>
				<th>Nombre del servicio</th>
				<th>Puerto de servicio</th>
				<th>Estado</th>
				<th>Eliminar</th>
			</tr>

			<?php
			 	$i = 0;
				while(sizeof($dataformonitoring) > $i) {
					$status = "";
					$output = "";
					$host = $dataformonitoring[$i]['host'];
					$port = $dataformonitoring[$i]['port'];
					exec("../scripts/monitor.sh {$host} {$port}",$output);
					$status = implode("\n", $output);
				echo '<tr>
						<td>'.$dataformonitoring[$i]['name'].'</td>
						<td>'.$dataformonitoring[$i]['host'].'</td>
						<td><a href="../admin_dashboard/monitoring.php?group='.$dataformonitoring[$i]['group'].'">'.$dataformonitoring[$i]['group'].'</a></td>
						<td>'.$dataformonitoring[$i]['service_name'].'</td>
						<td>'.$dataformonitoring[$i]['port'].'</td>
						<td>'.$status.'</td>
						<td><a href="../scripts/delete_monitoring.php?id_server='.$dataformonitoring[$i]['id_server'].'&id_service='.$dataformonitoring[$i]['id_service'].'">Eliminar<a></td>
				</tr>';
				$i++;
				} ?>


		</table>
		<?php
		} else {
		?>

		<span>No hay Servidores registrados</span>
		<?php
		}
		?>
	</div>
</div>
</div>

</body>
</html>
