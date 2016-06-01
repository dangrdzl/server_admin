<?php require('../scripts/header.php'); ?>
<div class="col-md-3"></div>
		<div class="col-md-5">
			<div class="well">
				<h4>Agregar servicio a servidor</h4>
				<form method="POST" action="../scripts/addservice.php">
					<label>Servidor</label>
					<select class="form-control" name="server_name" required>
						<option value="" selected="selected">Seleccione un servidor</option>
						<?php if($run_server->num_rows){
							while($query_servers = $run_server->fetch_assoc()){
								$name = $query_servers['server_name'];
								$id_server = $query_servers['id_server'];
								echo '<option value='.$id_server.'>'.$name.'</option>';
							}
							} ?>
					</select>
					<label>Nombre del servicio</label>
					<select class="form-control" name="service_name" required>
						<option value="" selected="selected">Seleccione un servicio</option>
						<?php if($run_services->num_rows){
							while($query_services = $run_services->fetch_assoc()){
								$service_name = $query_services['service_name'];
								$id_services = $query_services['id_service'];
								echo '<option value='.$id_services.'>'.$service_name.'</option>';
							}
							} ?>
					</select>
					<br>
					<button class="btn btn-default">Agregar</button>
				</form>
			</div>
		</div>

		<div>

		</div>
	</div>



</body>
</html>
