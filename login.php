<?php
	/* login.php */
	session_start();
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>:: Login Lavação ::</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="validaLogin.php" method="post" >
      <img class="mb-4" src="img/carro-login.jpg" alt="" width="150">
      <h1 class="h3 mb-3 font-weight-normal">Login Lavação</h1>
      <label for="inputEmail" class="sr-only">Endereço de e-mail</label>
      <input name="emailF" type="email" id="inputEmail" class="form-control" placeholder="Informe seu e-mail" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input name="senhaF" type="password" id="inputPassword" class="form-control" placeholder="Informe sua senha" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar dados
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
	  <a href="usuario-cad.php" class="btn btn-lg btn-block">Cadastre-se</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018 Lavação</p>
    </form>
  </body>
</html>
