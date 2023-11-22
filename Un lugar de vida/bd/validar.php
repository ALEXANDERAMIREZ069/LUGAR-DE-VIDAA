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
// Funcion de desencriptado
function decrypt($string, $key)
{
    $result = '';
    $string = base64_decode($string);
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) - ord($keychar));
        $result .= $char;
    }
    return $result;
}

//Creacion de peticion y validacion
include('db.php');
$correo=$_POST['correo'];
$contra=$_POST['contra'];
$correo=encrypt($correo,$clave);
$contra=encrypt($contra, $clave);
$consulta="SELECT * FROM usuario WHERE correo='$correo' AND contrasena='$contra'";
$resultado=mysqli_query($conexion, $consulta);
while($info=$resultado->fetch_array()){
  $usuario=$info['nombre'];
  $numero=$info['Num_tel'];
  $correo2=$info['correo'];
  $contrasena=$info['contrasena'];
}
$Datos= array($usuario, $numero, $correo2, $contrasena,$correo,$contra);
		for ($i = 0; $i <= 5; $i++) {
            $resultado=decrypt($Datos[$i],$clave);   //llamado de funcion y encriptacion de datos
            $Datos[$i]=$resultado;  
        }
session_start();
$_SESSION['correo']=$Datos[2];
$_SESSION['Num_tel']=$Datos[1];
$_SESSION['usuario']=$Datos[0];

if($Datos[4] == $Datos[2] && $Datos[5] == $Datos[3]){
   header("location:../principal.php");
}else{
  header("location:../principal.php");
  ?>
  
  <h1>ERROR DE AUTENTIFICACION</h1>
  
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
