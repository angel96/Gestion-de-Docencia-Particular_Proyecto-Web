<?php
session_start();

require_once("gestionBD.php");
require_once("gestionarEntradasAsignaturas.php");

$conexion = conectarBD();


if (!isset($_SESSION["Asignaturas"])) {
    $Asignaturas["NOMBREASIG"] = "";
    $Asignaturas["CURSO"] = "";
    $Asignaturas["OID_ASIG"] = "";
    $Asignaturas["OID_M"] = "";
    $Asignaturas["NOMBREMOD"]="";
    $_SESSION["error"]="";
    $_SESSION["destino"]="";
    $_SESSION["Asignaturas"] = $Asignaturas;
}
else{$Asignaturas=$_SESSION["Asignaturas"];}
    
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF8"> <!--ISO-8859-1-->
        <title>Gesti&oacute;n de asignaturas</title>
        <link type="text/css" rel="stylesheet" href="estilo general.css">
    </head>
<body background="Blue-Widescreen-Background-1920x1200.jpg">
      <?php    
    include_once("cabecera.php"); 
    ?>
<div id="contenidos">
 <br/><br/><br/><br/>
    <div id="libros">
         <table>
            <tr>
                <th>Nombre</th><th>Curso</th><th>Modalidad</th><th>Editar/Grabar</th><th>Eliminar</th><th>Profesores</th>
            </tr>      
        <?php 
            $filas = consultarTodasLasAsignaturas($conexion);
            foreach($filas as $fila) {
        ?>
       
        <div class="asignaturas">
            <form method="post" action="procesar_asignaturas.php">
            
                <!-- C�digo para mostrar cada una de las l�neas, revise los temas de teor�a -->

                <tr>
                <input id="OID_M" name="OID_M" type="hidden" value="<?php echo $fila["OID_M"]?>"/>
                <input id="OID_ASIG" name="OID_ASIG" type="hidden" value="<?php echo $fila["OID_ASIG"]?>"/>
                <input id="CURSO" name="CURSO" type="hidden" value="<?php echo $fila["CURSO"]?>"/>
                <input id="NOMBREMOD" name="NOMBREMOD" type="hidden" value="<?php echo $fila["NOMBREMOD"]?>"/>
                <?php if(isset($_SESSION["Asignaturas"]) and $Asignaturas["NOMBREASIG"]==$fila["NOMBREASIG"]){ ?>
                    <td class='NOMBREASIG'><input id="NOMBREASIG" name="NOMBREASIG" type="text" value="<?php echo $fila["NOMBREASIG"];?>" /></td>  
                    <td id="botones_fila"> 
                    <button id="grabar" name="grabar"type="submit" class="editar_fila"><img src="disquete--guardar-simbolo-interfaz_318-31858.jpg" height="42" width="42" class="editar_fila"></button></td>
                <?php } else{ ?>
                <input id="NOMBREASIG" name="NOMBREASIG" type="hidden" value="<?php echo $fila["NOMBREASIG"];?>"/>
                <td class='NOMBREASIG'><?php echo $fila["NOMBREASIG"];?></td>  
                <td class='CURSO'><?php echo $fila["CURSO"];?></td>
                <td class='NOMBREMOD'><?php echo $fila["NOMBREMOD"];?></td>        
                <div id="botones_fila">                     
                <td><button id="editar" name="editar" type="submit" class="editar_fila"><img src="edit_128.png" height="42" width="42" class="editar_fila"></button></td>
                <?php } ?>
                <td><button id="quitar" name="quitar" type="submit" class="editar_fila"><img src="remove-32640.jpg" height="42" width="42" class="editar_fila"></button></td>
                <td><button id="ver_prestamos" name="ver_prestamos" type="submit" class="editar_fila"><img src="ensenar_318-11671.png" height="42" width="42" class="editar_fila"></button></td></tr>
                </div>
            </form>
        </div>
        
        <?php } ?>
    </div>  
</div>

<?php   
    desconectarBD($conexion);
?>      
</body>
</html>