<?php 

function conectar(){
  global $pdo;
    try{
    	$dbname = 'localost';
    	$servidor = 'assistenciatecnica';
    	$usuario = 'root';
    	$senha = 'vertrigo';
       $pdo = new PDO("mysql:dbname=".$dbname.";servidor=".$servidor, $usuario, $senha);
       echo "Conectado";
    }
    catch(PDOException $e){
    $e->getMessage();
    }
  }

?>