<?php
session_start();

require_once("gestionBD.php");
require_once("gestionarEntradasMatricula.php");

$conexion = conectarBD();


if (!isset($_SESSION["Matriculas"])) {
    $Matriculas["OID_MAT"] = "";
    $Matriculas["OID_A"] = "";
    $Matriculas["OID_T"] = "";
    $Matriculas["OID_ASIG"] = "";
    $Matriculas["OID_P"]="";
    $Matriculas["FECHACOMIENZO"] = "";
    $Matriculas["FECHAFIN"] = "";
    $Matriculas["EVALUACION"] = "";
    $Matriculas["NOMBREASIG"] = "";
    $Matriculas["NOMBREPROF"]="";
    $Matriculas["APELLIDOSPROF"] = "";
    $Matriculas["NOMBREALUMNO"] = "";
    $Matriculas["APELLIDOSALUMNO"] = "";
    $Matriculas["OID_F"] = "";
    $Matriculas["FECHADEPAGO"]="";
    $Matriculas["IMPORTE"] = "";
    $Matriculas["METODODEPAGO"] = "";
    $Matriculas["PAGADO"]="";
    $_SESSION["error"]="";
    $_SESSION["destino"]="";
    $_SESSION["Matriculas"] = $Matriculas;
}
else{$Matriculas=$_SESSION["Matriculas"];}
    
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF8"> <!--ISO-8859-1-->
        <title>Gesti&oacute;n de facturas</title>
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
                <th>Nombre del alumno</th><th>Apellido del alumno</th><th>Asignatura</th><th>Nombre del profesor</th><th>Apellido del profesor</th><th>Fecha del comienzo</th><th>Fecha del final</th>
                <th>Evaluacion</th><th>Fecha del pago</th><th>Importe</th><th>Método de pago</th><th>Pagado</th><th>Editar/Grabar</th><th>Borrar</th>
            </tr>      
        <?php 
            $filas = consultarTodasLasMatriculasYFacturas($conexion);
            foreach($filas as $fila) {
        ?>
       
        <div class="Matriculas">
            <form method="post" action="procesar_Matriculas.php">
            
                <!-- C�digo para mostrar cada una de las l�neas, revise los temas de teor�a -->
        <?php
             $fila1=alumnoconOID($conexion,$fila["OID_A"]);
             foreach($fila1 as $fila2){
             $fila3=profesorconOID($conexion,$fila["OID_P"]);
             foreach($fila3 as $fila4){
           ?>
                <tr>
                <input id="OID_A" name="OID_A" type="hidden" value="<?php echo $fila["OID_A"]?>"/>
                <input id="OID_MAT" name="OID_MAT" type="hidden" value="<?php echo $fila["OID_MAT"]?>"/>
                <input id="OID_T" name="OID_T" type="hidden" value="<?php echo $fila["OID_T"]?>"/>
                <input id="OID_ASIG" name="OID_ASIG" type="hidden" value="<?php echo $fila["OID_ASIG"]?>"/>
                <input id="OID_P" name="OID_P" type="hidden" value="<?php echo $fila["OID_P"]?>"/>
                <input id="FECHACOMIENZO" name="FECHACOMIENZO" type="hidden" value="<?php echo $fila["FECHACOMIENZO"]?>"/>
                <input id="FECHAFIN" name="FECHAFIN" type="hidden" value="<?php echo $fila["FECHAFIN"]?>"/>
                <input id="FECHADEPAGO" name="FECHADEPAGO" type="hidden" value="<?php echo $fila["FECHADEPAGO"]?>"/>
                <input id="NOMBREASIG" name="NOMBREASIG" type="hidden" value="<?php echo $fila["NOMBREASIG"]?>"/>
                <input id="NOMBREPROF" name="NOMBREPROF" type="hidden" value="<?php echo $fila4["NOMBRE"]?>"/>
                <input id="APELLIDOSPROF" name="APELLIDOSPROF" type="hidden" value="<?php echo $fila4["APELLIDOS"]?>"/>
                <input id="NOMBREALUMNO" name="NOMBREALUMNO" type="hidden" value="<?php echo $fila2["NOMBRE"]?>"/>
                <input id="APELLIDOSALUMNO" name="APELLIDOSALUMNO" type="hidden" value="<?php echo $fila2["APELLIDOS"]?>"/>
                <input id="OID_F" name="OID_F" type="hidden" value="<?php echo $fila["OID_F"]?>"/>
                <input id="IMPORTE" name="IMPORTE" type="hidden" value="<?php echo $fila["IMPORTE"]?>"/>
                <input id="METODODEPAGO" name="METODODEPAGO" type="hidden" value="<?php echo $fila["METODODEPAGO"]?>"/>
                
                <?php if(isset($_SESSION["Matriculas"]) and $Matriculas["FECHACOMIENZO"]==$fila["FECHACOMIENZO"]){ ?>
                    <td class='NOMBREALUMNO'><?php echo $fila2["NOMBRE"];?></td>  
                    <td class='APELLIDOALUMNO'><?php echo $fila2["APELLIDOS"];?></td>
                    <td class='ASIGNATURA'><?php echo $fila["NOMBREASIG"];?></td>
                    <td class='NOMBREPROFESOR'><?php echo $fila4["NOMBRE"];?></td>  
                    <td class='APELLIDOSPROFESOR'><?php echo $fila4["APELLIDOS"];?></td>
                    <td class='FECHACOMIENZO'><?php echo $fila["FECHACOMIENZO"];?></td>        
                    <td class='FECHAFINAL'><?php echo $fila["FECHAFIN"];?></td>
                    <td class='EVALUACION'><input id="EVALUACION" name="EVALUACION" type="text" value="<?php echo $fila["EVALUACION"];?>" /></td>  
                    <td class='FECHAPAGO'><?php echo $fila["FECHADEPAGO"];?></td> 
                    <td class='IMPORTE'><?php echo $fila["IMPORTE"];?></td> 
                    <td class='METODOPAGO'><?php echo $fila["METODODEPAGO"];?></td> 
                    <td class='PAGADO'><input id="PAGADO" name="PAGADO" type="text" value="<?php echo $fila["PAGADO"];?>" /></td> 
                    <td id="botones_fila"> 
                    <button id="grabar" name="grabar"type="submit" class="editar_fila"><img src="disquete--guardar-simbolo-interfaz_318-31858.jpg" height="42" width="42" class="editar_fila"></button></td>
                <?php } else{ ?>
                <input id="PAGADO" name="PAGADO" type="hidden" value="<?php echo $fila["PAGADO"]?>"/>
                <input id="EVALUACION" name="EVALUACION" type="hidden" value="<?php echo $fila["EVALUACION"]?>"/>
                <td class='NOMBREALUMNO'><?php echo $fila2["NOMBRE"];?></td>  
                <td class='APELLIDOALUMNO'><?php echo $fila2["APELLIDOS"];?></td>
                <td class='ASIGNATURA'><?php echo $fila["NOMBREASIG"];?></td>
                <td class='NOMBREPROFESOR'><?php echo $fila4["NOMBRE"];?></td>  
                <td class='APELLIDOSPROFESOR'><?php echo $fila4["APELLIDOS"];?></td>
                <td class='FECHACOMIENZO'><?php echo $fila["FECHACOMIENZO"];?></td>        
                <td class='FECHAFINAL'><?php echo $fila["FECHAFIN"];?></td>  
                <td class='EVALUACION'><?php echo $fila["EVALUACION"];?></td>
                <td class='FECHAPAGO'><?php echo $fila["FECHADEPAGO"];?></td>        
                <td class='IMPORTE'><?php echo $fila["IMPORTE"];?></td>  
                <td class='METODOPAGO'><?php echo $fila["METODODEPAGO"];?></td>
                <td class='PAGADO'><?php echo $fila["PAGADO"];?></td>                
                <div id="botones_fila">                     
                <td><button id="editar" name="editar" type="submit" class="editar_fila"><img src="edit_128.png" height="42" width="42" class="editar_fila"></button></td>
                <?php } ?>
                <td><button id="quitar" name="quitar" type="submit" class="editar_fila"><img src="remove-32640.jpg" height="42" width="42" class="editar_fila"></button></td>
                </div>
            </form>
        </div>
        
        <?php }}} ?>
    </div>  
</div>

<?php   
    desconectarBD($conexion);
?>      
</body>
</html>