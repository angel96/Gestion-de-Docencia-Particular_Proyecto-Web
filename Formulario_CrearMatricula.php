<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <?php
    session_start();
    require_once("GestionBD.php");
    require_once("GestionarEntradasMatricula.php");
    $conexion=conectarBD();
if (!isset($_SESSION["formularioMat"])) {
    $formularioMat["FECHACOMIENZODIA"]="";
    $formularioMat["FECHACOMIENZOMES"]="";
    $formularioMat["FECHACOMIENZOAÑO"]="";
    $formularioMat["FECHAFINDIA"]="";
    $formularioMat["FECHAFINMES"]="";
    $formularioMat["FECHAFINAÑO"]="";
    $formularioMat["DNI"]="";
    $formularioMat["NOMBRETUTOR"]="";
    $formularioMat["APELLIDOSTUTOR"]="";
    $formularioMat["NOMBREASIG"]="";
    $formularioMat["NOMBREPROFESOR"]="";
    $formularioMat["APELLIDOSPROFESOR"]="";
    $_SESSION["formularioMat"] = $formularioMat;
}
else{
    $formularioMat=$_SESSION["formularioMat"];}
$dias;
for($i=1;$i<=31;$i=$i+1){
    $dias[$i]=$i;
}
$meses;
for($j=1;$j<=12;$j=$j+1){
    $meses[$j]=$j;
}
$años;
for($k=2016;$k<=2030;$k=$k+1){
    $años[$k]=$k;
}
    if(isset($_SESSION["erroresMat"]))
    $erroresMat=$_SESSION["erroresMat"];
?>


    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crear nueva matrícula</title>
        <link type="text/css" rel="stylesheet" href="estilo general.css">
    </head>
<body background="Blue-Widescreen-Background-1920x1200.jpg">
    <?php    
    include_once("cabecera.php"); 
    ?>
    <br/><br/><br/><br/><br/><br/><br/>
        <div style="color:red;"> 
        <?php
if (isset($erroresMat)){
print("<div class='error'>");
print("$erroresMat");
print("</div>");
unset($erroresMat);
}
?>
</div> 
    <form action="TratamientoCrearMatricula.php" method="get" enctype="multipart/form-data">
        <table>
        <tr id="div_DNI">
            <td><label for="DNI" id="DNI">DNI del alumno</label></td>
            <td><input id="DNI" name="DNI" type="text" value="<?php echo $formularioMat["DNI"]; ?>" size="10"></input></td></tr>
            <tr id="div_NOMBRETUTOR">
            <td><label for="NOMBRETUTOR" id="label_NOMBRETUTOR">Nombre del tutor</label></td>
            <td><input id="NOMBRETUTOR" name="NOMBRETUTOR" type="text" value="<?php echo $formularioMat['NOMBRETUTOR']; ?>" size="50"></input></td></tr>
            <tr id="div_ApellidosTutor">
            <td><label for="APELLIDOSTUTOR" id="label_EMAIL">Apellidos del tutor</label></td>
            <td><input id="APELLIDOSTUTOR" name="APELLIDOSTUTOR" type="text" value="<?php echo $formularioMat['APELLIDOSTUTOR']; ?>" size="50"></input></td></tr>
            <tr id="div_NOMBREPROFESOR">
            <td><label for="NOMBREPROFESOR" id="label_NOMBREPROFESOR">Nombre del profesor</label></td>
            <td><input id="NOMBREPROFESOR" name="NOMBREPROFESOR" type="text" value="<?php echo $formularioMat['NOMBREPROFESOR']; ?>" size="50"></input></td></tr>
            <tr id="div_APELLIDOSPROFESOR">
            <td><label for="APELLIDOSPROFESOR" id="label_APELLIDOSPROFESOR">Apellidos del profesor</label></td>
            <td><input id="APELLIDOSPROFESOR" name="APELLIDOSPROFESOR" type="text" value="<?php echo $formularioMat['APELLIDOSPROFESOR']; ?>" size="50"></input></td></tr>
            
            <tr><td><label for="FECHACOMIENZO" id="label_FECHACOMIENZO">Fecha de comienzo</label></td>
            <td><select name="FECHACOMIENZODIA" value=<?php echo $formularioMat["FECHACOMIENZODIA"];?> id="FECHANACIMIENTODIA" size="3">
        <?php 
            foreach($dias as $fila) {
        ?>
        <option><?php echo $fila?></option>
        <?php
            }
            ?>
            </select>
            <select name="FECHACOMIENZOMES" value=<?php echo $formularioMat["FECHACOMIENZOMES"];?> id="FECHACOMIENZOMES" size="3">
        <?php 
            foreach($meses as $fila) {
        ?>
        <option><?php echo $fila?></option>
        <?php
            }
            ?>
            </select>
            <select name="FECHACOMIENZOAÑO" value=<?php echo $formularioMat["FECHACOMIENZOAÑO"];?> id="FECHACOMIENZOAÑO" size="3">
        <?php 
            foreach($años as $fila) {
        ?>
        <option><?php echo $fila?></option>
        <?php
            }
            ?>
            </select></td></tr>
            <tr><td><label for="FECHAFIN" id="FECHAFIN">Fecha de fin</label></td>
            <td><select name="FECHAFINDIA" value=<?php echo $formularioMat["FECHAFINDIA"];?> id="FECHAFINDIA" size="3">
        <?php 
            foreach($dias as $fila) {
        ?>
        <option><?php echo $fila?></option>
        <?php
            }
            ?>
            </select>
            <select name="FECHAFINMES" value=<?php echo $formularioMat["FECHAFINMES"];?> id="FECHAFINMES" size="3">
        <?php 
            foreach($meses as $fila) {
        ?>
        <option><?php echo $fila?></option>
        <?php
            }
            ?>
            </select>
            <select name="FECHAFINAÑO" value=<?php echo $formularioMat["FECHAFINAÑO"];?> id="FECHAFINAÑO" size="3">
        <?php 
            foreach($años as $fila) {
        ?>
        <option><?php echo $fila?></option>
        <?php
            }
            ?>
            </select></td></tr>
            <tr><td><label for="NOMBREASIG" id="label_NOMBREASIG">Nombre de la Asignatura</label></td>
            <td><select name="NOMBREASIG" value=<?php echo $formularioMat["NOMBREASIG"];?> id="NOMBREASIG" size="5">
        <?php 
            $filas = consultarTodasLasAsignaturas($conexion);
            foreach($filas as $fila) {
        ?>
        <option><?php echo $fila["NOMBREASIG"];?></option>
        <?php
            }
            ?>
            </select></td></tr></table>
        <div id="div_submit">
            <input type="submit" value="Publicar"></input>
        </div>
    </form>
</body>
</html>