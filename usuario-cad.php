<?php
	/* usuario-cad.php */
	session_start();
	
	if(isset($_POST['nome'])&&
		isset($_POST['email'])&&
		isset($_POST['senha'])){
		
		if(!empty($_POST['nome'])&&
			!empty($_POST['email'])&&
			!empty($_POST['senha'])){
			
			/* arquivo de configuracão */
			require 'config.php';
			
			/* classe para manipular MySQL */
			require 'classes/Db.class.php';
			
			/* criar um objeto da classe Db */
			$banco = new DB();
			
			/*preparar as informações para cadastro */
			$banco->bind('nmUsuario',$_POST['nome']);
			$banco->bind('dsEmail',$_POST['email']);
			$banco->bind('dsSenha',sha1($_POST['senha']));
			$banco->bind('tpSexo',$_POST['sexo']);
			$banco->bind('dtNascimento',$_POST['dataNasc']);
			$banco->bind('fgIdoso',$_POST['idoso']);
			$banco->bind('fgVip',$_POST['vip']);
			$banco->bind('fgNecEspecial',$_POST['necEspecial']);
			$banco->bind('dsNecEspecial',$_POST['tipoNecessidade']);
			
			
			/* insercao no banco */
			$inserir = "INSERT INTO usuario 
				(nm_usuario, ds_email, ds_senha, cd_perfil ,  
				 fg_ativo,	tp_sexo, dt_nascimento, dt_cadastro, 
				 fg_idoso, fg_vip, fg_nec_especial, ds_nec_especial) 
				 VALUES 
				 (:nmUsuario, :dsEmail, :dsSenha, 2, 
				 1, :tpSexo, :dtNascimento, now(), 
				 :fgIdoso, :fgVip, :fgNecEspecial, :dsNecEspecial);";
			
			/* if ternario - if resumido de uma linha só*/ 
			$_SESSION['resultado'] = $banco->query($inserir)
				? 'ok' : 'erro';
		}
	}

?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="favicon.ico">

		<title>:: Cadastro de Usuário ::</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

	</head>
	<body>

		<main role="main" class="container">
		
			<h2>Cadastro de Usuário</h2>
			
			<div class="alert alert-dark" role="alert">
				Informe seus dados abaixo para efetuar o seu cadastro de usuário
			</div>
			
			<form method="post" action="">
			
			<?php
				if(isset($_SESSION['resultado'])){
				
					if($_SESSION['resultado'] == 'ok'){
						echo "<div class='alert alert-success'>Usuário cadastrado com sucesso!<a href='login.php'>Voltar para a página de login</a></div>";
					}else{
						echo "<div class='alert alert-danger'>Erro ao cadastrar, tente novamente!</div>";
					}
					unset($_SESSION['resultado']);
				}
			?>
			
				<label for="nome">Nome</label>
				<input type="text" name="nome" id="nome" class="form-control"/>
				
				<label for="sexo">Sexo</label>
				<select name="sexo" id="sexo" class="form-control">
					<option class="" value="M">Masculino</option>
					<option class="" value="F">Feminino</option>
					<option class="" value="I">Indefinido</option>
				</select>
				
				<label for="dataNasc">Data Nascimento</label>
				<input type="date" name="dataNasc" id="dataNasc" class="form-control"/>
				
				<label for="idoso">Idoso?</label>
				<select name="idoso" id="idoso" class="form-control">
					<option class="" value="S">Sim</option>
					<option class="" value="N">Não</option>
				</select>
				
				<label for="necEspecial">Necessidade Especial?</label>
				<select name="necEspecial" id="necEspecial" class="form-control">
					<option class="" value="S">Sim</option>
					<option class="" value="N">Não</option>
				</select>
				
				<label for="tipoNecessidade">Qual?</label>
				<input type="tipoNecessidade" name="tipoNecessidade" id="tipoNecessidade" class="form-control"/>
				
				<label for="vip">Vip</label>
				<select name="vip" id="vip" class="form-control">
					<option class="" value="S">Sim</option>
					<option class="" value="N">Não</option>
				</select>
				
				<label for="email">E-mail</label>
				<input type="text" name="email" id="email" class="form-control"/>
				
				<label for="senha">Senha</label>
				<input type="password" name="senha" id="senha" class="form-control"/>
				
				<label for="confSenha">Confirme sua Senha</label>
				<input type="password" name="confSenha" id="confSenha" class="form-control"/>
				
				<br/>
				
				<input type="submit" value="Cadastrar" class="btn btn-primary"/>
				<input type="reset" value="Limpar" class="btn btn-danger"/>
				
				<a href="login.php" class="btn btn-warning">Voltar</a>
				
			</form>
			
		</main>
	
	</body>
</html>

<?php
	include 'rodape.php';
?>