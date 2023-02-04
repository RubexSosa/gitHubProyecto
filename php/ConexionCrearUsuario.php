<?php
include("conexion.php"); //Se llama el archvio de conexion

//Variables para recibir y guardar los datos enviados desde el formulario
$NombredeUsuario=$_POST["NombreDeUsuario"];
$password=$_POST["Password"];
$nombre=$_POST["Nombre"];
$apellidos=$_POST["Apellidos"];
$edad=$_POST["Edad"];
$email=$_POST["Email"];
$calle=$_POST["Calle"];
$colonia=$_POST["Colonia"];
$municipio=$_POST["Municipio"];
$estado=$_POST["Estado"];
$postal=$_POST["Postal"];

//Encriptar valor
$passwordHash = password_hash ($password, PASSWORD_BCRYPT); //Encripta una cadena de 60 caracteres
$FotoPerfil = "../img/$NombredeUsuario/perfil.jpg"; //Nombre por defecto en carpetas

//Se evalua el valor NombredeUsuario para ver si ya existe
$consultaId = "SELECT NombredeUsuario FROM DatosPersonal WHERE NombredeUsuario='$NombredeUsuario'";
$consultaId = mysqli_query($conexion, $consultaId); //Devolucion con objeto en el resultado, falso si hay error y verdadero si se ejecuta
$consultaId = mysqli_fetch_array($consultaId); //Devolucion de array o NULL

if(!$consultaId)
{
    $sql= "INSERT INTO DatosPersonal VALUES ( '$NombredeUsuario', '$passwordHash', '$nombre', '$apellidos', '$edad', '$email',  '$calle','$colonia', '$municipio', '$estado', '$postal', '$FotoPerfil')";
     if(mysqli_query($conexion, $sql))
     {
        mkdir("../img/$NombredeUsuario");//Creacion de carpeta donde se almacenara
        copy("../img/default.jpg", "../img/$NombredeUsuario/perfil.jpg");
        echo"Cuenta creada correctamente.";
        echo"<br><a href='../index.html'>Iniciar Sesiòn</a></div>"; 
     }
     else
     {
        echo"Error:".sql."<br>".mysqli_error($conexion);
     }
}
else
     {
        echo "Nombre de Usuario ya existe.";
        echo "<a href='../index.html'>Intentalo Nuevamente. </a></div>";
     }

     //Cerrar Conexiòn
     mysqli_close($conexion);
?>
