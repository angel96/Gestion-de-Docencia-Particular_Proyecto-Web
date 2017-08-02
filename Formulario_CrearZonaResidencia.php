<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <?php
    session_start();
if (!isset($_SESSION["formularioZR"])) {
	unset($erroresZR);
    $formularioZR["nombreZona"]="";
    $formularioZR["provincia"]="";
    $_SESSION["formularioZR"] = $formularioZR;
}
else{$formularioZR=$_SESSION["formularioZR"];
    if(isset($_SESSION["erroresZR"]))
    $erroresZR=$_SESSION["erroresZR"];
}
?>


    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crear nueva zona de residencia</title>
        <link type="text/css" rel="stylesheet" href="estilo general.css"> 
    </head>
<body background="Blue-Widescreen-Background-1920x1200.jpg">
    <?php    
    include_once("cabecera.php"); 
    ?>
     <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>    
       <div style="color:red;"> 
        <?php
if (isset($erroresZR)){
print("<div class='error'>");
print("$erroresZR");
print("</div>");

}
?>
</div> 
    <form action="TratamientoCrearZonaResidencia.php" method="get" enctype="multipart/form-data">
    	<table>
    		<div id="div_nZ">
            <tr><td><label for="nombreZona" id="label_titulo">Nombre de la Zona</label></td>
            <td><input id="nombreZona" name="nombreZona" type="text" value="<?php echo $formularioZR['nombreZona']; ?>" size="50"></input></td></tr>

        </div>
        </br></br>
        <div id="div_provincia">
            <tr><td><label for="provincia" id="label_provincia">Provincia:</label></td>
            <td><select name="provincia" value=<?php echo $formularioZR['provincia'];?> id="provincia" size="8" title"Sevilla">
                <Optgroup label="Andalucía">
                    <option>Huelva</option>
                    <option>Sevilla</option>
                    <option>Córdoba</option>
                    <option>Jaén</option>
                    <option>Cádiz</option>
                    <option>Málaga</option>
                    <option>Granada</option>
                    <option>Almería</option>
                </Optgroup>
                <Optgroup label="Galicia">
                    <option>La Coruña</option>
                    <option>Lugo</option>
                    <option>Pontevedra</option>
                    <option>Ourense</option>
                </optgroup>
                <Optgroup label="Principado de Asturias">
                     <option>Asturias</option>
                </Optgroup>
                <Optgroup label="Cantabria">
                     <option>Cantabria</option>
                </Optgroup>
                <Optgroup label="País Vasco">
                    <option>Vizcaya</option>
                    <option>Guipúzcoa</option>
                    <option>Álava</option>
                </optgroup>
                <Optgroup label="Navarra">
                     <option>Navarra</option>
                </Optgroup>
                <Optgroup label="Aragón">
                    <option>Huesca</option>
                    <option>Zaragoza</option>
                    <option>Teruel</option>
                </optgroup>
                <Optgroup label="Cataluña">
                    <option>Lérida</option>
                    <option>Gerona</option>
                    <option>Barcelona</option>
                    <option>Tarragona</option>
                </optgroup>
                <Optgroup label="Castilla y León">
                    <option>León</option>
                    <option>Palencia</option>
                    <option>Burgos</option>
                    <option>Zamora</option>
                    <option>Valladolid</option>
                    <option>Soria</option>
                    <option>Segovia</option>
                    <option>Salamanca</option>
                    <option>Ávila</option>
                </Optgroup>
                <Optgroup label="La Rioja">
                     <option>La Rioja</option>
                </Optgroup>
                <Optgroup label="Comunidad de Madrid">
                     <option>Madrid</option>
                </Optgroup>
                <Optgroup label="Extremadura">
                     <option>Cáceres</option>
                     <option>Badajoz</option>
                </Optgroup>
                <Optgroup label="Castilla-La Mancha">
                    <option>Guadalajara</option>
                    <option>Toledo</option>
                    <option>Cuenca</option>
                    <option>Ciudad Real</option>
                    <option>Albacete</option>
                </Optgroup>
                <Optgroup label="Comunidad Valenciana">
                     <option>Castellón</option>
                     <option>Valencia</option>
                     <option>Alicante</option>
                </Optgroup>
                <Optgroup label="Islas Baleares">
                     <option>Islas Baleares</option>
                </Optgroup>
                <Optgroup label="Región de Murcia">
                     <option>Murcia</option>
                </Optgroup>
                <Optgroup label="Canarias">
                     <option>Santa Cruz de Tenerife</option>
                     <option>Las Palmas</option>
                </Optgroup>
            </select></td></tr>
        </div>
        <div id="div_submit">
            <tr><td><input type="submit" value="Publicar"></input></td></tr>
        </div>
    </form>
    
</body>
</html>