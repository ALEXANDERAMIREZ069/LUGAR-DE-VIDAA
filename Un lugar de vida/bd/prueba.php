<?php
include("db.php");
$correo="avilamisael524@gmail.com";
$contra=123456;
$con="SELECT * FROM usuario when correo='$correo' and contraseña='$contra'";
$datos=mysqli_query($conexion,$con);
while($info=$datos->fetch_array()){
$usuario=$info['nombre'];
} 
echo $usuario;
?>