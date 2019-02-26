<?php 
	include 'conexao.php';
	$nome = $_POST['nomeCadClientes'];
	$cpf = $_POST['cpfCadClientes'];
	$telefone = $_POST['telefoneCadClientes'];
	$email = $_POST['emailCadClientes'];
	$endereco = $_POST['enderecoCadClientes'];
	$complemento = $_POST['complementoCadClientes'];
	$bairro = $_POST['bairroCadClientes'];


	$insere = "INSERT INTO CadClientes(
	nome,cpf,telefone,email,endereco,complemento,bairro)
	values(:nome,:cpf,:telefone,:email,:endereco,:complemento,:bairro)";

try{
	$stmt = $con->prepare($insere);
	$stmt->bindParam(':nome',$nome);
	$stmt->bindParam(':cpf',$cpf);
	$stmt->bindParam(':telefone',$telefone);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':endereco',$endereco);
	$stmt->bindParam(':complemento',$complemento);
	$stmt->bindParam(':bairro',$bairro);
	$result = $stmt->execute();

	echo "Cadastrado com sucesso!!";
}catch(PDOException $e) {
    echo 'ERROR ao inserir ao banco: ' . $e->getMessage();
}
	
	
?>