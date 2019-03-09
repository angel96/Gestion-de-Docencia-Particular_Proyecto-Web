<?php
session_start();

require_once("gestionBD.php");
require_once("gestionarEntradasTutores.php");

$conexion = conectarBD();


if (!isset($_SESSION["Tutores"])) {
    $Tutores["NOMBRE"] = "";
    $Tutores["APELLIDOS"] = "";
    $Tutores["EMAIL"] = "";
    $Tutores["TELEFONO"] = "";
    $Tutores["SEXO"]="";
    $Tutores["NOMBREZONA"]="";
    $Tutores["OID_T"] = "";
    $Tutores["OID_Z"] = "";
    $_SESSION["error"]="";
    $_SESSION["destino"]="";
    $_SESSION["Tutores"] = $Tutores;
}
else{$Tutores=$_SESSION["Tutores"];}
    
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF8"> <!--ISO-8859-1-->
        <title>Gesti&oacute;n de Tutores</title>
        <link type="text/css" rel="stylesheet" href="estilo general.css">
    </head>
<body background="Blue-Widescreen-Background-1920x1200.jpg">
    <?php    
    include_once("cabecera.php"); 
    ?>
     <br/><br/><br/><br/><br/><br/><br/>
<div id="contenidos">
   
    <div id="libros">
         <table>
            <tr>
                <th>Nombre</th><th>Apllidos</th><th>Email</th><th>Teléfono</th><th>Sexo</th><th>Zona</th><th>Editar/Grabar</th><th>Borrar</th><th>Infromación</th>
            </tr>      
        <?php 
            $filas = consultarTodosLosTutores($conexion);
            foreach($filas as $fila) {
        ?>
       
        <div class="alumnos">
            <form method="post" action="procesar_tutores.php">
            
                <!-- C�digo para mostrar cada una de las l�neas, revise los temas de teor�a -->

                <tr>
                <input id="OID_T" name="OID_T" type="hidden" value="<?php echo $fila["OID_T"]?>"/>
                <input id="OID_Z" name="OID_Z" type="hidden" value="<?php echo $fila["OID_Z"]?>"/>
                <input id="NOMBRE" name="NOMBRE" type="hidden" value="<?php echo $fila["NOMBRE"]?>"/>
                <input id="APELLIDOS" name="APELLIDOS" type="hidden" value="<?php echo $fila["APELLIDOS"]?>"/>
                <input id="SEXO" name="SEXO" type="hidden" value="<?php echo $fila["SEXO"]?>"/>
                <input id="NOMBREZONA" name="NOMBREZONA" type="hidden" value="<?php echo $fila["NOMBREZONA"]?>"/>
                <?php if(isset($_SESSION["Tutores"]) and $Tutores["NOMBRE"]==$fila["NOMBRE"] and $Tutores["APELLIDOS"]==$fila["APELLIDOS"]){ ?>
                <td class='NOMBRE'><?php echo $fila["NOMBRE"];?></td>  
                <td class='APELLIDOS'><?php echo $fila["APELLIDOS"];?></td>
                <td class='EMAIL'><input id="EMAIL" name="EMAIL" type="text" value="<?php echo $fila["EMAIL"];?>" /></td>
                <td class='TELEFONO'><input id="TELEFONO" name="TELEFONO" type="text" value="<?php echo $fila["TELEFONO"];?>" /></td>
                <td class='SEXO'><?php echo $fila["SEXO"];?></td>
                <td class='NOMBREZONA'><input id="NOMBREZONA" name="NOMBREZONA" type="text" value="<?php echo $fila["NOMBREZONA"];?>" /></td>
                <td id="botones_fila"> 
                <button id="grabar" name="grabar"type="submit" class="editar_fila"><img src="disquete--guardar-simbolo-interfaz_318-31858.jpg" height="42" width="42" class="editar_fila"></button></td>
                <?php } else{ ?>
                <input id="EMAIL" name="EMAIL" type="hidden" value="<?php echo $fila["EMAIL"];?>"/>
                <input id="TELEFONO" name="TELEFONO" type="hidden" value="<?php echo $fila["TELEFONO"];?>"/>
                <td class='NOMBRE'><?php echo $fila["NOMBRE"];?></td>  
                <td class='APELLIDOS'><?php echo $fila["APELLIDOS"];?></td>
                <td class='EMAIL'><?php echo $fila["EMAIL"];?></td>
                <td class='TELEFONO'><?php echo $fila["TELEFONO"];?></td>  
                <td class='SEXO'><?php echo $fila["SEXO"];?></td>
                <td class='NOMBREZONA'><?php echo $fila["NOMBREZONA"];?></td>  
                <div id="botones_fila">                     
                <td><button id="editar" name="editar" type="submit" class="editar_fila"><img src="Icono_FP.png" height="42" width="42" class="editar_fila"></button></td>
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