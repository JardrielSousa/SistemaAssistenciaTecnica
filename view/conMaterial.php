<?php
	include 'topo.php';
	include '../Model/classes/Material.php';

	
 	$material = new Material();

 	$material->conectar("assistenciatecnica","localhost","root","vertrigo");
	$select = $material->consultar();
	
    $result = $select->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {   
    
    }
    
?>

<table class="table table-striped">
  <thead>
    <tr class="bg-primary">
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Tipo</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  	  	<?php
  		foreach ($result as $row) {

  	 ?>
    <tr>
      <td>
      	<?php echo $row['idMaterial']."<br>\n"; ?>
      </td>
      <td>
      	<?php echo $row['nome']."<br>\n";?>
      </td>
      <td>
      	<?php echo $row['tipo']."<br>\n"; ?>
      </td>
      <td>
      	<?php echo $row['quantidade']."<br>\n"; ?>
      </td>
      <td>
      
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Visualizar<?php echo $row['idMaterial'];?>" data-whatever="<?php echo $row['idMaterial'];?>">Visualizar</button>

           <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row['idMaterial'];?>" data-whatevereditar="<?php echo $row['nome'];?>" data-whatevertipo="<?php echo $row['tipo'];?>"
           	data-quantidade="<?php echo $row['quantidade'];?>"
           	data-compra="<?php echo $row['valorCompra'];?>"
           	data-venda="<?php echo $row['valorVenda'];?>">Editar</button>
           <button type="button" class="btn btn-danger" data-whatever="@mdo" data-toggle="modal" data-target="#modalApagar">Apagar</button>
      </td>
    </tr>
    <!-- Modal Visualizar-->
<div class="modal fade" id="Visualizar<?php echo $row['idMaterial'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['nome']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <p><strong>Nome: </strong><?php echo $row['nome'];?></p></h2>
          <p><strong>Quantidade: </strong><?php echo $row['quantidade'];?></p>
          <p><strong>Valor da Compra: </strong><?php echo $row['valorCompra'];?></p>
          <p><strong>Valor da Venda: </strong><?php echo $row['valorVenda'];?></p>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal editar-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="_POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" id="recipient-name" value="">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">tipo:</label>
            <input type="text" class="form-control" id="recipient-tipo" value="">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Quantidade:</label>
            <input type="text" class="form-control" id="quantidade" value="">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Valor da Compra:</label>
            <input type="text" class="form-control" id="recipient-compra" value="">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Valor da Venda:</label>
            <input type="text" class="form-control" id="recipient-venda" value="">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="conMaterial.php?id=<?=$row['id'];?>">
        <button type="button" class="btn btn-primary">Send message</button>
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Modal do apagar -->
<div class="modal fade" id="modalApagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Apagar Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Deseja deletar o cadastro
      ?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
         <a href="excluir.php?id=<?=$row['id'];?>">
            <button type="button" class="btn btn-danger">Apagar</button>
        </a>
      </div>
    </div>
  </div>
</div>
 <?php } ?>
  </tbody>
</table>
<script>
	$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatevereditar')
  var recipienttipo = button.data('whatevertipo')
  var quantidade = button.data('quantidade')
  var compra = button.data('compra')
  var venda = button.data('venda')
  
  
 // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text(recipient)
  modal.find('#recipient-name').val(recipient)
  modal.find('#recipient-tipo').val(recipienttipo)
  modal.find('#quantidade').val(quantidade)
  modal.find('#recipient-compra').val(compra)
  modal.find('#recipient-venda').val(venda)
  
  
  
})
</script>
 <?php
                                    
                                    $material = new Material();
                                    
                                    if(isset($_GET['id']))
                                    {
                                      
                                    $nome = $_POST['nome'];
                                    $tipo = $_POST['tipo'];
                                    $quantidade= $_POST['quantidade'];
                                    $valorCompra= $_POST['valorCompra'];
                                    $valorVenda= $_POST['valorVenda'];
                                    //verificar se os campos estão todos preenchidos
                                    if(!empty($nome) && !empty($tipo) && !empty($quantidade) && !empty($valorVenda) && !empty($valorCompra))
                                    {
                                      $material->conectar("assistenciatecnica", "localhost","root","vertrigo");
                                      

                                        if($material->msgErro == "")
                                        {     
                                              
                                                if($material->alterar($nome, $tipo, $quantidade, $valorCompra, $valorVenda))
                                                {
                                                  ?>
                                                  <br>
                                                <div class="alert alert-success" role="alert">
                                                    cadastrado com sucesso.
                                                </div>
                                                  <?php           
                                                }
                                                else
                                                {
                                                ?>
                                                <br>
                                              <div class="alert alert-danger" role="alert">
                                                já cadastrado, tente outro.
                                                </div>
                                                <?php
                                                }
                                        }
                                        else
                                        {
                                        ?>
                                        <br>
                                        <div class="alert alert-danger" role="alert">
                                        <?php
                                        echo "erro: ". $material->msgErro;
                                          ?>
                                        </div>
                                        <?php
                                        }
                                    }
                                    else
                                    {
                                      ?>
                                      <br>
                                    <div class="alert alert-danger" role="alert">
                                    Preencha todos os campos obrigatórios.
                                    </div>
                                    <?php
                                    }
                                    }
                                    ?>