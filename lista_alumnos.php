<?php
	include("pdf.php");
	
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
	
	// c-2 Dibujando el cuerpo de la pagina
	$lnVeces  = 0;
	$lnNewPag = 45;

	
	if(!mysqli_connect_errno($oConn)){
		mysqli_set_charset($oConn,"utf8");
	}else{
		echo "Coneccion NO Establecida.";
	}
	
	$lcsqlcmd = "select * from matricula order by cedula ";
	$ofpdf = new PDF();
	cabeza($ofpdf);
// listado de alumnos
	$lcresult = mysqli_query($oConn,$lcsqlcmd);
	// configurando datos.
	while($row = mysqli_fetch_assoc($lcresult)){
			$lnVeces ++;
			if ($lnVeces == $lnNewPag){ 
					$lnVeces = 1;
				cabeza($ofpdf);
			}			
			$ofpdf->SetFont('Arial','B',11);
			$ofpdf->Cell(35,5, $row["cedula"],0,0,"");   	
			$ofpdf->cell(70,5, $row["nombre"],0,0,"");   	
			$ofpdf->cell(15,5, $row["grado"],0,0,"C");   	
			$ofpdf->cell(70,5, $row["nombre_padre"],0,0,"");   	
			$ofpdf->cell(20,5, $row["telefono"],0,1,"");   	
	}
	
	$ofpdf->output();	

function cabeza(&$orpt){
	$orpt->AddPage("l");
	$orpt->SetFont('Arial','B',15);
		// Movernos a la derecha
	$orpt->cell(175,5,"Escuela Republica de Honduras (Salamá, Olancho)",0,1,"C");   
	$orpt->SetFont('Arial','B',10);
	$orpt->cell(175,5,"Listado de Estudiantes",0,1,"C");   
		 // Salto de línea 25
	$orpt->Ln(12);
	$orpt->setfont("arial","B",10);
	$orpt->cell(35,5,"Cedula Alumno",1,0,"");
	$orpt->cell(70,5,"Nombre del Alumno",1,0,"");
	$orpt->cell(15,5,"Grado",1,0,"");
	$orpt->cell(70,5,"Nombre del padre / tutor",1,0,""); 
	$orpt->cell(20,5,"Telefono",1,1,"");   					
	//$ofpdf->setfont("arial","",10);
}
?>