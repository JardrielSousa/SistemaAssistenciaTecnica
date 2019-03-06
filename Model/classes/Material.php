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
  public function consultar(){
    global $pdo;
    $select = $pdo->query("SELECT * FROM cadMaterial");
 
// primeira forma 
   

    return $select;
  }

  public function Excluir(){
    global $pdo;
    $id = $ $_GET['id'] ;
    $deletar->$pdo->prepare("DELETE * FROM cadMaterial where id = '$id'");
    $deletar->bindValue(":id",$id);
    $deletar->execute();


    header('location:../view/conMaterial.php');

  }

  public function alterar($id,$nome,$tipo,$quantidade,$valorCompra,$valorVenda){
    global $pdo;
   try{
       $pdo = new PDO('mysql:host=localhost;dbname=assistenciatecnica', 'root', 'vertrigo');
    //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = $pdo->prepare("UPDATE cadmaterial SET nome = '$nome' , tipo = '$tipo',quantidade = '$quantidade' , valorVenda = '$valorVenda' , valorCompra = '$valorCompra' 
    where idMaterial ='$id'");
    $sql->execute();
    echo $sql->rowCount();

    if($sql != 0){
     echo "<script language=javascript>alert( 'Alterado com sucesso!' );</script>";
    }else{
      echo "<script language=javascript>alert( 'Alerta Verde!' );</script>";
    }

header('location:../view/conMaterial.php');
return $sql;

   }catch(PDOException $e){
      echo 'Error: ' . $e->getMessage();
   }
  }

}
?>