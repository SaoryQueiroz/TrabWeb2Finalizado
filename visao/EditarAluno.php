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
                  Edite os dados do usuário
                </h4>
            </div>
			<?php
				try {
					$pdo = new PDO("mysql:host=localhost;dbname=web2", "root", "");
					$sql = "SELECT * FROM aluno where id = " .$_GET['id']. "";
					$resultado = $pdo->query($sql);
					if($resultado->rowCount() > 0) {
						$row = $resultado->fetch();
						?>
							<div class="row" style="margin-top: 2%;">
								<div class="col-md-12">
									<form action="../repositorio/SalvarEdicaoAluno.php" method="POST">
									<input value= "<?php echo $row['id'] ?>" class="form-control" type="hidden" name="id"/>
										<div class="form-row">
											<div class="form-group col-md-9">
												<label for="nomeID">Nome</label>
												<input value= "<?php echo $row['nome'] ?>" id="nomeID" class="form-control" type="text" name="nome" required/>
											</div>
											<div class="form-group col-md-3">
												<label for="idadeID">Idade</label>
												<input value= "<?php echo $row['idade'] ?>" id="idadeID" class="form-control" type="text" name="idade" required/>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label for="cpfID">CPF</label>
												<input value= "<?php echo $row['cpf'] ?>" id="cpfID" class="form-control" type="text" name="cpf" required/>
											</div>
											<div class="form-group col-md-4">
												<label for="sexoID">Sexo</label>
												<input value= "<?php echo $row['sexo'] ?>" id="sexoID" class="form-control" type="text" name="sexo" required/>
											</div>
											<div class="form-group col-md-4">
												<label for="raID">RA</label>
												<input value= "<?php echo $row['ra'] ?>" id="raID" class="form-control" type="text" name="ra" required/>
											</div>
										</div>
										<input class="btn btn-primary" type="submit" value="Salvar Alterações" />
										<a class='btn btn-secondary' href='BuscarRemoverAluno.php' role='button'>Voltar</a>
									</form>
								</div>
							</div>
						<?php
						unset($resultado);
					} else{
						echo "Nenhum registro encontrado.";
					}
				} catch(PDOException $e){
					die("Não foi possível executar o script $sql. " . $e->getMessage());
				}
			?>

			
			<?php include("../layout/rodape.html"); ?>
		</div>	
	</body>
</html>