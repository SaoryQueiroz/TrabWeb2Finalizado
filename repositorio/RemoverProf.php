<?php
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=web2", "root", "");
	} catch (PDOException $erro) {
		echo $erro->getMessage();
	}

	$id = $_GET['id'];
	try {
		$sql = "delete from professor where id = '" . $id . "'";

		$pdo->exec($sql);
		echo $sql;
	} catch(PDOException $e) {
		die("Não foi possível executar o script: $sql. " . $e->getMessage());
	}

	//var_dump($aluno);
	header('Location: ../visao/BuscarRemoverProf.php');
?>