<?php require('../scripts/header.php'); ?>
		<div class="col-md-6">
			<div class="well">
				<h4>Agregar servidor</h4>
				<form method="POST" action="../scripts/addserver.php">
					<label>Nombre del servidor</label>
					<input type="" name="server_name" class="form-control" required>
					<label>Grupo de servidores</label>
					<input type="" name="server_group" class="form-control" required>
					<label>IP del servidor</label>
					<input type="" name="server_ip" class="form-control" required>
					<br>
					<button class="btn btn-default">Agregar</button>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="well">
				<h4>Servidores registrados</h4>
				<?php
					if($run_server->num_rows){
				 ?>
				<table class="table-bordered" width="100%">
					<tr>
						<th>ID servidor</th>
						<th>Nombre del servidor</th>
						<th>Grupo de servidores</th>
						<th>IP del servidor</th>
						<th>Eliminar</th>
					</tr>

					<?php while($query_result = $run_server->fetch_array()) {
						$id = $query_result['id_server'];
						$server_name = $query_result['server_name'];
						$server_group = $query_result['server_group'];
						$server_adress = $query_result['server_adress'];

						echo '<tr>
								<td>'.$id.'</td>
								<td>'.$server_name.'</td>
								<td>'.$server_group.'</td>
								<td>'.$server_adress.'</td>
								<td><a href="../scripts/delete_server.php?id_serv='.$id.'" class="btn">Eliminar</a></td>
						</tr>';

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
