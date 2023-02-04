<?php
include('conexion.php');

session_start();//Inicia o reanuda sesion
$_SESSION['login']=false;

$NombredeUsuario=$_POST["NombreDeUsuario"];
$password =$_POST["Password"];
//Evaluacion de nombre de usuario
$consulta="SELECT * FROM DatosPersonal WHERE NombredeUsuario='$NombredeUsuario'";
$consulta=mysqli_query($conexion, $consulta);
$consulta=mysqli_fetch_array($consulta);

//Revisamos el password
if($consulta)
{
    if(password_verify($password, $consulta['password']))
    {
        $_SESSION[login]=true;
        $_SESSION[NombredeUsuario]=$consulta['NombredeUsuario'];
        $_SESSION[nombre]=$consulta['nombre'];
        $_SESSION[apellidos]=$consulta['apellidos'];
        $_SESSION[edad]=$consulta['edad'];
        $_SESSION[calle]=$consulta['calle'];
        $_SESSION[colonia]=$consulta['colonia'];
        $_SESSION[municipio]=$consulta['municipio'];
        $_SESSION[estado]=$consulta['estado'];
        $_SESSION[postal]=$consulta['postal'];
        $_SESSION[FotoPerfil]=$consulta['FotoPerfil'];

        header('Location: ../Perfil.php');//Pagina de perfil
    }
    else
    {
        echo "Contraseña Incorrecta.";
        echo "<br><a href='../index.html'>Intentelo de nuevo.</a><br></div>";
    }
}else
{
    echo "El usuario no existe.";
    echo "<br><a href='../index.html'>Intentelo de nuevo.</a></div>";
}
mysqli_close($conexion);

?>
