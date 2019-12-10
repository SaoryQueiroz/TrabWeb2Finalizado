<?php
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=web2", "root", "");
	} catch (PDOException $erro) {
		echo $erro->getMessage();
	}

	require_once '../modelo/Area.php';
	$area = new Area();
	$area->setDescricao($_POST['descricao']);

	try {
		$sql = "INSERT INTO area (descricao) VALUES ('" . $area->getDescricao() . "')";

		$pdo->exec($sql);
		setcookie("msg", "Inserido com sucesso", time() + 1,"/web_banco/visao");
	} catch(PDOException $e) {
		die("Não foi possível executar o script: $sql. " . $e->getMessage());
	}

	header('Location: ../visao/CadastroArea.php');
?>