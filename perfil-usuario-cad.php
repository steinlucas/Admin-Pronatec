<?php
	/* perfil-usuario-cad.php */
	include 'cabecalho.php';
	
	if (isset($_POST) && isset($_POST['nome']) && isset($_POST['cor'])){
	
		/* inserir as informacoes no banco de dados */
		
		/* preparar as informacoes recebidas */
		$banco->bind('nmPerfil',$_POST['nome']);
		$banco->bind('corPerfil',$_POST['cor']);
		
		$consulta = "insert into perfil_usuario
					(nm_perfil, ds_cor_perfil)
					values (:nmPerfil, :corPerfil)";
					
		if($banco->query($consulta)){
			/* inserir com sucesso */
			$_SESSION['cadPerfil'] = 'ok';
		}else{
			/* algum erro no cadastro */
			$_SESSION['cadPerfil'] = 'erro';
		}
	}
?>
<h2> Cadastrar novo perfil de usuário</h2>
<?php
	if(isset($_SESSION['cadPerfil'])){
		if($_SESSION['cadPerfil'] == 'ok'){
			/* mensagem informativa */
			echo "<div class='alert alert-success'>
					Cadastro efetuado com sucesso!
					</div>";
		}elseif($_SESSION['cadPerfil'] == 'erro'){
			echo "<div class='alert alert-danger'>
					Erro ao inserir esta registro!
					</div>";
		}
		unset($_SESSION['cadPerfil']);
	}	
?>
<br/>
<form method="post">
	
	<label for="nome">Nome do Perfil</label>
	<input type="text" name="nome" id="nome" class="form-control"/>
	
	<label for="cor">Cor do Perfil</label>
	<select name="cor" id="cor" class="form-control">
		<option class="badge-danger" value="danger">Danger</option>
		<option class="badge-dark" value="dark">Dark</option>
		<option class="badge-info" value="info">Info</option>
		<option class="badge-light" value="light">Light</option>
		<option class="badge-primary" value="primary">Primary</option>
		<option class="badge-secondary" value="secondary">Secondary</option>
		<option class="badge-success" value="success">Success</option>
		<option class="badge-warning" value="warning">Warning</option>
	</select>
	<br/>
	<input type="submit" value="Salvar" class="btn btn-primary"/>

</form>

<?php
	include 'rodape.php';
?>