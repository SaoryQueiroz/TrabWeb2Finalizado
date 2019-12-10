<?php
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=web2", "root", "");
	} catch (PDOException $erro) {
		echo $erro->getMessage();
	}

	require_once '../modelo/Curso.php';
	$curso = new Curso();
	$curso->setTitulo($_POST['titulo']);
	$curso->setDescricao($_POST['descricao']);
	$curso->setLocal($_POST['local']);
	$curso->setQuantidadeVagas($_POST['quantidadeVagas']);
    $professor = $_POST['professor'];
    $area = $_POST['area'];
	try {
		$sql = "INSERT INTO curso (titulo, descricao, local, quantidadeVagas, professor, area) VALUES 
			('" . $curso->getTitulo() . "', '" . $curso->getDescricao() . "'
			, '" . $curso->getLocal() . "', '" . $curso->getQuantidadeVagas() . "'
			, '" . $professor . "', '" . $area . "')";

		$pdo->exec($sql);
		setcookie("msg", "Inserido com sucesso", time() + 1,"/web_banco/visao");
		$response = array("success" => true);
	} catch(PDOException $e) {
		die("Não foi possível executar o script: $sql. " . $e->getMessage());
		$response = array("success" => false);
	}

	echo json_encode($response);
?>