<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <?php
    session_start();
    require_once("GestionBD.php");
    $conexion=conectarBD();
if (!isset($_SESSION["formularioFact"])) {
    $formularioFact["FECHADEPAGODIA"]="";
    $formularioFact["FECHADEPAGOMES"]="";
    $formularioFact["FECHADEPAGOAÑO"]="";
    $formularioFact["IMPORTE"]="";
    $formularioFact["METODODEPAGO"]="";
    $formularioFact["PAGADO"]="";
    $formularioFact["OID_MAT"]="";
    $_SESSION["formularioFact"] = $formularioFact;
}
else{$formularioFact=$_SESSION["formularioFact"];}
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
    if(isset($_SESSION["erroresFact"]))
    $erroresFact=$_SESSION["erroresFact"];
?>
<!--HECHOOOOOOOOOOOOOOOOOOOOOOO-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crear nueva factura </title>
        <link type="text/css" rel="stylesheet" href="estilo general.css">
    </head>
<body background="Blue-Widescreen-Background-1920x1200.jpg">
    <?php    
    include_once("cabecera.php"); 
    ?>
    <br/><br/><br/><br/><br/><br/><br/>
       <div style="color:red;"> 
        <?php
if (isset($erroresFact)){
print("<div class='error'>");
print("$erroresFact");
print("</div>");
unset($erroresFact);
}
?>
</div> 
    <form action="TratamientoCrearFactura.php" method="get" enctype="multipart/form-data">
        <table>
            <tr id="div_fechaPago">
            <td><label for="FECHADEPAGO" id="label_FECHADEPAGO">Fecha de Pago</label></td>
            <td><select name="FECHADEPAGODIA" value=<?php echo $formularioFact["FECHADEPAGODIA"];?> id="FECHADEPAGODIA" size="3">
        <?php 
            foreach($dias as $fila) {
        ?>
        <option><?php echo $fila?></option>
        <?php
            }
            ?>
            </select>
            <select name="FECHADEPAGOMES" value=<?php echo $formularioFact["FECHADEPAGOMES"];?> id="FECHADEPAGOMES" size="3">
        <?php 
            foreach($meses as $fila) {
        ?>
        <option><?php echo $fila?></option>
        <?php
            }
            ?>
            </select>
            <select name="FECHADEPAGOAÑO" value=<?php echo $formularioFact["FECHADEPAGOAÑO"];?> id="FECHADEPAGOAÑO" size="3">
        <?php 
            foreach($años as $fila) {
        ?>
        <option><?php echo $fila?></option>
        <?php
            }
            ?>
            </select></td></tr>
            <tr id="div_importe">
            <td><label for="importeFact" id="label_importe">Importe de la factura </label></td>
            <td><input id="IMPORTE" name="IMPORTE" type="text" value="<?php echo $formularioFact['IMPORTE']; ?>" size="10"></input></td></tr>
           
           <tr id="div_metodoDePago">
            <td><label for="metPago" id="label_metPago">Metodo de pago </label></td>
            <td><input id="METODODEPAGO" name="METODODEPAGO" type="text" value="<?php echo $formularioFact['METODODEPAGO']; ?>" size="30"></input></td></tr>
           
            <tr id="div_pagado">
            <td><label for="pagado" id="label_pagado">Factura pagada </label></td>
            <td><input id="PAGADO" name="PAGADO" type="text" value="<?php echo $formularioFact['PAGADO']; ?>" size="2"></input></td></tr>
            <tr id="div_OID_MAT">
            <td><label for="OID_MAT" id="label_OID_MAT">Identificador de la matrícula </label></td>
            <td><input id="OID_MAT" name="OID_MAT" type="text" value="<?php echo $formularioFact['OID_MAT']; ?>" size="30"></input></td></tr>
        </div>
        </table>
        <div id="div_submit">
            <input type="submit" value="Publicar"></input>
        </div>
    </form>
    <?php desconectarBD($conexion);?>
</body>
</html>