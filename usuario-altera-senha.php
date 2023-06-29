<?php
	include 'cabecalho.php';
	
	/* Alteração senha */
	
	if(isset($_POST['senhaAtual']) && isset($_POST['senhaNova']) &&	isset($_POST['confSenhaNova'])){
	
		if($_POST['senhaNova'] != $_POST['confSenhaNova']){
			/* senha nova e conf diferentes */
			$_SESSION['resultado'] = 'senhas_diferentes';

		} else {
			/* senha nova e conf iguais */
			
			$banco->bind('senhaAtual', sha1($_POST['senhaAtual']));
			$banco->bind('usuario', $_SESSION['cdUsuario']);
			
			$cons = 'select ds_senha from usuario where
				ds_senha = :senhaAtual and
				cd_usuario = :usuario';
				
			$res = $banco->row($cons);
		
			if($res){
				// senha ok
				$banco->bind('senhaNova', sha1($_POST['senhaNova']));
				$banco->bind('usuario', $_SESSION['cdUsuario']);
				
				$atualizar = 'UPDATE usuario SET ds_senha = :senhaNova WHERE cd_usuario = :usuario';
				$_SESSION['resultado'] = $banco->query($atualizar)
					? 'ok' : 'erro_atualizar';

				// atualizar / update}
			} else {
				$_SESSION['resultado'] = 'senha_atual_diferente';
			}
		}
	}
?>
<html>
	<head>
	</head>
	<body>
		<form method="post" action="">
			<h1>Alteração de Senha</h1>
			<?php
				/* mensagem informativa */
				if(isset($_SESSION['resultado'])){
				/* certo */
					if($_SESSION['resultado'] == 'ok'){						
						echo "<div class='alert alert-success'>Alteração efetuada com sucesso!</div>";
				/* erro */
					}elseif($_SESSION['resultado'] == 'senhas_diferentes'){
						echo "<div class='alert alert-danger'>A senha e sua confirmação não conferem!</div>";
					}elseif($_SESSION['resultado'] == 'erro_atualizar'){
						echo "<div class='alert alert-danger'>Erro ao inserir esta registro!</div>";
					}elseif($_SESSION['resultado'] == 'senha_atual_diferente'){
						echo "<div class='alert alert-danger'>Esta senha não confere com a sua!</div>";
					}
					unset($_SESSION['resultado']);
				}	
			?>
				<label for="senhaAtual">Senha atual</label>
					<input type="password" name="senhaAtual" id="senhaAtual" class="form-control"/>
					
					<label for="senhaNova">Senha nova</label>
					<input type="password" name="senhaNova" id="senhaNova" class="form-control"/>
					
					<label for="confSenhaNova">Confirme a senha nova</label>
					<input type="password" name="confSenhaNova" id="confSenhaNova" class="form-control"/>
				<br/>
				<input type="submit" value="Alterar Senha" class="btn btn-primary"/>
		</form>				
	</body>
</html>
<?php
	include 'rodape.php';
?>