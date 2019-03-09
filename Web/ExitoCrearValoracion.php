<?php
session_start();
require_once ("GestionEntradasValoracion.php");
require_once ("GestionBD.php");
if (isset($_SESSION["formularioValoraciones"])) {
	$formularioValoraciones = $_SESSION["formularioValoraciones"];
	unset($_SESSION["formularioValoraciones"]);
	unset($_SESSION["errores"]);
} else
	Header("Location: Formulario_CrearValoracion.php");
$conexion = conectarBD();
?>
<html>
	<head>
		<title>Resultado del Registro</title>
	</head>
	<body>
		<?php if (insertarValoracion($formularioValoraciones["NOMBREASIG"], $formularioValoraciones["DNI"], $formularioValoraciones["NOMBREPROFESOR"] , $formularioValoraciones["APELLIDOSPROFESOR"],
		$formularioValoraciones["VALORACIONES"], $conexion) == "")
{
		?>
		<div id="div_exito">
			<h1>Tu entrada para <?php echo $formularioValoraciones["VALORACIONES"]; ?>,
			ha sido creada</h1>
		</div>
		<?php }
			else{
		?>
		<div id="div_error_registro">
			Ha ocurrido un errror de procesamiento de los datos, por favor inténtelo con otros valores.
		</div>
		<?php } ?>
		<div id="div_volver">
			Pulsa <a href="Formulario_CrearValoracion.php">aquí</a>
			para crear otra valoracion.
		</div>
	</body>
</html>
<?php desconectarBD($conexion); ?>