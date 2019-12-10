<?php
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=web2", "root", "");
	} catch (PDOException $erro) {
		echo $erro->getMessage();
	}

	require_once '../modelo/Professor.php';
	$professor = new Professor();
	$professor->setNome($_POST['nome']);
	$professor->setIdade($_POST['idade']);
	$professor->setSexo($_POST['sexo']);
	$professor->setCPF($_POST['cpf']);
    $professor->setSIAPE($_POST['siape']);
    $area = $_POST['area'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	try {
		$sql = "INSERT INTO professor (nome, idade, sexo, cpf, siape, area, login, senha) VALUES 
			('" . $professor->getNome() . "', '" . $professor->getIdade() . "'
			, '" . $professor->getSexo() . "', '" . $professor->getCPF() . "'
			, '" . $professor->getSIAPE() . "', '" . $area . "', '" . $login . "', '" . $senha . "')";

		$pdo->exec($sql);
		setcookie("msg", "Inserido com sucesso", time() + 1,"/web_banco/visao");
	} catch(PDOException $e) {
		die("Não foi possível executar o script: $sql. " . $e->getMessage());
	}

	//var_dump($aluno);
	header('Location: ../visao/CadastroProf.php');
?>