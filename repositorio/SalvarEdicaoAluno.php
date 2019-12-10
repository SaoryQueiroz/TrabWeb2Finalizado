<?php
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=web2", "root", "");
	} catch (PDOException $erro) {
		echo $erro->getMessage();
	}

	require_once '../modelo/Aluno.php';
	$aluno = new Aluno();
	$aluno->setNome($_POST['nome']);
	$aluno->setIdade($_POST['idade']);
	$aluno->setCPF($_POST['cpf']);
	$aluno->setSexo($_POST['sexo']);
	$aluno->setRA($_POST['ra']);
	try {
		$sql = "update aluno set nome = '" . $aluno->getNome() . "', 
		idade = '" . $aluno->getIdade() . "', sexo = '" . $aluno->getSexo() . "',
		 cpf = '" . $aluno->getCPF() . "', ra = '" . $aluno->getRA() . "' where id = 
		 '" . $_POST['id'] . "'";

		$pdo->exec($sql);
		echo "<p>Alterado com sucesso.</p>";
	} catch(PDOException $e) {
		die("Não foi possível executar o script: $sql. " . $e->getMessage());
	}

	//var_dump($aluno);

	header('Location: ../visao/BuscarRemoverAluno.php');
?>