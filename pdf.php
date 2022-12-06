<?php
include("fpdf/fpdf.php");
class PDF extends FPDF{
	
	// estas son las funciones actuales.
	function RPTheader(){
		// Logo
		//$this->Image('LOGITO1.jpg',10,8,20);
		// Arial bold 15
		$this->SetFont('Arial','B',11);
		// Movernos a la derecha
		$this->cell(175,1,"Escuela Republica de Honduras (Salama, Olancho)",0,1,"C");   
		 // Salto de línea 25
		$this->Ln(12);
	}
}
?>