<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Valida</title>
	<script>
		function msgOk(){
			window.location.href = "../view/index.html";
		}
		function msgError(){
			window.location.href = "../view/login.php";	
		}
	</script>
</head>
<body>
</body>
</html>

<?php
	include_once ('../model/conexao.php');

		$email = $_POST['emailLogin'];
			$senha = $_POST['senhaLogin'];
			$senha = md5($senha);

	$lista = $con->prepare("SELECT * FROM CadUsuarios where emailUsuarios = :email && senhaUsuario = :senha ");
	$lista->bindValue(":email",$_POST['emailLogin']);
	$lista->bindValue(":senha",md5($_POST['senhaLogin']));
	$lista->execute();

	/*echo $lista->rowCount();
	if($lista->rowCount() ==1){
		session_start();
		$_SESSION['user_email'] = $email;
		$_SESSION['user_senha'] = $senha;
		echo "<script>msgOk()</script>";
	}else{
		echo "<script>msgError()</script>";
	}	
	*/

	if($lista->rowCount() >0)
    {
        while($ln = $lista->fetch(PDO::FETCH_ASSOC))
        {
          session_start();
		$_SESSION['user_email'] = $email;
		$_SESSION['user_senha'] = $senha;

            echo "<script>alert('Logado Com Sucesso!');
                top.location.href='../view/index.html';
                </script>";
        };
      }
    else
    {
        echo "<script>alert('Usuarios Ou Senha Incorretos!');
            top.location.href='../view/login.php';
            </script>";
    }

	
?>

