<html>
	<head>
		<title>Atividade 1 de Web 2</title>
		<meta charset="UTF-8"/>
		<script src="../bootstrap4/js/jquery-3.3.1.min.js"></script>
		
		<script type="text/javascript" language="javascript">
			$(document).ready(function() {
				$('#deslogar').click(function() {
					$.ajax({
						type: 'POST',
						dataType: 'json',
						url: '../repositorio/Deslogar.php',
						async: true,
						success: function(response) {
							alert("Deslogado com Sucesso !");
							$(location).attr('href', '../visao/Index.php');
						}, error: function (erro) {
							alert("Problema ocorrido: " + erro);
						}
					});
				});
			});
		</script>
	</head>	
	<body>
		<div class="row">
			<div class="col-md-12">
				<?php
					if(isset($_SESSION['usuarioNome'])){
						echo '<p>Usuário: <b>'. $_SESSION['usuarioNome'] .'</b>';
						echo '<button id="deslogar" type="button" class="btn btn-link">Deslogar</button></p>';
					}
				?>
			</div>
		</div>
	</body>
</html>

