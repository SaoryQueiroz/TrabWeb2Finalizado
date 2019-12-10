<?php
	session_start();
	unset($_SESSION['usuarioNome']);
	session_destroy();

	$response = array("success" => true);
	echo json_encode($response);
?>