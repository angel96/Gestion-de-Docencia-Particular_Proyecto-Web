<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<?php
	session_start();
	require_once ("GestionBD.php");
	require_once ("GestionarEntradasProfesores.php");
	require_once ("GestionarEntradasAsignaturas.php");
	require_once ("GestionarEntradasAlumnos.php");

	$conexion = conectarBD();
	if (!isset($_SESSION["formularioValoraciones"])) {
		$formularioValoraciones["VALORACIONES"] = "";
		$formularioValoraciones["NOMBREPROFESOR"] = "";
		$formularioValoraciones["APELLIDOSPROFESOR"] = "";
		$formularioValoraciones["NOMBREASIG"] = "";
		$formularioValoraciones["DNI"] = "";
		$_SESSION["formularioValoraciones"] = $formularioValoraciones;
	} else {
		$formularioValoraciones = $_SESSION["formularioValoraciones"];
	}
	if (isset($_SESSION["erroresVal"])) {
		$erroresVal = $_SESSION["erroresVal"];
	}
?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Crear nueva valoracion</title>
		<link type="text/css" rel="stylesheet" href="estilo general.css">
	</head>
	<body background="Blue-Widescreen-Background-1920x1200.jpg">
	    <?php    
    include_once("cabecera.php"); 
    ?>
     <br/><br/><br/><br/><br/><br/><br/>
<div style="color:red;"> 
        <?php
if (isset($erroresVal)){
print("<div class='error'>");
print("$erroresVal");
print("</div>");
unset($erroresVal);
}
?>
</div>
		<form action="TratamientoCrearValoracion.php" method="get" enctype="multipart/form-data">
	    <table>
				<tr><td><label for="VALORACIONES" id="label_titulo">Nueva valoracion</label></td>
				<td><input id="VALORACIONES" name="VALORACIONES" type="text" value="<?php
				echo $formularioValoraciones["VALORACIONES"];
				?>" size="1">
				</input></td></tr>
				
				<tr><td><label for="PROFESOR" >Nombre del Profesor</label></td>
				<td><input type = "text" name="NOMBREPROFESOR" value="<?php 
				echo $formularioValoraciones['NOMBREPROFESOR']; ?>"  id ="Profesor1" size="20"></input>
				
				</td></tr>
				
				<tr><td><label for="PROFESOR" >Apellidos del Profesor</label></br></td>
				<td><input type = "text" name="APELLIDOSPROFESOR" value="<?php 
				echo $formularioValoraciones['APELLIDOSPROFESOR']; ?>" id ="Profesor2" size="20">
				</input></td></tr>
				
				
				<tr><td><label for="AsignaturaAValorar" >Asignatura</label></td>
				<td><select name="NOMBREASIG" value="<?php 
				echo $formularioValoraciones['NOMBREASIG']; ?>" id ="Asignatura" size="5">
				<?php
				$filas = consultarTodasLasAsignaturas($conexion);
				foreach($filas as $fila){
				?>	
					<option><?php echo $fila["NOMBREASIG"]?></option>;
				<?php
				}
				?>
				</select></td></tr>
				
				
				<tr><td><label for="DNIALUMNO" >DNI del Alumno</label></td>
				<td><input type = "text" name="DNI" value="<?php 
				echo $formularioValoraciones['DNI']; ?>" id ="Alumno" size="5">
				</input></td></tr>
				<tr><td><input type="submit" value="Publicar">
				</input></td></tr>
				</table>
		</form>
		<?php desconectarBD($conexion); ?>
	</body>
</html>