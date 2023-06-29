<?php
	include 'cabecalho.php';
	
	/* 
		Esta é uma página de exemplo, o código HTML
		deverá ser colocado depois do fechamento do PHP
	*/
?>

<h2>Bem-vindo <span class="badge badge-<?=$_SESSION['corPerfil'];?>">
	<?=$_SESSION['nome'];?> - <?=$_SESSION['perfil'];?>
	</span>

</h2>


<?php
	include 'rodape.php';
?>