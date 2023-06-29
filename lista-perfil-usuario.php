<?php
	include 'cabecalho.php';
	
	/* lista-perfil-usuario.php	*/
	
	if(isset($_GET['op']) && isset($_GET['cod'])){
	
		/* verificar qual é a operacao */
		
		if($_GET['op'] == 'excluir'){
		
			/* exclusao do registro */
			
			$banco->bind('id',$_GET['cod']);
			$exclusao = 'delete from perfil_usuario
							where cd_perfil = :id';
			$resultado = $banco->query($exclusao);
		}
	}
	/*$_GET['op'] $_GET['cod']*/
?>
<h2>Perfis de usuário cadastrados</h2>
<?php
	$perfis = $banco->query("select * from perfil_usuario");
?>

	<table class="table">
		<tr>
			<th>Código</th>
			<th>Perfil</th>
			<th>Cor</th>
			<th>Imagem</th>
			<th>Excluir</th>
			<th>Editar</th>
		</tr>
<?php
	foreach($perfis as $p){
		echo "<tr>
				<td>{$p['cd_perfil']}</td>
				<td>{$p['nm_perfil']}</td>
				<td>{$p['ds_cor_perfil']}</td>
				<td>{$p['ds_img_perfil']}</td>	
				<td><a href='?op=excluir&cod={$p['cd_perfil']}'
						class='btn btn-danger'>Excluir</td>
				<td><a href='?op=editar&cod={$p['cd_perfil']}'
						class='btn btn-success'>Editar</td>
			</tr>";
	}
?>
	</table>
	<br/>
	
	<a href="perfil-usuario-cad.php" class="btn btn-primary">
	Novo perfil</a>
<?php
	include 'rodape.php';
?>