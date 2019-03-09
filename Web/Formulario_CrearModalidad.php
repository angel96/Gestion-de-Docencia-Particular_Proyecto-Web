<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<?php
	session_start();
	if (!isset($_SESSION["formularioMod"])) {
		unset($erroresMod);
		$formularioMod["NOMBREMOD"] = "";
		$_SESSION["formularioMod"] = $formularioMod;
	} else {$formularioMod = $_SESSION["formularioMod"];
	
	if (isset($_SESSION["erroresMod"]))
		$erroresMod = $_SESSION["erroresMod"];
	}
?>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Crear nueva modalidad</title>
		<link type="text/css" rel="stylesheet" href="estilo general.css">
	</head>
	<body background="Blue-Widescreen-Background-1920x1200.jpg">
		<?php
		include_once ("cabecera.php");
		?>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<div style="color:red;">
			<?php
			if (isset($erroresMod)) {
				echo $erroresMod;
			}
		?>
		</div>
		<form action="TratamientoCrearModalidad.php" method="get" enctype="multipart/form-data">
			<table>
				<div id="div_nombre">
					<tr>
						<td><label for="nombreMod" id="label_titulo">Nombre de la nueva modalidad</label></td>
						<td>
						<input id="NOMBREMOD" name="NOMBREMOD" type="text" value="<?php echo $formularioMod['NOMBREMOD']; ?>" size="50">
						</input></td>
					</tr>
				</div>
				<div id="div_submit">
					<tr>
						<td>
						<input type="submit" value="Publicar">
						</input></td>
					</tr>
				</div>
			</table>
		</form>

		
	</body>
</html>