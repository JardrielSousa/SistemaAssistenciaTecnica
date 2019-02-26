<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastro de Clientes</title>
</head>
<body>
	<fieldset>
		<legend>
			Cadastro de Clientes
		</legend>
		<form action="../Model/CadClientesModel.php" method="POST">
			<input type="text" id="nomeCadClientes" name="nomeCadClientes" placeholder="Nome Completo" required/><br>
			<input type="text" id="cpfCadClientes" name="cpfCadClientes"  placeholder="CPF" required/><br>
			<input type="text" id="telefoneCadClientes" name="telefoneCadClientes"  placeholder="Telefone" required/><br>
			<input type="email" id="emailCadClientes" name="emailCadClientes"  placeholder="Email" required/><br>
			<input type="text" id="enderecoCadClientes" name="enderecoCadClientes"  placeholder="Endereço" required/><br>
			<input type="text" id="complementoCadClientes" name="complementoCadClientes"  placeholder="Complemento"/><br>
			<input type="text" id="bairroCadClientes" name="bairroCadClientes"  placeholder="bairro"/><br>
			<input type="submit" value="enviar">
		</form>
	</fieldset>
</body>
</html>