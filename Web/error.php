<?php 
    session_start();

    if(isset($_SESSION['excepcion'])) {
        $excepcion=$_SESSION['excepcion'];
        unset($_SESSION['excepcion']);
    }   
    else
        $excepcion="Ha ocurrido algún tipo de error desconocido";
        // header("Location:blog.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Error</title>
        <link type="text/css" rel="stylesheet" href="style/Blog.css">  
    </head>
    <body>  
    
    <h2>Ups!</h2>
    <p>Ocurrió un problema durante el procesado de los datos. Pulse <a href="index.html">aquí</a> para volver a la página principal.</p>
    
    // <?php 
    // // Aquí deberíamos almacenar la información del error en un archivo de logs
//     
    // echo $excepcion;
    // ?>
    
    </body>
</html>