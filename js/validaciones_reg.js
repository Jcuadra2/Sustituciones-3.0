function validarDni(dni){
    var expresion=/^[0-9]{8}[a-zA-Z]{1}$/;
    var letras=['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    var numerosDni=formulario.dni.value.substring(0,8);
    var calcularLetra=letras[numerosDni%23];
    if(expresion.test(formulario.dni.value) && formulario.dni.value.substring(8)==calcularLetra){
        $(document).ready(function(){
          var parametros = {
            "dni" : dni.value
          };
          $.ajax({
            data:  parametros,
            url:   '../profesores/test_dni.php',
            type:  'post',
            beforeSend: function () {
                $("#mensaje").html("");
            },
            success:  function (response) {
              /*alert(response);*/
              if (response=='no'){
                $("#mensaje").html('El dni introducido ya existe.');
                /*dni.style.backgroundColor='red';*/
                dni.value="";
              }else if(response=='si'){
                $("#mensaje").html('');
                dni.style.color='green';
              }
            }
          });
        });
    }
    else {
      dni.style.color='red';
      dni.value="";
    }   
}

function validarEmail(correo){
  var exp_reg=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
  if(exp_reg.test(formulario.correo.value)){
    $(document).ready(function(){
            var parametros = {
                "correo" : correo.value
            };
            $.ajax({
                data:  parametros,
                url:   '../profesores/test_email.php',
                type:  'post',
                beforeSend: function () {
                        $("#mensaje").html("Procesando...");
                },
                success:  function (response) {
                    if (response=='no'){
                        $("#mensaje").html('El email asociado ya esta registrado');
                        correo.style.color='red';
                        correo.value="";
                    }
                    else if(response=='si') {
                        $("#mensaje").html('');
                        correo.style.color='green';
                    }
                }
            });
    });
  }
  else {
    correo.style.color='red';
    correo.value="";
  }
}