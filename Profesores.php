<?php
session_start();

require_once("gestionBD.php");
require_once("gestionarEntradasProfesores.php");

$conexion = conectarBD();


if (!isset($_SESSION["Profesores"])) {
    $Profesores["NOMBRE"] = "";
    $Profesores["APELLIDOS"] = "";
    $Profesores["EMAIL"] = "";
    $Profesores["TELEFONO"] = "";
    $Profesores["SEXO"]="";
    $Profesores["NOMBREZONA"]="";
    $Profesores["OID_P"] = "";
    $Profesores["OID_M"] = "";
    $Profesores["NOMBREMOD"] = "";
    $Profesores["OID_Z"] = "";
    $_SESSION["error"]="";
    $_SESSION["destino"]="";
    $_SESSION["Profesores"] = $Profesores;
}
else{$Profesores=$_SESSION["Profesores"];}
    
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF8"> <!--ISO-8859-1-->
        <title>Gesti&oacute;n de Profesores</title>
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
                <th>Nombre</th><th>Apllidos</th><th>Email</th><th>Teléfono</th><th>Sexo</th><th>Zona</th><th>Modalidad</th><th>Editar/Grabar</th><th>Borrar</th><th>Infromación</th>
            </tr>      
        <?php 
            $filas = consultarTodosLosProfesores($conexion);
            foreach($filas as $fila) {
        ?>
       
        <div class="alumnos">
            <form method="post" action="procesar_profesores.php">
            
                <!-- C�digo para mostrar cada una de las l�neas, revise los temas de teor�a -->

                <tr>
                <input id="OID_P" name="OID_P" type="hidden" value="<?php echo $fila["OID_P"]?>"/>
                <input id="OID_Z" name="OID_Z" type="hidden" value="<?php echo $fila["OID_Z"]?>"/>
                <input id="NOMBREMOD" name="NOMBREMOD" type="hidden" value="<?php echo $fila["NOMBREMOD"]?>"/>
                <input id="NOMBRE" name="NOMBRE" type="hidden" value="<?php echo $fila["NOMBRE"]?>"/>
                <input id="APELLIDOS" name="APELLIDOS" type="hidden" value="<?php echo $fila["APELLIDOS"]?>"/>
                <input id="SEXO" name="SEXO" type="hidden" value="<?php echo $fila["SEXO"]?>"/>
                <input id="NOMBREZONA" name="NOMBREZONA" type="hidden" value="<?php echo $fila["NOMBREZONA"]?>"/>
                <?php if(isset($_SESSION["Profesores"]) and $Profesores["NOMBRE"]==$fila["NOMBRE"] and $Profesores["APELLIDOS"]==$fila["APELLIDOS"]){ ?>
                <td class='NOMBRE'><?php echo $fila["NOMBRE"];?></td>  
                <td class='APELLIDOS'><?php echo $fila["APELLIDOS"];?></td>
                <td class='EMAIL'><input id="EMAIL" name="EMAIL" type="text" value="<?php echo $fila["EMAIL"];?>" /></td>
                <td class='TELEFONO'><input id="TELEFONO" name="TELEFONO" type="text" value="<?php echo $fila["TELEFONO"];?>" /></td>
                <td class='SEXO'><?php echo $fila["SEXO"];?></td>
                <td class='NOMBREZONA'><input id="NOMBREZONA" name="NOMBREZONA" type="text" value="<?php echo $fila["NOMBREZONA"];?>" /></td>
                <td class='NOMBREMOD'><?php echo $fila["NOMBREMOD"];?></td>
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
                <td class='NOMBREMOD'><?php echo $fila["NOMBREMOD"];?></td>
                <div id="botones_fila">                     
                <td><button id="editar" name="editar" type="submit" class="editar_fila"><img src="edit_128.png" height="42" width="42" class="editar_fila"></button></td>
                <?php } ?>
                <td><button id="quitar" name="quitar" type="submit" class="editar_fila"><img src="remove-32640.jpg" height="42" width="42" class="editar_fila"></button></td>
                <td><button id="ver_prestamos" name="ver_prestamos" type="submit" class="editar_fila"><img src="Icono_FP.png" height="42" width="42" class="editar_fila"></button></td></tr>
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