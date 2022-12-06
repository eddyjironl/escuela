<?php
	$accion = isset($_POST["accion"])? $_POST["accion"]:"";
	
	$gUserId  ="root";
	$gPasWord ="";
	$gHostId  ="localhost";
	$lcDbb    ="test";
	
	/*
	$gUserId  ="epiz_27719574";
	$gPasWord ="WUoVFfXMl9yBq";
	$gHostId  ="sql313.epizy.com";
	$lcDbb    ="epiz_27719574_matricula";	
	*/
	
	$oConn = mysqli_connect($gHostId,$gUserId,$gPasWord,$lcDbb);

	//if($this->oConn->errno){
	if(!mysqli_connect_errno($oConn)){
		mysqli_set_charset($oConn,"utf8");
	}else{
		echo "Coneccion NO Establecida.";
	}

	if ($accion == ""){
		$cedula = $_POST["cedula"];
		$nombre = $_POST["nombre"];
		$grado  = $_POST["grado"];
		$nombre2  = $_POST["nombre2"];
		$telefono  = $_POST["telefono"];

		$lcsqlcmd = " insert into matricula (cedula,nombre,grado,nombre_padre,telefono) values('". $cedula ."','". $nombre ."','". $grado ."','". $nombre2 ."','". $telefono ."')";
		mysqli_query($oConn,$lcsqlcmd);
		$lnrowcont = mysqli_affected_rows($oConn);
		if ($lnrowcont == 0){
			echo "No se ha podido Actualizar la Matricula";
		}else{
			echo "<h2>Alumno Matriculado Exitosamente.!! </h2>";
		}
	}	// if ($accion == "crear"){

	if ($accion == "validar"){
		$cedula = $_POST["cedula"];
		$lcsqlcmd = " select * from matricula where cedula = '". $cedula ."'";
		mysqli_query($oConn,$lcsqlcmd);
		$lnrowcont = mysqli_affected_rows($oConn);
		if ($lnrowcont > 0){
			echo "La Cedula $cedula ya esta registrada.";
		}
		
	}	// if ($accion == "validar"){
		
		
?>