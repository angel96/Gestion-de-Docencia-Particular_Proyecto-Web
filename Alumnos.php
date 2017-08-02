<?php
session_start();

require_once("gestionBD.php");
require_once("gestionarEntradasAlumnos.php");

$conexion = conectarBD();


if (!isset($_SESSION["Alumnos"])) {
    $Alumnos["NOMBRE"] = "";
    $Alumnos["APELLIDOS"] = "";
    $Alumnos["EMAIL"] = "";
    $Alumnos["TELEFONO"] = "";
    $Alumnos["SEXO"]="";
    $Alumnos["NOMBREZONA"]="";
    $Alumnos["OID_A"] = "";
    $Alumnos["OID_Z"] = "";
    $Alumnos["ESCUELA"] = "";
    $Alumnos["FECHANACIMIENTO"] = "";
    $Alumnos["DISCAPACIDAD"] = "";
    $Alumnos["DNI"]="";
    $Alumnos["EDAD"]="";
    $_SESSION["error"]="";
    $_SESSION["destino"]="";
    $_SESSION["Alumnos"] = $Alumnos;
}
else{$Alumnos=$_SESSION["Alumnos"];}
    
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF8"> <!--ISO-8859-1-->
        <title>Gesti&oacute;n de Alumnos</title>
        <link type="text/css" rel="stylesheet" href="estilo general.css">
    </head>
<body background="Blue-Widescreen-Background-1920x1200.jpg">
   <?php    
    include_once("cabecera.php"); 
    ?>
    <div id="libros">
        <br/><br/><br/><br/><br/><br/><br/>
         <table>
            <tr>
                <th>Nombre</th><th>Apllidos</th><th>Email</th><th>Teléfono</th><th>Sexo</th><th>Zona</th><th>Escuela</th><th>Fecha de nacimiento</th><th>Discapacidad</th><th>DNI</th><th>Edad</th><th>Editar/Grabar</th><th>Borrar</th><th>Infromación</th>
            </tr>      
        <?php 
            $filas = consultarTodosLosAlumnos($conexion);
            foreach($filas as $fila) {
        ?>
       
        <div class="alumnos">
            <form method="post" action="procesar_alumnos.php">
            
                <!-- C�digo para mostrar cada una de las l�neas, revise los temas de teor�a -->

                <tr>
                <input id="OID_A" name="OID_A" type="hidden" value="<?php echo $fila["OID_A"]?>"/>
                <input id="OID_Z" name="OID_Z" type="hidden" value="<?php echo $fila["OID_Z"]?>"/>
                <input id="NOMBRE" name="NOMBRE" type="hidden" value="<?php echo $fila["NOMBRE"]?>"/>
                <input id="APELLIDOS" name="APELLIDOS" type="hidden" value="<?php echo $fila["APELLIDOS"]?>"/>
                <input id="SEXO" name="SEXO" type="hidden" value="<?php echo $fila["SEXO"]?>"/>
                <input id="NOMBREZONA" name="NOMBREZONA" type="hidden" value="<?php echo $fila["NOMBREZONA"]?>"/>
                <input id="FECHANACIMIENTO" name="FECHANACIMIENTO" type="hidden" value="<?php echo $fila["FECHANACIMIENTO"]?>"/>
                <input id="DISCAPACIDAD" name="DISCAPACIDAD" type="hidden" value="<?php echo $fila["DISCAPACIDAD"]?>"/>
                <input id="DNI" name="DNI" type="hidden" value="<?php echo $fila["DNI"]?>"/>
                <input id="EDAD" name="EDAD" type="hidden" value="<?php echo $fila["EDAD"]?>"/>
                <?php if(isset($_SESSION["Alumnos"]) and $Alumnos["DNI"]==$fila["DNI"]){ ?>
                <td class='NOMBRE'><?php echo $fila["NOMBRE"];?></td>  
                <td class='APELLIDOS'><?php echo $fila["APELLIDOS"];?></td>
                <td class='EMAIL'><input id="EMAIL" name="EMAIL" type="text" value="<?php echo $fila["EMAIL"];?>" /></td>
                <td class='TELEFONO'><input id="TELEFONO" name="TELEFONO" type="text" value="<?php echo $fila["TELEFONO"];?>" /></td>
                <td class='SEXO'><?php echo $fila["SEXO"];?></td>
                <td class='NOMBREZONA'><input id="NOMBREZONA" name="NOMBREZONA" type="text" value="<?php echo $fila["NOMBREZONA"];?>" /></td>
                <td class='ESCUELA'><input id="ESCUELA" name="ESCUELA" type="text" value="<?php echo $fila["ESCUELA"];?>" /></td>
                <td class='FECHANACIMIENTO'><?php echo $fila["FECHANACIMIENTO"];?></td>
                <td class='DISCAPACIDAD'><?php echo $fila["DISCAPACIDAD"]=="1"?"Sí":"No";?></td>
                <td class='DNI'><?php echo $fila["DNI"];?></td>  
                <td class='EDAD'><?php echo $fila["EDAD"];?></td>
                <td id="botones_fila"> 
                <button id="grabar" name="grabar"type="submit" class="editar_fila"><img src="disquete--guardar-simbolo-interfaz_318-31858.jpg" height="42" width="42" class="editar_fila"></button></td>
                <?php } else{ ?>
                <input id="EMAIL" name="EMAIL" type="hidden" value="<?php echo $fila["EMAIL"];?>"/>
                <input id="TELEFONO" name="TELEFONO" type="hidden" value="<?php echo $fila["TELEFONO"];?>"/>
                <input id="ESCUELA" name="ESCUELA" type="hidden" value="<?php echo $fila["ESCUELA"];?>"/>
                <td class='NOMBRE'><?php echo $fila["NOMBRE"];?></td>  
                <td class='APELLIDOS'><?php echo $fila["APELLIDOS"];?></td>
                <td class='EMAIL'><?php echo $fila["EMAIL"];?></td>
                <td class='TELEFONO'><?php echo $fila["TELEFONO"];?></td>  
                <td class='SEXO'><?php echo $fila["SEXO"];?></td>
                <td class='NOMBREZONA'><?php echo $fila["NOMBREZONA"];?></td>
                <td class='ESCUELA'><?php echo $fila["ESCUELA"];?></td>  
                <td class='FECHANACIMIENTO'><?php echo $fila["FECHANACIMIENTO"];?></td>
                <td class='DISCAPACIDAD'><?php echo $fila["DISCAPACIDAD"]=="1"?"Sí":"No";?></td>
                <td class='DNI'><?php echo $fila["DNI"];?></td>  
                <td class='EDAD'><?php echo $fila["EDAD"];?></td>        
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