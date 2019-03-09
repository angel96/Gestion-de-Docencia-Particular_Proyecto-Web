<?php
session_start();

require_once("gestionBD.php");
require_once("gestionarEntradasModalidad.php");

$conexion = conectarBD();


if (!isset($_SESSION["Modalidad"])) {
    $Modalidad["NOMBREMOD"] = "";
    $Modalidad["OID_M"] = "";
    $_SESSION["error"]="";
    $_SESSION["destino"]="";
    $_SESSION["Modalidad"] = $Modalidad;
}
else{$Modalidad=$_SESSION["Modalidad"];}
    
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF8"> <!--ISO-8859-1-->
        <title>Gesti&oacute;n de modalidades</title>
        <link type="text/css" rel="stylesheet" href="estilo general.css">
    </head>
<body background="Blue-Widescreen-Background-1920x1200.jpg">
    <?php    
    include_once("cabecera.php"); 
    ?>
     <br/><br/><br/><br/><br/><br/><br/>
<?php echo $_SESSION["error"];?>
<div id="contenidos">
   
    <div id="libros">
         <table>
            <tr>
                <th>Nombre</th><th>Editar/Grabar</th><th>Asignaturas</th>
            </tr>      
        <?php 
            $filas = consultarTodasLasModalidades($conexion);
            foreach($filas as $fila) {
        ?>
       
        <div class="modalidades">
            <form method="post" action="procesar_modalidad.php">
            
                <!-- C�digo para mostrar cada una de las l�neas, revise los temas de teor�a -->

                <tr>
                <input id="OID_M" name="OID_M" type="hidden" value="<?php echo $fila["OID_M"]?>"/>
                <?php if(isset($_SESSION["Modalidad"]) and $Modalidad["NOMBREMOD"]==$fila["NOMBREMOD"]){ ?>
                    <td class='NOMBREMOD'><input id="NOMBREMOD" name="NOMBREMOD" type="text" value="<?php echo $fila["NOMBREMOD"];?>" /></td>  
                    <td id="botones_fila"> 
                    <button id="grabar" name="grabar"type="submit" class="editar_fila"><img src="disquete--guardar-simbolo-interfaz_318-31858.jpg" height="42" width="42" class="editar_fila"></button></td>
                <?php } else{ ?>
                <input id="NOMBREMOD" name="NOMBREMOD" type="hidden" value="<?php echo $fila["NOMBREMOD"];?>"/>
                <td class='NOMBREMOD'><?php echo $fila["NOMBREMOD"];?></td>      
                <div id="botones_fila">                     
                <td><button id="editar" name="editar" type="submit" class="editar_fila"><img src="edit_128.png" height="42" width="42" class="editar_fila"></button></td>
                <?php } ?>
                <td><button id="ver_prestamos" name="ver_prestamos" type="submit" class="editar_fila"><img src="libros.gif" height="42" width="42" class="editar_fila"></button></td></tr>
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