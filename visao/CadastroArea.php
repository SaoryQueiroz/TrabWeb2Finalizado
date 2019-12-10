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
				<div class="col-md-12">
					<form action="../repositorio/SalvarArea.php" method="POST">
						<div class="form-row">
    						<div class="form-group col-md-12">
								<label for="descricaoID">Descrição</label>
								<input id="descricaoID" class="form-control" type="text" name="descricao" required/>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<input class="btn btn-primary" type="submit" value="Salvar" />
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php include("../layout/rodape.html"); ?>
		</div>	
	</body>
</html>