<?php 
	define('host','localhost');
	define('dbname','assistenciatecnica');
	define('user','root');
	define('pass','vertrigo');
	
	try{
		$con = new PDO('mysql:host='.host.';
		dbname='.dbname,user,pass
		);	
		echo "
		
		Conectado ao banco!!!
		";
	}catch(PDOException $e){
		echo 'Erro ao conectar ao banco'.$e->getMessage();
	}
	


?>