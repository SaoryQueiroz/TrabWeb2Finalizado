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
	$professor->setCPF($_POST['cpf']);
	$professor->setSexo($_POST['sexo']);
	$professor->setSIAPE($_POST['siape']);
	$area = $_POST['area'];
	try {
		$sql = "update professor set nome = '" . $professor->getNome() . "', 
		idade = '" . $professor->getIdade() . "', sexo = '" . $professor->getSexo() . "',
		 cpf = '" . $professor->getCPF() . "', siape = '" . $professor->getSiape() . "', area = '" . $area . "' where id = 
		 '" . $_POST['id'] . "'";

		$pdo->exec($sql);
		echo "<p>Alterado com sucesso.</p>";
	} catch(PDOException $e) {
		die("Não foi possível executar o script: $sql. " . $e->getMessage());
	}

	//var_dump($aluno);

	header('Location: ../visao/BuscarRemoverProf.php');
?>