<?php

 Class cliente{
  private $pdo;
  public $msgErro="";

  public function conectar($dbname, $servidor, $usuario, $senha){
  global $pdo;
    try{
       $pdo = new PDO("mysql:dbname=".$dbname.";servidor=".$servidor, $usuario, $senha);
    }
    catch(PDOException $e){
    $e->getMessage();
    }
  }
  
  public function cadastrar($nome, $email, $telefone, $endereco, $bairro, $cidade, $complemento){
  global $pdo;
  //verificar se o e-mail já está cadastrado
  $sql = $pdo->prepare("SELECT idCliente FROM cadcliente WHERE email = :email");
  $sql->bindValue(":email",$email);
  $sql->execute();

    if($sql->rowCount($sql) > 0){
    return false;   // Já está cadastrado
    }
      else{ //caso não, cadastrar
      $sql = $pdo->prepare(" INSERT INTO cadcliente(nome, email, telefone, endereco, bairro, cidade, complemento) VALUES(:nome, :email, :telefone, :endereco, :bairro, :cidade, :complemento)");
      $sql->bindValue(":nome", $nome);         
      $sql->bindValue(":email", $email);
      $sql->bindValue(":telefone", $telefone);
      $sql->bindValue(":endereco", $endereco);
      $sql->bindValue(":bairro", $bairro);
      $sql->bindValue(":cidade", $cidade);
      $sql->bindValue(":complemento", $complemento);
      
 
      $sql->execute();
      return true;
      }
  }

 }
?>
