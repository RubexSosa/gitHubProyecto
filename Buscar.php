<?php
    include("php/conexion.php");
    include("php/validarSesion.php");
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Buscar Obrero/Trabajador</title>
            <meta carset="UTF-8"/>
            <link href="css/estilo.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div id="logo">
                <img src="img/logo.jpg" alt="logo"></a>    
            </div>
            <nav class="menu">

                <ul>
                    <li><a href="Perfil.php">Mi Perfil</a></li>
                    <li><a href="Obreros.php">Obreros Agregados</a></li>
                    <li><a href="Trabajos.php">Trabajos Hechos</a></li>
                    <li><a href="Buscar.php">Buscar Obrero</a></li>
                    <li><a href="php/CerrarSesion.php">Cerrar Sesion</a></li>
                </ul>
            
            </nav>
            
        </header>
        <section id="Recuadros">
            <h2>Buscar Nuevo Obrero</h2>
            <?php
            $consulta= "Select * From DatosObreros ";
            $datos=mysqli_query($conexion, $consulta);
            while($fila=mysqli_fetch_array($datos)){
            ?>
            <section class="recuadro">
                <img src="<?php echo $fila['FotoPerfil']?>" height="150">
                <h2><?php echo $fila['nombre']." ".$fila['apellidos']?></h2>
                <h3> <?php echo $fila['ocupacion'].", ".$fila['ocupacion2'] ?> </h3>
                <a href="<?php echo "PerfilAgregar.php?NombredeObrero=".$fila['NombredeObrero']?>" class="boton">Ver perfil</a>
                <a href="<?php echo "php/agregarObrero.php?NombredeObrero=".$fila['NombredeObrero']?>" class="boton">Agregar Obrero</a><br><br>
            </section>
            <?php                }
            ?>
        </section>
        <footer>
            <p> Copyright &copy: 2022, IPN (ESIME Zacatenco) </p>
        </footer>
    </body>
</html>
