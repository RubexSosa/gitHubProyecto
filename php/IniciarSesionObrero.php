<?php
include('conexion.php');

session_start();//Inicia o reanuda sesion
$_SESSION['login']=false;

$NombredeObrero=$_POST["NombredeObrero"];
$password =$_POST["password"];
//Evaluacion de nombre de usuario
$consulta="SELECT * FROM DatosObreros WHERE NombredeObrero='$NombredeObrero'";
$consulta=mysqli_query($conexion, $consulta);
$consulta=mysqli_fetch_array($consulta);

//Revisamos el password
if($consulta)
{
    if(password_verify($password, $consulta['password']))
    {
        $_SESSION[login]=true;
        $_SESSION[NombredeObrero]=$consulta['NombredeObrero'];
        $_SESSION[nombre]=$consulta['nombre'];
        $_SESSION[apellidos]=$consulta['apellidos'];
        $_SESSION[edad]=$consulta['edad'];
        $_SESSION[email]=$consulta['email'];
        $_SESSION[ocupacion]=$consulta['ocupacion'];
        $_SESSION[ocupacion2]=$consulta['ocupacion2'];
        $_SESSION[ocupacion3]=$consulta['ocupacion3'];
        $_SESSION[FotoPerfil]=$consulta['FotoPerfil'];

        header('Location: ../PerfilObrero.php');//Pagina de perfil de obrero
    }
    else
    {
        echo "Contraseña Incorrecta.";
        echo "<br><a href='../RegistroObrero.html'>Intentelo de nuevo.</a><br></div>";
    }
}else
{
    echo "El Obrero no existe.";
    echo "<br><a href='../RegistroObrero.html'>Intentelo de nuevo.</a></div>";
}
mysqli_close($conexion);

?>
