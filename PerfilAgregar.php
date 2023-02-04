<?php
    include("php/conexion.php");
    include("php/validarSesion.php");
    $NombredeObreroA=$_GET['NombredeObrero'];
    include("php/datosAmigo.php");
?>

<!DOCTYPE html>
<html>
    <head> 
        <title>Obreros en Pie</title>  
            <meta charset="UTF-8"/>
            <link href="css/estilo.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <div id="logo">
                <img src="img/logo.jpg" alt="logo"></a>    
            </div>
            <nav class="menu">

                <ul>
                    <li><a href="Perfil.php">Mi Perfil</a></li>
                    <li><a href="Obreros.php">Obreros</a></li>
                    <li><a href="Trabajos.php">Trabajos Hechos</a></li>
                    <li><a href="Buscar.php">Buscar Obrero</a></li>
                    <li><a href="php/CerrarSesion.php">Cerrar Sesion</a></li>
                </ul>
            
            </nav>
            
        </header>

            <section id="Perfil">
                <img src="<?php echo "$FotoPerfilA" ?>"/>
                <h1> <?php echo "$nombreA $apellidosA" ?> </h1>
                <p> <?php echo "$ocupacionA -- $ocupacion2A -- $ocupacion3A"?></p>
            </section>
            <section id="Recuadros">
                <h2>Trabajos Realizados</h2>
                <?php
                $consulta= "Select * FROM fotos F WHERE F.NombredeObrero in 
                (Select F.NombredeObrero2 FROM Trabajo F WHERE F.NombredeObrero1='$NombredeObreroA')";
                $datos=mysqli_query($conexion, $consulta);
                while($fila=mysqli_fetch_array($datos)){
                ?>
                <section class="recuadro">
                    <img src="<?php echo $fila['NombreFoto']?>" height="150">
                </section>
                <?php
                }
                ?>
                <section class="recuadro">
                    <a href="<?php echo "php/agregarObrero.php?NombredeObrero="."$NombredeObreroA"?>" class="boton">Agregar Obrero</a>
                </section>
            </section>
            <footer>
                <p> Copyright &copy: 2022, IPN (ESIME Zacatenco) </p>
            </footer>
    </body>
</html>
