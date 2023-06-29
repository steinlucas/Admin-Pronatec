<?php
	include 'cabecalho.php';
	
	/*
		Restringindo acesso desta página
		somente para usuários com
		cd_perfil = 1 (Administrador)
	*/
	
	if ($_SESSION['cdPerfil'] != 1){
		header ("Location: index.php");
	}
	if(isset ($_GET['op']) && isset($_GET['cod'])){
		
		/*verificar qual é a operação*/
		if ($_GET['op'] == 'excluir'){
			
			/*exclusão do registro*/
			$banco->bind('id',$_GET['cod']);
			$exclusao = 'delete from perfil_usuario 
							where cd_perfil = :id';
			$resultado = $banco->query($exclusao);
		}
	}
?>

<h1>Perfis de usuario cadastrados</h1>

<?php
	$perfis=$banco->query("select * from perfil_usuario");
?>
	
	<table class="table">
		<tr>
			<th>Código</th>
			<th>Perfil</th>
			<th>Cor</th>
			<th>Imagem</th>
			<th>Excluir</th>
			<th>Editar</th>
			
			<?php
				foreach($perfis as $p){
					echo "<tr>
							<td>{$p['cd_perfil']}</td>
							<td>{$p['nm_perfil']}</td>
							<td>{$p['ds_cor_perfil']}</td>
							<td>{$p['ds_img_perfil']}</td>
							<td><a href='?op=excluir&cod={$p['cd_perfil']}'
								class='btn btn-danger'>Excluir</a></td>
							<td><a href='perfil-usuario-edicao.php?cod={$p['cd_perfil']}'
								class='btn btn-success'>Editar</a></td>
						</tr>";
				}
			?>
			
		</tr>
	</table>
	
	<br/>
	
	<a href="perfil-usuario-cad.php" class="btn btn-primary">
		Novo perfil</a>
		
<?php
include 'rodape.php';
?>