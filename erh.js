function init(){
	document.getElementById("cedula").addEventListener("change",valid_cedula,false);
	document.getElementById("enviar").addEventListener("click",submit_form,false);
	document.getElementById("reporte").addEventListener("click",print_report,false);
	document.getElementById("orpt").style.display = "none";
	document.getElementById("oInfo").style.display = "none";
	
	document.getElementById("acerca").addEventListener("click",show_info,false);
	document.getElementById("quit").addEventListener("click",close_window,false);

}

function close_window(){
		document.getElementById("oInfo").style.display = "none";

}

function valid_cedula(){
	var lcCedula = cedula.value;
	var http   = new XMLHttpRequest();
	var oDatos = new FormData();
	oDatos.append("accion","validar");
	oDatos.append("cedula",cedula.value);
	
	http.open("POST","matricular.php",false);
	http.send(oDatos);
	// verificando si existe el numero de cedula
	if (http.response != ""){
	   alert(http.response);	
	   cedula.value = "";
	}
}

function show_info(){
	document.getElementById("oInfo").style.display="inline-block";
}


function print_report(){
	var valor  = prompt("Digite la contraseña", "");
	var llcont = false;
	
	if( valor == "12345" )
	{
		//alert("La contraseña es correcta");
		llcont = true;
	}
	else
	{
		alert("Contraseña no válida: [" + valor + "]");
	}
	
	if (llcont == true){
		/*
		var http = new XMLHttpRequest();
		http.open("POST","lista_alumnos.php",false);
		http.send();
		*/
		orpt.click();
		
	}
}

function submit_form(){
	if (cedula.value == "" ){
		window.alert("Numero de cedula esta en blanco");
		cedula.focus();
		return ;
	}	
	if (nombre.value == ""){
		alert("Nombre en Blanco debe Indicarlo")
		nombre.focus();
		return ;
	}
	
	if(grado.value == ""){
		alert("Indique el Grado de Matricula");
		grado.focus();
		return;
	}
	if(nombre2.value == ""){
		alert("Indique alguno de estas opciones Nombre del Padre o Madre o Tutor Legal");
		nombre2.focus();
		return;
	}
	// enviando el formulario.
	matricula.submit();
}

window.onload=init;