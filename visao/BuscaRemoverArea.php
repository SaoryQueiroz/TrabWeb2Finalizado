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
                    header('Location: ../visao/index.php');
                }

                if(isset($_COOKIE["msg"])){
					echo $_COOKIE["msg"];
				}
            ?>
			<div class="row" style="margin-top: 2%;">				
                <?php
                    try {
                        $pdo = new PDO("mysql:host=localhost;dbname=web2", "root", "");
                        $sql = "SELECT * FROM curso";
                        $resultado = $pdo->query($sql);
                        if($resultado->rowCount() > 0) {
                            echo "<table class='table'>";
                            echo "<tr>";
                            echo "<th> ID </th>";
                            echo "<th> Titulo </th>";
                            echo "<th> Descrição </th>";
                            echo "<th> Local </th>";
                            echo "<th> Quantidade de Vagas </th>";
                            echo "<th> Professor </th>";
                            echo "<th> Area </th>";
                            echo "<th> # </th>";
                            echo "<th> # </th>";
                            echo "</tr>";
                            while($row = $resultado->fetch()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['titulo'] . "</td>";
                                echo "<td>" . $row['descricao'] . "</td>";
                                echo "<td>" . $row['local'] . "</td>";
                                echo "<td>" . $row['quantidadeVagas'] . "</td>";
                                echo "<td>" . $row['professor'] . "</td>";
                                echo "<td>" . $row['area'] . "</td>";
                                echo "<td><a class='btn btn-primary' href='EditarCurso.php?id=".$row['id']."' role='button'>Editar</a> </td>";
                                echo "<td>
                                <a class='btn btn-danger' href='../repositorio/RemoverCurso.php?id=".$row['id']."' role='button'>Remover</a>
                                </td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            // Limpar variável resultado
                            unset($resultado);
                        } else{
                            echo "Nenhum registro encontrado.";
                        }
                    } catch(PDOException $e){
                        die("Não foi possível executar o script $sql. " . $e->getMessage());
                    }
                ?>
            </div>            
			<?php include("../layout/rodape.html"); ?>
		</div>	
	</body>
</html>