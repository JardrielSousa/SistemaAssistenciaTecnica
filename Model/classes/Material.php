<?php 

 Class Material{

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
  
  public function cadastrar($nome, $tipo, $quantidade, $valorCompra, $valorVenda){
  global $pdo;
  //verificar se o e-mail já está cadastrado
  $sql = $pdo->prepare("SELECT id FROM cadmaterial WHERE nome = :nome");
  $sql->bindValue(":nome",$nome);
  $sql->execute();

    if($sql->rowCount($sql) > 0){
    return false;   // Já está cadastrado
    }
      else{ //caso não, cadastrar
      $sql = $pdo->prepare(" INSERT INTO cadmaterial(nome, tipo, quantidade,valorCompra,valorVenda) VALUES (:nome, :tipo, :quantidade,:valorCompra,:valorVenda)");
      $sql->bindValue(":nome", $nome);         
      $sql->bindValue(":tipo", $tipo);
      $sql->bindValue(":quantidade", $quantidade);
      $sql->bindValue(":valorVenda", $valorVenda);
      $sql->bindValue(":valorCompra", $valorCompra);
      $sql->execute();
      return true;
      }
  }
}

?>