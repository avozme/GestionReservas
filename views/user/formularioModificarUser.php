<?php

$user = $data['user'][0];

echo "<h1>Modificar Usuario</h1>";


echo"<form action = 'index.php' method = 'POST' enctype='multipart/form-data'>
        <div class='col-10'>
                <input type='hidden' name='id' value='$user->id'>

                <div class='form-group'>
                <label for='name2'>Nombre de registro</label>
                <input type='text' name='username' value='$user->username' class='form-control' id='name2' aria-describedby='emailHelp' placeholder='Nombre Registro'>
                </div>

                <div class='form-group'>
                <label for='desc'>Contraseña del usuario</label>
                <input input type='text' name='password' value='$user->password' class='form-control' id='desc' placeholder='Contraseña'>
                </div>

                <div class='form-group'>
                <label for='local'>Nombre del Usuario</label>
                <input input type='text' name='realname' value='$user->realname' class='form-control' id='local' placeholder='Nombre Real'>
                </div>

                <div class='form-group'>
                <input type='hidden' name='action' value='modificarUser'>
                <input type='hidden' name='controller' value='UserController'>
                <button type='submit' class='btn btn-primary'>Añadir Usuario</button>
                </div>

                <p><a href='index.php?controller=UserController&action=mostrarUser'class='btn btn-warning'>Volver</a></p>
        </div>
</form>";


echo "";
?>