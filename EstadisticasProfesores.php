<?php
session_start();

if (isset($_SESSION["Profesores"])) {
    $Profesores = $_SESSION["Profesores"];
    unset($_SESSION["Profesores"]);
    
    require_once("gestionBD.php");
    require_once("GestionarEntradasProfesores.php");

    $conexion = conectarBD();
}
else Header("Location:Profesores.php");// Se ha tratado de acceder directamente a este PHP

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF8"><!--ISO-8859-1-->
        <title>Gesti&oacute;n de Profesores: Alumnos</title>
        <link type="text/css" rel="stylesheet" href="estilo general.css">
    </head>
<body background="Blue-Widescreen-Background-1920x1200.jpg">
    <?php    
    include_once("cabecera.php"); 
    ?> 
    <br/><br/><br/><br/>
<table>
<tr class="Tutores"><td>
    <?php echo $Profesores["NOMBRE"]."</div>"; ?>
</td></tr>
<tr><td><fieldset>
<legend align="left">
Alumnos
</legend>
<table>
     <tr><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Teléfono</th><th>Sexo</th><th>Escuela</th><th>Fecha de Nacimiento</th>
         <th>Discapacidad</th><th>DNI</th><th>Edad</th><th>Asignatura</th><th>Evaluacion</th><th>Valoracion</th></tr>
    <?php 
        $filas = consultarAlumnosDeProfesor($conexion,$Profesores["OID_P"]);
        foreach($filas as $fila) {
    ?>
            <tr><td><?php echo $fila["NOMBRE"]?></td>
            <td><?php echo $fila["APELLIDOS"]?></td>
            <td><?php echo $fila["EMAIL"]?></td>
            <td><?php echo $fila["TELEFONO"]?></td>
            <td><?php echo $fila["SEXO"]?></td>
            <td><?php echo $fila["ESCUELA"]?></td>
            <td><?php echo $fila["FECHANACIMIENTO"]?></td>
            <td><?php echo $fila["DISCAPACIDAD"]=="1"?"Sí":"No";?></td>
            <td><?php echo $fila["DNI"]?></td>
            <td><?php echo $fila["EDAD"]?></td>
            <td><?php echo $fila["NOMBREASIG"]?></td>
            <td><?php echo $fila["EVALUACION"]?></td>
            <td><?php echo $fila["VALORACION"]?></td></tr>
        
    <?php } ?>
    </td></tr></table>
    </table>
<?php
    desconectarBD($conexion);
?>
</body>
</html>