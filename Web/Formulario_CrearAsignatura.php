<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <?php
    session_start();
    require_once("GestionBD.php");
    require_once("GestionarEntradasModalidad.php");
    $conexion=conectarBD();
if (!isset($_SESSION["formularioAsig"])) {
    $formularioAsig["NOMBREASIG"]="";
    $formularioAsig["CURSO"]="";
    $formularioAsig["NOMBREMOD"]="";
    $_SESSION["formularioAsig"] = $formularioAsig;
}
else{$formularioAsig=$_SESSION["formularioAsig"];}
    if(isset($_SESSION["erroresAsig"]))
    $erroresAsig=$_SESSION["erroresAsig"];
?>


    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crear nueva asignatura</title>
        <link type="text/css" rel="stylesheet" href="estilo general.css">
    </head>
<body background="Blue-Widescreen-Background-1920x1200.jpg">
    <?php    
    include_once("cabecera.php"); 
    ?>
     <br/><br/><br/><br/><br/><br/><br/>
     <div style="color:red;"> 
        <?php
if (isset($erroresAsig)){
print("<div class='error'>");
print("$erroresAsig");
print("</div>");
unset($erroresAsig);
}
?>
</div> 
</div> 
<table>
    <form action="TratamientoCrearAsignatura.php" name="formulario" method="get" onsubmit="return validacion();" enctype="multipart/form-data">
            <tr><td><label for="nombre" id="label_nombre">Nombre de la nueva asignatura</label></td>
            <td><input id="NOMBREASIG" name="NOMBREASIG" type="text" value="<?php echo $formularioAsig['NOMBREASIG']; ?>" size="50"></input></td></tr>
            <div id="div_curso">
            <tr><td><label for="cursoAsig" id="label_curso">Curso</label></td>
            <td><input id="CURSO" name="CURSO" type="text" value="<?php echo $formularioAsig['CURSO']; ?>" size="50"></input></td></tr>
            <div id="div_nombreMod">
            <tr><td><label for="Mod" id="label_mod">Modalidad a la que pertenece la asignatura</label></td>
            <td><select name="NOMBREMOD" value=<?php echo $formularioAsig['NOMBREMOD'];?> id="NOMBREMOD" size="7">
        <?php 
            $filas = consultarTodasLasModalidades($conexion);
            foreach($filas as $fila) {
        ?>
        <option><?php echo $fila["NOMBREMOD"];?></option>
        <?php
            }
            ?>
            </select></td></tr>
        </div>
        <tr><td> <id="div_submit">
            <input type="submit" value="Publicar"></input>
        </div></td></tr></table>
    </form>
    <script type="text/javascript">
        function validacion(){
           asignatura= document.getElementById("NOMBREASIG").value;
           
           if(asignatura=="" || asignatura == null || /^\+$/.test(asignatura)){
               alert("La asignatura no puede ser vacia");
               return false;
           } else {
               return true;
           }
        }
    </script>
    <?php desconectarBD($conexion);?>
</body>
</html>