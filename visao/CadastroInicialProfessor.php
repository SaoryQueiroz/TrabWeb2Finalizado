<html>
	<head>
		<title>Atividade 1 de Web 2</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<?php include("../layout/menu.html") ?>
			<div class="row" style="margin-top: 2%;">
				<h4>
                  Insira seus dados para o primeiro acesso ao sistema
                  <small class="text-muted">como um professor</small>
                </h4>
				<div class="col-md-12">
					<form id="formcadastroprof" action="../repositorio/SalvarProf.php" method="POST">
						<div class="form-row">
    						<div class="form-group col-md-9">
								<label for="nomeID">Nome</label>
								<input id="nomeID" class="form-control" type="text" name="nome" required/>
							</div>
							<div class="form-group col-md-3">
								<label for="idadeID">Idade</label>
								<input id="idadeID" class="form-control" type="text" name="idade" required/>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="sexofID">Sexo</label>
								<input id="sexoID" class="form-control" type="text" name="sexo" required/>
							</div>
    						<div class="form-group col-md-4">
								<label for="cpfID">CPF</label>
								<input id="cpfID" class="form-control" type="text" name="cpf" required/>
							</div>
							<div class="form-group col-md-4">
								<label for="siapeID">SIAPE</label>
								<input id="siapeID" class="form-control" type="text" name="siape" required/>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
                                <label for="areaID"> Area </label>
                                <input id="areaID" class="form-control" type="text" name="area" required/>
                            </div>
							<div class="form-group col-md-4">
								<label for="loginID">Login</label>
								<input id="loginID" class="form-control" type="text" name="login" required/>
							</div>
    						<div class="form-group col-md-4">
								<label for="senhaID">Senha</label>
								<input id="senhaID" class="form-control" type="password" onkeyup="validarSenhaForca()" name="senha" required/>
								<small id="emailHelp" class="form-text text-muted">Para aumentar a força da senha, coloque letras maiúsculas e caracteres especiais</small>
								<div id="erroSenhaForca"></div>
                            </div>
							<div class="form-group col-md-4">
								<label for="verificaSenhaID">Repita a Senha</label>
								<input id="verificaSenhaID" class="form-control" type="password" onblur="validaSenha()" name="verificaSenha" required/>
						        <div id="mensagem"></div>
							</div>
						</div>
						<input class="btn btn-primary" type="submit" value="Salvar" />
					</form>
				</div>
			</div>
			<?php include("../layout/rodape.html"); ?>
		</div>	
	</body>
</html>
<script type="text/javascript">
	function validarSenhaForca(){
		var senha = document.getElementById('senhaID').value;
		var forca = 0;
		//document.getElementById("impSenha").innerHTML = "Senha " + senha;

		if((senha.length >= 4) && (senha.length <= 7)){
			forca += 10;
		}else if(senha.length > 7){
			forca += 25;
		}

		if((senha.length >= 5) && (senha.match(/[a-z]+/))){
			forca += 10;
		}

		if((senha.length >= 6) && (senha.match(/[A-Z]+/))){
			forca += 20;
		}

		if((senha.length >= 7) && (senha.match(/[@#$%&;*]/))){
			forca += 25;
		}

		if(senha.match(/([1-9]+)\1{1,}/)){
			forca += -25;
		}

		mostrarForca(forca);
	}

	function mostrarForca(forca){
		//document.getElementById("impForcaSenha").innerHTML = "Força da senha: " + forca;

		if(forca < 30 ){
			document.getElementById("erroSenhaForca").innerHTML = "<span style='color: #ff0000'>Fraca</span>";
		}else if((forca >= 30) && (forca < 50)){
			document.getElementById("erroSenhaForca").innerHTML = "<span style='color: #FFD700'>Média</span>";
		}else if((forca >= 50) && (forca < 70)){
			document.getElementById("erroSenhaForca").innerHTML = "<span style='color: #7FFF00'>Forte</span>";
		}else if((forca >= 70) && (forca < 100)){
			document.getElementById("erroSenhaForca").innerHTML = "<span style='color: #008000'>Excelente</span>";
		}
	}

</script>

<script type="text/javascript">
	function validaSenha(){
		var senha1 = document.getElementById('senhaID').value;
		var senha2 = document.getElementById('verificaSenhaID').value;

		if (senha1 != "" && senha2 != "" && senha1 == senha2)
		{
			document.getElementById("mensagem").innerHTML = "<span style='color: #008000'> Senhas iguais </span>";
		}else{
			//verificaSenhaID.setCustomValidity('');
			document.getElementById("mensagem").innerHTML ="<span style = 'color: #FF0000'> Senhas diferentes </span>";
		}
	}
</script>