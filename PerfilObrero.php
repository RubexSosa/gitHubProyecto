<?php
    include("php/conexion.php");
    include("php/validarSesionObrero.php");
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Obreros en Pie</title>  
            <meta charset="UTF-8"/>
            <link href="css/estilo.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div id="logo">
                <img src="img/elobrero.jpg" alt="logo"></a>    
            </div>
            <nav class="menu">

                <ul>
                    <li><a href="PerfilObrero.php">Mi Perfil</a></li>
                    <li><a href="Trabajosq.php">Trabajos Hechos</a></li>
                    <li><a href="Contactoa.php">Contactos</a></li>
                    <li><a href="php/CerrarSesion.php">Cerrar Sesion</a></li>
                </ul>
            
            </nav>
            
        </header>

            <section id="Perfil">
                <img src="<?php echo "$_SESSION[FotoPerfil]" ?>">
                <h1> <?php echo"$_SESSION[nombre]  $_SESSION[apellidos]" ?> </h1>
                <h1> <?php echo"$_SESSION[ocupacion] -- $_SESSION[ocupacion2] -- $_SESSION[ocupacion3]" ?></php> </h1>
                <form action="php/cambiarFotoObrero.php" method="POST" enctype="multipart/form-data">
                Cambiar FotoPerfil: <input name="archivo" id="archivo" type="file" accept=".jpg, .jpeg, .png" required />
                <input type="submit" name="subir" value="Subir"/>
                </form>
            </section>
            
            <section id="Recuadros">
                <h2>Evidencias</h2>
                <?php
                $consulta= "Select * FROM evidencia E WHERE E.NombredeUsuario='$NombredeUsuario' Limit 3";
                $datos=mysqli_query($conexion, $consulta);
                while($fila=mysqli_fetch_array($datos)){
                ?>
                <section class="recuadros">
                    <img src="<?php echo $fila['Evidencia']?>" height="200" width="280">
                </section>
                <?php
                }
                ?>
            </section>
            <h3>
                <form action="php/SubirFoto.php" method="POST" enctype="multipart/form-data">
                Añadir imagen: <input name="archivo" type="file" accept=".jpg, .jprg, .png" required />
                <input type="submit" name="subir" value="Subir"/>
                </form>
            </h3>
            <footer>
                <p> Copyright &copy: 2022, IPN (ESIME Zacatenco) </p>
            </footer>
    </body>
</html>
