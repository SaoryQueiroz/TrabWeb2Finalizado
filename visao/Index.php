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
				<h3>Bem vindo! 
					<?php 
						session_start();
						if(isset($_SESSION['usuarioNome'])){
							echo $_SESSION['usuarioNome'];
						}
					?>
				</h3>
			</div>
			<div class="row" style="margin-top: 2%">
				<div class="card" style="width: 25rem;">
					<img class="card-img-top" src="../visao/ifms.jpg" alt="Imagem de capa do card">
					<div class="card-body">
					    <h5 class="card-title">Acessar</h5>
					    <h6 class="card-subtitle mb-2 text-muted">Entre com login e senha</h6>
					    <p class="card-text"> Informe seus dados para liberar acesso a página, clicando no link que se encaixa no seu perfil.</p>
					    <a href="../visao/indexAluno2.php" class="card-link">Acessar como Aluno</a>
					    <a href="../visao/indexProfessor.php" class="card-link">Acessar como Professor</a>
					</div>
				</div>
			</div>
			<?php include("../layout/rodape.html"); ?>
		</div>
	</body>
</html>