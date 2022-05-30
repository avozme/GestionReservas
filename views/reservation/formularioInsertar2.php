<?php

	$idResource = $_POST['resource'];

	$fecha=date($_POST['date']);
	$trueDay = date('w', strtotime($_POST['date']));
	$trueDate = $_POST['date'];

	// Comprobamos si hay una sesion iniciada o no
	echo "<h3><strong>Estás reservando:</strong> ";
	echo $data['datosRecurso'][0]->name." - ".$data['datosRecurso'][0]->location."</h3><br>";


		// Creamos el formulario con los campos del libro
		echo"<div class='col-11'>";
	    echo "<p>Selecciona el día de la reserva:</p><p>&nbsp;&nbsp;&nbsp;<span style='color: #aaa'>".date("d/m/Y", strtotime($_REQUEST["date"]))."</span></p>";
			echo "<form action = 'index.php' method = 'POST' enctype='multipart/form-data'>";
				echo"<div class='form-group'>";
					echo"<input type='hidden' name='idResource' value='$idResource'>";

					echo "<div class='form-group'>
						<label for='tramHora'>Tramos Horarios disponibles</label>
							<select name='idTimeTable' class='form-control form-control-sm' id='tramoHora'>";
							foreach($data['timeTable'] as $timeTable ) {

								if ($timeTable->dayOfWeek == $trueDay){
									if (array_search($timeTable->id, $data['time2']) === false) {
									echo"<option name='idTimeTable' value='" . $timeTable->id . "'>"  . $timeTable->starTime . "-" . $timeTable->endTime . "</option>";
								}else{
									echo "<option disabled name='idTimeTable' value='" . $timeTable->id . "'>"  . $timeTable->starTime . "-" . $timeTable->endTime . "</option>";
								}
							}

						}
							echo "</select>";

						

					echo"<input type='hidden' name='date' value='$trueDate'></br>
					
					<label for='repeat'>¿Repetir en semanas sucesivas? (mín. 1, máx. 40)</label>
					<input type='text' class='form-control form-control-sm' name='repeat' id='repeat' placeholder='No escribas nada si es una reserva aislada'>
					<br>

					<label for='observaciones'>Observaciones</label>
					<input type='text' class='form-control form-control-sm' name='remarks' id='observaciones' placeholder='¿Algo que añadir?'>
					</div>"; 		


				// Finalizamos el formulario
					echo "  <input type='hidden' name='action' value='insertar'>
							<input type='hidden' name='controller' value='ReservationController'>
							<input type='submit' class='btn btn-primary' value='Finalizar Reserva'></br>

					</div>
					<p><a href='index.php?controller=ReservationController&action=formularioInsertar&date=date'class='btn btn-warning'>Volver</a></p>
				</form>
			</div>";

	