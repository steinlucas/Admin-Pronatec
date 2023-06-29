<?php
	/* perfil-usuario-edicao.php */
	include 'cabecalho.php';
	/*
		Restringindo acesso desta página
		somente para usuários com
		cd_perfil = 1 (Administrador)
	*/
	
	if ($_SESSION['cdPerfil'] != 1){
		header ("Location: index.php");
	}
?>

<h2>Edição de perfil de usuário</h2>

<?php
	/* verificar se existe este cadastro */
	if(isset($_GET['cod'])){
		/* receber o codigo e preparar parametro */
		$banco->bind('id',$_GET['cod']);
		
		$consulta = 'select * from perfil_usuario
					where cd_perfil = :id';
					
		$perfil = $banco->row($consulta);
		
		if($perfil){
		/* formulario para alterar o perfil */

		?>
		<form method="post">

			<label for="nome">Nome do Perfil</label>
			<input type="text" name="nome" id="nome" 
				class="form-control" value="<?=$perfil['nm_perfil'];?>"/>
				
			<label for="cor">Cor do Perfil</label>
			<select name="cor" id="cor" class="form-control">
				<option <?=$perfil['ds_cor_perfil'] == 'danger' ? 'selected' : ''; ?> class="badge-danger" value="danger">Danger</option>
				<option <?=$perfil['ds_cor_perfil'] == 'dark' ? 'selected' : ''; ?> class="badge-dark" value="dark">Dark</option>
				<option <?=$perfil['ds_cor_perfil'] == 'info' ? 'selected' : ''; ?> class="badge-info" value="info">Info</option>
				<option <?=$perfil['ds_cor_perfil'] == 'light' ? 'selected' : ''; ?> class="badge-light" value="light">Light</option>
				<option <?=$perfil['ds_cor_perfil'] == 'primary' ? 'selected' : ''; ?> class="badge-primary" value="primary">Primary</option>
				<option <?=$perfil['ds_cor_perfil'] == 'secondary' ? 'selected' : ''; ?> class="badge-secondary" value="secondary">Secondary</option>
				<option <?=$perfil['ds_cor_perfil'] == 'success' ? 'selected' : ''; ?> class="badge-success" value="success">Success</option>
				<option <?=$perfil['ds_cor_perfil'] == 'warning' ? 'selected' : ''; ?> class="badge-warning" value="warning">Warning</option>
			</select>
			<br/>
			<input type="submit" value="Salvar" 
				class="btn btn-primary" />
		</form>
		<?php
			echo "Existe um perfil cadastrado";
		}else{
			echo "Cadastro não encontrado";
		}
	}else{
		/* redirecionar para a listagem */
		header("Location: perfil-usuario-lista.php");
	}
	include 'rodape.php';
?>