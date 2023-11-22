<?php 
$clave = "m3m0c0d3";
//Funcion de encriptamiento
function encrypt($string, $key)
{
	$result = '';
	for ($i = 0; $i < strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key)) - 1, 1);
		$char = chr(ord($char) + ord($keychar));
		$result .= $char;
	}
	return base64_encode($result);
}

include("db.php");
if (isset($_POST['register'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1 && strlen($_POST['numero']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['contra']) >= 1) {
	    $name = trim($_POST['nombre']);
	    $apellido = trim($_POST['apellido']);
        $numero = trim($_POST['numero']);
	    $email = trim($_POST['email']);
		$contra = trim($_POST['contra']);
		$Datos= array($name, $email, $numero, $contra);
		for ($i = 0; $i <= 5; $i++) {
            $resultado=Encrypt($Datos[$i],$clave);   //llamado de funcion y encriptacion de datos
            $Datos[$i]=$resultado;  
        }
	    $consulta = "INSERT INTO usuario (nombre, correo, num_tel, contrasena) VALUES ('$Datos[0]','$Datos[1]','$Datos[2]','$Datos[3]')";
	    $resultado = mysqli_query($conexion,$consulta);
	    if ($resultado) {
            header("location:../principal.php");
	    	?> 
	    	<h3 class="ok">¡Te has inscripto correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
        }
}

?>