<?php
	include 'cabecalho.php';
	
	/*inserido um veiculo para o cliente*/
	if(isset($_POST['placa']) && isset($_POST['ano'])) {
		
		/*preparar as informacaoes para inserir no banco*/
		$banco->bind('cdUsuario', $_SESSION['cdUsuario']);
		$banco->bind('nrAno', $_POST['ano']);
		$banco->bind('dsPlaca', $_POST['placa']);
		$banco->bind('cdMarca', $_POST['marca']);
		$banco->bind('cdModelo', $_POST['modelo']);
		$banco->bind('cdTipo', $_POST['tipo']);
		$banco->bind('cdCorVeiculo', $_POST['cor']);
		
		/* insercao no banco */
			$inserir = "INSERT INTO veiculo 
				(cd_usuario, nr_ano, ds_placa, cd_marca, cd_modelo,  
				 cd_tipo_veiculo, cd_cor_veiculo) 
				 VALUES
				(:cdUsuario, :nrAno, :dsPlaca, :cdMarca, :cdModelo, 
				 :cdTipo, :cdCorVeiculo);";
			
			/* if ternario - if resumido de uma linha só*/ 
			$_SESSION['resultado'] = $banco->query($inserir)
				? 'ok' : 'erro';
	}
?>
<h1> Cadastrar Veículos</h1>

<form method="post" action = "">
	
	<label for="placa">Placa do Veiculo</label>
	<input type="text" name="placa" id="placa" class="form-control"/>
	
	<label for="ano">Ano do Veículo</label>
	<input type="text" name="ano" id="ano" class="form-control"/>
	
	<label for="marca">Marca</label>
	<select name="marca" id="marca" class="form-control">
		<option class="" value="danger">Selecione a marca</option>
		<?php
		/*gerando lista de valores para popular combobox,
		Valores vindos da tabela marca do nosso banco de dados msql feito em sala de aula*/
	
		$conMarca = "select * from marca order by nm_marca ASC";
		$marca = $banco->query($conMarca);
		/*estrutura de controle*/
		foreach($marca as $m) {
				echo "<option value='{$m['cd_marca']}'>{$m['nm_marca']} </option>";
			}
		?>
	</select>
	
	<label for="modelo">Modelo</label>
	<select name="modelo" id="modelo" class="form-control">
		<option class="" value="danger">Selecione o Modelo</option>
		<?php

		$conModelo = "select * from modelo order by nm_modelo ASC";
		$modelo = $banco->query($conModelo);
		/*estrutura de controle*/
		foreach($modelo as $md) {
				echo "<option value='{$md['cd_modelo']}'>{$md['nm_modelo']} </option>";
			}
		?>
	</select>
	
	<label for="tipo">Tipo do Veículo</label>
	<select name="tipo" id="tipo" class="form-control">
		<option class="" value="danger">Selecione o Tipo</option>
		<?php
		$contipo = "select * from tipo_veiculo order by nm_tipo_veiculo ASC";
		$tipo = $banco->query($contipo);
		/*estrutura de controle*/
		foreach($tipo as $tp) {
				echo "<option value='{$tp['cd_tipo_veiculo']}'>{$tp['nm_tipo_veiculo']} </option>";
			}
		?>
	</select>
	
	<label for="cor">Cor do Veículo</label>
	<select name="cor" id="cor" class="form-control">
		<option class="" value="danger">Selecione a Cor</option>
		
		<?php
		$concor = "select * from cor_veiculos order by nm_cor_veiculo ASC";
		$cor = $banco->query($concor);
		/*estrutura de controle*/
		foreach($cor as $cv) {
				echo "<option value='{$cv['cd_cor_veiculo']}'>{$cv['nm_cor_veiculo']} </option>";
			}
		?>
	</select>
	
	<br/>
	<input type="submit" value="Salvar" class="btn btn-primary"/>

</form>

<?php
	include 'rodape.php';
?>