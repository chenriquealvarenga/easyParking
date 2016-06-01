
function onchangeUserType(){
	var v_select = $("[name='tipo_usuario']")[0];

	switch(v_select.value){
		case "aluno":
			$("#matricula").show();
			$("#placa_veiculo").show();
			$("#cnh").show();
			$("#cargo").hide();
			break;
		case "funcionario":
			$("#matricula").hide();
			$("#placa_veiculo").show();
			$("#cnh").show();
			$("#cargo").show();
			break;
		case "vigia":
			$("#matricula").hide();
			$("#placa_veiculo").hide();
			$("#cnh").hide();
			$("#cargo").hide();
			break;
		case "gerente":
			$("#matricula").hide();
			$("#placa_veiculo").hide();
			$("#cnh").hide();
			$("#cargo").hide();
			break;
		default:
			$("#matricula").hide();
			$("#placa_veiculo").hide();
			$("#cnh").hide();
			$("#cargo").hide();
			break;

	}
}


