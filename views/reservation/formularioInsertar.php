<?php

// Comprobamos si hay una sesion iniciada o no
echo "<h3><strong>Estás reservando:</strong> ";
echo $data['datosRecurso'][0]->name . " - " . $data['datosRecurso'][0]->location . "</h3><br>";


echo "<form action = 'index.php' method = 'POST' enctype='multipart/form-data'>";

echo "<div class='col-4'>";
echo "<div class='form-group'>";

// Creamos el formulario con los campos de la reserva, incluyendo recurso
echo "<input type='hidden' name='resource' value='" . $data["idRecurso"] . "'>";

echo "<label for='fecha'>Selecciona el día de la reserva</label>
				<input type='date' class='form-control' id='fecha' name='date' onChange='comprobarFecha()' onkeydown='return false'><br>";

// Finalizamos el formulario
echo "  <input type='hidden' name='action' value='reservaPaso2'>
						<input type='hidden' name='controller' value='ReservationController'>
						<input type='submit' class='btn btn-primary' value='Continuar'>
				</form>";


echo "</div>";
echo "<p><a href='index.php?controller=ResourceController&action=mostrarResources&date=date' class='btn btn-warning'>Volver</a></p>";

echo "</div>";

?>
<script>
	function comprobarFecha() {
		fecha = document.getElementById('fecha').value;
		var today = new Date();
		var todayStr = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
		if (Date.parse(fecha) <= Date.parse(todayStr)) {
			alert("Seleccione una fecha igual o posterior al día de mañana");
			document.getElementById('fecha').value = "";
		}
	}
</script>