<?php
	/* sair.php */
	session_start();
	
	/* destruir sess�o*/
	session_destroy();
	
	/* redireciona para login.php */
	header("Location: login.php");
	
?>