<?php
	include '../Model/classes/Material.php';
			$id = $_POST['id'];
			$nome = $_POST['nome'];
            $tipo = $_POST['tipo'];
            $quantidade= $_POST['quantidade'];
            $valorCompra= $_POST['valorCompra'];
            $valorVenda= $_POST['valorVenda'];

            $material = new Material();
            $material->alterar($id,$nome,$tipo,$quantidade,$valorCompra,$valorVenda);


?>

