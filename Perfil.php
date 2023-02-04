<?php
    include("php/conexion.php");
    include("php/validarSesion.php");
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
                <img src="<?php echo "$_SESSION[FotoPerfil]" ?>">
                <h1> <?php echo"$_SESSION[nombre] $_SESSION[apellidos]" ?> </h1>
                <p> <?php echo "$_SESSION[email]"?></p>
                <p> <?php echo "$_SESSION[calle]"?></p>
                <p> <?php echo "$_SESSION[colonia]"?></p>
                <p> <?php echo "$_SESSION[municipio]"?></p>
                <p> <?php echo "$_SESSION[estado]"?></p>
                <p> <?php echo "$_SESSION[postal]"?></p>
                <form action="php/cambiarFoto.php" method="POST" enctype="multipart/form-data"/>
                Cambiar Foto de Perfil: <input name="archivo" id="archivo" type="file" accept=".jpg, .jpeg, .png" required />
                <input type="submit" name="subir" value="subir"/>
                </form>
            </section>
            <footer>
                <p> Copyright &copy: 2022, IPN (ESIME Zacatenco) </p>
            </footer>
    </body>
</html>
