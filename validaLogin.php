<?php
	/* validaLogin.php */
	session_start();
	
	/* arquivo de configuração */
	require 'config.php';
	
	/* classe para manipular MySQL */
	require 'classes/Db.class.php';
	
	/* criar um objeto da classe Db */
	$banco = new DB();
	
	$banco->bind('emailF',$_POST['emailF']);
	$banco->bind('senhaF',sha1($_POST['senhaF']));
	
	$consulta = 'select 
			u.*	, pu.*
			from
				usuario u
				inner join perfil_usuario pu
				on (u.cd_perfil = pu.cd_perfil)
			where
				u.ds_email = :emailF
				and ds_senha = :senhaF
				and fg_ativo = 1';
	
	$usuario = $banco->row($consulta);
	
	if($usuario){
		/* dados corretos */
		$_SESSION['autorizado'] = 1;
		$_SESSION['cdUsuario'] = $usuario['cd_usuario'];
		$_SESSION['nome'] = $usuario['nm_usuario'];
		$_SESSION['perfil'] = $usuario['nm_perfil'];
		$_SESSION['cdPerfil'] = $usuario['cd_perfil'];
		$_SESSION['corPerfil'] = $usuario['ds_cor_perfil'];
		$_SESSION['imgPerfil'] = $usuario['ds_img_perfil'];
		header("Location: index.php");
	}else{
		/* dados inválidos */
		header("Location: index.php");
		
		
	}
	//$_POST['emailF'];
	//POST['senhaF'];*/ 
	
	
	$usuarios = $banco->query($consulta);
	print_r($usuarios);
	//e1929e391cabf874dbcbeac8bf5a56cc29ed1a52
	
	//$email;
	//$senha;
	
	/* teste com os digitados 
	
	if($email == $_POST['emailF'] 
		&& $senha == sha1($_POST['senhaF'])){
			/* autorizado 
			$_SESSION['autorizado'] = 1;
			header("Location: index.php");
	}else{
		
		dados inválidos 
		//header("Location: login.php");
	}*/
	
	
?>