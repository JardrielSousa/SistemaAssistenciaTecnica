<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
<link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
<link href = "https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css"  rel = "stylesheet" >
<link rel="stylesheet" href="../css/cadcliente.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">Assistencia técnica</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Cadastro
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="cadmaterial.php">Materiais</a>
          <a class="dropdown-item" href="cadCliente.php">Clientes</a>
          <a class="dropdown-item" href="#">Usuarios</a>
          <a class="dropdown-item" href="#">Serviços</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Consultar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Materiais</a>
          <a class="dropdown-item" href="conCliente.php">Clientes </a>
          <a class="dropdown-item" href="#">Estoque</a>
          <a class="dropdown-item" href="#">Usuarios</a>
          <a class="dropdown-item" href="#">Serviços</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Financeiro
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Receita</a>
          <a class="dropdown-item" href="#">Despesas</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Abrir O.S</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Controller/sair.php">Sair</a>
      </li>
    </ul>
  </div>
</nav>
    
      <div class="container-fluid">
            <div class="form-group">
              <div class="row">
              <div class="col-md-3">
                
              </div>
              <div class="col-md-8 text-center">
              <form method="post" class="form-group">
        <div class="form-row" >
         <div class="col-md-6">
            <label for="inputEmail4">Nome</label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="Nome" name="nome">
          </div>
        </div>
        <div class="form-row">
             <div class="col-md-3">
              <label for="inputPassword4">Tipo</label>
              <input type="text" class="form-control" id="inputPassword4" placeholder="Tipo" name="tipo">
            </div>
            <div class="col-md-">
              <label for="inputAddress">Quantidade</label>
              <input type="number" class="form-control" id="inputAddress" placeholder="Quantidade" name="quantidade">
            </div>
        </div>
        <div class="form">
           <div class="col-md-6">
            <label for="inputAddress2">Valor da Compra</label>
            <input type="number" class="form-control" id="inputAddress2" placeholder="Valor da Compra" name="valorCompra">
          </div>
            <div class="col-md-6">
          <label for="inputAddress3">Valor da Venda</label>
          <input type="number" class="form-control" id="inputAddress2" placeholder="Valor da Venda" name="valorVenda">
        </div>
        </div>

        <div>
          <div>
              <div class="col-md-4">
                <label class="form-check-label" for="gridCheck">
                  <input class="form-check-input" type="checkbox" id="gridCheck" required/>
                Confirmou os dados ?
                </label>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
             
          </div>
        
         <?php
                                    include '../Model/classes/Material.php';
                                    $material = new Material();
                                    
                                    if(isset($_POST['nome']))
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
                                              
                                                if($material->cadastrar($nome, $tipo, $quantidade, $valorCompra, $valorVenda))
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
                                    </div>
      </form>
          </div>
              </div>
              
          </div>
      </div>
      


<script src="node_modules/jquery/dist/jquery.js"></script>
        <script src="node_modules/Popper.js/dist/Popper.js"></script>
        <script src="node_modules/bootstrap/dist/ja/bootstrap.js"></script>
        <script src="node_modules/glyph-iconset-master/svg/"></script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
