<?php
/*
 * #===========================================================#
 * #	Este fichero contiene las funciones de gestión
 * #	de entradas de la capa de acceso a datos de
 * #       nuestro blog.
 * #==========================================================#
 */
require_once ("GestionarEntradasMatricula.php");
function insertarValoracion($asignatura, $alumno, $nombreProf,$apellidosProf, $valoracion, $conexion) {
	try {
		$res = "";
		$OID_P1 = consultarIdentificadorDeProfesor($conexion, $nombreProf, $apellidosProf);
		foreach ($OID_P1 as $fila) {
			$OID_P=$fila['OID_U'];
		}
		$OID_A1 = consultarIdentificadorDeAlumno($conexion, $alumno);
		foreach ($OID_A1 as $fila) {
			$OID_A = $fila['OID_A'];
		}
		$OID_ASIG1 = consultarIdentificadorDeAsignatura($conexion, $asignatura);
		foreach ($OID_ASIG1 as $fila) {
			$OID_ASIG = $fila['OID_ASIG'];
		}
		$stmt = $conexion -> prepare('CALL AÑADIR_VALORACION(:OID_ASIG,:OID_A, :OID_P,:VALORACION)');
		$stmt -> bindParam(':OID_ASIG', $OID_ASIG);
		$stmt -> bindParam(':OID_A', $OID_A);
		$stmt -> bindParam(':OID_P', $OID_P);
		$stmt -> bindParam(':VALORACION', $valoracion);
		$stmt -> execute();

	} catch(PDOException $e) {
		echo $e -> getMessage();
		$res = $e;
	}
	return $res;

}

function quitar_Valoracion($conexion, $OID_V) {
	try {
		$stmt = $conexion -> prepare('DELETE FROM VALORACIONES WHERE OID_V=:OID_V');
		$stmt -> bindParam(':OID_V', $OID_V);
		$stmt -> execute();
		return "";
	} catch(PDOException $e) {
		return $e -> getMessage();
	}
}
?>