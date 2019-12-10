<?php
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=web2", "root", "");
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$sql = "SELECT * FROM professor where login = '".$login."'";
		$resultado = $pdo->query($sql);
		if($resultado->rowCount() > 0) {
			$row = $resultado->fetch();
			if ($row['senha'] == $senha){
				setcookie("msg", "Logado com sucesso !", time() + 1,"/web_banco/visao");
				session_start();
				$_SESSION['usuarioNome'] = $row['nome'];
				header('Location: ../visao/indexProfessor2.php');
			}else{
				setcookie("msg", "Senha incorreta", time() + 1,"/web_banco/visao");
				header('Location: ../visao/index.php');
			}
			unset($resultado);// Limpar variável resultado
		} else{
			setcookie("msg", "O usuário ".$login." não foi encontrado", time() + 1,"/alunoProfessor/visao");
			header('Location: ../visao/index.php');
		}
	} catch(PDOException $e){
		setcookie("msg", "Erro: ". $e->getMessage(), time() + 1,"/web_banco/visao");
		header('Location: ../visao/index.php');
	}
?>