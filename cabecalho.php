<?php
	/* ativando array $_SESSION */
	session_start();
	
	/* testado existência variável de sessão */
	if(!isset($_SESSION['autorizado'])){
		header("Location: login.php");
	}
	
	/* arquivo de configuração */
	require 'config.php';
	
	/* classe para manipular MySQL */
	require 'classes/Db.class.php';
	
	/* criar um objeto da classe Db */
	$banco = new DB();
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>:: Administração Lavação ::</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Stein's Lavação</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="sair.php">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">
                  <span data-feather="home"></span>
				  Painel 
                </a>
              </li>
			  <?php
			  /*
				  Páginas de acesso exclusivo aos clientes
				  que possuem o cd_perfil = 2
			  */
				/*if($_SESSION['cdPerfil'] == 2) {
			  ?>
              <!--<li class="nav-item">
                <a class="nav-link" href="veiculos-cad-cliente.php">
                  <span data-feather="truck"></span>
                  Edição
                </a>
              </li>-->
			  <?php
				}  
			   
				  Páginas de acesso exclusivo aos clientes
				  que possuem o cd_perfil = 1
			  */
				if($_SESSION['cdPerfil'] == 1) {
			  ?>
              <li class="nav-item">
                <a class="nav-link" href="perfil-usuario-lista.php">
                  <span data-feather="truck"></span>
                  Lista de perfil
                </a>
              </li>
			  <?php
				}
			  ?>
              <li class="nav-item">
                <a class="nav-link" href="veiculos-cad-cliente.php">
                  <span data-feather="shopping-cart"></span>
                  Cadastro Veiculo				
				  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="usuario-altera-senha.php">
                  <span data-feather="users"></span>
                  Alterar Senha
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integrations
                </a>
              </li>
            </ul>
			<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">