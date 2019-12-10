<html>
	<head>
		<title>Atividade 1 de Web 2</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		
		<script type="text/javascript" language="javascript">
			$(document).ready(function() {
				$('#salvarcomajax').click(function() {
					var dados = $('#formcadastrocurso').serialize();
					$.ajax({
						type: 'POST',
						dataType: 'json',
						url: '../repositorio/SalvarCursoComAjax.php',
						async: true,
						data: dados,
						success: function(response) {
							alert("Salvo com Sucesso !");
						}, error: function (erro) {
							alert("Erro ao salvar: " + erro);
						}
					});
				});
			});
		</script>
	</head>
	<body>
		<div class="container">
			<?php include("../layout/menu.html") ?>
			<?php
				session_start();

				if(isset($_SESSION['usuarioNome'])){
                    include("../layout/usuarioLogado.php");
                }else{
                    header('Location: ../visao/Login.php');
				}
				
				if(isset($_COOKIE["msg"])){
					echo $_COOKIE["msg"];
				}
				
			?>
			<div class="row" style="margin-top: 2%;">
				<h4>
                  Cadastre um curso no sistema
                </h4>
				<div class="col-md-12">
					<form id="formcadastrocurso" action="../repositorio/SalvarCurso.php" method="POST">
						<div class="form-row">
    						<div class="form-group col-md-9">
								<label for="tituloID">Titulo</label>
								<input id="tituloID" class="form-control" type="text" name="titulo" required/>
							</div>
							<div class="form-group col-md-3">
								<label for="descricaoID">Descrição</label>
								<input id="descricaoID" class="form-control" type="text" name="descricao" required/>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="localID">Local</label>
								<input id="localID" class="form-control" type="text" name="local" required/>
							</div>
    						<div class="form-group col-md-4">
								<label for="quantidadeVagasID">Quantidade de vagas</label>
								<input id="quantidadeVagasID" class="form-control" type="text" name="quantidadeVagas" required/>
							</div>
							<div class="form-group col-md-4">
								<label for="professorID">Professor</label>
								<input id="professorID" class="form-control" type="text" name="professor" required/>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="areaID">Area</label>
								<input id="areaID" class="form-control" type="text" name="area" required/>
							</div>
						</div>
						<input class="btn btn-primary" type="submit" value="Salvar" />
						<input class="btn btn-primary" type="button" id="salvarcomajax" value="Salvar Com Ajax" />
					</form>
				</div>
			</div>
			<?php include("../layout/rodape.html"); ?>
		</div>	
	</body>
</html>