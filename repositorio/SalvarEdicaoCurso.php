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
		$sql = "update curso set titulo = '" . $curso->getTitulo() . "', 
		descricao = '" . $curso->getDescricao() . "', local = '" . $curso->getLocal() . "',
		 quantidadeVagas = '" . $curso->getQuantidadeVagas() . "', professor = '" . $professor . "', area = '" . $area . "' where id = 
		 '" . $_POST['id'] . "'";

		$pdo->exec($sql);
		echo "<p>Alterado com sucesso.</p>";
	} catch(PDOException $e) {
		die("Não foi possível executar o script: $sql. " . $e->getMessage());
	}

	//var_dump($aluno);

	header('Location: ../visao/BuscarRemoverCurso.php');
?>