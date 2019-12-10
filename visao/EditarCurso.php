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
                  Edite os dados do curso
                </h4>
            </div>
			<?php
				try {
					$pdo = new PDO("mysql:host=localhost;dbname=web2", "root", "");
					$sql = "SELECT * FROM curso where id = " .$_GET['id']. "";
					$resultado = $pdo->query($sql);
					if($resultado->rowCount() > 0) {
						$row = $resultado->fetch();
						?>
							<div class="row" style="margin-top: 2%;">
								<div class="col-md-12">
									<form action="../repositorio/SalvarEdicaoCurso.php" method="POST">
									<input value= "<?php echo $row['id'] ?>" class="form-control" type="hidden" name="id"/>
										<div class="form-row">
											<div class="form-group col-md-9">
												<label for="tituloID">Titulo</label>
												<input value= "<?php echo $row['titulo'] ?>" id="tituloID" class="form-control" type="text" name="titulo" required/>
											</div>
											<div class="form-group col-md-3">
												<label for="descricaoID">Descrição</label>
												<input value= "<?php echo $row['descricao'] ?>" id="descricaoID" class="form-control" type="text" name="descricao" required/>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label for="localID">Local</label>
												<input value= "<?php echo $row['local'] ?>" id="localID" class="form-control" type="text" name="local" required/>
											</div>
											<div class="form-group col-md-4">
												<label for="quantidadeVagasID">Quantidade de vagas</label>
												<input value= "<?php echo $row['quantidadeVagas'] ?>" id="quantidadeVagasID" class="form-control" type="text" name="quantidadeVagas" required/>
											</div>
											<div class="form-group col-md-4">
												<label for="professorID">Professor</label>
												<input value= "<?php echo $row['professor'] ?>" id="professorID" class="form-control" type="text" name="professor" required/>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label for="areaID">Area</label>
												<input value="<?php echo $row['area'] ?>" id="areaID" class="form-control" type="text" name="area" required/>
											</div>
										</div>
										<input class="btn btn-primary" type="submit" value="Salvar Alterações" />
										<a class='btn btn-secondary' href='BuscarRemoverCurso.php' role='button'>Voltar</a>
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