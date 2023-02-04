<?php

$servidor   ="localhost";
$usuario    ="root";
$contrasenha ="raspberry";
$BD         ="ObreroBienestar";

$conexion = mysqli_connect($servidor, $usuario, $contrasenha, $BD);

if(!$conexion)
{
    echo "Fallo la conexiòn <br>";
    die("Connection failed: ".mysqli_connect_error());
}
else{
    //echo "Conexiòn Exitosa";
}
?>
