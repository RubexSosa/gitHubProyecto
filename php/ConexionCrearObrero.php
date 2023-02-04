<?php
include("conexion.php"); //Se llama el archvio de conexion

//Variables para recibir y guardar los datos enviados desde el formulario
$NombredeObrero=$_POST["NombredeObrero"];
$password=$_POST["password"];
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$edad=$_POST["edad"];
$email=$_POST["email"];
$ocupacion=$_POST["ocupacion"];
$ocupacion2=$_POST["ocupacion2"];
$ocupacion3=$_POST["ocupacion3"];

//Encriptar valor
$passwordHash = password_hash ($password, PASSWORD_BCRYPT); //Encripta una cadena de 60 caracteres
$FotoPerfil = "../img/obreros/$NombredeObrero/perfil.jpg"; //Nombre por defecto en carpetas

//Se evalua el valor NombredeUsuario para ver si ya existe
$consultaId = "SELECT NombredeObrero FROM DatosObreros WHERE NombredeObrero='$NombredeObrero'";
$consultaId = mysqli_query($conexion, $consultaId); //Devolucion con objeto en el resultado, falso si hay error y verdadero si se ejecuta
$consultaId = mysqli_fetch_array($consultaId); //Devolucion de array o NULL

if(!$consultaId)
{
    $sql= "INSERT INTO DatosObreros VALUES ( '$NombredeObrero', '$passwordHash', '$nombre', '$apellidos', '$edad', '$email',  '$ocupacion', '$ocupacion2', '$ocupacion3', '$FotoPerfil')";
     if(mysqli_query($conexion, $sql))
     {
        mkdir("../img/obreros/$NombredeObrero");//Creacion de carpeta donde se almacenara
        copy("../img/obreros/registro.jpg", "../img/obreros/$NombredeObrero/perfil.jpg");
        echo"Obrero Registrado correctamente.";
        echo"<br><a href='../RegistroObrero.html'>Iniciar Sesiòn</a></div>"; 
     }
     else
     {
        echo"Error:".sql."<br>".mysqli_error($conexion);
     }
}
else
     {
        echo "Nombre de Obrero ya existe.";
        echo "<a href='../RegistroObrero.html'>Intentalo Nuevamente. </a></div>";
     }

     //Cerrar Conexiòn
     mysqli_close($conexion);
?>
