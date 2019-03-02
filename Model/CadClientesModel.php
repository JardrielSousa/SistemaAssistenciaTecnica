<?php 
	include 'conexao.php';
	$nome = $_POST['nomeCadClientes'];
	$cpf = $_POST['cpfCadClientes'];
	$telefone = $_POST['telefoneCadClientes'];
	$email = $_POST['emailCadClientes'];
	$endereco = $_POST['enderecoCadClientes'];
	$complemento = $_POST['complementoCadClientes'];
	$bairro = $_POST['bairroCadClientes'];

	if (!isset($nome)&&!isset($cpf)) {
	header("../view/index.html");
	} else {
	echo "deu certo";
	}

	$insere = "INSERT INTO CadClientes(
	nome,cpf,telefone,email,endereco,complemento,bairro)
	values(:nome,:cpf,:telefone,:email,:endereco,:complemento,:bairro)";

	$stmt = $con->prepare($insere);
	$stmt->bindParam(':nome',$nome);
	$stmt->bindParam(':cpf',$cpf);
	$stmt->bindParam(':telefone',$telefone);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':endereco',$endereco);
	$stmt->bindParam(':complemento',$complemento);
	$stmt->bindParam(':bairro',$bairro);
	$stmt->execute();

	header('location:../view/index.html');
	
?>