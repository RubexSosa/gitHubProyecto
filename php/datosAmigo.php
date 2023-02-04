<?php
if($NombredeUsuario == $NombredeUsuarioA)
{
    header('Location: ../Perfil.php');
}
$consulta = "SELECT * FROM DatosObreros WHERE NombredeObrero= '$NombredeObreroA'";
$consulta =mysqli_query($conexion, $consulta);
$consulta =mysqli_fetch_array($consulta);

$nombreA=$consulta['nombre'];
$apellidosA =$consulta['apellidos'];
$edadA =$consulta['edad'];
$ocupacionA =$consulta['ocupacion'];
$ocupacion2A=$consulta['ocupacion2'];
$ocupacion3A=$consulta['ocupacion3'];
$FotoPerfilA=$consulta['FotoPerfil'];

?>
