<script type="text/javascript" language="javascript">
	var senha = document.getElementById("senhaID"), verificaSenha = document.getElementById("verificaSenhaID");
			
	function validatePassword(){
		if(senha.value != verificaSenha.value) {
			verificaSenha.setCustomValidity("Senhas diferentes!");
		} else {
			verificaSenha.setCustomValidity('');
		}
	}
	senha.onchange = validatePassword;
	verificaSenha.onkeyup = validatePassword;
</script>



<?php
				session_start();
				if(isset($_SESSION['usuarioNome'])){
                    include("../layout/usuarioLogado.php");
                }else{
                    header('Location: ../visao/Login.php');
				}
				if(isset($_COOKIE["msg"])){
					echo $_COOKIE["msg"];
				}
			?>