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
	$curso = $_POST['curso'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	try {
		$sql = "INSERT INTO aluno (nome, idade, sexo, cpf, ra, curso, login, senha) VALUES 
			('" . $aluno->getNome() . "', '" . $aluno->getIdade() . "'
			, '" . $aluno->getSexo() . "', '" . $aluno->getCPF() . "'
			, '" . $aluno->getRA() . "', '" . $curso . "', '" . $login . "', '" . $senha . "')";

		$pdo->exec($sql);
		setcookie("msg", "Inserido com sucesso", time() + 1,"/web_banco/visao");
		$response = array("success" => true);
	} catch(PDOException $e) {
		die("Não foi possível executar o script: $sql. " . $e->getMessage());
		$response = array("success" => false);
	}

	echo json_encode($response);
?>