function validarNombre (nombre){
	var exp_reg=/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/
	if(exp_reg.test(usuario.value)){
		usuario.style.color='green';
	}
	else {
		usuario.style.Color='red';
		usuario.value="";
	}
		
}

function validarDni (dni){
		var exp_reg=/^\d{8}[a-zA-Z]$/
		if (exp_reg.test(pass.value)){
            pass.style.color='green';
		}
		else {
			pass.style.color='red';
			pass.value="Formato Incorrecto";
		}   
}